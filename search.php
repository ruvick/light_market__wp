<?php 

/*
Template Name: Страница поиска
Template Post Type: page
*/


get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<!-- <main id="primary" class="site-main"> -->

	<section id="page" class="page"> 
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<? 
							//$arg = $wp_query->query;

							$startPrice = empty($_REQUEST["price_from"])?"0":$_REQUEST["price_from"];
							$endPrice = empty($_REQUEST["price_to"])?PHP_INT_MAX:$_REQUEST["price_to"];

							$metaquery = array(
								'relation' => 'AND',
								
								'priceStart' => array (
									'key'     => '_offer_price',
									'value' => $startPrice,
									'compare' => '>=',
									'type'    => 'NUMERIC',
								),
								
								'priceEnd' => array (
									'key'     => '_offer_price',
									'value' => $endPrice,
									'compare' => '<=',
									'type'    => 'NUMERIC',
                                ),

                                'searchFild' => array (
                                    'relation' => 'OR',
                                    'tqAll' => array(
                                        'key'     => '_offer_allsearch',
                                        'value' => $_REQUEST["s"],
                                        'compare' => 'LIKE',
                                        'type'    => 'CHAR',
                                    ),
            
                                    'tqSku' => array(
                                        'key'     => '_offer_sku',
                                        'value' => $_REQUEST["s"],
                                        'compare' => 'LIKE',
                                        'type'    => 'CHAR',
                                    ),
            
                                    'tqDescr' => array(
                                        'key'     => '_offer_smile_descr',
                                        'value' => $_REQUEST["s"],
                                        'compare' => 'LIKE',
                                        'type'    => 'CHAR',
                                    ),
            
                                    'tqDescr' => array(
                                        'key'     => '_offer_name',
                                        'value' => $_REQUEST["s"],
                                        'compare' => 'LIKE',
                                        'type'    => 'CHAR',
                                    )
                                    
                                )
							);

							if (!empty($_REQUEST["style"])) {
								$metaquery["styleQuery"] = array(
									'relation' => 'OR',
								);
								
								for ($i = 0; $i<count($_REQUEST["style"]); $i++) {
									$metaquery["styleQuery"]["style".$i] = array(
										'key'     => '_offer_style',
										'value' => $_REQUEST["style"][$i],
										'compare' => '=',
										'type'    => 'CHAR',
									);
								} 
							}

							if (!empty($_REQUEST["forma"])) {
								$metaquery["formaQuery"] = array(
									'relation' => 'OR',
								);
								
								for ($i = 0; $i<count($_REQUEST["forma"]); $i++) {
									$metaquery["formaQuery"]["forma".$i] = array(
										'key'     => '_offer_forma',
										'value' => $_REQUEST["forma"][$i],
										'compare' => '=',
										'type'    => 'CHAR',
									);
								} 
							}

							if (!empty($_REQUEST["plafmat"])) {
								$metaquery["plafmatQuery"] = array(
									'relation' => 'OR',
								);
								
								for ($i = 0; $i<count($_REQUEST["plafmat"]); $i++) {
									$metaquery["plafmatQuery"]["plafmat".$i] = array(
										'key'     => '_offer_material_plaf',
										'value' => $_REQUEST["plafmat"][$i],
										'compare' => '=',
										'type'    => 'CHAR',
									);
								} 
							}

							if (!empty($_REQUEST["plafclr"])) {
								$metaquery["plafclrQuery"] = array(
									'relation' => 'OR',
								);
								
								for ($i = 0; $i<count($_REQUEST["plafclr"]); $i++) {
									$metaquery["plafclrQuery"]["plafclr".$i] = array(
										'key'     => '_offer_color_plaf',
										'value' => $_REQUEST["plafclr"][$i],
										'compare' => '=',
										'type'    => 'CHAR',
									);
								} 
							}

							
							if (!empty($_REQUEST["lamptyp"])) {
								$metaquery["lamptypQuery"] = array(
									'relation' => 'OR',
								);
								
								for ($i = 0; $i<count($_REQUEST["lamptyp"]); $i++) {
									$metaquery["lamptypQuery"]["lamptyp".$i] = array(
										'key'     => '_offer_lamp_type',
										'value' => $_REQUEST["lamptyp"][$i],
										'compare' => '=',
										'type'    => 'CHAR',
									);
								} 
							}

							if (!empty($_REQUEST["tsotyp"])) {
								$metaquery["lamptypQuery"] = array(
									'relation' => 'OR',
								);
								
								for ($i = 0; $i<count($_REQUEST["tsotyp"]); $i++) {
									$metaquery["tsotypQuery"]["tsotyp".$i] = array(
										'key'     => '_offer_tsokol',
										'value' => $_REQUEST["tsotyp"][$i],
										'compare' => '=',
										'type'    => 'CHAR',
									);
								} 
							}

							$arg['meta_query'] = $metaquery;
							$arg['post_type'] = "light";
							
                    

							if (isset($_REQUEST["sortByParam"]) && ($_REQUEST["sortByParam"] !== "def")) {
								$arg['orderby'] = 'priceStart';
								$arg['order'] = $_REQUEST["sortByParam"];

							}

							$queryM = new WP_Query($arg);

							
							$paget = isset ($queryM->query["paged"])?$queryM->query["paged"]:0;
							$post_count_start = (int)$queryM->query_vars["posts_per_page"] * (int)$paget;
							$post_count_start = (empty($post_count_start))?1:$post_count_start;
							
							$post_count_end = $post_count_start + $queryM->query_vars["posts_per_page"];
							$post_count_end = (empty($post_count_end))?1:$post_count_end;
							$post_count_end = ($post_count_end > $queryM->post_count)?$queryM->post_count:$post_count_end;
			?>

			<div class="page__body d-flex">

				<aside class="page__side">
					
					<?php  get_template_part('template-parts/filter','in-cat', array("wp_query" =>$wp_query));?>		
					<?php  get_template_part('template-parts/brand-slider-in-cat');?>		
					
				</aside>

				<main class="page__main main">
					<h1>Вы искали: <? echo $_REQUEST["s"]; ?></h1> 

					<?php  get_template_part('template-parts/sort', 'blk-in-cat', array("post_count_start" => $post_count_start, "post_count_end" => $post_count_end, "found_posts" =>  $queryM->found_posts));?>

					<div class="main-prod-card prod-card d-flex">
						<?php
							while($queryM->have_posts()):
								$queryM->the_post();
								get_template_part('template-parts/product-elem'); 
							endwhile;
							wp_reset_postdata();
						?>
					</div>

					<?php  get_template_part('template-parts/page','navigation-in-cat', array("max_num_pages" => $queryM->max_num_pages));?>
					<?php  get_template_part('template-parts/banner', 'incat'); ?>


				</main>

			</div>

		</div>
	</section>

	<?php get_template_part('template-parts/logist-section');?>

	<?php get_template_part('template-parts/advant-section');?>

	<!-- </main> -->

	<?php get_footer(); ?>  