<script>  
    let bascet_page = "<?echo get_the_permalink(3682); ?>";
    let thencs_page = "<?echo get_the_permalink(3684); ?>";
    let nophoto_page = "<?echo get_bloginfo("template_url");?>/img/no-photo.jpg";
</script>  

<header id="header-top" class="header-top"> 
	<div class="container">
		<?php wp_nav_menu( array('theme_location' => 'menu_corp', 'container' => false )); ?>
	</div>
</header>  

<header id="header" class="header">  
	<div class="container">

		<div class="header__row-top d-flex">
			<a href="https://marketsveta.su" class="header__logo logo-icon"></a> 

			<div class="menu__icon icon-menu">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<div class="header__middle d-flex">
				<div class="header__callback callback d-flex">
					<p><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="callback__phone"><? echo $tel = carbon_get_theme_option("as_phones_1"); ?></a></p>
					<a href="#" class="callback__popup">Заказать обратный звонок</a>
				</div>

				<div class="header__search search">
					<input type="text" placeholder="Поиск по сайту" class="search__input input">
					<button type="submit" tabindex="2" id="searchsubmit" class="sub-search" value=""></button>
				</div>
				<button class="mob-search"></button> 

				<a href="<?echo get_the_permalink(3682);?>" class="header__bascket"> <span class = "cart_count_input" id = "bascet_head_elem">0</span> Корзина</a>

			</div>
		</div>
	</div>
</header>

<header id="header-bottom" class="header-bottom">
	<div class="container">

		<div class="header__menu menu">
			<nav class="menu__body">
				<?php wp_nav_menu( array('theme_location' => 'menu_main','menu_class' => 'menu__list','container_class' => 'menu__list','container' => false )); ?>
			</nav>

			<nav class="mob-menu">
				<div class="mob-menu__df d-flex">
				<?php wp_nav_menu( array('theme_location' => 'menu_cat', 'container' => false )); ?>
					<!-- <ul class="mob-menu__list">
						<li>
							<a href="#" class="menu__link">Люстры</a>
							<ul>
								<li><a href = "#">Пункт1</a></li>
								<li><a href = "#">Пункт1</a></li>
								<li><a href = "#">Пункт1</a></li>
							</ul>
						</li>
						<li><a href="#" class="menu__link">Светильники</a></li>
						<li><a href="#" class="menu__link">Бра</a></li>
						<li><a href="#" class="menu__link">Настольные лампы</a></li>
						<li><a href="#" class="menu__link">Споты</a></li>
						<li><a href="#" class="menu__link">Торшеры</a></li>
						<li><a href="#" class="menu__link">Уличное освещение</a></li>
						<li><a href="#" class="menu__link">Электротовары</a></li>
						<li><a href="#" class="menu__link">Акции</a></li>
					</ul> -->

					<!-- <ul class="mob-menu__addit">
						<li><a href="#">Помощь</a></li>
						<li><a href="#">Оплата</a></li>
						<li><a href="#">Доставка</a></li>
						<li><a href="#">О компании</a></li>
						<li><a href="#">Бренды</a></li>
						<li><a href="#">Контакты</a></li>
					</ul> -->
				</div>
			</nav>
		</div>

	</div>
</header>