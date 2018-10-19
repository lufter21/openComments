<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/DbConnect.php';
$db = DbConnect::getInstance();
$db = $db->getDb();

session_start();

if($_SESSION['access']){
	$access_key = $_SESSION['access'];

	$sql_users = $db->prepare('SELECT * FROM users WHERE access_key=?');
	$sql_users->execute(array($access_key));
	$user_data = $sql_users->fetch(PDO::FETCH_ASSOC);

	if (!$user_data) {
		exit('user error');
	}

	$comm_id = $_POST['comm_id'];

	$get_comm = $db->prepare('SELECT * FROM comments WHERE id=?');
	$get_comm->execute(array($comm_id));
	$comment = $get_comm->fetch(PDO::FETCH_ASSOC);

	if ($comment['user_id'] == $user_data['id']) {
		exit('error');
	}

	$likes_users_arr = ($comment['likes_users'] != null) ? json_decode($comment['likes_users']) : array();

	if (in_array($user_data['id'], $likes_users_arr)) {
		$comment['likes']--;
		unset($likes_users_arr[array_search($user_data['id'], $likes_users_arr)]);
	} else {
		$comment['likes']++;
		$likes_users_arr[] = $user_data['id'];
	}

	$update_comments = $db->prepare('UPDATE comments SET likes=?, likes_users=? WHERE id=?');
	$update_comments->execute(array($comment['likes'], json_encode($likes_users_arr), $comm_id));
	
	echo ($comment['likes']) ? $comment['likes'] : '';
}
?>