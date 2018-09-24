<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="/css/styles.css">

	<title><?php echo $get->meta['title']; ?></title>

</head>
<body>

<!--WRAPPER/-->
<div class="wrapper">

<!--HEADER/-->
<header class="header">
	<div class="row-col-mid wrap header__wrap">
		<div class="header__logo col-3">
			<div class="middle-img-wrap">
				<a href="/" title="На главную"><img src="/images/opencomments.svg" alt="opencomments" class="middle-img"></a>
			</div>
		</div>
		<div class="col-9">
			
				<div id="header-mob-menu" class="header__nav-wrap">

					<nav class="header__nav">
						<ul class="menu">
							<li class="menu__item">
								<a href="#rules" class="js-open-popup menu__a">Правила</a>
							</li>
						</ul>
					</nav>

					<div class="header__user user middle">
						<?php if (!empty($get->user)) { ?>

						<a href="#" class="js-toggle" data-target-elements="#user-menu">
							<span class="user__name">
								<?php echo $get->user['name']; ?>
							</span>
							<span class="user__thumb">
								<img src="<?php echo $get->user['avatar']; ?>" alt="avatar" class="cover-img">
							</span>
						</a>

						<?php } else { ?>

						<a href="#" class="js-toggle user__btn" data-target-elements="#user-menu">Вход/Регистрация</a>

						<?php } ?>

						<div id="user-menu" class="user__bubble bubble">

							<?php if (!empty($get->user)) { ?>

								<a href="/?logout=true">Выйти</a>

							<?php } else { ?>

							<div id="js_auth_msg" class="user__auth-msg"></div>

							<div id="uLogin0484816c" data-ulogin="display=panel;fields=first_name,last_name,email,photo;theme=flat;providers=vkontakte,odnoklassniki,facebook,youtube,google,mailru,twitter,yandex,livejournal,openid,lastfm,linkedin,liveid,soundcloud,steam,flickr,uid,webmoney,foursquare,tumblr,googleplus,vimeo,instagram,wargaming;redirect_uri=;callback=socAuth"></div>
							<script src="https://ulogin.ru/js/ulogin.js"></script>

							<!--<div class="user__login on-toggled-hide">
								<form id="login-form" action="/functions/auth.php" method="POST" class="form">
									<input type="hidden" name="form_role" value="log">
									<div class="form__field">
										<label class="overlabel">E-mail</label>
										<input type="text" name="email" data-type="email" data-required="true" class="form__text-input" value="">
										<div class="form__error-tip" data-second-error-text="Некорректный E-mail">Введите E-mail</div>
									</div>
									<div class="form__field">
										<label class="overlabel">Пароль</label>
										<input type="password" name="pass_l" data-type="pass" data-required="true" class="form__text-input" value="">
										<div class="form__error-tip">Введите пароль</div>
									</div>
									<button type="submit" class="button button_red">Войти</button>
									<a href="#password-recovery" class="js-open-popup form__link">Забыли пароль?</a>
								</form>

								<button class="js-toggle user__bubble-btn" data-target-elements=".user__login,.user__registration,.user__registration .js-toggle">Регистрация</button>
							</div>

							<div class="user__registration hide on-toggled-show">
								<form id="registration-form" action="/functions/auth.php" method="POST" class="form">
									<input type="hidden" name="form_role" value="reg">

									<div class="form__field">
										<label class="overlabel">Имя</label>
										<input type="text" name="name" data-required="true" class="form__text-input" value="">
										<div class="form__error-tip">Введите ваше имя</div>
									</div>

									<div class="form__field">
										<label class="overlabel">E-mail</label>
										<input type="text" name="email" data-type="email" data-required="true" class="form__text-input" value="">
										<div class="form__error-tip" data-second-error-text="Некорректный E-mail">Введите E-mail</div>
									</div>

									<div class="form__field">
										<label class="overlabel">Пароль</label>
										<input type="password" name="pass_r" data-type="pass" data-pass-compare="group" data-pass-length="6" class="form__text-input" value="">
										<div class="form__error-tip" data-second-error-text="Не менее 6 символов" data-third-error-text="Не совпадают">Введите пароль</div>
									</div>

									<div class="form__field">
										<label class="overlabel">Повторите пароль</label>
										<input type="password" name="pass_r2" data-type="pass" data-pass-compare="group" data-pass-length="6" class="form__text-input" value="">
										<div class="form__error-tip" data-second-error-text="Не менее 6 символов" data-third-error-text="Не совпадают">Повторите пароль</div>
									</div>

									<button type="submit" class="button button_red button_w-full">Зарегистрироваться</button>
								</form>

								<button class="js-toggle user__bubble-btn" data-target-elements=".user__login,.user__registration,.user__login .js-toggle">Вход</button>
							</div>-->
							<?php } ?>

						</div>
					</div>

				</div>
			
		</div>
		<button class="js-toggle toggle header__toggle" data-target-elements="#header-mob-menu,.header"><span></span><span></span><span></span><span></span></button>
	</div>
</header>
<!--/HEADER-->