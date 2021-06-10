<?

// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

ini_set('memory_limit','-1');
ini_set('post_max_size','256M');
ini_set('upload_max_filesize','256M');


//php marketsveta.su/wp-content/themes/light_market/pars/inxml.php
    require_once("../../../../wp-config.php");
            
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    global $wpdb;


    $files = [
        ["name" => "143862.xml", "count" => 398],
        ["name" => "100615.xml", "count" => 275],
        ["name" => "100620.xml", "count" => 913],
        ["name" => "100626.xml", "count" => 1236],
        ["name" => "100629.xml", "count" => 595],
        ["name" => "100632.xml", "count" => 1107],
        ["name" => "100634.xml", "count" => 1590],
        ["name" => "100661.xml", "count" => 332],
        ["name" => "100678.xml", "count" => 445],
        ["name" => "100693.xml", "count" => 793],
        ["name" => "100699.xml", "count" => 2],
        ["name" => "100701.xml", "count" => 9],
        ["name" => "100715.xml", "count" => 186],
        ["name" => "100725.xml", "count" => 368],
        ["name" => "100731.xml", "count" => 176],
        ["name" => "100752.xml", "count" => 212],
        ["name" => "100753.xml", "count" => 59],
        ["name" => "100767.xml", "count" => 514],
        ["name" => "100777.xml", "count" => 168],
        ["name" => "100778.xml", "count" => 531],
        ["name" => "100798.xml", "count" => 147],
        ["name" => "100814.xml", "count" => 2227],
        ["name" => "100816.xml", "count" => 1510],
        ["name" => "100817.xml", "count" => 209],
        ["name" => "100821.xml", "count" => 927],
        ["name" => "100830.xml", "count" => 491],
        ["name" => "119047.xml", "count" => 325],
        ["name" => "119167.xml", "count" => 380],
        ["name" => "119385.xml", "count" => 390],
        ["name" => "119929.xml", "count" => 516],
        ["name" => "123663.xml", "count" => 285],
        ["name" => "123773.xml", "count" => 388],
        ["name" => "127107.xml", "count" => 92],
        ["name" => "127750.xml", "count" => 343],
        ["name" => "128273.xml", "count" => 76],
        ["name" => "128329.xml", "count" => 94],
        ["name" => "128567.xml", "count" => 115],
        ["name" => "129972.xml", "count" => 18],
        ["name" => "130078.xml", "count" => 154],
        ["name" => "130612.xml", "count" => 10],
        ["name" => "131128.xml", "count" => 87],
        ["name" => "133838.xml", "count" => 304],
        ["name" => "133873.xml", "count" => 1213],
        ["name" => "134823.xml", "count" => 462],
        ["name" => "135915.xml", "count" => 635],
        ["name" => "136690.xml", "count" => 86],
        ["name" => "138237.xml", "count" => 177],
        ["name" => "138961.xml", "count" => 63],
        ["name" => "141496.xml", "count" => 91],
        ["name" => "141866.xml", "count" => 94],
        ["name" => "142003.xml", "count" => 181],
        ["name" => "143862.xml", "count" => 397],
        ["name" => "173331.xml", "count" => 346],
        ["name" => "173350.xml", "count" => 510],
        ["name" => "174371.xml", "count" => 326],
        ["name" => "174688.xml", "count" => 644],
        ["name" => "179924.xml", "count" => 106],

    ];

    $startIndex = 0;
    $filename = "";
    $fileincrement = 40;
    foreach ($files as $fe) {
        $rez = $wpdb->get_results( "SELECT * FROM `mrksv_parsing_index` WHERE `file` = '".$fe["name"]."' ORDER BY `data` DESC" );
        
    

        if (empty($rez)){
            $startIndex = 0;
            $filename = $fe["name"];
            break;
        }

        if ($rez[0]->p_index < $fe["count"]) {
            $startIndex = $rez[0]->p_index;
            $filename = $fe["name"];
            break;
        }
    }


    if ($filename == "") {
        die("Все файлыпройдены");
        return;
    }
    
    echo  "Файл: ".$startIndex."\n\r";
    echo  "Начало: ".$filename."\n\r";

   
    if (file_exists('xml/'.$filename)) {
        $xml = simplexml_load_file('xml/'.$filename);
        
        $curentTerm = array();

        echo  "Начат разбор категорий: \n\r";

        foreach ($xml->shop->categories->children() as $elem)
        { 
                echo  "Категория: ".$elem;
                //print_r($elem->attributes()[id]);

                $term = get_term_by('name', $elem, 'lightcat');
                
                if (empty($term)) 
                {
                    wp_insert_term( (string)$elem, 'lightcat');      
                    echo " - Создана";
                } else
                    echo " - Существует";

                
                $curentTerm[(string)$elem->attributes()["id"]] = (string)$elem;
                
                 
                echo "\n\r";
        }

        echo  "Построение иерархии категорий \n\r";
        foreach ($xml->shop->categories->children() as $elem)
        {    
            $siteCatNameParent = $curentTerm[(string)$elem->attributes()["parentId"]];
            $siteCatName = $curentTerm[(string)$elem->attributes()["id"]];

            $termSiteParent = get_term_by('name', $siteCatNameParent, 'lightcat');
            $termSite = get_term_by('name', $siteCatName, 'lightcat');
            
            wp_update_term( $termSite->term_id, 'lightcat', array("parent" => $termSiteParent->term_id));
        }

        echo  "Иерархия категорий выстроена\n\r";
        echo  "\n\rНачато добавление товаров:\n\r\n\r";
        
        
        
        

        $i = 0;
        $of = $xml->shop->offers->children();
        foreach ($xml->shop->offers->children() as $elem)
        // for ($offerIndex = $startIndex; $offerIndex<$startIndex+100; $offerIndex++)
        { 
            // if ((string)$elem->vendorCode !== "ST210.548.12") continue;
            if ($i < $startIndex)  {
                $i++;
                continue;
            }
            

            echo "#: ".$i;
            echo "\n\r";
            echo (string)$elem->name;
            echo "\n\r";



            $to_post_meta  = [ 
                '_offer_smile_descr' => empty((string)$elem->description)?(string)$elem->name:(string)$elem->description, 
                '_offer_sku' => (string)$elem->vendorCode, 
                '_offer_nal' => ((int)$elem->quantity > 0)?"В наличии":"Под заказ",
                '_offer_name' => (string)$elem->name,
                '_offer_manufact' => (string)$elem->vendor,
                '_offer_price' => "100",
                '_offer_allsearch' => (string)$elem->name." ".(string)$elem->vendor." ".(string)$elem->typePrefix." ".(string)$elem->model,
                '_offer_fulltext' => empty((string)$elem->description)?(string)$elem->name:(string)$elem->description,
            ];

            $indexCh = 0;
            foreach ($elem->param as $param)
            {
                $p_value = (string)$param;
                $p_name = (string)$param->attributes()["name"];
                
                $to_post_meta["_offer_cherecter|c_name|".$indexCh."|0|value"] = $p_name;
                $to_post_meta["_offer_cherecter|c_val|".$indexCh."|0|value"] = $p_value;

                if ($p_name === "Бренд") $to_post_meta["_offer_brend"] = $p_value;
                if ($p_name === "стиль") $to_post_meta["_offer_style"] = $p_value;
                if ($p_name === "Форма") $to_post_meta["_offer_forma"] = $p_value;
                if ($p_name === "цвет арматуры") $to_post_meta["_offer_color_arm"] = $p_value;
                if ($p_name === "материал арматуры") $to_post_meta["_offer_material_arm"] = $p_value;
                
                if ($p_name === "цвет плафона") $to_post_meta["_offer_color_plaf"] = $p_value;
                if ($p_name === "материал плафона") $to_post_meta["_offer_material_plaf"] = $p_value;
                if ($p_name === "ширина/диаметр") $to_post_meta["_offer_shirina_diametr"] = $p_value;
                if ($p_name === "высота") $to_post_meta["_offer_visota"] = $p_value;
                if ($p_name === "тип лампы") $to_post_meta["_offer_lamp_type"] = $p_value;
                if ($p_name === "мощность лампы") $to_post_meta["_offer_lamp_mosh"] = $p_value;
                if ($p_name === "мощность общая") $to_post_meta["_offer_ob_mosh"] = $p_value;
                if ($p_name === "напряжение") $to_post_meta["_offer_napr"] = $p_value;
                if ($p_name === "тип цоколя") $to_post_meta["_offer_tsokol"] = $p_value;
                if ($p_name === "степень защиты ip") $to_post_meta["_offer_s_z_ip"] = $p_value;
                if ($p_name === "пульт управления") $to_post_meta["_offer_pult"] = $p_value;
                if ($p_name === "выключатель") $to_post_meta["_offer_vikl"] = $p_value;
                if ($p_name === "цвет свечения") $to_post_meta["_offer_color_light"] = $p_value;
                if ($p_name === "диммируемость") $to_post_meta["_offer_dimmer"] = $p_value;
                if ($p_name === "Место установки") $to_post_meta["_offer_mesto"] = $p_value;
                if ($p_name === "Страна происхождения") $to_post_meta["_offer_strana"] = $p_value;
                if ($p_name === "солнечная батарея") $to_post_meta["_offer_sunn_battary"] = $p_value;
                if ($p_name === "датчик движения") $to_post_meta["_offer_dathik"] = $p_value;
                if ($p_name === "коллекция") $to_post_meta["_offer_collection"] = $p_value;
                if ($p_name === "Назначение помещения") $to_post_meta["_offer_nazn_pom"] = $p_value;
                if ($p_name === "форма плафона") $to_post_meta["_offer_plaf_form"] = $p_value;
                if ($p_name === "лампы в комплекте") $to_post_meta["_offer_lamp_complect"] = $p_value;
                if ($p_name === "площадь освещения") $to_post_meta["_offer_plosh"] = $p_value;
                if ($p_name === "поворотный") $to_post_meta["_offer_povorot"] = $p_value;
                if ($p_name === "световой поток") $to_post_meta["_offer_light_potok"] = $p_value;
                if ($p_name === "КодТовара") $to_post_meta["_offer_sposob_krep"] = $p_value;
                if ($p_name === "способ крепления") $to_post_meta["_offer_kod_tov"] = $p_value;
                
                $indexCh++;
            }

            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'light',
                
                'meta_query' => [
                        'relation' => 'OR',
                        [
                            'key' => '_offer_sku',
                            'value' => (string)$elem->vendorCode
                        ]
                ]
              );
            $posts = new WP_Query($args);

            if (empty($posts->posts[0])) {
                echo "Добавление нового поста.\n\r";
                
                $post_id = wp_insert_post(  wp_slash( array(
                    'post_type'     => 'light',
                    'post_author'    => 1,
                    'post_status'    => 'publish',
                    'post_title' => (string)$elem->name,
                    'post_excerpt'  => empty((string)$elem->description)?(string)$elem->name:(string)$elem->description,
                    'post_content'  => empty((string)$elem->description)?(string)$elem->name:(string)$elem->description,
                    'meta_input'     => $to_post_meta,
                    
                ) ) );
            } else {
                
               
                echo "Пост существует: ". $posts->posts[0]->post_title." id: ".$posts->posts[0]->ID.".\n\r";
                $i++;
                if ($i>$startIndex+$fileincrement)  {
                    echo "Тута.\n\r";
                    break;
                } 
                continue;

                 // echo "Обновление поста: ". $posts->posts[0]->post_title." id: ".$posts->posts[0]->ID.".\n\r";
                // $post_id = wp_update_post(  wp_slash( array(
                //     'ID' => $posts->posts[0]->ID,
                //     'post_type'     => 'light',
                //     'post_author'    => 1,
                //     'post_status'    => 'publish',
                //     'post_title' => (string)$elem->name,
                //     'post_excerpt'  => empty((string)$elem->description)?(string)$elem->name:(string)$elem->description,
                //     'post_content'  => empty((string)$elem->description)?(string)$elem->name:(string)$elem->description,
                //     'meta_input'     => $to_post_meta,
                    
                // ) ) );
            }

            wp_set_object_terms( $post_id, $to_post_meta["_offer_brend"], "lightbrand" );

            $term = get_term_by('name', $curentTerm[(string)$elem->categoryId], 'lightcat');

            $ancestors = get_ancestors( $term->term_id,  'lightcat' );
            
            $catArray = array();
            foreach ($ancestors as $as)
                $catArray[] = $as; 
            $catArray[] = $term->term_id; 

            wp_set_object_terms( $post_id, $catArray, "lightcat" );   
           
            echo "Удаление старых вложений: \n\r";

            $media = get_attached_media( 'image', $post_id );
            foreach ($media as $mf)
            {
                $atdelrez = wp_delete_attachment( $mf->ID );
                echo empty($atdelrez)?"Ничего не удалено. \n\r":"Удалено вложение. \n\r";
            }

            echo "Галерея: \n\r";

            $indexImg = 0;
            foreach ($elem->picture as $galery)
            {
            
                echo $img1 = (string)$galery;
                echo "\n\r";
                $ttl = (string)$elem->vendor." ".(string)$elem->name." ".(string)$elem->vendorCode;
                $img_id = media_sideload_image( $img1, $post_id, $ttl, "id" );
            
            
                delete_post_meta( $post_id, '_offer_picture|gal_img|'.$indexImg.'|0|value');
                delete_post_meta( $post_id, '_offer_picture|gal_img_sku|'.$indexImg.'|0|value');
                delete_post_meta( $post_id, '_offer_picture|gal_img_alt|'.$indexImg.'|0|value');
            
                add_post_meta( $post_id, '_offer_picture|gal_img|'.$indexImg.'|0|value', $img_id, true );
                add_post_meta( $post_id, '_offer_picture|gal_img_sku|'.$indexImg.'|0|value',  "", true );
                add_post_meta( $post_id, '_offer_picture|gal_img_alt|'.$indexImg.'|0|value', $ttl, true );

                if ($indexImg == 0) set_post_thumbnail($post_id, $img_id);
            
                $indexImg++;
            }


            echo "\n\r";
            echo "\n\r";

            
            if ($i>$startIndex+$fileincrement)  break;
            $i++;
           
        }  
        
        $wpdb->insert( 'mrksv_parsing_index', array(
            "p_index" => $startIndex+$fileincrement,
            "file" => $filename
        ) );
    } 



?>