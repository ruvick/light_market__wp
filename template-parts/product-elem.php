<div class="prod-card__body d-flex">
	<span class="prod-card__sale new-sale">NEW</span>
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
		<p class="prod-card__price rub"><?echo carbon_get_post_meta(get_the_ID(),"offer_price"); ?> </p>
		<a href="#" class="btn">В корзину</a>
	</div>
</div>