<?php
  require '../connect.php';
  ob_start();

  $select_gog_users_new_user = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE Realy_in_gog = ? LIMIT 1");
  $select_gog_users_new_user->execute(array("1"));
  $fetch_gog_users_new_user = $select_gog_users_new_user->fetch();
  $have_change_after_select_user = $select_gog_users_new_user->rowcount();

  // if user have account
  if($have_change_after_select_user > 0){ $Gamesowner = $fetch_gog_users_new_user['UserName']; } else { $Gamesowner = "Root"; }

  // [$SortByOption]
  //if(isset($_POST['SortByOption'])){ $SortByOption = $_POST['SortByOption']; } else { $SortByOption = ""; }
  $SortByOption = $_POST['SortByOption'] ?? "";

  // [$textInSearch]
  if(isset($_POST['textInSearch'])){
    $textInSearch = str_replace(
                              ["\"", "%", "$", "#", "@", "~", "/", "\\", "+", "=", "*", ";", "^", "A.N.D", "S.Q.U"],
                              ["", "", "", "", "", "", "", "", "", "", "", "", "", "&", "\'"],
                              $_POST['textInSearch']
                              );
    $AfterReplaceAfterTrim = trim(strToLower($textInSearch));
  } else {
    $textInSearch = "";
  }

  // [$bigThingyBannerParent]
  //if(isset($_POST['bigThingyBannerParent'])){ $bigThingyBannerParent = $_POST['bigThingyBannerParent']; } else { $bigThingyBannerParent = ""; }
  $bigThingyBannerParent = $_POST['bigThingyBannerParent'] ?? "";

  // [$GameStyleShow]
  //if(isset($_POST['GameStyleShow'])){ $GameStyleShow = $_POST['GameStyleShow']; } else { $GameStyleShow = ""; }
  $GameStyleShow = $_POST['GameStyleShow'] ?? "";

  // [$loadingDone]
  //if(isset($_POST['loadingDone'])){ $loadingDone = $_POST['loadingDone']; } else { $loadingDone = ""; }
  $loadingDone = $_POST['loadingDone'] ?? "";

  // [$GamesTypeList_1Par_Parent]
  //if(isset($_POST['GamesTypeList_1Par_Parent'])){ $GamesTypeList_1Par_Parent = $_POST['GamesTypeList_1Par_Parent']; } else { $GamesTypeList_1Par_Parent = "games"; }
  $GamesTypeList_1Par_Parent = $_POST['GamesTypeList_1Par_Parent'] ?? "games";

  // [$GamesTypeList_1Par]
  //if(isset($_POST['GamesTypeList_1Par'])){ $GamesTypeList_1Par = str_replace("--AND--", " & ", $_POST['GamesTypeList_1Par']); } else { $GamesTypeList_1Par = "Allgames"; }
  $GamesTypeList_1Par = str_replace("--AND--", " & ", $_POST['GamesTypeList_1Par']) ?? "Allgames";

  // [$CustomPrice]
  //if(isset($_POST['CustomPrice'])){ $CustomPrice = $_POST['CustomPrice']; } else { $CustomPrice = 0; }
  $CustomPrice = $_POST['CustomPrice'] ?? "";

  // [$CustomSystem]
  //if(isset($_POST['CustomSystem'])){ $CustomSystem = $_POST['CustomSystem']; } else { $CustomSystem = ""; }
  $CustomSystem = $_POST['CustomSystem'] ?? "";

  // [$CustomFeatrues]
  //if(isset($_POST['CustomFeatrues'])){ $CustomFeatrues = $_POST['CustomFeatrues']; } else { $CustomFeatrues = ""; }
  $CustomFeatrues = $_POST['CustomFeatrues'] ?? "";

  // [$CustomLanguage]
  //if(isset($_POST['CustomLanguage'])){ $CustomLanguage = $_POST['CustomLanguage']; } else { $CustomLanguage = ""; }
  $CustomLanguage = $_POST['CustomLanguage'] ?? "";

  // [$CustomDLCs]
  //if(isset($_POST['CustomDLCs'])){ $CustomDLCs = $_POST['CustomDLCs']; } else { $CustomDLCs = ""; }
  $CustomDLCs = $_POST['CustomDLCs'] ?? "";

  // use to custom price condition
  $limitGamesInOnePage = 0;

