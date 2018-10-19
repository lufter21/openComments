<?php
function num_to_word($num, $words_arr) {
	$num %= 100;

	if ($num > 20) {
		$num %= 10;
	}

	switch ($num) {
		case 1:
		return $words_arr[0];

		case 2:
		case 3: 
		case 4:
		return $words_arr[1];

		default:
		return $words_arr[2];
	}
}
?>