<?php
require $_SERVER['DOCUMENT_ROOT'].'/load.php';
$get = new Comment;
require $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>

<div class="container">

<div class="row wrap">

	<div class="col-7">

		<?php if (!empty($get->comments)) { ?>
		<div class="comments">
			<?php foreach ($get->comments as $key => $val) { ?>

			<div class="comm">
				<div class="comm__thumb">
					<img src="/images/avatar.png" alt="avatar" class="full-img">
				</div>
				<div class="comm__cont">

				</div>
			</div>

			<?php } ?>
		</div>
		<?php } ?>

	</div>
	
	<div class="col-5">

		<?php if (!empty($get->resource['iframe'])) { ?>
			<div class="iframe-wrap">
				<?php echo $get->resource['iframe']; ?>
			</div>
		<?php } ?>

	</div>

</div>

</div>

<?php require $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';?>