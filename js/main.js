
function number_format () {
	let elements = document.querySelectorAll('.price_formator');
	for (let elem of elements) {
	  elem.dataset.realPrice = elem.innerHTML; 
	  elem.innerHTML = Number(elem.innerHTML).toLocaleString('ru-RU');
	}
  }

//Маска для телефона
  let mascedPhoneElem = document.querySelectorAll('input[type=tel]');
 console.log(mascedPhoneElem); 
  if (mascedPhoneElem != undefined) 
  for (let elem of mascedPhoneElem) { 
	IMask(elem, {
		mask: '+{7}(000)000-00-00',
		lazy: true,  // make placeholder always visible
		placeholderChar: '_'     // defaults to '_'
	});
  }

//-------------------------------------Корзина

let cart = [];
let cartCount = 0;

function cart_recalc () {
	cart = JSON.parse(localStorage.getItem("cart"));
	if (cart == null) cart = [];
	cartCount = 0;
	cartSumm = 0;
	for (let i = 0; i<cart.length; i++){
	  cartCount += Number(cart[i].count);
  
	  cartSumm += Number(cart[i].count) * parseFloat(cart[i].price);
	}
  
	localStorage.setItem("cartcount", cartCount);
	localStorage.setItem("cartsumm", cartSumm);
  
	let elements = document.querySelectorAll('.cart_count_input');
	for (let elem of elements) {
	  elem.innerHTML = cartCount;
	}
  
  }
  
  function add_tocart(elem, countElem) {
	
	  
	  let cartElem = {
		sku: elem.dataset.sku,
		lnk:elem.dataset.lnk,
		price: elem.dataset.price,
		priceold: elem.dataset.oldprice,
		subtotal:elem.dataset.price,
		name: elem.dataset.name,
		count: (countElem == 0)?elem.dataset.count:countElem,
		picture: elem.dataset.picture 
	  };
  
	  if (cart.length == 0)
	  {
		cart.push(cartElem);
	  } else {
		let addet = true;
		for (let i = 0; i<cart.length; i++){
		  if (cart[i].sku == cartElem.sku) {
			cart[i].count++;
			cart[i].subtotal = Number(cart[i].count) * parseFloat(cart[i].price);
			addet = false;
			break;
		  }
		}
  
		if (addet)
		  cart.push(cartElem);
	  }
	  
	  localStorage.setItem("cart", JSON.stringify (cart) );
	  cart_recalc ();
  
	  console.log(cartElem);
  }

//-------------------------------------





  document.addEventListener("DOMContentLoaded", ()=>{ 
	number_format ();
	cart_recalc ();
  });

$ = jQuery;

