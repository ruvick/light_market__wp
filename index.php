<?php get_header(); ?>

<header id="header-top" class="header-top"> 
	<div class="container">
		<ul>
			<li><a href="#">Акции</a></li>
			<li><a href="#">Помощь</a></li>
			<li><a href="#">Оплата</a></li>
			<li><a href="#">Доставка</a></li>
			<li><a href="#">О компании</a></li>
			<li><a href="#">Бренды</a></li>
			<li><a href="#">Контакты</a></li>
		</ul>
	</div>
</header>

<header id="header" class="header">  
	<div class="container">

		<div class="header__row-top d-flex">
			<a href="#" class="header__logo logo-icon"></a>

			<div class="menu__icon icon-menu">
				<span></span>
				<span></span>
				<span></span>
			</div>

			<div class="header__middle d-flex">
				<div class="header__callback callback d-flex">
					<p><a href="tel:88007006045" class="callback__phone">8 (800) 700-60-45</a></p>
					<a href="#" class="callback__popup">Заказать обратный звонок</a>
				</div>

				<div class="header__search search">
					<input type="text" placeholder="Поиск по сайту" class="search__input input">
					<button type="submit" tabindex="2" id="searchsubmit" class="sub-search" value=""></button>
				</div>
				<button class="mob-search"></button>

				<a href="#" class="header__bascket">Корзина</a>

			</div>
		</div>
	</div>
</header>

<header id="header-bottom" class="header-bottom">
	<div class="container">

		<div class="header__menu menu">
			<nav class="menu__body">
				<ul class="menu__list d-flex">
					<li class="menu__catalogy"><a href="#" class="menu__link">Каталог товаров</a></li>
					<li><a href="#" class="menu__link">Люстры</a></li>
					<li><a href="#" class="menu__link">Светильники</a></li>
					<li><a href="#" class="menu__link">Бра</a></li>
					<li><a href="#" class="menu__link">Настольные лампы</a></li>
					<li><a href="#" class="menu__link">Споты</a></li>
					<li><a href="#" class="menu__link">Торшеры</a></li>
					<li><a href="#" class="menu__link">Уличное освещение</a></li>
					<li><a href="#" class="menu__link">Электротовары</a></li>
					<li class="menu__shares"><a href="#" class="menu__link">Акции</a></li>
				</ul>
			</nav>

			<nav class="mob-menu">
				<div class="mob-menu__df d-flex">
					<ul class="mob-menu__list">
						<li><a href="#" class="menu__link">Люстры</a></li>
						<li><a href="#" class="menu__link">Светильники</a></li>
						<li><a href="#" class="menu__link">Бра</a></li>
						<li><a href="#" class="menu__link">Настольные лампы</a></li>
						<li><a href="#" class="menu__link">Споты</a></li>
						<li><a href="#" class="menu__link">Торшеры</a></li>
						<li><a href="#" class="menu__link">Уличное освещение</a></li>
						<li><a href="#" class="menu__link">Электротовары</a></li>
						<li><a href="#" class="menu__link">Акции</a></li>
					</ul>
					<ul class="mob-menu__addit">
						<li><a href="#">Помощь</a></li>
						<li><a href="#">Оплата</a></li>
						<li><a href="#">Доставка</a></li>
						<li><a href="#">О компании</a></li>
						<li><a href="#">Бренды</a></li>
						<li><a href="#">Контакты</a></li>
					</ul>
				</div>
			</nav>
		</div>

	</div>
</header>

<section id="info-sl" class="info-sl"> 
	<div class="container">
		<div class="info-sl__row d-flex">

			<div class="info-sl__slider slider">
				<div class="slider__item">
					<img src="img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item">
					<img src="img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item filter">
					<img src="img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item">
					<img src="img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item filter">
					<img src="img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item">
					<img src="img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>

				<div class="slider__item filter">
					<img src="img/sl-1.jpg" alt="">
					<p>НОВИНКИ <br>2021</p>
				</div>
			</div>

			<div class="info-sl__images d-flex">

				<div class="info-sl__img-item img-item-l">
					<img src="img/info-sl-1.jpg" alt="">
					<div class="img-l">
						<p>Светильники <span>до 10 000 рублей</span></p>
						<a href="#" class="btn">Смотреть</a>
					</div>
				</div>

				<div class="info-sl__img-item img-item-r">
					<img src="img/info-sl-2.jpg" alt="">
					<p>CYBER MONDAY <span>до -80%</span></p>
				</div>

			</div>

		</div>
	</div>
</section>

<section id="popular" class="popular">
	<div class="container">
		<h2>Популярные товары</h2>

		<div class="popular__row prod-card d-flex">

			<div class="prod-card__body d-flex">
				<!-- <span class="prod-card__sale">-40%</span> -->
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-01.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

			<div class="prod-card__body d-flex">
				<span class="prod-card__sale">-40%</span>
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-02.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

			<div class="prod-card__body d-flex">
				<!-- <span class="prod-card__sale">-40%</span> -->
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-03.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

			<div class="prod-card__body d-flex">
				<span class="prod-card__sale">-20%</span>
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-04.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

			<div class="prod-card__body d-flex">
				<!-- <span class="prod-card__sale">-40%</span> -->
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-05.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

		</div>

		<div class="popular__baner">
			<div class="popular__baner-text">
				<h2>ПРЕИМУЩЕСТВА <br> 
					В СТИЛЕ <span>VELE LUCE</span>
				</h2>
				<a href="#" class="btn">Смотреть</a>
			</div>
		</div>

	</div>
