<?

// Описание полей для Carbon_Fields производим только в этом файле
// 1. В начале идет описание полей - Настройки темы  далее категорий (если необходимо) в конце аблонов страниц и записей
// 2. Префиксы проставляем каждый раз новые осмысленно по имени проекта 
// 3. Для Полей которые входят в состав составново схема именования следующая <Общий префикс>_<название составного поля>_<имя поля>
// 4. Название секций Так же придумываем осмысленные на русском языке чтобы небыло сплошных Доп. полей
// 5. Каждый блок комментируем


use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Настройки темы', 'crb' ) ) 
    ->add_tab('Контакты', array(
        Field::make( 'text', 'as_company', __( 'Название' ) )
          ->set_width(50),
        // Field::make( 'text', 'as_schedule', __( 'Режим работы' ) )
        //   ->set_width(50),
        Field::make( 'text', 'as_phones_1', __( 'Телефон' ) )
          ->set_width(50),
        Field::make( 'text', 'as_phone_2', __( 'Телефон дополнительный' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email', __( 'Email' ) )
          ->set_width(50),
        Field::make( 'text', 'as_email_send', __( 'Email для отправки' ) )
          ->set_width(50),
        Field::make( 'text', 'as_inn', __( 'ИНН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_orgn', __( 'ОРГН' ) )
          ->set_width(50),
        Field::make( 'text', 'as_kpp', __( 'КПП' ) )
          ->set_width(50),
        Field::make( 'text', 'as_address', __( 'Адрес' ) )
          ->set_width(50),
        Field::make( 'text', 'as_bik', __( 'БИК' ) )
          ->set_width(50),
        Field::make( 'text', 'as_rs', __( 'Р/С' ) )
          ->set_width(50),
        Field::make( 'text', 'as_ks', __( 'К/С' ) )
          ->set_width(50),
        Field::make( 'text', 'as_insta', __( 'instagram' ) )
          ->set_width(50),
        Field::make( 'text', 'as_face', __( 'facebook' ) )
          ->set_width(50),
        Field::make( 'text', 'as_vk', __( 'Вконтакте' ) )
          ->set_width(50),
        Field::make( 'text', 'as_youtube', __( 'youtube' ) )
          ->set_width(50),
        Field::make('text', 'map_point', 'Координаты карты')
          ->set_width(50),
        Field::make('text', 'text_map', 'Текст метки карты')
          ->set_width(50),
    ) )->add_tab('О компании на главной', array(
      Field::make('rich_text', 'about_main', 'Текст о компании для главной страницы')->set_width(100)
    ))->add_tab('Баннеры (Категория / главная) ', array(
      Field::make('text', 'bnr_cat_text', 'Банер категории (Текст)')->set_width(30),
      Field::make('text', 'bnr_cat_lnk', 'Банер категории (Ссылка)')->set_width(30),
      Field::make('image', 'bnr_cat_img', 'Банер категории (Картинка)')->set_width(30),

      Field::make('text', 'bnr_main_text', 'Банер главной (Текст)')->set_width(30),
      Field::make('text', 'bnr_main_lnk', 'Банер главной (Ссылка)')->set_width(30),
      Field::make('image', 'bnr_main_img', 'Банер главной (Картинка)')->set_width(30),
    ))->add_tab('Баннеры (Основные) ', array(
      Field::make( 'complex', 'main_page_slider', "Основной слайдер" )
      ->add_fields( array(
        Field::make('text', 'main_slider_text', 'Текст')->set_width(30),
        Field::make('text', 'main_slider_lnk', 'Ссылка')->set_width(30),
        Field::make('image', 'main_slider_img', 'Картинка')->set_width(30),
      ) ),

      Field::make('text', 'mini_banner_top_text', 'Маленький верхний баннер (Текст)')->set_width(30),
      Field::make('text', 'mini_banner_top_lnk', 'Маленький верхний баннер  (Ссылка)')->set_width(30),
      Field::make('image', 'mini_banner_top_img', 'Маленький верхний баннер  (Картинка)')->set_width(30),

      Field::make('text', 'mini_banner_bottom_text', 'Маленький верхний нижний (Текст)')->set_width(30),
      Field::make('text', 'mini_banner_bottom_lnk', 'Маленький верхний нижний  (Ссылка)')->set_width(30),
      Field::make('image', 'mini_banner_bottom_img', 'Маленький верхний нижний  (Картинка)')->set_width(30),
    ));
    
Container::make('post_meta', 'light_product_cr', 'Характеристики товара') 
    ->show_on_post_type(array( 'light'))
      ->add_fields(array(   
      Field::make('textarea', 'offer_smile_descr', 'Краткое описание')->set_width(100),
      Field::make('text', 'offer_name', 'Название товара')->set_width(30),
      Field::make('text', 'offer_manufact', 'Производитель')->set_width(50),
      Field::make('text', 'offer_allsearch', 'Все артикулы для поиска')->set_width(50),

      Field::make('text', 'offer_sku', 'Артикул (Базовый)')->set_width(50),
      Field::make('text', 'offer_nal', 'Наличие на складе')->set_default_value( 'В наличии')->set_width(50), 
      Field::make('text', 'offer_nal_count', 'Колличество на складе')->set_default_value( '1')->set_width(50), 

      Field::make('text', 'offer_sticker', 'Стикер')->set_width(50),
      Field::make('text', 'offer_sale', 'Скидка')->set_width(50),
      
      Field::make( 'complex', 'offer_cherecter', "Характеристики товара" )
      ->add_fields( array(
        Field::make( 'text', 'c_name', 'Наименование параметра' )->set_width(50),
        Field::make( 'text', 'c_val',  'Значение' )->set_width(50),
      ) ),

      Field::make('text', 'offer_price', 'Цена (Базовая)')->set_width(50),
      Field::make('text', 'offer_old_price', 'Старая цена (Базовая)')->set_width(50),
      
      Field::make( 'complex', 'offer_modification', "Модификация товара" )
      ->add_fields( array(
        Field::make('text', 'mod_name', 'Наименование модификации' )->set_width(20),
        Field::make('text', 'mod_sku', 'Артикул модификации')->set_width(20),
        Field::make('text', 'mod_price', 'Цена модификации')->set_width(20),
        Field::make('text', 'mod_old_price', 'Старая цена модификации')->set_width(20),
        Field::make('text', 'mod_picture_id', 'Изображения модификации')->set_width(20),
      ) ),
        
      Field::make( 'complex', 'offer_picture', "Галерея товара" )
      ->add_fields( array(
        Field::make('image', 'gal_img', 'Изображение' )->set_width(30),
        Field::make('text', 'gal_img_sku', 'ID для модификации')->set_width(30),
        Field::make('text', 'gal_img_alt', 'alt и title')->set_width(30)        
      ) ),

      Field::make('rich_text', 'offer_fulltext', 'Полное описание (SEO)')->set_width(50),

      Field::make( 'complex', 'offer_rev', "Отзывы о товаре" )
      ->add_fields( array(
        Field::make('text', 'rev_name', 'Имя' )->set_width(20),
        Field::make('text', 'rev_mail', 'e-mail' )->set_width(20),
        Field::make('date', 'rev_date', 'Дата отзыва' )->set_width(20),
        Field::make('select', 'rev_reiting', 'Оценка' )->add_options( array(
          '1' => '1',
          '2' => '2',
          '3' => '3',
          '4' => '4',
          '5' => '5'
        ) )->set_width(20),
        Field::make('rich_text', 'rev_text', 'Текст отзыва')->set_width(100),
        Field::make('rich_text', 'rev_otv', 'Ответ')->set_width(100)        
      ) ),
      
        //   Поля из XML
      
        Field::make('text', 'offer_brend', 'Бренд')->set_width(100), // -
        Field::make('text', 'offer_style', 'Cтиль')->set_width(100), // -
        Field::make('text', 'offer_forma', 'Форма')->set_width(100), // -

        Field::make('text', 'offer_dlinna', 'Длинна')->set_width(100), //- !
        
        Field::make('text', 'offer_color_arm', 'Цвет арматуры')->set_width(100), // -
        Field::make('text', 'offer_material_arm', 'Материал арматуры')->set_width(100), // -
        Field::make('text', 'offer_color_plaf', 'Цвет плафона')->set_width(100), // -
        Field::make('text', 'offer_material_plaf', 'Материал плафона')->set_width(100), // -
        Field::make('text', 'offer_shirina_diametr', 'Ширина/Диаметр')->set_width(100), // -
        Field::make('text', 'offer_visota', 'Высота')->set_width(100), // -
        Field::make('text', 'offer_lamp_type', 'Тип лампы')->set_width(100), //-
        Field::make('text', 'offer_lamp_mosh', 'Мощьность лампы')->set_width(100), // -
        
        Field::make('text', 'offer_lamp_count', 'Колличество ламп')->set_width(100), // - !

        Field::make('text', 'offer_ob_mosh', 'Мощьность общая')->set_width(100), // -
        Field::make('text', 'offer_napr', 'Напряжение')->set_width(100), // -
        Field::make('text', 'offer_tsokol', 'Тип цоколя')->set_width(100), // -
        Field::make('text', 'offer_s_z_ip', 'Cтепень защиты ip')->set_width(100), // -
        Field::make('text', 'offer_pult', 'Пульт управления')->set_width(100), // -
        Field::make('text', 'offer_vikl', 'Выключатель')->set_width(100), // -
        Field::make('text', 'offer_color_light', 'Цвет свечения')->set_width(100), // -
        Field::make('text', 'offer_dimmer', 'Диммируемость')->set_width(100), // -
        Field::make('text', 'offer_mesto', 'Место установки')->set_width(100), //-
        Field::make('text', 'offer_strana', 'Страна происхождения')->set_width(100), // -
        Field::make('text', 'offer_sunn_battary', 'Солнечная батарея')->set_width(100), // -
        Field::make('text', 'offer_dathik', 'Датчик движения')->set_width(100), // -
        Field::make('text', 'offer_collection', 'Коллекция')->set_width(100), // -
        Field::make('text', 'offer_nazn_pom', 'Назначение помещения')->set_width(100), // -
        Field::make('text', 'offer_plaf_form', 'Форма плафона')->set_width(100), // -
        Field::make('text', 'offer_lamp_complect', 'Лампы в комплекте')->set_width(100), // -
        Field::make('text', 'offer_plosh', 'Площадь освещения')->set_width(100), // -
        Field::make('text', 'offer_povorot', 'Поворотный')->set_width(100), //-
        Field::make('text', 'offer_light_potok', 'Световой поток')->set_width(100), // -
        Field::make('text', 'offer_sposob_krep', 'КодТовара')->set_width(100),
        Field::make('text', 'offer_kod_tov', 'Cпособ крепления')->set_width(100), // -
            
    )); 

    Container::make('post_meta', 'page-promo', 'Доп поля')
    ->show_on_template(array('page-promo.php'))
        ->add_fields(array(   
        Field::make( 'complex', 'promo__complex', "Вывод акций" )
        ->add_fields( array(
          Field::make("checkbox", "promo_checkbox", "Дефолтная картинка") 
          ->help_text('Выводит картинку без текста и затемнения')
            ->set_width( 100 ),
          Field::make('image', 'promo_img', 'Изображение' )->set_width(30),
          Field::make('text', 'promo_subtitle', 'Текст акции')->set_width(30),
          Field::make('text', 'promo_link', 'Ссылка на акцию')->set_width(30)        
        ) ),
  
    ));

      
?>