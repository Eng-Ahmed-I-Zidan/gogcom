<?php
	ob_start();
	$connectDB = "";
	$pagetitle = "Cyberpunk 2077 on GOG.com";
	$GameIDInDB = "2093619782";
	$gameCommentsTableName = "gogcom_comments_cyberpunk2077";
	$hereIsAllGamesPage = "";
	$allgamedivStyleSheet = "";

  require 'includes-php-files/functions/title.php';
  require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_navbar;

	if($have_change_after_select_user > 0){
	} else {
		// update comment set [helpful_comment_for_this_user] == 0
		$updateCommentsNotHasAccount = $connect->prepare("UPDATE " . $allGameInOnePlaceTable . " SET helpful_comment_for_this_user = ?");
		$updateCommentsNotHasAccount->execute(array("0"));
	}

	// select games
	$select_game_by_Name = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ? LIMIT 1");
	$select_game_by_Name->execute(array($GameIDInDB));
	$fetch_game_by_Name = $select_game_by_Name->fetch();

	$gc_g_id = $fetch_game_by_Name['gc_g_id'];

	$gc_g_incart = $fetch_game_by_Name['gc_g_incart'];
	$gc_g_wishlisted = $fetch_game_by_Name['gc_g_wishlisted'];

	// href of game
	$gc_g_href = $fetch_game_by_Name['gc_g_href'];

	// release date
	$gc_g_release_date = $fetch_game_by_Name['gc_g_release_date'];

	$gc_g_title = $fetch_game_by_Name['gc_g_title'];

	// gc_g_type_parent
	$gc_g_type = $fetch_game_by_Name['gc_g_type'];
	$gc_g_type_parent = $fetch_game_by_Name['gc_g_type_parent'];

	// operating system [ windows - mac - linux ]
	$gc_g_os_win = explode(" & ", $fetch_game_by_Name['gc_g_os_win_mac_linux'])[0];
	$gc_g_os_mac = explode(" & ", $fetch_game_by_Name['gc_g_os_win_mac_linux'])[1];
	$gc_g_os_linux = explode(" & ", $fetch_game_by_Name['gc_g_os_win_mac_linux'])[2];

	// gc_g_user_rating
	$gc_g_user_rating = $fetch_game_by_Name['gc_g_user_rating'];

	// gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
	$gc_g_price_price = explode(" & ", $fetch_game_by_Name['gc_g_price_price_and_discount_presentage'])[0];
	$gc_g_discount_presentage = explode(" & ", $fetch_game_by_Name['gc_g_price_price_and_discount_presentage'])[1];
	$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

	// flags [ soon, indev ]
	$gc_g_soon = explode(" & ", $fetch_game_by_Name['gc_g_soon_indev'])[0];
	$gc_g_indev = explode(" & ", $fetch_game_by_Name['gc_g_soon_indev'])[1];

	// languages
	$languages = explode("-", $fetch_game_by_Name['lan_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da']);
	$countLanguageSupport = 0;
	foreach($languages as $language){
		if($language != "0"){ $countLanguageSupport += 1; }
	}

	// select [gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other => [win-mac-lin] => [min-rec]]
	if($gc_g_os_win == "1"){ $WML = "win"; $prepareElement = "SELECT gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other, gc_g_win_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ?"; }
	else if($gc_g_os_win == "0" && $gc_g_os_mac == "1"){ $WML = "mac"; $prepareElement = "SELECT gc_g_mac_min_system_requirements_sy_pr_me_gr_dix_st_sound_other, gc_g_mac_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ?"; }
	else if($gc_g_os_win == "0" && $gc_g_os_mac == "0" && $gc_g_os_linux == "1"){ $WML = "lin"; $prepareElement = "SELECT gc_g_lin_min_system_requirements_sy_pr_me_gr_dix_st_sound_other, gc_g_lin_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ?"; }
	else{ $WML = "win"; $prepareElement = "SELECT gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other, gc_g_win_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ?"; }

	$select_win_mac_lin_min_rec = $connect->prepare($prepareElement);
	$select_win_mac_lin_min_rec->execute(array($GameIDInDB));
	$fetch_win_mac_lin_min_rec = $select_win_mac_lin_min_rec->fetch();

	$activeOperetingSystemMin = "";
	$activeOperetingSystemRec = "";
	if($WML == "win"){
		$activeOperetingSystemMin = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
		$activeOperetingSystemRec = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_win_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
	}
	else if($WML == "mac"){
		$activeOperetingSystemMin = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_mac_min_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
		$activeOperetingSystemRec = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_mac_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
	}
	else if($WML == "lin"){
		$activeOperetingSystemMin = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_lin_min_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
		$activeOperetingSystemRec = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_lin_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
	}

	// fetch [gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O]
	$gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O = explode("-", $fetch_game_by_Name['gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O']);

	// fetch [lan_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da]
	$lan_en_de_fr_sp_it_bp_po_Ect = explode("-", $fetch_game_by_Name['lan_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da']);

	// fetch [audio_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da]
	$audio_en_de_fr_sp_it_bp_po_Ect = explode("-", $fetch_game_by_Name['aud_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da']);

	// nuber of comments
	$limitCommentsInOnePage = 0;

	// arrayCollectGamesIDForUpdate
	$arrayCollectCommentsIDForUpdate = array();

	// for game logo [srcset]
  $gamelogosrcset = array('https://images.gog-statics.com/081d47ed42b6c88b4cc427fe1350f76c97977660079a78d5d2320c82b138f8c2_product_card_v2_logo_480x285.png 1x,https://images.gog-statics.com/081d47ed42b6c88b4cc427fe1350f76c97977660079a78d5d2320c82b138f8c2_product_card_v2_logo_960x570.png 2x');

	// big[sigle Image AND Videos]
	$videosArray = array('https://www.youtube.com/embed/ckbeFk0LzaM?wmode=opaque&amp;rel=0',
	 'https://www.youtube.com/embed/8TM2nAYyHE0?wmode=opaque&rel=0',
	 'https://www.youtube.com/embed/rPppjjvjQlk?wmode=opaque&rel=0',
	 'https://www.youtube.com/embed/a7_D1qlwOp0?wmode=opaque&rel=0',
	 'https://www.youtube.com/embed/jNC6MEA4rQk?wmode=opaque&rel=0',
	 'https://www.youtube.com/embed/Q4ON7H7RnBE?wmode=opaque&rel=0',
	 'https://www.youtube.com/embed/oYmBVQp84HA?wmode=opaque&rel=0',
	 'https://www.youtube.com/embed/rNmdJKP00ME?wmode=opaque&rel=0');
	$imagesArray = array('https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9.jpg',
	 'https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d.jpg',
	 'https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b.jpg',
	 'https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315.jpg',
	 'https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46.jpg',
	 'https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1.jpg',
	 'https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d.jpg',
	 'https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e.jpg',
	 'https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528.jpg',
	 'https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa.jpg',
	 'https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1.jpg',
	 'https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438.jpg');

	 // small[carousel] inside
	 $smallImagesArray = array('https://img.youtube.com/vi/ckbeFk0LzaM/hqdefault.jpg 1x,https://img.youtube.com/vi/ckbeFk0LzaM/hqdefault.jpg 2x',
	 'https://img.youtube.com/vi/8TM2nAYyHE0/hqdefault.jpg 1x,https://img.youtube.com/vi/8TM2nAYyHE0/hqdefault.jpg 2x',
	 'https://img.youtube.com/vi/rPppjjvjQlk/hqdefault.jpg 1x,https://img.youtube.com/vi/rPppjjvjQlk/hqdefault.jpg 2x',
	 'https://img.youtube.com/vi/a7_D1qlwOp0/hqdefault.jpg 1x,https://img.youtube.com/vi/a7_D1qlwOp0/hqdefault.jpg 2x',
	 'https://img.youtube.com/vi/jNC6MEA4rQk/hqdefault.jpg 1x,https://img.youtube.com/vi/jNC6MEA4rQk/hqdefault.jpg 2x',
	 'https://img.youtube.com/vi/Q4ON7H7RnBE/hqdefault.jpg 1x,https://img.youtube.com/vi/Q4ON7H7RnBE/hqdefault.jpg 2x',
	 'https://img.youtube.com/vi/oYmBVQp84HA/hqdefault.jpg 1x,https://img.youtube.com/vi/oYmBVQp84HA/hqdefault.jpg 2x',
	 'https://img.youtube.com/vi/rNmdJKP00ME/hqdefault.jpg 1x,https://img.youtube.com/vi/rNmdJKP00ME/hqdefault.jpg 2x',
	 'https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1_prof_gallery_250x140.jpg 2x',
	 'https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438_prof_gallery_125x70.jpg 1x,https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438_prof_gallery_250x140.jpg 2x');

	 // small[carousel] outside
	 $bigImagesArray = array('https://img.youtube.com/vi/ckbeFk0LzaM/hqdefault.jpg',
	 'https://img.youtube.com/vi/8TM2nAYyHE0/hqdefault.jpg',
	 'https://img.youtube.com/vi/rPppjjvjQlk/hqdefault.jpg',
	 'https://img.youtube.com/vi/a7_D1qlwOp0/hqdefault.jpg',
	 'https://img.youtube.com/vi/jNC6MEA4rQk/hqdefault.jpg',
	 'https://img.youtube.com/vi/Q4ON7H7RnBE/hqdefault.jpg',
	 'https://img.youtube.com/vi/oYmBVQp84HA/hqdefault.jpg',
	 'https://img.youtube.com/vi/rNmdJKP00ME/hqdefault.jpg',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/36af85727c34bf58f5eca294c0dc1db6274ff8cf7bb0a955653af3d2f41ef7f9_product_card_v2_mobile_slider_639.jpg" alt="">',
 	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/232028db8fdd1b477ae0517b411fb40fe030055d6ed12c9acb8e522e86c7af4d_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/016d855186e5a1bc2463c5cb21ec9e4591a1656fc09ae6ee5d937d3733be4d7b_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/18e09f411f95844f652605e8041402758a5ce81b184e5fdf9d92ce296a5fd315_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/eb09c79dba22acff47b26a0588e6ebb6588d1498305a4c7d43001aee4c27cc46_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/0404bdd7ded3db4cfc0dfe4979e694a99bf0296c791dcf95503903306f306ea1_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/1bdf4db8117f0d8e44160df31b71da5194b6bb399aca058d652fe8064ee1072d_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/6fb55c5a92e4cee7bc02696f9b528f9dbf629417c75723d96a9d638533060c6e_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/ac35d3b32719ee5ff7d33e72bfa2f634b508b3dc0af24bb82b17361137659528_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/a683aa268beb2021fed3e56cfc3d26a867caf32caf1ee547c88be43df67fd1fa_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/871984bb3279244ed22496a71111982f853b817050f322113d8ea239226072d1_product_card_v2_mobile_slider_639.jpg" alt="">',
	 '<source media="(max-width: 450px)" srcset="https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438_product_card_v2_mobile_slider_450.jpg"><source media="(min-width: 451px) and (max-width: 639px)" srcset="https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438_product_card_v2_mobile_slider_639.jpg"><source media="(min-width: 640px) and (max-width: 755px)" srcset="https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438_product_card_v2_thumbnail_180.jpg , https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438_product_card_v2_thumbnail_360.jpg 2x"><source media="(min-width: 756px)" srcset="https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438_product_card_v2_thumbnail_271.jpg , https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438_product_card_v2_thumbnail_542.jpg 2x"><img class="productcard-thumbnails-slider__image" src="https://images.gog-statics.com/498be9e7ca23ed4b4d2290a81fd4ab2b46752773e17a7d413cbe55c531b17438_product_card_v2_mobile_slider_639.jpg" alt="">');

	 // select comments
	 // database name change from game to other [comments]
	 $select_comments = $connect->prepare("SELECT * FROM " . $gameCommentsTableName . " ORDER BY helpful_comment_for_all DESC");
	 $select_comments->execute(array());
	 $fetch_comments = $select_comments->fetchAll();
	 $rowcountFitch = $select_comments->rowcount();
	 // overall reating
	 $sumOfCommentsRating = 0;
	 $commentIndex = 0;
	 foreach($fetch_comments as $fetch_comment){
		 $sumOfCommentsRating += (int)$fetch_comment['game_rating'];
		 $commentIndex += 1;
	 }

