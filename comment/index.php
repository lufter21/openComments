<?php
require $_SERVER['DOCUMENT_ROOT'].'/load.php';
$get = new Comment();
require $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>

<div class="container wrap">

	<?php if ($get->resource === false) { ?>

		<div class="txt c-red">
			В данный момент, для комментирования доступны, только видео с сайта www.youtube.com
		</div>

	<?php } else if (!empty($get->resource)) { ?>
	
	<div class="head pad">
		<h1 class="head__title"><?php echo $get->meta['h1']; ?></h1>
		<a href="<?php echo $get->resource['url']; ?>" target="_blank" class="head__link"><?php echo $get->resource['url']; ?></a>
	</div>
	
	<div class="row">

		<div class="col-7">

			<div class="comments">

				<?php if (!empty($get->user)) { ?>

				<form id="comment-form" action="/functions/add-comment.php" method="POST" class="form">
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

				<?php } else { ?>

				<div class="txt c-red">
					Чтоб оставить комментарий войдите в свой аккаунт.
				</div>

				<?php } ?>

				<div id="comments-container">

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
								<?php echo nl2br($val['comm']['text']); ?>
							</div>

							<?php if (!empty($get->user) && ($get->user['user_id'] != $val['comm']['user_id'])) { ?>

							<div>
								<button class="js-toggle comm__replay-btn" data-target-id="replay-form-<?php echo $key; ?>" data-second-button-text="Отмена">Ответить</button>
							</div>

							<form id="replay-form-<?php echo $key; ?>" action="/functions/add-comment.php" method="POST" class="comm__form js-replay-form form hide on-toggled-show">

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

							<?php } ?>

						</div>
					</div>

					<div class="comments__replay">

						<?php if (!empty($val['replay'])) { foreach ($val['replay'] as $repl_key => $repl_val) { ?>

						<div class="comm">
							<div class="comm__thumb">
								<img src="<?php echo (!empty($repl_val['user_avatar'])) ? $repl_val['user_avatar'] : '/images/avatar.png'; ?>" alt="avatar" class="cover-img">
							</div>
							<div class="comm__cont">
								<div class="comm__name">
									<?php echo $repl_val['user_name']; ?> <span class="comm__time"><?php echo $repl_val['time']; ?></span>
								</div>
								<div class="comm__txt">
									<?php echo $repl_val['text']; ?>
								</div>
								
								<?php if (!empty($get->user)) { ?>
								<div>
									<button class="js-toggle comm__replay-btn" data-target-id="replay-form-<?php echo $key.'-'.$repl_key; ?>" data-second-button-text="Отмена">Ответить</button>
								</div>
								<?php } ?>

								<form id="replay-form-<?php echo $key.'-'.$repl_key; ?>" action="/functions/add-comment.php" method="POST" class="comm__form js-replay-form form hide on-toggled-show">

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

						<?php } } ?>

					</div>

					<?php } } ?>

				</div>

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

	<?php } else { ?>

		<div class="txt c-red">
			Это видео еще не комментировали. Войдите в свой аккаунт или зарегистрируйтесь.
		</div>

	<?php } ?>

</div>

<?php require $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';?>