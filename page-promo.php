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
      <?
        $prom = carbon_get_the_post_meta('promo__complex');
          if($prom) {
            $promIndex = 0;
            foreach($prom as $itemPr) {
      ?>

      <?php	if (!empty($itemPr['promo_checkbox'])) {
				echo 
          "<a href='" . $itemPr['promo_link'] . "' class='promo__item'>
            <img src='" . wp_get_attachment_image_src($itemPr['promo_img'], 'full')[0] . "' class='promo__img'>
          </a>";
			}
			else {
				echo 
        "<a href='" . $itemPr['promo_link'] . "' class='promo__item'>
          <img src='" . wp_get_attachment_image_src($itemPr['promo_img'], 'full')[0] . "' class='promo__img'>
          <p class='promo__subtitle'>" . $itemPr['promo_subtitle'] . "</p>
          <div class='nuar_blk'></div>
        </a>";
			}

			?> 

      <?
        $promIndex++;
          }
        }
      ?>

      </div>

			</div>
		</section>
	</main>

<?php get_footer();
