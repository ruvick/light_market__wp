<div class="prod-card__body d-flex">

    <? 
    $sticker = carbon_get_post_meta(get_the_ID(),"offer_sticker");
    if (!empty($sticker)) {?>
        <span class="prod-card__sale new-sale"><?echo $sticker;?></span>
    <?}?>

    <? 
    $sale = carbon_get_post_meta(get_the_ID(),"offer_sale");
    if (!empty($sale)) {?>
    		<span class="prod-card__sale"><?echo $sale;?></span>
    <?}?>

	<a href="<?echo get_the_permalink(get_the_ID());?>" class="prod-card__link">
		<img src="<?php  $imgTm = get_the_post_thumbnail_url( get_the_ID(), "tominiatyre" ); echo empty($imgTm)?get_bloginfo("template_url")."/img/no-photo.jpg":$imgTm; ?>" alt="<? the_title();?>">
	</a>

	<div class="prod-card__text">
		<a href="<?echo get_the_permalink(get_the_ID());?>">
			<h4><? the_title();?></h4>
		</a>
		<p class="prod-card__manuf"><?echo carbon_get_post_meta(get_the_ID(),"offer_manufact"); ?></p>
		<p class="prod-card__avail"><?echo carbon_get_post_meta(get_the_ID(),"offer_nal"); ?></p>
	</div>
	<div class="prod-card__price-item d-flex">
		<?
			$mprice = (float)carbon_get_post_meta(get_the_ID(),"offer_price");		
			$mpriceold = (float)carbon_get_post_meta(get_the_ID(),"mod_old_price");		
		?>

		<p class="prod-card__price rub price_formator"><? echo $mprice; ?> </p>
		<a href="#" class="btn" onclick = "add_tocart(this, 0); return false;" 
			data-price = "<? echo $mprice?>"
			data-sku = "<? echo carbon_get_post_meta(get_the_ID(),"offer_sku")?>"
			data-oldprice = "<? echo $mpriceold;?>"
			data-lnk = "<? echo  get_the_permalink(get_the_ID());?>"
			data-name = "<? echo  get_the_title();?>"
			data-count = "1"
			data-picture = "<?echo $imgTm;?>"

		>В корзину</a> 
	</div>
</div>