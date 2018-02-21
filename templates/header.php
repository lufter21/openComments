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
						<a href="#" class="js-toggle" data-target-elements="#user-menu">
							<span class="user__name">
								Lufter
							</span>
							<span class="user__thumb">
								<img src="../../images/avatar.png" alt="avatar" class="cover-img">
							</span>
						</a>
						<div id="user-menu" class="user__bubble bubble">
							
						</div>
					</div>

				</div>
			
		</div>
		<button class="js-toggle toggle header__toggle" data-target-elements="#header-mob-menu,.header"><span></span><span></span><span></span><span></span></button>
	</div>
</header>
<!--/HEADER-->