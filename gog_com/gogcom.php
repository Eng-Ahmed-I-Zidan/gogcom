<?php
	ob_start();
	$connectDB = "";
  $layout_html_css_mainFile = "gogCom/GOGcom.css";
	$layout_html_js_mainFile = "gogCom/gogcom.js";
	$pagetitle = "GOG.com";

	require 'includes-php-files/functions/title.php';
  require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_navbar;

  $select_gog_users_new_user = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE Realy_in_gog = ? LIMIT 1");
  $select_gog_users_new_user->execute(array("1"));
  $fetch_gog_users_new_user = $select_gog_users_new_user->fetch();
  $have_change_after_select_user = $select_gog_users_new_user->rowcount();

	// function select games from parent table
	function select_games_by_two_para($prepare_select_code, $execute_value){
		// select games
		$select_game_by_id = $GLOBALS['connect']->prepare($prepare_select_code);
		$select_game_by_id->execute(array($execute_value));
		$fetch_game_by_id = $select_game_by_id->fetch();
		// to any changes rowcount > 0
		$GLOBALS['have_change_after_fetch'] = $select_game_by_id->rowcount();

		if($GLOBALS['have_change_after_fetch'] > 0){
			$GLOBALS['gc_g_id'] = $fetch_game_by_id['gc_g_id'];

			// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
			$GLOBALS['gc_g_price_price'] = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
			$GLOBALS['gc_g_discount_presentage'] = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
			$GLOBALS['gc_g_format_price_discount'] = number_format($GLOBALS['gc_g_price_price'] - ($GLOBALS['gc_g_price_price'] * ($GLOBALS['gc_g_discount_presentage'] / 100)), 2, '.', '');

			$GLOBALS['gc_g_incart'] = $fetch_game_by_id['gc_g_incart'];
			$GLOBALS['gc_g_wishlisted'] = $fetch_game_by_id['gc_g_wishlisted'];

			// href of game
			$GLOBALS['gc_g_href'] = $fetch_game_by_id['gc_g_href'];

			$GLOBALS['gc_g_title'] = $fetch_game_by_id['gc_g_title'];

			// flags [ soon, indev ]
			$GLOBALS['gc_g_soon'] = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
			$GLOBALS['gc_g_indev'] = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

			// gc_g_type_parent
			$GLOBALS['gc_g_type'] = $fetch_game_by_id['gc_g_type'];
			$GLOBALS['gc_g_type_parent'] = $fetch_game_by_id['gc_g_type_parent'];

			// operating system [ windows - mac - linux ]
			$GLOBALS['gc_g_os_win'] = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
			$GLOBALS['gc_g_os_mac'] = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
			$GLOBALS['gc_g_os_linux'] = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

			$GLOBALS['gc_g_image_search_cart_modifyToStore'] = $fetch_game_by_id['gc_g_image_search_cart_modifyToStore'];
			$GLOBALS['gc_g_newReleases_and_upcoming_and_onsale'] = $fetch_game_by_id['gc_g_newReleases_and_upcoming_and_onsale'];

			$GLOBALS['gc_g_tba_free_owned__noPrice_inSearch'] = $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'];
			$GLOBALS['gc_g_user_rating'] = $fetch_game_by_id['gc_g_user_rating'];

			$GLOBALS['gc_g_picture_cover_glide__slides'] = $fetch_game_by_id['gc_g_picture_cover_glide__slides'];
			$GLOBALS['gc_g_picture_logo_glide__slides'] = $fetch_game_by_id['gc_g_picture_logo_glide__slides'];
	 	}
	}

