<section id="info-sl" class="info-sl"> 
	<div class="container">
		<div class="info-sl__row d-flex">

			<div class="info-sl__slider slider">
				<?
                    $sliderM = carbon_get_theme_option('main_page_slider');
                    if($sliderM) {
                        foreach($sliderM as $item) {
                ?>
                    <div class="slider__item">
                        <a href = "<? echo $item['main_slider_lnk']; ?>">
                            <img src="<?php echo wp_get_attachment_image_src( $item['main_slider_img'], 'full')[0];?>" alt="">
                        </a>
                        <? 
                            if (!empty($item['main_slider_text'])) 
                            {
                        ?>
                            <p><? echo $item['main_slider_text']; ?></p>
                        <?
                            }
                        ?>
                    </div>
                <?
                        }
                    }                
                ?>

			
			</div>

			<div class="info-sl__images d-flex">

				<div class="info-sl__img-item img-item-l">
					<img src="<?php echo wp_get_attachment_image_src( carbon_get_theme_option('mini_banner_top_img'), 'full')[0];?>" alt="">
					<div class="img-l">
						<p><? echo carbon_get_theme_option('mini_banner_top_text');?></p>
						<a href="<? echo carbon_get_theme_option('mini_banner_top_lnk');?>" class="btn">Смотреть</a>
					</div>
				</div>

				<div class="info-sl__img-item img-item-r">
					<img src="<?php echo wp_get_attachment_image_src( carbon_get_theme_option('mini_banner_bottom_img'), 'full')[0];?>" alt="">
					<p><? echo carbon_get_theme_option('mini_banner_bottom_text');?></p>
				</div>

			</div>

		</div>
	</div>
</section>