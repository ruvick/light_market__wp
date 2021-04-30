<?php get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<?php  get_template_part('template-parts/main', 'slider-blk'); ?>

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

		<?php  get_template_part('template-parts/banner', 'main-smile'); ?>

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

<?php get_template_part('template-parts/brand-in-main');?>



<section id="about_main" class="about_main page">
	<div class="container">
		<?echo carbon_get_theme_option("about_main");?>
	</div>
</section>

<?php get_footer(); ?>