<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=1280,initial-scale=1.0">
	<link rel="stylesheet" href="/css/styles.css">
	<title><?php echo $get->meta['title']; ?></title>
	<!--favicon/-->
	<link rel="apple-touch-icon" sizes="57x57" href="/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!--/favicon-->
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
								<li class="menu__item<?php echo ($menu_item_current == 'home') ? ' menu__item_current' : ''; ?>">
									<a href="/" class="menu__a">Главная</a>
								</li>
								<li class="menu__item">
									<a href="#rules" class="js-open-popup menu__a c-red">Запрещено публиковать...</a>
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

								<?php } ?>

							</div>
						</div>

					</div>

				</div>
				<button class="js-toggle toggle header__toggle" data-target-elements="#header-mob-menu,.header"><span></span><span></span><span></span><span></span></button>
			</div>
		</header>
		<!--/HEADER-->