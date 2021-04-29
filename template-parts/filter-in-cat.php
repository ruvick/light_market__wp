
<form id = "filterForm" class="menu-left">
						<input id = "sortByParam" type = "hidden" name = "sortByParam" value = "def">
						<input id = "sortByParam" type = "hidden" name = "s" value = "<?php echo get_search_query() ?>">
						<?
							$listCat = wp_list_categories (array(
								'hierarchical' => true,
								'taxonomy' => "lightcat",
								'child_of' => $args["wp_query"]->queried_object_id,
								'hide_empty' => false,
								'title_li' => '',
								'echo' => 0,
								'show_option_none'   => "",
							) );
						?>
						<? if ((!empty($listCat))&&(!is_search())) {?>
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
								<? $minmax =  getMinMaxPrice($args["wp_query"]->query); ?>
								<script>
									const renge_min = <?echo $minmax[0]?>;
									const renge_max = <?echo $minmax[1]?>;
								</script>
								<div class="form-block__item">
									<div class="category-params-item-price">
										<div class="category-params-item-price-table table">
											<div class="cell">
												<input type="number" name="price_from" value = "<?echo empty($_REQUEST["price_from"])?$minmax[0]:$_REQUEST["price_from"]; ?>" id="rangefrom">
											</div>
											<div class="cell">
												<input type="number" name="price_to" value = "<?echo empty($_REQUEST["price_to"])?$minmax[1]:$_REQUEST["price_to"]; ?>" id="rangeto">
											</div>
										</div>
										<div id="range" class="category-params-item-price-range"></div>
									</div>
								</div>
									
								<button type = "submit" class = "filter_submit">Применить</button>		
							</div> 
							
						</div>

						<? $styleArr = !empty($_REQUEST["style"])?$_REQUEST["style"]:array();?>
						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left <? echo empty($styleArr)?"":"active" ?>">Стиль</button>
							<div class="block__form form-block form-choice <? echo empty($styleArr)?"":"active" ?>" >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										foreach (getFilterList($args["wp_query"]->query, "_offer_style") as $elem){
									?>
										<li><label><input type="checkbox" name="style[]" <? if (in_array($elem, $styleArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									
									<?}?>
									
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
							
						</div>

						<? $formaArr = !empty($_REQUEST["forma"])?$_REQUEST["forma"]:array(); ?>
						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left <? echo (empty($formaArr))?"":"active" ?>">Форма</button>
							<div class="block__form form-block form-choice <? echo (empty($formaArr))?"":"active" ?>" >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										
										foreach (getFilterList($args["wp_query"]->query, "_offer_forma") as $elem){	
									?>
										<li><label><input type="checkbox" name="forma[]" <? if (in_array($elem, $formaArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>					

						<? $plafonMatArr = !empty($_REQUEST["plafmat"])?$_REQUEST["plafmat"]:array(); ?>
						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left <? echo (empty($plafonMatArr))?"":"active" ?>">Материал плафона</button>
							<div class="block__form form-block form-choice <? echo (empty($plafonMatArr))?"":"active" ?>" >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										foreach (getFilterList($args["wp_query"]->query, "_offer_material_plaf") as $elem){	
									?>
										<li><label><input type="checkbox" name="plafmat[]" <? if (in_array($elem, $plafonMatArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
									
									
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>

						<? $plafonColorArr = !empty($_REQUEST["plafclr"])?$_REQUEST["plafclr"]:array(); ?>
						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left <? echo (empty($plafonColorArr))?"":"active" ?>">Цвет плафона</button>
							<div class="block__form form-block form-choice <? echo (empty($plafonColorArr))?"":"active" ?>" >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										foreach (getFilterList($args["wp_query"]->query, "_offer_color_plaf") as $elem){
									?>
										<li><label><input type="checkbox" name="plafclr[]" <? if (in_array($elem, $plafonColorArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>

						<? $lampTypeArr = !empty($_REQUEST["lamptyp"])?$_REQUEST["lamptyp"]:array(); ?>
						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left <? echo (empty($lampTypeArr))?"":"active" ?>">Тип лампы</button>
							<div class="block__form form-block form-choice <? echo (empty($lampTypeArr))?"":"active" ?>" >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										foreach (getFilterList($args["wp_query"]->query, "_offer_lamp_type") as $elem){
									?>
										<li><label><input type="checkbox" name="lamptyp[]" <? if (in_array($elem, $lampTypeArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
	
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>

						<? $tsokTypeArr = !empty($_REQUEST["tsotyp"])?$_REQUEST["tsotyp"]:array(); ?>
						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left <? echo (empty($tsokTypeArr))?"":"active" ?>">Тип цоколя</button>
							<div class="block__form form-block form-choice <? echo (empty($tsokTypeArr))?"":"active" ?>" >
								<div class = "filter_wrapper">
								<ul>
									<?php 
										foreach (getFilterList($args["wp_query"]->query, "_offer_tsokol") as $elem){
									?>
										<li><label><input type="checkbox" name="tsotyp[]" <? if (in_array($elem, $tsokTypeArr)) echo "checked"; ?> value = "<?echo $elem;?>"><?echo $elem;?></label></li>
									<?}?>
									
								</ul>
								<button type = "submit" class = "filter_submit">Применить</button>	
								</div>
							</div>
						</div>

					</form>