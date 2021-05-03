<?php 

/*
Template Name: Шаблон карточки товара (Default)

*/

get_header(); 

$categoryID = get_queried_object()->term_id;
$category = get_the_category(); 

?>

<?php get_template_part('template-parts/header-section');?>

<main id="primary" class="site-main">

	<section id="select-prod" class="select-prod"> 
		<div class="container">

            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<div class="breadcrumb">','</div>' );
                }
            ?>

            <?
                $pagePrice = (float)carbon_get_the_post_meta('offer_price' );
                $pagePriceOld = (float)carbon_get_the_post_meta('offer_old_price' );
            ?>

			<h1><?the_title();?></h1>

			<div class="select-prod-block d-flex">

				<div class="select-prod-sl">
					<div class="sl-big__icon-sale">
						<?if (carbon_get_the_post_meta('offer_sticker' ) ){?>
                            <span class="prod-card__sale new-sale"><? echo carbon_get_the_post_meta('offer_sticker' )?></span>
                        <?}?>
						
                        <?if (($pagePrice < $pagePriceOld)&&(!empty($pagePriceOld))){?>
                            <span class="prod-card__sale sl-big__sale">-<?echo round(($pagePriceOld - $pagePrice)/($pagePriceOld / 100));?>%</span>
                        <?}?>
					</div>
					
                    <!-- 
                        <div class="sl-big__icon-img">
						    <img src="<?php echo get_template_directory_uri();?>/img/sl-big__icon.jpg" alt="">
					    </div> 
                    -->

					<!-- Большой слайдер -->
					<div class="select-slider-big">
                        
                        <?
                            $pict = carbon_get_the_post_meta('offer_picture');
                            if($pict) {
                            $pictIndex = 0;
                            foreach($pict as $item) {
                        ?>
                            <div class="select-slider-big__item">
                                <a class="fancybox" data-fancybox="gallery" href="<?php echo wp_get_attachment_image_src($item['gal_img'], 'full')[0];?>">
                                    <img 
                                        class="slider-for__item"
                                        id = "pict-<? echo empty($item['gal_img_sku'])?$pictIndex:$item['gal_img_sku']; ?>" 
                                        alt = "<? echo $item['gal_img_alt']; ?>"
                                        title = "<? echo $item['gal_img_alt']; ?>"
                                        src = "<?php echo wp_get_attachment_image_src($item['gal_img'], 'full')[0];?>" />

                                </a>
                            </div>

                        <?
                                if ($pictIndex == 0 ) $imgTm = wp_get_attachment_image_src($item['gal_img'], 'full')[0];
                                $pictIndex++;
                            }
                            }
                        ?>
					</div>

					<!-- Малый слайдер -->
					<div class="select-prod-slider">

                        <?
                            $pict = carbon_get_the_post_meta('offer_picture');
                            if($pict) {
                            $pictIndex = 0;
                            foreach($pict as $item) {
                        ?>
                            <div class="select-prod-slider__item">
                            <img 
                                class="slider-nav__item"
                                data-indexelem = "<?echo $i;?>"
                                id = "<? echo $item['gal_img_sku']; ?>" 
                                alt = "<? echo $item['gal_img_alt']; ?>"
                                title = "<? echo $item['gal_img_alt']; ?>"
                                src = "<?php echo wp_get_attachment_image_src($item['gal_img'], 'thumbnail')[0];?>" />
						    </div>
                        <?
                                $pictIndex++;
                            }
                            }
                        ?>


					</div>
				</div>

				<div class="select-prod__price">

					<div class="selc-price">

						<div class="selc-price__number">
							<p class="selc-price__numer rub price_formator"><?echo $pagePrice;?></p>
                            <?if (($pagePrice < $pagePriceOld)&&(!empty($pagePriceOld))){?>
                                <p class="selc-price__numer_old rub price_formator"><?echo $pagePriceOld;?></p>
                            <?}?>
							<p class="selc-price__avail">На складе <? echo carbon_get_the_post_meta('offer_nal_count' )?> штук</p>
						</div>

						<div class="selc-price__act">
							<div class="selc-price__bascet d-flex">
								<div class="number d-flex">
									<span class="minus">-</span>
									<input id = "pageNumeric" type="text" value="1" size="5"/>
									<span class="plus">+</span>
								</div>
								<a href="#" class="btn" onclick = "add_tocart(this, document.getElementById('pageNumeric').value); return false;"
                                
                                    data-price = "<? echo $pagePrice?>"
			                        data-sku = "<? echo carbon_get_post_meta(get_the_ID(),"offer_sku")?>"
			                        data-oldprice = "<? echo $pagePriceOld?>"
			                        data-lnk = "<? echo  get_the_permalink(get_the_ID());?>"
			                        data-name = "<? echo  get_the_title();?>"
			                        data-count = "1"
			                        data-picture = "<?echo $imgTm;?>"
                                
                                >В корзину</a>
							</div>
							<p class="selc-price___cheap tip" data-content="Нашли дешевле? Сделаем скидку.">Нашли дешевле</p>
						</div>

						<ul class="selc-price__char-list">
							<?if (carbon_get_the_post_meta('offer_sku')) {?> <li>Артикул: <?echo carbon_get_the_post_meta('offer_sku'); ?></li> <? } ?>
							<?if (carbon_get_the_post_meta('offer_brend')) {?> <li>Бренд: <?echo carbon_get_the_post_meta('offer_brend'); ?></li> <? } ?>
                            <?if (carbon_get_the_post_meta('offer_strana')) {?> <li>Страна бренда: <?echo carbon_get_the_post_meta('offer_strana'); ?></li> <? } ?>
                            <?if (carbon_get_the_post_meta('offer_collection')) {?> <li>Коллекция: <?echo carbon_get_the_post_meta('offer_collection'); ?></li> <? } ?>
                            <?if (carbon_get_the_post_meta('offer_style')) {?> <li>Стиль: <?echo carbon_get_the_post_meta('offer_style'); ?></li> <? } ?>
						</ul>
						<a href="#allCherecterInPahe" class="selc-price__char-link">Все характеристики</a>

					</div>

					<div class="select-prod__callback">

						<form class="callback-form d-flex" action="#">
              <div class="headen_form_blk">
							  <input id="form-callback-tel" class="callback-form__input" type="tel" placeholder="+ 7 (___)___-__-__">
              </div>
              <div class="SendetMsg">
							  <input class="callback-form__input" type="tel" placeholder="Заявка отправленна!">
              </div>
							<button class="callback-form__btn btn">Перезвонить</button> 
							<label>
								<input checked type="checkbox" name="type[]">
								<p>
									Я ознакомился и принимаю условия"Политики 
									конфиденциальности" и "Информированного согласия"
								</p>
							</label>
						</form>

					</div>

				</div>

			</div>

			<div class="select-prod__wrap-text">
				<div class="techchar-prod">
					<h2 id = "allCherecterInPahe">Технические характеристики</h2>

					<div class="tech-text__row d-flex">

						<div class="tech-text__block-cl">
							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Основные</h4>
								</div>
                                <div class="table_cerecter">
                                    <?if (carbon_get_the_post_meta('offer_sku')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Артикул</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_sku');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_brend')) {?>
                                        <div class="tech-text__block d-flex ">
                                            <div class="tech-text__item tech-text__item_left">Бренд </div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_brend');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_strana')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Страна бренда </div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_strana');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_collection')) {?>
                                        <div class="tech-text__block d-flex ">
                                            <div class="tech-text__item tech-text__item_left">Коллекция</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_collection');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_style')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Стиль</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_style');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_color_light')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Цвет свечения</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_color_light');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_plosh')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Площадь освещения</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_plosh');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_light_potok')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Световой поток</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_light_potok');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_kod_tov')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Cпособ крепления</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_kod_tov');?></div>
                                        </div>
                                    <?}?>
                                </div>
							</div>

							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Размеры</h4>
								</div>
                                <div class="table_cerecter">
                                    
                                    <?if (carbon_get_the_post_meta('offer_visota')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left"> Высота, мм </div>
                                            <div class="tech-text__item tech-text__item_right"> <?echo carbon_get_the_post_meta('offer_visota');?> </div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_shirina_diametr')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Ширина/Диаметр, мм</div>
                                            <div class="tech-text__item tech-text__item_right"><? echo carbon_get_the_post_meta('offer_shirina_diametr');?></div>
                                        </div>
                                    <?}?>
                                    
                                    <?if (carbon_get_the_post_meta('offer_dlinna')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Длина, мм</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_dlinna'); ?></div>
                                        </div>
                                    <?}?>
                                    
                                    <?if (carbon_get_the_post_meta('offer_forma')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Форма</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_forma'); ?></div>
                                        </div>
                                    <?}?>

							    </div>
							</div>

							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Лампы</h4>
								</div>
                                <div class="table_cerecter">
                                    <?if (carbon_get_the_post_meta('offer_tsokol')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Тип цоколя </div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_tsokol')?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_lamp_type')) {?>
                                        <div class="tech-text__block d-flex ">
                                            <div class="tech-text__item tech-text__item_left">Тип лампы</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_lamp_type');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_lamp_count')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Количество ламп </div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_lamp_count');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_lamp_mosh')) {?>
                                        <div class="tech-text__block d-flex ">
                                            <div class="tech-text__item tech-text__item_left">Мощность лампы, W</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_lamp_mosh');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_ob_mosh')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Общая мощность, W</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_ob_mosh')?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_napr')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Напряжение, V</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_napr');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_lamp_complect')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Лампы в комплекте</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_lamp_complect');?></div>
                                        </div>
                                    <?}?>
                                
							    </div>
							</div>

						</div>

						<!-- Правая колонка -->
						<div class="tech-text__block-cl">

							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Цвет и материал</h4>
								</div>
                                <div class="table_cerecter">
                                    <?if (carbon_get_the_post_meta('offer_material_plaf')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left"> Материал плафона</div>
                                            <div class="tech-text__item tech-text__item_right"> <?echo carbon_get_the_post_meta('offer_material_plaf');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_material_arm')) {?>
                                        <div class="tech-text__block d-flex tgrey">
                                            <div class="tech-text__item tech-text__item_left"> Материал арматуры </div>
                                            <div class="tech-text__item tech-text__item_right"> <?echo carbon_get_the_post_meta('offer_material_arm');?> </div>
                                        </div>
                                    <?}?>


                                    <?if (carbon_get_the_post_meta('offer_color_plaf')) {?>
                                        <div class="tech-text__block d-flex tgrey">
                                            <div class="tech-text__item tech-text__item_left">Цвет плафона</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_color_plaf');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_plaf_form')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Форма плафона </div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_plaf_form');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_color_arm')) {?>
                                        <div class="tech-text__block d-flex tgrey">
                                            <div class="tech-text__item tech-text__item_left">Цвет арматуры </div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_color_arm');?></div>
                                        </div>
                                    <?}?>

							    </div>
							</div>

							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Дополнительно</h4>
								</div>
                                <div class="table_cerecter">

                                    <?if (carbon_get_the_post_meta('offer_s_z_ip')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Степень защиты IP</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_s_z_ip');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_nazn_pom')) {?>
                                        <div class="tech-text__block d-flex tgrey">
                                            <div class="tech-text__item tech-text__item_left">Назначение помещения</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_nazn_pom');?></div>
                                        </div>
                                    <?}?>

                                    <?if (carbon_get_the_post_meta('offer_mesto')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Место установки</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_nazn_pom');?></div>
                                        </div>
                                    <?}?>
                                
                                    <?if (carbon_get_the_post_meta('offer_pult')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Пульт управления</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_pult');?></div>
                                        </div>
                                    <?}?>
                                
                                    <?if (carbon_get_the_post_meta('offer_vikl')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Выключатель</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_vikl');?></div>
                                        </div>
                                    <?}?>
                                
                                    <?if (carbon_get_the_post_meta('offer_dimmer')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Диммируемость</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_dimmer');?></div>
                                        </div>
                                    <?}?>
                                
                                    <?if (carbon_get_the_post_meta('offer_sunn_battary')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Солнечная батарея</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_sunn_battary');?></div>
                                        </div>
                                    <?}?>
                                
                                    <?if (carbon_get_the_post_meta('offer_dathik')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Датчик движения</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_dathik');?></div>
                                        </div>
                                    <?}?>
                                
                                    <?if (carbon_get_the_post_meta('offer_povorot')) {?>
                                        <div class="tech-text__block d-flex">
                                            <div class="tech-text__item tech-text__item_left">Поворотный</div>
                                            <div class="tech-text__item tech-text__item_right"><?echo carbon_get_the_post_meta('offer_povorot');?></div>
                                        </div>
                                    <?}?>
                                </div>

								<div class="tech-text__footnote">
									<p>*при условии использования светодиодных ламп</p>
								</div>

							</div>

						</div>

					</div>

					<p>
						Информация о технических характеристиках, комплекте поставки, стране изготовления, внешнем виде и цвете товара носит справочный характер и основывается на 
						последних, доступных к моменту публикации, сведениях.
					</p>
				</div>

				<div class="descript-prod">
					<h2>Описание</h2>
					<?the_content();?>
				</div>
			</div>

		</div>
	</section>

	<section id="collection-prod" class="collection-prod"> 
		<div class="container">
			<?
             $series_prod = carbon_get_the_post_meta('offer_collection');
            
                if (empty($series_prod)) {
            ?>
                <h2>Смотрите так же:</h2>
            <?} else {?>
                <h2>Все товары серии:</h2>
            <?}?>
			
            <div class="prod-card d-flex">

            <?
               
                if (empty($series_prod)) {

                    $posts = get_posts( array(
                        'numberposts' => 5,
                        'category'    =>  $category[0]->term_id,
                        'post_type'   => 'light',
                        'orderby' => "rand" 
                    ));

                    foreach ($posts as $mp) {
                        setup_postdata($mp);
                        get_template_part('template-parts/product-elem'); 
                    }
                } else {
                    $current_id = get_the_ID();
                    $args = array(
                      'post_type' => 'light',
                      'post__not_in' => array($current_id),
                      'meta_key' => '_offer_collection',
                      'meta_value' => $series_prod,
                      'posts_per_page' => 5,
                    );

                    $query = new WP_Query($args);
                    if($query->have_posts()) {
                        while($query->have_posts()){
                            $query->the_post();
                            get_template_part('template-parts/product-elem'); 
                            
                        }

                        wp_reset_postdata();
                    }


                }   
            ?>


			</div>

		</div>
	</section>
</main>


<?php get_footer(); ?> 