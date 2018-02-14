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
				<a href="/" title="На главную"><img src="/images/logo.svg" alt="logo" class="middle-img"></a>
			</div>
		</div>
		<div class="col-9">
			
				<div id="header-mob-menu" class="header__menu-wrap">
					<nav class="header__nav">
						<ul class="menu">
							<li class="menu__item">
								<a href="/" class="menu__a">Главная</a>
							</li>
							<li class="menu__item">
								<a href="#rules" class="js-open-popup menu__a">Правила</a>
							</li>
						</ul>
					</nav>
				</div>
			
		</div>
		<button class="js-toggle toggle header__toggle" data-target-id="header-mob-menu" data-target-class="header"><span></span><span></span><span></span><span></span></button>
	</div>
</header>
<!--/HEADER-->