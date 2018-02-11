<?php
require $_SERVER['DOCUMENT_ROOT'].'/load.php';
$get = new Comment;
require $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>

<?php print_r($get); echo '<br>'; ?>


<?php if (!empty($get->comments)) { ?>

<?php foreach ($get->comments as $key => $val) { ?>

<div class="comm">
	<div class="comm__thumb">
		<img src="/images/avatar.png" alt="avatar" class="full-img">
	</div>
	<div class="comm__cont">
		
	</div>
</div>

<?php } ?>

<?php } ?>


<?php require $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';?>