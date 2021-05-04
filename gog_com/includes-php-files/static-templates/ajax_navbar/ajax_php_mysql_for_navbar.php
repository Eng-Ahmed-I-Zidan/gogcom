
<?php
  require '../connect.php';

  // value of input send with post method [$input_value_changed_onkeyup_return]®
  $input_value_changed_onkeyup_return = "";
  if(isset($_POST['input_value_changed_onkeyup_return'])){
    $opreate = str_replace(["\"", "%", "$", "#", "@", "~", "/", "\\", "+", "=", "*", ";", "^"], "", $_POST['input_value_changed_onkeyup_return']);
    $replace_amp_A_N_D = str_replace(["A.N.D", "S.Q.U"], ["&", "\'"], $opreate);
    $input_value_changed_onkeyup_return = trim(strToLower($replace_amp_A_N_D));
  }

  // value of input send with post method [$movies_yes]
  //if(isset($_POST['movies_yes'])){ $movies_yes = trim($_POST['movies_yes']); } else { $movies_yes = ""; }
  $movies_yes = trim($_POST['movies_yes']) ?? "";

  // select count [games, movies]
  function select_search_table_count_games_movies($para_for_games_or_movies_count){
    $select_search_table_count_games = $GLOBALS['connect']->prepare("SELECT COUNT(*) FROM " . $GLOBALS['allGameInOnePlaceTable'] . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $GLOBALS['input_value_changed_onkeyup_return'] . "%' OR gc_g_details_for_search like '%" . $GLOBALS['input_value_changed_onkeyup_return'] . "%') ");
    $select_search_table_count_games->execute(array($para_for_games_or_movies_count));
    $fetch_num_of_games_by_return_values = $select_search_table_count_games->fetchColumn();
    return $fetch_num_of_games_by_return_values;
  }
  $fetch_num_of_games_by_return_values = select_search_table_count_games_movies("games");
  $fetch_num_of_movies_by_return_values = select_search_table_count_games_movies("movies_for_gamers");

  if($fetch_num_of_movies_by_return_values > 0 || $fetch_num_of_games_by_return_values > 0){

    // select data from table by return value
    $fetch_game_info_by_return_values = "";
    if($movies_yes == "games/movies_for_gamers"){
      $gc_g_explode_index_0_games = explode("/", $movies_yes)[0];
      $gc_g_explode_index_1_movies = explode("/", $movies_yes)[1];

      if($fetch_num_of_movies_by_return_values > 0 && $fetch_num_of_games_by_return_values == 0){

        $select_search_table = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $input_value_changed_onkeyup_return . "%' OR gc_g_details_for_search like '%" . $input_value_changed_onkeyup_return . "%') LIMIT 20");
        $select_search_table->execute(array($gc_g_explode_index_1_movies));
        $fetch_game_info_by_return_values = $select_search_table->fetchAll();

      } elseif(($fetch_num_of_movies_by_return_values == 0 && $fetch_num_of_games_by_return_values > 0) || ($fetch_num_of_movies_by_return_values > 0 && $fetch_num_of_games_by_return_values > 0)){

        $select_search_table = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $input_value_changed_onkeyup_return . "%' OR gc_g_details_for_search like '%" . $input_value_changed_onkeyup_return . "%') LIMIT 20");
        $select_search_table->execute(array($gc_g_explode_index_0_games));
        $fetch_game_info_by_return_values = $select_search_table->fetchAll();

      }
    }

    if($movies_yes == "games" || $movies_yes == "movies_for_gamers"){
      $select_search_table = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = ? AND (gc_g_title like '%" . $input_value_changed_onkeyup_return . "%' OR gc_g_details_for_search like '%" . $input_value_changed_onkeyup_return . "%') LIMIT 20");
      $select_search_table->execute(array($movies_yes));
      $fetch_game_info_by_return_values = $select_search_table->fetchAll();
    }

    // print all game with like name
    if((!$input_value_changed_onkeyup_return == "")){ ?>

        <div class="menu-search__results-list _gog-menu-scrollbar">
          <div class="js-gog-scrollbar-content _gog-menu-scrollbar__content menu-search__content js-menu-search-content">
            <div class="menu-search__results-rows list--rows">
              <?php foreach($fetch_game_info_by_return_values as $fetch_game_info_by_return_value){
                /* global var assign data from database */
                // gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
                $gc_g_tba = explode(" & ", $fetch_game_info_by_return_value['gc_g_tba_free_owned__noPrice_inSearch'])[0];
                $gc_g_free = explode(" & ", $fetch_game_info_by_return_value['gc_g_tba_free_owned__noPrice_inSearch'])[1];
                $gc_g_owned = explode(" & ", $fetch_game_info_by_return_value['gc_g_tba_free_owned__noPrice_inSearch'])[2];

                // gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
                $gc_g_price_price = explode(" & ", $fetch_game_info_by_return_value['gc_g_price_price_and_discount_presentage'])[0];
                $gc_g_discount_presentage = explode(" & ", $fetch_game_info_by_return_value['gc_g_price_price_and_discount_presentage'])[1];
                $gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

                // href of game
                $gc_g_href = $fetch_game_info_by_return_value['gc_g_href'];

                // image search cover
                $gc_g_image_search_cart_modifyToStore = $fetch_game_info_by_return_value['gc_g_image_search_cart_modifyToStore'];

                // [ title, details ] of game and mark tag for charactes search
                $gc_g_title = $fetch_game_info_by_return_value['gc_g_title'];
                $gc_g_str_replace_title = str_Replace($input_value_changed_onkeyup_return, '<mark>' . $input_value_changed_onkeyup_return. '</mark>', strToLower($gc_g_title));

                $gc_g_details_for_search = $fetch_game_info_by_return_value['gc_g_details_for_search'];
                $gc_g_str_replace_details_for_search = str_Replace($input_value_changed_onkeyup_return, '<mark>' . $input_value_changed_onkeyup_return. '</mark>', strToLower($gc_g_details_for_search));

                // flags [ soon, indev ]
                $gc_g_soon = explode(" & ", $fetch_game_info_by_return_value['gc_g_soon_indev'])[0];
                $gc_g_indev = explode(" & ", $fetch_game_info_by_return_value['gc_g_soon_indev'])[1];

                // coming-soon
                $gc_g_comingSoon__gameDiv = $fetch_game_info_by_return_value['gc_g_comingSoon__gameDiv'];

                // operating system [ windows - mac - linux ]
                $gc_g_os_win = explode(" & ", $fetch_game_info_by_return_value['gc_g_os_win_mac_linux'])[0];
                $gc_g_os_mac = explode(" & ", $fetch_game_info_by_return_value['gc_g_os_win_mac_linux'])[1];
                $gc_g_os_linux = explode(" & ", $fetch_game_info_by_return_value['gc_g_os_win_mac_linux'])[2];

                // get release date
                $gc_g_release_date = substr($fetch_game_info_by_return_value['gc_g_release_date'], -4);

                // get rating star [10, 20, 30, 40, 50, ... 15, 25, 35, 45, ...]
                $gc_g_user_rating = $fetch_game_info_by_return_value['gc_g_user_rating'];

                $gc_g_incart = $fetch_game_info_by_return_value['gc_g_incart'];
              ?>
                <!---->
                <div ng-game-movies-id="<?php echo $fetch_game_info_by_return_value['gc_g_id']; ?>"
                      gc_g_href="<?php echo $fetch_game_info_by_return_value['gc_g_href']; ?>"
                      gc_g_title="<?php echo $fetch_game_info_by_return_value['gc_g_title']; ?>"
                      gc_g_incart="<?php echo $fetch_game_info_by_return_value['gc_g_incart']; ?>"
                      gc_g_type="<?php echo $fetch_game_info_by_return_value['gc_g_type']; ?>"
                  class="menu-product menu-product-state-holder menu-search__result js-focusable-element product-row--has-card is-buyable is-first <?php if(strlen($input_value_changed_onkeyup_return) == 1){ echo "is-animated"; } ?>"
                >
                  <div ng-game-movies-id="<?php echo $fetch_game_info_by_return_value['gc_g_id']; ?>"
                        gc_g_href="<?php echo $fetch_game_info_by_return_value['gc_g_href']; ?>"
                        gc_g_title="<?php echo $fetch_game_info_by_return_value['gc_g_title']; ?>"
                        gc_g_incart="<?php echo $fetch_game_info_by_return_value['gc_g_incart']; ?>"
                        gc_g_type="<?php echo $fetch_game_info_by_return_value['gc_g_type']; ?>"
                        gc_g_type_parent="<?php echo $fetch_game_info_by_return_value['gc_g_type_parent']; ?>"
                        gc_g_image_search_cart_modifyToStore="<?php echo $fetch_game_info_by_return_value['gc_g_image_search_cart_modifyToStore']; ?>"
                        gc_g_price_price_and_discount_presentage="<?php echo $fetch_game_info_by_return_value['gc_g_price_price_and_discount_presentage']; ?>"
                        gc_g_os_win_mac_linux="<?php echo $fetch_game_info_by_return_value['gc_g_os_win_mac_linux']; ?>"
                        gc_g_newReleases_and_upcoming_and_onsale="<?php echo $fetch_game_info_by_return_value['gc_g_newReleases_and_upcoming_and_onsale']; ?>"
                        gc_g_soon_indev="<?php echo $fetch_game_info_by_return_value['gc_g_soon_indev']; ?>"
                        gc_g_tba_free_owned__noPrice_inSearch="<?php echo $fetch_game_info_by_return_value['gc_g_tba_free_owned__noPrice_inSearch']; ?>"
                        gc_g_type_other="<?php echo $fetch_game_info_by_return_value['gc_g_type_other']; ?>"
                        gc_g_user_rating="<?php echo $fetch_game_info_by_return_value['gc_g_user_rating']; ?>"
                  class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_owned == 1 || $gc_g_tba == 1){ echo 'tba_owned_prevent_action_add_to_cart'; } ?> <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?> <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
                    <span class="menu-product__price-btn-text">
                      <span class="product-status__in-cart <?php if($gc_g_incart == 0){ echo 'ng-hide'; } ?>">
                        <svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
                         M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
                        C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
                        c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
                        c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use></svg>
                      </span>
                      <span class="product-state__is_choose product-state__is-tba <?php if($gc_g_tba == '0' || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'is-active-now'; } ?>">tba</span>
                      <span class="product-state__is_choose product-state__is-free <?php if($gc_g_free == '0' || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'is-active-now'; } ?>">free</span>
                      <span class="product-state__is_choose product-state__is-owned <?php if($gc_g_owned == '0' || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'is-active-now'; } ?>">owned</span>
                      <span class="product-state__is_choose _price product-state__price <?php if($gc_g_price_price == '0' || $gc_g_free == '1' || $gc_g_tba == '1' || $gc_g_owned == '1' || $gc_g_incart == '1'){ echo 'ng-hide'; }else{ echo 'is-active-now'; } ?>">
                        <!-- number_format(float_number[1.2347], number of decimal points[2], separator for the decimal point[.], thousands separator['']); -->
                        <?php if($gc_g_discount_presentage == '0'){ echo $gc_g_price_price; } else { echo $gc_g_format_price_discount; } ?>
                      </span>
                    </span>
                  </div>
                  <div class="comming---soon--search <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">coming soon</div>
                  <a class="menu-product__link" href="<?php echo $gc_g_href; ?>">
                    <img srcset="<?php echo $gc_g_image_search_cart_modifyToStore; ?>" />
                    <div class="menu-product__content">
                      <div class="menu-product__content-in">
                        <div class="menu-product__title">
                          <span><?php echo $gc_g_str_replace_title; ?></span>
                          <div class="menu-product__flags">
                            <span class="menu-product__flag menu-product__flag--soon <?php if($gc_g_soon == '0'){ echo 'ng-hide'; } ?>">soon</span>
                            <span class="menu-product__flag menu-product__flag--in-dev <?php if($gc_g_indev == '0'){ echo 'ng-hide'; } ?>">in dev</span>
                          </div>
                        </div>
                        <div class="menu-product__details <?php if($gc_g_release_date == ""){ echo 'ng-hide'; } ?>"><?php echo $gc_g_release_date . ", " . $gc_g_str_replace_details_for_search; ?></div>
                        <div class="menu-product__details <?php if($gc_g_release_date != ""){ echo 'ng-hide'; } ?>"><?php echo $gc_g_str_replace_details_for_search; ?></div>
                        <div class="menu-product__rating js-star-rating star-rating">
                          <?php if(!$gc_g_user_rating == 0 || $gc_g_user_rating == 0){ ?>
                            <div class="Stars
                              <?php if($gc_g_user_rating == 10 || $gc_g_user_rating > 10){ echo ' full '; } ?>
                              <?php if($gc_g_user_rating >= 1 && $gc_g_user_rating < 10){  echo ' star-rating-' . $gc_g_user_rating; } ?>"
                            ></div>
                            <div class="Stars
                              <?php if($gc_g_user_rating == 20 || $gc_g_user_rating > 20){ echo ' full '; } ?>
                              <?php if($gc_g_user_rating > 10 && $gc_g_user_rating < 20){ echo ' star-rating-' . ($gc_g_user_rating - 10); } ?>"
                            ></div>
                            <div class="Stars
                              <?php if($gc_g_user_rating == 30 || $gc_g_user_rating > 30){ echo ' full '; } ?>
                              <?php if($gc_g_user_rating > 20 && $gc_g_user_rating < 30){ echo ' star-rating-' . ($gc_g_user_rating - 20); } ?>"
                            ></div>
                            <div class="Stars
                              <?php if($gc_g_user_rating == 40 || $gc_g_user_rating > 40){ echo ' full '; } ?>
                              <?php if($gc_g_user_rating > 30 && $gc_g_user_rating < 40){ echo ' star-rating-' . ($gc_g_user_rating - 30); } ?>"
                            ></div>
                            <div class="Stars
                              <?php if($gc_g_user_rating == 50){ echo ' full '; } ?>
                              <?php if($gc_g_user_rating > 40 && $gc_g_user_rating < 50){ echo ' star-rating-' . ($gc_g_user_rating - 40); } ?>"
                            ></div>
                            <!-- <svg class="full" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                              <defs>
                                <linearGradient id="grad1">
                                  <?php if($gc_g_user_rating == 10 || $gc_g_user_rating > 10){ ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="100%" stop-color="#b3b3b3" />
                                  <?php } else { ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo ($gc_g_user_rating * 10); ?>%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo ($gc_g_user_rating * 10); ?>%" stop-color="#e3e3e3" />
                                    <stop offset="100%" stop-color="#e3e3e3" />
                                  <?php } ?>
                                </linearGradient>
                              </defs>
                              <path fill="url(#grad1)" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg>
                            <svg class="full" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                              <defs>
                                <linearGradient id="grad2">
                                  <?php if($gc_g_user_rating == 20 || $gc_g_user_rating > 20){ ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="100%" stop-color="#b3b3b3" />
                                  <?php } else { ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo (($gc_g_user_rating - 10) * 10); ?>%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo (($gc_g_user_rating - 10) * 10); ?>%" stop-color="#e3e3e3" />
                                    <stop offset="100%" stop-color="#e3e3e3" />
                                  <?php } ?>
                                </linearGradient>
                              </defs>
                              <path fill="url(#grad2)" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg>
                            <svg class="full" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                              <defs>
                                <linearGradient id="grad3">
                                  <?php if($gc_g_user_rating == 30 || $gc_g_user_rating > 30){ ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="100%" stop-color="#b3b3b3" />
                                  <?php } else { ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo (($gc_g_user_rating - 20) * 10); ?>%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo (($gc_g_user_rating - 20) * 10); ?>%" stop-color="#e3e3e3" />
                                    <stop offset="100%" stop-color="#e3e3e3" />
                                  <?php } ?>
                                </linearGradient>
                              </defs>
                              <path fill="url(#grad3)" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg>
                            <svg class="full" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                              <defs>
                                <linearGradient id="grad4">
                                  <?php if($gc_g_user_rating == 40 || $gc_g_user_rating > 40){ ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="100%" stop-color="#b3b3b3" />
                                  <?php } else { ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo (($gc_g_user_rating - 30) * 10); ?>%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo (($gc_g_user_rating - 30) * 10); ?>%" stop-color="#e3e3e3" />
                                    <stop offset="100%" stop-color="#e3e3e3" />
                                  <?php } ?>
                                </linearGradient>
                              </defs>
                              <path fill="url(#grad4)" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg>
                            <svg class="full" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                              <defs>
                                <linearGradient id="grad5">
                                  <?php if($gc_g_user_rating == 50){ ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="100%" stop-color="#b3b3b3" />
                                  <?php } else { ?>
                                    <stop offset="0%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo (($gc_g_user_rating - 40) * 10); ?>%" stop-color="#b3b3b3" />
                                    <stop offset="<?php echo (($gc_g_user_rating - 40) * 10); ?>%" stop-color="#e3e3e3" />
                                    <stop offset="100%" stop-color="#e3e3e3" />
                                  <?php } ?>
                                </linearGradient>
                              </defs>
                              <path fill="url(#grad5)" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg> -->
                            <!-- <i class="fa fa-star
                            <?php if($gc_g_user_rating == 10 || $gc_g_user_rating > 10){ echo 'full'; } ?>"
                            <?php if($gc_g_user_rating >= 1 && $gc_g_user_rating < 10){ ?> style="background: linear-gradient(to right, #bcbcbc <?php echo ($gc_g_user_rating * 10) . '%'; ?>, #e3e3e3 <?php echo (100 - ($gc_g_user_rating * 10)) . '%'; ?>); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;" <?php } ?>
                            >
                            </i>
                            <i class="fa fa-star
                            <?php if($gc_g_user_rating == 20 || $gc_g_user_rating > 20){ echo 'full'; } ?>"
                            <?php if($gc_g_user_rating > 10 && $gc_g_user_rating < 20){ ?> style="background: linear-gradient(to right, #bcbcbc <?php echo (($gc_g_user_rating - 10) * 10) . '%'; ?>, #e3e3e3 <?php echo (100 - (($gc_g_user_rating - 10) * 10)) . '%'; ?>); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;" <?php } ?>
                            >
                            </i>
                            <i class="fa fa-star
                            <?php if($gc_g_user_rating == 30 || $gc_g_user_rating > 30){ echo 'full'; } ?>"
                            <?php if($gc_g_user_rating > 20 && $gc_g_user_rating < 30){ ?> style="background: linear-gradient(to right, #bcbcbc <?php echo (($gc_g_user_rating - 20) * 10) . '%'; ?>, #e3e3e3 <?php echo (100 - (($gc_g_user_rating - 20) * 10)) . '%'; ?>); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;" <?php } ?>
                            >
                            </i>
                            <i class="fa fa-star
                            <?php if($gc_g_user_rating == 40 || $gc_g_user_rating > 40){ echo 'full'; } ?>"
                            <?php if($gc_g_user_rating > 30 && $gc_g_user_rating < 40){ ?> style="background: linear-gradient(to right, #bcbcbc <?php echo (($gc_g_user_rating - 30) * 10) . '%'; ?>, #e3e3e3 <?php echo (100 - (($gc_g_user_rating - 30) * 10)) . '%'; ?>); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;" <?php } ?>
                            >
                            </i>
                            <i class="fa fa-star
                            <?php if($gc_g_user_rating == 50){ echo 'full'; } ?>"
                            <?php if($gc_g_user_rating > 40 && $gc_g_user_rating < 50){ ?> style="background: linear-gradient(to right, #bcbcbc <?php echo (($gc_g_user_rating - 40) * 10) . '%'; ?>, #e3e3e3 <?php echo (100 - (($gc_g_user_rating - 40) * 10)) . '%'; ?>); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;" <?php } ?>
                            >
                            </i> -->
                          <?php } ?>
                        </div>
                        <div class="menu-product__os js-os-support has-win-support has-mac-support has-linux-support">
                          <span class="product_isGame">
                            <i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == '0'){ echo 'ng-hide'; } ?>"></i>
                            <i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == '0'){ echo 'ng-hide'; } ?>"></i>
                            <i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == '0'){ echo 'ng-hide'; } ?>"></i>
                          </span>
                        </div>
                        <div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0'){ echo 'ng-hide'; } ?>">
                          <span class="menu-product__discount-text">
                            <span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
                            %
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              <?php } ?>

              <!-- browse All games button -->
              <?php if($fetch_num_of_games_by_return_values > 20){ ?>
                <?php if($movies_yes == "games" || $movies_yes != "movies_for_gamers" || $fetch_num_of_movies_by_return_values == 0){ ?>
                  <a class="menu-btn menu-btn--full menu-search__results-more" href="store.php?category=Allgames&searchText=<?php echo $input_value_changed_onkeyup_return; ?>">browse <span><?php echo $fetch_num_of_games_by_return_values; ?></span> games</a>
                <?php } ?>
              <?php } ?>

              <!-- browse All movies button -->
              <?php if($fetch_num_of_movies_by_return_values > 20){ ?>
                <?php if($movies_yes == "movies_for_gamers" || $fetch_num_of_games_by_return_values == 0){ ?>
                  <a class="menu-btn menu-btn--full menu-search__results-more" href="store.php?category=movie&searchText=<?php echo $input_value_changed_onkeyup_return; ?>">browse <span><?php echo $fetch_num_of_movies_by_return_values; ?></span> movies</a>
                <?php } ?>
              <?php } ?>

              <!-- count Games And Movies -->
              <div class="countGamesfromSearch ng-hide"><?php echo $fetch_num_of_games_by_return_values; ?></div>
              <div class="countMoviesfromSearch ng-hide"><?php echo $fetch_num_of_movies_by_return_values; ?></div>

              <div class="hide_16px_end_of_scroll"></div>
            </div>
          </div>
        </div>

    <?php } ?>

  <?php } else { ?>
    <!-- count Games And Movies -->
    <div class="countGamesfromSearch ng-hide"><?php echo $fetch_num_of_games_by_return_values; ?></div>
    <div class="countMoviesfromSearch ng-hide"><?php echo $fetch_num_of_movies_by_return_values; ?></div>

    <div class="menu-search__no-results">
      <div class="menu-search-empty">
        <div class="menu-search-empty__header menu-uppercase">
          <svg viewBox="0 0 32 32" class="menu-search-empty__header-icon"><use xlink:href="#icon-search2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 13.8 15" id="icon-search2"><path d="M13.8,13.7L12.2,15L9,11.1C8.1,11.7,7.1,12,6,12c-3.2,0.1-5.9-2.4-6-5.6C0,6.3,0,6.1,0,6
            c0-3.3,2.7-6,6-6s6,2.7,6,6c0,1.5-0.6,3-1.6,4.1L13.8,13.7z M6,1.6c-2.3-0.1-4.3,1.6-4.5,4c0,0.1,0,0.3,0,0.4c0,2.5,1.9,4.5,4.4,4.6
            s4.5-1.9,4.6-4.4C10.5,3.7,8.6,1.6,6,1.6C6.1,1.6,6,1.6,6,1.6z"></path></symbol></use></svg>
            No results found
        </div>
        <hr class="menu-search-empty__line"/>
        <div class="menu-search-empty__description">Try adjusting the terms of your search, you can search by game titles, publishers, and developers.</div>
        <a class="menu-btn menu-search-empty__btn menu-uppercase" href="">browse all games</a>
      </div>
    </div>
  <?php } ?>
