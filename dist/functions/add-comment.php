<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/classes/DbConnect.php';
$db = DbConnect::getInstance();
$db = $db->getDb();

function approve_comment($text) {
	$approved = 1;
	if (preg_match('/.*/siu', $text)) {
		$approved = 0;
	}
	return 1;
}

session_start();

if($_SESSION['access'] && !empty($_POST['comment'])){
	$access_key = $_SESSION['access'];

	$sql_users = $db->prepare('SELECT * FROM users WHERE access_key=?');
	$sql_users->execute(array($access_key));
	$user_data = $sql_users->fetch(PDO::FETCH_ASSOC);

	if (!$user_data) {
		exit('user error');
	}

	$comment_text = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');

	$add_comm = $db->prepare('INSERT INTO comments (resource_id,user_id,user_avatar,user_name,parent,relation,relation_name,time,text,approved) VALUES (:resource_id,:user_id,:user_avatar,:user_name,:parent,:relation,:relation_name,:time,:text,:approved) ON DUPLICATE KEY UPDATE text=:u_text');

	$add_comm->execute(array(
		'resource_id'=>$_POST['resource_id'],
		'user_id'=>$user_data['id'],
		'user_avatar'=>$user_data['avatar'],
		'user_name'=>$user_data['name'],
		'parent'=>(!empty($_POST['parent'])) ? $_POST['parent'] : null,
		'relation'=>(!empty($_POST['relation'])) ? htmlspecialchars($_POST['relation'], ENT_QUOTES, 'UTF-8') : null,
		'relation_name' => (!empty($_POST['relation_name'])) ? htmlspecialchars($_POST['relation_name'], ENT_QUOTES, 'UTF-8') : '',
		'time'=>date('Y-m-d H:i:s'),
		'text'=>$comment_text,
		'u_text'=>$comment_text,
		'approved'=>approve_comment($comment_text)
	));

	$get_comm = $db->prepare('SELECT * FROM comments WHERE resource_id=? AND user_id=? ORDER BY id DESC');
	$get_comm->execute(array($_POST['resource_id'], $user_data['id']));
	$comment = $get_comm->fetch(PDO::FETCH_ASSOC);

	//send mail
	$send_to = 'dealersair@gmail.com';
	$from = 'opencomments.dealersair.com <opencomments@dealersair.com>';

	$subject = 'New comment';

	$body = $comment['id'].'<br>'.$comment['text'];

	$header = "Content-type: text/html; charset=\"utf-8\"\r\n";
	$header .= "From: ".$from."\r\n";

	mail($send_to, $subject, $body, $header);
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
				<?php 
				if (!$comment['approved']) {
					echo '<i class="c-gray">Комментарий отправлен на модерацию.</i><br>';
				}

				if ($comment['relation'] != null) {
					echo '<a href="#comment-'.$comment['relation'].'" class="js-anchor">'.$comment['relation_name'].'</a>, ';
				}

				echo nl2br($comment['text']); 
				?>
			</div>
		</div>
	</div>

	<?php
}
?>