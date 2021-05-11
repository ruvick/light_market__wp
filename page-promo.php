<?php 

/*
Template Name: Страница Акции
Template Post Type: page
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main id="primary" class="site-main">

		<section class="content page text-content">
			<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<div class="breadcrumb">','</div>' );
			}
			?> 

			<h1><?php the_title();?></h1>

      <div class="promo__row d-flex">

        <a href="#" class="promo__item">
          <img src="<?php echo get_template_directory_uri();?>/img/promo-1.jpg" class="promo__img" alt="">
          <p class="promo__subtitle">Акция #1</p>
          <div class="nuar_blk"></div>
        </a>

        <a href="#" class="promo__item">
          <img src="<?php echo get_template_directory_uri();?>/img/promo-2.jpg" class="promo__img" alt="">
          <p class="promo__subtitle">Акция #2</p>
          <div class="nuar_blk"></div>
        </a>

        <a href="#" class="promo__item">
          <img src="<?php echo get_template_directory_uri();?>/img/promo-1.jpg" class="promo__img" alt="">
          <p class="promo__subtitle">Акция #3</p>
          <div class="nuar_blk"></div>
        </a>

        <a href="#" class="promo__item">
          <img src="<?php echo get_template_directory_uri();?>/img/promo-2.jpg" class="promo__img" alt="">
          <p class="promo__subtitle">Акция #4</p>
          <div class="nuar_blk"></div>
        </a>

        <a href="#" class="promo__item">
          <img src="<?php echo get_template_directory_uri();?>/img/promo-1.jpg" class="promo__img" alt="">
          <p class="promo__subtitle">Акция #5</p>
          <div class="nuar_blk"></div>
        </a>

        <a href="#" class="promo__item">
          <img src="<?php echo get_template_directory_uri();?>/img/promo-2.jpg" class="promo__img" alt="">
          <p class="promo__subtitle">Акция #6</p>
          <div class="nuar_blk"></div>
        </a>

      </div>

			</div>
		</section>
	</main>

<?php get_footer();
