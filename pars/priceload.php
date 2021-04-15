<?
//php marketsveta.su/wp-content/themes/light_market/pars/priceload.php

ini_set('max_execution_time', 900);

require_once("../../../../wp-config.php");

echo "11122";

$dir = "../1C";
$files = @scandir($dir,1);

print_r($files);

?>