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

	$add_comm = $db->prepare('INSERT INTO comments (resource_id,user_id,user_avatar,user_name,relation,time,text) VALUES (:resource_id,:user_id,:user_avatar,:user_name,:relation,:time,:text) ON DUPLICATE KEY UPDATE text=:u_text');

	$add_comm->execute(array(
		'resource_id'=>$_POST['resource_id'],
		'user_id'=>$user_data['id'],
		'user_avatar'=>$user_data['avatar'],
		'user_name'=>$user_data['name'],
		'relation'=>(!empty($_POST['relation'])) ? $_POST['relation'] : null,
		'time'=>date('Y-m-d H:i:s'),
		'text'=>$_POST['comment'],
		'u_text'=>$_POST['comment']
	));

	
	$get_comm = $db->prepare('SELECT * FROM comments WHERE resource_id=? AND user_id=? ORDER BY id DESC');
	$get_comm->execute(array($_POST['resource_id'], $user_data['id']));
	$comment = $get_comm->fetch(PDO::FETCH_ASSOC);

?>

<div class="comm">
	<div class="comm__thumb">
		<img src="<?php echo (!empty($comment['user_avatar'])) ? $comment['user_avatar'] : '/images/avatar.png'; ?>" alt="avatar" class="cover-img">
	</div>
	<div class="comm__cont">
		<div class="comm__name">
			<?php echo $comment['user_name']; ?> <span class="comm__time"><?php echo $comment['time']; ?></span>
		</div>
		<div class="comm__txt">
			<?php echo nl2br($comment['text']); ?>
		</div>
	</div>
</div>

<?php
}
?>