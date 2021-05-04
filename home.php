<?php
	ob_start();
	$connectDB = "";
	$layout_html_css_mainFile = "page.css";
	$layout_html_js_mainFile = "page.js";
	require 'includes-php-files/functions/title.php';
?>

	<!-- Strat With Galaxy -->
	<div class="galaxy">
		<!-- Start With glx-overlay is-hidden -->
		<section class="glx-overlay is-hidden">
			<div class="glx-overlay__glass glx-overlay__glass--dark"></div>
			<div class="glx-overlay__box glx-overlay__box--big glx-overlay__box--video glx-overlay__box--naked">
				<div class="glx-overlay__hd-content">
					<iframe galaxy-overlay-video="" src="//www.youtube.com/embed/r2Lq3I8JECY?rel=0&amp;enablejsapi=1" allow="autoplay; encrypted-media" allowfullscreen="" frameborder="0"></iframe>
				</div>
			</div>
		</section>
		<!-- End WIth glx-overlay is-hidden -->
		<!-- Strat With glx-section -->
		<section class="glx-section glx-section--intro">
			<video class="glx-section__video is-active" autoplay muted="muted" loop="loop" playsinline="playsinline">
				<!-- https://gogalaxy.gog-statics.com//videos/cover-1080-1920_003.mp4 -->
				<!-- https://gogalaxy.gog-statics.com//videos/cover-768-1920_003.mp4 -->
				<source src="https://gogalaxy.gog-statics.com//videos/cover-900-1920_003.mp4" type="video/mp4">
					First Video
			</video>
			<div class="glx-section__top">
				<div class="glx-langs">
					<span><?php
						$resaultLang = $fetchLanguage[$gog_lang_item];
						if($resaultLang == "en"): echo "english";
						elseif($resaultLang == "de"): echo "Deutsch";
						elseif($resaultLang == "pl"): echo "Polski";
						elseif($resaultLang == "fr"): echo "Français";
						elseif($resaultLang == "ru"): echo "Русский";
						elseif($resaultLang == "zh-cn"): echo "简体中文";
						endif;
						?></span>
						<?php
						$gog_lang = "gog_lang";
						$gog_lang_item = "gog_lang_gogGalaxy2AllYourGameInOnePlace";
							if($languagePostInLink == "en"):
								if($_SERVER['REQUEST_METHOD'] == 'POST'):
									$statement = $connect->prepare("UPDATE $gog_lang SET $gog_lang_item = ?");
									$statement->execute(array('en'));
									header('location: ?lang=en');
								endif;
							elseif($languagePostInLink == "de"):
								if($_SERVER['REQUEST_METHOD'] == 'POST'):
									$statement = $connect->prepare("UPDATE $gog_lang SET $gog_lang_item = ?");
									$statement->execute(array('de'));
									header('location: ?lang=de');
								endif;
							elseif($languagePostInLink == "pl"):
								if($_SERVER['REQUEST_METHOD'] == 'POST'):
									$statement = $connect->prepare("UPDATE $gog_lang SET $gog_lang_item = ?");
									$statement->execute(array('pl'));
									header('location: ?lang=pl');
								endif;
							elseif($languagePostInLink == "fr"):
								if($_SERVER['REQUEST_METHOD'] == 'POST'):
									$statement = $connect->prepare("UPDATE $gog_lang SET $gog_lang_item = ?");
									$statement->execute(array('fr'));
									header('location: ?lang=fr');
								endif;
							elseif($languagePostInLink == "ru"):
								if($_SERVER['REQUEST_METHOD'] == 'POST'):
									$statement = $connect->prepare("UPDATE $gog_lang SET $gog_lang_item = ?");
									$statement->execute(array('ru'));
									header('location: ?lang=ru');
								endif;
							elseif($languagePostInLink == "zh-cn"):
								if($_SERVER['REQUEST_METHOD'] == 'POST'):
									$statement = $connect->prepare("UPDATE $gog_lang SET $gog_lang_item = ?");
									$statement->execute(array('zh-cn'));
									header('location: ?lang=zh-cn');
								endif;
							else: header('location: ?lang='. $resaultLang);
							endif;
						?>
					<ul>
						<li><form method="POST" action="?lang=en"><input type="submit" value="English"/></form></li>
						<li><form method="POST" action="?lang=de"><input type="submit" value="Deutsch"/></form></li>
						<li><form method="POST" action="?lang=pl"><input type="submit" value="Polski"/></form></li>
						<li><form method="POST" action="?lang=fr"><input type="submit" value="Français"/></form></li>
						<li><form method="POST" action="?lang=ru"><input type="submit" value="Русский"/></form></li>
						<li><form method="POST" action="?lang=zh-cn"><input type="submit" value="简体中文"/></form></li>
					</ul>
				</div>
			</div>
			<div class="glx-section__inner">
				<img src="https://gogalaxy.gog-statics.com/build/images/galaxy-logo-fa7b4b2d.png"/>
				<h1><?php echo language_en_de_pl_fr_ru_zhcn('gog galaxy 2.0'); ?></h1>
				<p><?php echo language_en_de_pl_fr_ru_zhcn('All your games and friends in one place.'); ?></p>
			</div>
			<div class="glx-section__play">
				<button class="glx-button-play"></button>
			</div>
			<div class="glx-section__bottom">
				<div class="glx-section__inner">
					<p class="glx-section__info"><?php echo language_en_de_pl_fr_ru_zhcn('Connect GOG GALAXY 2.0 with multiple platforms and unite all your games and friends scattered across them in one powerful app.'); ?></p>
					<a class="glx-button glx-button-download glx-section__button" href=""><?php echo language_en_de_pl_fr_ru_zhcn('DOWNLOAD GOG GALAXY 2.0'); ?></a>
					<p class="glx-section__disclaimer"><?php echo language_en_de_pl_fr_ru_zhcn('GOG GALAXY 2.0 Open Beta requires Windows 8 or newer.'); ?> <br/> <?php echo language_en_de_pl_fr_ru_zhcn('Available also on'); ?> <a class="a" href=""><?php echo language_en_de_pl_fr_ru_zhcn('Mac OS X.'); ?></a></p>
				</div>
			</div>
		</section>
		<!-- End With glx-section -->
		<!-- Strat With glx-section- -quotes -->
		<section class="glx-section--quotes">
			<div class="glx-section__inner">
				<div class="glx-text-rotator">
					<div class="glx-text-rotator__item is-active">
						<!-- The <q> tag defines a short quotation -->
						<q><?php echo language_en_de_pl_fr_ru_zhcn('GOG GALAXY 2.0 will be my new home base for organizing my library and picking what to play next.'); ?></q>
						<!-- The <cite> tag defines Specifies the source URL of the quote -->
						<cite><?php echo language_en_de_pl_fr_ru_zhcn('– PC GAMER'); ?></cite>
					</div>
					<div class="glx-text-rotator__item">
						<!-- The <q> tag defines a short quotation -->
						<q><?php echo language_en_de_pl_fr_ru_zhcn('playing my PC games through GOG GALAXY 2.0 from now on is looking to be a no brainer.'); ?></q>
						<!-- The <cite> tag defines Specifies the source URL of the quote -->
						<cite><?php echo language_en_de_pl_fr_ru_zhcn('– GameSpot'); ?></cite>
					</div>
					<div class="glx-text-rotator__item">
						<!-- The <q> tag defines a short quotation -->
						<q><?php echo language_en_de_pl_fr_ru_zhcn('It\'s basically the system I\'ve been waiting for years for someone to build. A one stop deployment platform that connects and works with all the others.'); ?></q>
						<!-- The <cite> tag defines Specifies the source URL of the quote -->
						<cite><?php echo language_en_de_pl_fr_ru_zhcn('– CohhCarnage'); ?></cite>
					</div>
				</div>
			</div>
		</section>
		<!-- End With glx-section- -quotes -->
		<!-- Strat With glx-section- -your-games -->
		<section class="glx-section--your-games">
			<video class="glx-section__video is-active" autoplay muted="muted" loop="loop" playsinline="playsinline">
				<source src="https://gogalaxy.gog-statics.com//videos/your-games-1920-full_001.mp4" type="video/mp4">
					second Video
			</video>
			<div class="glx-section__inner">
				<div class="glx-header">
					<svg class="glx-icon"><use xlink:href="#icon-your-games"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 80 80" id="icon-your-games"><path fill-rule="evenodd" clip-rule="evenodd" d="M50,27H25c-0.6,0-1,0.4-1,1v25c0,0.6,0.4,1,1,1h25c0.6,0,1-0.4,1-1V28C51,27.5,50.5,27,50,27z M40,0 C17.9,0,0,17.9,0,40c0,22.1,17.9,40,40,40s40-17.9,40-40C80,17.9,62.1,0,40,0z M53,54.5c0,0.8-0.7,1.5-1.5,1.5h-28 c-0.8,0-1.5-0.7-1.5-1.5v-28c0-0.8,0.7-1.5,1.5-1.5h28c0.8,0,1.5,0.7,1.5,1.5V54.5z M57,48.8c0,1.4-0.8,2.6-2,3V23H26.5 c0.4-1.2,1.6-1.9,3-1.9h24.3c1.8,0,3.2,1.4,3.2,3.2V48.8z"></path></symbol></use></svg>
					<h2><?php echo language_en_de_pl_fr_ru_zhcn('Your Games'); ?></h2>
					<p><?php echo language_en_de_pl_fr_ru_zhcn('Organize your games across platforms into one functional and beautiful library.'); ?></p>
				</div>
				<div class="glx-features-list">
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-library"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-library"><path fill-rule="evenodd" clip-rule="evenodd" d="M45.3,42.9v-4V13v-2.1H12.8c0.4-1.1,1.6-1.9,3-1.9h28.3c1.8,0,3.2,1.4,3.2,3.1V40 C47.3,41.4,46.5,42.5,45.3,42.9z M43.3,14.3v28.8h0.9h0h-0.9v2.4c0,0.8-0.7,1.5-1.5,1.5h-32c-0.8,0-1.5-0.7-1.5-1.5V14.3 c0-0.8,0.7-1.5,1.5-1.5h32C42.7,12.8,43.3,13.5,43.3,14.3z M41.3,15.8c0-0.5-0.4-1-1-1h-29c-0.6,0-1,0.4-1,1v28.3c0,0.5,0.4,1,1,1 h29c0.6,0,1-0.4,1-1V15.8z"></path></symbol></use></svg>
						<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('One library'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('Import all your games from PC and consoles, build and organize them into one master collection.'); ?></p>
					</div>
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-stats"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-stats"><path fill-rule="evenodd" clip-rule="evenodd" d="M10,49H8v-2V9h2v38h38v2H10z M43,15L33,25l0,0h-7.1L15.5,37.3L14,36l11-13l0,0h7.2l9-9H38v-2h5h2v2v5h-2V15z"></path></symbol></use></svg>
						<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('Game stats'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('Keep track of all your achievements, hours played and games owned, combined across platforms.'); ?></p>
					</div>
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-launcher"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-launcher"><g><path d="M48.6,7.5c-0.2-0.2-0.4-0.3-0.7-0.3c-0.2,0-5,0.2-10.7,2.2c-4.6,1.6-8.4,3.9-11.3,6.9c-0.7,0.7-1.3,1.4-1.9,2.1 c-2.9-1.7-5.2-1.2-6.7-0.4c-3.4,1.8-5.5,6.7-5.5,10.3c0,0.5,0.4,0.9,0.9,0.9c0.2,0,0.5-0.1,0.6-0.3c1.8-1.8,4-1.7,4.7-1.6l0.3,0.3 c-0.6,1.4-1.1,2.9-1.5,4.3c-0.1,0.5-0.1,1.1,0.1,1.5c-0.9,0.4-1.7,1-2.4,1.7c-2.3,2.3-2.8,7.9-2.8,8.1c0,0.5,0.3,0.9,0.8,1 c0,0,0.1,0,0.1,0h0.1c0.2,0,5.8-0.5,8.1-2.8c0.7-0.7,1.3-1.5,1.7-2.4c0.5,0.2,1,0.2,1.6,0.1c1.5-0.4,2.9-0.9,4.3-1.5l0.3,0.3 c0.1,0.7,0.2,2.9-1.6,4.7c-0.3,0.4-0.3,0.9,0,1.3c0.2,0.2,0.4,0.3,0.6,0.3c3.5,0,8.5-2.1,10.3-5.5c0.8-1.5,1.3-3.8-0.4-6.7 c0.7-0.6,1.4-1.3,2.1-1.9c2.9-2.9,5.2-6.7,6.9-11.3c2-5.7,2.2-10.5,2.2-10.7C48.9,7.9,48.8,7.7,48.6,7.5z M13.8,26.4 c0.6-2.7,2.2-5.6,4.3-6.8c1.5-0.8,3-0.7,4.7,0.2c-1.4,1.9-2.7,3.9-3.7,6.1c-0.1-0.1-0.3-0.2-0.5-0.3C17,25.3,15.3,25.6,13.8,26.4z M19.6,40.3c-1.2,1.2-4.1,1.9-5.9,2.1c0.3-1.8,0.9-4.7,2.1-5.9c0.6-0.7,1.4-1.2,2.3-1.5l3,3C20.8,38.8,20.3,39.6,19.6,40.3z M23.7,37.5c-0.3,0.1-0.6,0-0.8-0.3l-1.7-1.7l-2.3-2.3c-0.2-0.2-0.3-0.5-0.3-0.8c0.3-1.2,0.7-2.3,1.1-3.4l7.4,7.4 C26,36.8,24.8,37.2,23.7,37.5L23.7,37.5z M36.5,38c-1.2,2.2-4.1,3.8-6.8,4.3c0.9-1.6,1-3.7,0.7-4.9c0-0.2-0.1-0.3-0.3-0.4 c2.2-1,4.2-2.3,6.1-3.7C37.2,34.9,37.3,36.5,36.5,38L36.5,38z M38.5,28.9c-0.8,0.8-1.7,1.6-2.6,2.3c-2.2,1.8-4.6,3.2-7.1,4.4 l-8.4-8.4c1.2-2.5,2.7-4.9,4.4-7.1c0.7-0.9,1.5-1.8,2.3-2.6c2.6-2.6,6-4.7,10.1-6.3l7.5,7.5C43.3,22.9,41.2,26.3,38.5,28.9 L38.5,28.9z M45.4,16.9l-6.2-6.2c2.5-0.8,5.2-1.3,7.8-1.6C46.7,11.8,46.2,14.4,45.4,16.9L45.4,16.9z"></path><path d="M24.7,44c-0.3-0.3-0.9-0.3-1.3,0l-2.5,2.5c-0.3,0.4-0.3,0.9,0,1.3c0.3,0.3,0.9,0.3,1.2,0l2.5-2.5C25,45,25,44.4,24.7,44z"></path><path d="M12.1,31.4c-0.3-0.3-0.9-0.3-1.3,0L8.3,34c-0.3,0.4-0.3,0.9,0,1.3c0.3,0.3,0.9,0.3,1.2,0l2.5-2.5 C12.4,32.4,12.4,31.8,12.1,31.4z"></path><path d="M18.4,45.3c-0.3-0.3-0.9-0.3-1.3,0l-6,6c-0.4,0.3-0.4,0.9,0,1.3c0.3,0.4,0.9,0.4,1.3,0c0,0,0,0,0,0l6-6 C18.7,46.2,18.7,45.6,18.4,45.3z"></path><path d="M11.2,45.3c-0.3-0.3-0.9-0.3-1.3,0l-6,6c-0.3,0.4-0.3,0.9,0,1.3c0.3,0.3,0.9,0.3,1.2,0l6-6C11.4,46.3,11.2,45.7,11.2,45.3z"></path><path d="M10.8,37.7c-0.3-0.3-0.9-0.3-1.3,0l-6,6c-0.3,0.4-0.3,0.9,0,1.3c0.3,0.3,0.9,0.3,1.2,0l6-6C11.2,38.7,11.2,38.1,10.8,37.7z"></path></g></symbol></use></svg>
						<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('Game launcher'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('Install and launch any PC game you own, no matter the platform.'); ?></p>
					</div>
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-customization"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-customization"><path fill-rule="evenodd" clip-rule="evenodd" d="M47.8,38h-5.9c-0.5-3.9-3.9-7-7.9-7c-4.1,0-7.5,3.1-7.9,7H8.2C7.5,38,7,38.5,7,39s0.5,1,1.2,1h17.9 c0.5,3.9,3.9,7,7.9,7c4.1,0,7.4-3,7.9-7h5.9c0.6,0,1.2-0.4,1.2-1S48.5,38,47.8,38z M34,45c-3.3,0-6-2.7-6-6c0-3.3,2.7-6,6-6 s6,2.7,6,6C40,42.3,37.3,45,34,45z M8.1,18h6c0.5,3.9,3.9,7,7.9,7s7.4-3.1,7.9-7h18c0.6,0,1.1-0.4,1.1-1c0-0.6-0.5-1-1.1-1h-18 c-0.5-3.9-3.9-7-7.9-7s-7.4,3.1-7.9,7h-6C7.5,16,7,16.4,7,17C7,17.6,7.5,18,8.1,18z M22,11c3.3,0,6,2.7,6,6c0,3.3-2.7,6-6,6 s-6-2.7-6-6C16,13.7,18.7,11,22,11z"></path></symbol></use></svg>
						<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('Full customization'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('Create custom library views by filtering, sorting, tagging and adding your own visuals like game backgrounds and covers.'); ?></p>
					</div>
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-discoverability"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-discoverability"><path d="M28,50C15.9,50,6,40.2,6,28S15.9,6,28,6s22,9.9,22,22S40.2,50,28,50z M28,8.1C17,8.1,8.1,17,8.1,28S17,47.9,28,47.9 S47.9,39,47.9,28S39,8.1,28,8.1z M16.1,39.3l7.1-16.1l16.2-7.6l-7.2,16.2L16.1,39.3z M19.1,36l11-5.4l-5.6-5.2L19.1,36z M26.1,24.1 l5.2,4.8l5.2-10.2L26.1,24.1z"></path></symbol></use></svg>
						<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('Games discovery'); ?> <span><?php echo language_en_de_pl_fr_ru_zhcn('soon'); ?></span></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('Follow upcoming releases, and discover games popular among your friends and the gaming community.'); ?></p>
					</div>
				</div>
			</div>
		</section>
		<!-- End With glx-section- -your-games -->
		<!-- Strat With glx-section- -your-friends -->
		<section class="glx-section--your-friends">
			<div class="glx-section__inner">
				<div class="glx-header">
					<svg class="glx-icon"><use xlink:href="#icon-your-friends"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 80 80" id="icon-your-friends"><path d="M44.81,40.63c-8.42,0-14,6.66-14.24,10.8.78.8,6.34,4,14.11,4s13.33-3.2,14.1-4C58.52,47.29,53,40.63,44.81,40.63Zm0-2.4c3.62,0,7.76-4.4,7.76-8.54s-4-8.93-7.76-8.93-7.9,4.8-7.9,8.93S41.18,38.23,44.81,38.23ZM40,0A40,40,0,1,0,80,40,40,40,0,0,0,40,0ZM25.39,54c-3.88-.27-7.89-1.07-7.89-4.13,0-3.87,3.24-10.67,8.15-10.67a10.13,10.13,0,0,1-4.27-8.4c0-5.47,4.14-10,9.19-10a7.54,7.54,0,0,1,3.49.8A7.81,7.81,0,0,0,32.51,24a3.7,3.7,0,0,0-2.07-.53c-3.23,0-6.6,3.86-6.6,7.46s3.5,6,6.6,6A6.36,6.36,0,0,0,32,36.63a5.81,5.81,0,0,0,1.82,1.6,5.31,5.31,0,0,0-3.24,1.06c-6.21,0-10.35,6.94-10.48,10.27.39.4,2.33,1.07,5.3,1.47a7.21,7.21,0,0,0-.13,1.6A4.2,4.2,0,0,0,25.39,54Zm19.29,4.13c-5,0-16.83-1.06-16.83-6.53,0-4.53,6.21-12.27,11.52-12.13a12.06,12.06,0,0,1-5-9.74c0-6.4,4.92-11.6,10.49-11.6S55,23.29,55,29.69a12.21,12.21,0,0,1-4.79,9.74c5.57,0,11.26,7.46,11.26,12.13C61.5,57,49.72,58.09,44.68,58.09Z"></path></symbol></use></svg>
					<h2><?php echo language_en_de_pl_fr_ru_zhcn('Your Friends'); ?></h2>
					<p><?php echo language_en_de_pl_fr_ru_zhcn('Check what your friends are doing across platforms and chat with them.'); ?></p>
				</div>
				<div class="glx-features-list">
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-friends-list"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-friends-list"><path d="M14.3,41.5c0,0.4,0,0.8,0.1,1.2c-3.7-0.2-7.6-1-7.6-3.8c0-3.6,3.1-9.9,7.9-9.9c-2.6-1.8-4.1-4.7-4.1-7.8 c0-5.1,4-9.3,8.9-9.3c1.2,0,2.3,0.2,3.4,0.7c-0.6,0.6-1.1,1.4-1.5,2.2c-0.6-0.4-1.3-0.5-2-0.5c-3.1,0-6.4,3.6-6.4,7s3.4,5.6,6.4,5.6 c0.5,0,1-0.1,1.5-0.2c0.5,0.6,1,1.1,1.7,1.5c-1.1,0-2.2,0.3-3.1,1l0,0c-6,0-10,6.5-10.1,9.6c0.4,0.4,2.2,1,5.1,1.4 C14.3,40.5,14.3,41,14.3,41.5z M49.2,40.5c0,5.1-11.4,6.1-16.2,6.1s-16.2-1-16.2-6.1c0-4.2,6-11.4,11.1-11.3c-3-2-4.8-5.4-4.9-9.1 c0-6,4.7-10.8,10.1-10.8c5.4,0,9.9,4.8,9.9,10.8c0,3.6-1.7,7-4.6,9.1C43.7,29.2,49.2,36.2,49.2,40.5z M33.1,28.1 c3.5,0,7.5-4.1,7.5-7.9c0-4-3.9-8.3-7.5-8.3c-3.5,0-7.6,4.5-7.6,8.3S29.6,28.1,33.1,28.1z M46.6,40.4c-0.2-3.9-5.6-10.1-13.5-10.1 c-8.1,0-13.5,6.2-13.7,10.1c0.8,0.7,6.1,3.7,13.6,3.7S45.8,41.2,46.6,40.4z"></path></symbol></use></svg>
						<h3><?php echo language_en_de_pl_fr_ru_zhcn('One friends list'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('Bring together your friends from all platforms, and see their online status.'); ?></p>
					</div>
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-activity"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-activity"><path d="M28,7C16.4,7,7,16.4,7,28s9.4,21,21,21s21-9.4,21-21S39.6,7,28,7z M28,46.8C17.6,46.8,9.2,38.4,9.2,28S17.6,9.2,28,9.2 c10.4,0,18.8,8.4,18.8,18.8C46.8,38.4,38.4,46.8,28,46.8C28,46.8,28,46.8,28,46.8z M28,15c-7.2,0-13,5.8-13,13s5.8,13,13,13 s13-5.8,13-13S35.2,15,28,15z M28,38.9c-6,0-10.9-4.9-10.9-10.9c0-6,4.9-10.9,10.9-10.9c6,0,10.9,4.9,10.9,10.9 C38.9,34,34,38.9,28,38.9C28,38.9,28,38.9,28,38.9z M28,23c-2.8,0-5,2.2-5,5s2.2,5,5,5s5-2.2,5-5S30.8,23,28,23z"></path></symbol></use></svg>
						<h3><?php echo language_en_de_pl_fr_ru_zhcn('Activity feed'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('See your friends’ cross-platform achievements, game time milestones and recently played games.'); ?></p>
					</div>
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-leaderboards"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-leaderboards"><path d="M16,18H6c-0.6,0-1,0.4-1,1v28c0,0.6,0.4,1,1,1h10c0.6,0,1-0.4,1-1V19C17,18.4,16.6,18,16,18z M15,46H7V20h8V46z M50,28H40 c-0.6,0-1,0.4-1,1v18c0,0.6,0.4,1,1,1h10c0.6,0,1-0.4,1-1V29C51,28.4,50.6,28,50,28z M49,46h-8V30h8V46z M33,8H23c-0.6,0-1,0.4-1,1 v38c0,0.6,0.4,1,1,1h10c0.6,0,1-0.4,1-1V9C34,8.4,33.6,8,33,8z M32,46h-8V10h8V46z"></path></symbol></use></svg>
						<h3><?php echo language_en_de_pl_fr_ru_zhcn('Leaderboards'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('Compete with friends and see who is the master collector, completionist or spends the most time playing.'); ?></p>
					</div>
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-chat"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-chat"><path d="M50.9,36.5l-3.1-7.9c1-1.9,2-3.9,2-6c0.1-8.1-6.4-14.7-14.4-14.8c-0.1,0-0.3,0-0.4,0c-6.6,0-11.2,3.5-13.4,9.4 c-8.1,0.5-15.3,7.4-15.3,15.2c0,2.2,1.2,4.2,2.1,6l-3.2,7.9c-0.1,0.5,0,1,0.3,1.5c0.2,0.2,0.5,0.4,0.8,0.4c0.2,0,0.3,0,0.4-0.1 l7-2.1c2.6,1.7,5.7,2.3,8.9,2.3c6.8,0,12.6-5.1,14.7-10.9c2.8-0.1,2.7,0.3,5.1-1.2l7,2.1c0.1,0.1,0.3,0.2,0.4,0.1 c0.3,0,0.6-0.2,0.8-0.4C51,37.6,51.1,37,50.9,36.5z M22.6,45.5c-3,0-5.8-0.5-8.2-2.3c-0.2-0.1-0.3-0.2-0.5-0.1c-0.1,0-0.3,0-0.4,0.1 l-5,1.2l2.4-5.6c0.1-0.3,0.1-0.7,0-1.1c-1-1.6-1.5-3.5-1.6-5.4c0-6.7,6.1-12.5,13.5-12.5s12.2,5.8,12.2,12.5 C34.8,39.1,30,45.5,22.6,45.5z M42.7,33.3c-0.4-0.2-0.8-0.1-1.1,0.1c-1.9,1.3-1.3,1.1-3.6,1.3c0.1-0.8-0.5-1.5-0.5-2.3 c0-7.8-5.5-14.6-13.5-15.2c2.2-4.4,5.5-6.6,10.9-6.6c7.5,0,12.2,5.4,12.2,12.1c0,1.9-0.9,3.6-1.9,5.4c-0.1,0.4-0.3,0.8,0,1.1 l2.7,5.6L42.7,33.3z"></path></symbol></use></svg>
						<h3><?php echo language_en_de_pl_fr_ru_zhcn('Cross-platform chat'); ?> <span><?php echo language_en_de_pl_fr_ru_zhcn('soon'); ?></span></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('No matter on which platform your friends are, you can chat with them.'); ?></p>
					</div>
				</div>
			</div>
		</section>
		<!-- End With glx-section- -your-friends -->
		<!-- Strat With glx-section- -your-privacy -->
		<section class="glx-section--your-privacy">
			<div class="glx-section__video-container">
				<video class="glx-section__video is-active" autoplay muted="muted" loop="loop" playsinline="playsinline">
					<source src="https://gogalaxy.gog-statics.com/videos/privacy_002.mp4" type="video/mp4">
						second Video
				</video>
			</div>
			<div class="glx-section__inner">
				<div class="glx-header">
					<svg class="glx-icon"><use xlink:href="#icon-your-privacy"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 80 80" id="icon-your-privacy"><path fill-rule="evenodd" d="M40,0A40,40,0,1,0,80,40,40,40,0,0,0,40,0ZM57.42,49.4C51.23,61.52,41.25,62,40.19,62.08h-.07C39.06,62,28,60.3,22.89,49.4c0,0-2.79-7.67-4-26.45l21.28-3.81L61.4,23C60.21,41.73,57.42,49.4,57.42,49.4ZM21.51,25.24a93.94,93.94,0,0,0,2.42,18.58C26.05,56.24,38.29,59.33,40,59.71h.22c1.74-.38,13-1.81,16.09-15.89a93.46,93.46,0,0,0,2.43-18.58L40.14,22.06Zm29.1,7.46-10.25,17-9.44-8.66,1.89-1.84,6.74,6.23,8.91-14.94Z"></path></symbol></use></svg>
					<h2><?php echo language_en_de_pl_fr_ru_zhcn('Your Privacy'); ?></h2>
					<p><?php echo language_en_de_pl_fr_ru_zhcn('Designed to protect your privacy.'); ?></p>
				</div>
				<div class="glx-features-list">
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-no-spying"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-no-spying"><path d="M47.7,47.7c-0.4,0.4-1,0.4-1.4,0l-5.8-5.8c-7.3,7.3-19,7.2-26.3,0s-7.2-19,0-26.3l-6-5.9c-0.4-0.4-0.4-1,0-1.4 c0.4-0.4,1-0.4,1.4,0l6,6c7.9-6.6,19.6-5.5,26.2,2.4c5.8,6.9,5.8,16.9,0,23.8l5.8,5.9C48.1,46.7,48.1,47.3,47.7,47.7z M15.7,17.1 C9.3,23.6,9.5,34.1,16,40.5c6.4,6.2,16.7,6.2,23.1,0l-6.9-6.9c-1.4,0.3-2.8,0.5-4.2,0.5c-6,0-10.8-2.7-10.8-6c0-2,1.8-3.8,4.6-4.9 L15.7,17.1z M32.8,28.1c0-2.7-2.2-4.8-4.9-4.8c-2.7,0-4.8,2.2-4.8,4.9c0,2.7,2.2,4.8,4.9,4.8C30.7,33,32.8,30.8,32.8,28.1 C32.8,28.1,32.8,28.1,32.8,28.1z M44.2,28.6c0-9.2-7.4-16.6-16.6-16.6c-3.8,0-7.5,1.3-10.5,3.7l6.9,6.9c1.3-0.3,2.7-0.4,4-0.4 c6,0,10.8,2.7,10.8,6c0,2-1.8,3.8-4.5,4.8l6.1,6.1C42.9,36.1,44.2,32.4,44.2,28.6z M28.8,27.6c0.3,0.9,1.1,1.5,2,1.5 c-0.6,1.5-2.3,2.3-3.9,1.7s-2.3-2.3-1.7-3.9c0.4-1.2,1.6-1.9,2.8-1.9c0.3,0,0.7,0.1,1,0.2C28.4,25.9,28.4,26.8,28.8,27.6L28.8,27.6z"></path></symbol></use></svg>
						<h3><?php echo language_en_de_pl_fr_ru_zhcn('No spying'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('We’re not spying on data from your computer.'); ?></p>
					</div>
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-no-sharing"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-no-sharing"><path d="M37.8,14.1c-0.4,0-0.8,0.1-1.1,0.2V13c0-2.1-1.7-3.8-3.8-3.8c-0.6,0-1.1,0.1-1.6,0.3c-0.6-1.2-1.9-2-3.3-2 c-2,0-3.6,1.5-3.8,3.4c-0.4-0.1-0.7-0.2-1.1-0.2c-2.1,0-3.8,1.7-3.8,3.8v10.2l-0.9-1.2c-1.4-2.1-4.1-2.8-6.1-1.5 c-0.9,0.6-1.6,1.5-1.8,2.6c-0.3,1.2,0,2.4,0.6,3.4c0.3,0.6,2.3,4.8,5.1,9c4.3,6.2,8.5,9.4,12.4,9.4c10.6,0,12.9-9.2,12.9-12.8V17.9 C41.6,15.8,39.9,14.1,37.8,14.1z M38.9,33.8c0,0.1-0.1,10.1-10.3,10.1c-6.1,0-13-12.2-15.1-16.9c0-0.1-0.1-0.1-0.1-0.2 c-0.3-0.5-0.4-1-0.3-1.5c0.1-0.3,0.2-0.7,0.6-1c0.8-0.5,1.9-0.2,2.5,0.7c0,0,0,0,0,0.1l3.3,4.5c0.3,0.5,0.9,0.7,1.5,0.5 s0.9-0.7,0.9-1.3V14.6c0-0.6,0.5-1.1,1.1-1.1s1.1,0.5,1.1,1.1v10.2c0,0.7,0.6,1.3,1.3,1.3c0.7,0,1.3-0.6,1.3-1.3V14.6v-3.3 c0-0.6,0.5-1.1,1.1-1.1s1.1,0.5,1.1,1.1V13v11.8c0,0.7,0.6,1.3,1.3,1.3c0.7,0,1.3-0.6,1.3-1.3V13c0-0.6,0.5-1.1,1.1-1.1 c0.6,0,1.1,0.5,1.1,1.1v4.9v8.6c0,0.7,0.6,1.3,1.3,1.3s1.3-0.6,1.3-1.3v-8.6c0-0.6,0.9-1.3,1.5-1.3s1.3,0.7,1.3,1.3L38.9,33.8 L38.9,33.8z"></path></symbol></use></svg>
						<h3><?php echo language_en_de_pl_fr_ru_zhcn('No data sharing'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('We’ll never share your personal data with third parties.'); ?></p>
					</div>
					<div class="glx-features-list__element">
						<svg class="glx-icon"><use xlink:href="#icon-your-data"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-your-data"><path fill-rule="evenodd" clip-rule="evenodd" d="M40.9,48.7h-25c-1.7,0-3-1.3-3-3v-18c0-1.7,1.3-3,3-3h2v-7.1h0c0-6,4.7-10.9,10.5-10.9s10.5,4.9,10.5,10.9h0 v7.1h2c1.7,0,3,1.3,3,3v18C43.9,47.4,42.6,48.7,40.9,48.7z M36.9,17.6L36.9,17.6c0-4.6-4.1-8.6-8.5-8.6S20,13,20,17.6h0v7.1h16.9 V17.6z M41.9,29.7c0-1.7-1.3-3-3-3h-21c-1.7,0-3,1.3-3,3v14c0,1.7,1.3,3,3,3h21c1.7,0,3-1.3,3-3V29.7z M29.8,36.3 c0.1,0.1,0.1,0.3,0.1,0.5v2.9c0,0.6-0.5,1-1,1H28c-0.6,0-1-0.5-1-1v-2.9c0-0.2,0-0.3,0.1-0.5c-0.7-0.4-1.1-1.2-1.1-2.1 c0-1.4,1.1-2.5,2.5-2.5c1.4,0,2.5,1.1,2.5,2.5C30.9,35.1,30.5,35.9,29.8,36.3z"></path></symbol></use></svg>
						<h3><?php echo language_en_de_pl_fr_ru_zhcn('Your data belongs to you'); ?></h3>
						<p><?php echo language_en_de_pl_fr_ru_zhcn('With a single click, you can remove your imported data from our servers.'); ?></p>
					</div>
				</div>
			</div>
		</section>
		<!-- End With glx-section- -your-privacy -->
		<!-- Strat With bg-more-your-galaxy -->
		<section class="bg-more-your-galaxy">
			<div class="glx-section__video-container">
				<video class="glx-section__video is-active" autoplay muted="muted" loop="loop" playsinline="playsinline">
					<source src="https://gogalaxy.gog-statics.com/videos/your-client_002.mp4" type="video/mp4">
						second Video
				</video>
			</div>
			<div class="bg-more-your-galaxy__shadow">
				<section class="glx-section--more">
					<div class="glx-section__video-container--inner">
						<video class="glx-section__video is-active" autoplay muted="muted" loop="loop" playsinline="playsinline">
							<source src="https://gogalaxy.gog-statics.com/videos/more_002.mp4" type="video/mp4">
								second Video
						</video>
					</div>
					<div class="glx-section__inner">
						<div class="glx-header">
							<svg class="glx-icon"><use xlink:href="#icon-more"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 80 80" id="icon-more"><path fill-rule="evenodd" d="M40,0A40,40,0,1,0,80,40,40,40,0,0,0,40,0ZM24,44a5,5,0,1,1,5-5A5,5,0,0,1,24,44Zm16,0a5,5,0,1,1,5-5A5,5,0,0,1,40,44Zm16,0a5,5,0,1,1,5-5A5,5,0,0,1,56,44Z"></path></symbol></use></svg>
							<h2><?php echo language_en_de_pl_fr_ru_zhcn('More'); ?></h2>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('The all-in-one solution for the present-day gamer.'); ?></p>
						</div>
						<div class="glx-features-list">
							<div class="glx-features-list__element">
								<svg class="glx-icon"><use xlink:href="#icon-community"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-community"><path d="M49.7,39.4c-0.4-1.2-1-2.3-1.9-3.1c-1.4-1.4-3.3-2.2-5.3-2.2c-1,0-2,0.2-3,0.6l-7.4-7.4l9.8-9.7l2.3-0.1 c0.3,0,0.5-0.2,0.7-0.4l3.3-5.6c0.2-0.3,0.1-0.7-0.1-1l-2.9-2.9c-0.3-0.3-0.7-0.3-1-0.1l-5.6,3.3c-0.2,0.1-0.4,0.4-0.4,0.7 l-0.1,2.3l-9.8,9.7l-6.7-6.7c0.7-4.1-2-8-6.1-8.7c-1.9-0.3-3.8,0.1-5.4,1.1c-0.4,0.3-0.5,0.8-0.2,1.1c0.1,0.1,0.2,0.2,0.3,0.3 l3.7,2.1c0.8,0.5,1,1.9,0.3,3c-0.7,1.2-1.9,1.8-2.8,1.3l-3.4-1.9c-0.4-0.2-0.9-0.1-1.1,0.3C7,15.8,6.9,16,6.9,16.1 c0.3,4.1,3.8,7.3,7.9,7c0.9-0.1,1.7-0.3,2.5-0.6l6.1,6.1l-2.6,2.6l-0.6-0.6c-0.7-0.6-1.7-0.6-2.4,0L17,31.5 c-0.6,0.6-0.7,1.6-0.1,2.3l-9.7,9.7c-0.7,0.6-0.7,1.7-0.1,2.3c0,0,0,0,0.1,0.1l2.8,2.8c0.6,0.7,1.7,0.7,2.3,0.1c0,0,0,0,0.1-0.1 l9.7-9.7c0.7,0.6,1.6,0.5,2.3-0.1l0.8-0.8c0.7-0.6,0.7-1.7,0.1-2.3c0,0,0,0-0.1-0.1L24.6,35l2.6-2.7l7.9,7.9 c-0.7,4.1,2.1,7.9,6.1,8.6c2.4,0.4,4.9-0.4,6.6-2.1c0.3-0.3,0.3-0.9-0.1-1.2c-0.1-0.1-0.2-0.1-0.3-0.2l-4.6-1.2 c-0.5-0.1-0.8-0.5-1-0.9c-0.2-0.6-0.3-1.3-0.1-1.9c0.3-1.3,1.4-2.2,2.4-2l4.6,1.2c0.1,0,0.1,0,0.2,0c0.5,0,0.8-0.4,0.8-0.8 C49.8,39.7,49.8,39.5,49.7,39.4z M39.6,14.8c0.1-0.1,0.2-0.3,0.2-0.6l0.1-2.2l4.6-2.8l2,2l-2.7,4.6L41.6,16 c-0.2,0-0.4,0.1-0.6,0.2l-10,10l-1.4-1.4L39.6,14.8z M11.2,47.4l-2.8-2.8l9.7-9.7l1.4,1.4l1.3,1.4L11.2,47.4z M23.2,37.6l-1.1-1.1 l-0.4-0.4l-3.4-3.5l0.8-0.8l4.9,5L23.2,37.6z M23.4,33.9L22,32.5l2.6-2.6l1.4,1.4L23.4,33.9z M44.6,37.8c-0.2-0.1-0.5-0.1-0.7-0.1 c-1.8,0.1-3.3,1.5-3.6,3.2c-0.3,1-0.2,2,0.2,3c0.4,0.9,1.1,1.6,2.1,1.9l3,0.8c-2.8,1.7-6.4,0.7-8-2c-0.8-1.3-1-2.9-0.7-4.3 c0.1-0.3,0-0.6-0.2-0.8L18.1,21c-0.3-0.2-0.7-0.3-1-0.1c-0.8,0.4-1.8,0.7-2.7,0.7c-2.5,0-4.7-1.5-5.5-3.9l1.9,1 c0.4,0.2,0.9,0.4,1.4,0.4c1.5-0.1,2.9-1,3.6-2.3c1.1-2,0.7-4.4-1-5.3l-2.4-1.4c3-1.1,6.4,0.5,7.5,3.5c0.4,1.1,0.4,2.2,0.2,3.3 c-0.1,0.3,0,0.6,0.2,0.8l18.5,18.5c0.3,0.3,0.6,0.3,1,0.1c0.8-0.4,1.8-0.7,2.7-0.7c2.1,0,4,1.1,5,2.9L44.6,37.8z"></path></symbol></use></svg>
								<h3><?php echo language_en_de_pl_fr_ru_zhcn('Community platform integrations'); ?></h3>
								<p><?php echo language_en_de_pl_fr_ru_zhcn('Connect more platforms and add new features with open-source integrations.'); ?></p>
							</div>
							<div class="glx-features-list__element">
								<svg class="glx-icon"><use xlink:href="#icon-sync"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-sync"><path d="M23.4,13c3.5-0.1,6.8,1.8,8.5,4.9l1.2,2.5l2-1.9c1-0.9,2.3-1.4,3.6-1.5c2.5,0,4.7,1.8,5.1,4.3l0.1,0.9l0.8,0.5 c3.3,2,5.3,5.5,5.3,9.3c-0.1,6.2-5.1,11.1-11.3,11H17.3C11.1,43.1,6.1,38.2,6,32c0-4.5,2.8-8.5,7-10.2l1.1-0.4l0.1-1.2 C14.7,16.1,18.6,13,23.4,13 M23.4,11c-5.8,0-10.6,3.9-11.2,9C7.3,21.9,4,26.7,4,32c0.1,7.3,6,13.1,13.3,13c0,0,0,0,0,0h21.4 C46,45.1,51.9,39.3,52,32c0,0,0,0,0,0c0-4.5-2.4-8.7-6.2-11c-0.5-3.5-3.5-6-7-6c-1.9,0-3.7,0.7-5,2C31.7,13.2,27.7,10.9,23.4,11z"></path></symbol></use></svg>
								<h3><?php echo language_en_de_pl_fr_ru_zhcn('Sync between devices'); ?></h3>
								<p><?php echo language_en_de_pl_fr_ru_zhcn('All customizations and changes to your library are saved in the cloud and synced between all your devices.'); ?></p>
							</div>
							<div class="glx-features-list__element">
								<svg class="glx-icon"><use xlink:href="#icon-bookmarks"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-bookmarks"><path d="M41.6,46.4c-0.7,0-1.4-0.2-1.9-0.6c-0.1,0-0.2-0.1-0.3-0.2l-11.2-7.3l-11.5,7.3c-0.1,0.1-0.2,0.1-0.3,0.2 c-1.4,1-3.1,0.8-4.1-0.5c-0.4-0.5-0.6-1.1-0.6-1.8V11.8c0-1.3,1.1-2.4,2.6-2.4h27.8c1.5,0,2.6,1,2.6,2.4v31.7 C44.7,45.2,43.3,46.4,41.6,46.4L41.6,46.4z M28.2,36.2c0.7,0,1.4,0.3,1.9,0.7c0,0,7,4.6,10.6,6.8c1.2,0.7,0.9,0.5,0.9,0.5 s1.1,0,1.1-0.8c0-6,0-32,0-32l-29,0c0,0,0,26.1,0,32.1c0,0.3,0.4,0.8,0.4,0.8s0.4,0.1,0.7-0.1c3-1.9,11.6-7.3,11.6-7.3 C26.8,36.4,27.5,36.2,28.2,36.2z"></path></symbol></use></svg>
								<h3><?php echo language_en_de_pl_fr_ru_zhcn('Save custom views'); ?></h3>
								<p><?php echo language_en_de_pl_fr_ru_zhcn('Save any view like a customized library or favorite games and friends to access them instantly.'); ?></p>
							</div>
						</div>
					</div>
				</section>
				<div class="glx-section--your-client">
					<div class="glx-section__inner">
						<div class="glx-header">
							<svg class="glx-icon"><use xlink:href="#icon-your-client"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 80 80" id="icon-your-client"><path fill-rule="evenodd" d="M31.85,27.57H26.13a1.72,1.72,0,0,0-1.74,1.69v5.57a1.71,1.71,0,0,0,1.74,1.69H30V34.34H27.3a.66.66,0,0,1-.67-.65V30.4a.67.67,0,0,1,.67-.65h3.38a.67.67,0,0,1,.67.65v7.22a.66.66,0,0,1-.67.65H24.39v2.18h7.46a1.71,1.71,0,0,0,1.75-1.69v-9.5A1.72,1.72,0,0,0,31.85,27.57Zm-7.46,16.7v5.49a1.69,1.69,0,0,0,1.72,1.66h5.81V49.27H27.26a.65.65,0,0,1-.65-.64h0V45.4h0a.65.65,0,0,1,.65-.65h4.66V42.6H26.11A1.7,1.7,0,0,0,24.39,44.27Zm29.48-16.7H48.14a1.72,1.72,0,0,0-1.74,1.69v5.57a1.71,1.71,0,0,0,1.74,1.69H52V34.34h-2.7a.66.66,0,0,1-.66-.65V30.4a.66.66,0,0,1,.66-.65H52.7a.66.66,0,0,1,.66.65v7.22a.65.65,0,0,1-.66.65H46.4v2.18h7.47a1.71,1.71,0,0,0,1.74-1.69v-9.5A1.72,1.72,0,0,0,53.87,27.57Zm-9.33,16.7v7.16h2.21v-6a.65.65,0,0,1,.66-.65H49v6.67h2.22v-6a.65.65,0,0,1,.65-.65h1.56v6.67H55.6V42.6H46.25A1.69,1.69,0,0,0,44.54,44.27ZM40,0A40,40,0,1,0,80,40,40,40,0,0,0,40,0ZM60,55.17a2.77,2.77,0,0,1-.86,2,2.93,2.93,0,0,1-2,.83H22.91a3,3,0,0,1-2.06-.83,2.8,2.8,0,0,1-.85-2V23.82a2.8,2.8,0,0,1,.85-2A2.93,2.93,0,0,1,22.91,21H57.09a2.89,2.89,0,0,1,2,.83,2.77,2.77,0,0,1,.86,2ZM44.6,29.26a1.72,1.72,0,0,0-1.74-1.69H37.13a1.72,1.72,0,0,0-1.74,1.69v5.57a1.71,1.71,0,0,0,1.74,1.69h5.73a1.71,1.71,0,0,0,1.74-1.69Zm-2.25,4.43a.65.65,0,0,1-.66.65H38.31a.66.66,0,0,1-.67-.65V30.4a.67.67,0,0,1,.67-.65h3.38a.66.66,0,0,1,.66.65Zm-1.3,8.91H35.41a1.7,1.7,0,0,0-1.72,1.67v5.49a1.69,1.69,0,0,0,1.72,1.66h5.64a1.69,1.69,0,0,0,1.71-1.66V44.27A1.69,1.69,0,0,0,41.05,42.6Zm-.5,6a.65.65,0,0,1-.66.64H36.56a.66.66,0,0,1-.66-.64V45.4a.66.66,0,0,1,.66-.65h3.33a.65.65,0,0,1,.66.65Z"></path></symbol></use></svg>
							<h2><?php echo language_en_de_pl_fr_ru_zhcn('Your GOG client'); ?></h2>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('The best way to run and update your GOG games.'); ?></p>
						</div>
						<div class="glx-features-list">
							<div class="glx-features-list__element">
								<svg class="glx-icon"><use xlink:href="#icon-experience"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-experience"><g><path d="M23.8,32.3h-3.5c-0.3,0-0.5,0-0.8,0.1c-0.3,0-0.6,0.1-0.9,0.2l3.1-3.2c0.4-0.4,0.7-0.8,1.1-1.1c0.3-0.4,0.6-0.7,0.9-1.1 c0.2-0.4,0.4-0.8,0.6-1.2c0.1-0.4,0.2-0.9,0.2-1.4c0-0.6-0.1-1.1-0.3-1.6s-0.5-0.9-0.9-1.2c-0.4-0.3-0.8-0.6-1.3-0.8 c-0.5-0.2-1.1-0.3-1.7-0.3c-0.6,0-1.2,0.1-1.7,0.3c-0.5,0.2-1,0.4-1.4,0.8c-0.4,0.3-0.7,0.7-1,1.2c-0.3,0.5-0.5,1.1-0.6,1.7 l1.2,0.2c0.3,0.1,0.6,0,0.7-0.1c0.2-0.1,0.3-0.3,0.4-0.6c0.1-0.2,0.2-0.4,0.3-0.6c0.1-0.2,0.3-0.4,0.5-0.5 c0.2-0.1,0.4-0.3,0.6-0.3s0.5-0.1,0.8-0.1c0.3,0,0.6,0,0.8,0.1c0.2,0.1,0.5,0.2,0.6,0.4c0.2,0.2,0.3,0.4,0.4,0.6 c0.1,0.3,0.1,0.5,0.1,0.9c0,0.4,0,0.7-0.1,1c-0.1,0.3-0.2,0.6-0.4,1c-0.2,0.3-0.4,0.6-0.7,1c-0.3,0.3-0.6,0.7-0.9,1l-4.2,4.2 c-0.1,0.1-0.3,0.3-0.3,0.5c-0.1,0.2-0.1,0.3-0.1,0.5v0.8h9.4v-1.4c0-0.2-0.1-0.4-0.2-0.6C24.2,32.4,24,32.3,23.8,32.3z M28.8,32.2 c-0.1-0.1-0.3-0.2-0.5-0.3c-0.2-0.1-0.4-0.1-0.6-0.1c-0.2,0-0.4,0-0.6,0.1c-0.2,0.1-0.3,0.2-0.5,0.3c-0.1,0.1-0.2,0.3-0.3,0.5 c-0.1,0.2-0.1,0.4-0.1,0.6c0,0.2,0,0.4,0.1,0.6c0.1,0.2,0.2,0.3,0.3,0.5c0.1,0.1,0.3,0.2,0.5,0.3c0.2,0.1,0.4,0.1,0.6,0.1 c0.2,0,0.4,0,0.6-0.1c0.2-0.1,0.3-0.2,0.5-0.3c0.1-0.1,0.2-0.3,0.3-0.5c0.1-0.2,0.1-0.4,0.1-0.6c0-0.2,0-0.4-0.1-0.6 C29,32.5,28.9,32.3,28.8,32.2z M45.5,6.5h-35c-2.2,0-4,1.8-4,4v35c0,2.2,1.8,4,4,4h35c2.2,0,4-1.8,4-4v-35 C49.5,8.3,47.7,6.5,45.5,6.5z M47.5,45.5c0,1.1-0.9,2-2,2h-35c-1.1,0-2-0.9-2-2v-35c0-1.1,0.9-2,2-2h35c1.1,0,2,0.9,2,2V45.5z M39.1,22.2c-0.5-0.6-1-1-1.6-1.3c-0.6-0.3-1.3-0.4-2-0.4c-0.7,0-1.4,0.1-2,0.4c-0.6,0.3-1.1,0.7-1.6,1.3 c-0.4,0.6-0.8,1.3-1.1,2.2c-0.3,0.9-0.4,1.9-0.4,3.1c0,1.2,0.1,2.2,0.4,3.1c0.3,0.9,0.6,1.6,1.1,2.2c0.4,0.6,1,1,1.6,1.3 c0.6,0.3,1.3,0.4,2,0.4c0.7,0,1.4-0.1,2-0.4c0.6-0.3,1.2-0.7,1.6-1.3c0.5-0.6,0.8-1.3,1.1-2.2c0.3-0.9,0.4-1.9,0.4-3.1 c0-1.2-0.1-2.2-0.4-3.1C39.9,23.5,39.5,22.8,39.1,22.2z M37.9,30c-0.1,0.7-0.3,1.2-0.6,1.6c-0.2,0.4-0.5,0.7-0.8,0.8 c-0.3,0.2-0.6,0.2-1,0.2c-0.3,0-0.7-0.1-1-0.2c-0.3-0.2-0.6-0.4-0.8-0.8c-0.2-0.4-0.4-0.9-0.6-1.6c-0.1-0.7-0.2-1.5-0.2-2.5 c0-1,0.1-1.8,0.2-2.5c0.1-0.7,0.3-1.2,0.6-1.6c0.2-0.4,0.5-0.7,0.8-0.8c0.3-0.2,0.6-0.2,1-0.2c0.3,0,0.7,0.1,1,0.2 c0.3,0.2,0.6,0.4,0.8,0.8c0.2,0.4,0.4,0.9,0.6,1.6c0.1,0.7,0.2,1.5,0.2,2.5C38.1,28.5,38,29.3,37.9,30z"></path></g></symbol></use></svg>
								<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('Enhanced experience'); ?></h3>
								<p><?php echo language_en_de_pl_fr_ru_zhcn('All new library management and friends features take your experience to the next level.'); ?></p>
							</div>
							<div class="glx-features-list__element">
								<svg class="glx-icon"><use xlink:href="#icon-updates"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-updates"><path d="M23.6,19.4h3.9V7.8H30v11.6h3.9l-5.1,7.7L23.6,19.4z M46.7,18.1v19.3c0,2.8-2.4,5.1-5.1,5.1h-9.6l6.3,3.9h-19l6.3-3.9h-9.6 c-2.7,0-5.1-2.3-5.1-5.1V18.1c0-2.8,2.4-5.1,5.1-5.1h7.7v2.6h-6.4c-2.1,0-3.9,1.3-3.9,3v15.9c0,1.8,1.8,3,3.9,3h23 c2.1,0,3.9-1.3,3.9-3V18.5c0-1.8-1.8-3-3.9-3h-6.4V13h7.7C44.3,13,46.7,15.3,46.7,18.1z M41.6,40c0-0.8-0.5-1.3-1.3-1.3 c-0.8,0-1.3,0.5-1.3,1.3c0,0.8,0.5,1.3,1.3,1.3C41.1,41.2,41.6,40.7,41.6,40z"></path></symbol></use></svg>
								<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('Auto-Updates'); ?></h3>
								<p><?php echo language_en_de_pl_fr_ru_zhcn('Keep your GOG.COM games always up to date.'); ?></p>
							</div>
							<div class="glx-features-list__element">
								<svg class="glx-icon"><use xlink:href="#icon-saves"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-saves"><path d="M50,28v2.6c0,6.4-5.2,11.6-11.5,11.6c0,0-0.1,0-0.1,0h-5.2v-2.6h5.2c5,0,9-3.9,9.1-8.9c0,0,0-0.1,0-0.1V28 c0-1.8-0.5-3.6-1.6-5c-0.6-0.9-1.4-1.7-2.3-2.3c0-1.4-0.6-2.7-1.6-3.6c-1.1-1.2-2.6-1.9-4.3-1.9c-1,0-2.1,0.3-3,0.8 c-0.2,0.1-0.5,0.3-0.6,0.5c-0.6,0.4-1,0.9-1.3,1.5L32,16.4c-0.2-0.4-0.4-0.7-0.6-1c-1.8-2.6-4.8-4.1-7.9-4.1c-3.8,0-7.2,2.2-8.8,5.5 c-0.5,1-0.8,2-0.9,3.1c-1,0.4-1.9,1-2.6,1.8c-1.7,1.7-2.6,4-2.6,6.3v2.6c0,5,4,9,8.9,9c0,0,0.1,0,0.1,0h5.2v2.6h-5.2 C11.3,42.2,6,37.1,6,30.7c0,0,0-0.1,0-0.1V28c0-4,2.1-7.7,5.4-9.8c1.3-5.6,6.3-9.5,12-9.5c3.9,0,7.7,1.8,10,5 c1.3-0.8,2.8-1.2,4.3-1.2c4,0,7.5,2.8,8.3,6.7C48.5,21.4,50,24.6,50,28z M28,22.8l-5.2,7.7h3.9v16.7h2.6V30.6h3.9L28,22.8z"></path></symbol></use></svg>
								<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('Cloud Saves'); ?></h3>
								<p><?php echo language_en_de_pl_fr_ru_zhcn('Your saves are automatically backed up to the Cloud and are synced between your computers.'); ?></p>
							</div>
							<div class="glx-features-list__element">
								<svg class="glx-icon"><use xlink:href="#icon-mnm"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-mnm"><path d="M50.3,28.1c0,1.6-1.3,3-3,3c-1.3,0-2.5-0.9-2.8-2.2h-12c-0.1,0.6-0.4,1.3-0.7,1.8l8.3,8.3c1.1-0.6,2.5-0.4,3.4,0.4 c1.1,1.2,1.1,3,0,4.1c-1.1,1.1-3,1.1-4.1,0c-0.9-0.9-1.1-2.4-0.5-3.6l-8.3-8.3c-0.5,0.5-1.2,0.7-1.9,0.7v12c1.3,0.3,2.2,1.5,2.2,2.8 c0.1,1.6-1.2,3-2.8,3.1c-1.6,0.1-3-1.2-3.1-2.8c0-0.1,0-0.2,0-0.3c0-1.3,0.9-2.5,2.2-2.8v-12c-0.7-0.2-1.3-0.4-1.9-0.7L17,40.1 c0.8,1.2,0.6,2.7-0.4,3.7c-1.1,1.1-3,1.1-4.2,0s-1.1-3,0-4.2c1-0.9,2.4-1.1,3.6-0.4l8.6-8.6c-0.3-0.6-0.6-1.2-0.7-1.8H11.7 c-0.3,1.3-1.5,2.2-2.8,2.2c-1.6-0.2-2.8-1.8-2.5-3.4c0.2-1.3,1.2-2.4,2.5-2.5c1.3,0,2.5,0.9,2.8,2.2h12c0.2-0.7,0.4-1.3,0.7-1.9 l-8.3-8.3c-1.1,0.8-2.6,0.6-3.6-0.4c-1.1-1.1-1.2-2.9-0.1-4.1c0,0,0.1-0.1,0.1-0.1c1.1-1.1,2.9-1.2,4-0.1c0,0,0.1,0.1,0.1,0.1 c0.9,0.9,1,2.3,0.4,3.4l8.3,8.3c0.6-0.3,1.2-0.6,1.8-0.7V11.6C26,11.3,25,10.1,25,8.8c-0.1-1.6,1.2-3,2.8-3.1c1.6-0.1,3,1.2,3.1,2.8 c0,0.1,0,0.2,0,0.3c0,1.3-0.9,2.5-2.2,2.8v12c0.6,0.1,1.3,0.4,1.8,0.7l8.7-8.4c-0.6-1.2-0.4-2.6,0.4-3.6c1.1-1.1,2.9-1.2,4-0.1 c0,0,0.1,0.1,0.1,0.1c1.1,1.1,1.2,2.9,0.1,4.1c0,0-0.1,0.1-0.1,0.1c-1,1-2.5,1.2-3.7,0.4l-8.4,8.5c0.5,0.5,0.7,1.2,0.7,1.9h12 c0.3-1.3,1.5-2.2,2.8-2.2C48.9,25.1,50.3,26.3,50.3,28.1C50.3,28,50.3,28,50.3,28.1z"></path></symbol></use></svg>
								<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('Multiplayer &amp; Matchmaking'); ?></h3>
								<p><?php echo language_en_de_pl_fr_ru_zhcn('GOG GALAXY-powered multiplayer games offer matchmaking and online play.'); ?></p>
							</div>
							<div class="glx-features-list__element">
								<svg class="glx-icon"><use xlink:href="#icon-rollbacks"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-rollbacks"><path d="M50,27.9c0.1,11.3-8.9,20.5-20.2,20.6c-0.1,0-0.2,0-0.2,0c-6.1,0-11.9-2.6-15.9-7.2l2.3-1.5c6.5,7.4,17.7,8.1,25.1,1.6 c3.9-3.4,6-8.3,6-13.5C47,18.1,39,10.2,29.2,10.2c-8.2,0-15.3,5.7-17.1,13.7h3.6l-4.8,8.2L6,23.9h3.2c2.3-11.2,13.3-18.3,24.4-16 C43.1,9.9,49.9,18.2,50,27.9z M29.7,17.1h-0.4c-0.6,0-1.1,0.5-1.1,1.1c0,0,0,0,0,0v10.3c0,0.4,0.2,0.7,0.6,1l0.1,0.1l7.8,4 c0.6,0.3,1.4,0.1,1.8-0.5c0.3-0.6,0.1-1.4-0.5-1.8l-7.3-3.8V18C30.7,17.5,30.3,17.1,29.7,17.1C29.7,17.1,29.7,17.1,29.7,17.1z"></path></symbol></use></svg>
								<h3 class="glx-features-list__label"><?php echo language_en_de_pl_fr_ru_zhcn('Rollbacks'); ?></h3>
								<p><?php echo language_en_de_pl_fr_ru_zhcn('Restore your game to prior versions, if an update breaks it for you.'); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End With bg-more-your-galaxy -->
		<!-- Start With glx-section glx-section- -survey dont show exept china -->
		<?php if($fetchLanguage[$gog_lang_item] == "zh-cn"): ?>
		<section class="glx-section--survey">
			<div class="glx-section__inner">
				<h2>请协助我们改善您的网络体验，<br> 并在问卷中分享您的反馈。</h2>
				<div class="glx-section__bottom">
					<a href="">前往问卷调查</a>
				</div>
			</div>
		</section>
		<?php endif; ?>
		<!-- End With glx-section glx-section- -survey dont show exept china -->
		<!-- start With bg-download-faq -->
		<section class="bg-download-faq">
			<div class="glx-section--download">
				<div class="glx-section__inner">
					<img src="https://gogalaxy.gog-statics.com/build/images/galaxy-logo-fa7b4b2d.png"/>
					<h1><?php echo language_en_de_pl_fr_ru_zhcn('gog galaxy 2.0'); ?></h1>
					<p><?php echo language_en_de_pl_fr_ru_zhcn('All your games and friends in one place.'); ?></p>
				</div>
				<div class="glx-section__bottom">
					<div class="glx-section__inner">
						<a class="glx-button glx-button-download glx-section__button" href=""><?php echo language_en_de_pl_fr_ru_zhcn('DOWNLOAD GOG GALAXY 2.0'); ?></a>
						<p class="glx-section__disclaimer"><?php echo language_en_de_pl_fr_ru_zhcn('Join the Open Beta, enjoy the app and share your feedback with us! You\'ll need a GOG account to use GOG GALAXY 2.0.'); ?></p>
						<a class="glx-section__terms" href=""><?php echo language_en_de_pl_fr_ru_zhcn('Privacy Policy terms apply'); ?></a>
					</div>
				</div>
			</div>
			<div class="glx-section--faq">
				<div class="glx-header">
					<h2><?php echo language_en_de_pl_fr_ru_zhcn('faq'); ?></h2>
				</div>
				<div class="glx-faq-list">
					<div class="glx-list">
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('What is GOG GALAXY 2.0 and why should I use it?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('GOG GALAXY 2.0 is an application, thanks to which you’ll be able to combine multiple libraries into one and connect with your friends across all gaming platforms, consoles included. If your games and gaming buddies are scattered between different launchers and platforms, this is a solution for you! Keeping track of all achievements earned by you and your friends, hours played, and games owned across platforms has never been this easy. And the application is entirely free, all you need is a GOG account to use it.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('How can I add my games to GOG GALAXY 2.0?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('In GOG GALAXY 2.0 you’re adding games through official and community created integrations. By connecting platforms, the data about the games you own is automatically imported to the application. On top of that you are also able to manually add single games even if they are not connected to any platform.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('Will GOG GALAXY 2.0 show all my games, or only those I have installed on my PC?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('Yes, GOG GALAXY 2.0 will show all your games from connected PC and console platforms… even if they are not currently installed.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('Do I still need to have other gaming clients installed on my PC?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('Yes, if you want to get access to any features specific to that platform, e.g. installing or auto-updating games, cloud saves, etc.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('Will I be able to customize my games library?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('Yes, our goal is to provide you with the most options possible to customize your games library. In GOG GALAXY 2.0, you’ll be able to create your own views based on different filters available in the app, tags that you’ll create on your own, and search queries you’ll come up with. Mix and match all of those options to create countless library views. Once you do, save them for quick access and automatic synchronization. On top of that, you can also manually edit the metadata of every game in your master games collection.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('How can I add my friends to GOG GALAXY 2.0?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('Like with games, in GOG GALAXY 2.0 adding friends begins with connecting platforms. By doing so, you can find other GOG GALAXY users who are your friends on the platforms or social networks you have connected.	Additionally, you’ll be able to see non-GOG GALAXY users from friends lists of connected platforms – with an option to check their online status and chat with them cross-platform.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('What kind of stats and activities will GOG GALAXY 2.0 show me?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('You’ll see all your games from connected platforms together with your progress in each title – achievements you’ve earned and your game time. Also, for your GOG GALAXY friends, you’ll be able to see their online status and what games they are playing, with their achievements and time spent in each title.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('Will GOG GALAXY 2.0 spy on my computer?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('No. We’re not in the business of users’ data. GOG GALAXY 2.0 is only importing information from connected platforms – you always know what is imported through official integrations. Additionally we’ve made the community created integrations open-source, to ensure the transparency of imported data.'); ?></p>
						</div>
					</div>
					<div class="glx-list">
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('What data does GOG GALAXY 2.0 share with other platforms?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('We don’t share any data with third parties.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('How can I delete my data from GOG GALAXY 2.0?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('Once you have disconnected a platform from GOG GALAXY 2.0, we will remove all your imported data from our servers.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('What are the community created integrations and how I can create one?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('We want to offer integrations with all possible gaming platforms. This is a challenging and time-consuming process, not only because these are technically complex projects, but they also require negotiations and agreements with partners. We want all our official integrations to be supported by respective platform holders, so we make sure they’re in-line with partners’ policies and that they’re safe.');?> <br/> <?php echo language_en_de_pl_fr_ru_zhcn('While we’re hard at work on adding more official integrations, we’ve decided to give you – the community – an opportunity to work on your own open source platform integrations. The documentation about how to build your own GOG GALAXY 2.0 integrations for various gaming platforms can be found'); ?> <a href=""><?php echo language_en_de_pl_fr_ru_zhcn('here'); ?></a>
							<?php if($fetchLanguage[$gog_lang_item] == "ru"): echo " вы найдете необходимую документацию, которая поможет вам создать ваши собственные интеграции с платформами для GOG GALAXY 2.0"; elseif($fetchLanguage[$gog_lang_item] == "zh-cn"): echo "找到有关如何为各种游戏平台构建自己的GOG GALAXY 2.0集成的文档。"; endif; ?>.</p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('I’m a GOG.COM user, what’s new for me in GOG GALAXY 2.0?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('The whole client has been rebuilt from the ground up to be better and faster. All features for third party platforms work for GOG.COM. With the new games library, you’ll be able to filter, sort and add tags to customize your views and save them for easy access. Thanks to the new friends section, you’ll have a chance to track your friends progress in every GOG.COM game, as well as see what they are currently playing. On top of that, GOG GALAXY 2.0 will remain your optional client for GOG.COM games – features like auto-updates, cloud saves, cross-play, rollbacks and more stay the same as the GOG GALAXY you’re currently using. Once we include all features available in the current version of GOG GALAXY client to the 2.0 version, we will update everyone to the GOG GALAXY 2.0 application.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('How can I participate in the Open Beta?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('The Open Beta is already available and everybody is welcome to participate in it. To get access to GOG GALAXY 2.0 download the installer from www.gogalaxy.com. Once dowloaded, launch it and follow the instructions. GOG account and consent to GOG GALAXY 2.0 EULA are required to participate in the test. The GOG account is entirely free.'); ?></p>
						</div>
						<?php if($fetchLanguage[$gog_lang_item] == "zh-cn"): ?>
							<div class="glx-faq-list__item is-collapsed">
								<h3>我在GOG GALAXY 2.0中发现了一个问题，我应该在哪里报告它？</h3>
								<p>打开GOG Galaxy，点击左上角的齿轮图标，选择“回报问题”并填写表单以发送报告。<br> <br> 我们同时鼓励你用同样的表格告诉我们其他意见。</p>
							</div>
						<?php endif; ?>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('I found a bug in GOG GALAXY 2.0, how can I report it?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('There is an "Report an issue" option in the app under settings icon. We also encourage you to tell us what you think about GOG GALAXY 2.0 via the "Share feedback" option, in the same settings menu.'); ?></p>
						</div>
						<div class="glx-faq-list__item is-collapsed">
							<h3><?php echo language_en_de_pl_fr_ru_zhcn('I’m a journalist/content creator and would like to get in touch with you, how I can contact you?'); ?></h3>
							<p><?php echo language_en_de_pl_fr_ru_zhcn('Drop us an email at'); ?> <a href=""><?php echo language_en_de_pl_fr_ru_zhcn('pr@gog.com'); ?></a> <?php echo language_en_de_pl_fr_ru_zhcn('and we’ll get back to you!'); ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End With bg-download-faq -->
		<!-- Start With footer -->
		<footer class="glx-footer">
			<div class="glx-footer__inner">
				<img class="glx-footer__logo-gog" src="https://gogalaxy.gog-statics.com/build/images/logo-gog-com-vertical-af905625.svg"/>
				<h2><?php echo language_en_de_pl_fr_ru_zhcn('About GOG'); ?></h2>
				<p><?php echo language_en_de_pl_fr_ru_zhcn('GOG is best known by gamers for GOG.COM – the digital store with hand-picked selection of DRM-free games, and GOG GALAXY – a gaming app that brings all your games and friends in one place.'); ?> <br> <br> <?php echo language_en_de_pl_fr_ru_zhcn('As part of CD PROJEKT group, together with CD PROJEKT RED development studio, GOG is also bringing best possible online experience to PC and console gamers, in CD PROJEKT RED games.'); ?></p>
				<div class="glx-footer__socials">
					<a class="faceBook-gog icon-gog" href="" target="_blank"><svg class="glx-icon"><use xlink:href="#icon-facebook"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-facebook"><path d="M39.1,19.4h-7.6v-5c0-1.9,1.2-2.3,2.1-2.3H39V3.8l-7.4,0c-8.2,0-10.1,6.2-10.1,10.1v5.5h-4.8v8.5h4.8v24.1h10 c0,0,0-13.3,0-24.1h6.8L39.1,19.4z"></path></symbol></use></svg></a>
					<a class="twitter-gog icon-gog" href="" target="_blank"><svg class="glx-icon"><use xlink:href="#icon-twitter"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-twitter"><path d="M52.3,12.8c-1.8,0.8-3.7,1.3-5.6,1.5c2-1.2,3.6-3.1,4.3-5.4c-1.9,1.1-4,1.9-6.2,2.4c-1.8-1.9-4.3-3.1-7.2-3.1 c-5.4,0-9.8,4.4-9.8,9.8c0,0.8,0.1,1.5,0.3,2.2C19.8,19.8,12.5,15.9,7.7,10c-0.8,1.5-1.3,3.1-1.3,4.9c0,3.4,1.7,6.4,4.4,8.2 c-1.6-0.1-3.1-0.5-4.5-1.2c0,0,0,0.1,0,0.1c0,4.8,3.4,8.7,7.9,9.6c-0.8,0.2-1.7,0.3-2.6,0.3c-0.6,0-1.2-0.1-1.8-0.2 c1.3,3.9,4.9,6.7,9.2,6.8c-3.4,2.6-7.6,4.2-12.2,4.2c-0.8,0-1.6,0-2.3-0.1c4.4,2.8,9.5,4.4,15.1,4.4c18.1,0,28-15,28-28 c0-0.4,0-0.9,0-1.3C49.3,16.5,51,14.7,52.3,12.8z"></path></symbol></use></svg></a>
					<a class="twitch-gog icon-gog" href="" target="_blank"><svg class="glx-icon"><use xlink:href="#icon-twitch"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 56 56" id="icon-twitch"><g><path d="M36.5,43.5H28l-4.2,5.6h-5.6v-5.6H8.2V14.1l2.8-7.2h36.7v25.4L36.5,43.5z M43.5,30.8V11.1H13.9v26.8h8.5v5.6l5.6-5.6h8.5 L43.5,30.8z"></path><path d="M32.2,18.1h4.2v11.3h-4.2V18.1z"></path><path d="M23.8,18.1H28v11.3h-4.2V18.1z"></path></g></symbol></use></svg></a>
				</div>
				<div class="glx-langs">
					<span><?php
						if($resaultLang == "en"): echo "english";
						elseif($resaultLang == "de"): echo "Deutsch";
						elseif($resaultLang == "pl"): echo "Polski";
						elseif($resaultLang == "fr"): echo "Français";
						elseif($resaultLang == "ru"): echo "Русский";
						elseif($resaultLang == "zh-cn"): echo "简体中文";
						endif;
						?></span>
					<ul>
						<li><form method="POST" action="?lang=en"><input type="submit" value="English"/></form></li>
						<li><form method="POST" action="?lang=de"><input type="submit" value="Deutsch"/></form></li>
						<li><form method="POST" action="?lang=pl"><input type="submit" value="Polski"/></form></li>
						<li><form method="POST" action="?lang=fr"><input type="submit" value="Français"/></form></li>
						<li><form method="POST" action="?lang=ru"><input type="submit" value="Русский"/></form></li>
						<li><form method="POST" action="?lang=zh-cn"><input type="submit" value="简体中文"/></form></li>
					</ul>
				</div>
				<div class="glx-footer__nav">
					<a href="" target="_blank"><?php echo language_en_de_pl_fr_ru_zhcn('Privacy policy'); ?></a>
					<a href="" target="_blank"><?php echo language_en_de_pl_fr_ru_zhcn('Support'); ?></a>
					<a href="" target="_blank"><?php echo language_en_de_pl_fr_ru_zhcn('Press inquiries'); ?></a>
					<a href="" target="_blank"><?php echo language_en_de_pl_fr_ru_zhcn('About GOG'); ?></a>
				</div>
				<div class="glx-footer__disclaimer"><?php echo language_en_de_pl_fr_ru_zhcn('Website operated by GOG Sp. z o.o. All rights reserved. GOG.COM and GOG Galaxy are registered trademarks of GOG sp. z o.o. All other logos, trademarks or game artworks are property of their respective owners.'); ?></div>
				<div class="glx-footer__copyrights"><?php echo language_en_de_pl_fr_ru_zhcn('GOG Sp. z o.o. 2019. Part of'); ?> <a class="glx-footer__logo-cdp" href="" target="_blank">CD PROJEKT</a> <?php echo language_en_de_pl_fr_ru_zhcn('group.'); ?></div>
			</div>
		</footer>
		<!-- End With footer -->
	</div>

	<!-- Start With c-cookies hide -->
	<section class="c-cookies">
		<div class="c-cookies__frame">
			<p class="c-cookies__p">Not like it changes anything, but we are obligated to inform you that we are using cookies - well, we just did. <br> <br> <a target="_blank" href="<?php echo $gog_com . $gog_com_Cookie_Policy_for_GOGcom; ?>">More info on cookies</a> </p>
			<div class="c-cookies__close">
				<svg class="glx-icon"><use xlink:href="#icon-close"><svg preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-close"><path fill-rule="evenodd" clip-rule="evenodd" fill="#B20DCD" d="M16,15.3L15.3,16L8,8.7L0.7,16L0,15.3L7.3,8L0,0.7L0.7,0L8,7.3L15.3,0L16,0.7L8.7,8L16,15.3z"></path></svg></use></svg>
				I don’t want to see this banner again
			</div>
		</div>
	</section>

<?php require $includes_php_files_static_templates . $includes_php_files_static_templates_footer; ?>
<?php ob_end_flush(); ?>
