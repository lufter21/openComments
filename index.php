<?php
require $_SERVER['DOCUMENT_ROOT'].'/load.php';
$get = new Page();
$get->meta = array('title' => 'Территория свободных комментариев');
$menu_item_current = 'home';
require $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>

<div class="wrapper__full-height middle">
	<div class="middle__block">
		<div class="wrap">
			<form id="search-form" action="/comment" method="GET" class="form">
				<div class="row">
					<div class="col-8 col-center vw750-col-12">
						<div class="form__field form__field_btn">
							<label class="overlabel">Ссылка на страницу</label>
							<input type="text" data-type="youtube_link" name="r" data-required="true" class="form__text-input" value="">
							<button type="submit" class="form__btn form__btn_search"></button>
							<div class="form__error-tip" data-second-error-text="Вставьте ссылку на видео в youtube">Вставьте ссылку</div>
						</div>
					</div>
				</div>
			</form>
			<img src="/images/url-field.jpg" alt="img" class="url-img">
		</div>
	</div>
</div>

<?php require $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';?>