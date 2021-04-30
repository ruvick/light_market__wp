<div class="sidebar-sl">
						<h3>Лучшие бренды</h3>
						<div class="sidebar-slider">
							<?
                                $terms = get_terms( 'lightbrand', [
                                    'hide_empty' => false,
                                ] );

                                foreach( $terms as $term ) {
                            ?>
                                <div class="sidebar-slider__item">
								    <a href = "<?echo  get_term_link($term->term_id, 'lightbrand'); ?>">
                                        <img src="<?php echo get_template_directory_uri();?>/img/brands/<? echo $term->slug; ?>.png" alt="">
                                    </a>
                                </div>
                            <?
                                }
                            ?>

						</div>

					</div>