</section>

<section id="new-items" class="new-items">
	<div class="container">
		<h2>Новинки</h2>

		<div class="prod-card d-flex">

			<div class="prod-card__body d-flex">
				<span class="prod-card__sale new-sale">NEW</span>
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-06.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

			<div class="prod-card__body d-flex">
				<span class="prod-card__sale new-sale">NEW</span>
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-07.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

			<div class="prod-card__body d-flex">
				<span class="prod-card__sale new-sale">NEW</span>
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-08.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

			<div class="prod-card__body d-flex">
				<span class="prod-card__sale new-sale">NEW</span>
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-09.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

			<div class="prod-card__body d-flex">
				<span class="prod-card__sale new-sale">NEW</span>
				<a href="#" class="prod-card__link">
					<img src="img/product/pr-10.jpg" alt="">
				</a>

				<div class="prod-card__text">
					<a href="#">
						<h4>Подвесной светильник 
							Lightstar Escica 806010
						</h4>
					</a>
					<p class="prod-card__manuf">Lightstar (ИТАЛИЯ)</p>
					<p class="prod-card__avail">В наличии</p>
				</div>
				<div class="prod-card__price-item d-flex">
					<p class="prod-card__price rub">6 463 </p>
					<a href="#" class="btn">В корзину</a>
				</div>
			</div>

		</div>

	</div>
</section>

<section id="logist" class="logist">
	<div class="container">
		<div class="logist__row d-flex">

			<div class="logist__item">
				<img src="img/logic-01.jpg" alt="">
				<div class="logist__item-text">
					<h3>ДОСТАВКА</h3>
					<p>С нашей помощью купить
						светильники в Москве и
						любом другом городе РФ
						становится легко, выгодно и
						удобно.
					</p>
					<p>
						Мы заботимся о своих
						покупателях и предлагаем
						лучшие условия
						сотрудничества.
					</p>
				</div>
			</div>

			<div class="logist__item">
				<img src="img/logic-02.jpg" alt="">
				<div class="logist__item-text">
					<h3>ГАРАНТИЯ ЛУЧШЕЙ 
						ЦЕНЫ
					</h3>
					<p>
						У нас выгоднее всего!
						Покажите, где можно купить
						конкретный товар дешевле, и
						мы сделаем вам еще более
						выгодное предложение.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="advant" class="advant">
	<div class="container">
		<div class="advant__row d-flex">

			<div class="advant__item advant-icon-01">
				<h4>Обширный <br>
					каталог
				</h4>
				<p>
					Безналичный расчет, 
					электронными деньгами, 
					наличными или картой при 
					курьерской доставке.
				</p>
			</div>

			<div class="advant__item advant-icon-02">
				<h4>Оплачивайте, <br>
					как удобно вам
				</h4>
				<p>
					Безналичный расчет, 
					электронными деньгами, 
					наличными или картой при 
					курьерской доставке.
				</p>
			</div>

			<div class="advant__item advant-icon-03">
				<h4>Простая система <br>
					возврата и обмена
				</h4>
				<p>
					Безналичный расчет, 
					электронными деньгами, 
					наличными или картой при 
					курьерской доставке.
				</p>
			</div>

			<div class="advant__item advant-icon-04">
				<h4>2 года <br>
					гарантии
				</h4>
				<p>
					Безналичный расчет, 
					электронными деньгами, 
					наличными или картой при 
					курьерской доставке.
				</p>
			</div>

			<div class="advant__item advant-icon-05">
				<h4>Шоу-рум <br>
					у вас дома
				</h4>
				<p>
					Безналичный расчет, 
					электронными деньгами, 
					наличными или картой при 
					курьерской доставке.
				</p>
			</div>

		</div>
	</div>
</section>

<section id="brands" class="brands">
	<div class="container">
		<h2>Только лучшие бренды</h2>

		<div class="brands__row d-flex">

			<div class="brands__item brands__item_gr">
				<img src="img/brands/brands-01.jpg" alt="">
			</div>

			<div class="brands__item">
				<img src="img/brands/brands-02.jpg" alt="">
			</div>

			<div class="brands__item brands__item_gr">
				<img src="img/brands/brands-03.jpg" alt="">
			</div>

			<div class="brands__item">
				<img src="img/brands/brands-04.jpg" alt="">
			</div>

			<div class="brands__item brands__item_gr">
				<img src="img/brands/brands-05.jpg" alt="">
			</div>

			<div class="brands__item">
				<img src="img/brands/brands-06.jpg" alt="">
			</div>

			<div class="brands__item brands__item_gr">
				<img src="img/brands/brands-07.jpg" alt="">
			</div>

		</div>
	</div>
</section>

<?php get_footer(); ?>