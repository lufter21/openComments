<!--FOOTER/-->
<footer id="footer" class="footer">
	<div class="wrap">
		<div class="left">&copy; <span>openComments.dealersAir, <?php echo date('Y');?>. Территория свободных комментариев.</span></div>
		<div class="right">
			<a class="dealersair" href="http://dealersair.com/" title="«dealersAir» — интернет-проекты и сервисы" target="_blank"><img src="/images/dealersair.svg" alt="dealersAir"></a>
		</div>
	</div>
</footer>
<!--/FOOTER-->

</div>
<!--/WRAPPER-->

<!--POPUPs/-->
<div class="popup">

	<div id="popup-1" class="popup__window" style="width: 550px;">
		<button class="popup__close btn-close"></button>
		<div class="popup__inner" style="height: 100px;">
			<a href="#message-popup" class="js-open-msg-popup">POPUP с сообщением</a>
		</div> 
	</div>

	<div id="popup-2" class="popup__window" style="width: 550px;">
		<button class="popup__close btn-close"></button>
		<div class="popup__inner" style="height: 1300px;">
			
		</div>
	</div>

	<div id="message-popup" class="popup__window" style="width: 550px;">
		<button class="popup__close btn-close"></button>
		<div class="popup__inner">
			
		</div>
	</div>

	<div id="media-popup" class="popup-media popup__window popup-media">
		<button class="popup__close btn-close"></button>
		<div class="popup__inner">
			<div class="popup-media__box">
				<img src="#" class="ovf-image popup-media__image" alt="photo">
				<a href="#" class="popup-media__play"></a>
				<button class="popup-media__arr popup-media__arr_l" data-dir="prev"></button>
				<button class="popup-media__arr popup-media__arr_r" data-dir="next"></button>
				<!--iframe src="#" class="popup-media__iframe" allowfullscreen></iframe-->
			</div>
			<div class="popup-media__bar row">
				<div class="col-6 vw1000-col">
					<div class="popup-media__bar-date popup-media__data-0">
						<!--data string 1-->
					</div>
					<div class="popup-media__bar-tit popup-media__data-1">
						<!--data string 2-->
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="password-recovery" class="form-popup popup__window">
		<button class="popup__close btn-close"></button>
		<div class="popup__inner">
			<div class="popup__tit">Восстановление пароля</div>
			<form id="pass-recovery-form" action="/functions/send.php" method="POST" class="form">
				<div class="form__field">
					<label class="overlabel">E-mail</label>
					<input type="text" name="email" data-type="email" data-required="true" class="form__text-input" value="">
					<div class="form__error-tip" data-second-error-text="Некорректный E-mail">Введите E-mail</div>
				</div>
				<div class="ta-c mt-25">
					<button type="submit" class="button button_red">Восстановить</button>
				</div>
			</form>
		</div>
	</div>

	<div id="rules" class="p-rules popup__window">
		<button class="popup__close btn-close"></button>
		<div class="popup__inner">
			<div class="popup__tit c-red">В комментариях Запрещается публиковать:</div>
			<ul>
				<li>
					Ссылки (любого вида), которые указывают на сайты казино, тотализаторов, букмекерских организаций, сайты пропагандирующие насилие и торгующие запрещенными товарами (курительных смесей, наркотических средств), финансовые пирамиды (хайп проекты), сайты с порнографией и рекламой секс услуг, сайты политических партий и организаций, фишинг и хак сайты.
				</li>
				<li>
					Сообщения с предложением/спросом, покупки/продажи запрещенных товаров и услуг (курительных смесей, наркотических средств, порнографии, секс услуг).
				</li>
				<li>
					Призывы к насилию.
				</li>
			</ul>
		</div> 
	</div>

</div>
<!--/POPUPs-->

<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/easing.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/mousewheel.min.js"></script>
<script src="/js/scrollpane.min.js"></script>
<script src="/js/images.js"></script>
<script src="/js/popup.js"></script>
<script src="/js/button.js"></script>
<script src="/js/form.js"></script>
<script src="/js/auth.js"></script>
<script src="/js/common.js"></script>

</body>
</html>