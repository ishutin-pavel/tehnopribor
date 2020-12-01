<!DOCTYPE html>
<html prefix="http://ogp.me/ns#">
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	    <?php mgMeta(); ?>
		<?php mgAddMeta('<script type="text/javascript" src="' . PATH_SITE_TEMPLATE . '/js/modal.js"></script>'); ?>
		<?php mgAddMeta('<script type="text/javascript" src="' . PATH_SITE_TEMPLATE . '/js/owl.carousel.min.js"></script>'); ?>
		<?php mgAddMeta('<script type="text/javascript" src="' . PATH_SITE_TEMPLATE . '/js/script.js"></script>'); ?>
		<?php mgAddMeta('<script type="text/javascript" src="' . PATH_SITE_TEMPLATE . '/js/responsive.js"></script>'); ?>
    </head>
	<body class="<?php if(URL::isSection(null)){echo 'j-index';}else{echo 'j-no-index';} ?> <?php if(MG::get('controller')=="controllers_catalog" && !isSearch()) {echo 'j-accordion-menu--hidden';} ?> <?php  if(MG::get('isStaticPage')){echo 'j-static-page';} ?>">
			
		<?php layout('svg'); ?>

		<header>
			<div class="j-container">
				<div class="j-logo">
					<a href="<?php echo SITE ?>"><?php echo mgLogo(); ?></a>
				</div>
				
				<div class="j-worktime-search">
					<div class="j-worktime">
						<svg class="icon icon--time"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--time"></use></svg>
	                    <i>Работаем:</i> Пн-Пт. <span>с 9:00 до 21:00</span> Сб. <span>с 10:00 до 18:00</span>
                	</div>
					<div class="j-search">
						<?php layout('search'); ?>
					</div>
				</div>

				<div class="j-contacts">
					<svg class="icon icon--phone"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--phone"></use></svg>
					<a href="tel:+84955555555">8 (495) 555-55-55</a>
					<a href="tel:+84957777777">8 (495) 777-77-77</a>
				    <?php if(class_exists('callme')): ?>[call-me]<?php endif; ?>
				</div>

				<div class="j-login">
					<?php layout('auth'); ?>
				</div>

				<div class="j-mobile-button">
					<div id="j-catalog__button">Каталог</div>
					<div id="j-page__button">Меню</div>
				</div>
			</div>
		</header>
		
		<div class="j-page-menu">
			<div class="j-container">
				<?php layout('topmenu'); ?>
			</div>
		</div>

		<main>
			<aside>
				<?php if(class_exists('JSAccordionMenu')): ?>[js-accordionmenu]<?php endif; ?>
				
				<?php filterCatalog(); ?>
				
				<?php if(class_exists('JSSlider')): ?>[jsslider id=2]<?php endif; ?>
				
				<?php if(class_exists('jslastview')): ?>[js-lastview]<?php endif; ?>
			</aside>
			
			<article>
				<?php if(class_exists('JSSlider')): ?>[jsslider id=1]<?php endif; ?>

				<!-- Trigger and Banner - Start -->
				<?php if(URL::isSection(null)): ?>
					<div class="j-trigger">
						<a href="<?php echo SITE ?>/group?type=sale">
							<svg class="icon icon--percent"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--percent"></use></svg>
							<span>Постоянные акции и скидки</span>
						</a>
						<a href="<?php echo SITE ?>/dostavka-i-oplata">
							<svg class="icon icon--delivery"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--delivery"></use></svg>
							<span>Бесплатная доставка от 4 999 руб.</span>
						</a>
						<a href="<?php echo SITE ?>/garantiya">
							<svg class="icon icon--warranty"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--warranty"></use></svg>
							<span>Гарантия качества продукции!</span>
						</a>
					</div>

					<div class="j-banner-img">
						<a href="/krossovki/vtoroy-uroven_35/krossovki-adidas-climacool-aerate-2-0-dark-blue">
							<img src="<?php echo PATH_SITE_TEMPLATE ?>/images/j-banner-img/1.jpg" alt="images" />
						</a>
						<a href="/krossovki/vtoroy-uroven/tretiy-uroven_38/adidas-originals-zx-8000-flux-v01">
							<img src="<?php echo PATH_SITE_TEMPLATE ?>/images/j-banner-img/2.jpg" alt="images" />
						</a>
					</div>
				<?php endif; ?>
				<!-- /Trigger and Banner -->

				<?php if(class_exists('jsnav')): ?>[jsnav]<?php endif; ?>

				<?php layout('content'); ?>

			</article>
		</main>

		<footer>
			<div class="j-container">
				<div class="j-copyright">&copy; <?php echo date('Y') ?> год. Все права защищены.</div>
				<div class="j-phone">
					<svg class="icon icon--phone"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--phone"></use></svg>
					<a href="tel:+84955555555">8 (495) 555-55-55</a>
					<a href="tel:+84957777777">8 (495) 777-77-77</a>
				</div>
				<div class="j-to-top">
					<svg class="icon icon--arrow-up"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-up"></use></svg>
				</div>
			</div>
		</footer>

		<?php if(class_exists('jsbanner')): ?>[jsbanner]<?php endif; ?>

		<?php layout('cart'); ?>

		<?php layout('widget'); ?>

		<script type="text/javascript">(function() {
		  if (window.pluso)if (typeof window.pluso.start == "function") return;
		  if (window.ifpluso==undefined) { window.ifpluso = 1;
		    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
		    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
		    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
		    var h=d[g]('body')[0];
		    h.appendChild(s);
		  }})();</script>
		<div class="pluso" data-background="#ebebeb" data-options="big,square,line,vertical,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google"></div> 
    
	</body>
</html>