<?php
require $_SERVER['DOCUMENT_ROOT'].'/load.php';
$get = new Page();
$get->meta = array('title' => 'Территория свободных комментариев');
$menu_item_current = 'home';
require $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>

<!--MAIN/-->
<main>
	<div class="full-page full-page_middle">
		<div class="full-page_middle__inner">

			<div class="row">
				<div class="col-12 txt ta-c">
					Если комментарии, к видео на youtube отключены,<br> если тебя забанили или твои комментарии удаляют — оставляй комментарии тут.
				</div>
			</div>

			<form id="search-form" action="/comment" method="GET" class="form form_src">
				<div class="row">
					<div class="col-12">
						<div class="form__field form__field_btn">
							<input type="text" data-type="youtube_link" name="r" data-required="true" placeholder="Ссылка на страницу youtube" class="form__text-input" value="">
							<button type="submit" class="form__btn form__btn_search"></button>
							<div class="field-error-tip" data-error-text-2="Unacceptable symbols">Вставьте ссылку на страницу youtube</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 p-y-0">
						<div class="form__loader m-0"></div>
					</div>
				</div>
			</form>

			<div class="row">
				<div class="col-12 ta-c">
					<img src="/images/url-field.jpg" alt="img" class="url-img">
				</div>
			</div>

		</div>
	</div>
</main>
<!--/MAIN-->

<?php require $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';?>