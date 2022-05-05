<?
define("IN_PAGE_COUNT", 48);

function generate_query($PARAM) {
    if (empty($PARAM)) $PARAM = $_REQUEST;

    $brand = "";

	if (!empty($PARAM["brand"])) {
		
		for ($i = 0; $i<count($PARAM["brand"]); $i++) {
			$brand .= "(offer_brend = '".$PARAM["brand"][$i]."')";
			if ($i != count($PARAM["brand"]) - 1) $brand .= " OR ";
		} 
	}

    if (!empty($brand)) $brand = ' AND ('.$brand.')';
    
    $style = "";
	if (!empty($PARAM["style"])) {
		
		for ($i = 0; $i<count($PARAM["style"]); $i++) {
			$style .= "(offer_style = '".$PARAM["style"][$i]."')";
			if ($i != count($PARAM["style"]) - 1) $style .= " OR ";
		} 
	}

    if (!empty($style)) $style = " AND (".$style.")";

	
    $forma = "";
    if (!empty($PARAM["forma"])) {
		
		for ($i = 0; $i<count($PARAM["forma"]); $i++) {
			$forma .= "(offer_forma = '".$PARAM["forma"][$i]."')";
			if ($i != count($PARAM["forma"]) - 1) $forma .= " OR ";
		} 
	}

    if (!empty($forma)) $forma = " AND (".$forma.")";


    $price = "";
    if ((!empty($PARAM["price_ot"]))&&(!empty($PARAM["price_do"]))) {
        $price = "(offer_price != 0 AND offer_price >= ".$PARAM["price_ot"]." AND offer_price <=".$PARAM["price_do"].")";
    } else {
        $price = "(offer_price != 0)";
    }
    if (!empty($price)) $price = " AND ".$price;

    return $brand.$style.$forma.$price." ORDER BY offer_price ASC" ;
}

function get_tovar_count($thisCatID) {
    global $wpdb;
    $dopquery = generate_query([]);
    $rez = $wpdb->get_results( "SELECT COUNT(*) as 'total_count' FROM mrksv_filter WHERE (cat= ".$thisCatID." OR cat1= ".$thisCatID." OR cat2= ".$thisCatID.") ".$dopquery);
    return $rez[0]->total_count;
}

function cat_query_param($thisCatID, $sparam) {
    if ($thisCatID == "%")
        return "(title LIKE '%".$sparam."%' OR offer_brend LIKE '%".$sparam."%' OR offer_material_plaf LIKE '%".$sparam."%') ";
    else
        return "(cat= ".$thisCatID." OR cat1= ".$thisCatID." OR cat2= ".$thisCatID.") ";
}

function get_tovar($thisCatID, $offset) {
    global $wpdb;

    $cat_query = cat_query_param($thisCatID,$_REQUEST["s"]);
    
    $dopquery = generate_query([]);


    $total_count = get_tovar_count($thisCatID);

    $start = microtime(true);
    $qq = "SELECT * FROM mrksv_filter WHERE ".$cat_query.$dopquery." LIMIT ".$offset.", ".IN_PAGE_COUNT;					
	
    $rez = $wpdb->get_results($qq);

	$totalTime = microtime(true) - $start;

    return array(
        "total_count" => $total_count,
        "time" => $totalTime,
        "tovars" => $rez,
        "query" => $qq
    ); 
}


add_action('rest_api_init', function () {
	register_rest_route('gensvet/v2', '/get_filter_count', array(
		'methods'  => 'GET',
		'callback' => 'get_filter_count',
		'args' => array(
			'catid' => array(
				'default'           => null,
				'required'          => true,
            ),
            'filter_param' => array(
				'default'           => "",
			)
		),
	));
});

//https://marketsveta.su/wp-json/gensvet/v2/get_filter_count?catid=14
function get_filter_count(WP_REST_Request $request)
{
	$start = microtime(true);
	
	global $wpdb; 

	$filter = FILTER_CONTENT;

    $cat_query = cat_query_param($request["catid"],json_decode($request['filter_param'], true)["s"]);

    $dopquery = generate_query(json_decode($request['filter_param'], true));
    
    $q = "SELECT `offer_brend`, `offer_style`, `offer_forma`, `offer_material_plaf`, `offer_color_plaf`, `offer_lamp_type`, `offer_tsokol` FROM `mrksv_filter` WHERE ".$cat_query.$dopquery;

	$rez = $wpdb->get_results($q, ARRAY_A );
	
    foreach ($rez as $r) {
        if (!empty($r["offer_brend"]))
            $filter["offer_brend"][$r["offer_brend"]]+=1;
        
        if (!empty($r["offer_style"]))
            $filter["offer_style"][$r["offer_style"]]+=1;
        
        if (!empty($r["offer_forma"]))
            $filter["offer_forma"][$r["offer_forma"]]+=1;
        
        if (!empty($r["offer_material_plaf"]))
            $filter["offer_material_plaf"][$r["offer_material_plaf"]]+=1;
        
        if (!empty($r["offer_color_plaf"]))
            $filter["offer_color_plaf"][$r["offer_color_plaf"]]+=1;
        
        if (!empty($r["offer_lamp_type"]))
            $filter["offer_lamp_type"][$r["offer_lamp_type"]]+=1;
        
        if (!empty($r["offer_tsokol"]))
            $filter["offer_tsokol"][$r["offer_tsokol"]]+=1;
    }

    $mm = $wpdb->get_results("SELECT MIN(`offer_price`) as 'min', MAX(`offer_price`) as 'max' FROM `mrksv_filter` WHERE ".$cat_query.$dopquery );
	$filter["offer_price_max"] = $mm[0]->max;
	$filter["offer_price_min"] = $mm[0]->min;

	$filter["count"] = count($rez);
	$filter["query"] = $q;
	$filter["filter"] = json_decode($request['filter_param']);
	$filter["time"] = (microtime(true) - $start);

    uasort($filter["offer_brend"], function($a, $b) { return $a < $b; });
    uasort($filter["offer_style"], function($a, $b) { return $a < $b; });
    uasort($filter["offer_forma"], function($a, $b) { return $a < $b; });
    uasort($filter["offer_material_plaf"], function($a, $b) { return $a < $b; });
    uasort($filter["offer_color_plaf"], function($a, $b) { return $a < $b; });
    uasort($filter["offer_lamp_type"], function($a, $b) { return $a < $b; });
    uasort($filter["offer_tsokol"], function($a, $b) { return $a < $b; });

	if (!empty($filter))
		return $filter;
	else
		return new WP_Error('no_token', 'Токен не найден или пользователь уже разлогинен.', ['status' => 403]);
}

?>