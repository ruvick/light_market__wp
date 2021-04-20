<?
//php marketsveta.su/wp-content/themes/light_market/pars/priceload.php

ini_set('max_execution_time', 900);

require_once("../../../../wp-config.php");


$dir = "../1C";
$files = @scandir($dir,1);

print_r($files);

if (($files[0] !== ".")&&($files[0] !== "..")&&(!empty($files[0]))) {
    $row = 0;
    if (($handle = fopen($dir."/".$files[0], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            if ($row == 0) {$row++; continue;}
            
                $sku = $data[0];
                $count = $data[2];
                $price = str_replace(",",".",$data[1]);
                
                if (empty($sku)) continue;

                $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'light',
                    
                    'meta_query' => [
                            'relation' => 'OR',
                            [
                                'key' => '_offer_sku',
                                'value' => (string)$sku
                            ]
                    ]
                  );
                  $posts = new WP_Query($args);
                
                echo  "KSU: ".$sku."\n\r";
                echo  "Колличество: ".$count."\n\r";
                echo  "Цена: ".$price."\n\r";
                
                
                if (!empty($posts->posts[0])) {
                    echo  "Пост ID: ".$posts->posts[0]->ID."\n\r"; 
                    echo  "Товар: ".$posts->posts[0]->post_title."\n\r";
                    carbon_set_post_meta( (int)$posts->posts[0]->ID, 'offer_nal_count', (string)$count ); 
                    carbon_set_post_meta( (int)$posts->posts[0]->ID, 'offer_price', (string)$price ); 
                } else {
                    echo  "Пост не найден. \n\r"; 
                }

                echo  "\n\r"; 
            
            $row++; 
        }
    fclose($handle);
    unlink($dir."/".$files[0]); 
    }    
}

?>