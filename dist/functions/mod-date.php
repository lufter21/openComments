<?php
function mod_date($value){
	$date_time = explode(' ', $value);
	$date = explode('-', $date_time[0]);
	$repl = array(
		'01' => 'января',
		'02' =>  'февраля',
		'03' => 'марта',
		'04' => 'апреля',
		'05' => 'мая',
		'06' => 'июня',
		'07' => 'июля',
		'08' => 'августа',
		'09' => 'сентября',
		'10' => 'октября',
		'11' => 'ноября',
		'12' => 'декабря'
	);
	$month = str_replace(array_keys($repl), array_values($repl), $date[1]);
	return $date[2].' '.$month.' '.$date[0].', '.$date_time[1];
}
?>