?>
  <!---->
  <div class="catalog-spinner <?php if($loadingDone == "Done"){ echo 'ng-hide'; } ?>">
    <span class="spinner--big"></span>
  </div>
  <!---->
<?php

  // arrayCollectGamesIDForUpdate
  $arrayCollectGamesIDForUpdate = array();

  // order by
  if($SortByOption == "bestselling"){
    $PrepareValueAfterSortAllGames = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_bestselling_num ASC";
    $PrepareValueAfterSortGamesElse = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND gc_g_type = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_bestselling_num ASC";
  } else if($SortByOption == "alphabetically") {
    $PrepareValueAfterSortAllGames = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_title ASC";
    $PrepareValueAfterSortGamesElse = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND gc_g_type = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_title ASC";
  } else if($SortByOption == "userRating") {
    $PrepareValueAfterSortAllGames = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_user_rating DESC";
    $PrepareValueAfterSortGamesElse = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND gc_g_type = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_user_rating DESC";
  } else if($SortByOption == "dateAdded") {
    $PrepareValueAfterSortAllGames = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_date_added ASC";
    $PrepareValueAfterSortGamesElse = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND gc_g_type = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_date_added ASC";
  } else if($SortByOption == "bestsellingAllTime") {
    $PrepareValueAfterSortAllGames = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_bestselling_num DESC";
    $PrepareValueAfterSortGamesElse = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND gc_g_type = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_bestselling_num DESC";
  } else if($SortByOption == "oldestFirst") {
    $PrepareValueAfterSortAllGames = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_release_date DESC";
    $PrepareValueAfterSortGamesElse = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND gc_g_type = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_release_date DESC";
  } else if($SortByOption == "newestFirst") {
    $PrepareValueAfterSortAllGames = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_release_date ASC";
    $PrepareValueAfterSortGamesElse = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND gc_g_type = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_release_date ASC";
  } else {
    $PrepareValueAfterSortAllGames = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_bestselling_num ASC";
    $PrepareValueAfterSortGamesElse = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND gc_g_type = ? AND (gc_g_title like '%" . $AfterReplaceAfterTrim . "%' || gc_g_details_for_search like '%" . $AfterReplaceAfterTrim . "%') ORDER BY gc_g_bestselling_num ASC";
  }

  if($GamesTypeList_1Par_Parent == "games" && $GamesTypeList_1Par == "Allgames"){
    $select_game_by_id = $connect->prepare($PrepareValueAfterSortAllGames);
    $select_game_by_id->execute(array($GamesTypeList_1Par_Parent));
  } else {
    $select_game_by_id = $connect->prepare($PrepareValueAfterSortGamesElse);
    $select_game_by_id->execute(array($GamesTypeList_1Par_Parent, $GamesTypeList_1Par));
  }
  // select games
  $fetch_games_by_id = $select_game_by_id->fetchAll();
  // to any changes rowcount > 0
  $have_change_after_fetch = $select_game_by_id->rowcount();
  ?>
  <div id="for_catalog__paginator_wrapper">
  <?php

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

      // release date
      $gc_g_release_date = $fetch_game_by_id['gc_g_release_date'];

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

      // for price filters [radio]
      if($CustomPrice == 5 || $CustomPrice == 10 || $CustomPrice == 15 || $CustomPrice == 25){
        if($gc_g_price_price < $CustomPrice && $gc_g_free == 0 && $gc_g_soon == 0){}else{continue;}
      } else if($CustomPrice == 30) {
        if($gc_g_price_price > 25 && $gc_g_free == 0){}else{continue;}
      } else if($CustomPrice == 71440) {
        if($gc_g_free == 1 && $gc_g_soon == 0){}else{continue;}
      } else if($CustomPrice == 1692200) {
        if($gc_g_discount_presentage > 0 && $gc_g_free == 0 && $gc_g_soon == 0){}else{continue;}
      } else { }

      // for system checkbox [CustomSystem]
      if($CustomSystem == "w"){
        if($gc_g_os_win == 1){}
        else{continue;}
      } else if($CustomSystem == "m") {
        if($gc_g_os_mac == 1){}
        else{continue;}
      } else if($CustomSystem == "l") {
        if($gc_g_os_linux == 1){}
        else{continue;}
      } else if($CustomSystem == "w,m" || $CustomSystem == "m,w") {
        if($gc_g_os_win == 1 || $gc_g_os_mac == 1){}
        else{continue;}
      } else if($CustomSystem == "w,l" || $CustomSystem == "1,w") {
        if($gc_g_os_win == 1 || $gc_g_os_linux == 1){}
        else{continue;}
      } else if($CustomSystem == "l,m" || $CustomSystem == "m,l") {
        if($gc_g_os_mac == 1 || $gc_g_os_linux == 1){}
        else{continue;}
      } else if($CustomSystem == "w,m,l" || $CustomSystem == "m,w,l" || $CustomSystem == "l,m,w" || $CustomSystem == "w,l,m" || $CustomSystem == "l,w,m" || $CustomSystem == "m,l,w") {
      } else { }

      // for system checkbox [CustomFeatrues]
      $gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O = explode("-", $fetch_game_by_id['gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O']);
      $CustomFeatruesExplode = explode(",", $CustomFeatrues);
      $resultOfExistFeaturesInGame = "false";
      if($CustomFeatrues == ""){}
      else{
        for($fromPage = 0; $fromPage < count($CustomFeatruesExplode); $fromPage++){
          for($fromDatabase = 0; $fromDatabase < count($gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O); $fromDatabase++){
            if($CustomFeatruesExplode[$fromPage] == $gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O[$fromDatabase]){
              $resultOfExistFeaturesInGame = "true";
              break;
            } else {
              $resultOfExistFeaturesInGame = "false";
            }
          }
          if($resultOfExistFeaturesInGame == "true"){ break; }
        }
        if($resultOfExistFeaturesInGame == "false"){ continue; }
      }

      // for system checkbox [CustomLanguage]
      $lan_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da = explode("-", $fetch_game_by_id['lan_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da']);
      $CustomLanguageExplode = explode(",", $CustomLanguage);
      $resultOfExistLanguageInGame = "false";
      if($CustomLanguage == ""){}
      else{
        for($fromPage1 = 0; $fromPage1 < count($CustomLanguageExplode); $fromPage1++){
          for($fromDatabase1 = 0; $fromDatabase1 < count($lan_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da); $fromDatabase1++){
            if($CustomLanguageExplode[$fromPage1] == $lan_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da[$fromDatabase1]){
              $resultOfExistLanguageInGame = "true";
              break;
            } else {
              $resultOfExistLanguageInGame = "false";
            }
          }
          if($resultOfExistLanguageInGame == "true"){ break; }
        }
        if($resultOfExistLanguageInGame == "false"){ continue; }
      }

      // for system checkbox [CustomDLCs]
      if($CustomDLCs == "DLCs") {
        if($gc_g_free == 1 || $gc_g_discount_presentage > 70 || $gc_g_price_price < 10){}else{continue;}
      } else {  }

      // $bigThingyBannerParent[NewRelease, everything, upcoming, onsale]
      if($bigThingyBannerParent == "NewRelease"){
        $dateRequest = (int)substr($gc_g_release_date, -4);
        if(($dateRequest < 2001 || $gc_g_free == 1 || $gc_g_price_price < 15) && $gc_g_soon == 0){  } else { continue; }
      } else if($bigThingyBannerParent == "Upcoming") {
        if($gc_g_soon == 1){  } else { continue; }
      } else if($bigThingyBannerParent == "onSale") {
        if($gc_g_soon == 0 && $gc_g_free == 0 && ($gc_g_price_price < 25 || $gc_g_discount_presentage > 80)){  } else { continue; }
      } else {  }

      $limitGamesInOnePage += 1;
      // insert game to [gogcom_copy]
      array_push($arrayCollectGamesIDForUpdate, $gc_g_id);

      if($limitGamesInOnePage <= 48){
      ?>
        <div ng-game-movies-id="<?php echo $gc_g_id; ?>"
              gc_g_title="<?php echo $gc_g_title; ?>"
              gc_g_incart="<?php echo $gc_g_incart; ?>"
              gc_g_type="<?php echo $gc_g_type; ?>"
              gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
              gc_g_price_price="<?php echo $gc_g_price_price; ?>"
              class="<?php if($GameStyleShow == "List"){ echo 'ng-hide'; } ?> product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
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
                <span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ if($gc_g_incart == 1){}else{ echo 'ng-hide'; } } ?>">
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
        <!--list-->
        <div ng-game-movies-id="<?php echo $gc_g_id; ?>"
              gc_g_title="<?php echo $gc_g_title; ?>"
              gc_g_incart="<?php echo $gc_g_incart; ?>"
              gc_g_type="<?php echo $gc_g_type; ?>"
              gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
              gc_g_price_price="<?php echo $gc_g_price_price; ?>"
              class="<?php if($GameStyleShow == "Default"){ echo 'ng-hide'; } ?> product-tile--games--list product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
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
                <span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ if($gc_g_incart == 1){}else{ echo 'ng-hide'; } } ?>">
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
                  <span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ if($gc_g_incart == 1){}else{ echo 'ng-hide'; } } ?>">
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
        <!---->
        <!---->
        <!---->
        <!---->
      <?php
      }
    }
  }

  ?>
  </div>
