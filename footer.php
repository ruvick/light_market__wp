<footer id="footer" class="footer">
  <div class='container'>
    <div class="footer__row d-flex">

      <div class="footer__col footer__col_forms">
        <h3>Закажите обратный звонок:</h3>

        <form action="#" class="footer__forms d-flex">
          <input type="tel" placeholder="+7(___)___-__-__" name="tel" class="input">
          <button class="btn">Подписаться</button>
        </form>

        <div class="header__callback callback d-flex">
          <p><a href="tel:<? echo preg_replace('/[^0-9]/', '', $tel); ?>" class="callback__phone"><? echo $tel = carbon_get_theme_option("as_phones_1"); ?></a></p>
          <a href="#" class="callback__popup">Заказать обратный звонок</a>
        </div>

        <p class="footer__info-text">
          2012 — 2021г. «Интернет-магазин» Маркет Света» ©
        </p>
      </div>

      <div class="footer__col" id = "footer_cat_menu">
        <h3>Каталог товаров</h3>
        <?php wp_nav_menu( array('theme_location' => 'menu_main','container' => false )); ?>
      </div>

      <div class="footer__col">
        <h3>Актуальные предложения</h3>
        <?php wp_nav_menu( array('theme_location' => 'menu_footer_actual','container' => false )); ?>
      </div>

      <div class="footer__col">
        <h3>Информация</h3>
        <?php wp_nav_menu( array('theme_location' => 'menu_corp', 'container' => false )); ?>
      </div>

    </div>
  </div>
</footer>  

<footer id="footer-bot" class="footer-bot">
  <div class='container'>
    <div class="footer-bot__row d-flex">

      <div class="footer-bot__item d-flex">
        <p>Способы оплаты</p>
        <img src="<?php echo get_template_directory_uri();?>/img/mir.jpg" alt="">
      </div>

      <div class="footer-bot__item footer-bot__item_l d-flex">
        <p>Социальные сети</p>
        <div class="footer-bot__item-icon d-flex">
          <a href="<? echo carbon_get_theme_option("as_face"); ?>" aria-label="facebook" class="footer__icon icon-face"></a>
          <a href="<? echo carbon_get_theme_option("as_vk"); ?>" aria-label="ВКонтакте" class="footer__icon icon-vk"></a>
          <a href="<? echo carbon_get_theme_option("as_youtube"); ?>" aria-label="youtube" class="footer__icon icon-youtube"></a>
          <a href="<? echo carbon_get_theme_option("as_insta"); ?>" aria-label="instagram" class="footer__icon icon-insta"></a>
        </div>
      </div>

    </div>
  </div>
</footer> 
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="js/vendors.js"></script>
<script src="js/main.js"></script>
<script src="js/custom.js" ></script>  -->

<?php wp_footer(); ?> 
</body>

</html> 
