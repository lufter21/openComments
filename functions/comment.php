<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/dbconnect.php';
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

	$add_comm = $db->prepare('INSERT INTO comments (resource_id,user_id,user_avatar,user_name,relation,time,text) VALUES (:resource_id,:user_id,:user_avatar,:user_name,:relation,:time,:text) ON DUPLICATE KEY UPDATE time=:u_time, text=:u_text');

	$add_comm->execute(array(
		'resource_id'=>$_POST['resource_id'],
		'user_id'=>$user_data['id'],
		'user_avatar'=>$user_data['avatar'],
		'user_name'=>$user_data['name'],
		'relation'=>(!empty($_POST['relation'])) ? $_POST['relation'] : null,
		'time'=>date('Y-m-d H:i:s'),
		'text'=>$_POST['comment'],
		'u_time'=>date('Y-m-d H:i:s'),
		'u_text'=>$_POST['comment']
	));

	print_r($_POST['resource_id']);

}

?>