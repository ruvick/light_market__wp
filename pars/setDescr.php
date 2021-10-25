<?
    //php marketsveta.su/wp-content/themes/light_market/pars/setDescr.php
    require_once("../../../../wp-config.php");
        
    // параметры по умолчанию
    $posts = get_posts( array(
        'numberposts' => 500,
        'post_type' => "light",
        'offset' => 5500,

        'tax_query' => array(
            array(
                'taxonomy' => 'lightbrand',
                'field'    => 'id',
                'terms'    => 307
            )
        )
    ) );

    $counter = 0;
    foreach( $posts as $post ){
        


        //  $curPrice = carbon_get_post_meta($post->ID,"offer_price");
        // $curPriceNew = round($curPrice * 0.9);
        update_post_meta( $post->ID, '_offer_strana', "Россия");    
        
        echo $post->post_title ."\n\r";
        
        $modif = carbon_get_post_meta($post->ID,'offer_cherecter');
        
        if($modif) {
            $i = 0;
            foreach($modif as $item) {
                
                $caName = carbon_get_post_meta( $post->ID, 'offer_cherecter['.$i.']/c_name');
                if ($caName === "Страна происхождения") {
                    carbon_set_post_meta( $post->ID, 'offer_cherecter['.$i.']/c_val', "Россия");
                    echo $caVal = carbon_get_post_meta( $post->ID, 'offer_cherecter['.$i.']/c_val');
                    
                    echo "\n\r";
                    break;
                }

                $i++;
            }
        }
        echo "\n\r";
        


        $counter ++; 
     }


?>