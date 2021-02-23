<?php 

/*
Template Name: Шаблон карточки товара
Template Post Type: post, page, light
*/

get_header(); ?>

<?php get_template_part('template-parts/header-section');?>

<main id="primary" class="site-main">

	<section id="select-prod" class="select-prod"> 
		<div class="container">

			<div class="breadcrumb"> 
				<ul>
					<li><a href="#">Назад</a></li>
					<li><a href="#">/ Маркет</a></li>
					<li><a href="#">/ Света</a></li>
					<li><a href="#">/ Каталог</a></li>
					<li><a href="#">/ Светильники</a></li>
					<li><a href="#">/ Подвесные</a></li>
					<li>/ Подвесной светильник SLV Forchini 1001701</li>
				</ul>
			</div>

			<h1>Подвесной светильник SLV Forchini 100170</h1>

			<div class="select-prod-block d-flex">

				<div class="select-prod-sl">
					<div class="sl-big__icon-sale">
						<span class="prod-card__sale new-sale">NEW</span>
						<span class="prod-card__sale sl-big__sale">-40%</span>
					</div>
					<div class="sl-big__icon-img">
						<img src="<?php echo get_template_directory_uri();?>/img/sl-big__icon.jpg" alt="">
					</div>

					<!-- Большой слайдер -->
					<div class="select-slider-big">

						<div class="select-slider-big__item">
							<a class="fancybox" data-fancybox="gallery" href="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-01.jpg">
								<img  src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-01.jpg" alt="">
							</a>
						</div>

						<div class="select-slider-big__item">
							<a class="fancybox" data-fancybox="gallery" href="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-02.jpg">
								<img  src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-02.jpg" alt="">
							</a>
						</div>

						<div class="select-slider-big__item">
							<a class="fancybox" data-fancybox="gallery" href="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-03.jpg">
								<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-03.jpg" alt="">
							</a>
						</div>

						<div class="select-slider-big__item">
							<a class="fancybox" data-fancybox="gallery" href="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-04.jpg">
								<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-04.jpg" alt="">
							</a>
						</div>

					</div>

					<!-- Малый слайдер -->
					<div class="select-prod-slider">

						<div class="select-prod-slider__item">
							<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-min-01.jpg" alt="">
						</div>

						<div class="select-prod-slider__item">
							<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-min-02.jpg" alt="">
						</div>

						<div class="select-prod-slider__item">
							<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-min-03.jpg" alt="">
						</div>

						<div class="select-prod-slider__item">
							<img src="<?php echo get_template_directory_uri();?>/img/slider-product/sl-prod-min-04.jpg" alt="">
						</div>

					</div>
				</div>

				<div class="select-prod__price">

					<div class="selc-price">

						<div class="selc-price__number">
							<p class="selc-price__numer rub">39 008 </p>
							<p class="selc-price__avail">На складе 12 штук</p>
						</div>

						<div class="selc-price__act">
							<div class="selc-price__bascet d-flex">
								<div class="number d-flex">
									<span class="minus">-</span>
									<input type="text" value="1" size="5"/>
									<span class="plus">+</span>
								</div>
								<a href="#" class="btn">В корзину</a>
							</div>
							<p class="selc-price___cheap tip" data-content="Нашли дешевле? Сделаем скидку.">Нашли дешевле</p>
						</div>

						<ul class="selc-price__char-list">
							<li>Артикул: 1001701</li>
							<li>Бренд: SLV</li>
							<li>Страна бренда: ГЕРМАНИЯ</li>
							<li>Коллекция: Forchini</li>
							<li>Стиль: Современный</li>
						</ul>
						<a href="#" class="selc-price__char-link">Все характеристики</a>

					</div>

					<div class="select-prod__callback">

						<form class="callback-form d-flex" action="#">
							<input class="callback-form__input" type="tel" placeholder="+ 7 (___)___-__-__">
							<button class="callback-form__btn btn">Перезвонить</button>
							<label>
								<input type="checkbox" name="type[]">
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
					<h2>Технические характеристики</h2>

					<div class="tech-text__row d-flex">

						<div class="tech-text__block-cl">
							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Основные</h4>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Артикул 
									</div>
									<div class="tech-text__item">
										1001701
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Бренд 
									</div>
									<div class="tech-text__item tech-text__item_cold">
										SLV
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Страна бренда 
									</div>
									<div class="tech-text__item tech-text__item_cold">
										ГЕРМАНИЯ
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Коллекция
									</div>
									<div class="tech-text__item">
										Forchini
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Стиль 
									</div>
									<div class="tech-text__item tech-text__item_cold">
										Современный
									</div>
								</div>

							</div>

							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Размеры</h4>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Высота, мм
									</div>
									<div class="tech-text__item">
										330
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Диаметр, мм
									</div>
									<div class="tech-text__item">
										700
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Длина цепи, мм
									</div>
									<div class="tech-text__item">
										1500
									</div>
								</div>

							</div>

							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Лампы</h4>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Тип цоколя
									</div>
									<div class="tech-text__item tech-text__item_cold">
										E27
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Тип лампочки (основной)
									</div>
									<div class="tech-text__item">
										Накаливания
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Количество ламп
									</div>
									<div class="tech-text__item">
										1
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Мощность лампы, W
									</div>
									<div class="tech-text__item">
										40
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Общая мощность, W
									</div>
									<div class="tech-text__item">
										40
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Напряжение, V
									</div>
									<div class="tech-text__item">
										230
									</div>
								</div>

							</div>

						</div>

						<!-- Правая колонка -->
						<div class="tech-text__block-cl">

							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Цвет и материал</h4>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Виды материалов
									</div>
									<div class="tech-text__item tech-text__item_cold">
										Стеклянные
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Материал арматуры
									</div>
									<div class="tech-text__item">
										Металл
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Материал плафонов
									</div>
									<div class="tech-text__item">
										Стекло
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Направление плафонов
									</div>
									<div class="tech-text__item">
										Вниз
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Форма плафона 
									</div>
									<div class="tech-text__item tech-text__item_cold">
										Полушар
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Цвет 
									</div>
									<div class="tech-text__item tech-text__item_cold">
										Черный
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Цвет арматуры  
									</div>
									<div class="tech-text__item">
										Черный
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Цвет плафонов 
									</div>
									<div class="tech-text__item">
										Черный
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">

									</div>
									<div class="tech-text__item">

									</div>
								</div>

							</div>

							<div class="tech-text__column">
								<div class="tech-text__title">
									<h4>Дополнительно</h4>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Степень защиты
									</div>
									<div class="tech-text__item">
										IP20
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Интерьер
									</div>
									<div class="tech-text__item tech-text__item_cold">
										Для офиса
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Место установки
									</div>
									<div class="tech-text__item">
										На потолок
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Сфера применения
									</div>
									<div class="tech-text__item">
										Офисные помещения
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Подходит для натяжных потолков 
									</div>
									<div class="tech-text__item">
										Да*
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Гарантия производителя 
									</div>
									<div class="tech-text__item">
										5 лет
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Гарантия магазина 
									</div>
									<div class="tech-text__item">
										12 месяцев
									</div>
								</div>

								<div class="tech-text__block d-flex tgrey">
									<div class="tech-text__item tech-text__item_left">
										Раздел
									</div>
									<div class="tech-text__item tech-text__item_cold">
										Светильники
									</div>
								</div>

								<div class="tech-text__block d-flex">
									<div class="tech-text__item tech-text__item_left">
										Каталог
									</div>
									<div class="tech-text__item tech-text__item_cold">
										Подвесные
									</div>
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
					<p>Великолепная модель 1001701 от немецкой компании SLV относится к коллекции Forchini и отлично подойдет для установки на потолок офиса, оформленном в
						современном стиле. Подвесной светильник SLV Forchini 1001701 с плафонами в виде полушаров осветит помещение площадью 2.7 кв. м. Производитель SLV рекомендует 
						использовать для устройства лампы накаливания с цоколем E27 и мощностью 40 W. Прибор произведен с использованием материалов: стекло и металл и может 
						использоваться для натяжного потолка. Основным цветом товара является черный. Подвесной светильник 1001701 продается по цене 39008 руб. Торопитесь сделать заказ в 
						интернет-магазине
					</p>
				</div>
			</div>

		</div>
	</section>

	<section id="collection-prod" class="collection-prod"> 
		<div class="container">
			<h2>Все товары коллекции</h2>

			<div class="prod-card d-flex">

				<div class="prod-card__body d-flex">
					<!-- <span class="prod-card__sale">-40%</span> -->
					<a href="#" class="prod-card__link">
						<img src="<?php echo get_template_directory_uri();?>/img/product/pr-18.jpg" alt="">
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
						<img src="<?php echo get_template_directory_uri();?>/img/product/pr-19.jpg" alt="">
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
						<img src="<?php echo get_template_directory_uri();?>/img/product/pr-20.jpg" alt="">
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
						<img src="<?php echo get_template_directory_uri();?>/img/product/pr-21.jpg" alt="">
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
						<img src="<?php echo get_template_directory_uri();?>/img/product/pr-22.jpg" alt="">
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
</main>

<?php get_footer(); ?>   
