<?php 

$arrayName = array(3, 5, 8, 6);

$json = json_encode($arrayName);

echo $json;

$arr = json_decode($json);

print_r($arr);
 ?>