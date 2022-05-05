<div id = "categoryFilterLoader" class = "categoryFilterLoader" >
	<div class = "filterLooader"></div>
	<p>Загрузка...</p>
</div>



<form id = "categoryFilterForm" class="menu-left categoryFilterForm">
	<div style = "display:none" class = "flter_pods" id = "flter_pods" >
		
		<div class = "loader_white"></div>
			
		<div class = "loader_info">
			<p  class = "pds_naideno" id = "pds_naideno" class = "naideno"></p>
			<button type = "submit" class = "pds_submit">Показать</button>	
		</div>
	</div>

	<input id = "sortByParam" type = "hidden" name = "sortByParam" value = "def">
						<?
							$sqr =  get_search_query();
							if (!empty($sqr)) {

							
						?>
							<input id = "sortByParam" type = "hidden" name = "s" value = "<?php echo $sqr; ?>">
						<?
							}
						?>
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
								
								<div class="form-block__item">
									<div class="category-params-item-price">
										<div class="category-params-item-price-table table">
											<div class="cell">
												<input data-fname = "Цена" onkeypress = "repaint_filter(this)" type="number" name="price_ot" value = "" id="price_ot">
											</div>
											<div class="cell">
												<input data-fname = "Цена" onkeypress = "repaint_filter(this)" type="number" name="price_do" value = "" id="price_do">
											</div>
										</div>
										<!-- <div id="range" class="category-params-item-price-range"></div> -->
									</div>
								</div>
									
										
							</div> 
							
						</div>

						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left">Бренд</button>
							<div class="block__form form-block form-choice" >
								<div class = "filter_wrapper">
								<ul id = "tov_brand" class = "tov_brand">
									
									
								</ul>
									
								</div>
							</div>
							
						</div>

						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left">Стиль</button>
							<div class="block__form form-block form-choice" >
								<div class = "filter_wrapper">
								<ul id = "tov_style" class = "tov_style">
									
									
								</ul>
									
								</div>
							</div>
							
						</div>

						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left">Форма</button>
							<div class="block__form form-block form-choice" >
								<div class = "filter_wrapper">
								<ul id = "tov_forma" class = "tov_forma">
									
								</ul>
									
								</div>
							</div>
						</div>					

						<div class="menu-choice">
							<button class="menu-cat-left__btn icon-menu-left ">Материал плафона</button>
							<div class="block__form form-block form-choice " >
								<div class = "filter_wrapper">
								<ul>
									
								</ul>
									
								</div>
							</div>
						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left">Цвет плафона</button>
							<div class="block__form form-block form-choice" >
								<div class = "filter_wrapper">
								<ul>

								</ul>
									
								</div>
							</div>
						</div>

						
						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left ">Тип лампы</button>
							<div class="block__form form-block form-choice " >
								<div class = "filter_wrapper">
								<ul>
									
								</ul>
									
								</div>
							</div>
						</div>

						<div class="menu-choice">
							<button id="cat" class="menu-cat-left__btn icon-menu-left ">Тип цоколя</button>
							<div class="block__form form-block form-choice " >
								<div class = "filter_wrapper">
								<ul>
									
								</ul>
									
								</div>
							</div>
						</div>

						<button type = "submit" class = "filter_submit">Применить</button>
						<a onclick = "clearFilter()" href="#" class="clear_filte">Сбросить фильтр</a>
</form>