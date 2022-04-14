<div class="prod-card__body d-flex">

<? 
	// print_r($args);

?>
<? 
    //$sticker = carbon_get_post_meta($args['element']->ID, "offer_sticker");
    if (!empty($sticker)) {?>
        <span class="prod-card__sale new-sale"><?echo $sticker;?></span>
    <?}?>

    <? 
    //$sale = carbon_get_post_meta($args['element']->ID, "offer_sale");
    if (!empty($sale)) {?>
    		<span class="prod-card__sale"><?echo $sale;?></span>
    <?}?>

	<a href="<?echo $args->lnk;?>" class="prod-card__link">
		<img loading="lazy" src="<?php  $imgTm = $args->img_lnk; echo empty($imgTm)?get_bloginfo("template_url")."/img/no-photo.jpg":$imgTm; ?>" alt="<?echo $args->title;?>">
	</a>

	<div class="prod-card__text">
		<a href="<?echo $args->lnk;?>">
			<h4><?echo $args->title;?></h4>
		</a>
		<p class="prod-card__manuf"><?echo $args->offer_brend;?></p>
		<p class="prod-card__avail"><?
			$count = 0;
			if (!empty($count))
				echo "В наличии";
			else 	
				echo "Под заказ";
			?></p>
	</div>
	<div class="prod-card__price-item d-flex">
		<?
			$mprice = (float)$args->offer_price;		
			$mpriceold = (float)$args->offer_old_price;		
		?>

		<p class="prod-card__price rub price_formator"><? echo $mprice; ?> </p>
		<a href="#" class="btn" onclick = "add_tocart(this, 0); return false;" 
			data-price = "<? echo $mprice?>"
			data-sku = "<? echo carbon_get_post_meta($args->id,"offer_sku")?>"
			data-oldprice = "<? echo $mpriceold;?>"
			data-lnk = "<?echo $args->lnk;?>"
			data-name = "<? echo  $args->title;?>"
			data-count = "1"
			data-picture = "<?echo $imgTm;?>"

		>В корзину</a> 
	</div>

</div>