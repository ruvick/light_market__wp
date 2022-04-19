<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<!-- <main id="primary" class="site-main"> -->

	<div style = "display:none" id = "tovarCategoryId" data-id = "<? echo $thisCatID = get_queried_object()->term_id; ?>"></div>

	<section id="page" class="page"> 
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?> 

			<? 
				$curent_page = (empty($_REQUEST["page_number"]))?1:$_REQUEST["page_number"];
				$rez = get_tovar($thisCatID, ($curent_page-1)*IN_PAGE_COUNT);
			?>

			<div class="page__body d-flex">

				<aside class="page__side">
					
					<?php  get_template_part('template-parts/filter','in-cat-empty', array("wp_query" => $wp_query));?>		
				
				</aside>

				<main class="page__main main">
					<h1><?php single_cat_title( '', true );?></h1> 

					<?php  get_template_part('template-parts/sort', 'blk-in-cat', array("post_count_start" => ($curent_page-1)*IN_PAGE_COUNT, "post_count_end" => (($curent_page-1)*IN_PAGE_COUNT)+IN_PAGE_COUNT, "found_posts" =>  $rez["total_count"]));?>

					<div class="main-prod-card prod-card d-flex">
						<?
							

							foreach ($rez["tovars"] as $tov) {
								$arg = $tov;
								get_template_part('template-parts/product-elem',"param", $arg); 
							}
						?>
					</div>

					<?php  get_template_part('template-parts/page','navigation-in-cat', array("total_count" => $rez["total_count"], "page_number" => $curent_page));?>
					<?php  get_template_part('template-parts/banner', 'incat'); ?>




					<div class="main-prod-card prod-card d-flex">

        <?
        //    $args = array(
        //     'posts_per_page' => 4,
        //     'post_type' => 'light',
        //     'tax_query' => array(
        //       array(
        //         'taxonomy' => 'lightcat',
        //         'field' => 'id',
        //         'terms' => array(4,5)
        //       )
        //     )
        //   );
        //   $query = new WP_Query($args);
          
        //   foreach( $query->posts as $post ){
        //     $query->the_post();
        //     get_template_part('template-parts/product-elem');
        //   }  
        //   wp_reset_postdata();
        ?>

					</div>

				</main>

			</div>

		</div>
	</section>

	<?php get_template_part('template-parts/logist-section');?>

	<?php get_template_part('template-parts/advant-section');?>

	<!-- </main> -->

	<?php get_footer(); ?>  