$(document).ready(function() {

var isMobile = { Android: function () { return navigator.userAgent.match(/Android/i); }, BlackBerry: function () { return navigator.userAgent.match(/BlackBerry/i); }, iOS: function () { return navigator.userAgent.match(/iPhone|iPad|iPod/i); }, Opera: function () { return navigator.userAgent.match(/Opera Mini/i); }, Windows: function () { return navigator.userAgent.match(/IEMobile/i); }, any: function () { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); } };
if (isMobile.any()) { }

if (location.hash) {
	var hsh = location.hash.replace('#', '');
	if ($('.popup-' + hsh).length > 0) {
		popupOpen(hsh);
	} else if ($('div.' + hsh).length > 0) {
		$('body,html').animate({ scrollTop: $('div.' + hsh).offset().top, }, 500, function () { });
	}
}
$('.wrapper').addClass('loaded');

var act = "click";
if (isMobile.iOS()) {
	var act = "touchstart";
}

//BURGER
let iconMenu = document.querySelector(".icon-menu");
let body = document.querySelector("body");
let menuBody = document.querySelector(".mob-menu");
if (iconMenu) {
	iconMenu.addEventListener("click", function () {
		iconMenu.classList.toggle("active");
		body.classList.toggle("lock");
		menuBody.classList.toggle("active");
	});
}

// Открытие ПК меню
// let menuCat = document.querySelector(".menu__catalogy"); 
// if (menuCat) {
// 	menuCat.addEventListener("click", function () {
// 		// menuCat.classList.toggle("active");
// 		// body.classList.toggle("lock");
// 		menuBody.classList.toggle("active");
// 	});
// }

if (document.body.clientWidth>1024){

function hideMenu() {
  $('.mob-menu').slideUp(600);
}
function showMenu() {
  $('.mob-menu').slideDown(600);
}

$(document).ready(function() {
  $(".menu__catalogy").on("mouseover", showMenu);
  $(".header__menu").on("mouseleave", hideMenu);
});
}

// Открытие каталога

let butcat = document.querySelectorAll(".menu-cat-left__btn");

if (butcat != undefined) {
	for (let btnElem of butcat) { 
		btnElem.addEventListener("click", function (e) {
			e.preventDefault();
			//let triangle = btnElem.querySelector(".icon-menu-left");
			let mcatalog = btnElem.nextElementSibling ;
			mcatalog.classList.toggle("active");
			this.classList.toggle("active");
		});
	}
}


// Открытие меню ползунков
// let butmprice = document.querySelector(".menu-choice__btn");
// let sldform = document.querySelector(".form-choice");
// if (butmprice) {
// 	butmprice.addEventListener("click", function (e) {
// 		e.preventDefault();
// 		sldform.classList.toggle("active");
// 		butmprice.classList.toggle("active");
// 	});
// }

// Строка поиска на мобилках
let mobsearch = document.querySelector(".mob-search");
let headsearch = document.querySelector(".header__search");
if (mobsearch) {
	mobsearch.addEventListener("click", function () {
		headsearch.classList.toggle("active");
	});
}


// Маска телефона
// var inputmask_phone = { "mask": "+9(999)999-99-99" };
// jQuery("input[type=tel]").inputmask(inputmask_phone);




//Валидация телефона + Отправщик
jQuery('.footer__forms button').click(function (e) {
	e.preventDefault();

	let persPhone = jQuery('.footer__forms input[name=email]').val();
	if ((persPhone == "") || (persPhone.indexOf("_") > 0)) {
		$(this).siblings('input[name=email]').css("background-color", "#ff91a4")
		return;
	}

	var jqXHR = jQuery.post(
		"../sender/send.php",
		{
			phone: jQuery('.footer__forms input[name=tel]').val(),
			name: jQuery('.footer__forms input[name=name]').val(),
			mail: jQuery('.footer__forms textarea[name=text]').val(),
		}

	);

	jqXHR.done(function (responce) {
		console.log(responce);
		document.location.href = "../thank-you.html";
		jQuery('.footer__forms input[name=tel]').val("");
		jQuery('.footer__forms input[name=name]').val("");
		jQuery('.footer__forms textarea[name=text]').val("");
	});

	jqXHR.fail(function (responce) {
		console.log(responce);
		alert("Произошла ошибка попробуйте позднее!");
	});

});


// Slider на главной
$('.info-sl__slider').slick({
	arrows: false,
	dots: true,
	infinite: true,
	speed: 1000,
	slidesToShow: 1,
	autoplay: true,
	autoplaySpeed: 1800,
	adaptiveHeight: true
});


// Slider в Сайдбаре
$('.sidebar-slider').slick({
	arrows: true,
	dots: false,
	infinite: true,
	speed: 1000,
	slidesToShow: 1,
	autoplay: true,
	// autoplaySpeed: 1800,
	adaptiveHeight: true,
	vertical: true
});


// Slider Товара
$('.select-prod-slider').slick({
	arrows: false,
	dots: false,
	infinite: true,
	speed: 1000,
	slidesToShow: 4,
	slidesToScroll: 1,
	centerMode: true,
	focusOnSelect: true,
	autoplaySpeed: 1800,
	asNavFor: ".select-slider-big",
	adaptiveHeight: true
});
$('.select-slider-big').slick({
	arrows: false,
	dots: false,
	fade: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	draggable: false,
	asNavFor: ".select-prod-slider"
});


$(".fancybox2").fancybox();


// Выбо колличества
$('.minus').click(function () {
	var $input = $(this).parent().find('input');
	var count = parseInt($input.val()) - 1;
	count = count < 1 ? 1 : count;
	$input.val(count);
	$input.change();
	return false;
});
$('.plus').click(function () {
	var $input = $(this).parent().find('input');
	$input.val(parseInt($input.val()) + 1);
	$input.change();
	return false;
});


	//RANGE
	if($("#range" ).length>0){
		$("#range" ).slider({
			range: true,
			min: 0,
			max: 500000,
			values: [$("#rangefrom").val(), $("#rangeto").val()],
			slide: function( event, ui ){
				$('#rangefrom').val(ui.values[0]);
				$('#rangeto').val(ui.values[1]);
				$(this).find('.ui-slider-handle').eq(0).html('<span>'+ui.values[0]+'</span>');
				$(this).find('.ui-slider-handle').eq(1).html('<span>'+ui.values[1]+'</span>');  
			},
			change: function( event, ui ){
				if(ui.values[0]!=$( "#range" ).slider( "option","min") || ui.values[1]!=$( "#range" ).slider( "option","max")){
					$('#range').addClass('act');
				}else{
					$('#range').removeClass('act');
				}
			}
		});
	
		$('#rangefrom').val($( "#range" ).slider( "values", 0 )); 
		$('#rangeto').val($( "#range" ).slider( "values", 1 ));
		
		// $('#rangefrom').val($("#rangefrom").val()); 
		// $('#rangeto').val($("#rangeto").val());

		$("#range" ).find('.ui-slider-handle').eq(0).html('<span>'+$( "#range" ).slider( "option","min")+'</span>');
		$("#range" ).find('.ui-slider-handle').eq(1).html('<span>'+$( "#range" ).slider( "option","max")+'</span>');
		
		$( "#rangefrom" ).bind("change", function(){
			if($(this).val()*1>$( "#range" ).slider( "option","max")*1){
				$(this).val($( "#range" ).slider( "option","max"));
			}
			if($(this).val()*1<$( "#range" ).slider( "option","min")*1){
				$(this).val($( "#range" ).slider( "option","min"));
			}
			$("#range" ).slider( "values",0,$(this).val());
		});
		$( "#rangeto" ).bind("change", function(){
			if($(this).val()*1>$( "#range" ).slider( "option","max")*1){
				$(this).val($( "#range" ).slider( "option","max"));
			}
			if($(this).val()*1<$( "#range" ).slider( "option","min")*1){
				$(this).val($( "#range" ).slider( "option","min"));
			}
			$("#range" ).slider( "values",1,$(this).val());
		});
		$("#range" ).find('.ui-slider-handle').eq(0).addClass('left');
		$("#range" ).find('.ui-slider-handle').eq(1).addClass('right');
	}


if ($('.t,.tip').length > 0) {
	tip();
}
function tip() {
	$('.t,.tip').webuiPopover({
		placement: 'top',
		trigger: 'hover',
		backdrop: false,
		//selector:true,
		animation: 'fade',
		dismissible: true,
		padding: false,
		//hideEmpty: true
		onShow: function ($element) { },
		onHide: function ($element) { },
	}).on('show.webui.popover hide.webui.popover', function (e) {
		$(this).toggleClass('active');
	});
}

});
