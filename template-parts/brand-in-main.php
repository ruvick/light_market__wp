<section id="brands" class="brands">
	<div class="container">
		<h2>Только лучшие бренды</h2>

		<div class="brands__row d-flex">

            <?
                                
                $terms = get_terms( 'lightbrand', [
                    'hide_empty' => false,
                    'number' => 7
                ] );

                foreach( $terms as $term ) {
            ?>

			<div class="brands__item brands__item_gr">
                <a href = "<?echo  get_term_link($term->term_id, 'lightbrand'); ?>">
                    <img loading="lazy" src="<?php echo get_template_directory_uri();?>/img/brands/<? echo $term->slug; ?>.png" alt="">
                </a>    
            </div>
            <?
                }
            ?>
			

		</div>
	</div>
</section>