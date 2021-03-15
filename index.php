<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<section id="info-sl" class="info-sl"> 
	<div class="container">
		<div class="info-sl__row d-flex">

			<div class="info-sl__slider slider">
				<div class="slider__item">
					<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item">
					<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt=""> 
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item filter"> 
					<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item">
					<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item filter">
					<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item">
					<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item filter">
					<img src="<?php echo get_template_directory_uri();?>/img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>
			</div>

			<div class="info-sl__images d-flex">

				<div class="info-sl__img-item img-item-l">
					<img src="<?php echo get_template_directory_uri();?>/img/info-sl-1.jpg" alt="">
					<div class="img-l">
						<p>Светильники <span>до 10 000 рублей</span></p>
						<a href="#" class="btn">Смотреть</a>
					</div>
				</div>

				<div class="info-sl__img-item img-item-r">
					<img src="<?php echo get_template_directory_uri();?>/img/info-sl-2.jpg" alt="">
					<p>CYBER MONDAY <span>до -80%</span></p>
				</div>

			</div>

		</div>
	</div>
</section>

<section id="popular" class="popular">
	<div class="container">
		<h2>Популярные товары</h2>

				<div class="popular__row prod-card d-flex">

        <?
           $args = array(
            'posts_per_page' => 5,
            'post_type' => 'light',
            'tax_query' => array(
              array(
                'taxonomy' => 'lightcat',
                'field' => 'id',
                'terms' => array(4)
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

		<div class="popular__baner">
			<div class="popular__baner-text">
				<h2>ПРЕИМУЩЕСТВА <br> 
					В СТИЛЕ <span>VELE LUCE</span>
				</h2>
				<a href="#" class="btn">Смотреть</a>
			</div>
		</div>

	</div>
</section>

<section id="new-items" class="new-items">
	<div class="container">
		<h2>Новинки</h2>

		<div class="prod-card d-flex">

        <?
           $args = array(
            'posts_per_page' => 5,
            'post_type' => 'light',
            'tax_query' => array(
              array(
                'taxonomy' => 'lightcat',
                'field' => 'id',
                'terms' => array(5)
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

	</div>
</section>

<?php get_template_part('template-parts/logist-section');?>

<?php get_template_part('template-parts/advant-section');?>

<section id="brands" class="brands">
	<div class="container">
		<h2>Только лучшие бренды</h2>

		<div class="brands__row d-flex">

			<div class="brands__item brands__item_gr">
				<img src="<?php echo get_template_directory_uri();?>/img/brands/brands-01.jpg" alt="">
			</div>

			<div class="brands__item">
				<img src="<?php echo get_template_directory_uri();?>/img/brands/brands-02.jpg" alt="">
			</div>

			<div class="brands__item brands__item_gr">
				<img src="<?php echo get_template_directory_uri();?>/img/brands/brands-03.jpg" alt="">
			</div>

			<div class="brands__item">
				<img src="<?php echo get_template_directory_uri();?>/img/brands/brands-04.jpg" alt="">
			</div>

			<div class="brands__item brands__item_gr">
				<img src="<?php echo get_template_directory_uri();?>/img/brands/brands-05.jpg" alt="">
			</div>

			<div class="brands__item">
				<img src="<?php echo get_template_directory_uri();?>/img/brands/brands-06.jpg" alt="">
			</div>

			<div class="brands__item brands__item_gr">
				<img src="<?php echo get_template_directory_uri();?>/img/brands/brands-07.jpg" alt="">
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>