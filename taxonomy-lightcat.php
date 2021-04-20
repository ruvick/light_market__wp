<?php get_header(); ?>

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
							$arg = $wp_query->query;

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
							
							if ($_REQUEST["sortByParam"] !== "def") {
								$arg['orderby'] = 'priceStart';
								$arg['order'] = $_REQUEST["sortByParam"];

							}

							$queryM = new WP_Query($arg);

							// echo "<pre>";
							// print_r($queryM);
							// echo "</pre>";

							$post_count_start = (int)$queryM->query_vars["posts_per_page"] * (int)$queryM->query["paged"];
							$post_count_start = (empty($post_count_start))?1:$post_count_start;
							
							$post_count_end = $post_count_start + $queryM->query_vars["posts_per_page"];
							$post_count_end = (empty($post_count_end))?1:$post_count_end;
							$post_count_end = ($post_count_end > $queryM->post_count)?$queryM->post_count:$post_count_end;
			?>

			<div class="page__body d-flex">

				<aside class="page__side">
					<form id = "filterForm" class="menu-left">
						<input id = "sortByParam" type = "hidden" name = "sortByParam" value = "def">
						<?
							$listCat = wp_list_categories (array(
								'hierarchical' => true,
								'taxonomy' => "lightcat",
								'child_of' => $wp_query->queried_object_id,
								'hide_empty' => false,
								'title_li' => '',
								'echo' => 0,
								'show_option_none'   => "",
							) );
						?>
						<? if (!empty($listCat)) {?>
							<div class="menu-choice"> 
								<button id="cat" class="menu-cat-left__btn icon-menu-left">Подкатегории</button>
								<div class="block__form form-block form-choice" >
									<ul id="catmenu" class=" subcatmenu ">
										<?
											echo $listCat;
										?>	
									</ul>
								</div>
							</div>
						<?}?>

						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left active">Цена, P</button>

							<div class="block__form form-block form-choice active" >
								<div class="form-block__item">
									<div class="category-params-item-price">
										<div class="category-params-item-price-table table">
											<div class="cell">
												<input type="text" name="price_from" value = "<?echo empty($_REQUEST["price_from"])?0:$_REQUEST["price_from"]; ?>" id="rangefrom">
											</div>
											<div class="cell">
												<input type="text" name="price_to" value = "<?echo empty($_REQUEST["price_to"])?500000:$_REQUEST["price_to"]; ?>" id="rangeto">
											</div>
										</div>
										<div id="range" class="category-params-item-price-range"></div>
									</div>
								</div>
									
								<button type = "submit" class = "filter_submit">Применить</button>		
							</div> 
							
						</div>

						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left">Стиль</button>
							<div class="block__form form-block form-choice " >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										$styleArr = !empty($_REQUEST["style"])?$_REQUEST["style"]:array("");
									
										foreach (getFilterList($wp_query->query, "_offer_style") as $elem){
									?>
										<li><label><input type="checkbox" name="style[]" <? if (in_array($elem, $styleArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									
									<?}?>
									
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
							
						</div>

						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left">Форма</button>
							<div class="block__form form-block form-choice " >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										$formaArr = !empty($_REQUEST["forma"])?$_REQUEST["forma"]:array("");
										foreach (getFilterList($wp_query->query, "_offer_forma") as $elem){	
									?>
										<li><label><input type="checkbox" name="forma[]" <? if (in_array($elem, $formaArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>					

						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left">Материал плафона</button>
							<div class="block__form form-block form-choice " >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										$plafonMatArr = !empty($_REQUEST["plafmat"])?$_REQUEST["plafmat"]:array("");
										
										foreach (getFilterList($wp_query->query, "_offer_material_plaf") as $elem){	
									?>
										<li><label><input type="checkbox" name="plafmat[]" <? if (in_array($elem, $plafonMatArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
									
									
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left">Цвет плафона</button>
							<div class="block__form form-block form-choice " >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										$plafonColorArr = !empty($_REQUEST["plafclr"])?$_REQUEST["plafclr"]:array("");
										
										foreach (getFilterList($wp_query->query, "_offer_color_plaf") as $elem){
									?>
										<li><label><input type="checkbox" name="plafclr[]" <? if (in_array($elem, $plafonColorArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left">Тип лампы</button>
							<div class="block__form form-block form-choice " >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										$lampTypeArr = !empty($_REQUEST["lamptyp"])?$_REQUEST["lamptyp"]:array("");
										
										foreach (getFilterList($wp_query->query, "_offer_lamp_type") as $elem){
									?>
										<li><label><input type="checkbox" name="lamptyp[]" <? if (in_array($elem, $lampTypeArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
	
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>


						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left">Тип цоколя</button>
							<div class="block__form form-block form-choice " >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										$tsokTypeArr = !empty($_REQUEST["tsotyp"])?$_REQUEST["tsotyp"]:array("");
										
										foreach (getFilterList($wp_query->query, "_offer_tsokol") as $elem){
									?>
										<li><label><input type="checkbox" name="tsotyp[]" <? if (in_array($elem, $tsokTypeArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
									
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>

					</form>

					<div class="sidebar-sl">
						<h3>Лучшие бренды</h3>
						<div class="sidebar-slider">
							<div class="sidebar-slider__item">
								<img src="<?php echo get_template_directory_uri();?>/img/sidebar-slider/sbar-sl-01.jpg" alt="">
							</div>

							<div class="sidebar-slider__item">
								<img src="<?php echo get_template_directory_uri();?>/img/sidebar-slider/sbar-sl-02.jpg" alt="">
							</div>

							<div class="sidebar-slider__item">
								<img src="<?php echo get_template_directory_uri();?>/img/sidebar-slider/sbar-sl-03.jpg" alt="">
							</div>

							<div class="sidebar-slider__item">
								<img src="<?php echo get_template_directory_uri();?>/img/sidebar-slider/sbar-sl-04.jpg" alt="">
							</div>

							<div class="sidebar-slider__item">
								<img src="<?php echo get_template_directory_uri();?>/img/sidebar-slider/sbar-sl-05.jpg" alt="">
							</div>

							<div class="sidebar-slider__item">
								<img src="<?php echo get_template_directory_uri();?>/img/sidebar-slider/sbar-sl-06.jpg" alt="">
							</div>
						</div>

					</div>

				</aside>

				<main class="page__main main">
					<h1><?php single_cat_title( '', true );?></h1> 

					<div class="main-block__choice d-flex">

						<div class="main-block__select d-flex">
							<p>Сортировать по</p>
							<form id="sortForm" action="">				
							<select onchange= "document.getElementById('sortByParam').value = this.value; document.getElementById('filterForm').submit();" name="sortparam" id="sortSel" class="select-block">
								<option value="def">По умолчанию</option>
								<option value="ASC" option="">По возростанию цены</option>
								<option value="DESC" option="">По убыванию цены</option>
							</select>
							</form>
						</div>

						<p>Товары <?echo $post_count_start?>-<?echo $post_count_end?> из <?echo $queryM->found_posts?></p>
					</div>

					<div class="main-prod-card prod-card d-flex">
						<?php
							while($queryM->have_posts()):
								$queryM->the_post();
								get_template_part('template-parts/product-elem'); 
							endwhile;
							wp_reset_postdata();
						?>
					</div>


					<nav class="navigation pagination " role="navigation">
						<?php 
							$big = 999999999; // уникальное число

							the_posts_pagination( array(
								'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'current' => max( 1, get_query_var('paged') ),
								'total'   => $queryM->max_num_pages,

								'mid_size' => 2,
								'prev_next'    => true,
							) ); 

							

							// echo paginate_links( array(
							// 	'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							// 	'current' => max( 1, get_query_var('paged') ),
							// 	'total'   => $queryM->max_num_pages
							// ) );
								
						?>
					</nav>

					<div class="modern-baner">
						<img src="<?php echo get_template_directory_uri();?>/img/modern-baner.jpg" alt="">
						<div class="modern-baner__text">
							<h3>Современные
								cветильники
							</h3>
							<h3>
								FAVOURITE
							</h3>
						</div>
					</div>

					<div class="main-prod-card prod-card d-flex">

        <?
           $args = array(
            'posts_per_page' => 8,
            'post_type' => 'light',
            'tax_query' => array(
              array(
                'taxonomy' => 'lightcat',
                'field' => 'id',
                'terms' => array(4,5)
              )
            )
          );
          $query = new WP_Query($args);
          
          foreach( $query->posts as $post ){
            $query->the_post();
            get_template_part('template-parts/product-elem');
          }  
          wp_reset_postdata();
        ?>

					</div>

					<!-- <div class="show-link">
						<a href="#" class="show-link__btn">Показать еще</a>
					</div> -->

					<!-- <nav class="pagination d-flex">
				

						<div class="pagination__nav-links d-flex">
							<a class="pagination__back" href="#">Назад</a>
							<span class="pagination__numbers">1</span>
							<a class="pagination__numbers current" href="#">2</a>
							<a class="pagination__numbers" href="#">3</a>
							<a class="pagination__numbers" href="#">4</a>
							<a class="pagination__numbers" href="#">5</a>
							<div class="pagination__block-dot d-flex">
								<span class="pagination__dot">.</span>
								<span class="pagination__dot">.</span>
								<span class="pagination__dot">.</span>
							</div>
							<a class="pagination__numbers" href="#">60</a>
							<a class="pagination__next" href="#">Вперед</a>
						</div>
					</nav> -->



				</main>

			</div>

		</div>
	</section>

	<?php get_template_part('template-parts/logist-section');?>

	<?php get_template_part('template-parts/advant-section');?>

	<!-- </main> -->

	<?php get_footer(); ?>  