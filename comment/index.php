<?php
require $_SERVER['DOCUMENT_ROOT'].'/load.php';
$get = new Comment();
require $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>

<div class="container wrap">
	
	<div class="head pad">
		<h1 class="head__title"><?php echo $get->meta['h1']; ?></h1>
		<a href="<?php echo $get->resource['url']; ?>" target="_blank" class="head__link"><?php echo $get->resource['url']; ?></a>
	</div>
	
	<div class="row">

		<div class="col-7">

			<div class="comments">

				<form id="comment-form" action="/functions/comment.php" method="POST" class="form">
					<input type="hidden" name="resource_id" value="<?php echo $get->resource['id']; ?>">
					<div class="form__field">
						<div class="pos-r">
							<div class="form__textarea-mirror"></div>
							<textarea name="comment" data-required="true" class="form__textarea form__textarea_var-h"></textarea>
							<label class="overlabel">Оставьте комментарий</label>
						</div>
						<div class="form__error-tip">Заполните поле</div>
					</div>


					<div class="ta-r">
						<button type="submit" class="button button_red">Отправить</button>
					</div>

				</form>

				<?php if (!empty($get->comments)) { foreach ($get->comments as $key => $val) { ?>

				<div class="comm">
					<div class="comm__thumb">
						<img src="<?php echo (!empty($val['comm']['user_avatar'])) ? $val['comm']['user_avatar'] : '/images/avatar.png'; ?>" alt="avatar" class="cover-img">
					</div>
					<div class="comm__cont">
						<div class="comm__name">
							<?php echo $val['comm']['user_name']; ?> <span class="comm__time"><?php echo $val['comm']['time']; ?></span>
						</div>
						<div class="comm__txt">
							<?php echo $val['comm']['text']; ?>
						</div>

						<div>
							<button class="js-toggle comm__replay-btn" data-target-id="replay-form-<?php echo $val['comm']['id']; ?>" data-second-button-text="Отмена">Ответить</button>
						</div>

						<form id="replay-form-<?php echo $val['comm']['id']; ?>" action="/functions/comment.php" method="POST" class="comm__form js-replay-form form hide on-toggled-show">

							<input type="hidden" name="resource_id" value="<?php echo $get->resource['id']; ?>">
							<input type="hidden" name="relation" value="<?php echo $val['comm']['id']; ?>">

							<div class="row">
								<div class="col pad-0">
									<div class="form__field">
										<div class="pos-r">
											<div class="form__textarea-mirror"></div>
											<textarea name="comment" data-required="true" class="form__textarea form__textarea_var-h"></textarea>
											<label class="overlabel">Добавьте ответ</label>
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

					</div>
				</div>

				<?php if (!empty($val['replay'])) { ?>

					<div class="comments__replay">

						<?php foreach ($val['replay'] as $key => $val) { ?>

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

								<div>
									<button class="js-toggle comm__replay-btn" data-target-id="replay-form-<?php echo $val['id']; ?>" data-second-button-text="Отмена">Ответить</button>
								</div>

								<form id="replay-form-<?php echo $val['id']; ?>" action="/functions/comment.php" method="POST" class="comm__form js-replay-form form hide on-toggled-show">

									<input type="hidden" name="resource_id" value="<?php echo $get->resource['id']; ?>">
									<input type="hidden" name="relation" value="<?php echo $val['id']; ?>">

									<div class="row">
										<div class="col pad-0">
											<div class="form__field">
												<div class="pos-r">
													<div class="form__textarea-mirror"></div>
													<textarea name="comment" data-required="true" class="form__textarea form__textarea_var-h"></textarea>
													<label class="overlabel">Добавьте ответ</label>
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

							</div>
						</div>

						<?php } ?>

					</div>

				<?php } ?>

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