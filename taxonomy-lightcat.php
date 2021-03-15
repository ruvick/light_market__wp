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

			<div class="page__body d-flex">

				<aside class="page__side">
					<nav class="menu-left">

						<div class="menu-cat-left"> 
							<button id="cat" class="menu-cat-left__btn icon-menu-left">Каталог</button>
							<ul id="catmenu" class="catmenu">
								<li><label><input type="checkbox" name="type[]">Светильники</label></li>
								<li><label><input type="checkbox" name="type[]">Подвесные</label></li>
								<li><label><input type="checkbox" name="type[]">Потолочные</label></li>
								<li><label><input type="checkbox" name="type[]">Настенные</label></li>
								<li><label><input type="checkbox" name="type[]">Настенно-потолочные</label></li>
								<li><label><input type="checkbox" name="type[]">Лофт светильники</label></li>
								<li><label><input type="checkbox" name="type[]">Гипсовые светильники</label></li>
								<li><label><input type="checkbox" name="type[]">Накладные светильники</label></li>
								<li><label><input type="checkbox" name="type[]">Встраиваемые</label></li>
								<li><label><input type="checkbox" name="type[]">Точечные светильники</label></li>
								<li><label><input type="checkbox" name="type[]">Мебельные</label></li>
								<li><label><input type="checkbox" name="type[]">Для растений</label></li>
							</ul>
						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-choice__btn icon-menu-left">Цена, P</button>

							<form class="block__form form-block form-choice" action="#">
								<div class="form-block__item">
									<div class="category-params-item-price">
										<div class="category-params-item-price-table table">
											<div class="cell">
												<input type="text" name="form[]"id="rangefrom">
											</div>
											<div class="cell">
												<input type="text" name="form[]"id="rangeto">
											</div>
										</div>
										<div id="range" class="category-params-item-price-range"></div>
									</div>
								</div>
							</form> 

						</div>

						<div class="menu-choice">
							<button class="menu-choice__btn icon-menu-left">Место применения</button>

						</div>

						<div class="menu-choice">
							<button class="menu-choice__btn icon-menu-left">Форма светильника</button>

						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-choice__btn icon-menu-left">Форма светильника</button>

						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-choice__btn icon-menu-left">Размеры</button>

						</div>


						<div class="menu-choice">
							<button id="cat" class="menu-choice__btn icon-menu-left">Стиль</button>

						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-choice__btn icon-menu-left">Размеры</button>

						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-choice__btn icon-menu-left">Тип лампочки</button>

						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-choice__btn icon-menu-left">Страна</button>

						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-choice__btn icon-menu-left">Степень защиты</button>

						</div>

					</nav>

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

							<select name="form[]" id="" class="select-block">
								<option value="1">Популярные</option>
								<option value="2" option="">Популярные 2</option>
								<option value="3" option="">Популярные 3</option>
								<option value="3" option="">Популярные 4</option>
							</select>

						</div>

						<p>Товары 1-40 из 20975</p>
					</div>

					<div class="main-prod-card prod-card d-flex">
						<?php
						while(have_posts()):
							the_post();
							get_template_part('template-parts/product-elem'); 
						endwhile;
						?>
					</div>


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

					<div class="show-link">
						<a href="#" class="show-link__btn">Показать еще</a>
					</div>

					<nav class="pagination d-flex">
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
					</nav>

					<nav class="navigation pagination" role="navigation">

					</nav>

				</main>

			</div>

		</div>
	</section>

	<?php get_template_part('template-parts/logist-section');?>

	<?php get_template_part('template-parts/advant-section');?>

	<!-- </main> -->

	<?php get_footer(); ?>  