<!-- for -->
  <?php if($limitGamesInOnePage == 0){ ?>
    <div class="noResultsFound">no results found</div>
  <?php } ?>
  <!-- catalog__paginator-wrapper -->
  <div class="catalog__paginator-wrapper">
    <div class="catalog__paginator">
      <div class="paginator-container">
        <?php if(($limitGamesInOnePage / 48) < 1){
        } else { ?>
          <div class="arrow-wrapper arrow-wrapper--left arrow-wrapper--hidden">
            <svg class="arrow-left">
              <use xlink:href="#paginator-chevron"><symbol viewBox="0 0 15 24" id="paginator-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use>
            </svg>
          </div>
          <?php for($PagesNumber = 1; $PagesNumber <= ceil($limitGamesInOnePage / 48); $PagesNumber++){ ?>
            <div noloading="<?php if($PagesNumber == 1){ echo 'Done'; } ?>" ng-item-index="<?php echo $PagesNumber; ?>" class="page-indicator page-indicator--inner
                  <?php
                    if($PagesNumber == 1){ echo ' page-indicator--active page-indicator--first '; } else { echo ' page-index-wrapper--next '; }
                    if($PagesNumber == ceil($limitGamesInOnePage / 48)){ echo ' page-indicator--last '; }
                    if(ceil($limitGamesInOnePage / 48) > 6){
                      if($PagesNumber >= 5 && $PagesNumber != ceil($limitGamesInOnePage / 48)){ echo ' ng-hide '; }
                      if($PagesNumber == 4){ echo ' Dots_bettween_f-l '; }
                    }
                    ?>
                  ">
              <div class="page-ellipsis page-ellipsis-desktop <?php if(ceil($limitGamesInOnePage / 48) > 6){ if($PagesNumber == 4){}else{ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">...</div>
              <div class="page-index-wrapper page-indicator--inactive <?php if(ceil($limitGamesInOnePage / 48) > 6){ if($PagesNumber == 4){ echo 'ng-hide'; }else{} } ?>"><?php echo $PagesNumber; ?></div>
              <div class="page-ellipsis page-ellipsis-mobile ng-hide">...</div>
            </div>
          <?php } ?>
          <div class="arrow-wrapper arrow-wrapper--right  <?php if(($limitGamesInOnePage / 48) == 1){ echo 'arrow-wrapper--hidden'; } ?>">
            <svg class="arrow-left">
              <use xlink:href="#paginator-chevron"><symbol viewBox="0 0 15 24" id="paginator-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use>
            </svg>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!---->
  <!---->
  <div id="ReturnGamesIdForWrapper" class="ReturnGamesIdForWrapper ng-hide">
    <?php
    for($printId = 0; $printId < count($arrayCollectGamesIDForUpdate); $printId++){
      if(($printId + 1) == count($arrayCollectGamesIDForUpdate)){
        echo $arrayCollectGamesIDForUpdate[$printId];
      } else {
        echo $arrayCollectGamesIDForUpdate[$printId] . ",";
      }
    }
    ?>
  </div>
  <!---->
<!---->
<?php ob_end_flush(); ?>