?>

	<!-- Start With Parent Of Page On Click hide search -->
	<div class="click-hide-search content cf cyberpunk2077" gamesoon="<?php if($gc_g_soon == "1"){ echo 'true'; }else{ echo 'false'; } ?>" haveanaccount='<?php if($have_change_after_select_user > 0){ echo "true"; } else { echo "false"; } ?>' esn7a841="<?php echo $gameCommentsTableName; ?>" gameiddb="<?php echo $GameIDInDB; ?>" username="<?php if($have_change_after_select_user > 0){ echo $fetch_gog_users_new_user['UserName']; } ?>">
		<!-- require top of page -->
		<?php require $includes_php_files_static_templates . $includes_php_files_static_templates_Top; ?>
		<!-- Start With layout-main -->
		<div class="layout-main">
			<div class="layout-main-col">
				<div class="content-summary-section">
					<div class="title">
						<div class="title__underline-text">Description</div>
					</div>
					<div class="description">
						<a class="" href="" target="_blank">
							<img src="https://items.gog.com/not_a_cp/1.2patchbox.png" alt=""/>
						</a>
						<hr>
						<img src="https://items.gog.com/not_a_cp/addon_en.png" alt=""/>
						<hr>
						<br>
						<video autoplay="autoplay" loop="" muted=""><source src="https://items.gog.com/not_a_cp/action.mp4" /></video>
						<br>
						<b>Cyberpunk 2077</b>
						 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with power, glamour and body modification. You play as V, a mercenary outlaw going after a one-of-a-kind implant that is the key to immortality. You can customize your character’s cyberware, skillset and playstyle, and explore a vast city where the choices you make shape the story and the world around you.
						 <br>
						 <br>
						 <video autoplay="autoplay" loop="" muted=""><source src="https://items.gog.com/not_a_cp/character.mp4"/></video>
						 <br>
						 Become a cyberpunk, an urban mercenary equipped with cybernetic enhancements and build your legend on the streets of Night City.  Create your character from scratch and choose their background out of three unique Lifepaths. Take the role of a gang-wise Street Kid, freedom-loving Nomad, or a ruthless Corpo
						 <br>
						 <br>
						 <video autoplay="autoplay" loop="" muted=""><source src="https://items.gog.com/not_a_cp/world.mp4"/></video>
						 <br>
						 Enter the massive open world of Night City, a place that sets new standards in terms of visuals, complexity and depth. Explore the bustling megalopolis of the future and its extensive districts, each with exceptional visual flavor, inhabitants and chances to earn cash. Interact with members of powerful gangs who rule the streets of Night City.
						 <br>
						 <br>
						 <video autoplay="autoplay" loop="" muted=""><source src="https://items.gog.com/not_a_cp/tech.mp4"/></video>
						 <br>
						 Take the riskiest job of your life and go after a prototype implant that is the key to immortality. Guided by the legendary Rockerboy, Johnny Silverhand (played by Keanu Reeves), you will change the course of the corporate-ruled world forever. All this while listening to an intoxicating soundtrack from artists like Run the Jewels, Refused, Grimes, A$AP Rocky, Gazelle Twin, Ilan Rubin, Richard Devine, Nina Kraviz, Deadly Hunta, Rat Boy, and Tina Guo.
						 <br>
						 <br>
						 <video autoplay="autoplay" loop="" muted=""><source src="https://items.gog.com/not_a_cp/music.mp4"/></video>
						 <br>
						 <h4>Game features:</h4>
						 <ul>
							 <li>Dive into an open-world RPG and explore a futuristic city where anything goes.</li>
							 <li>Create a unique character, along with their looks and background. Craft your own destiny by making tough choices as the immersing story follows.</li>
							 <li>Utilize a wide arsenal of high-tech weapons against your opponents.</li>
							 <li>Drive futuristic vehicles through the city streets or race to earn cash.</li>
						 </ul>
						 <br>
						 <hr>
						 <a class="" href="" target="_blank">
							 <img src="https://items.gog.com/not_a_cp/learn_more.png" alt=""/>
						 </a>
						 <hr>
						 <div style="text-align:center">
						 	<img style="width:32%;height:32%;display:inline-block;" src="https://items.gog.com/not_a_cp/awards/awardscp1.png" alt=""/>
						 	<img style="width:32%;height:32%;display:inline-block;" src="https://items.gog.com/not_a_cp/awards/awardscp2.png" alt=""/>
					 	 </div>
						 <hr>
						 * Exclusive Digital Comic - Cyberpunk 2077: Big City Dreams is available in English only.
						 <br>
						 <p class="description__copyrights">CD PROJEKT&reg;, Cyberpunk&reg;, Cyberpunk 2077<!--®-->&reg; are registered trademarks of CD PROJEKT S.A. &copy;<!--©--> 2019 CD PROJEKT S.A. All rights reserved. All other copyrights and trademarks are the property of their respective owners. </p>
					</div>
					<div class="goodies">
						<div class="title">
							<div class="title__underline-text">Goodies</div>
						</div>
						<div class="goodies--inline">
							<span class="goodies__item">
								<svg class="ic-svg goodies__icon goodies__icon--description">
									<use xlink:href="#artworks">
										<symbol viewBox="0 0 30 30" id="artworks">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<g fill="#272727">
															<path d="M6,20 L6,22 L0,22 L0,0 L22,0 L22,4 L20,4 L20,2 L2,2 L2,16 L6,16 L6,20 Z"></path>
															<path d="M8,6 L30,6 L30,28 L8,28 L8,6 Z M10,8 L10,22 L28,22 L28,8 L10,8 Z"></path>
													</g>
											</g>
										</symbol>
									</use>
								</svg>
								<span class="goodies__description-text">Cyberpunk 2020 sourcebook</span>
							</span>
							<span class="goodies__item">
								<svg class="ic-svg goodies__icon goodies__icon--description">
									<use xlink:href="#artworks">
										<symbol viewBox="0 0 30 30" id="artworks">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<g fill="#272727">
															<path d="M6,20 L6,22 L0,22 L0,0 L22,0 L22,4 L20,4 L20,2 L2,2 L2,16 L6,16 L6,20 Z"></path>
															<path d="M8,6 L30,6 L30,28 L8,28 L8,6 Z M10,8 L10,22 L28,22 L28,8 L10,8 Z"></path>
													</g>
											</g>
										</symbol>
									</use>
								</svg>
								<span class="goodies__description-text">A digital booklet with art from the game</span>
							</span>
							<span class="goodies__item">
								<svg class="ic-svg goodies__icon goodies__icon--description">
									<use xlink:href="#artworks">
										<symbol viewBox="0 0 30 30" id="artworks">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<g fill="#272727">
															<path d="M6,20 L6,22 L0,22 L0,0 L22,0 L22,4 L20,4 L20,2 L2,2 L2,16 L6,16 L6,20 Z"></path>
															<path d="M8,6 L30,6 L30,28 L8,28 L8,6 Z M10,8 L10,22 L28,22 L28,8 L10,8 Z"></path>
													</g>
											</g>
										</symbol>
									</use>
								</svg>
								<span class="goodies__description-text"> Wallpapers for desktop and mobile</span>
							</span>
							<span class="goodies__item">
								<svg class="ic-svg goodies__icon goodies__icon--description">
									<use xlink:href="#wallpapers">
										<symbol viewBox="0 0 30 30" id="wallpapers">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<g fill="#272727">
															<path d="M8,26 L8,24 L0,24 L0,0 L30,0 L30,24 L22,24 L22,26 L24,26 L24,28 L6,28 L6,26 L8,26 Z M2,4 L2,20 L28,20 L28,4 L2,4 Z"></path>
															<path d="M19.046875,18 L17.453125,18 L17.453125,14.2441406 L15.3496094,14.2441406 L15.3496094,18 L13.7558594,18 L13.7558594,9.43359375 L15.3496094,9.43359375 L15.3496094,12.8378906 L17.453125,12.8378906 L17.453125,9.43359375 L19.046875,9.43359375 L19.046875,18 Z M26.0078125,13.6347656 C26.0078125,15.0488352 25.7197294,16.1298791 25.1435547,16.8779297 C24.5673799,17.6259803 23.7382867,18 22.65625,18 L20.5585938,18 L20.5585938,9.43359375 L22.8496094,9.43359375 C23.8457081,9.43359375 24.621091,9.80175413 25.1757812,10.5380859 C25.7304715,11.2744177 26.0078125,12.306634 26.0078125,13.6347656 Z M24.3730469,13.6816406 C24.3730469,11.7675686 23.8457084,10.8105469 22.7910156,10.8105469 L22.1523438,10.8105469 L22.1523438,16.6054688 L22.6679688,16.6054688 C23.2500029,16.6054688 23.6796861,16.3623071 23.9570312,15.8759766 C24.2343764,15.389646 24.3730469,14.658208 24.3730469,13.6816406 Z"></path>
													</g>
											</g>
										</symbol>
									</use>
								</svg>
								<span class="goodies__description-text"> An additional set of wallpapers and avatars</span>
							</span>
							<span class="goodies__item">
								<svg class="ic-svg goodies__icon goodies__icon--description">
									<use xlink:href="#artworks">
										<symbol viewBox="0 0 30 30" id="artworks">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<g fill="#272727">
															<path d="M6,20 L6,22 L0,22 L0,0 L22,0 L22,4 L20,4 L20,2 L2,2 L2,16 L6,16 L6,20 Z"></path>
															<path d="M8,6 L30,6 L30,28 L8,28 L8,6 Z M10,8 L10,22 L28,22 L28,8 L10,8 Z"></path>
													</g>
											</g>
										</symbol>
									</use>
								</svg>
								<span class="goodies__description-text">Ready-to-print Cyberpunk 2077 posters</span>
							</span>
							<span class="goodies__item">
								<svg class="ic-svg goodies__icon goodies__icon--description">
									<use xlink:href="#audio">
										<symbol viewBox="0 0 30 30" id="audio">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<path d="M26.4990324,18.7598684 L26.4990324,6 L12.4990324,6 L12.4990324,21.7220091 C12.9385656,23.9425869 10.9980065,26.5397561 7.8931066,27.7316155 C4.54169209,29.018103 1.10282325,28.1801053 0.212178057,25.8598953 C-0.678467133,23.5396852 1.31638055,20.6158792 4.66779506,19.3293917 C5.9846709,18.8238904 7.31504926,18.6463991 8.49903236,18.7579533 L8.49903236,6 L8.49903236,0 L30.4990324,0 L30.4990324,6 L30.4990324,21.8334715 C30.5556131,22.1839412 30.5540455,22.5429579 30.4990324,22.9036291 L30.4990324,23 L30.4830705,23 C30.1493121,24.8677581 28.3953936,26.7633927 25.8730871,27.7316155 C22.5216726,29.018103 19.0828037,28.1801053 18.1921585,25.8598953 C17.3015133,23.5396852 19.296361,20.6158792 22.6477755,19.3293917 C23.9720787,18.8210393 25.3100372,18.6444074 26.4990324,18.7598684 Z" fill="#272727"></path>
											</g>
										</symbol>
									</use>
								</svg>
								<span class="goodies__description-text">soundtrack</span>
							</span>
						</div>
					</div>
					<div class="content-summary-offset">
						<div class="title title--no-margin">
							<div class="title__underline-text">System requirements</div>
							<div class="title__additional-options">
								<div class="productcard-basics__wrapper windows">
									<div class="product-tile__info-operating-system">
										<!-- icon windows -->
										<?php if($gc_g_os_win == "1"){ ?>
											<span class="svg-border-bottom before-svg-border-bottom" ng-system="win" ng-game-id="<?php echo $GameIDInDB; ?>">
												<svg class="ic-svg productcard-os-support__system">
													<use xlink:href="#windows"><symbol viewBox="0 0 32 32" id="windows">
														<g id="windows_icomoon-ignore">
															<line stroke-width="1" stroke="#449FDB"></line>
														</g>
															<path d="M12.882 15.997c-1.491-0.766-2.94-1.155-4.309-1.155-0.186 0-0.373 0.006-0.561 0.022-1.746 0.145-3.341 0.605-4.367 0.963-0.272 0.1-0.551 0.205-0.838 0.322l-2.807 9.731c1.928-0.713 3.634-1.061 5.196-1.061 2.526 0 4.36 0.944 5.875 1.916 0.718-2.435 2.439-8.315 2.953-10.073-0.373-0.228-0.752-0.455-1.141-0.666zM16.511 18.471l-2.826 9.817c0.838 0.48 3.659 2.002 5.819 2.002 1.744 0 3.695-0.447 5.964-1.369l2.699-9.437c-1.832 0.591-3.59 0.891-5.233 0.891-2.998 0-5.097-0.972-6.422-1.905zM9.151 11.525c2.41 0.025 4.192 0.944 5.669 1.891l2.898-9.917c-0.611-0.35-2.213-1.222-3.371-1.519-0.762-0.178-1.563-0.269-2.413-0.269-1.619 0.030-3.387 0.436-5.403 1.244l-2.764 9.706c2.025-0.764 3.77-1.136 5.378-1.136 0.001 0 0.004 0 0.004 0zM32 6.191c-1.838 0.713-3.631 1.077-5.345 1.077-2.865 0-4.978-0.994-6.347-1.949l-2.873 9.945c1.93 1.241 4.009 1.871 6.191 1.871 1.78 0 3.623-0.427 5.483-1.271l-0.006-0.069 0.117-0.028 2.779-9.576z"></path>
														</symbol>
													</use>
												</svg>
											</span>
										<?php } ?>
										<!-- icon linux -->
										<?php if($gc_g_os_mac == "1"){ ?>
											<span ng-system="mac" ng-game-id="<?php echo $GameIDInDB; ?>" class="svg-border-bottom <?php if($gc_g_os_win == "0"){ echo 'before-svg-border-bottom'; } ?>">
												<svg class="ic-svg productcard-os-support__system"><use xlink:href="#osx"><symbol viewBox="0 0 32 32" id="osx">
													<g id="osx_icomoon-ignore">
														<line stroke-width="1" stroke="#449FDB" opacity=""></line>
													</g>
														<path d="M24.734 17.003c-0.040-4.053 3.305-5.996 3.454-6.093-1.88-2.751-4.808-3.127-5.851-3.171-2.492-0.252-4.862 1.467-6.127 1.467-1.261 0-3.213-1.43-5.28-1.392-2.716 0.040-5.221 1.579-6.619 4.012-2.822 4.897-0.723 12.151 2.028 16.123 1.344 1.944 2.947 4.127 5.051 4.049 2.026-0.081 2.793-1.311 5.242-1.311s3.138 1.311 5.283 1.271c2.18-0.041 3.562-1.981 4.897-3.931 1.543-2.255 2.179-4.439 2.216-4.551-0.048-0.022-4.252-1.632-4.294-6.473zM20.705 5.11c1.117-1.355 1.871-3.235 1.665-5.11-1.609 0.066-3.559 1.072-4.713 2.423-1.036 1.199-1.942 3.113-1.699 4.951 1.796 0.14 3.629-0.913 4.747-2.264z"></path>
													</symbol></use>
												</svg>
											</span>
										<?php } ?>
										<!-- icon mac -->
										<?php if($gc_g_os_linux == "1"){ ?>
											<span ng-system="lin" ng-game-id="<?php echo $GameIDInDB; ?>" class="svg-border-bottom <?php if($gc_g_os_win == "0" && $gc_g_os_mac == "0"){ echo 'before-svg-border-bottom'; } ?>">
												<svg class="ic-svg productcard-os-support__system"><use xlink:href="#linux"><symbol viewBox="0 0 45 41" id="linux">
													<path d="M44.4,27.3c-1,0.7-3.2-0.6-4.4-1.3c-1.1-0.7-2-0.5-2-0.5l0,0c0,2.1-1.3,5.7-1.9,7.1l0,0l-0.6,1.4c2.1,0.6,5.3,1.7,5.3,2.9
														c0,0,0,0.1,0,0.1c0.1,0.2,0.1,0.5,0.1,0.7c0,1.8-1.8,3.3-3.9,3.3h-9.7c-1.4,0-2.6-0.6-3.3-1.5h-3.1C20.2,40.4,19,41,17.6,41H8
														c-2.2,0-3.9-1.5-3.9-3.4c0-0.2,0-0.5,0.1-0.7c0,0,0-0.1,0-0.1c0-1.2,3.2-2.4,5.3-3l-0.6-1.5l0,0c-0.6-1-1.9-4.9-1.9-6.9l0,0.1
														c0,0-0.9-0.2-2,0.5c-1.1,0.7-3.4,2.1-4.3,1.3c-1-0.7-0.5-1.3,0.2-2.2c0.8-0.9,8.1-7,8.3-8.7c0.2-1.7,0.5-7.4,0.7-8
														C10,7.7,12.4,0.2,22.2,0v0c0,0-0.6,0-1.2,0c0,0,0,0,0,0c0.2,0,0.5,0,0.7,0c0.2,0,0.5,0,0.8,0c0.3,0,0.5,0,0.8,0c0.2,0,0.4,0,0.6,0
														c0,0,0,0,0,0c-0.6,0-1.1,0-1.1,0v0C33.1,0.2,35,7.7,35.2,8.3c0.2,0.6,0.6,6.3,0.7,8c0.2,1.7,7.5,7.8,8.3,8.7
														C45,26,45.4,26.6,44.4,27.3z M28,15.6c1.3-0.6,2.3-2,2.3-3.5c0-2.1-1.7-3.9-3.7-3.9c-1.5,0-2.8,0.9-3.4,2.3l-0.6-0.7l-0.6,0.7
														c-0.6-1.3-1.9-2.3-3.4-2.3c-2.1,0-3.7,1.7-3.7,3.9c0,1.6,0.9,3,2.3,3.5 M19.2,16.1L19.2,16.1c0-0.1-0.1-0.3-0.1-0.4
														c0-0.1,0-0.1,0-0.2c0-0.2,0.1-0.3,0.2-0.5c0.5-0.5,1.2-0.9,1.4-0.9h1.6h1.5c0.2,0,0.8,0.5,1.3,0.9c0.1,0.1,0.2,0.3,0.2,0.4
														c0,0.2,0,0.3,0,0.5 M25.4,16.3L25.4,16.3c-0.1,0.2-0.1,0.3-0.1,0.3s-1.5,2-2,2.6c-0.5,0.6-0.9,0.5-0.9,0.5s-0.5,0.1-1-0.5
														c-0.5-0.6-2-2.6-2-2.6s0-0.1-0.1-0.2l0,0c-5,4-6.3,13.3-6,15.2c0,0.2,0.1,0.5,0.2,0.8c0.7-0.1,0.2,1,1.2,1c3.7,0,6.5,1.4,6.9,3.2
														c0.2,0.3,0.2,0.6,0.2,0.9c0,0.4-0.1,0.7-0.3,1h2c-0.2-0.3-0.3-0.6-0.3-1c0-0.4,0.2-0.8,0.4-1.1c0.7-1.7,3.3-3,6.8-3
														c1,0,0.5-1.1,1.2-1c0.1-0.3,0.1-0.5,0.2-0.8C32,29.6,31.1,20.8,25.4,16.3z M23.8,13.1c-0.4,0-0.8-0.7-0.8-1.6c0-0.9,0.4-1.6,0.8-1.6
														s0.8,0.7,0.8,1.6C24.6,12.4,24.3,13.1,23.8,13.1z M21.2,13.1c-0.4,0-0.8-0.7-0.8-1.6c0-0.9,0.4-1.6,0.8-1.6c0.4,0,0.8,0.7,0.8,1.6
														C22,12.4,21.6,13.1,21.2,13.1z"></path>
													</symbol></use>
												</svg>
											</span>
										<?php } ?>
										<!-- svg-border-bottom -->
									</div>
								</div>
							</div>
						</div>
						<div id="systemRequirementOperetion" class="system-requirements  table table--without-border">
							<div class="table-header">
								<div class="system-requirements__minimum-header">Minimum system requirements:</div>
								<div class="system-requirements__recommended-header hide-on-small-screens">Recommended system requirements:</div>
							</div>
							<?php if($activeOperetingSystemMin[0] != "disabled" && $activeOperetingSystemRec[0] != "disabled"){ ?>
								<div class="table__row ng-scop">
									<div class="table__row-label system-requirements__label ng-binding">System:</div>
									<div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[0] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[0]; } ?></div>
									<div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[0] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[0]; } ?></div>
								</div>
							<?php } ?>
							<?php if($activeOperetingSystemMin[1] != "disabled" && $activeOperetingSystemRec[1] != "disabled"){ ?>
								<div class="table__row ng-scop">
									<div class="table__row-label system-requirements__label ng-binding">Processor:</div>
									<div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[1] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[1]; } ?></div>
									<div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[1] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[1]; } ?></div>
								</div>
							<?php } ?>
							<?php if($activeOperetingSystemMin[2] != "disabled" && $activeOperetingSystemRec[2] != "disabled"){ ?>
								<div class="table__row ng-scop">
									<div class="table__row-label system-requirements__label ng-binding">Memory:</div>
									<div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[2] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[2]; } ?></div>
									<div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[2] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[2]; } ?></div>
								</div>
							<?php } ?>
							<?php if($activeOperetingSystemMin[3] != "disabled" && $activeOperetingSystemRec[3] != "disabled"){ ?>
								<div class="table__row ng-scop">
									<div class="table__row-label system-requirements__label ng-binding">Graphics:</div>
									<div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[3] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[3]; } ?></div>
									<div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[3] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[3]; } ?></div>
								</div>
							<?php } ?>
							<?php if($activeOperetingSystemMin[4] != "disabled" && $activeOperetingSystemRec[4] != "disabled"){ ?>
								<div class="table__row ng-scop">
									<div class="table__row-label system-requirements__label ng-binding">DirectX:</div>
									<div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[4] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[4]; } ?></div>
									<div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[4] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[4]; } ?></div>
								</div>
							<?php } ?>
							<?php if($activeOperetingSystemMin[5] != "disabled" && $activeOperetingSystemRec[5] != "disabled"){ ?>
								<div class="table__row ng-scop">
									<div class="table__row-label system-requirements__label ng-binding">Storage:</div>
									<div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[5] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[5]; } ?></div>
									<div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[5] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[5]; } ?></div>
								</div>
							<?php } ?>
							<?php if($activeOperetingSystemMin[6] != "disabled" && $activeOperetingSystemRec[6] != "disabled"){ ?>
								<div class="table__row ng-scop">
									<div class="table__row-label system-requirements__label ng-binding">Sound:</div>
									<div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[6] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[6]; } ?></div>
									<div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[6] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[6]; } ?></div>
								</div>
							<?php } ?>
							<?php if($activeOperetingSystemMin[7] != "disabled" && $activeOperetingSystemRec[7] != "disabled"){ ?>
								<div class="table__row ng-scop">
									<div class="table__row-label system-requirements__label ng-binding">Other:</div>
									<div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[7] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[7]; } ?></div>
									<div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[7] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[7]; } ?></div>
								</div>
							<?php } ?>
						</div>
						<div class="system-requirements  table table--without-border show-on-small-screens ng-hide">
							<div class="table-header">
								<div class="system-requirements__recommended-header hide-on-small-screens">Recommended system requirements:</div>
							</div>
							<div class="table__row ng-scop">
								<div class="table__row-label system-requirements__label ng-binding">System:</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="layout-side-col">
				<div class="why-gog hide-when-content-is-expanded-why-gog">
					<div class="title">
						<div class="title__underline-text">Why buy on GOG.COM?</div>
					</div>
					<div class="why-gog__item">
						<svg class="why-gog__item-icon">
							<use xlink:href="#tick">
								<symbol viewBox="0 0 8 6" id="tick">
									<defs>
											<path d="M2.34695426,5.46945944 C2.66731759,5.80095008 3.16946272,5.80095008 3.48982605,5.46945944 L7.14182605,1.49038252 C7.44693225,1.14471337 7.44193089,0.596111976 7.13058303,0.257131021 C6.81923518,-0.0818499338 6.31634166,-0.0862206892 6.00008246,0.247305598 L2.91782605,3.62576714 L1.37782605,1.94699791 C1.17407474,1.72450386 0.876993201,1.63749274 0.598489179,1.7187408 C0.319985156,1.79998885 0.102370044,2.03715258 0.027617357,2.34089467 C-0.0471353305,2.64463677 0.0323311195,2.96881159 0.236082461,3.1913056 L2.34695426,5.46945944 Z" id="tick_path-1"></path>
									</defs>
									<g id="tick_PRODUCT-PAGE" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g id="tick_###-ASSET-EXPORT-ARTBOARD-###" transform="translate(-376.000000, -443.000000)">
													<g id="tick_Icon-tick" transform="translate(376.000000, 443.000000)">
															<mask id="tick_mask-2" fill="white">
																	<use xlink:href="#tick_path-1"></use>
															</mask>
															<use id="tick_icon-path" fill="currentColor" fill-rule="evenodd" xlink:href="#tick_path-1"></use>
															<g id="tick_FILL-BLACK" mask="url(#tick_mask-2)" fill="#212121" fill-rule="evenodd">
																	<rect id="tick_Rectangle-2" x="0" y="0" width="8" height="6"></rect>
															</g>
													</g>
											</g>
									</g>
								</symbol>
							</use>
						</svg>
						<b>DRM FREE</b>
						. No activation or online connection required to play.
					</div>
					<div class="why-gog__item">
						<svg class="why-gog__item-icon">
							<use xlink:href="#tick">
								<symbol viewBox="0 0 8 6" id="tick">
									<defs>
											<path d="M2.34695426,5.46945944 C2.66731759,5.80095008 3.16946272,5.80095008 3.48982605,5.46945944 L7.14182605,1.49038252 C7.44693225,1.14471337 7.44193089,0.596111976 7.13058303,0.257131021 C6.81923518,-0.0818499338 6.31634166,-0.0862206892 6.00008246,0.247305598 L2.91782605,3.62576714 L1.37782605,1.94699791 C1.17407474,1.72450386 0.876993201,1.63749274 0.598489179,1.7187408 C0.319985156,1.79998885 0.102370044,2.03715258 0.027617357,2.34089467 C-0.0471353305,2.64463677 0.0323311195,2.96881159 0.236082461,3.1913056 L2.34695426,5.46945944 Z" id="tick_path-1"></path>
									</defs>
									<g id="tick_PRODUCT-PAGE" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<g id="tick_###-ASSET-EXPORT-ARTBOARD-###" transform="translate(-376.000000, -443.000000)">
													<g id="tick_Icon-tick" transform="translate(376.000000, 443.000000)">
															<mask id="tick_mask-2" fill="white">
																	<use xlink:href="#tick_path-1"></use>
															</mask>
															<use id="tick_icon-path" fill="currentColor" fill-rule="evenodd" xlink:href="#tick_path-1"></use>
															<g id="tick_FILL-BLACK" mask="url(#tick_mask-2)" fill="#212121" fill-rule="evenodd">
																	<rect id="tick_Rectangle-2" x="0" y="0" width="8" height="6"></rect>
															</g>
													</g>
											</g>
									</g>
								</symbol>
							</use>
						</svg>
						<a href="#" class="un ng-scope">
							<b>Safety and satisfaction</b>
						</a>
						. Stellar support 24/7 and full refunds up to 30 days.
					</div>
				</div>
				<div class="content-summary-section">
					<div class="title">
						<div class="title__underline-text">Game details</div>
					</div>
					<div class="details table table--without-border">
						<!-- First tab -->
						<div class="table__row details__row">
							<div class="details__category table__row-label">Genre:</div>
							<div class="details__content table__row-content">
								<a href="#" class="details__link ng-scope">Action</a>
								-
								<a href="#" class="details__link ng-scope">Role-playing</a>
								-
								<a href="#" class="details__link ng-scope">Sci-fi</a>
							</div>
						</div>
						<div class="table__row details__row">
							<div class="details__category table__row-label">Works on:</div>
							<div class="details__content table__row-content">Windows (10)</div>
						</div>
						<div class="table__row details__row">
							<div class="details__category table__row-label">Release date:</div>
							<div class="details__content table__row-content"><?php echo $gc_g_release_date; ?></div>
						</div>
						<div class="table__row details__row">
							<div class="details__category table__row-label">Company:</div>
							<div class="details__content table__row-content">
								<a href="#" class="details__link ng-scope">CD PROJEKT RED</a>
								/
								<a href="#" class="details__link ng-scope">CD PROJEKT RED</a>
							</div>
						</div>
						<div class="table__row details__row">
							<div class="details__category table__row-label">Links:</div>
							<div class="details__content table__row-content">
								<a href="#" class="details__link ng-scope">Forum discussion</a>
							</div>
						</div>
						<hr class="details__separator">

						<!-- features [$gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O] -->
						<?php $equalZero = "zero"; ?>
						<?php if($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[0] != "0"){ $equalZero = "one"; ?>
							<div class="table__row details__rating details__row <?php if($equalZero == "one"){ echo 'details__row--first'; } else { echo 'details__row--without-label'; } ?>">
								<?php if($equalZero == "one"){ ?>
									<div class="details__category table__row-label">Game features</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<a href="#" class="details__feature ng-scope">
										<svg class="details__feature-icon details__feature-icon--single">
											<use xlink:href="#single">
												<symbol viewBox="0 0 40 40" id="single">
														<g transform="translate(-921.000000, -930.000000)" fill-rule="nonzero" fill="#000000">
																<g transform="translate(921.000000, 896.000000)">
																		<g transform="translate(0.000000, 34.000000)">
																				<g>
																						<path d="M20.5,19 C21.8807119,19 23,17.8807119 23,16.5 C23,15.1192881 21.8807119,14 20.5,14 C19.1192881,14 18,15.1192881 18,16.5 C18,17.8807119 19.1192881,19 20.5,19 Z M20.5,20 C18.5670034,20 17,18.4329966 17,16.5 C17,14.5670034 18.5670034,13 20.5,13 C22.4329966,13 24,14.5670034 24,16.5 C24,18.4329966 22.4329966,20 20.5,20 Z"></path>
																						<path d="M20.5,27 C22.4728172,27 24.3621244,26.4557008 25.9997439,25.4463655 C25.9709612,22.4335005 23.5196679,20 20.5,20 C17.4803321,20 15.0290388,22.4335005 15.0002561,25.4463655 C16.6378756,26.4557008 18.5271828,27 20.5,27 Z M14.0190352,26.0011862 C14.0064221,25.8357782 14,25.6686391 14,25.5 C14,21.9101491 16.9101491,19 20.5,19 C24.0898509,19 27,21.9101491 27,25.5 C27,25.6686391 26.9935779,25.8357782 26.9809648,26.0011862 C25.1355646,27.2624053 22.9039195,28 20.5,28 C18.0960805,28 15.8644354,27.2624053 14.0190352,26.0011862 Z"></path>
																				</g>
																		</g>
																</g>
														</g>
												</symbol>
											</use>
										</svg>
										 Single-player
										<svg class="details__feature-chevron-icon">
											<use xlink:href="#chevron-right">
												<symbol viewBox="0 0 9 16" id="chevron-right">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
															<g stroke-width="2" stroke="currentColor">
																	<polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
									</a>
								</div>
							</div>
						<?php } ?>
						<?php if($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[1] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($equalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($equalZero == "zero"){ $equalZero = "one"; ?>
									<div class="details__category table__row-label">Game features</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<a href="#" class="details__feature ng-scope">
										<svg class="details__feature-icon details__feature-icon--multi">
											<use xlink:href="#multi">
												<symbol viewBox="0 0 40 40" id="multi">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <g transform="translate(-921.000000, -1010.000000)" fill-rule="nonzero" fill="#000000">
											            <g transform="translate(921.000000, 896.000000)">
											                <g transform="translate(0.000000, 114.000000)">
											                    <g>
											                        <path d="M23.1743601,18.7402362 C23.5832312,18.9076879 24.0308353,19 24.5,19 C26.4329966,19 28,17.4329966 28,15.5 C28,13.5670034 26.4329966,12 24.5,12 C22.899931,12 21.5506393,13.0737055 21.133317,14.5399246 L22.0714346,14.9041971 C22.3386746,13.8111465 23.3246106,13 24.5,13 C25.8807119,13 27,14.1192881 27,15.5 C27,16.8807119 25.8807119,18 24.5,18 C24.1877859,18 23.8889391,17.9427677 23.6133786,17.8382222 L23.4920654,18.4671631 L23.1743601,18.7402362 Z"></path>
											                        <path d="M19.9065395,14.6931342 C19.5422127,13.14911 18.1553009,12 16.5,12 C14.5670034,12 13,13.5670034 13,15.5 C13,17.4329966 14.5670034,19 16.5,19 C16.9580658,19 17.395579,18.9120039 17.7965574,18.7519939 L17.4869995,18.5203247 L17.5134888,18.0575562 L17.511784,17.7867931 C17.2024542,17.9238573 16.8601191,18 16.5,18 C15.1192881,18 14,16.8807119 14,15.5 C14,14.1192881 15.1192881,13 16.5,13 C17.687458,13 18.6815521,13.8278894 18.9365694,14.9379552 L19.4216309,14.6540527 L19.9065395,14.6931342 Z"></path>
											                        <path d="M23.4293334,18.0877595 C23.7776489,18.0300326 24.1353172,18 24.5,18 C28.0898509,18 31,20.9101491 31,24.5 C31,24.6686391 30.9935779,24.8357782 30.9809648,25.0011862 C29.3464164,26.1183009 27.4088438,26.8246119 25.316935,26.9714315 L26.3352661,26.3621216 L26.4043419,25.8278605 C27.682575,25.5938926 28.8981079,25.1253511 29.9997439,24.4463655 C29.9709612,21.4335005 27.5196679,19 24.5,19 C24.1462726,19 23.8003444,19.0333926 23.4651958,19.0971975 L23.4293334,18.0877595 Z"></path>
											                        <path d="M17.4185098,18.0643942 C17.1184411,18.0219518 16.8117841,18 16.5,18 C12.9101491,18 10,20.9101491 10,24.5 C10,24.6686391 10.0064221,24.8357782 10.0190352,25.0011862 C11.5040563,26.016108 13.2391965,26.6919485 15.1129546,26.9172062 L14.2810669,26.2910767 L14.3370079,25.7771406 C13.1534152,25.5295081 12.0273347,25.0793982 11.0002561,24.4463655 C11.0290388,21.4335005 13.4803321,19 16.5,19 C16.853644,19 17.1994923,19.0333769 17.5345668,19.0971523 L17.4185098,18.0643942 L17.4185098,18.0643942 Z"></path>
											                        <path d="M20.5,20 C21.8807119,20 23,18.8807119 23,17.5 C23,16.1192881 21.8807119,15 20.5,15 C19.1192881,15 18,16.1192881 18,17.5 C18,18.8807119 19.1192881,20 20.5,20 Z M20.5,21 C18.5670034,21 17,19.4329966 17,17.5 C17,15.5670034 18.5670034,14 20.5,14 C22.4329966,14 24,15.5670034 24,17.5 C24,19.4329966 22.4329966,21 20.5,21 Z"></path>
											                        <path d="M20.5,28 C22.4728172,28 24.3621244,27.4557008 25.9997439,26.4463655 C25.9709612,23.4335005 23.5196679,21 20.5,21 C17.4803321,21 15.0290388,23.4335005 15.0002561,26.4463655 C16.6378756,27.4557008 18.5271828,28 20.5,28 Z M14.0190352,27.0011862 C14.0064221,26.8357782 14,26.6686391 14,26.5 C14,22.9101491 16.9101491,20 20.5,20 C24.0898509,20 27,22.9101491 27,26.5 C27,26.6686391 26.9935779,26.8357782 26.9809648,27.0011862 C25.1355646,28.2624053 22.9039195,29 20.5,29 C18.0960805,29 15.8644354,28.2624053 14.0190352,27.0011862 Z"></path>
											                    </g>
											                </g>
											            </g>
											        </g>
											    </g>
											</symbol>
											</use>
										</svg>
										 Multi-player
										<svg class="details__feature-chevron-icon">
											<use xlink:href="#chevron-right">
												<symbol viewBox="0 0 9 16" id="chevron-right">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
															<g stroke-width="2" stroke="currentColor">
																	<polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
									</a>
								</div>
							</div>
						<?php } ?>
						<?php if($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[2] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($equalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($equalZero == "zero"){ $equalZero = "one"; ?>
									<div class="details__category table__row-label">Game features</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<a href="#" class="details__feature ng-scope">
										<svg class="details__feature-icon details__feature-icon--coop">
											<use xlink:href="#coop">
												<symbol viewBox="0 0 40 40" id="coop">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <g transform="translate(-921.000000, -970.000000)" fill-rule="nonzero" fill="#000000">
											            <g transform="translate(921.000000, 896.000000)">
											                <g transform="translate(0.000000, 74.000000)">
											                    <g>
											                        <path d="M24.5,18 C25.8807119,18 27,16.8807119 27,15.5 C27,14.1192881 25.8807119,13 24.5,13 C23.1192881,13 22,14.1192881 22,15.5 C22,16.8807119 23.1192881,18 24.5,18 Z M24.5,19 C22.5670034,19 21,17.4329966 21,15.5 C21,13.5670034 22.5670034,12 24.5,12 C26.4329966,12 28,13.5670034 28,15.5 C28,17.4329966 26.4329966,19 24.5,19 Z"></path>
											                        <path d="M21.755905,26.2517471 L21.2574155,26.5365143 C22.2858218,26.8381753 23.3740128,27 24.5,27 C26.9039195,27 29.1355646,26.2624053 30.9809648,25.0011862 C30.9935779,24.8357782 31,24.6686391 31,24.5 C31,20.9101491 28.0898509,18 24.5,18 C22.5000563,18 20.711073,18.9032292 19.5187205,20.3240175 L20.3234718,20.9212143 C21.3321835,19.7451208 22.8290756,19 24.5,19 C27.5196679,19 29.9709612,21.4335005 29.9997439,24.4463655 C28.3621244,25.4557008 26.4728172,26 24.5,26 C23.7395289,26 22.9914667,25.9191222 22.2654461,25.7619066 L22.2599203,25.8644433 L22.2654461,25.7619066 L21.755905,26.2517471 Z"></path>
											                        <path d="M16.5,19 C17.8807119,19 19,17.8807119 19,16.5 C19,15.1192881 17.8807119,14 16.5,14 C15.1192881,14 14,15.1192881 14,16.5 C14,17.8807119 15.1192881,19 16.5,19 Z M16.5,20 C14.5670034,20 13,18.4329966 13,16.5 C13,14.5670034 14.5670034,13 16.5,13 C18.4329966,13 20,14.5670034 20,16.5 C20,18.4329966 18.4329966,20 16.5,20 Z"></path>
											                        <path d="M16.5,27 C18.4728172,27 20.3621244,26.4557008 21.9997439,25.4463655 C21.9709612,22.4335005 19.5196679,20 16.5,20 C13.4803321,20 11.0290388,22.4335005 11.0002561,25.4463655 C12.6378756,26.4557008 14.5271828,27 16.5,27 Z M10.0190352,26.0011862 C10.0064221,25.8357782 10,25.6686391 10,25.5 C10,21.9101491 12.9101491,19 16.5,19 C20.0898509,19 23,21.9101491 23,25.5 C23,25.6686391 22.9935779,25.8357782 22.9809648,26.0011862 C21.1355646,27.2624053 18.9039195,28 16.5,28 C14.0960805,28 11.8644354,27.2624053 10.0190352,26.0011862 Z"></path>
											                    </g>
											                </g>
											            </g>
											        </g>
											    </g>
											</symbol>
											</use>
										</svg>
										 co-op
										<svg class="details__feature-chevron-icon">
											<use xlink:href="#chevron-right">
												<symbol viewBox="0 0 9 16" id="chevron-right">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
															<g stroke-width="2" stroke="currentColor">
																	<polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
									</a>
								</div>
							</div>
						<?php } ?>
						<?php if($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[3] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($equalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($equalZero == "zero"){ $equalZero = "one"; ?>
									<div class="details__category table__row-label">Game features</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<a href="#" class="details__feature ng-scope">
										<svg class="details__feature-icon details__feature-icon--achievements">
											<use xlink:href="#achievements">
												<symbol viewBox="0 0 40 40" id="achievements">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <g transform="translate(-921.000000, -1090.000000)" fill-rule="nonzero" fill="#000000">
											            <g transform="translate(921.000000, 896.000000)">
											                <g transform="translate(0.000000, 194.000000)">
											                    <g>
											                        <path d="M17,14 L17,19.5 C17,20.9953366 17.9464375,22.3109351 19.3332461,22.8011016 L20,23.0367652 L20,27 L21,27 L21,23.0367652 L21.6667539,22.8011016 C23.0535625,22.3109351 24,20.9953366 24,19.5 L24,14 L17,14 Z M19,27 L19,23.7439414 C17.2522114,23.1261868 16,21.4593282 16,19.5 L16,13 L25,13 L25,19.5 C25,21.4593282 23.7477886,23.1261868 22,23.7439414 L22,27 L24,27 L24,28 L17,28 L17,27 L19,27 Z"></path>
											                        <path d="M16.0074463,19.5090485 L16.0074463,15.0067931 L14,15.0022605 L14,18 C14,19.2814476 14.9241032,20.4893761 16.346931,21.2378535 C16.1255109,20.6916887 16.0074463,20.1100087 16.0074463,19.5090485 Z M17.0074463,14.0090485 L17.0074463,19.5090485 C17.0074463,20.9160867 17.8394243,22.1722982 19.1423705,22.997474 C15.7907316,22.8212703 13,20.6461675 13,18 L13,14 L17.0074463,14.0090485 Z"></path>
											                        <path d="M24.8825624,19.5090485 L24.8825624,15.0067931 L22.8751161,15.0022605 L22.8751161,18 C22.8751161,19.2874735 23.7967554,20.4973651 25.2189655,21.2444497 C24.999316,20.6968341 24.8825624,20.1129359 24.8825624,19.5090485 Z M25.8825624,14.0090485 L25.8825624,19.5090485 C25.8825624,20.9160867 26.6924151,22.1722982 27.9953613,22.997474 C24.6437224,22.8212703 21.8751161,20.6461675 21.8751161,18 L21.8751161,14 L25.8825624,14.0090485 Z" transform="translate(24.935239, 18.498737) scale(-1, 1) translate(-24.935239, -18.498737) "></path>
											                    </g>
											                </g>
											            </g>
											        </g>
											    </g>
											</symbol>
											</use>
										</svg>
										 Achievements
										<svg class="details__feature-chevron-icon">
											<use xlink:href="#chevron-right">
												<symbol viewBox="0 0 9 16" id="chevron-right">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
															<g stroke-width="2" stroke="currentColor">
																	<polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
									</a>
								</div>
							</div>
						<?php } ?>
						<?php if($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[4] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($equalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($equalZero == "zero"){ $equalZero = "one"; ?>
									<div class="details__category table__row-label">Game features</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<a href="#" class="details__feature ng-scope">
										<svg class="details__feature-icon details__feature-icon--cloud-saves">
											<use xlink:href="#cloud-saves">
												<symbol viewBox="0 0 40 40" id="cloud-saves">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<g transform="translate(-921.000000, -1130.000000)" fill-rule="nonzero" fill="#000000">
																	<g transform="translate(921.000000, 896.000000)">
																			<g transform="translate(0.000000, 234.000000)">
																					<g>
																							<path d="M26.3674978,17.775467 L26.0337082,17.5298787 L25.9714724,17.1201766 C25.7874041,15.9084454 24.7395473,15 23.5,15 C23.1961937,15 22.9012995,15.0537565 22.624241,15.1573962 L22.0677222,15.365574 L21.6187888,14.9763311 C20.8963143,14.3499173 19.9765737,14 19,14 C17.1151708,14 15.496995,15.3144864 15.0947219,17.1297283 L15.0110911,17.5071092 L14.6953827,17.730131 C13.6395216,18.4760091 13,19.6834304 13,21 C13,23.209139 14.790861,25 17,25 L24,25 C26.209139,25 28,23.209139 28,21 C28,19.7107622 27.3870229,18.5255907 26.3674978,17.775467 Z M26.9601307,16.9699943 C28.1972264,17.8801973 29,19.3463497 29,21 C29,23.7614237 26.7614237,26 24,26 L17,26 C14.2385763,26 12,23.7614237 12,21 C12,19.3116096 12.8368575,17.8186778 14.1184082,16.9133688 C14.6145763,14.6744289 16.6117462,13 19,13 C20.2521036,13 21.3967119,13.4602421 22.2738801,14.2207814 C22.6554594,14.0780434 23.0686157,14 23.5,14 C25.2528242,14 26.704703,15.2885001 26.9601307,16.9699943 Z M18,25 L18,26 L23,26 L23,25 L18,25 Z"></path>
																							<polygon points="20 21 20 27 21 27 21 21 23 21 20.5 18 18 21"></polygon>
																					</g>
																			</g>
																	</g>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
										 Leaderboards
										<svg class="details__feature-chevron-icon">
											<use xlink:href="#chevron-right">
												<symbol viewBox="0 0 9 16" id="chevron-right">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
															<g stroke-width="2" stroke="currentColor">
																	<polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
									</a>
								</div>
							</div>
						<?php } ?>
						<?php if($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[5] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($equalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($equalZero == "zero"){ $equalZero = "one"; ?>
									<div class="details__category table__row-label">Game features</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<a href="#" class="details__feature ng-scope">
										<svg class="details__feature-icon details__feature-icon--controller-support">
											<use xlink:href="#controller-support">
												<symbol viewBox="0 0 40 40" id="controller-support">
											    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											        <g transform="translate(-414.000000, -314.000000)" fill="#000000">
											            <g transform="translate(414.000000, 314.000000)">
											                <path d="M16.4111,13 C14.5371,13 12.4521,15.373 11.4831,18.988 C10.4171,22.966 11.1751,26.625 13.1751,27.161 C13.3411,27.205 13.5101,27.227 13.6811,27.227 C14.9851,27.227 16.4201,25.974 17.5071,24.004 L21.5181,24.004 C22.6031,25.973 24.0391,27.226 25.3471,27.226 C25.5181,27.226 25.6881,27.204 25.8551,27.159 C27.8551,26.623 28.6171,22.979 27.5571,19.021 C26.5921,15.421 24.4631,13.032 22.5801,13.032 C22.3931,13.032 22.2081,13.057 22.0271,13.104 C21.5261,13.239 21.1011,13.551 20.7641,14.004 L18.2641,14.004 C17.9171,13.533 17.4811,13.21 16.9671,13.072 C16.7851,13.023 16.5991,13 16.4111,13 M16.4111,14 L16.4111,14 C16.5131,14 16.6131,14.013 16.7081,14.039 C16.9891,14.113 17.2411,14.302 17.4581,14.597 L17.7581,15.004 L18.2641,15.004 L20.7641,15.004 L21.2661,15.004 L21.5661,14.602 C21.7781,14.317 22.0131,14.144 22.2861,14.071 C22.3811,14.045 22.4781,14.032 22.5801,14.032 C23.8601,14.032 25.7101,15.995 26.5901,19.28 C27.0571,21.021 27.1611,22.803 26.8751,24.169 C26.6411,25.284 26.1631,26.041 25.5961,26.193 C25.5151,26.215 25.4331,26.226 25.3471,26.226 C24.4581,26.226 23.2991,25.164 22.3941,23.521 L22.1091,23.004 L21.5181,23.004 L17.5071,23.004 L16.9161,23.004 L16.6311,23.521 C15.7241,25.165 14.5661,26.227 13.6811,26.227 C13.5961,26.227 13.5131,26.216 13.4341,26.195 C12.1801,25.859 11.4921,22.816 12.4491,19.247 C13.3291,15.963 15.1551,14 16.4111,14"></path>
											            </g>
											        </g>
											    </g>
											</symbol>
											</use>
										</svg>
										 Controller Support
										<svg class="details__feature-chevron-icon">
											<use xlink:href="#chevron-right">
												<symbol viewBox="0 0 9 16" id="chevron-right">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
															<g stroke-width="2" stroke="currentColor">
																	<polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
									</a>
								</div>
							</div>
						<?php } ?>
						<?php if($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[6] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($equalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($equalZero == "zero"){ $equalZero = "one"; ?>
									<div class="details__category table__row-label">Game features</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<a href="#" class="details__feature ng-scope">
										<svg class="details__feature-icon details__feature-icon--cloud-saves">
											<use xlink:href="#cloud-saves">
												<symbol viewBox="0 0 40 40" id="cloud-saves">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<g transform="translate(-921.000000, -1130.000000)" fill-rule="nonzero" fill="#000000">
																	<g transform="translate(921.000000, 896.000000)">
																			<g transform="translate(0.000000, 234.000000)">
																					<g>
																							<path d="M26.3674978,17.775467 L26.0337082,17.5298787 L25.9714724,17.1201766 C25.7874041,15.9084454 24.7395473,15 23.5,15 C23.1961937,15 22.9012995,15.0537565 22.624241,15.1573962 L22.0677222,15.365574 L21.6187888,14.9763311 C20.8963143,14.3499173 19.9765737,14 19,14 C17.1151708,14 15.496995,15.3144864 15.0947219,17.1297283 L15.0110911,17.5071092 L14.6953827,17.730131 C13.6395216,18.4760091 13,19.6834304 13,21 C13,23.209139 14.790861,25 17,25 L24,25 C26.209139,25 28,23.209139 28,21 C28,19.7107622 27.3870229,18.5255907 26.3674978,17.775467 Z M26.9601307,16.9699943 C28.1972264,17.8801973 29,19.3463497 29,21 C29,23.7614237 26.7614237,26 24,26 L17,26 C14.2385763,26 12,23.7614237 12,21 C12,19.3116096 12.8368575,17.8186778 14.1184082,16.9133688 C14.6145763,14.6744289 16.6117462,13 19,13 C20.2521036,13 21.3967119,13.4602421 22.2738801,14.2207814 C22.6554594,14.0780434 23.0686157,14 23.5,14 C25.2528242,14 26.704703,15.2885001 26.9601307,16.9699943 Z M18,25 L18,26 L23,26 L23,25 L18,25 Z"></path>
																							<polygon points="20 21 20 27 21 27 21 21 23 21 20.5 18 18 21"></polygon>
																					</g>
																			</g>
																	</g>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
										 In Development
										<svg class="details__feature-chevron-icon">
											<use xlink:href="#chevron-right">
												<symbol viewBox="0 0 9 16" id="chevron-right">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
															<g stroke-width="2" stroke="currentColor">
																	<polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
									</a>
								</div>
							</div>
						<?php } ?>
						<?php if($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[7] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($equalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($equalZero == "zero"){ $equalZero = "one"; ?>
									<div class="details__category table__row-label">Game features</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<a href="#" class="details__feature ng-scope">
										<svg class="details__feature-icon details__feature-icon--cloud-saves">
											<use xlink:href="#cloud-saves">
												<symbol viewBox="0 0 40 40" id="cloud-saves">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<g transform="translate(-921.000000, -1130.000000)" fill-rule="nonzero" fill="#000000">
																	<g transform="translate(921.000000, 896.000000)">
																			<g transform="translate(0.000000, 234.000000)">
																					<g>
																							<path d="M26.3674978,17.775467 L26.0337082,17.5298787 L25.9714724,17.1201766 C25.7874041,15.9084454 24.7395473,15 23.5,15 C23.1961937,15 22.9012995,15.0537565 22.624241,15.1573962 L22.0677222,15.365574 L21.6187888,14.9763311 C20.8963143,14.3499173 19.9765737,14 19,14 C17.1151708,14 15.496995,15.3144864 15.0947219,17.1297283 L15.0110911,17.5071092 L14.6953827,17.730131 C13.6395216,18.4760091 13,19.6834304 13,21 C13,23.209139 14.790861,25 17,25 L24,25 C26.209139,25 28,23.209139 28,21 C28,19.7107622 27.3870229,18.5255907 26.3674978,17.775467 Z M26.9601307,16.9699943 C28.1972264,17.8801973 29,19.3463497 29,21 C29,23.7614237 26.7614237,26 24,26 L17,26 C14.2385763,26 12,23.7614237 12,21 C12,19.3116096 12.8368575,17.8186778 14.1184082,16.9133688 C14.6145763,14.6744289 16.6117462,13 19,13 C20.2521036,13 21.3967119,13.4602421 22.2738801,14.2207814 C22.6554594,14.0780434 23.0686157,14 23.5,14 C25.2528242,14 26.704703,15.2885001 26.9601307,16.9699943 Z M18,25 L18,26 L23,26 L23,25 L18,25 Z"></path>
																							<polygon points="20 21 20 27 21 27 21 21 23 21 20.5 18 18 21"></polygon>
																					</g>
																			</g>
																	</g>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
										 Cloud Saves
										<svg class="details__feature-chevron-icon">
											<use xlink:href="#chevron-right">
												<symbol viewBox="0 0 9 16" id="chevron-right">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
															<g stroke-width="2" stroke="currentColor">
																	<polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
															</g>
													</g>
												</symbol>
											</use>
										</svg>
									</a>
								</div>
							</div>
						<?php } ?>
						<?php if($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[8] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($equalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($equalZero == "zero"){ $equalZero = "one"; ?>
									<div class="details__category table__row-label">Game features</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<a href="#" class="details__feature ng-scope">
										<svg class="details__feature-icon details__feature-icon--overlay"><use xlink:href="#overlay"><symbol viewBox="0 0 40 40" id="overlay">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <g transform="translate(-921.000000, -1170.000000)" fill="#262626">
										            <g transform="translate(921.000000, 896.000000)">
										                <g transform="translate(0.000000, 234.000000)">
										                    <path d="M25,56 L24.109,56 L24.087,55.977 L24.064,56 L21,56 L21,57 L23.054,57 L20.525,59.502 L21.51,60.475 L24,58.011 L24,60 L25,60 L25,57.021 L25.023,56.998 L25,56.972 L25,56 Z M27,65.75 C27,66.44 26.44,67 25.75,67 L15.25,67 C14.56,67 14,66.44 14,65.75 L14,55.25 C14,54.56 14.56,54 15.25,54 L25.75,54 C26.44,54 27,54.56 27,55.25 L27,65.75 Z M26,53 L15,53 C13.896,53 13,53.896 13,55 L13,66 C13,67.104 13.896,68 15,68 L26,68 C27.104,68 28,67.104 28,66 L28,55 C28,53.896 27.104,53 26,53 L26,53 Z M19.491,60.526 L17,62.99 L17,61 L16,61 L16,63.98 L15.977,64.003 L16,64.028 L16,65 L16.891,65 L16.913,65.023 L16.937,65 L20,65 L20,64 L17.947,64 L20.475,61.499 L19.491,60.526 Z"></path>
										                </g>
										            </g>
										        </g>
										    </g>
												</symbol>
												</use>
										</svg>
										 Overlay
										 <svg class="details__feature-chevron-icon">
 											<use xlink:href="#chevron-right">
 												<symbol viewBox="0 0 9 16" id="chevron-right">
 													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
 															<g stroke-width="2" stroke="currentColor">
 																	<polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
 															</g>
 													</g>
 												</symbol>
 											</use>
 										</svg>
									</a>
								</div>
							</div>
						<?php } ?>
						<hr class="details__separator">

						<?php $LanequalZero = "zero"; ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[0] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[0] != "0"){ $LanequalZero = "one"; ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--first'; } else { echo 'details__row--without-label'; } ?>">
								<?php if($LanequalZero == "one"){ ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">English</div>
									<div class="details__languages-row--cell details__languages-row--audio-support <?php if($audio_en_de_fr_sp_it_bp_po_Ect[0] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[0] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support <?php if($lan_en_de_fr_sp_it_bp_po_Ect[0] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[0] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[1] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[1] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">Deutsch</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[1] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[1] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[1] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[1] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[2] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[2] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">français</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[2] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[2] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[2] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[2] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[3] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[3] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">español</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[3] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[3] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[3] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[3] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[4] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[4] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">italiano</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[4] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[4] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[4] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[4] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[5] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[5] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">Português do Brasil</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[5] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[5] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[5] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[5] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[6] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[6] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">português</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[6] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[6] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[6] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[6] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[7] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[7] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">русский</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[7] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[7] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[7] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[7] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[8] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[8] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">polski</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[8] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[8] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[8] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[8] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[9] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[9] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">日本語</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[9] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[9] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[9] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[9] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[10] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[10] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">český</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[10] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[10] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[10] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[10] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[11] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[11] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">nederlands</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[11] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[11] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[11] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[11] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[12] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[12] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">中文(简体)</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[12] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[12] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[12] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[12] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[13] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[13] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">한국어</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[13] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[13] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[13] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[13] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[14] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[14] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">Türkçe</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[14] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[14] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[14] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[15] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[15] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[15] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">magyar</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[15] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[15] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[15] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[15] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[16] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[16] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">svenska</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[16] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[16] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[16] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[16] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[17] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[17] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">suomi</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[17] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[17] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[17] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[17] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[18] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[18] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">norsk</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[18] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[18] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[18] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[18] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
						<?php if($lan_en_de_fr_sp_it_bp_po_Ect[19] != "0" || $audio_en_de_fr_sp_it_bp_po_Ect[19] != "0"){ ?>
							<div class="table__row details__rating details__row <?php if($LanequalZero == "one"){ echo 'details__row--without-label'; } else { echo 'details__row--first'; } ?>">
								<?php if($LanequalZero == "zero"){ $LanequalZero = "one"; ?>
									<div class="details__category table__row-label">Languages</div>
								<?php } ?>
								<div class="details__content table__row-content">
									<div class="details__languages-row--cell details__languages-row--language-name">Dansk</div>
									<div class="details__languages-row--cell details__languages-row--audio-support  <?php if($audio_en_de_fr_sp_it_bp_po_Ect[19] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($audio_en_de_fr_sp_it_bp_po_Ect[19] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										audio
									</div>
									<div class="details__languages-row--cell details__languages-row--text-support  <?php if($lan_en_de_fr_sp_it_bp_po_Ect[19] == "0"){ echo 'details__languages-row--unavailable'; } ?>">
										<?php if($lan_en_de_fr_sp_it_bp_po_Ect[19] == "0"){ ?>
											<svg class="ic-svg details__languages-icon details__languages-icon--cross">
												<use xlink:href="#check_cross">
													<symbol viewBox="0 0 10 10" id="check_cross">
													<g class="st0">
														<g id="check_cross_times" transform="translate(3.000000, 3.000000)">
															<path id="check_cross_Path" class="st1" fill-rule="evenodd" d="M3.9,2l2.8-2.8c0.3-0.3,0.3-0.9,0-1.3L6.1-2.7c-0.3-0.3-0.9-0.3-1.3,0L2,0.1l-2.8-2.8
																c-0.3-0.3-0.9-0.3-1.3,0l-0.6,0.6c-0.3,0.3-0.3,0.9,0,1.3L0.1,2l-2.8,2.8c-0.3,0.3-0.3,0.9,0,1.3l0.6,0.6c0.3,0.3,0.9,0.3,1.3,0
																L2,3.9l2.8,2.8c0.3,0.3,0.9,0.3,1.3,0l0.6-0.6c0.3-0.3,0.3-0.9,0-1.3L3.9,2z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } else { ?>
											<svg class="ic-svg details__languages-icon languages__icon--tick">
												<use xlink:href="#check_tick">
													<symbol viewBox="0 0 13.3 10" id="check_tick">
													<g>
														<g id="check_tick_check" transform="translate(1.000000, 3.000000)">
															<path id="check_tick_Path" class="st0" d="M3.5,6.8l-4.3-4.4c-0.3-0.3-0.3-0.7,0-0.9l0.9-0.9c0.3-0.3,0.7-0.3,0.9,0L4,3.5l6.3-6.3
																c0.3-0.3,0.7-0.3,0.9,0l0.9,0.9c0.3,0.3,0.3,0.7,0,0.9L4.5,6.8C4.2,7.1,3.8,7.1,3.5,6.8z"></path>
														</g>
													</g>
													</symbol>
												</use>
											</svg>
										<?php } ?>
										text
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- End With layout-main -->
		<!-- require bottom of page -->
		<?php require $includes_php_files_static_templates . $includes_php_files_static_templates_Bottom; ?>
	</div>
	<!-- End With Parent Of Page On Click hide search -->

	<!-- iframe signin gogcom -->
	<?php require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_navbar_signIN_gog; ?>
	<!-- iframe signin gogcom -->
<?php
  require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_footer;
  require $includes_php_files_static_templates . $includes_php_files_static_templates_footer;
?>
<?php ob_end_flush(); ?>
