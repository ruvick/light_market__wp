<?
    //php marketsveta.su/wp-content/themes/light_market/pars/setFilter.php
    
    ini_set('max_execution_time', 9000);
    ini_set('memory_limit', '2048M');
    require_once("../../../../wp-config.php");
 
    $lim_start = (empty($argv[0]))?0:$argv[0];
    $lim_end = (empty($argv[1]))?10000:$argv[1];
 
    global $wpdb;

    // $wpdb->query("TRUNCATE `mrksv_filter`");

    $posts = $wpdb->get_results("SELECT * FROM `mrksv_posts` WHERE `post_status` = 'publish' AND `post_type` = 'light' LIMIT 60000, 10000");

        $counter = 0;
        
        foreach( $posts as $post ){
            $cats = wp_get_post_terms( $post->ID, "lightcat", array('fields' => 'ids'));

            $args = array(
                "post_id" => $post->ID,
                "lnk" => get_the_permalink($post->ID),
                "img_lnk" => get_the_post_thumbnail_url($post->ID, "tominiatyre"),
                "title" => $post->post_title,
                "offer_brend" => carbon_get_post_meta( $post->ID, 'offer_brend'),
                "offer_style" => carbon_get_post_meta( $post->ID, 'offer_style'),
                "offer_forma" => carbon_get_post_meta( $post->ID, 'offer_forma'),
                "offer_material_plaf" => carbon_get_post_meta( $post->ID, 'offer_material_plaf'),
                "offer_color_plaf" => carbon_get_post_meta( $post->ID, 'offer_color_plaf'),
                "offer_lamp_type" => carbon_get_post_meta( $post->ID, 'offer_lamp_type'),
                "offer_tsokol" => carbon_get_post_meta( $post->ID, 'offer_tsokol'),
                "offer_price" => carbon_get_post_meta( $post->ID, 'offer_price'),
                "offer_old_price" => carbon_get_post_meta( $post->ID, 'offer_old_price'),
            );

            if (count($cats) > 0) $args["cat"] = $cats[0];
            if (count($cats) > 1) $args["cat1"] = $cats[1];
            if (count($cats) > 2) $args["cat2"] = $cats[2];
            if (count($cats) > 3) $args["cat3"] = $cats[3];

            $wpdb->insert('mrksv_filter',  $args);

            echo $counter.": ".$post->ID."\n\r";
            
            $counter ++; 
        }
        


?>