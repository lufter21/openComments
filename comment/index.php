<?php
require $_SERVER['DOCUMENT_ROOT'].'/load.php';
$get = new Comment();
require $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>

<div class="container">

<div class="row wrap">

	<div class="col-7">

		<div class="comments">

			<form id="comment-form" action="#" class="form">

				<div class="row">
					<div class="col pad-0">
						<div class="form__field">
							<div class="pos-r">
								<div class="form__textarea-mirror"></div>
								<textarea data-required="true" class="form__textarea form__textarea_var-h"></textarea>
								<label class="overlabel">Оставьте комментарий</label>
							</div>
							<div class="form__error-tip">Заполните поле</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-right pad-0">
						<button type="submit" class="button button_red">Отправить</button>
					</div>
				</div>

			</form>

			<?php if (!empty($get->comments)) { foreach ($get->comments as $key => $val) { ?>

			<div class="comm">
				<div class="comm__thumb">
					<img src="<?php echo (!empty($val['user_avatar'])) ? $val['user_avatar'] : '/images/avatar.png'; ?>" alt="avatar" class="cover-img">
				</div>
				<div class="comm__cont">
					<div class="comm__name">
						<?php echo $val['user_name']; ?> <span class="comm__time"><?php echo $val['time']; ?></span>
					</div>
					<div class="comm__txt">
						<?php echo $val['text']; ?>
					</div>
				</div>
			</div>

			<?php } } ?>

		</div>
		

	</div>
	
	<div class="col-5">

		<?php if (!empty($get->resource['iframe'])) { ?>
			<div class="iframe-wrap fix-block">
				<?php echo $get->resource['iframe']; ?>
			</div>
		<?php } ?>

	</div>

</div>

</div>

<?php require $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';?>