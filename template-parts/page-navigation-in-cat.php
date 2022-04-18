<?

function get_lnk_get($mainGET, $p_namber) {
	$mainGET["page_number"] = $p_namber;
	$query = !empty($mainGET)?"?".http_build_query($mainGET):"";
	return $query; 
}

			$mainGET = $_GET;

			$this_url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$this_url = explode('?', $url);
			$this_url = $url[0];

			$page_count = intdiv($args["total_count"], IN_PAGE_COUNT);
			$hvost = $args["total_count"] % IN_PAGE_COUNT;
			$page_count = ($hvost>0)?($page_count+1):$page_count;	

?>

<nav class="navigation pagination " role="navigation">
	<ul class="pagging-list">
		<?

			$start = 1;
			$end = ($page_count < 6)?$page_count:6;

			if ($args['page_number'] >= 5)
			{
				$start = $args['page_number'] - 2;
				$end = ($args['page_number'] + 2 < $page_count)?$args['page_number'] + 2:$page_count;	
			}

			if ($start > 1) {
				
		?>
			<li><a href="<?echo $this_url.get_lnk_get($mainGET, 1) ?>" class = "nav-links <?echo ($args['page_number'] == 1)?"current":""; ?>"  >1</a></li>
			<li class = "empty">...</li>
		<?
			}

			for ($i = $start; $i<=$end; $i++) {
		?>
			<li><a href="<?echo $this_url.get_lnk_get($mainGET, $i) ?>" class = "nav-links <?echo ($args['page_number'] == $i)?"current":""; ?>" ><?echo $i?></a></li>
		<?
			}

			if ($end+3 < $page_count) {
		?>
			<li class = "empty">...</li>
			<li><a href="<?echo $this_url.get_lnk_get($mainGET, $page_count)  ?>" class = "nav-links <?echo ($args['page_number'] == $page_count)?"current":""; ?>" ><?echo $page_count?></a></li>
		<?
			}
		?>
	</ul>
</nav>