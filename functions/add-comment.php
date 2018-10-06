<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/DbConnect.php';
$db = DbConnect::getInstance();
$db = $db->getDb();

function approve_comment($text) {
	$approved = 1;
	if (preg_match('/.*/siu', $text)) {
		$approved = 0;
	}
	return 0;
}

session_start();

if($_SESSION['access']){
	$access_key = $_SESSION['access'];

	$sql_users = $db->prepare('SELECT * FROM users WHERE access_key=?');
	$sql_users->execute(array($access_key));
	$user_data = $sql_users->fetch(PDO::FETCH_ASSOC);

	if (!$user_data) {
		exit('user error');
	}

	$add_comm = $db->prepare('INSERT INTO comments (resource_id,user_id,user_avatar,user_name,parent,relation,relation_name,time,text,approved) VALUES (:resource_id,:user_id,:user_avatar,:user_name,:parent,:relation,:relation_name,:time,:text,:approved) ON DUPLICATE KEY UPDATE text=:u_text');

	$add_comm->execute(array(
		'resource_id'=>$_POST['resource_id'],
		'user_id'=>$user_data['id'],
		'user_avatar'=>$user_data['avatar'],
		'user_name'=>$user_data['name'],
		'parent'=>(!empty($_POST['parent'])) ? $_POST['parent'] : null,
		'relation'=>(!empty($_POST['relation'])) ? $_POST['relation'] : null,
		'relation_name' => (!empty($_POST['relation_name'])) ? $_POST['relation_name'] : '',
		'time'=>date('Y-m-d H:i:s'),
		'text'=>$_POST['comment'],
		'u_text'=>$_POST['comment'],
		'approved'=>approve_comment($_POST['comment'])
	));

	
	$get_comm = $db->prepare('SELECT * FROM comments WHERE resource_id=? AND user_id=? ORDER BY id DESC');
	$get_comm->execute(array($_POST['resource_id'], $user_data['id']));
	$comment = $get_comm->fetch(PDO::FETCH_ASSOC);

?>

<div id="comment-<?php echo $comment['id']; ?>" class="comm">
	<div class="comm__thumb">
		<img src="<?php echo (!empty($comment['user_avatar'])) ? $comment['user_avatar'] : '/images/avatar.png'; ?>" alt="avatar" class="cover-img">
	</div>
	<div class="comm__cont">
		<div class="comm__name">
			<?php echo $comment['user_name']; ?> <span class="comm__time"><?php echo $comment['time']; ?></span>
		</div>
		<div class="comm__txt">
			<?php if ($comment['approved']) {
				if ($comment['relation'] != null) { ?><a href="#comment-<?php echo $comment['relation']; ?>" class="js-anchor"><?php echo $comment['relation_name']; ?></a>, <?php } echo nl2br($comment['text']);
			} else { ?>
				<i>Комментарий отправлен на модерацию.</i>
			<?php } ?>
		</div>
	</div>
</div>

<?php
}
?>