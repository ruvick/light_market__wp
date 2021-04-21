<?

//php marketsveta.su/wp-content/themes/light_market/pars/inxml.php
    ini_set('max_execution_time', 9000);

    require_once("../../../../wp-config.php");
            
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    if (file_exists('xml/100659.xml')) {
        $xml = simplexml_load_file('xml/100659.xml');
        
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
        
        $offerIndex = 0;
        foreach ($xml->shop->offers->children() as $elem)
        { 
            echo (string)$elem->name;
            echo "\n\r";

            //if ((string)$elem->vendorCode !== "ST210.548.12") continue;
            // if ($offerIndex < 1000) {
                
            //     $offerIndex++;
            //     continue;
            // }

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
                echo "Обновление поста: ". $posts->posts[0]->post_title." id: ".$posts->posts[0]->ID.".\n\r";
                $post_id = wp_update_post(  wp_slash( array(
                    'ID' => $posts->posts[0]->ID,
                    'post_type'     => 'light',
                    'post_author'    => 1,
                    'post_status'    => 'publish',
                    'post_title' => (string)$elem->name,
                    'post_excerpt'  => empty((string)$elem->description)?(string)$elem->name:(string)$elem->description,
                    'post_content'  => empty((string)$elem->description)?(string)$elem->name:(string)$elem->description,
                    'meta_input'     => $to_post_meta,
                    
                ) ) );
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

            //if ($offerIndex > 3) break;

            $offerIndex ++;
        }    
    } 



?>