?>

	<div class="content cf">
		<div class="nav-spacer menu-spacer ng-hide"></div>
		<!---->
		<!---->
		<div class="button-parent--class--to-find--labels big-spots-container big-spots-container---offer <?php if($have_change_after_select_user > 0){ echo 'user_realy_in_gog_enjoy'; } ?>">
			<?php
				select_games_by_two_para("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_title like ? LIMIT 1", "Horizon Zero Dawn™ Complete Edition");
				if($have_change_after_fetch > 0){
			?>
				<a ng-game-movies-id="<?php echo $gc_g_id; ?>"
					href="<?php echo $gc_g_href; ?>"
					gc_g_title="<?php echo $gc_g_title; ?>"
					gc_g_incart="<?php echo $gc_g_incart; ?>"
					gc_g_type="<?php echo $gc_g_type; ?>"
					gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
					class="big-spot glide__slide">
					<picture class="lazy">
						<source class="big-spot__background-source" media="(max-width:480px)" srcset="//images-2.gog-statics.com/3b48bfba9e9103302558f8730be6cc2b87dbaaaa55d194e6cebc4749a6d9a736_takeover_bg_480.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:481px) and (max-width: 735px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_767.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:481px) and (max-width: 735px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_767.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:736px) and (max-width: 1024px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_1024.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:736px) and (max-width: 1024px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_1024.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:1025px) and (max-width: 1366px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_1366.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:1025px) and (max-width: 1366px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_1366.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:1367px) and (max-width: 1680px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_1680.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:1367px) and (max-width: 1680px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_1680.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:1681px) and (max-width: 1920px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_1920.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:1681px) and (max-width: 1920px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825_takeover_bg_1920.jpg"><source class="big-spot__background-source" media="(min-width:1920px)" srcset="//images-2.gog-statics.com/b48edf543789fd2ef7e3f4b640cd8e4d4798967e8c43fbe13bf051d55ce1c825.jpg"><img class="big-spot__background js-background-placeholder" src="">
					</picture>
					<div class="big-spot__gradient big-spot__gradient-none"></div>
					<div class="big-spot__container">
						<div class="big-spot__body">
							<div class="big-spot__logo">
								<picture class="lazy">
									<source type="image/webp" media="(max-width: 1023px)" srcset="//images-1.gog-statics.com/884de671327b8fbcc5e4ea85151334619a61230f40137b3e09a571f285df47c2_takeover_big_logo.webp,
	                //images-1.gog-statics.com/884de671327b8fbcc5e4ea85151334619a61230f40137b3e09a571f285df47c2_takeover_big_logo_2x.webp 2x"><source type="image/webp" media="(min-width: 1024px)" srcset="//images-1.gog-statics.com/884de671327b8fbcc5e4ea85151334619a61230f40137b3e09a571f285df47c2_takeover_big_logo.webp,
	                //images-1.gog-statics.com/884de671327b8fbcc5e4ea85151334619a61230f40137b3e09a571f285df47c2_takeover_big_logo_2x.webp 2x"><source type="image/png" media="(max-width: 1023px)" srcset="//images-1.gog-statics.com/884de671327b8fbcc5e4ea85151334619a61230f40137b3e09a571f285df47c2_takeover_big_logo.png,
	                //images-1.gog-statics.com/884de671327b8fbcc5e4ea85151334619a61230f40137b3e09a571f285df47c2_takeover_big_logo_2x.png 2x"><source type="image/png" media="(min-width: 1024px)" srcset="//images-1.gog-statics.com/884de671327b8fbcc5e4ea85151334619a61230f40137b3e09a571f285df47c2_takeover_big_logo.png,
	                //images-1.gog-statics.com/884de671327b8fbcc5e4ea85151334619a61230f40137b3e09a571f285df47c2_takeover_big_logo_2x.png 2x"><img class="big-spot__logo-image" src="">
								</picture>
							</div>
							<div class="big-spot__text">
								<div class="big-spot__super-title">
									<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
										<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
															<?php if($have_change_after_select_user > 0){
																			if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																		} else {
																			if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																		} ?>">
											<svg class="option-icon option-icon-full">
												<use xlink:href="#checkbox-multi">
													<symbol viewBox="0 0 17 17" id="checkbox-multi">
															<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
													</symbol>
												</use>
											</svg>
											In library
										</span>
										<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
											<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
											</svg>
											in cart
										</span>
										<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
													<?php if($have_change_after_select_user > 0){
																	if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																} else {
																	if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																}
																	?>">
											<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
											</svg>
											soon
										</span>
										<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
											<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
											</svg>
											wishlisted
										</span>
									</div>
									<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
										<span class="product_isGame">
											<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
											<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
											<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
										</span>
									</div>
									<div class="big-spot__super-title-text">
										<span class="Pre-Order <?php if($gc_g_soon == '0'){ echo 'ng-hide'; } ?>">Pre-Order</span>
										<span class="now-on-sale <?php if($gc_g_soon == '1'){ echo 'ng-hide'; } ?>">now on sale</span>
									</div>
								</div>
								<div class="big-spot__title"><?php echo $gc_g_title; ?></div>
							</div>
							<div class="big-spot__action">
								<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0'){ echo 'ng-hide'; } ?>">
									<span class="menu-product__discount-text">
										<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
										%
									</span>
								</div>
								<span class="menu-custom-category__price-regular _price ng-binding"><?php echo $gc_g_format_price_discount; ?></span>
								<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
											href="<?php echo $gc_g_href; ?>"
											gc_g_title="<?php echo $gc_g_title; ?>"
											gc_g_incart="<?php echo $gc_g_incart; ?>"
											gc_g_type="<?php echo $gc_g_type; ?>"
											gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
											gc_g_price_price="<?php echo $gc_g_price_price; ?>"
											gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
											gc_g_newReleases_and_upcoming_and_onsale="<?php echo $gc_g_newReleases_and_upcoming_and_onsale; ?>"
											gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
											gc_g_tba_free_owned__noPrice_inSearch="<?php echo $gc_g_tba_free_owned__noPrice_inSearch; ?>"
											gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
											gc_g_user_rating="<?php echo $gc_g_user_rating; ?>"
											class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
									<span class="menu-product__price-btn-text">
										<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
										</svg>
										<span class="product-state__is_choose product-state__add-to-cart <?php if($gc_g_incart == 1){ echo 'ng-hide'; } ?>">Add to cart</span>
										<span class="product-state__is_choose product-state__checkout-now <?php if($gc_g_incart == 0){ echo 'ng-hide'; } ?>">checkout now</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</a>
			<?php } ?>
		</div>
		<!---->
		<!---->
		<a class="giveaway-banner  <?php if($have_change_after_select_user > 0){ echo 'user_realy_in_gog_enjoy'; } ?>" href="">
			<?php
				select_games_by_two_para("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_title like ? LIMIT 1", "butcher Demo");
				if($have_change_after_fetch > 0){
			?>
				<div class="giveaway-banner__background"></div>
				<div class="giveaway-banner__content">
					<picture><?php echo $gc_g_picture_logo_glide__slides; ?></picture>
					<div class="giveaway-banner__text">
						<span class="giveaway-banner__text--primary">Giveaway: </span>
						<span class="giveaway-banner__title"><?php echo $gc_g_title; ?></span>
						<div class="giveaway-banner__countdown">00H : 00M : 00S left</div>
					</div>
					<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
						href="<?php echo $gc_g_href; ?>"
						gc_g_title="<?php echo $gc_g_title; ?>"
						gc_g_incart="<?php echo $gc_g_incart; ?>"
						gc_g_type="<?php echo $gc_g_type; ?>"
						gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
						gc_g_price_price="<?php echo $gc_g_price_price; ?>"
						gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
						gc_g_newReleases_and_upcoming_and_onsale="<?php echo $gc_g_newReleases_and_upcoming_and_onsale; ?>"
						gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
						gc_g_tba_free_owned__noPrice_inSearch="<?php echo $gc_g_tba_free_owned__noPrice_inSearch; ?>"
						gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
						gc_g_user_rating="<?php echo $gc_g_user_rating; ?>"
						class="menu-product__price-btn menu-product__price-btn--active giveaway-banner__button">
						<span class="menu-product__price-btn-text">
							<span class="product-state__is_choose product-state__add-to-cart <?php if($gc_g_incart == 1){ echo 'ng-hide'; } ?>">Get it FREE</span>
							<span class="product-state__is_choose product-state__checkout-now <?php if($gc_g_incart == 0){ echo 'ng-hide'; } ?>">checkout now</span>
						</span>
					</div>
				</div>
				<div class="giveaway-banner__success ng-hide">
					<div class="dots-wrapper">
	          <span class="dots"></span>
	          <span class="dots"></span>
	          <span class="dots"></span>
	        </div>
					<div class="giveaway-banner__success-inner">
						<svg class="option-icon option-icon-full">
							<use xlink:href="#checkbox-multi">
								<symbol viewBox="0 0 17 17" id="checkbox-multi">
										<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
								</symbol>
							</use>
						</svg>
						<span class="giveaway-banner__success--primary">Success!!</span>
						<span class="giveaway-banner__success-content"><?php echo $gc_g_title; ?> will appear in your account soon.</span>
					</div>
				</div>
			<?php } ?>
		</a>
		<!---->
		<!---->
		<div class="section-title js-section-title">
			<div class="section-title--content js-section-title--content">
				<div class="section-title__icon-wrapper">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 172 172">
						<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#000000"><path d="M130.88125,17.2c-2.93403,0 -5.86843,1.12051 -8.10729,3.35938l-13.84062,13.84063l28.66667,28.66667l13.84062,-13.84063c4.47773,-4.47773 4.47773,-11.73685 0,-16.21458l-12.45208,-12.45208c-2.23887,-2.23887 -5.17326,-3.35937 -8.10729,-3.35937zM97.46667,45.86667l-67.31068,67.31067c0,0 5.26186,-0.47147 7.22266,1.48933c1.9608,1.9608 0.34669,14.792 2.75469,17.2c2.408,2.408 15.15831,0.71299 16.98724,2.54192c1.82894,1.82893 1.70209,7.43542 1.70209,7.43542l67.31067,-67.31067zM22.93333,131.86667l-5.40859,15.31875c-0.21262,0.60453 -0.32239,1.24042 -0.32474,1.88125c0,3.16643 2.5669,5.73333 5.73333,5.73333c0.64083,-0.00235 1.27672,-0.11212 1.88125,-0.32474c0.0187,-0.00737 0.03737,-0.01483 0.05599,-0.02239l0.14557,-0.04479c0.01122,-0.00743 0.02242,-0.01489 0.03359,-0.0224l15.08359,-5.31901l-8.6,-8.6z"></path></g></g>
					</svg>
					<span class="section-title__icon-wrapper--title">Highlights</span>
				</div>
			</div>
		</div>
		<!---->
		<!---->
		<div class="big-spots-container big-spot-height <?php if($have_change_after_select_user > 0){ echo 'user_realy_in_gog_enjoy'; } ?>">
			<div class="big-spots-wrapper js-big-spots-slider glide--ltr glide--carousel is-slider-initialized glide--swipeable">
				<div class="slide-hover slide-hover--left"></div>
				<div class="slide-hover slide-hover--right"></div>
				<div class="glide slide-hover-container slide-hover-transition">
					<div class="big-spots__arrows">
						<div class="big-spots__arrow-wrapper big-spots__arrow-wrapper--left slide-hover-transition">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#d8d8d8;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#d8d8d8"><path d="M96.49159,23.72236l-62.27765,62.27764l62.27765,62.27765l18.70913,-18.70913l-43.56851,-43.56851l43.56851,-43.56851z">
							</path></g></g>
							</svg>
						</div>
						<div class="big-spots__arrow-wrapper big-spots__arrow-wrapper--right slide-hover-transition">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 172 172" style=" fill:#d8d8d8;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#d8d8d8"><path d="M75.50842,23.72236l-18.70913,18.70913l43.56851,43.56851l-43.56851,43.56851l18.70913,18.70913l62.27764,-62.27765z">
							</path></g></g>
							</svg>
						</div>
					</div>
					<div class="glide__track">
						<div class="glide__slides js-slides-holder">
							<?php
								$games_slides = array(
									'Warhammer 40,000: Mechanicus - Omnissiah Edition', // copy //0
									'Headup publisher sale up to -80%',  // copy //1
									'cyberpunk 2077',  // copy //2
									'Versus Evil Weekend up to -80%', //3
									'Shenmue III Deluxe Edition', //4
									'The Witcher 3: Wild Hunt - Game of the Year Edition',//5
									"Baldur's Gate 3", //6
									'Throwback publisher sale up to -50%', //7
									"Realpolitiks II", //8
									'Shadow Warrior 2', //9
									'Frostpunk', //10
									'SUPERHOT: MIND CONTROL DELETE', //11
									'icbm', //12
									'Warhammer 40,000: Mechanicus - Omnissiah Edition', //13
									'Headup publisher sale up to -80%', //14
									'cyberpunk 2077', //15
									'Versus Evil Weekend up to -80%', // copy //16
									'Shenmue III Deluxe Edition',  // copy //17
									'The Witcher 3: Wild Hunt - Game of the Year Edition' // copy //18
								);
								for($i = 0; $i < count($games_slides); $i++){
									if($i == 3 || $i == 16){ ?>
									<a href="" game-position="<?php echo $i; ?>" class="big-spot glide__slide <?php if($i == 0 || $i == 1 || $i == 2 || $i == 16 || $i == 17 || $i == 18){ echo 'game-is-cloned'; } ?> <?php if($i == 3){ echo 'glide__slide--first'; }elseif($i == 15){ echo 'glide__slide--last'; } ?>">
										<picture class="lazy">
											<source class="big-spot__background-source" media="(max-width:425px)" lazy-srcset="//images-2.gog-statics.com/62e14ed4d23bda0455177df0b80a86d212d872681c984cf8a31bfc1f85cc141a_bs_background_500.jpg" srcset="//images-2.gog-statics.com/62e14ed4d23bda0455177df0b80a86d212d872681c984cf8a31bfc1f85cc141a_bs_background_500.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:426px) and (max-width: 704px)" lazy-srcset="//images-3.gog-statics.com/b00e206bbf9a907921c29dddfcc026779fc003328072aa42345de43bc2637f0d_bs_background_800.webp" srcset="//images-3.gog-statics.com/b00e206bbf9a907921c29dddfcc026779fc003328072aa42345de43bc2637f0d_bs_background_800.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:426px) and (max-width: 704px)" lazy-srcset="//images-3.gog-statics.com/b00e206bbf9a907921c29dddfcc026779fc003328072aa42345de43bc2637f0d_bs_background_800.jpg" srcset="//images-3.gog-statics.com/b00e206bbf9a907921c29dddfcc026779fc003328072aa42345de43bc2637f0d_bs_background_800.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:705px) " lazy-srcset="//images-3.gog-statics.com/b00e206bbf9a907921c29dddfcc026779fc003328072aa42345de43bc2637f0d_bs_background_1275.webp" srcset="//images-3.gog-statics.com/b00e206bbf9a907921c29dddfcc026779fc003328072aa42345de43bc2637f0d_bs_background_1275.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:705px) " lazy-srcset="//images-3.gog-statics.com/b00e206bbf9a907921c29dddfcc026779fc003328072aa42345de43bc2637f0d_bs_background_1275.jpg" srcset="//images-3.gog-statics.com/b00e206bbf9a907921c29dddfcc026779fc003328072aa42345de43bc2637f0d_bs_background_1275.jpg"><img class="big-spot__background js-background-2" src="">
										</picture>
										<div class="big-spot__gradient big-spot__gradient-<?php echo $i; ?>"></div>
										<div class="big-spot__container">
											<div class="big-spot__body">
												<div class="big-spot__logo">
													<picture class="lazy">
														<source type="image/webp" media="(max-width: 1023px)" lazy-srcset="//images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_small.webp,
						                //images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_small_2x.webp 2x" srcset="//images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_small.webp,
						                //images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_small_2x.webp 2x"><source type="image/webp" media="(min-width: 1024px)" lazy-srcset="//images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_big.webp,
						                //images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_big_2x.webp 2x" srcset="//images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_big.webp,
						                //images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_big_2x.webp 2x"><source type="image/png" media="(max-width: 1023px)" lazy-srcset="//images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_small.png,
						                //images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_small_2x.png 2x" srcset="//images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_small.png,
						                //images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_small_2x.png 2x"><source type="image/png" media="(min-width: 1024px)" lazy-srcset="//images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_big.png,
						                //images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_big_2x.png 2x" srcset="//images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_big.png,
						                //images-3.gog-statics.com/a64435f7db6f51ed86f7f6406a8ef9276748cb95d7e807ff0d6d1984d284d2ea_bs_logo_big_2x.png 2x"><img class="big-spot__logo-image" src="">
													</picture>
												</div>
												<div class="big-spot__text">
													<div class="big-spot__super-title"></div>
													<div class="big-spot__title">Versus Evil Weekend up to -80%</div>
												</div>
												<div class="big-spot__action">
													<div class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active product-state__browse_deal">
														<span class="menu-product__price-btn-text">
															<span class="product-state__is_choose">browse</span>
														</span>
													</div>
												</div>
											</div>
										</div>
									</a>
								<?php } elseif($i == 7) { ?>
									<a href="" game-position="<?php echo $i; ?>" class="big-spot glide__slide <?php if($i == 0 || $i == 1 || $i == 2 || $i == 16 || $i == 17 || $i == 18){ echo 'game-is-cloned'; } ?> <?php if($i == 3){ echo 'glide__slide--first'; }elseif($i == 15){ echo 'glide__slide--last'; } ?>">
										<picture class="lazy">
											<source class="big-spot__background-source" media="(max-width:425px)" lazy-srcset="//images-1.gog-statics.com/4e72a1c0a9389e01aaa29479993d7fde5f718e916ba11fef4c7e1dbb42e7060f_bs_background_500.jpg" srcset="//images-1.gog-statics.com/4e72a1c0a9389e01aaa29479993d7fde5f718e916ba11fef4c7e1dbb42e7060f_bs_background_500.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:426px) and (max-width: 704px)" lazy-srcset="//images-4.gog-statics.com/8a2d1a67a4af82ab932715e9f799f85f569e490274ba78f20979175f1f85f11b_bs_background_800.webp" srcset="//images-4.gog-statics.com/8a2d1a67a4af82ab932715e9f799f85f569e490274ba78f20979175f1f85f11b_bs_background_800.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:426px) and (max-width: 704px)" lazy-srcset="//images-4.gog-statics.com/8a2d1a67a4af82ab932715e9f799f85f569e490274ba78f20979175f1f85f11b_bs_background_800.jpg" srcset="//images-4.gog-statics.com/8a2d1a67a4af82ab932715e9f799f85f569e490274ba78f20979175f1f85f11b_bs_background_800.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:705px) " lazy-srcset="//images-4.gog-statics.com/8a2d1a67a4af82ab932715e9f799f85f569e490274ba78f20979175f1f85f11b_bs_background_1275.webp" srcset="//images-4.gog-statics.com/8a2d1a67a4af82ab932715e9f799f85f569e490274ba78f20979175f1f85f11b_bs_background_1275.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:705px) " lazy-srcset="//images-4.gog-statics.com/8a2d1a67a4af82ab932715e9f799f85f569e490274ba78f20979175f1f85f11b_bs_background_1275.jpg" srcset="//images-4.gog-statics.com/8a2d1a67a4af82ab932715e9f799f85f569e490274ba78f20979175f1f85f11b_bs_background_1275.jpg"><img class="big-spot__background js-background-6" src="">
										</picture>
										<div class="big-spot__gradient big-spot__gradient-<?php echo $i; ?>"></div>
										<div class="big-spot__container">
											<div class="big-spot__body">
												<div class="big-spot__logo">
													<picture class="lazy">
														<source type="image/webp" media="(max-width: 1023px)" lazy-srcset="//images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_small.webp,
						                //images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_small_2x.webp 2x" srcset="//images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_small.webp,
						                //images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_small_2x.webp 2x"><source type="image/webp" media="(min-width: 1024px)" lazy-srcset="//images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_big.webp,
						                //images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_big_2x.webp 2x" srcset="//images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_big.webp,
						                //images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_big_2x.webp 2x"><source type="image/png" media="(max-width: 1023px)" lazy-srcset="//images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_small.png,
						                //images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_small_2x.png 2x" srcset="//images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_small.png,
						                //images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_small_2x.png 2x"><source type="image/png" media="(min-width: 1024px)" lazy-srcset="//images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_big.png,
						                //images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_big_2x.png 2x" srcset="//images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_big.png,
						                //images-1.gog-statics.com/ec158016aa7d5ed9749f59adcf2c8f1944bdbd10b8f96f51d192051a29d18b78_bs_logo_big_2x.png 2x"><img class="big-spot__logo-image" src="">
													</picture>
												</div>
												<div class="big-spot__text">
													<div class="big-spot__super-title">TrickStyle, Powerslave, Bloodwych, Alien Earth</div>
													<div class="big-spot__title">Throwback publisher sale up to -50%</div>
												</div>
												<div class="big-spot__action">
													<div class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active product-state__browse_deal">
														<span class="menu-product__price-btn-text">
															<span class="product-state__is_choose">browse</span>
														</span>
													</div>
												</div>
											</div>
										</div>
									</a>
								<?php } elseif($i == 1 || $i == 14) { ?>
									<a href="" game-position="<?php echo $i; ?>" class="big-spot glide__slide <?php if($i == 0 || $i == 1 || $i == 2 || $i == 16 || $i == 17 || $i == 18){ echo 'game-is-cloned'; } ?> <?php if($i == 3){ echo 'glide__slide--first'; }elseif($i == 15){ echo 'glide__slide--last'; } ?>">
										<picture class="lazy">
											<source class="big-spot__background-source" media="(max-width:425px)" lazy-srcset="//images-2.gog-statics.com/2674c258c30d3a7f02fc15a851fa4e845be01ca1294e9e340bb3de22a638b16c_bs_background_500.jpg" srcset="//images-2.gog-statics.com/2674c258c30d3a7f02fc15a851fa4e845be01ca1294e9e340bb3de22a638b16c_bs_background_500.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:426px) and (max-width: 704px)" lazy-srcset="//images-1.gog-statics.com/b2ecfa32689b800410efe79ebc5f35708cfa49fa2ac647204f34e12312e0c8f2_bs_background_800.webp" srcset="//images-1.gog-statics.com/b2ecfa32689b800410efe79ebc5f35708cfa49fa2ac647204f34e12312e0c8f2_bs_background_800.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:426px) and (max-width: 704px)" lazy-srcset="//images-1.gog-statics.com/b2ecfa32689b800410efe79ebc5f35708cfa49fa2ac647204f34e12312e0c8f2_bs_background_800.jpg" srcset="//images-1.gog-statics.com/b2ecfa32689b800410efe79ebc5f35708cfa49fa2ac647204f34e12312e0c8f2_bs_background_800.jpg"><source type="image/webp" class="big-spot__background-source" media="(min-width:705px) " lazy-srcset="//images-1.gog-statics.com/b2ecfa32689b800410efe79ebc5f35708cfa49fa2ac647204f34e12312e0c8f2_bs_background_1275.webp" srcset="//images-1.gog-statics.com/b2ecfa32689b800410efe79ebc5f35708cfa49fa2ac647204f34e12312e0c8f2_bs_background_1275.webp"><source type="image/jpeg" class="big-spot__background-source" media="(min-width:705px) " lazy-srcset="//images-1.gog-statics.com/b2ecfa32689b800410efe79ebc5f35708cfa49fa2ac647204f34e12312e0c8f2_bs_background_1275.jpg" srcset="//images-1.gog-statics.com/b2ecfa32689b800410efe79ebc5f35708cfa49fa2ac647204f34e12312e0c8f2_bs_background_1275.jpg"><img class="big-spot__background js-background-2" src="">
										</picture>
										<div class="big-spot__gradient big-spot__gradient-<?php echo $i; ?>"></div>
										<div class="big-spot__container">
											<div class="big-spot__body">
												<div class="big-spot__logo">
													<picture class="lazy">
														<source type="image/webp" media="(max-width: 1023px)" lazy-srcset="//images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_small.webp,
						                //images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_small_2x.webp 2x" srcset="//images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_small.webp,
						                //images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_small_2x.webp 2x"><source type="image/webp" media="(min-width: 1024px)" lazy-srcset="//images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_big.webp,
						                //images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_big_2x.webp 2x" srcset="//images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_big.webp,
						                //images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_big_2x.webp 2x"><source type="image/png" media="(max-width: 1023px)" lazy-srcset="//images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_small.png,
						                //images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_small_2x.png 2x" srcset="//images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_small.png,
						                //images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_small_2x.png 2x"><source type="image/png" media="(min-width: 1024px)" lazy-srcset="//images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_big.png,
						                //images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_big_2x.png 2x" srcset="//images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_big.png,
						                //images-2.gog-statics.com/da77fc91407600193a273e7d1993a7430179b4830744566de1419bfd4b3a9268_bs_logo_big_2x.png 2x"><img class="big-spot__logo-image" src="">
													</picture>
												</div>
												<div class="big-spot__text">
													<div class="big-spot__super-title">Bridge Constructor, Trüberbrook, The Coma and more</div>
													<div class="big-spot__title">Headup publisher sale up to -80%</div>
												</div>
												<div class="big-spot__action">
													<div class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active product-state__browse_deal">
														<span class="menu-product__price-btn-text">
															<span class="product-state__is_choose">browse</span>
														</span>
													</div>
												</div>
											</div>
										</div>
									</a>
								<?php	} else {
									// select games
									select_games_by_two_para("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_title like ? LIMIT 1", $games_slides[$i]);
									if($have_change_after_fetch > 0){
								?>
									<a game-position="<?php echo $i; ?>"
										ng-game-movies-id="<?php echo $gc_g_id; ?>"
										href="<?php echo $gc_g_href; ?>"
										gc_g_title="<?php echo $gc_g_title; ?>"
										gc_g_incart="<?php echo $gc_g_incart; ?>"
										gc_g_type="<?php echo $gc_g_type; ?>"
										gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
										class="big-spot glide__slide button-parent--class--to-find--labels <?php if($i == 0 || $i == 1 || $i == 2 || $i == 16 || $i == 17 || $i == 18){ echo 'game-is-cloned'; } ?> <?php if($i == 3){ echo 'glide__slide--first'; }elseif($i == 15){ echo 'glide__slide--last'; } ?>">
										<picture class="lazy"><?php echo $gc_g_picture_cover_glide__slides; ?></picture>
										<div class="big-spot__gradient big-spot__gradient-<?php echo $i; ?>"></div>
										<div class="big-spot__container">
											<div class="big-spot__body">
												<div class="big-spot__logo"><picture class="lazy"><?php echo $gc_g_picture_logo_glide__slides; ?></picture></div>
												<div class="big-spot__text">
													<div class="big-spot__super-title">
														<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
															<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																				<?php if($have_change_after_select_user > 0){
																								if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																							} else {
																								if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																							} ?>">
																<svg class="option-icon option-icon-full">
																	<use xlink:href="#checkbox-multi">
																		<symbol viewBox="0 0 17 17" id="checkbox-multi">
																				<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																		</symbol>
																	</use>
																</svg>
																In library
															</span>
															<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
																<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
					                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
					                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
					                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
					                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
																</svg>
																in cart
															</span>
															<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																		<?php if($have_change_after_select_user > 0){
																						if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					} else {
																						if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					}
																						?>">
																<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
																</svg>
																soon
															</span>
															<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
																<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
																</svg>
																wishlisted
															</span>
														</div>
														<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
				                      <span class="product_isGame">
				                        <i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
				                        <i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
				                        <i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
				                      </span>
				                    </div>
														<div class="big-spot__super-title-text">
															<span class="Pre-Order <?php if($gc_g_soon == '0'){ echo 'ng-hide'; } ?>">Pre-Order</span>
															<span class="now-on-sale <?php if($gc_g_soon == '1'){ echo 'ng-hide'; } ?>">now on sale</span>
														</div>
													</div>
													<div class="big-spot__title"><?php echo $gc_g_title; ?></div>
												</div>
												<div class="big-spot__action">
													<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0'){ echo 'ng-hide'; } ?>">
														<span class="menu-product__discount-text">
															<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
															%
														</span>
													</div>
													<span class="menu-custom-category__price-regular _price ng-binding"><?php echo $gc_g_format_price_discount; ?></span>
													<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																href="<?php echo $gc_g_href; ?>"
																gc_g_title="<?php echo $gc_g_title; ?>"
																gc_g_incart="<?php echo $gc_g_incart; ?>"
																gc_g_type="<?php echo $gc_g_type; ?>"
																gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																gc_g_newReleases_and_upcoming_and_onsale="<?php echo $gc_g_newReleases_and_upcoming_and_onsale; ?>"
																gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																gc_g_tba_free_owned__noPrice_inSearch="<?php echo $gc_g_tba_free_owned__noPrice_inSearch; ?>"
																gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																gc_g_user_rating="<?php echo $gc_g_user_rating; ?>"
																class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
														<span class="menu-product__price-btn-text">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
															</svg>
															<span class="product-state__is_choose product-state__add-to-cart <?php if($gc_g_incart == 1){ echo 'ng-hide'; } ?>">Add to cart</span>
															<span class="product-state__is_choose product-state__checkout-now <?php if($gc_g_incart == 0){ echo 'ng-hide'; } ?>">checkout now</span>
														</span>
													</div>
												</div>
											</div>
										</div>
									</a>
							<?php	} } } ?>
						</div>
					</div>
					<div class="big-spot__carousel-pages-container slider-stays-in-place slide-hover-transition">
						<?php for($i = 0; $i < count($games_slides) - 6; $i++){ ?>
							<span class="carousel__page carousel__page--click js-page-<?php echo $i; ?>" js-page-position="<?php echo $i; ?>"></span>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!---->
		<!---->
		<div class="small-spots__container small-spots__container--no-top-space">
			<div class="small-spots__container_content">
				<?php
				// select games
				$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type = ? ORDER BY RAND() LIMIT 4");
				$select_game_by_id->execute(array("action"));
				$fetch_games_by_id = $select_game_by_id->fetchAll();
				// to any changes rowcount > 0
				$have_change_after_fetch = $select_game_by_id->rowcount();

				if($have_change_after_fetch > 0){
					foreach($fetch_games_by_id as $fetch_game_by_id){
						$gc_g_id = $fetch_game_by_id['gc_g_id'];

						// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
						$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
						$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
						$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

						$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
						$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

						$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

						// coming-soon
						$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

						// href of game
						$gc_g_href = $fetch_game_by_id['gc_g_href'];

						$gc_g_title = $fetch_game_by_id['gc_g_title'];

						// flags [ soon, indev ]
						$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
						$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

						// gc_g_type_parent
						$gc_g_type = $fetch_game_by_id['gc_g_type'];
						$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

						// operating system [ windows - mac - linux ]
						$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
						$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
						$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

						// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
						$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
						$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
						$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];
						?>
						<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
									gc_g_title="<?php echo $gc_g_title; ?>"
									gc_g_incart="<?php echo $gc_g_incart; ?>"
									gc_g_type="<?php echo $gc_g_type; ?>"
									gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
									gc_g_price_price="<?php echo $gc_g_price_price; ?>"
									class="product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
							<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
								<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
								<div class="product-tile__cover has-image">
									<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
									<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
										<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
															<?php if($have_change_after_select_user > 0){
																			if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																		} else {
																			if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																		} ?>">
											<svg class="option-icon option-icon-full">
												<use xlink:href="#checkbox-multi">
													<symbol viewBox="0 0 17 17" id="checkbox-multi">
															<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
													</symbol>
												</use>
											</svg>
											In library
										</span>
										<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
											<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
											</svg>
											in cart
										</span>
										<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
													<?php if($have_change_after_select_user > 0){
																	if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																} else {
																	if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																}
																	?>">
											<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
											</svg>
											soon
										</span>
										<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
											<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
											</svg>
											wishlisted
										</span>
									</div>
								</div>
								<div class="product-tile__info">
									<div class="product-tile__platforms">
										<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
											<span class="product_isGame">
												<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
												<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
												<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
											</span>
										</div>
										<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
											<span class="product-tile__movie-slug">movie</span>
										</div>
									</div>
									<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
										<div class="product-tile__prices">
											<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
												<span class="menu-product__discount-text">
													<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
													%
												</span>
											</div>
											<div class="product-tile__prices-inner">
												<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
												<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
												<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
											</div>
										</div>
										<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
													href="<?php echo $gc_g_href; ?>"
													gc_g_title="<?php echo $gc_g_title; ?>"
													gc_g_incart="<?php echo $gc_g_incart; ?>"
													gc_g_type="<?php echo $gc_g_type; ?>"
													gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
													gc_g_price_price="<?php echo $gc_g_price_price; ?>"
													gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
													gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
													gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
													class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
													<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
													</svg>
										</div>
									</div>
									<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
									<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
								</div>
							</a>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
		<!---->
		<!---->
		<div class="galaxy-section-wrapper">
			<div class="galaxy-section">
				<a class="galaxy-section-info" href="">
					We are GOG.COM, the
					<div class="galaxy-tooltip-wrapper">
						<span class="dropdown__trigger galaxy-tooltip__trigger">DRM-free</span>
						<div class="dropdown__layer galaxy-tooltip__layer js-galaxy-tooltip__layer">
							<div class="galaxy-tooltip__tooltip-content">
								<div class="tooltip-content__tooltip-icon-wrapper">
									<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;">
										<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#86328A"><path d="M86,12.09375c-20.69375,0 -37.625,16.93125 -37.625,37.625c0,2.28438 1.74687,4.03125 4.03125,4.03125c2.28438,0 4.03125,-1.74687 4.03125,-4.03125c0,-16.25937 13.30312,-29.5625 29.5625,-29.5625c16.25937,0 29.5625,13.30313 29.5625,29.5625v29.5625h-77.9375c-6.71875,0 -12.09375,5.375 -12.09375,12.09375c0,6.71875 5.375,12.09375 12.09375,12.09375c2.28437,0 4.03125,-1.74688 4.03125,-4.03125c0,-2.28437 -1.74688,-4.03125 -4.03125,-4.03125c-2.28437,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28437 1.74688,-4.03125 4.03125,-4.03125h96.75c2.28438,0 4.03125,1.74688 4.03125,4.03125c0,2.28437 -1.74687,4.03125 -4.03125,4.03125h-76.59375c-2.28438,0 -4.03125,1.74688 -4.03125,4.03125c0,2.28437 1.74687,4.03125 4.03125,4.03125h71.21875v9.40625c0,23.65 -19.35,43 -43,43c-23.65,0 -43,-19.35 -43,-43c0,-2.28437 -1.74688,-4.03125 -4.03125,-4.03125c-2.28437,0 -4.03125,1.74688 -4.03125,4.03125c0,28.21875 22.84375,51.0625 51.0625,51.0625c28.21875,0 51.0625,-22.84375 51.0625,-51.0625v-9.67395c5.375,-1.20938 9.40625,-6.04792 9.40625,-11.82605c0,-6.71875 -5.375,-12.09375 -12.09375,-12.09375h-10.75v-29.5625c0,-20.69375 -16.93125,-37.625 -37.625,-37.625zM86,122.28125c-2.28437,0 -4.03125,1.74688 -4.03125,4.03125v9.40625c0,2.28438 1.74688,4.03125 4.03125,4.03125c2.28437,0 4.03125,-1.74687 4.03125,-4.03125v-9.40625c0,-2.28437 -1.74688,-4.03125 -4.03125,-4.03125z"></path></g></g>
									</svg>
								</div>
								<div class="tooltip-content__header">Own The Things You Buy</div>
								<div class="tooltip-content__text">It's all about you and your games. We don’t believe in controlling you, and the way you play games - this is DRM-free gaming.</div>
							</div>
						</div>
					</div>
					home for a
					<div class="galaxy-tooltip-wrapper">
						<span class="dropdown__trigger galaxy-tooltip__trigger">curated selection</span>
						<div class="dropdown__layer galaxy-tooltip__layer js-galaxy-tooltip__layer">
							<div class="galaxy-tooltip__tooltip-content">
								<div class="tooltip-content__tooltip-icon-wrapper">
									<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;">
										<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#86328A"><path d="M118.38647,1.10229c-0.68464,0.06215 -1.34572,0.38557 -1.82141,0.95532l-3.43811,4.13098c-0.94869,1.1395 -0.79575,2.83317 0.34643,3.78455c0.50256,0.41925 1.10906,0.61938 1.71643,0.61938c0.77131,0 1.53868,-0.3262 2.06811,-0.96582l3.43811,-4.13098c0.94869,-1.1395 0.79575,-2.83317 -0.34643,-3.78455c-0.56975,-0.47434 -1.27849,-0.67104 -1.96314,-0.60889zM86,8.0625c-19.26938,0 -34.9375,15.66813 -34.9375,34.9375c0,1.69312 0.13605,3.38394 0.37793,5.02332c0.5375,3.89687 1.76997,7.60583 3.51685,10.96521c0,0.02688 0.03149,0.05774 0.03149,0.05774c0.51062,1.02125 1.07206,1.98833 1.69018,2.92896c0.02688,0.05375 0.02561,0.0781 0.05249,0.10498c1.53187,3.17125 2.39355,6.7198 2.39355,10.4823c0,13.33 -10.8575,24.1875 -24.1875,24.1875c-4.515,0 -8.86686,0.86042 -12.84436,2.44604c-12.92687,5.13312 -22.09314,17.76396 -22.09314,32.49146c0,19.26937 15.66813,34.9375 34.9375,34.9375c8.11625,0 15.63936,-2.79311 21.57874,-7.46936c2.98313,-2.365 5.59357,-5.18982 7.68982,-8.38794c0.02688,-0.02687 0.02561,-0.05123 0.05249,-0.10498c0.61813,-0.94063 1.17956,-1.90771 1.69018,-2.92896c0,0 0.03149,-0.03086 0.03149,-0.05774c4.38062,-6.39625 11.7154,-10.61353 20.01978,-10.61353c8.30438,0 15.63915,4.21728 20.01978,10.61353c0,0.02687 0.03149,0.05774 0.03149,0.05774c0.51062,1.02125 1.07206,1.98833 1.69018,2.92896c0.02687,0.05375 0.02561,0.0781 0.05249,0.10498c2.09625,3.19813 4.70669,6.02294 7.68982,8.38794c5.93937,4.67625 13.46249,7.46936 21.57874,7.46936c19.26937,0 34.9375,-15.66813 34.9375,-34.9375c0,-14.7275 -9.16626,-27.35833 -22.09314,-32.49146c-3.9775,-1.58563 -8.32936,-2.44604 -12.84436,-2.44604c-13.33,0 -24.1875,-10.8575 -24.1875,-24.1875c0,-3.7625 0.86168,-7.31105 2.39355,-10.4823c0.02687,-0.02688 0.02561,-0.05123 0.05249,-0.10498c0.61812,-0.94063 1.17956,-1.90771 1.69018,-2.92896c0,0 0.03149,-0.03086 0.03149,-0.05774c1.74688,-3.35937 2.97935,-7.06833 3.51685,-10.96521c0.24188,-1.63938 0.37793,-3.33019 0.37793,-5.02332c0,-19.26937 -15.66812,-34.9375 -34.9375,-34.9375zM128.4751,11.36938c-0.67658,-0.12329 -1.40031,0.01239 -2.01038,0.43567l-4.41968,3.06018c-1.22012,0.84656 -1.52625,2.51974 -0.68237,3.74255c0.52138,0.75519 1.36315,1.15479 2.21509,1.15479c0.52944,0 1.05984,-0.15247 1.52746,-0.47766l4.41968,-3.06018c1.22012,-0.84656 1.52625,-2.51449 0.68238,-3.7373c-0.42462,-0.61006 -1.0556,-0.99475 -1.73218,-1.11804zM86,13.4375c16.31313,0 29.5625,13.24938 29.5625,29.5625c0,4.67625 -1.07269,9.10957 -3.00769,13.03332c-0.02687,0.02687 -0.03149,0.02562 -0.03149,0.05249c-0.7525,1.075 -1.39288,2.20837 -1.98413,3.39087c0,0.02687 -0.00462,0.02562 -0.03149,0.05249c-1.63938,3.3325 -2.66021,7.04209 -2.92896,10.93896c-0.05375,0.69875 -0.07874,1.39561 -0.07874,2.09436c0,11.7175 6.82814,21.84979 16.71814,26.63354c3.89688,1.88125 8.24874,2.92896 12.84436,2.92896c16.31313,0 29.5625,13.24938 29.5625,29.5625c0,16.31313 -13.24937,29.5625 -29.5625,29.5625c-10.18563,0 -19.18644,-5.18582 -24.50769,-13.03332c-0.02687,-0.02687 -0.03149,-0.02562 -0.03149,-0.05249c-0.59125,-1.1825 -1.23163,-2.31587 -1.98413,-3.39087c0,-0.02687 -0.00462,-0.02562 -0.03149,-0.05249c-2.12313,-3.14437 -4.86039,-5.86001 -8.00476,-8.01001c-4.73,-3.17125 -10.37543,-5.02332 -16.50293,-5.02332c-6.1275,0 -11.77293,1.85207 -16.50293,5.02332c-3.14438,2.15 -5.88164,4.86563 -8.00476,8.01001c-0.02688,0.02687 -0.03149,0.02562 -0.03149,0.05249c-0.7525,1.075 -1.39288,2.20837 -1.98413,3.39087c0,0.02687 -0.00462,0.02562 -0.03149,0.05249c-5.32125,7.8475 -14.32207,13.03332 -24.50769,13.03332c-16.31312,0 -29.5625,-13.24937 -29.5625,-29.5625c0,-16.31312 13.24938,-29.5625 29.5625,-29.5625c4.59563,0 8.94749,-1.04771 12.84436,-2.92896c9.89,-4.78375 16.71814,-14.91604 16.71814,-26.63354c0,-0.69875 -0.02499,-1.39561 -0.07874,-2.09436c-0.26875,-3.89687 -1.28958,-7.60646 -2.92896,-10.93896c-0.02688,-0.02687 -0.03149,-0.02562 -0.03149,-0.05249c-0.59125,-1.1825 -1.23163,-2.31587 -1.98413,-3.39087c0,-0.02687 -0.00462,-0.02562 -0.03149,-0.05249c-1.935,-3.92375 -3.00769,-8.35707 -3.00769,-13.03332c0,-16.31312 13.24938,-29.5625 29.5625,-29.5625zM86,21.5105c-5.50602,0 -11.01002,2.09717 -15.20117,6.28833c-4.06081,4.06081 -6.29883,9.45798 -6.29883,15.20117c0,5.74319 2.23802,11.14036 6.29883,15.20117c4.18981,4.18981 9.69448,6.28833 15.20117,6.28833c5.50669,0 11.01136,-2.09583 15.20117,-6.28833c1.05081,-1.04812 1.05081,-2.74948 0,-3.80029c-1.05081,-1.05081 -2.74948,-1.05081 -3.80029,0c-6.28875,6.28338 -16.51301,6.28606 -22.80176,0c-6.28606,-6.28606 -6.28606,-16.5157 0,-22.80176c6.28875,-6.28606 16.51301,-6.28606 22.80176,0c1.05081,1.05082 2.74948,1.05082 3.80029,0c1.05081,-1.05081 1.05081,-2.75217 0,-3.80029c-4.19116,-4.19116 -9.69516,-6.28833 -15.20117,-6.28833zM134.44849,23.72034c-0.34854,-0.02381 -0.70366,0.02146 -1.05505,0.14172l-5.0863,1.75317c-1.40019,0.48375 -2.14769,2.01424 -1.66394,3.41711c0.38163,1.11263 1.42521,1.81091 2.54053,1.81091c0.29294,0 0.58634,-0.04753 0.87659,-0.14697l5.08105,-1.75317c1.40019,-0.48375 2.14769,-2.01424 1.66394,-3.41711c-0.3608,-1.05216 -1.31121,-1.73424 -2.35681,-1.80566zM104.66553,35.79309c-0.34349,-0.0543 -0.7003,-0.03754 -1.05505,0.05249c-1.4405,0.35744 -2.32057,1.81389 -1.96313,3.25439c0.54287,2.19031 0.62077,4.52243 0.22571,6.745c-0.258,1.462 0.7111,2.85723 2.1731,3.11792c0.16125,0.02956 0.3191,0.04199 0.47766,0.04199c1.27656,0 2.40657,-0.9169 2.63501,-2.22034c0.52944,-2.96162 0.42899,-6.06783 -0.29395,-8.98108c-0.27009,-1.08239 -1.16885,-1.84749 -2.19934,-2.01038zM136.80005,37.3363l-5.3645,0.31494c-1.48081,0.08869 -2.61078,1.35622 -2.52478,2.83972c0.08062,1.42706 1.27131,2.53003 2.68225,2.53003c0.05106,0 0.10372,-0.00256 0.15747,-0.00525l5.3645,-0.30969c1.48081,-0.08869 2.61078,-1.36147 2.52478,-2.84497c-0.086,-1.47812 -1.38041,-2.61347 -2.83972,-2.52478zM86,37.625c-2.96853,0 -5.375,2.40647 -5.375,5.375c0,2.96853 2.40647,5.375 5.375,5.375c2.96853,0 5.375,-2.40647 5.375,-5.375c0,-2.96853 -2.40647,-5.375 -5.375,-5.375zM130.13379,50.09143c-1.02973,0.19602 -1.89204,0.98694 -2.12586,2.07336c-0.31175,1.45125 0.61162,2.8849 2.06287,3.19665l5.25427,1.12854c0.19081,0.04031 0.38146,0.06299 0.56689,0.06299c1.23894,0 2.35576,-0.86017 2.62451,-2.12061c0.31175,-1.45125 -0.61162,-2.8849 -2.06287,-3.19665l-5.25427,-1.12854c-0.36416,-0.07861 -0.72231,-0.08109 -1.06555,-0.01575zM84.65625,91.375c-5.19493,0 -9.40625,4.21132 -9.40625,9.40625c0,5.19493 4.21132,9.40625 9.40625,9.40625c5.19493,0 9.40625,-4.21132 9.40625,-9.40625c0,-5.19493 -4.21132,-9.40625 -9.40625,-9.40625zM34.9375,110.1875c-11.85456,0 -21.5,9.64544 -21.5,21.5c0,11.85456 9.64544,21.5 21.5,21.5c11.85456,0 21.5,-9.64544 21.5,-21.5c0,-11.85456 -9.64544,-21.5 -21.5,-21.5zM137.0625,110.1875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875c0,1.4835 1.20131,2.6875 2.6875,2.6875c8.89294,0 16.125,7.23206 16.125,16.125c0,8.89294 -7.23206,16.125 -16.125,16.125c-8.89294,0 -16.125,-7.23206 -16.125,-16.125c0,-1.4835 -1.20131,-2.6875 -2.6875,-2.6875c-1.48619,0 -2.6875,1.204 -2.6875,2.6875c0,11.85456 9.64544,21.5 21.5,21.5c11.85456,0 21.5,-9.64544 21.5,-21.5c0,-11.85456 -9.64544,-21.5 -21.5,-21.5zM126.78491,113.59936c-0.67691,-0.12127 -1.39897,0.01629 -2.01038,0.44092c-2.49938,1.74419 -4.56648,3.95428 -6.14136,6.56653c-0.76594,1.27119 -0.35786,2.91888 0.91333,3.68482c0.43537,0.26337 0.91274,0.38843 1.38574,0.38843c0.91106,0 1.80176,-0.46326 2.30432,-1.30176c1.16637,-1.93231 2.76489,-3.63883 4.61389,-4.92883c1.21744,-0.84925 1.51319,-2.51987 0.66662,-3.7373c-0.42462,-0.60872 -1.05526,-0.99152 -1.73218,-1.11279zM34.9375,115.5625c8.89294,0 16.125,7.23206 16.125,16.125c0,8.89294 -7.23206,16.125 -16.125,16.125c-8.89294,0 -16.125,-7.23206 -16.125,-16.125c0,-8.89294 7.23206,-16.125 16.125,-16.125zM34.9375,126.3125c-2.96853,0 -5.375,2.40647 -5.375,5.375c0,2.96853 2.40647,5.375 5.375,5.375c2.96853,0 5.375,-2.40647 5.375,-5.375c0,-2.96853 -2.40647,-5.375 -5.375,-5.375zM137.0625,126.3125c-2.96853,0 -5.375,2.40647 -5.375,5.375c0,2.96853 2.40647,5.375 5.375,5.375c2.96853,0 5.375,-2.40647 5.375,-5.375c0,-2.96853 -2.40647,-5.375 -5.375,-5.375z"></path></g></g>
									</svg>
								</div>
								<div class="tooltip-content__header">curated selection</div>
								<div class="tooltip-content__text">Every game is hand-picked, from modern games by incredible developers to the great classics from your past.</div>
							</div>
						</div>
					</div>
					of games. This place was
					<div class="galaxy-tooltip-wrapper">
						<span class="dropdown__trigger galaxy-tooltip__trigger">made for gamers,</span>
						<div class="dropdown__layer galaxy-tooltip__layer js-galaxy-tooltip__layer">
							<div class="galaxy-tooltip__tooltip-content">
								<div class="tooltip-content__tooltip-icon-wrapper">
									<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="35" height="35" viewBox="0 0 172 172" style=" fill:#000000;">
										<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#86328A"><path d="M26.875,16.125c-4.42086,0 -8.0625,3.64164 -8.0625,8.0625v21.04858l-10.13586,29.77771c-0.00177,0.00524 -0.00352,0.01049 -0.00525,0.01575c-0.68893,2.06664 -0.80313,4.37687 -0.07349,6.57702c1.0426,3.14106 4.14695,7.389 10.2146,9.03882v35.2157c-0.04797,0.29023 -0.04797,0.58636 0,0.87659v21.07483c0,4.42086 3.64164,8.0625 8.0625,8.0625h15.67358c0.29023,0.04797 0.58636,0.04797 0.87659,0h31.37341c0.29023,0.04797 0.58636,0.04797 0.87659,0h69.44983c4.42086,0 8.0625,-3.64164 8.0625,-8.0625v-21.04858c0.04797,-0.29023 0.04797,-0.58636 0,-0.87659v-35.23669c6.09092,-1.6428 9.20674,-5.89698 10.25134,-9.04407c0.72964,-2.20015 0.61542,-4.51027 -0.07349,-6.57702c-0.00173,-0.00525 -0.00348,-0.0105 -0.00525,-0.01575l-10.17261,-29.88269v-20.9436c0,-4.42086 -3.64164,-8.0625 -8.0625,-8.0625zM26.875,21.5h118.25c1.51852,0 2.6875,1.16898 2.6875,2.6875v18.8125h-25.53125c-0.21679,-0.05003 -0.43894,-0.07295 -0.66138,-0.06824c-0.17854,0.00507 -0.35614,0.02793 -0.53015,0.06824h-70.23718c-0.18295,-0.03855 -0.36943,-0.0579 -0.5564,-0.05774c-0.17995,0.00127 -0.35932,0.02062 -0.5354,0.05774h-25.57324v-18.8125c0,-1.51852 1.16898,-2.6875 2.6875,-2.6875zM34.9375,26.875c-2.96853,0 -5.375,2.40647 -5.375,5.375c0,2.96853 2.40647,5.375 5.375,5.375c2.96853,0 5.375,-2.40647 5.375,-5.375c0,-2.96853 -2.40647,-5.375 -5.375,-5.375zM51.0625,26.875c-2.96853,0 -5.375,2.40647 -5.375,5.375c0,2.96853 2.40647,5.375 5.375,5.375c2.96853,0 5.375,-2.40647 5.375,-5.375c0,-2.96853 -2.40647,-5.375 -5.375,-5.375zM67.1875,26.875c-2.96853,0 -5.375,2.40647 -5.375,5.375c0,2.96853 2.40647,5.375 5.375,5.375c2.96853,0 5.375,-2.40647 5.375,-5.375c0,-2.96853 -2.40647,-5.375 -5.375,-5.375zM23.42639,48.375h23.54187l-3.91052,18.25086c-0.20093,0.93963 0.11478,1.91508 0.82817,2.55879c0.71339,0.64371 1.71604,0.85785 2.63015,0.56173c0.91411,-0.29612 1.60076,-1.05749 1.8012,-1.99722l4.15198,-19.37414h67.06152l4.15198,19.37414c0.20045,0.93974 0.88709,1.70111 1.8012,1.99722c0.91411,0.29612 1.91676,0.08198 2.63015,-0.56173c0.71339,-0.64371 1.0291,-1.61915 0.82817,-2.55879l-3.91052,-18.25086h23.58386l9.65295,28.35522c0.36458,1.09375 0.38672,2.22057 0.06824,3.18091c-0.79605,2.39828 -2.67372,6.08887 -10.4823,6.08887c-4.47917,0 -7.86306,-2.20881 -11.08594,-4.78711c-1.61144,-1.28915 -3.13333,-2.64836 -4.75037,-3.78979c-1.61704,-1.14144 -3.42411,-2.1731 -5.6637,-2.1731c-2.23958,0 -4.06035,1.25773 -5.25952,2.50903c-1.19917,1.25131 -2.09892,2.58399 -3.14941,3.78455c-2.10098,2.40112 -4.40148,4.45642 -10.40357,4.45642c-4.46708,0 -7.86932,-2.19588 -11.10168,-4.76611c-1.61618,-1.28512 -3.13978,-2.64363 -4.75562,-3.78455c-0.92158,-0.65071 -1.91233,-1.23987 -2.99719,-1.65344v-16.6709c0.00995,-0.72643 -0.2746,-1.42595 -0.78881,-1.93917c-0.51421,-0.51322 -1.21427,-0.79642 -1.94068,-0.78507c-1.4822,0.02317 -2.66581,1.242 -2.64551,2.72424v16.6814c-1.07082,0.4134 -2.04905,0.99936 -2.96045,1.64294c-1.6156,1.14085 -3.13929,2.49945 -4.75562,3.78455c-3.23266,2.5702 -6.6346,4.76611 -11.10168,4.76611c-6.00208,0 -8.30258,-2.0553 -10.40357,-4.45642c-1.05049,-1.20056 -1.95025,-2.53324 -3.14941,-3.78455c-1.19917,-1.25131 -3.01994,-2.50903 -5.25952,-2.50903c-2.23958,0 -4.04666,1.03166 -5.6637,2.1731c-1.61704,1.14144 -3.13368,2.50064 -4.74512,3.78979c-3.22288,2.5783 -6.61202,4.78711 -11.09119,4.78711c-7.80858,0 -9.68625,-3.69059 -10.4823,-6.08887c-0.31848,-0.96034 -0.29634,-2.08716 0.06824,-3.18091zM45.68225,80.625c0.44792,0 0.64802,0.08603 1.38049,0.85034c0.73247,0.76432 1.68037,2.11914 2.98145,3.60608c2.60214,2.97388 7.01514,6.29358 14.45056,6.29358c6.25336,0 10.93704,-3.1473 14.44531,-5.93664c1.75414,-1.39467 3.26716,-2.72026 4.51416,-3.60083c1.19489,-0.84376 2.03622,-1.15078 2.50379,-1.18103c0.04195,0.00273 0.08395,0.00448 0.12598,0.00525c0.4694,0.03151 1.3117,0.33407 2.50379,1.17578c1.24702,0.88051 2.75497,2.20617 4.50891,3.60083c3.50788,2.78931 8.19195,5.93664 14.44531,5.93664c7.43542,0 11.84842,-3.3197 14.45056,-6.29358c1.30107,-1.48694 2.24897,-2.84176 2.98145,-3.60608c0.73247,-0.76432 0.93258,-0.85034 1.38049,-0.85034c0.44792,0 1.32309,0.31209 2.56152,1.18628c1.23843,0.87419 2.74523,2.20248 4.49316,3.60083c3.48784,2.79028 8.15417,5.94841 14.40332,5.96289v32.25h-8.0625c-0.96921,-0.01371 -1.87072,0.49551 -2.35932,1.33266c-0.4886,0.83715 -0.4886,1.87253 0,2.70968c0.4886,0.83715 1.39011,1.34637 2.35932,1.33266h8.0625v18.8125c0,1.51852 -1.16898,2.6875 -2.6875,2.6875h-67.1875v-21.5h8.0625c0.96921,0.01371 1.87072,-0.49551 2.35932,-1.33266c0.4886,-0.83715 0.4886,-1.87253 0,-2.70968c-0.4886,-0.83715 -1.39011,-1.34637 -2.35932,-1.33266h-8.0625v-21.5c0,-2.93761 -2.43739,-5.375 -5.375,-5.375h-26.875c-2.93761,0 -5.375,2.43739 -5.375,5.375v21.5h-16.125v-32.25c6.26812,-0.00182 10.9452,-3.167 14.44006,-5.96289c1.74793,-1.39835 3.25473,-2.72664 4.49316,-3.60083c1.23843,-0.87418 2.11361,-1.18628 2.56152,-1.18628zM99.4375,96.75c-2.93761,0 -5.375,2.43739 -5.375,5.375v21.5c0,2.93761 2.43739,5.375 5.375,5.375h26.875c2.93761,0 5.375,-2.43739 5.375,-5.375v-21.5c0,-2.93761 -2.43739,-5.375 -5.375,-5.375zM45.6875,102.125h26.875v23.73608c-0.04797,0.29023 -0.04797,0.58636 0,0.87659v23.76233h-26.875zM99.4375,102.125h26.875v21.5h-26.875zM64.45801,120.90076c-1.4822,0.02317 -2.66581,1.242 -2.64551,2.72424v5.375c-0.01371,0.96921 0.49551,1.87072 1.33266,2.35932c0.83715,0.4886 1.87253,0.4886 2.70968,0c0.83715,-0.4886 1.34637,-1.39011 1.33266,-2.35932v-5.375c0.00995,-0.72643 -0.2746,-1.42595 -0.78881,-1.93917c-0.51421,-0.51322 -1.21427,-0.79642 -1.94068,-0.78507zM24.1875,129h16.125v21.5h-13.4375c-1.51852,0 -2.6875,-1.16898 -2.6875,-2.6875zM32.20801,134.33826c-1.4822,0.02317 -2.66581,1.242 -2.64551,2.72424v5.375c-0.01371,0.96921 0.49551,1.87072 1.33266,2.35932c0.83715,0.4886 1.87253,0.4886 2.70968,0c0.83715,-0.4886 1.34637,-1.39011 1.33266,-2.35932v-5.375c0.00995,-0.72643 -0.2746,-1.42595 -0.78881,-1.93917c-0.51421,-0.51322 -1.21427,-0.79642 -1.94068,-0.78507zM85.95801,134.33826c-1.4822,0.02317 -2.66581,1.242 -2.64551,2.72424v5.375c-0.01371,0.96921 0.49551,1.87072 1.33266,2.35932c0.83715,0.4886 1.87253,0.4886 2.70968,0c0.83715,-0.4886 1.34637,-1.39011 1.33266,-2.35932v-5.375c0.00995,-0.72643 -0.2746,-1.42595 -0.78881,-1.93917c-0.51421,-0.51322 -1.21427,-0.79642 -1.94068,-0.78507zM99.39551,134.33826c-1.4822,0.02317 -2.66581,1.242 -2.64551,2.72424v5.375c-0.01371,0.96921 0.49551,1.87072 1.33266,2.35932c0.83715,0.4886 1.87253,0.4886 2.70968,0c0.83715,-0.4886 1.34637,-1.39011 1.33266,-2.35932v-5.375c0.00995,-0.72643 -0.2746,-1.42595 -0.78881,-1.93917c-0.51421,-0.51322 -1.21427,-0.79642 -1.94068,-0.78507zM112.83301,134.33826c-1.4822,0.02317 -2.66581,1.242 -2.64551,2.72424v5.375c-0.01371,0.96921 0.49551,1.87072 1.33266,2.35932c0.83715,0.4886 1.87253,0.4886 2.70968,0c0.83715,-0.4886 1.34637,-1.39011 1.33266,-2.35932v-5.375c0.00995,-0.72643 -0.2746,-1.42595 -0.78881,-1.93917c-0.51421,-0.51322 -1.21427,-0.79642 -1.94068,-0.78507zM126.27051,134.33826c-1.4822,0.02317 -2.66581,1.242 -2.64551,2.72424v5.375c-0.01371,0.96921 0.49551,1.87072 1.33266,2.35932c0.83715,0.4886 1.87253,0.4886 2.70968,0c0.83715,-0.4886 1.34637,-1.39011 1.33266,-2.35932v-5.375c0.00995,-0.72643 -0.2746,-1.42595 -0.78881,-1.93917c-0.51421,-0.51322 -1.21427,-0.79642 -1.94068,-0.78507zM139.70801,134.33826c-1.4822,0.02317 -2.66581,1.242 -2.64551,2.72424v5.375c-0.01371,0.96921 0.49551,1.87072 1.33266,2.35932c0.83715,0.4886 1.87253,0.4886 2.70968,0c0.83715,-0.4886 1.34637,-1.39011 1.33266,-2.35932v-5.375c0.00995,-0.72643 -0.2746,-1.42595 -0.78881,-1.93917c-0.51421,-0.51322 -1.21427,-0.79642 -1.94068,-0.78507z"></path></g></g>
									</svg>
								</div>
								<div class="tooltip-content__header">Built With Gamers In Mind</div>
								<div class="tooltip-content__text">A platform and community for gamers, conveniently built by other gamers. Welcome home!</div>
							</div>
						</div>
					</div>
					so make yourself at home.
				</a>
				<a class="explore-galaxy" href="">
					<picture class="explore-galaxy__icon">
						<source media="(max-width: 767px)" srcset="https://images.gog-statics.com/0164e24124875d6b41560cbcd29e44bbe9efbbaf0097e694900aabf43677ca08.png, https://images.gog-statics.com/86663221546d07fbedc8eeb0f560442faf7dcfbc1c36673c73b9d3aa7ad521d4.png 2x"><source media="screen" srcset="https://images.gog-statics.com/7aef620c84b7f73f9ac9f4e1085e0c2433ae43cb74219d685b21c34bf09ce2b9.png, https://images.gog-statics.com/a36772733f2f23f0eb9cce56d2b9fb4769c3f663bcf27ad2ae1a21d0b0c94ec9.png 2x"><img src="https://images.gog-statics.com/0164e24124875d6b41560cbcd29e44bbe9efbbaf0097e694900aabf43677ca08.png">
					</picture>
					<div class="galaxy-tooltip-wrapper">
						<span class="dropdown__trigger galaxy-tooltip__trigger">The new GOG GALAXY 2.0</span>
						<div class="dropdown__layer galaxy-tooltip__layer js-galaxy-tooltip__layer">
							<div class="galaxy-tooltip__tooltip-content">
								<div class="tooltip-content__tooltip-icon-wrapper">
									<img class="explore-galaxy--icon explore-galaxy-tooltip__icon" src="https://images.gog-statics.com/0164e24124875d6b41560cbcd29e44bbe9efbbaf0097e694900aabf43677ca08.png">
								</div>
								<div class="tooltip-content__header">All Your Games and Friends in One Place</div>
								<div class="tooltip-content__text">Connect GOG GALAXY 2.0 with multiple platforms and unite all your games and friends scattered across them in one powerful app.</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
		<!---->
		<!---->
		<div class="NOW_ON_SALE js--tabbed-section--for-transform" numberOfGamesInOneTab="4">
			<div class="tabbed-section now-on-sale__content">
				<!---->
				<!---->
				<div class="tabbed-section__head now-on-sale__title js-head">
					<div class="section-title_inside js-section-title tabbed-section__title">
						<div class="section-title__icon-wrapper">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#404040"><path d="M106.96985,8.82886c-3.7541,-0.22046 -7.43104,1.01306 -10.3537,3.53259l-6.3172,5.375c-2.55313,2.15 -6.18125,2.15 -8.73437,0l-6.31458,-5.375c-3.7625,-3.225 -9.1375,-4.3 -14.10937,-2.6875c-4.97188,1.6125 -8.60105,5.5099 -9.81042,10.61615l-1.87915,8.0625c-0.80625,3.225 -3.76407,5.37605 -6.98907,5.1073l-8.19635,-0.67187c-5.10625,-0.40313 -10.07917,1.88125 -13.1698,6.04688c-3.09062,4.16562 -3.62655,9.53957 -1.7453,14.37707l3.08905,7.66095c1.20938,3.09062 0.13438,6.58333 -2.6875,8.3302l-6.98645,4.29895c-4.43437,2.6875 -6.98645,7.39115 -6.98645,12.63177c0,5.24063 2.68645,9.81043 6.98645,12.49793l6.98645,4.29895c2.82188,1.74688 3.89688,5.2422 2.6875,8.33282l-3.08905,7.65833c-2.01562,4.8375 -1.34532,10.21145 1.7453,14.37708c3.09062,4.16563 7.92917,6.45 13.1698,6.04688l8.19635,-0.67187c3.35938,-0.26875 6.3172,1.8823 6.98907,5.1073l1.87915,8.0625c1.20937,4.97188 4.83855,9.00365 9.81042,10.61615c1.47812,0.5375 3.09115,0.67188 4.56928,0.67188c3.49375,0 6.8526,-1.20885 9.5401,-3.49323l6.31458,-5.375c2.55312,-2.15 6.18125,-2.15 8.73438,0l6.3172,5.375c3.89688,3.35938 9.27188,4.43385 14.10938,2.82135c4.97187,-1.6125 8.59843,-5.5099 9.8078,-10.61615l1.88177,-8.0625c0.80625,-3.225 3.76407,-5.37605 6.98907,-5.1073l8.19635,0.67188c5.10625,0.40312 10.07655,-1.88125 13.16718,-6.04688c3.09062,-4.16563 3.62917,-9.53958 1.74792,-14.37708l-3.09167,-7.65833c-1.20937,-3.09062 -0.13438,-6.58595 2.6875,-8.33282l6.98907,-4.29895c4.43437,-2.6875 6.98645,-7.39115 6.98645,-12.63178c0,-5.24062 -2.68645,-9.94428 -6.98645,-12.63178l-6.98907,-4.29895c-2.82188,-1.74688 -3.89687,-5.2422 -2.6875,-8.33282l3.09167,-7.65833c2.01563,-4.8375 1.3427,-10.21145 -1.74792,-14.37708c-3.09062,-4.16562 -7.92655,-6.45 -13.16718,-6.04687l-8.19635,0.67188c-3.35937,0.26875 -6.3172,-1.8823 -6.98907,-5.1073l-1.88177,-8.0625c-1.20938,-4.97187 -4.83593,-9.00365 -9.8078,-10.61615c-1.24297,-0.40313 -2.50431,-0.63776 -3.75568,-0.71124zM68.53125,56.4375c6.71875,0 12.09375,5.375 12.09375,12.09375c0,6.71875 -5.375,12.09375 -12.09375,12.09375c-6.71875,0 -12.09375,-5.375 -12.09375,-12.09375c0,-6.71875 5.375,-12.09375 12.09375,-12.09375zM105.97253,59.10925c1.02461,-0.08398 2.06497,0.21626 2.87122,0.95532c1.6125,1.47812 1.8823,4.03282 0.40417,5.64532l-29.5625,33.4599c-0.80625,0.94063 -1.8823,1.34375 -3.09167,1.34375c-0.94062,0 -1.88125,-0.2698 -2.6875,-1.07605c-1.6125,-1.47812 -1.8823,-4.0302 -0.40417,-5.6427l29.69897,-33.32605c0.73906,-0.80625 1.74688,-1.27551 2.77148,-1.3595zM68.53125,64.5c-2.2264,0 -4.03125,1.80485 -4.03125,4.03125c0,2.2264 1.80485,4.03125 4.03125,4.03125c2.2264,0 4.03125,-1.80485 4.03125,-4.03125c0,-2.2264 -1.80485,-4.03125 -4.03125,-4.03125zM103.46875,91.375c6.71875,0 12.09375,5.375 12.09375,12.09375c0,6.71875 -5.375,12.09375 -12.09375,12.09375c-6.71875,0 -12.09375,-5.375 -12.09375,-12.09375c0,-6.71875 5.375,-12.09375 12.09375,-12.09375zM103.46875,99.4375c-2.2264,0 -4.03125,1.80485 -4.03125,4.03125c0,2.2264 1.80485,4.03125 4.03125,4.03125c2.2264,0 4.03125,-1.80485 4.03125,-4.03125c0,-2.2264 -1.80485,-4.03125 -4.03125,-4.03125zM65.84375,104.8125c2.28437,0 4.03125,1.74688 4.03125,4.03125c0,2.28437 -1.74688,4.03125 -4.03125,4.03125c-2.28438,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28437 1.74687,-4.03125 4.03125,-4.03125z"></path></g></g>
							</svg>
						</div>
						<div class="section-title__title-wrapper">Now on sale</div>
					</div>
					<div class="tabs-wrapper tabs-wrapper--select">
						<span class="tabs-wrapper--select--vis">Featured_deals</span>
						<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
					</div>
					<div class="tabs-wrapper tabs-wrapper--inverted tabs-wrapper--shift-breakpoint-1 js-tabs-wrapper">
						<div big-thingy-banner="Featured_deals" class="tabbed-section__tab js-section-tab tabbed-section__tab--active">Featured_deals</div>
						<div big-thingy-banner="Headup" class="tabbed-section__tab js-section-tab">Headup</div>
						<div big-thingy-banner="Weekly_Sale" class="tabbed-section__tab js-section-tab">Weekly_Sale</div>
						<div big-thingy-banner="Bethesda" class="tabbed-section__tab js-section-tab">Bethesda</div>
					</div>
				</div>
				<!---->
				<!---->
				<div big-thingy-banner="Featured_deals" class="Featured_deals tab-products--tabbed-section now-on-sale__tab-products--visible">
					<div class="carousel now-on-sale__carousel scrollbar-17 is-ready">
						<div class="_gog-module-slider__items-container carousel__items-container has-product-tiles-and-transform is-visible">
							<div class="js-items-wrapper">
								<div class="tab-products--tab-collection">
									<?php $offerNumber = 4; ?>
									<!---->
									<!---->
									<div big-thingy-banner--offer="Headup" class="js-item_carousel__item--offer js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
										<div class="now-on-sale__banner">
											<a class="big-thingy" href="">
												<div class="big-thingy__logo-wrapper">Headup</div>
												<div class="big-thingy__discount-wrapper">
													<div class="big-thingy__up-to">up to</div>
													<div class="big-thingy__discount">-80%</div>
												</div>
												<div class="big-thingy__bottom-wrapper">
													<div class="giveaway-banner__countdown">00H : 00M : 00S left</div>
													<div class="big-thingy__button">Browse Deals</div>
												</div>
											</a>
										</div>
									</div>
									<!---->
									<!---->
									<!---->
									<!---->
									<div big-thingy-banner--offer="Weekly_Sale" class="js-item_carousel__item--offer js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
										<div class="now-on-sale__banner">
											<a class="big-thingy" href="">
												<div class="big-thingy__logo-wrapper">Weekly_Sale</div>
												<div class="big-thingy__discount-wrapper">
													<div class="big-thingy__up-to">up to</div>
													<div class="big-thingy__discount">-90%</div>
												</div>
												<div class="big-thingy__bottom-wrapper">
													<div class="giveaway-banner__countdown">00H : 00M : 00S left</div>
													<div class="big-thingy__button">Browse Deals</div>
												</div>
											</a>
										</div>
									</div>
									<!---->
									<!---->
									<!---->
									<!---->
									<div big-thingy-banner--offer="Bethesda" class="js-item_carousel__item--offer js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
										<div class="now-on-sale__banner">
											<a class="big-thingy" href="">
												<div class="big-thingy__logo-wrapper">Bethesda</div>
												<div class="big-thingy__discount-wrapper">
													<div class="big-thingy__up-to">up to</div>
													<div class="big-thingy__discount">-80%</div>
												</div>
												<div class="big-thingy__bottom-wrapper">
													<div class="giveaway-banner__countdown">00H : 00M : 00S left</div>
													<div class="big-thingy__button">Browse Deals</div>
												</div>
											</a>
										</div>
									</div>
									<!---->
									<!---->
									<!---->
									<!---->
									<?php
										$gamesColumnLimit = 25;
										// collect games title in array
										$collect_games_title = array('');
										for($columnNum = 1; $columnNum <= $gamesColumnLimit; $columnNum++){ ?>
											<!---->
											<!---->
											<div class="js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
												<div class="now-on-sale__banner now-on-sale__banner-no-box-shadow">
													<?php // select games
													$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_offer_up_to_large_discount != ? AND gc_g_offer_up_to_large_discount != ? AND gc_g_offer_up_to_large_discount != ? AND gc_g_type_parent = ? ORDER BY RAND()");
													$select_game_by_id->execute(array("Headup", "Weekly_Sale", "Bethesda", "games"));
													$fetch_games_by_id = $select_game_by_id->fetchAll();
													// to any changes rowcount > 0
													$have_change_after_fetch = $select_game_by_id->rowcount();

													$columngamesNumEqual2 = 0;
													if($have_change_after_fetch > 0){
														foreach($fetch_games_by_id as $fetch_game_by_id){
															$gc_g_id = $fetch_game_by_id['gc_g_id'];

															// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
															$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
															$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
															$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

															$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
															$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

															$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

															// coming-soon
															$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

															// href of game
															$gc_g_href = $fetch_game_by_id['gc_g_href'];

															$gc_g_title = $fetch_game_by_id['gc_g_title'];

															// flags [ soon, indev ]
															$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
															$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

															// gc_g_type_parent
															$gc_g_type = $fetch_game_by_id['gc_g_type'];
															$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

															// operating system [ windows - mac - linux ]
															$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
															$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
															$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

															// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
															$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
															$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
															$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];

															for($arrayTitle = 0; $arrayTitle < count($collect_games_title); $arrayTitle++){
																if($gc_g_title == $collect_games_title[$arrayTitle]){ $true_false_return = "true"; break; }
																else{ $true_false_return = "false"; }
															}

															if($true_false_return == "false"){
																$columngamesNumEqual2+=1;
																// push title to array
																array_push($collect_games_title, $gc_g_title); ?>
																<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																			gc_g_title="<?php echo $gc_g_title; ?>"
																			gc_g_incart="<?php echo $gc_g_incart; ?>"
																			gc_g_type="<?php echo $gc_g_type; ?>"
																			gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																			gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																			class="product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
																	<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
																		<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
																		<div class="product-tile__cover has-image">
																			<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
																			<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
																				<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																									<?php if($have_change_after_select_user > 0){
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} else {
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} ?>">
																					<svg class="option-icon option-icon-full">
																						<use xlink:href="#checkbox-multi">
																							<symbol viewBox="0 0 17 17" id="checkbox-multi">
																									<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																							</symbol>
																						</use>
																					</svg>
																					In library
																				</span>
																				<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
																					<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
										                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
										                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
										                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
										                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
																					</svg>
																					in cart
																				</span>
																				<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																							<?php if($have_change_after_select_user > 0){
																											if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										} else {
																											if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										}
																											?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
																					</svg>
																					soon
																				</span>
																				<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
																					</svg>
																					wishlisted
																				</span>
																			</div>
																		</div>
																		<div class="product-tile__info">
																			<div class="product-tile__platforms">
																				<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
																					<span class="product_isGame">
																						<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
																					</span>
																				</div>
																				<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
																					<span class="product-tile__movie-slug">movie</span>
																				</div>
																			</div>
																			<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
																				<div class="product-tile__prices">
																					<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
																						<span class="menu-product__discount-text">
																							<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																							%
																						</span>
																					</div>
																					<div class="product-tile__prices-inner">
																						<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
																						<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
																						<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
																					</div>
																				</div>
																				<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																							href="<?php echo $gc_g_href; ?>"
																							gc_g_title="<?php echo $gc_g_title; ?>"
																							gc_g_incart="<?php echo $gc_g_incart; ?>"
																							gc_g_type="<?php echo $gc_g_type; ?>"
																							gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																							gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																							gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																							gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																							gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																							class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																							</svg>
																				</div>
																			</div>
																			<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
																			<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
																		</div>
																	</a>
																</div>
															<?php } ?>
														<?php if($columngamesNumEqual2 == 2){ break; }
															} } ?>
												</div>
											</div>
										<?php } ?>
										<!---->
										<!---->
										<!---->
										<!---->
										<div class="not-enough-games--discount js-item_carousel__item--offer js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
											<div class="now-on-sale__banner">
												<a class="big-thingy" href="">
													<div class="big-thingy__logo-wrapper">
														<span class="see-all-banner__title">Not enough?</span>
														<span class="see-all-banner__sub-title">We have more discounted games!</span>
													</div>
													<div class="big-thingy__discount-wrapper">
														<div class="discount-wrapper__rhombus-collection">
															<div class="discount-wrapper__rhombus discount-wrapper__rhombus--medium">
																<div class="discount-wrapper__rhombus-text discount-wrapper__rhombus-text--medium">-83%</div>
															</div>
															<div class="discount-wrapper__rhombus discount-wrapper__rhombus--small">
																<div class="discount-wrapper__rhombus-text discount-wrapper__rhombus-text--small">-75%</div>
															</div>
															<div class="discount-wrapper__rhombus discount-wrapper__rhombus--small">
																<div class="discount-wrapper__rhombus-text discount-wrapper__rhombus-text--small">-70%</div>
															</div>
														</div>
														<!---->
														<div class="discount-wrapper__rhombus-collection discount-wrapper__rhombus-collection--big">
															<div class="discount-wrapper__rhombus-text discount-wrapper__rhombus-text--big">-86%</div>
														</div>
														<!---->
														<div class="discount-wrapper__rhombus-collection">
															<div class="discount-wrapper__rhombus discount-wrapper__rhombus--medium">
																<div class="discount-wrapper__rhombus-text discount-wrapper__rhombus-text--medium">-83%</div>
															</div>
															<div class="discount-wrapper__rhombus discount-wrapper__rhombus--small">
																<div class="discount-wrapper__rhombus-text discount-wrapper__rhombus-text--small">-75%</div>
															</div>
															<div class="discount-wrapper__rhombus discount-wrapper__rhombus--small">
																<div class="discount-wrapper__rhombus-text discount-wrapper__rhombus-text--small">-70%</div>
															</div>
														</div>
														<!---->
														<div class="discount-wrapper__rhombus-collection discount-wrapper__rhombus-collection--big">
															<div class="discount-wrapper__rhombus-text discount-wrapper__rhombus-text--big">-86%</div>
														</div>
														<!---->
													</div>
													<div class="big-thingy__bottom-wrapper">
														<div class="big-thingy__button">
															Browse all discounts
															<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
														</div>
													</div>
												</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="carousel-pagination big-arrows">
							<div class="carousel__nav carousel__nav--left">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M114.55469,22.87734c-1.48951,0.04438 -2.90324,0.6669 -3.94167,1.73568l-57.33333,57.33333c-2.23811,2.23904 -2.23811,5.86825 0,8.10729l57.33333,57.33333c1.43802,1.49778 3.5734,2.10113 5.5826,1.57735c2.0092,-0.52378 3.57826,-2.09284 4.10204,-4.10204c0.52378,-2.0092 -0.07957,-4.14458 -1.57735,-5.5826l-53.27969,-53.27969l53.27969,-53.27969c1.69569,-1.64828 2.20555,-4.16851 1.28389,-6.3463c-0.92166,-2.17779 -3.08576,-3.56638 -5.44951,-3.49667z"></path></g></g>
								</svg>
							</div>
							<?php for($y = 0; $y < ceil(($gamesColumnLimit + $offerNumber) / 2); $y++){ ?>
							<!---->
							<!---->
							<span carousel-pagination__page_number="<?php echo $y; ?>" class="carousel-pagination__page <?php if($y == 0){ echo 'is---active'; }  if($y >= ceil(($gamesColumnLimit + $offerNumber) / 4)){ echo 'carousel-pagination__page--lite-screen'; }?>"></span>
							<!---->
							<!---->
							<?php } ?>
							<div class="carousel__nav carousel__nav--right">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M57.27734,22.87734c-2.33303,0.00061 -4.43307,1.41473 -5.31096,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26669l53.27969,53.27969l-53.27969,53.27969c-1.49777,1.43802 -2.10111,3.5734 -1.57733,5.58259c0.52378,2.0092 2.09283,3.57825 4.10203,4.10203c2.0092,0.52378 4.14457,-0.07956 5.58259,-1.57733l57.33333,-57.33333c2.23811,-2.23904 2.23811,-5.86825 0,-8.10729l-57.33333,-57.33333c-1.07942,-1.10959 -2.56162,-1.73559 -4.10963,-1.73568z"></path></g></g>
								</svg>
							</div>
						</div>
					</div>
				</div>
				<!---->
				<!---->
				<div big-thingy-banner="Headup" class="Headup tab-products--tabbed-section">
					<div class="dots-wrapper ng-hide">
						<div class="dots-wrapper_moveTOTOP">
							<span class="dots"></span>
							<span class="dots"></span>
							<span class="dots"></span>
						</div>
					</div>
					<div class="carousel now-on-sale__carousel scrollbar-17 is-ready">
						<div class="_gog-module-slider__items-container carousel__items-container has-product-tiles-and-transform is-visible">
							<div class="js-items-wrapper">
								<div class="tab-products--tab-collection">
									<?php $offerNumber = 1; ?>
									<!---->
									<!---->
									<div big-thingy-banner--offer="Headup" class="js-item_carousel__item--offer js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
										<div class="now-on-sale__banner">
											<a class="big-thingy" href="">
												<div class="big-thingy__logo-wrapper">Headup</div>
												<div class="big-thingy__discount-wrapper">
													<div class="big-thingy__up-to">up to</div>
													<div class="big-thingy__discount">-80%</div>
												</div>
												<div class="big-thingy__bottom-wrapper">
													<div class="giveaway-banner__countdown">00H : 00M : 00S left</div>
													<div class="big-thingy__button">Browse Deals</div>
												</div>
											</a>
										</div>
									</div>
									<!---->
									<!---->
									<?php
										$gamesColumnLimit = 24;
										// collect games title in array
										$collect_games_title = array('');
										for($columnNum = 1; $columnNum <= $gamesColumnLimit; $columnNum++){ ?>
											<!---->
											<!---->
											<div class="js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
												<div class="now-on-sale__banner now-on-sale__banner-no-box-shadow">
													<?php // select games
													$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_offer_up_to_large_discount = ? AND gc_g_type_parent = ? ORDER BY RAND()");
													$select_game_by_id->execute(array("Headup", "games"));
													$fetch_games_by_id = $select_game_by_id->fetchAll();
													// to any changes rowcount > 0
													$have_change_after_fetch = $select_game_by_id->rowcount();

													$columngamesNumEqual2 = 0;
													if($have_change_after_fetch > 0){
														foreach($fetch_games_by_id as $fetch_game_by_id){
															$gc_g_id = $fetch_game_by_id['gc_g_id'];

															// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
															$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
															$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
															$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

															$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
															$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

															$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

															// coming-soon
															$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

															// href of game
															$gc_g_href = $fetch_game_by_id['gc_g_href'];

															$gc_g_title = $fetch_game_by_id['gc_g_title'];

															// flags [ soon, indev ]
															$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
															$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

															// gc_g_type_parent
															$gc_g_type = $fetch_game_by_id['gc_g_type'];
															$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

															// operating system [ windows - mac - linux ]
															$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
															$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
															$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

															// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
															$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
															$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
															$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];

															for($arrayTitle = 0; $arrayTitle < count($collect_games_title); $arrayTitle++){
																if($gc_g_title == $collect_games_title[$arrayTitle]){ $true_false_return = "true"; break; }
																else{ $true_false_return = "false"; }
															}

															if($true_false_return == "false"){
																$columngamesNumEqual2+=1;
																// push title to array
																array_push($collect_games_title, $gc_g_title); ?>
																<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																			gc_g_title="<?php echo $gc_g_title; ?>"
																			gc_g_incart="<?php echo $gc_g_incart; ?>"
																			gc_g_type="<?php echo $gc_g_type; ?>"
																			gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																			gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																			class="product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
																	<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
																		<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
																		<div class="product-tile__cover has-image">
																			<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
																			<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
																				<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																									<?php if($have_change_after_select_user > 0){
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} else {
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} ?>">
																					<svg class="option-icon option-icon-full">
																						<use xlink:href="#checkbox-multi">
																							<symbol viewBox="0 0 17 17" id="checkbox-multi">
																									<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																							</symbol>
																						</use>
																					</svg>
																					In library
																				</span>
																				<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
																					<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
										                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
										                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
										                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
										                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
																					</svg>
																					in cart
																				</span>
																				<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																							<?php if($have_change_after_select_user > 0){
																											if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										} else {
																											if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										}
																											?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
																					</svg>
																					soon
																				</span>
																				<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
																					</svg>
																					wishlisted
																				</span>
																			</div>
																		</div>
																		<div class="product-tile__info">
																			<div class="product-tile__platforms">
																				<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
																					<span class="product_isGame">
																						<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
																					</span>
																				</div>
																				<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
																					<span class="product-tile__movie-slug">movie</span>
																				</div>
																			</div>
																			<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
																				<div class="product-tile__prices">
																					<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
																						<span class="menu-product__discount-text">
																							<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																							%
																						</span>
																					</div>
																					<div class="product-tile__prices-inner">
																						<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
																						<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
																						<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
																					</div>
																				</div>
																				<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																							href="<?php echo $gc_g_href; ?>"
																							gc_g_title="<?php echo $gc_g_title; ?>"
																							gc_g_incart="<?php echo $gc_g_incart; ?>"
																							gc_g_type="<?php echo $gc_g_type; ?>"
																							gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																							gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																							gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																							gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																							gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																							class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																							</svg>
																				</div>
																			</div>
																			<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
																			<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
																		</div>
																	</a>
																</div>
															<?php } ?>
														<?php if($columngamesNumEqual2 == 2){ break; }
															} } ?>
												</div>
											</div>
										<?php } ?>
									<!---->
									<!---->
								</div>
							</div>
						</div>
						<div class="carousel-pagination big-arrows">
							<div class="carousel__nav carousel__nav--left">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M114.55469,22.87734c-1.48951,0.04438 -2.90324,0.6669 -3.94167,1.73568l-57.33333,57.33333c-2.23811,2.23904 -2.23811,5.86825 0,8.10729l57.33333,57.33333c1.43802,1.49778 3.5734,2.10113 5.5826,1.57735c2.0092,-0.52378 3.57826,-2.09284 4.10204,-4.10204c0.52378,-2.0092 -0.07957,-4.14458 -1.57735,-5.5826l-53.27969,-53.27969l53.27969,-53.27969c1.69569,-1.64828 2.20555,-4.16851 1.28389,-6.3463c-0.92166,-2.17779 -3.08576,-3.56638 -5.44951,-3.49667z"></path></g></g>
								</svg>
							</div>
							<?php for($y = 0; $y < ceil(($gamesColumnLimit + $offerNumber) / 2); $y++){ ?>
							<!---->
							<!---->
							<span carousel-pagination__page_number="<?php echo $y; ?>" class="carousel-pagination__page <?php if($y == 0){ echo 'is---active'; } if($y >= ceil(($gamesColumnLimit + $offerNumber) / 4)){ echo 'carousel-pagination__page--lite-screen'; } ?>"></span>
							<!---->
							<!---->
							<?php } ?>
							<div class="carousel__nav carousel__nav--right">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M57.27734,22.87734c-2.33303,0.00061 -4.43307,1.41473 -5.31096,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26669l53.27969,53.27969l-53.27969,53.27969c-1.49777,1.43802 -2.10111,3.5734 -1.57733,5.58259c0.52378,2.0092 2.09283,3.57825 4.10203,4.10203c2.0092,0.52378 4.14457,-0.07956 5.58259,-1.57733l57.33333,-57.33333c2.23811,-2.23904 2.23811,-5.86825 0,-8.10729l-57.33333,-57.33333c-1.07942,-1.10959 -2.56162,-1.73559 -4.10963,-1.73568z"></path></g></g>
								</svg>
							</div>
						</div>
					</div>
				</div>
				<!---->
				<!---->
				<div big-thingy-banner="Weekly_Sale" class="Weekly_Sale tab-products--tabbed-section">
					<div class="dots-wrapper ng-hide">
						<div class="dots-wrapper_moveTOTOP">
							<span class="dots"></span>
							<span class="dots"></span>
							<span class="dots"></span>
						</div>
					</div>
					<div class="carousel now-on-sale__carousel scrollbar-17 is-ready">
						<div class="_gog-module-slider__items-container carousel__items-container has-product-tiles-and-transform is-visible">
							<div class="js-items-wrapper">
								<div class="tab-products--tab-collection">
									<?php $offerNumber = 1; ?>
									<!---->
									<!---->
									<div big-thingy-banner--offer="Weekly_Sale" class="js-item_carousel__item--offer js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
										<div class="now-on-sale__banner">
											<a class="big-thingy" href="">
												<div class="big-thingy__logo-wrapper">Weekly_Sale</div>
												<div class="big-thingy__discount-wrapper">
													<div class="big-thingy__up-to">up to</div>
													<div class="big-thingy__discount">-90%</div>
												</div>
												<div class="big-thingy__bottom-wrapper">
													<div class="giveaway-banner__countdown">00H : 00M : 00S left</div>
													<div class="big-thingy__button">Browse Deals</div>
												</div>
											</a>
										</div>
									</div>
									<!---->
									<!---->
									<?php
										$gamesColumnLimit = 36;
										// collect games title in array
										$collect_games_title = array('');
										for($columnNum = 1; $columnNum <= $gamesColumnLimit; $columnNum++){ ?>
											<!---->
											<!---->
											<div class="js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
												<div class="now-on-sale__banner now-on-sale__banner-no-box-shadow">
													<?php // select games
													$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_offer_up_to_large_discount = ? AND gc_g_type_parent = ? ORDER BY RAND()");
													$select_game_by_id->execute(array("Weekly_Sale", "games"));
													$fetch_games_by_id = $select_game_by_id->fetchAll();
													// to any changes rowcount > 0
													$have_change_after_fetch = $select_game_by_id->rowcount();

													$columngamesNumEqual2 = 0;
													if($have_change_after_fetch > 0){
														foreach($fetch_games_by_id as $fetch_game_by_id){
															$gc_g_id = $fetch_game_by_id['gc_g_id'];

															// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
															$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
															$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
															$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

															$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
															$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

															$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

															// coming-soon
															$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

															// href of game
															$gc_g_href = $fetch_game_by_id['gc_g_href'];

															$gc_g_title = $fetch_game_by_id['gc_g_title'];

															// flags [ soon, indev ]
															$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
															$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

															// gc_g_type_parent
															$gc_g_type = $fetch_game_by_id['gc_g_type'];
															$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

															// operating system [ windows - mac - linux ]
															$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
															$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
															$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

															// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
															$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
															$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
															$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];

															for($arrayTitle = 0; $arrayTitle < count($collect_games_title); $arrayTitle++){
																if($gc_g_title == $collect_games_title[$arrayTitle]){ $true_false_return = "true"; break; }
																else{ $true_false_return = "false"; }
															}

															if($true_false_return == "false"){
																$columngamesNumEqual2+=1;
																// push title to array
																array_push($collect_games_title, $gc_g_title); ?>
																<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																			gc_g_title="<?php echo $gc_g_title; ?>"
																			gc_g_incart="<?php echo $gc_g_incart; ?>"
																			gc_g_type="<?php echo $gc_g_type; ?>"
																			gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																			gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																			class="product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
																	<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
																		<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
																		<div class="product-tile__cover has-image">
																			<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
																			<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
																				<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																									<?php if($have_change_after_select_user > 0){
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} else {
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} ?>">
																					<svg class="option-icon option-icon-full">
																						<use xlink:href="#checkbox-multi">
																							<symbol viewBox="0 0 17 17" id="checkbox-multi">
																									<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																							</symbol>
																						</use>
																					</svg>
																					In library
																				</span>
																				<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
																					<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
										                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
										                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
										                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
										                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
																					</svg>
																					in cart
																				</span>
																				<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																							<?php if($have_change_after_select_user > 0){
																											if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										} else {
																											if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										}
																											?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
																					</svg>
																					soon
																				</span>
																				<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
																					</svg>
																					wishlisted
																				</span>
																			</div>
																		</div>
																		<div class="product-tile__info">
																			<div class="product-tile__platforms">
																				<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
																					<span class="product_isGame">
																						<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
																					</span>
																				</div>
																				<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
																					<span class="product-tile__movie-slug">movie</span>
																				</div>
																			</div>
																			<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
																				<div class="product-tile__prices">
																					<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
																						<span class="menu-product__discount-text">
																							<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																							%
																						</span>
																					</div>
																					<div class="product-tile__prices-inner">
																						<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
																						<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
																						<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
																					</div>
																				</div>
																				<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																							href="<?php echo $gc_g_href; ?>"
																							gc_g_title="<?php echo $gc_g_title; ?>"
																							gc_g_incart="<?php echo $gc_g_incart; ?>"
																							gc_g_type="<?php echo $gc_g_type; ?>"
																							gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																							gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																							gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																							gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																							gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																							class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																							</svg>
																				</div>
																			</div>
																			<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
																			<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
																		</div>
																	</a>
																</div>
															<?php } ?>
														<?php if($columngamesNumEqual2 == 2){ break; }
															} } ?>
												</div>
											</div>
										<?php } ?>
									<!---->
									<!---->
								</div>
							</div>
						</div>
						<div class="carousel-pagination big-arrows">
							<div class="carousel__nav carousel__nav--left">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M114.55469,22.87734c-1.48951,0.04438 -2.90324,0.6669 -3.94167,1.73568l-57.33333,57.33333c-2.23811,2.23904 -2.23811,5.86825 0,8.10729l57.33333,57.33333c1.43802,1.49778 3.5734,2.10113 5.5826,1.57735c2.0092,-0.52378 3.57826,-2.09284 4.10204,-4.10204c0.52378,-2.0092 -0.07957,-4.14458 -1.57735,-5.5826l-53.27969,-53.27969l53.27969,-53.27969c1.69569,-1.64828 2.20555,-4.16851 1.28389,-6.3463c-0.92166,-2.17779 -3.08576,-3.56638 -5.44951,-3.49667z"></path></g></g>
								</svg>
							</div>
							<?php for($y = 0; $y < ceil(($gamesColumnLimit + $offerNumber) / 2); $y++){ ?>
							<!---->
							<!---->
							<span carousel-pagination__page_number="<?php echo $y; ?>" class="carousel-pagination__page <?php if($y == 0){ echo 'is---active'; } if($y >= ceil(($gamesColumnLimit + $offerNumber) / 4)){ echo 'carousel-pagination__page--lite-screen'; } ?>"></span>
							<!---->
							<!---->
							<?php } ?>
							<div class="carousel__nav carousel__nav--right">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M57.27734,22.87734c-2.33303,0.00061 -4.43307,1.41473 -5.31096,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26669l53.27969,53.27969l-53.27969,53.27969c-1.49777,1.43802 -2.10111,3.5734 -1.57733,5.58259c0.52378,2.0092 2.09283,3.57825 4.10203,4.10203c2.0092,0.52378 4.14457,-0.07956 5.58259,-1.57733l57.33333,-57.33333c2.23811,-2.23904 2.23811,-5.86825 0,-8.10729l-57.33333,-57.33333c-1.07942,-1.10959 -2.56162,-1.73559 -4.10963,-1.73568z"></path></g></g>
								</svg>
							</div>
						</div>
					</div>
				</div>
				<!---->
				<!---->
				<div big-thingy-banner="Bethesda" class="Bethesda tab-products--tabbed-section">
					<div class="dots-wrapper ng-hide">
						<div class="dots-wrapper_moveTOTOP">
							<span class="dots"></span>
							<span class="dots"></span>
							<span class="dots"></span>
						</div>
					</div>
					<div class="carousel now-on-sale__carousel scrollbar-17 is-ready">
						<div class="_gog-module-slider__items-container carousel__items-container has-product-tiles-and-transform is-visible">
							<div class="js-items-wrapper">
								<div class="tab-products--tab-collection">
									<?php $offerNumber = 1; ?>
									<!---->
									<!---->
									<div big-thingy-banner--offer="Bethesda" class="js-item_carousel__item--offer js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
										<div class="now-on-sale__banner">
											<a class="big-thingy" href="">
												<div class="big-thingy__logo-wrapper">Bethesda</div>
												<div class="big-thingy__discount-wrapper">
													<div class="big-thingy__up-to">up to</div>
													<div class="big-thingy__discount">-80%</div>
												</div>
												<div class="big-thingy__bottom-wrapper">
													<div class="giveaway-banner__countdown">00H : 00M : 00S left</div>
													<div class="big-thingy__button">Browse Deals</div>
												</div>
											</a>
										</div>
									</div>
									<!---->
									<!---->
									<?php
										$gamesColumnLimit = 19;
										// collect games title in array
										$collect_games_title = array('');
										for($columnNum = 1; $columnNum <= $gamesColumnLimit; $columnNum++){ ?>
											<!---->
											<!---->
											<div class="js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
												<div class="now-on-sale__banner now-on-sale__banner-no-box-shadow">
													<?php // select games
													$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_offer_up_to_large_discount = ? AND gc_g_type_parent = ? ORDER BY RAND()");
													$select_game_by_id->execute(array("Bethesda", "games"));
													$fetch_games_by_id = $select_game_by_id->fetchAll();
													// to any changes rowcount > 0
													$have_change_after_fetch = $select_game_by_id->rowcount();

													$columngamesNumEqual2 = 0;
													if($have_change_after_fetch > 0){
														foreach($fetch_games_by_id as $fetch_game_by_id){
															$gc_g_id = $fetch_game_by_id['gc_g_id'];

															// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
															$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
															$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
															$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

															$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
															$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

															$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

															// coming-soon
															$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

															// href of game
															$gc_g_href = $fetch_game_by_id['gc_g_href'];

															$gc_g_title = $fetch_game_by_id['gc_g_title'];

															// flags [ soon, indev ]
															$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
															$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

															// gc_g_type_parent
															$gc_g_type = $fetch_game_by_id['gc_g_type'];
															$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

															// operating system [ windows - mac - linux ]
															$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
															$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
															$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

															// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
															$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
															$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
															$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];

															for($arrayTitle = 0; $arrayTitle < count($collect_games_title); $arrayTitle++){
																if($gc_g_title == $collect_games_title[$arrayTitle]){ $true_false_return = "true"; break; }
																else{ $true_false_return = "false"; }
															}

															if($true_false_return == "false"){
																$columngamesNumEqual2+=1;
																// push title to array
																array_push($collect_games_title, $gc_g_title); ?>
																<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																			gc_g_title="<?php echo $gc_g_title; ?>"
																			gc_g_incart="<?php echo $gc_g_incart; ?>"
																			gc_g_type="<?php echo $gc_g_type; ?>"
																			gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																			gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																			class="product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
																	<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
																		<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
																		<div class="product-tile__cover has-image">
																			<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
																			<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
																				<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																									<?php if($have_change_after_select_user > 0){
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} else {
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} ?>">
																					<svg class="option-icon option-icon-full">
																						<use xlink:href="#checkbox-multi">
																							<symbol viewBox="0 0 17 17" id="checkbox-multi">
																									<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																							</symbol>
																						</use>
																					</svg>
																					In library
																				</span>
																				<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
																					<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
										                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
										                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
										                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
										                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
																					</svg>
																					in cart
																				</span>
																				<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																							<?php if($have_change_after_select_user > 0){
																											if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										} else {
																											if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										}
																											?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
																					</svg>
																					soon
																				</span>
																				<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
																					</svg>
																					wishlisted
																				</span>
																			</div>
																		</div>
																		<div class="product-tile__info">
																			<div class="product-tile__platforms">
																				<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
																					<span class="product_isGame">
																						<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
																					</span>
																				</div>
																				<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
																					<span class="product-tile__movie-slug">movie</span>
																				</div>
																			</div>
																			<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
																				<div class="product-tile__prices">
																					<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
																						<span class="menu-product__discount-text">
																							<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																							%
																						</span>
																					</div>
																					<div class="product-tile__prices-inner">
																						<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
																						<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
																						<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
																					</div>
																				</div>
																				<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																							href="<?php echo $gc_g_href; ?>"
																							gc_g_title="<?php echo $gc_g_title; ?>"
																							gc_g_incart="<?php echo $gc_g_incart; ?>"
																							gc_g_type="<?php echo $gc_g_type; ?>"
																							gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																							gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																							gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																							gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																							gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																							class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																							</svg>
																				</div>
																			</div>
																			<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
																			<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
																		</div>
																	</a>
																</div>
															<?php } ?>
														<?php if($columngamesNumEqual2 == 2){ break; }
															} } ?>
												</div>
											</div>
										<?php } ?>
									<!---->
									<!---->
								</div>
							</div>
						</div>
						<div class="carousel-pagination big-arrows">
							<div class="carousel__nav carousel__nav--left">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M114.55469,22.87734c-1.48951,0.04438 -2.90324,0.6669 -3.94167,1.73568l-57.33333,57.33333c-2.23811,2.23904 -2.23811,5.86825 0,8.10729l57.33333,57.33333c1.43802,1.49778 3.5734,2.10113 5.5826,1.57735c2.0092,-0.52378 3.57826,-2.09284 4.10204,-4.10204c0.52378,-2.0092 -0.07957,-4.14458 -1.57735,-5.5826l-53.27969,-53.27969l53.27969,-53.27969c1.69569,-1.64828 2.20555,-4.16851 1.28389,-6.3463c-0.92166,-2.17779 -3.08576,-3.56638 -5.44951,-3.49667z"></path></g></g>
								</svg>
							</div>
							<?php for($y = 0; $y < ceil(($gamesColumnLimit + $offerNumber) / 2); $y++){ ?>
							<!---->
							<!---->
							<span carousel-pagination__page_number="<?php echo $y; ?>" class="carousel-pagination__page <?php if($y == 0){ echo 'is---active'; } if($y >= ceil(($gamesColumnLimit + $offerNumber) / 4)){ echo 'carousel-pagination__page--lite-screen'; } ?>"></span>
							<!---->
							<!---->
							<?php } ?>
							<div class="carousel__nav carousel__nav--right">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M57.27734,22.87734c-2.33303,0.00061 -4.43307,1.41473 -5.31096,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26669l53.27969,53.27969l-53.27969,53.27969c-1.49777,1.43802 -2.10111,3.5734 -1.57733,5.58259c0.52378,2.0092 2.09283,3.57825 4.10203,4.10203c2.0092,0.52378 4.14457,-0.07956 5.58259,-1.57733l57.33333,-57.33333c2.23811,-2.23904 2.23811,-5.86825 0,-8.10729l-57.33333,-57.33333c-1.07942,-1.10959 -2.56162,-1.73559 -4.10963,-1.73568z"></path></g></g>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!---->
		<!---->
		<div class="afbf51a-f74b-11ea-bf0c-fa163e4fd1eb">
			<a href="" class="regular-banner-wrapper">
				<picture class="lazy">
					<source media="(max-width:375px)" srcset="https://images.gog.com/a0cc651ad927b3ec42765bfd5d83907aedc109ee48f8c9f8aa6b956d269010c4.jpg, https://images.gog.com/b713ce65a1773b1dd533ca3d3ec8c7c04daf4a9c52a2bad2b7d8ab7ee398ec63.jpg 2x"><source media="(max-width:1023px)" srcset="https://images.gog.com/8ec5a82639579f5c82d1d02a23966c9d63f7f342ccc4b502432bebffa30da8d1.jpg, https://images.gog.com/812cf7ec9c323cc7a771ca776d690a2b61fb26064ebf78ae36386d0ddf635fef.jpg 2x"><source media="(min-width:1024px)" srcset="https://images.gog.com/70b6104783207b5ff5b87dfc118dde3c89e8e403b1b87c0208de1bac8a377c71.jpg, https://images.gog.com/3bf7af4a1933ff8c469e01a5de448b890222f2416299f46537cc501580b22cc9.jpg 2x"><img class="regular-banner__background" src="">
				</picture>
				<div class="regular-banner__content">
					<div class="regular-banner__text">
						<div class="regular-banner__text-title">Get Children of Morta with Visa</div>
						<div class="regular-banner__text-subtitle">More info and promo terms on www.gog.com/visa</div>
					</div>
					<div class="regular-banner__body">
						<div class="regular-banner__button-wrapper">Check more</div>
					</div>
				</div>
			</a>
		</div>
		<!---->
		<!---->
		<div class="staff_pics js--tabbed-section--for-transform" numberOfGamesInOneTab="1">
			<div class="tabbed-section staff_pics__content">
				<!---->
				<!---->
				<div class="tabbed-section__head staff_pics__title js-head">
					<div class="section-title_inside js-section-title tabbed-section__title">
						<div class="section-title__icon-wrapper">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#404040"><path d="M106.96985,8.82886c-3.7541,-0.22046 -7.43104,1.01306 -10.3537,3.53259l-6.3172,5.375c-2.55313,2.15 -6.18125,2.15 -8.73437,0l-6.31458,-5.375c-3.7625,-3.225 -9.1375,-4.3 -14.10937,-2.6875c-4.97188,1.6125 -8.60105,5.5099 -9.81042,10.61615l-1.87915,8.0625c-0.80625,3.225 -3.76407,5.37605 -6.98907,5.1073l-8.19635,-0.67187c-5.10625,-0.40313 -10.07917,1.88125 -13.1698,6.04688c-3.09062,4.16562 -3.62655,9.53957 -1.7453,14.37707l3.08905,7.66095c1.20938,3.09062 0.13438,6.58333 -2.6875,8.3302l-6.98645,4.29895c-4.43437,2.6875 -6.98645,7.39115 -6.98645,12.63177c0,5.24063 2.68645,9.81043 6.98645,12.49793l6.98645,4.29895c2.82188,1.74688 3.89688,5.2422 2.6875,8.33282l-3.08905,7.65833c-2.01562,4.8375 -1.34532,10.21145 1.7453,14.37708c3.09062,4.16563 7.92917,6.45 13.1698,6.04688l8.19635,-0.67187c3.35938,-0.26875 6.3172,1.8823 6.98907,5.1073l1.87915,8.0625c1.20937,4.97188 4.83855,9.00365 9.81042,10.61615c1.47812,0.5375 3.09115,0.67188 4.56928,0.67188c3.49375,0 6.8526,-1.20885 9.5401,-3.49323l6.31458,-5.375c2.55312,-2.15 6.18125,-2.15 8.73438,0l6.3172,5.375c3.89688,3.35938 9.27188,4.43385 14.10938,2.82135c4.97187,-1.6125 8.59843,-5.5099 9.8078,-10.61615l1.88177,-8.0625c0.80625,-3.225 3.76407,-5.37605 6.98907,-5.1073l8.19635,0.67188c5.10625,0.40312 10.07655,-1.88125 13.16718,-6.04688c3.09062,-4.16563 3.62917,-9.53958 1.74792,-14.37708l-3.09167,-7.65833c-1.20937,-3.09062 -0.13438,-6.58595 2.6875,-8.33282l6.98907,-4.29895c4.43437,-2.6875 6.98645,-7.39115 6.98645,-12.63178c0,-5.24062 -2.68645,-9.94428 -6.98645,-12.63178l-6.98907,-4.29895c-2.82188,-1.74688 -3.89687,-5.2422 -2.6875,-8.33282l3.09167,-7.65833c2.01563,-4.8375 1.3427,-10.21145 -1.74792,-14.37708c-3.09062,-4.16562 -7.92655,-6.45 -13.16718,-6.04687l-8.19635,0.67188c-3.35937,0.26875 -6.3172,-1.8823 -6.98907,-5.1073l-1.88177,-8.0625c-1.20938,-4.97187 -4.83593,-9.00365 -9.8078,-10.61615c-1.24297,-0.40313 -2.50431,-0.63776 -3.75568,-0.71124zM68.53125,56.4375c6.71875,0 12.09375,5.375 12.09375,12.09375c0,6.71875 -5.375,12.09375 -12.09375,12.09375c-6.71875,0 -12.09375,-5.375 -12.09375,-12.09375c0,-6.71875 5.375,-12.09375 12.09375,-12.09375zM105.97253,59.10925c1.02461,-0.08398 2.06497,0.21626 2.87122,0.95532c1.6125,1.47812 1.8823,4.03282 0.40417,5.64532l-29.5625,33.4599c-0.80625,0.94063 -1.8823,1.34375 -3.09167,1.34375c-0.94062,0 -1.88125,-0.2698 -2.6875,-1.07605c-1.6125,-1.47812 -1.8823,-4.0302 -0.40417,-5.6427l29.69897,-33.32605c0.73906,-0.80625 1.74688,-1.27551 2.77148,-1.3595zM68.53125,64.5c-2.2264,0 -4.03125,1.80485 -4.03125,4.03125c0,2.2264 1.80485,4.03125 4.03125,4.03125c2.2264,0 4.03125,-1.80485 4.03125,-4.03125c0,-2.2264 -1.80485,-4.03125 -4.03125,-4.03125zM103.46875,91.375c6.71875,0 12.09375,5.375 12.09375,12.09375c0,6.71875 -5.375,12.09375 -12.09375,12.09375c-6.71875,0 -12.09375,-5.375 -12.09375,-12.09375c0,-6.71875 5.375,-12.09375 12.09375,-12.09375zM103.46875,99.4375c-2.2264,0 -4.03125,1.80485 -4.03125,4.03125c0,2.2264 1.80485,4.03125 4.03125,4.03125c2.2264,0 4.03125,-1.80485 4.03125,-4.03125c0,-2.2264 -1.80485,-4.03125 -4.03125,-4.03125zM65.84375,104.8125c2.28437,0 4.03125,1.74688 4.03125,4.03125c0,2.28437 -1.74688,4.03125 -4.03125,4.03125c-2.28438,0 -4.03125,-1.74688 -4.03125,-4.03125c0,-2.28437 1.74687,-4.03125 4.03125,-4.03125z"></path></g></g>
							</svg>
						</div>
						<div class="section-title__title-wrapper">GOG.COM staff picks</div>
					</div>
				</div>
				<!---->
				<!---->
				<div class="tab-products--tabbed-section"  big-thingy-banner="staff_pics">
					<div class="carousel now-on-sale__carousel scrollbar-17 is-ready">
						<div class="_gog-module-slider__items-container carousel__items-container has-product-tiles-and-transform is-visible">
							<div class="js-items-wrapper">
								<div class="tab-products--tab-collection">
									<?php $offerNumber = 0; ?>
									<!---->
									<!---->
									<?php
										$gamesColumnLimit = 5;
										// collect games title in array
										$collect_games_title = array('');
										for($columnNum = 1; $columnNum <= $gamesColumnLimit; $columnNum++){ ?>
											<!---->
											<!---->
											<div class="js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
												<div class="now-on-sale__banner now-on-sale__banner-no-box-shadow">
													<?php // select games
													$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? ORDER BY RAND()");
													$select_game_by_id->execute(array("movies_for_gamers"));
													$fetch_games_by_id = $select_game_by_id->fetchAll();
													// to any changes rowcount > 0
													$have_change_after_fetch = $select_game_by_id->rowcount();

													$columngamesNumEqual2 = 0;
													if($have_change_after_fetch > 0){
														foreach($fetch_games_by_id as $fetch_game_by_id){
															$gc_g_id = $fetch_game_by_id['gc_g_id'];

															// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
															$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
															$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
															$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

															$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
															$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

															$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

															// coming-soon
															$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

															// href of game
															$gc_g_href = $fetch_game_by_id['gc_g_href'];

															$gc_g_title = $fetch_game_by_id['gc_g_title'];

															// flags [ soon, indev ]
															$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
															$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

															// gc_g_type_parent
															$gc_g_type = $fetch_game_by_id['gc_g_type'];
															$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

															// operating system [ windows - mac - linux ]
															$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
															$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
															$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

															// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
															$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
															$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
															$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];

															for($arrayTitle = 0; $arrayTitle < count($collect_games_title); $arrayTitle++){
																if($gc_g_title == $collect_games_title[$arrayTitle]){ $true_false_return = "true"; break; }
																else{ $true_false_return = "false"; }
															}

															if($true_false_return == "false"){
																$columngamesNumEqual2+=1;
																// push title to array
																array_push($collect_games_title, $gc_g_title); ?>
																<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																			gc_g_title="<?php echo $gc_g_title; ?>"
																			gc_g_incart="<?php echo $gc_g_incart; ?>"
																			gc_g_type="<?php echo $gc_g_type; ?>"
																			gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																			gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																			class="product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
																	<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
																		<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
																		<div class="product-tile__cover has-image">
																			<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
																			<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
																				<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																									<?php if($have_change_after_select_user > 0){
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} else {
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} ?>">
																					<svg class="option-icon option-icon-full">
																						<use xlink:href="#checkbox-multi">
																							<symbol viewBox="0 0 17 17" id="checkbox-multi">
																									<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																							</symbol>
																						</use>
																					</svg>
																					In library
																				</span>
																				<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
																					<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
										                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
										                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
										                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
										                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
																					</svg>
																					in cart
																				</span>
																				<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																							<?php if($have_change_after_select_user > 0){
																											if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										} else {
																											if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										}
																											?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
																					</svg>
																					soon
																				</span>
																				<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
																					</svg>
																					wishlisted
																				</span>
																			</div>
																		</div>
																		<div class="product-tile__info">
																			<div class="product-tile__platforms">
																				<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
																					<span class="product_isGame">
																						<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
																					</span>
																				</div>
																				<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
																					<span class="product-tile__movie-slug">movie</span>
																				</div>
																			</div>
																			<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
																				<div class="product-tile__prices">
																					<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
																						<span class="menu-product__discount-text">
																							<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																							%
																						</span>
																					</div>
																					<div class="product-tile__prices-inner">
																						<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
																						<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
																						<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
																					</div>
																				</div>
																				<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																							href="<?php echo $gc_g_href; ?>"
																							gc_g_title="<?php echo $gc_g_title; ?>"
																							gc_g_incart="<?php echo $gc_g_incart; ?>"
																							gc_g_type="<?php echo $gc_g_type; ?>"
																							gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																							gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																							gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																							gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																							gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																							class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																							</svg>
																				</div>
																			</div>
																			<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
																			<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
																		</div>
																	</a>
																</div>
															<?php } ?>
														<?php if($columngamesNumEqual2 == 12){ break; }
															} } ?>
												</div>
											</div>
										<?php } ?>
									<!---->
									<!---->
								</div>
							</div>
						</div>
						<div class="carousel-pagination big-arrows">
							<div class="carousel__nav carousel__nav--left">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M114.55469,22.87734c-1.48951,0.04438 -2.90324,0.6669 -3.94167,1.73568l-57.33333,57.33333c-2.23811,2.23904 -2.23811,5.86825 0,8.10729l57.33333,57.33333c1.43802,1.49778 3.5734,2.10113 5.5826,1.57735c2.0092,-0.52378 3.57826,-2.09284 4.10204,-4.10204c0.52378,-2.0092 -0.07957,-4.14458 -1.57735,-5.5826l-53.27969,-53.27969l53.27969,-53.27969c1.69569,-1.64828 2.20555,-4.16851 1.28389,-6.3463c-0.92166,-2.17779 -3.08576,-3.56638 -5.44951,-3.49667z"></path></g></g>
								</svg>
							</div>
							<?php for($y = 0; $y < ceil(($gamesColumnLimit + $offerNumber) / 1); $y++){ ?>
							<!---->
							<!---->
							<span carousel-pagination__page_number="<?php echo $y; ?>" class="carousel-pagination__page <?php if($y == 0){ echo 'is---active'; } ?>"></span>
							<!---->
							<!---->
							<?php } ?>
							<div class="carousel__nav carousel__nav--right">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M57.27734,22.87734c-2.33303,0.00061 -4.43307,1.41473 -5.31096,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26669l53.27969,53.27969l-53.27969,53.27969c-1.49777,1.43802 -2.10111,3.5734 -1.57733,5.58259c0.52378,2.0092 2.09283,3.57825 4.10203,4.10203c2.0092,0.52378 4.14457,-0.07956 5.58259,-1.57733l57.33333,-57.33333c2.23811,-2.23904 2.23811,-5.86825 0,-8.10729l-57.33333,-57.33333c-1.07942,-1.10959 -2.56162,-1.73559 -4.10963,-1.73568z"></path></g></g>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!---->
		<!---->
		<div class="whats_good js--tabbed-section--for-transform" numberOfGamesInOneTab="1">
			<div class="tabbed-section whats_good__content">
				<!---->
				<!---->
				<div class="tabbed-section__head whats_good__title js-head">
					<div class="section-title_inside js-section-title tabbed-section__title">
						<div class="section-title__icon-wrapper">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#404040"><path d="M92.794,20.10967l19.05617,38.614l42.613,6.192c6.2135,0.903 8.70033,8.54267 4.19967,12.92867l-30.83817,30.057l7.28133,42.441c1.06067,6.192 -5.43233,10.90767 -10.99367,7.99083l-38.11233,-20.038l-38.11233,20.038c-5.56133,2.924 -12.05433,-1.79883 -10.99367,-7.99083l7.28133,-42.441l-30.84533,-30.057c-4.4935,-4.386 -2.01383,-12.0185 4.19967,-12.9215l42.613,-6.192l19.05617,-38.614c2.78783,-5.64017 10.8145,-5.64017 13.59517,-0.00717z"></path></g></g>
							</svg>
						</div>
						<div class="section-title__title-wrapper">What's good ?</div>
					</div>
				</div>
				<!---->
				<!---->
				<div class="tab-products--tabbed-section"  big-thingy-banner="whats_good">
					<div class="carousel now-on-sale__carousel scrollbar-17 is-ready">
						<div class="_gog-module-slider__items-container carousel__items-container has-product-tiles-and-transform is-visible">
							<div class="js-items-wrapper">
								<div class="tab-products--tab-collection">
									<?php $offerNumber = 0; ?>
									<!---->
									<!---->
									<?php
										$gamesColumnLimit = 5;
										// collect games title in array
										$collect_games_title = array('');
										for($columnNum = 1; $columnNum <= $gamesColumnLimit; $columnNum++){ ?>
											<!---->
											<!---->
											<div class="js-item carousel__item now-on-sale__group now-on-sale__group--with-banner">
												<div class="now-on-sale__banner now-on-sale__banner-no-box-shadow">
													<?php // select games
													$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? ORDER BY RAND()");
													$select_game_by_id->execute(array("games"));
													$fetch_games_by_id = $select_game_by_id->fetchAll();
													// to any changes rowcount > 0
													$have_change_after_fetch = $select_game_by_id->rowcount();

													$columngamesNumEqual2 = 0;
													if($have_change_after_fetch > 0){
														foreach($fetch_games_by_id as $fetch_game_by_id){
															$gc_g_id = $fetch_game_by_id['gc_g_id'];

															// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
															$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
															$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
															$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

															$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
															$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

															$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

															// coming-soon
															$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

															// href of game
															$gc_g_href = $fetch_game_by_id['gc_g_href'];

															$gc_g_title = $fetch_game_by_id['gc_g_title'];

															// flags [ soon, indev ]
															$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
															$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

															// gc_g_type_parent
															$gc_g_type = $fetch_game_by_id['gc_g_type'];
															$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

															// operating system [ windows - mac - linux ]
															$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
															$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
															$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

															// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
															$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
															$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
															$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];

															for($arrayTitle = 0; $arrayTitle < count($collect_games_title); $arrayTitle++){
																if($gc_g_title == $collect_games_title[$arrayTitle]){ $true_false_return = "true"; break; }
																else{ $true_false_return = "false"; }
															}

															if($true_false_return == "false"){
																$columngamesNumEqual2+=1;
																// push title to array
																array_push($collect_games_title, $gc_g_title); ?>
																<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																			gc_g_title="<?php echo $gc_g_title; ?>"
																			gc_g_incart="<?php echo $gc_g_incart; ?>"
																			gc_g_type="<?php echo $gc_g_type; ?>"
																			gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																			gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																			class="product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
																	<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
																		<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
																		<div class="product-tile__cover has-image">
																			<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
																			<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
																				<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																									<?php if($have_change_after_select_user > 0){
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} else {
																													if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																												} ?>">
																					<svg class="option-icon option-icon-full">
																						<use xlink:href="#checkbox-multi">
																							<symbol viewBox="0 0 17 17" id="checkbox-multi">
																									<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																							</symbol>
																						</use>
																					</svg>
																					In library
																				</span>
																				<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
																					<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
										                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
										                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
										                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
										                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
																					</svg>
																					in cart
																				</span>
																				<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																							<?php if($have_change_after_select_user > 0){
																											if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										} else {
																											if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																										}
																											?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
																					</svg>
																					soon
																				</span>
																				<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
																					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
																					</svg>
																					wishlisted
																				</span>
																			</div>
																		</div>
																		<div class="product-tile__info">
																			<div class="product-tile__platforms">
																				<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
																					<span class="product_isGame">
																						<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
																						<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
																					</span>
																				</div>
																				<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
																					<span class="product-tile__movie-slug">movie</span>
																				</div>
																			</div>
																			<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
																				<div class="product-tile__prices">
																					<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
																						<span class="menu-product__discount-text">
																							<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																							%
																						</span>
																					</div>
																					<div class="product-tile__prices-inner">
																						<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
																						<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
																						<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
																					</div>
																				</div>
																				<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																							href="<?php echo $gc_g_href; ?>"
																							gc_g_title="<?php echo $gc_g_title; ?>"
																							gc_g_incart="<?php echo $gc_g_incart; ?>"
																							gc_g_type="<?php echo $gc_g_type; ?>"
																							gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																							gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																							gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																							gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																							gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																							class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																							</svg>
																				</div>
																			</div>
																			<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
																			<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
																		</div>
																	</a>
																</div>
															<?php } ?>
														<?php if($columngamesNumEqual2 == 5){ break; }
															} } ?>
												</div>
											</div>
										<?php } ?>
									<!---->
									<!---->
								</div>
							</div>
						</div>
						<div class="carousel-pagination big-arrows">
							<div class="carousel__nav carousel__nav--left" numberOfClickedproblem="whats_good">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M114.55469,22.87734c-1.48951,0.04438 -2.90324,0.6669 -3.94167,1.73568l-57.33333,57.33333c-2.23811,2.23904 -2.23811,5.86825 0,8.10729l57.33333,57.33333c1.43802,1.49778 3.5734,2.10113 5.5826,1.57735c2.0092,-0.52378 3.57826,-2.09284 4.10204,-4.10204c0.52378,-2.0092 -0.07957,-4.14458 -1.57735,-5.5826l-53.27969,-53.27969l53.27969,-53.27969c1.69569,-1.64828 2.20555,-4.16851 1.28389,-6.3463c-0.92166,-2.17779 -3.08576,-3.56638 -5.44951,-3.49667z"></path></g></g>
								</svg>
							</div>
							<?php for($y = 0; $y < ceil(($gamesColumnLimit + $offerNumber) / 1); $y++){ ?>
							<!---->
							<!---->
							<span carousel-pagination__page_number="<?php echo $y; ?>" class="carousel-pagination__page <?php if($y == 0){ echo 'is---active'; } ?>"></span>
							<!---->
							<!---->
							<?php } ?>
							<div class="carousel__nav carousel__nav--right">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M57.27734,22.87734c-2.33303,0.00061 -4.43307,1.41473 -5.31096,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26669l53.27969,53.27969l-53.27969,53.27969c-1.49777,1.43802 -2.10111,3.5734 -1.57733,5.58259c0.52378,2.0092 2.09283,3.57825 4.10203,4.10203c2.0092,0.52378 4.14457,-0.07956 5.58259,-1.57733l57.33333,-57.33333c2.23811,-2.23904 2.23811,-5.86825 0,-8.10729l-57.33333,-57.33333c-1.07942,-1.10959 -2.56162,-1.73559 -4.10963,-1.73568z"></path></g></g>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!---->
		<!---->
		<div class="discover_games">
			<div class="tabbed-section discover_games__content container--two-columns">
				<div class="container--two-columns__child--discover-games">
					<!---->
					<div class="tabbed-section__head now-on-sale__title js-head">
						<div class="section-title_inside js-section-title tabbed-section__title">
							<div class="section-title__icon-wrapper">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#404040"><path d="M86,14.33333c-39.5815,0 -71.66667,32.08517 -71.66667,71.66667c0,39.5815 32.08517,71.66667 71.66667,71.66667c39.5815,0 71.66667,-32.08517 71.66667,-71.66667c0,-39.5815 -32.08517,-71.66667 -71.66667,-71.66667zM129,43l-27.30892,58.69108l-58.69108,27.30892l27.30892,-58.69108zM86,78.11947c-4.37167,0 -7.88053,3.50886 -7.88053,7.88053c0,4.37167 3.50886,7.88053 7.88053,7.88053c4.37167,0 7.88053,-3.50886 7.88053,-7.88053c0,-4.37167 -3.50886,-7.88053 -7.88053,-7.88053z"></path></g></g>
								</svg>
							</div>
							<div class="section-title__title-wrapper">Discover Games</div>
						</div>
						<div class="tabs-wrapper tabs-wrapper--select">
							<span class="tabs-wrapper--select--vis">Bestselling</span>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</div>
						<div class="tabs-wrapper tabs-wrapper--inverted tabs-wrapper--shift-breakpoint-1 js-tabs-wrapper">
							<div big-thingy-banner="Bestselling" class="tabbed-section__tab js-section-tab tabbed-section__tab--active">Bestselling</div>
							<div big-thingy-banner="New" class="tabbed-section__tab js-section-tab">New</div>
							<div big-thingy-banner="Upcoming" class="tabbed-section__tab js-section-tab">Upcoming</div>
						</div>
					</div>
					<!---->
					<div big-thingy-banner="Bestselling" class="Bestselling tab-products--tabbed-section now-on-sale__tab-products--visible">
						<!---->
						<?php
							// select games
							$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_comingSoon__gameDiv = ? AND gc_g_type = ? AND gc_g_type_parent = ? ORDER BY RAND() LIMIT 10");
							$select_game_by_id->execute(array("0", "adventure", "games"));
							$fetch_games_by_id = $select_game_by_id->fetchAll();
							// to any changes rowcount > 0
							$have_change_after_fetch = $select_game_by_id->rowcount();

							if($have_change_after_fetch > 0){
								foreach($fetch_games_by_id as $fetch_game_by_id){
									$gc_g_id = $fetch_game_by_id['gc_g_id'];

									// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
									$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
									$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
									$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

									$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
									$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

									$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

									// coming-soon
									$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

									// href of game
									$gc_g_href = $fetch_game_by_id['gc_g_href'];

									$gc_g_title = $fetch_game_by_id['gc_g_title'];

									// flags [ soon, indev ]
									$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
									$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

									// gc_g_type_parent
									$gc_g_type = $fetch_game_by_id['gc_g_type'];
									$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

									// operating system [ windows - mac - linux ]
									$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
									$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
									$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

									// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
									$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
									$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
									$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];
									?>
									<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
												gc_g_title="<?php echo $gc_g_title; ?>"
												gc_g_incart="<?php echo $gc_g_incart; ?>"
												gc_g_type="<?php echo $gc_g_type; ?>"
												gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
												gc_g_price_price="<?php echo $gc_g_price_price; ?>"
												class="product-tile--games--list product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
										<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
											<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
											<div class="product-tile__cover has-image">
												<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
												<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper big-spot__ribbon-wrapper--for-lite-screen">
													<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																		<?php if($have_change_after_select_user > 0){
																						if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					} else {
																						if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					} ?>">
														<svg class="option-icon option-icon-full">
															<use xlink:href="#checkbox-multi">
																<symbol viewBox="0 0 17 17" id="checkbox-multi">
																		<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																</symbol>
															</use>
														</svg>
													</span>
													<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
														<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
			                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
			                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
			                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
			                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
														</svg>
													</span>
													<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																<?php if($have_change_after_select_user > 0){
																				if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																			} else {
																				if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																			}
																				?>">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
														</svg>
													</span>
													<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
														</svg>
													</span>
												</div>
											</div>
											<div class="product-tile__info">
												<div class="product-tile__platforms">
													<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
														<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																			<?php if($have_change_after_select_user > 0){
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} else {
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} ?>">
															<svg class="option-icon option-icon-full">
																<use xlink:href="#checkbox-multi">
																	<symbol viewBox="0 0 17 17" id="checkbox-multi">
																			<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																	</symbol>
																</use>
															</svg>
															In library
														</span>
														<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
															<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
				                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
				                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
				                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
				                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
															</svg>
															in cart
														</span>
														<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																	<?php if($have_change_after_select_user > 0){
																					if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				} else {
																					if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				}
																					?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
															</svg>
															soon
														</span>
														<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
															</svg>
															wishlisted
														</span>
													</div>
													<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
														<span class="product_isGame">
															<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
															<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
															<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
														</span>
													</div>
													<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
														<span class="product-tile__movie-slug">movie</span>
													</div>
												</div>
												<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
													<div class="product-tile__prices">
														<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
															<span class="menu-product__discount-text">
																<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																%
															</span>
														</div>
														<div class="product-tile__prices-inner">
															<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
															<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
															<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
														</div>
													</div>
													<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																href="<?php echo $gc_g_href; ?>"
																gc_g_title="<?php echo $gc_g_title; ?>"
																gc_g_incart="<?php echo $gc_g_incart; ?>"
																gc_g_type="<?php echo $gc_g_type; ?>"
																gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																</svg>
													</div>
												</div>
												<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
												<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
											</div>
										</a>
									</div>
									<?php
								}
							}
						?>
						<!---->
					</div>
					<!---->
					<div big-thingy-banner="New" class="New tab-products--tabbed-section">
						<div class="dots-wrapper ng-hide">
							<div class="dots-wrapper_moveTOTOP">
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
							</div>
						</div>
						<!---->
						<?php
							// select games
							$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_comingSoon__gameDiv = ? AND gc_g_type_parent = ? ORDER BY gc_g_release_date DESC LIMIT 10");
							$select_game_by_id->execute(array("0", "games"));
							$fetch_games_by_id = $select_game_by_id->fetchAll();
							// to any changes rowcount > 0
							$have_change_after_fetch = $select_game_by_id->rowcount();

							if($have_change_after_fetch > 0){
								foreach($fetch_games_by_id as $fetch_game_by_id){
									$gc_g_id = $fetch_game_by_id['gc_g_id'];

									// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
									$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
									$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
									$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

									$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
									$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

									$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

									// coming-soon
									$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

									// href of game
									$gc_g_href = $fetch_game_by_id['gc_g_href'];

									$gc_g_title = $fetch_game_by_id['gc_g_title'];

									// flags [ soon, indev ]
									$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
									$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

									// gc_g_type_parent
									$gc_g_type = $fetch_game_by_id['gc_g_type'];
									$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

									// operating system [ windows - mac - linux ]
									$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
									$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
									$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

									// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
									$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
									$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
									$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];
									?>
									<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
												gc_g_title="<?php echo $gc_g_title; ?>"
												gc_g_incart="<?php echo $gc_g_incart; ?>"
												gc_g_type="<?php echo $gc_g_type; ?>"
												gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
												gc_g_price_price="<?php echo $gc_g_price_price; ?>"
												class="product-tile--games--list product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
										<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
											<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
											<div class="product-tile__cover has-image">
												<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
												<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper big-spot__ribbon-wrapper--for-lite-screen">
													<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																		<?php if($have_change_after_select_user > 0){
																						if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					} else {
																						if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					} ?>">
														<svg class="option-icon option-icon-full">
															<use xlink:href="#checkbox-multi">
																<symbol viewBox="0 0 17 17" id="checkbox-multi">
																		<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																</symbol>
															</use>
														</svg>
													</span>
													<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
														<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
			                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
			                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
			                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
			                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
														</svg>
													</span>
													<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																<?php if($have_change_after_select_user > 0){
																				if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																			} else {
																				if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																			}
																				?>">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
														</svg>
													</span>
													<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
														</svg>
													</span>
												</div>
											</div>
											<div class="product-tile__info">
												<div class="product-tile__platforms">
													<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
														<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																			<?php if($have_change_after_select_user > 0){
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} else {
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} ?>">
															<svg class="option-icon option-icon-full">
																<use xlink:href="#checkbox-multi">
																	<symbol viewBox="0 0 17 17" id="checkbox-multi">
																			<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																	</symbol>
																</use>
															</svg>
															In library
														</span>
														<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
															<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
				                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
				                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
				                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
				                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
															</svg>
															in cart
														</span>
														<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																	<?php if($have_change_after_select_user > 0){
																					if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				} else {
																					if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				}
																					?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
															</svg>
															soon
														</span>
														<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
															</svg>
															wishlisted
														</span>
													</div>
													<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
														<span class="product_isGame">
															<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
															<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
															<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
														</span>
													</div>
													<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
														<span class="product-tile__movie-slug">movie</span>
													</div>
												</div>
												<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
													<div class="product-tile__prices">
														<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
															<span class="menu-product__discount-text">
																<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																%
															</span>
														</div>
														<div class="product-tile__prices-inner">
															<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
															<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
															<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
														</div>
													</div>
													<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																href="<?php echo $gc_g_href; ?>"
																gc_g_title="<?php echo $gc_g_title; ?>"
																gc_g_incart="<?php echo $gc_g_incart; ?>"
																gc_g_type="<?php echo $gc_g_type; ?>"
																gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																</svg>
													</div>
												</div>
												<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
												<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
											</div>
										</a>
									</div>
									<?php
								}
							}
						?>
						<!---->
					</div>
					<!---->
					<div big-thingy-banner="Upcoming" class="Upcoming tab-products--tabbed-section">
						<div class="dots-wrapper ng-hide">
							<div class="dots-wrapper_moveTOTOP">
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
							</div>
						</div>
						<!---->
						<?php
							// select games
							$select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE (gc_g_soon_indev = ? OR gc_g_soon_indev = ? OR gc_g_comingSoon__gameDiv = ?) AND gc_g_type_parent = ? ORDER BY RAND() LIMIT 10");
							$select_game_by_id->execute(array("1 & 0", "1 & 1", "1", "games"));
							$fetch_games_by_id = $select_game_by_id->fetchAll();
							// to any changes rowcount > 0
							$have_change_after_fetch = $select_game_by_id->rowcount();

							if($have_change_after_fetch > 0){
								foreach($fetch_games_by_id as $fetch_game_by_id){
									$gc_g_id = $fetch_game_by_id['gc_g_id'];

									// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
									$gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
									$gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
									$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

									$gc_g_incart = $fetch_game_by_id['gc_g_incart'];
									$gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

									$gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

									// coming-soon
									$gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

									// href of game
									$gc_g_href = $fetch_game_by_id['gc_g_href'];

									$gc_g_title = $fetch_game_by_id['gc_g_title'];

									// flags [ soon, indev ]
									$gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
									$gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

									// gc_g_type_parent
									$gc_g_type = $fetch_game_by_id['gc_g_type'];
									$gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

									// operating system [ windows - mac - linux ]
									$gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
									$gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
									$gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

									// gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
									$gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
									$gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
									$gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];
									?>
									<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
												gc_g_title="<?php echo $gc_g_title; ?>"
												gc_g_incart="<?php echo $gc_g_incart; ?>"
												gc_g_type="<?php echo $gc_g_type; ?>"
												gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
												gc_g_price_price="<?php echo $gc_g_price_price; ?>"
												class="product-tile--games--list product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
										<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
											<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
											<div class="product-tile__cover has-image">
												<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
												<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper big-spot__ribbon-wrapper--for-lite-screen">
													<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																		<?php if($have_change_after_select_user > 0){
																						if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					} else {
																						if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					} ?>">
														<svg class="option-icon option-icon-full">
															<use xlink:href="#checkbox-multi">
																<symbol viewBox="0 0 17 17" id="checkbox-multi">
																		<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																</symbol>
															</use>
														</svg>
													</span>
													<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
														<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
			                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
			                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
			                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
			                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
														</svg>
													</span>
													<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																<?php if($have_change_after_select_user > 0){
																				if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																			} else {
																				if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																			}
																				?>">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
														</svg>
													</span>
													<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
														</svg>
													</span>
												</div>
											</div>
											<div class="product-tile__info">
												<div class="product-tile__platforms">
													<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
														<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																			<?php if($have_change_after_select_user > 0){
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} else {
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} ?>">
															<svg class="option-icon option-icon-full">
																<use xlink:href="#checkbox-multi">
																	<symbol viewBox="0 0 17 17" id="checkbox-multi">
																			<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																	</symbol>
																</use>
															</svg>
															In library
														</span>
														<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
															<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
				                       M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
				                      C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
				                      c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
				                      c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
															</svg>
															in cart
														</span>
														<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																	<?php if($have_change_after_select_user > 0){
																					if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				} else {
																					if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				}
																					?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
															</svg>
															soon
														</span>
														<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
															</svg>
															wishlisted
														</span>
													</div>
													<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
														<span class="product_isGame">
															<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
															<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
															<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
														</span>
													</div>
													<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
														<span class="product-tile__movie-slug">movie</span>
													</div>
												</div>
												<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
													<div class="product-tile__prices">
														<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
															<span class="menu-product__discount-text">
																<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																%
															</span>
														</div>
														<div class="product-tile__prices-inner">
															<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
															<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
															<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
														</div>
													</div>
													<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																href="<?php echo $gc_g_href; ?>"
																gc_g_title="<?php echo $gc_g_title; ?>"
																gc_g_incart="<?php echo $gc_g_incart; ?>"
																gc_g_type="<?php echo $gc_g_type; ?>"
																gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																</svg>
													</div>
												</div>
												<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
												<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
											</div>
										</a>
									</div>
									<?php
								}
							}
						?>
						<!---->
					</div>
					<!---->
					<a class="discover-games-more" href="">
						<div class="discover-games-more__text">show more</div>
						<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
					</a>
				</div>
				<div class="container--two-columns__child--curated-collection">
					<!---->
					<div class="tabbed-section__head now-on-sale__title js-head">
						<div class="section-title_inside js-section-title tabbed-section__title">
							<div class="section-title__icon-wrapper">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#404040"><path d="M124.055,0c-3.225,0 -6.61125,1.89469 -9.1375,5.16l-28.4875,39.99c-4.09844,-0.9675 -8.25062,-1.3975 -12.47,-1.3975c-14.48562,0 -28.13812,5.67063 -38.3775,15.91c-0.645,0.645 -0.9675,1.45125 -0.9675,2.365c0,0.91375 0.3225,1.8275 0.9675,2.4725l71.9175,71.9175c0.67188,0.67188 1.47813,0.9675 2.365,0.9675c0.88688,0 1.80063,-0.40312 2.4725,-1.075c13.53156,-13.51812 18.90656,-33.02937 14.2975,-51.4925l40.205,-27.4125c3.01,-2.24406 4.93156,-5.32125 5.16,-8.385c0.17469,-2.24406 -0.645,-4.39406 -2.15,-5.9125l-40.42,-40.9575c-1.38406,-1.41094 -3.31906,-2.15 -5.375,-2.15zM56.8675,95.46l-56.115,70.95c-1.08844,1.37063 -1.02125,3.38625 0.215,4.6225c0.67188,0.67188 1.58563,0.9675 2.4725,0.9675c0.7525,0 1.51844,-0.25531 2.15,-0.7525l70.8425,-56.115z"></path></g></g>
								</svg>
							</div>
							<div class="section-title__title-wrapper">Featured</div>
						</div>
					</div>
					<!---->
					<div class="curated-collection-section">
						<div class="curated-collection-tile-wrapper curated-collection-tile-wrapper--pos1 curated-collection-tile-wrapper--left curated-collection-tile-wrapper--hung">
							<a class="curated-tile curated-tile--huge" href="">
								<picture class="curated-tile__bg lazy"><source type="image/webp" lazy-srcset="
	                //images-2.gog-statics.com/0ed40368e681aa68c76c34ade88e9776ae485fac84b2c5977b49a5e8946f2543_curated_collection_huge_tile_2x.webp 2x,
	                //images-2.gog-statics.com/0ed40368e681aa68c76c34ade88e9776ae485fac84b2c5977b49a5e8946f2543_curated_collection_huge_tile.webp 1x" srcset="
	                //images-2.gog-statics.com/0ed40368e681aa68c76c34ade88e9776ae485fac84b2c5977b49a5e8946f2543_curated_collection_huge_tile_2x.webp 2x,
	                //images-2.gog-statics.com/0ed40368e681aa68c76c34ade88e9776ae485fac84b2c5977b49a5e8946f2543_curated_collection_huge_tile.webp 1x"><source type="image/jpeg" lazy-srcset="
	                //images-2.gog-statics.com/0ed40368e681aa68c76c34ade88e9776ae485fac84b2c5977b49a5e8946f2543_curated_collection_huge_tile_2x.jpg 2x,
	                //images-2.gog-statics.com/0ed40368e681aa68c76c34ade88e9776ae485fac84b2c5977b49a5e8946f2543_curated_collection_huge_tile.jpg 1x" srcset="
	                //images-2.gog-statics.com/0ed40368e681aa68c76c34ade88e9776ae485fac84b2c5977b49a5e8946f2543_curated_collection_huge_tile_2x.jpg 2x,
	                //images-2.gog-statics.com/0ed40368e681aa68c76c34ade88e9776ae485fac84b2c5977b49a5e8946f2543_curated_collection_huge_tile.jpg 1x"><img class="curated-tile__bg-img" src="">
								</picture>
							</a>
						</div>
						<div class="curated-collection-tile-wrapper curated-collection-tile-wrapper--pos2 curated-collection-tile-wrapper--left curated-collection-tile-wrapper--small">
							<a class="curated-tile curated-tile--huge" href="">
								<picture class="curated-tile__bg lazy"><source type="image/webp" lazy-srcset="
	                //images-3.gog-statics.com/96df296cc32d0f42932a35e8c5f46d8df209ca98e060addd8af2fbed036f6784_curated_collection_small_tile_2x.webp 2x,
	                //images-3.gog-statics.com/96df296cc32d0f42932a35e8c5f46d8df209ca98e060addd8af2fbed036f6784_curated_collection_small_tile.webp 1x" srcset="
	                //images-3.gog-statics.com/96df296cc32d0f42932a35e8c5f46d8df209ca98e060addd8af2fbed036f6784_curated_collection_small_tile_2x.webp 2x,
	                //images-3.gog-statics.com/96df296cc32d0f42932a35e8c5f46d8df209ca98e060addd8af2fbed036f6784_curated_collection_small_tile.webp 1x"><source type="image/jpeg" lazy-srcset="
	                //images-3.gog-statics.com/96df296cc32d0f42932a35e8c5f46d8df209ca98e060addd8af2fbed036f6784_curated_collection_small_tile_2x.jpg 2x,
	                //images-3.gog-statics.com/96df296cc32d0f42932a35e8c5f46d8df209ca98e060addd8af2fbed036f6784_curated_collection_small_tile.jpg 1x" srcset="
	                //images-3.gog-statics.com/96df296cc32d0f42932a35e8c5f46d8df209ca98e060addd8af2fbed036f6784_curated_collection_small_tile_2x.jpg 2x,
	                //images-3.gog-statics.com/96df296cc32d0f42932a35e8c5f46d8df209ca98e060addd8af2fbed036f6784_curated_collection_small_tile.jpg 1x"><img class="curated-tile__bg-img" src="">
								</picture>
							</a>
						</div>
						<div class="curated-collection-tile-wrapper curated-collection-tile-wrapper--pos2 curated-collection-tile-wrapper--right curated-collection-tile-wrapper--vertical">
							<a class="curated-tile curated-tile--huge" href="">
								<picture class="curated-tile__bg lazy"><source type="image/webp" lazy-srcset="
	                //images-2.gog-statics.com/77a2edcd428fdf3de24519cc024ebfd5835460d6e51db0aeee79ba634b87ea03_curated_collection_vertical_tile_2x.webp 2x,
	                //images-2.gog-statics.com/77a2edcd428fdf3de24519cc024ebfd5835460d6e51db0aeee79ba634b87ea03_curated_collection_vertical_tile.webp 1x" srcset="
	                //images-2.gog-statics.com/77a2edcd428fdf3de24519cc024ebfd5835460d6e51db0aeee79ba634b87ea03_curated_collection_vertical_tile_2x.webp 2x,
	                //images-2.gog-statics.com/77a2edcd428fdf3de24519cc024ebfd5835460d6e51db0aeee79ba634b87ea03_curated_collection_vertical_tile.webp 1x"><source type="image/jpeg" lazy-srcset="
	                //images-2.gog-statics.com/77a2edcd428fdf3de24519cc024ebfd5835460d6e51db0aeee79ba634b87ea03_curated_collection_vertical_tile_2x.jpg 2x,
	                //images-2.gog-statics.com/77a2edcd428fdf3de24519cc024ebfd5835460d6e51db0aeee79ba634b87ea03_curated_collection_vertical_tile.jpg 1x" srcset="
	                //images-2.gog-statics.com/77a2edcd428fdf3de24519cc024ebfd5835460d6e51db0aeee79ba634b87ea03_curated_collection_vertical_tile_2x.jpg 2x,
	                //images-2.gog-statics.com/77a2edcd428fdf3de24519cc024ebfd5835460d6e51db0aeee79ba634b87ea03_curated_collection_vertical_tile.jpg 1x"><img class="curated-tile__bg-img" src="">
								</picture>
							</a>
						</div>
						<div class="curated-collection-tile-wrapper curated-collection-tile-wrapper--pos3 curated-collection-tile-wrapper--left curated-collection-tile-wrapper--small">
							<a class="curated-tile curated-tile--huge" href="">
								<picture class="curated-tile__bg lazy"><source type="image/webp" lazy-srcset="
	                //images-4.gog-statics.com/2314ba515527342e71045ee79f0c54ee57fea1971978930563026bd25d1a9114_curated_collection_small_tile_2x.webp 2x,
	                //images-4.gog-statics.com/2314ba515527342e71045ee79f0c54ee57fea1971978930563026bd25d1a9114_curated_collection_small_tile.webp 1x" srcset="
	                //images-4.gog-statics.com/2314ba515527342e71045ee79f0c54ee57fea1971978930563026bd25d1a9114_curated_collection_small_tile_2x.webp 2x,
	                //images-4.gog-statics.com/2314ba515527342e71045ee79f0c54ee57fea1971978930563026bd25d1a9114_curated_collection_small_tile.webp 1x"><source type="image/jpeg" lazy-srcset="
	                //images-4.gog-statics.com/2314ba515527342e71045ee79f0c54ee57fea1971978930563026bd25d1a9114_curated_collection_small_tile_2x.jpg 2x,
	                //images-4.gog-statics.com/2314ba515527342e71045ee79f0c54ee57fea1971978930563026bd25d1a9114_curated_collection_small_tile.jpg 1x" srcset="
	                //images-4.gog-statics.com/2314ba515527342e71045ee79f0c54ee57fea1971978930563026bd25d1a9114_curated_collection_small_tile_2x.jpg 2x,
	                //images-4.gog-statics.com/2314ba515527342e71045ee79f0c54ee57fea1971978930563026bd25d1a9114_curated_collection_small_tile.jpg 1x"><img class="curated-tile__bg-img" src="">
								</picture>
							</a>
						</div>
						<div class="curated-collection-tile-wrapper curated-collection-tile-wrapper--pos4 curated-collection-tile-wrapper--left curated-collection-tile-wrapper--small">
							<a class="curated-tile curated-tile--huge" href="">
								<picture class="curated-tile__bg lazy"><source type="image/webp" lazy-srcset="
	                //images-1.gog-statics.com/cbb65be3383007e400dff08f28dddd2cb9c996be67fc6e22fb1f454ca9a7c802_curated_collection_small_tile_2x.webp 2x,
	                //images-1.gog-statics.com/cbb65be3383007e400dff08f28dddd2cb9c996be67fc6e22fb1f454ca9a7c802_curated_collection_small_tile.webp 1x" srcset="
	                //images-1.gog-statics.com/cbb65be3383007e400dff08f28dddd2cb9c996be67fc6e22fb1f454ca9a7c802_curated_collection_small_tile_2x.webp 2x,
	                //images-1.gog-statics.com/cbb65be3383007e400dff08f28dddd2cb9c996be67fc6e22fb1f454ca9a7c802_curated_collection_small_tile.webp 1x"><source type="image/jpeg" lazy-srcset="
	                //images-1.gog-statics.com/cbb65be3383007e400dff08f28dddd2cb9c996be67fc6e22fb1f454ca9a7c802_curated_collection_small_tile_2x.jpg 2x,
	                //images-1.gog-statics.com/cbb65be3383007e400dff08f28dddd2cb9c996be67fc6e22fb1f454ca9a7c802_curated_collection_small_tile.jpg 1x" srcset="
	                //images-1.gog-statics.com/cbb65be3383007e400dff08f28dddd2cb9c996be67fc6e22fb1f454ca9a7c802_curated_collection_small_tile_2x.jpg 2x,
	                //images-1.gog-statics.com/cbb65be3383007e400dff08f28dddd2cb9c996be67fc6e22fb1f454ca9a7c802_curated_collection_small_tile.jpg 1x"><img class="curated-tile__bg-img" src="">
								</picture>
							</a>
						</div>
						<div class="curated-collection-tile-wrapper curated-collection-tile-wrapper--pos4 curated-collection-tile-wrapper--right curated-collection-tile-wrapper--small">
							<a class="curated-tile curated-tile--huge" href="">
								<picture class="curated-tile__bg lazy"><source type="image/webp" lazy-srcset="
	                //images-4.gog-statics.com/d0dd06614b0fdf1f006e77bb6a1e39c0441995eaaed2d06105166216d5af6776_curated_collection_small_tile_2x.webp 2x,
	                //images-4.gog-statics.com/d0dd06614b0fdf1f006e77bb6a1e39c0441995eaaed2d06105166216d5af6776_curated_collection_small_tile.webp 1x" srcset="
	                //images-4.gog-statics.com/d0dd06614b0fdf1f006e77bb6a1e39c0441995eaaed2d06105166216d5af6776_curated_collection_small_tile_2x.webp 2x,
	                //images-4.gog-statics.com/d0dd06614b0fdf1f006e77bb6a1e39c0441995eaaed2d06105166216d5af6776_curated_collection_small_tile.webp 1x"><source type="image/jpeg" lazy-srcset="
	                //images-4.gog-statics.com/d0dd06614b0fdf1f006e77bb6a1e39c0441995eaaed2d06105166216d5af6776_curated_collection_small_tile_2x.jpg 2x,
	                //images-4.gog-statics.com/d0dd06614b0fdf1f006e77bb6a1e39c0441995eaaed2d06105166216d5af6776_curated_collection_small_tile.jpg 1x" srcset="
	                //images-4.gog-statics.com/d0dd06614b0fdf1f006e77bb6a1e39c0441995eaaed2d06105166216d5af6776_curated_collection_small_tile_2x.jpg 2x,
	                //images-4.gog-statics.com/d0dd06614b0fdf1f006e77bb6a1e39c0441995eaaed2d06105166216d5af6776_curated_collection_small_tile.jpg 1x"><img class="curated-tile__bg-img" src="">
								</picture>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!---->
		<!---->
		<div class="news js--tabbed-section--for-transform" numberOfGamesInOneTab="1">
			<div class="tabbed-section news__content">
				<!---->
				<!---->
				<div class="tabbed-section__head news__title js-head">
					<div class="section-title_inside js-section-title tabbed-section__title">
						<div class="section-title__icon-wrapper">
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#404040"><path d="M149.60417,0c-1.98763,0.25195 -3.7513,1.28776 -4.92708,2.91146c0,0 -34.18164,47.25521 -87.34375,47.25521h-44.34375c-7.16667,0 -12.98958,5.82292 -12.98958,12.98958v31.35417c0,7.16667 5.82292,12.98958 12.98958,12.98958h44.34375c53.16211,0 87.34375,47.25521 87.34375,47.25521c1.81966,2.54753 5.09506,3.61133 8.0625,2.63151c2.96745,-0.97982 4.95508,-3.75131 4.92708,-6.88672v-57.33333c7.89453,0 14.33333,-6.4388 14.33333,-14.33333c0,-7.89453 -6.4388,-14.33333 -14.33333,-14.33333v-57.33333c0.02799,-2.07161 -0.86784,-4.03125 -2.40755,-5.40299c-1.53972,-1.37175 -3.61133,-2.01563 -5.65495,-1.76367zM143.33333,25.53125v106.60417c-14.66927,-14.83724 -41.3763,-36.28125 -78.83333,-38.74479v-29.11458c37.45703,-2.46354 64.16406,-23.90755 78.83333,-38.74479zM14.33333,114.66667v7.16667c8.5944,17.18881 14.33333,35.02149 14.33333,40.76042c0,5.01107 4.39518,9.40625 9.40625,9.40625h17.02083c7.89453,0 9.46224,-6.55078 8.73438,-9.40625c0,-3.58333 -2.1556,-8.51042 -7.16667,-12.09375c-17.1888,-12.17774 -16.57292,-35.83333 -16.57292,-35.83333z"></path></g></g>
							</svg>
						</div>
						<div class="section-title__title-wrapper">news</div>
					</div>
				</div>
				<!---->
				<!---->
				<div class="tab-products--tabbed-section"  big-thingy-banner="news">
					<div class="carousel now-on-sale__carousel scrollbar-17 is-ready">
						<div class="_gog-module-slider__items-container carousel__items-container has-product-tiles-and-transform is-visible">
							<div class="js-items-wrapper">
								<div class="tab-products--tab-collection">
									<!---->
									<div class="js-item-news carousel__item-news news-section__group">
										<div class="news-tile-wrapper news-tile-wrapper--big" ng-banner-1-1="1-1">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Grab the awesome Cyber Monday deals while they last!</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
										<!---->
										<div class="news-tile-wrapper" ng-banner-1-2="1-2">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Play the demo version of Carto!</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
										<!---->
										<div class="news-tile-wrapper" ng-banner-1-3="1-3">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Discover the best Batman games on GOG.COM</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
									</div>
									<!---->
									<!---->
									<div class="js-item-news carousel__item-news news-section__group">
										<div class="news-tile-wrapper" ng-banner-2-1="2-1">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Get the Best Black Friday Deals on GOG.COM!</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
										<!---->
										<div class="news-tile-wrapper" ng-banner-2-2="2-2">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Check out this beautiful Horizon Zero Dawn™ cosplay made by Ela</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
										<!---->
										<div class="news-tile-wrapper" ng-banner-2-3="2-3">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Coming Soon: Creeper World 4</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
										<!---->
										<div class="news-tile-wrapper" ng-banner-2-4="2-4">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Top 10 Boats in Games by the Creators of Dread Nautical</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
									</div>
									<!---->
									<!---->
									<div class="js-item-news carousel__item-news news-section__group">
										<div class="news-tile-wrapper" ng-banner-3-1="3-1">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Release: Dread Nautical</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
										<!---->
										<div class="news-tile-wrapper" ng-banner-3-2="3-2">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Play the Iron Harvest demo on GOG.COM!</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
										<!---->
										<div class="news-tile-wrapper" ng-banner-3-3="3-3">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Release: Drakensang</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
										<!---->
										<div class="news-tile-wrapper" ng-banner-3-4="3-4">
											<a href="" class="news-tile">
												<div class="news-tile__title-wrapper">Release: Evan's Remains</div>
												<div class="news-tile__comments-wrapper">
													<div class="comments-wrapper__icon-wrapper">
														<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#FFF"><path d="M28.66667,28.66667c-6.33533,0 -11.46667,5.13133 -11.46667,11.46667v86c0,6.33533 5.13133,11.46667 11.46667,11.46667h22.93333v22.93333c0,3.16643 2.5669,5.73333 5.73333,5.73333c1.9417,-0.00362 3.74963,-0.98976 4.80391,-2.62031l19.56276,-26.04636h61.63333c6.33533,0 11.46667,-5.13133 11.46667,-11.46667v-86c0,-6.33533 -5.13133,-11.46667 -11.46667,-11.46667z"></path></g></g>
														</svg>
													</div>
													<div class="comments-wrapper__count-wrapper">7</div>
												</div>
												<div class="news-tile__time-wrapper"></div>
											</a>
										</div>
									</div>
									<!---->
								</div>
							</div>
						</div>
						<div class="carousel-pagination big-arrows">
							<div class="carousel__nav carousel__nav--left" numberOfClickedproblem="news">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M114.55469,22.87734c-1.48951,0.04438 -2.90324,0.6669 -3.94167,1.73568l-57.33333,57.33333c-2.23811,2.23904 -2.23811,5.86825 0,8.10729l57.33333,57.33333c1.43802,1.49778 3.5734,2.10113 5.5826,1.57735c2.0092,-0.52378 3.57826,-2.09284 4.10204,-4.10204c0.52378,-2.0092 -0.07957,-4.14458 -1.57735,-5.5826l-53.27969,-53.27969l53.27969,-53.27969c1.69569,-1.64828 2.20555,-4.16851 1.28389,-6.3463c-0.92166,-2.17779 -3.08576,-3.56638 -5.44951,-3.49667z"></path></g></g>
								</svg>
							</div>
							<!---->
							<span carousel-pagination__page_number="0" class="carousel-pagination__page is---active"></span>
							<!---->
							<span carousel-pagination__page_number="1" class="carousel-pagination__page"></span>
							<!---->
							<span carousel-pagination__page_number="2" class="carousel-pagination__page"></span>
							<!---->
							<div class="carousel__nav carousel__nav--right">
								<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#b9b9b9"><path d="M57.27734,22.87734c-2.33303,0.00061 -4.43307,1.41473 -5.31096,3.57628c-0.8779,2.16155 -0.3586,4.6395 1.31331,6.26669l53.27969,53.27969l-53.27969,53.27969c-1.49777,1.43802 -2.10111,3.5734 -1.57733,5.58259c0.52378,2.0092 2.09283,3.57825 4.10203,4.10203c2.0092,0.52378 4.14457,-0.07956 5.58259,-1.57733l57.33333,-57.33333c2.23811,-2.23904 2.23811,-5.86825 0,-8.10729l-57.33333,-57.33333c-1.07942,-1.10959 -2.56162,-1.73559 -4.10963,-1.73568z"></path></g></g>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!---->
		<!---->
	</div>

	<!-- iframe signin gogcom -->
	<?php require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_navbar_signIN_gog; ?>
	<!-- iframe signin gogcom -->
<?php
  require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_footer;
  require $includes_php_files_static_templates . $includes_php_files_static_templates_footer;
?>
<?php ob_end_flush(); ?>
