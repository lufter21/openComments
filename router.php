<?php

$query = array();

if(!empty($_GET['r'])){
	$res = trim(htmlspecialchars(strip_tags($_GET['r'])));
	$query = array(
		'class'=>'Resource',
		'template'=>'resource'
	);
} else {
	$query = array(
		'class'=>'MainPage',
		'template'=>'main-page'
	);
}

$query = array_merge($query, array('res' => $res));