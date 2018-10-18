<?php
require $_SERVER['DOCUMENT_ROOT'].'/load.php';
$get = new Comment();
require $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
require $_SERVER['DOCUMENT_ROOT'].'/functions/mod-date.php';
?>

<!--MAIN/-->
<main>
	<div class="section">

		<?php if ($get->resource === false) { ?>

		<div class="row">
			<div class="col-12 txt c-red">
				В данный момент, для комментирования доступны, только видео с сайта www.youtube.com
			</div>
		</div>

		<?php } else if (!empty($get->resource)) { ?>

		<div class="row">
			<div class="col-12">
				<div class="head">
					<h1 class="head__title"><?php echo $get->meta['h1']; ?></h1>
					<a href="<?php echo $get->resource['url']; ?>" target="_blank" class="link"><?php echo $get->resource['url']; ?></a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-7 comments p-0">

				<?php if (!empty($get->user)) { ?>

				<form id="comment-form" action="/functions/add-comment.php" method="POST" class="form">
					<input type="hidden" name="resource_id" value="<?php echo $get->resource['id']; ?>">
					<div class="row">
						<div class="col-12">
							<div class="form__field">
								<div class="var-height-textarea">
									<div class="var-height-textarea__mirror"></div>
									<textarea name="comment" placeholder="Оставьте комментарий" data-required="true" class="var-height-textarea__textarea form__textarea"></textarea>
								</div>
								<div class="field-error-tip">Заполните поле</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 ta-r p-y-0">
							<button type="submit" class="form__submit btn">Отправить</button>
						</div>
					</div>
				</form>

				<?php } else { ?>

				<div class="row">
					<div class="col-12 txt c-red">
						Чтоб оставить комментарий войдите в свой аккаунт.
					</div>
				</div>

				<?php } ?>

				<div class="row">
					<div class="col">
						<b><?php echo count($get->comments); ?> коммент.</b>
					</div>
				</div>

				<div class="row">
					<div id="comments-container" class="col-12">

						<?php if (!empty($get->comments)) {
							foreach ($get->comments as $key => $val) { 
							if ($val['comm']['approved'] || (!$val['comm']['approved'] && !empty($get->user) && ($get->user['user_id'] == $val['comm']['user_id']))) { ?>

							<!--comment/-->
							<div id="comment-<?php echo $val['comm']['id']; ?>" class="comm">
								<div class="comm__thumb">
									<img src="<?php echo (!empty($val['comm']['user_avatar'])) ? $val['comm']['user_avatar'] : '/images/avatar.png'; ?>" alt="avatar">
								</div>
								<div class="comm__cont">
									<div class="comm__name">
										<?php echo $val['comm']['user_name']; ?> <span class="comm__time"><?php echo mod_date($val['comm']['time']); ?></span>
									</div>

									<div class="comm__txt">
										<?php 
										if (!$val['comm']['approved']) {
											echo '<i class="c-gray">Комментарий отправлен на модерацию.</i><br>';
										}

										echo nl2br($val['comm']['text']); 
										?>
									</div>

									<?php if (!empty($get->user) && ($get->user['user_id'] != $val['comm']['user_id'])) { ?>

									<div>
										<button class="js-toggle comm__replay-btn" data-target-elements="#replay-form-<?php echo $key; ?>" data-second-text="Отмена">Ответить</button>
									</div>

									<form id="replay-form-<?php echo $key; ?>" action="/functions/add-comment.php" method="POST" class="comm__form js-replay-form form hidden">
										<input type="hidden" name="resource_id" value="<?php echo $get->resource['id']; ?>">
										<input type="hidden" name="parent" value="<?php echo $val['comm']['id']; ?>">
										<input type="hidden" name="relation" value="<?php echo $val['comm']['id']; ?>">
										<input type="hidden" name="relation_name" value="<?php echo $val['comm']['user_name']; ?>">
										<div class="row">
											<div class="col-12 p-x-0">
												<div class="form__field">
													<div class="var-height-textarea">
														<div class="var-height-textarea__mirror"></div>
														<textarea name="comment" placeholder="Оставьте комментарий" data-required="true" class="var-height-textarea__textarea form__textarea"></textarea>
													</div>
													<div class="field-error-tip">Заполните поле</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12 ta-r p-0">
												<button type="submit" class="form__submit btn">Отправить</button>
											</div>
										</div>
									</form>

									<?php } ?>

								</div>
							</div>
							<!--/comment-->

							<?php } ?>

							<div class="comments__replay">

								<?php if (!empty($val['replay'])) { foreach ($val['replay'] as $repl_key => $repl_val) {
									if ($repl_val['approved'] || (!$repl_val['approved'] && !empty($get->user) && ($get->user['user_id'] == $repl_val['user_id']))) { ?>

									<div id="comment-<?php echo $repl_val['id']; ?>" class="comm">
										<div class="comm__thumb">
											<img src="<?php echo (!empty($repl_val['user_avatar'])) ? $repl_val['user_avatar'] : '/images/avatar.png'; ?>" alt="avatar">
										</div>

										<div class="comm__cont">
											<div class="comm__name">
												<?php echo $repl_val['user_name']; ?> <span class="comm__time"><?php echo mod_date($repl_val['time']); ?></span>
											</div>
											<div class="comm__txt">
												<?php
												if (!$repl_val['approved']) {
													echo '<i class="c-gray">Комментарий отправлен на модерацию.</i><br>';
												}

												echo '<a href="#comment-'.$repl_val['relation'].'" class="js-anchor">'.$repl_val['relation_name'].'</a>, '.nl2br($repl_val['text']); 
												?>
											</div>

											<?php if (!empty($get->user) && ($get->user['user_id'] != $repl_val['user_id'])) { ?>
											<div>
												<button class="js-toggle comm__replay-btn" data-target-id="replay-form-<?php echo $key.'-'.$repl_key; ?>" data-second-button-text="Отмена">Ответить</button>
											</div>

											<form id="replay-form-<?php echo $key.'-'.$repl_key; ?>" action="/functions/add-comment.php" method="POST" class="comm__form js-replay-form form hide on-toggled-show">
												<input type="hidden" name="resource_id" value="<?php echo $get->resource['id']; ?>">
												<input type="hidden" name="parent" value="<?php echo $val['comm']['id']; ?>">
												<input type="hidden" name="relation" value="<?php echo $repl_val['id']; ?>">
												<input type="hidden" name="relation_name" value="<?php echo $repl_val['user_name']; ?>">

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
									<?php } } } ?>
								</div>
								<?php } } ?>
							</div>
						</div>
					</div>

					<div class="col-5">
						<?php if (!empty($get->resource['iframe'])) { ?>
						<div class="iframe-wrap js-fix-block">
							<?php echo $get->resource['iframe']; ?>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } else { ?>
				<div class="row">
					<div class="col-12 txt c-red">
						Это видео еще не комментировали. Войдите в свой аккаунт или зарегистрируйтесь.
					</div>
				</div>
				<?php } ?>
			</div>
		</main>
		<!--/MAIN-->

		<?php require $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';?>