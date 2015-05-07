<?php
require_once("../core/init.php");
require_once("../models/search/modelsearch.php");


if($_GET['lastid']){

	$vof = $search->getinfoLastid($_GET['lastid']);

	foreach($vof as $v){
	echo '<div class="item" id="'.$v['id_product'].'"><h2>description: '.$v['id_product'].'</h2>'.$v['title'].'<br />'.$v['description'].'"</div>';echo '<br />';
	}
}
?>