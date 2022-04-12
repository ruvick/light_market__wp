<div class="prod-card__body d-flex">

    <? 
    $sticker = carbon_get_post_meta($args['element']->ID, "offer_sticker");
    if (!empty($sticker)) {?>
        <span class="prod-card__sale new-sale"><?echo $sticker;?></span>
    <?}?>

    <? 
    $sale = carbon_get_post_meta($args['element']->ID, "offer_sale");
    if (!empty($sale)) {?>
    		<span class="prod-card__sale"><?echo $sale;?></span>
    <?}?>

	<a href="<?echo get_the_permalink($args['element']->ID);?>" class="prod-card__link">
		<img loading="lazy" src="<?php  $imgTm = get_the_post_thumbnail_url( $args['element']->ID, "tominiatyre" ); echo empty($imgTm)?get_bloginfo("template_url")."/img/no-photo.jpg":$imgTm; ?>" alt="<? the_title();?>">
	</a>

	<div class="prod-card__text">
		<a href="<?echo get_the_permalink($args['element']->ID);?>">
			<h4><? the_title();?></h4>
		</a>
		<p class="prod-card__manuf"><?echo carbon_get_post_meta($args['element']->ID,"offer_manufact"); ?></p>
		<p class="prod-card__avail"><?
			$count = carbon_get_post_meta($args['element']->ID,"offer_nal_count");
			if (!empty($count))
				echo "В наличии";
			else 	
				echo "Под заказ";
			?></p>
	</div>
	<div class="prod-card__price-item d-flex">
		<?
			$mprice = (float)carbon_get_post_meta($args['element']->ID, "offer_price");		
			$mpriceold = (float)carbon_get_post_meta($args['element']->ID, "mod_old_price");		
		?>

		<p class="prod-card__price rub price_formator"><? echo $mprice; ?> </p>
		<a href="#" class="btn" onclick = "add_tocart(this, 0); return false;" 
			data-price = "<? echo $mprice?>"
			data-sku = "<? echo carbon_get_post_meta($args['element']->ID,"offer_sku")?>"
			data-oldprice = "<? echo $mpriceold;?>"
			data-lnk = "<? echo  get_the_permalink($args['element']->ID);?>"
			data-name = "<? echo  get_the_title();?>"
			data-count = "1"
			data-picture = "<?echo $imgTm;?>"

		>В корзину</a> 
	</div>
</div>