<!-- Start With Game-spot -->
<section class="game-spots">
  <div class="title">
    <div class="title__underline-text">You may like these products</div>
  </div>
  <!---->
  <div class="small-spots__container small-spots__container--no-top-space">
    <div class="dots-wrapper">
      <span class="dots"></span>
      <span class="dots"></span>
      <span class="dots"></span>
    </div>
    <div class="small-spots__container_content ng-hide">
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
</section>
<!-- End With Game-spot You may like these products -->
<!-- Start With User Reviews -->
<div class="reviews">
  <div class="title">
    <div class="title__underline-text"> User reviews </div>
  </div>
  <?php if(explode(" & ", $fetch_game_by_Name['gc_g_soon_indev'])[0] == "1"){ ?>
  <div class="reviews-content-as-soon-as">
    <div class="reviews__info reviews__info--align-center">Reviewing and rating will be enabled as soon as the game is released.</div>
  </div>
  <?php } else { ?>
  <div class="reviews-content">
    <div class="dots-wrapper">
      <span class="dots"></span>
      <span class="dots"></span>
      <span class="dots"></span>
    </div>
    <div class="reviews-content-ng-scope ng-hide">
      <div class="average-body ng-scope">
        <?php
        if($have_change_after_select_user > 0){
          // select comments
          $select_comments_by_UserName = $connect->prepare("SELECT * FROM " . $gameCommentsTableName . " WHERE comment_username = ?");
          $select_comments_by_UserName->execute(array($fetch_gog_users_new_user['UserName']));
          $fetch_comments_by_UserName = $select_comments_by_UserName->fetch();
          $check_comments_by_UserName = $select_comments_by_UserName->rowcount();
        }
        ?>
        <div class="average-body__col average-body__col--small">
          <div class="average-body__stars-rating <?php if($have_change_after_select_user > 0) { if($check_comments_by_UserName > 0){ echo 'alreadyCommented'; } } ?>" lastrating="">
            <?php if($have_change_after_select_user > 0): ?>
              <div class="profile-image--outside"><img srcset="<?php echo $fetch_gog_users_new_user['Profile_image']; ?>" /></div>
            <?php endif; ?>
            <span class="rating-stars__star ng-scope is-empty first-star-rating" rate="1">
              <svg class="ic-svg svg-star--full <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] >= '1'){ } else{ echo 'ng-hide'; } } else { echo 'ng-hide'; }?>">
                <use xlink:href="#star-full">
                  <symbol viewBox="0 0 32 32" id="star-full">
                  <g id="star-full_icomoon-ignore">
                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                  </g>
                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                  </symbol>
                </use>
              </svg>
              <svg class="ic-svg svg-star--empty <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] >= '1'){ echo 'ng-hide'; } else{ } } ?>">
                <use xlink:href="#star-empty">
                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                    "></path>
                  </symbol>
                </use>
              </svg>
            </span>
            <span class="rating-stars__star ng-scope is-empty" rate="2">
              <svg class="ic-svg svg-star--full <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] >= '2'){ } else{ echo 'ng-hide'; } } else { echo 'ng-hide'; }?>">
                <use xlink:href="#star-full">
                  <symbol viewBox="0 0 32 32" id="star-full">
                  <g id="star-full_icomoon-ignore">
                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                  </g>
                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                  </symbol>
                </use>
              </svg>
              <svg class="ic-svg svg-star--empty <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] >= '2'){ echo 'ng-hide'; } else{ } } ?>">
                <use xlink:href="#star-empty">
                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                    "></path>
                  </symbol>
                </use>
              </svg>
            </span>
            <span class="rating-stars__star ng-scope is-empty" rate="3">
              <svg class="ic-svg svg-star--full <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] >= '3'){ } else{ echo 'ng-hide'; } } else { echo 'ng-hide'; }?>">
                <use xlink:href="#star-full">
                  <symbol viewBox="0 0 32 32" id="star-full">
                  <g id="star-full_icomoon-ignore">
                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                  </g>
                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                  </symbol>
                </use>
              </svg>
              <svg class="ic-svg svg-star--empty <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] >= '3'){ echo 'ng-hide'; } else{ } } ?>">
                <use xlink:href="#star-empty">
                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                    "></path>
                  </symbol>
                </use>
              </svg>
            </span>
            <span class="rating-stars__star ng-scope is-empty" rate="4">
              <svg class="ic-svg svg-star--full <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] >= '4'){ } else{ echo 'ng-hide'; } } else { echo 'ng-hide'; }?>">
                <use xlink:href="#star-full">
                  <symbol viewBox="0 0 32 32" id="star-full">
                  <g id="star-full_icomoon-ignore">
                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                  </g>
                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                  </symbol>
                </use>
              </svg>
              <svg class="ic-svg svg-star--empty <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] >= '4'){ echo 'ng-hide'; } else{ } } ?>">
                <use xlink:href="#star-empty">
                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                    "></path>
                  </symbol>
                </use>
              </svg>
            </span>
            <span class="rating-stars__star ng-scope is-empty" rate="5">
              <svg class="ic-svg svg-star--full <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] == '5'){ } else{ echo 'ng-hide'; } } else { echo 'ng-hide'; }?>">
                <use xlink:href="#star-full">
                  <symbol viewBox="0 0 32 32" id="star-full">
                  <g id="star-full_icomoon-ignore">
                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                  </g>
                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                  </symbol>
                </use>
              </svg>
              <svg class="ic-svg svg-star--empty <?php if($have_change_after_select_user > 0) { if($fetch_comments_by_UserName['game_rating'] == '5'){ echo 'ng-hide'; } else{ } } ?>">
                <use xlink:href="#star-empty">
                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                    "></path>
                  </symbol>
                </use>
              </svg>
            </span>
          </div>
          <?php
          if($have_change_after_select_user > 0){
            if($check_comments_by_UserName > 0){
            } else {
            ?>
              <button class="review-new__add-button" haveaccount="<?php if($have_change_after_select_user > 0){ echo 'true'; } ?>">+ Add your review</button>
            <?php } ?>
          <?php } else { ?>
            <button class="review-new__add-button" haveaccount="">+ Add your review</button>
          <?php } ?>
        </div>
        <div class="average-body__col average-body__col--big">
          <div class="ng-isolate-scope">
            <p class="average-item__numbers">
              <svg class="ic-svg  average-item__icon">
                <use xlink:href="#star-full">
                  <symbol viewBox="0 0 32 32" id="star-full">
                  <g id="star-full_icomoon-ignore">
                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                  </g>
                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                  </symbol>
                </use>
              </svg>
              <span class="average-item__value ng-binding"><?php if($commentIndex > 0){ echo number_format(($sumOfCommentsRating / $commentIndex), 1, ".", ""); } else { echo '5'; } ?></span>
              <span class="average-item__scale">/5</span>
            </p>
            <p class="average-item__textline ng-binding">overall rating</p>
          </div>
          <div class="ng-isolate-scope">
            <p class="average-item__numbers">
              <svg class="ic-svg  average-item__icon">
                <use xlink:href="#star-full">
                  <symbol viewBox="0 0 32 32" id="star-full">
                  <g id="star-full_icomoon-ignore">
                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                  </g>
                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                  </symbol>
                </use>
              </svg>
              <span class="average-item__value ng-binding" id="verifiedOwnerrating"></span>
              <span class="average-item__scale">/5</span>
            </p>
            <p class="average-item__textline ng-binding">verified owners rating</p>
          </div>
          <div class="average-item average-item--zero-value zero-rating <?php if($rowcountFitch > 0){  } else { echo ' ng-hide'; } ?>"  option="0">
            <span>N/A</span>
          </div>
          <div class="average-item average-item--zero-value no-rating ng-hide" option="1">
            <span>There is no rating <br>  for applied filters</span>
          </div>
          <div class="ng-isolate-scope average-item average-item--zero-value has-rating ng-hide" option="2">
            <p class="average-item__numbers">
              <svg class="ic-svg  average-item__icon">
                <use xlink:href="#star-full">
                  <symbol viewBox="0 0 32 32" id="star-full">
                  <g id="star-full_icomoon-ignore">
                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                  </g>
                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                  </symbol>
                </use>
              </svg>
              <span class="average-item__value ng-binding">0</span>
              <span class="average-item__scale">/5</span>
            </p>
            <p class="average-item__textline ng-binding">filters based rating</p>
          </div>
          <div class="average-item average-item--zero-value no-rating-yet <?php if($rowcountFitch > 0){ echo ' ng-hide'; } else {  } ?>"  option="3">
            <span>None has rated this game yet</span>
          </div>
          <div class="average-item average-item--zero-value verified-owner-none-rating-game ng-hide"  option="4">
            <span>None of the verified owners <br>  have rated this game</span>
          </div>
        </div>
      </div>
      <?php
      $countNumberOfComments = 0;
      foreach($fetch_comments as $fetch_comment){ $countNumberOfComments += 1; }
      ?>
      <div class="reviews__filters-sorting <?php if($countNumberOfComments > 0){}else{ echo 'ng-hide'; } ?>">
        <div class="reviews-sorting ng-scope">
          <div class="dropdown dropdown--bottom reviews-sorting__trigger-container sortByNumberOfCommentInPage">
            <span class="dropdown__trigger">
              <span class="sort-by__title">Show:</span>
              <span class="sort-by__selected" ng-show="5">5 on page</span>
              <span class="sort-by__selected ng-hide" ng-show="15">15 on page</span>
              <span class="sort-by__selected ng-hide" ng-show="30">30 on page</span>
              <span class="sort-by__selected ng-hide" ng-show="60">60 on page</span>
              <svg class="sort-by__selected-icon icon-svg">
                <use xlink:href="#chevron">
                  <symbol viewBox="0 0 15 24" id="chevron">
                      <path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path>
                  </symbol>
                </use>
              </svg>
            </span>
            <div class="dropdown__layer">
              <div class="sort-dropdown__content">
                <label class="sort-dropdown__item sort-dropdown__item_selected" loadingDone="">
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-hide">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-full">
                    <use xlink:href="#checkbox-single">
                      <symbol viewBox="0 0 17 17" id="checkbox-single">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M8,11 C6.34314575,11 5,9.65685425 5,8 C5,6.34314575 6.34314575,5 8,5 C9.65685425,5 11,6.34314575 11,8 C11,9.65685425 9.65685425,11 8,11 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <span class="sort-dropdown__text sort-two-col" ng-show="5">5 on page</span>
                </label>
                <label class="sort-dropdown__item" loadingDone="">
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-full ng-hide">
                    <use xlink:href="#checkbox-single">
                      <symbol viewBox="0 0 17 17" id="checkbox-single">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M8,11 C6.34314575,11 5,9.65685425 5,8 C5,6.34314575 6.34314575,5 8,5 C9.65685425,5 11,6.34314575 11,8 C11,9.65685425 9.65685425,11 8,11 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <span class="sort-dropdown__text sort-two-col" ng-show="15">15 on page</span>
                </label>
                <label class="sort-dropdown__item" loadingDone="">
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-full ng-hide">
                    <use xlink:href="#checkbox-single">
                      <symbol viewBox="0 0 17 17" id="checkbox-single">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M8,11 C6.34314575,11 5,9.65685425 5,8 C5,6.34314575 6.34314575,5 8,5 C9.65685425,5 11,6.34314575 11,8 C11,9.65685425 9.65685425,11 8,11 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <span class="sort-dropdown__text sort-two-col" ng-show="30">30 on page</span>
                </label>
                <label class="sort-dropdown__item" loadingDone="">
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-full ng-hide">
                    <use xlink:href="#checkbox-single">
                      <symbol viewBox="0 0 17 17" id="checkbox-single">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M8,11 C6.34314575,11 5,9.65685425 5,8 C5,6.34314575 6.34314575,5 8,5 C9.65685425,5 11,6.34314575 11,8 C11,9.65685425 9.65685425,11 8,11 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <span class="sort-dropdown__text sort-two-col" ng-show="60">60 on page</span>
                </label>
              </div>
            </div>
          </div>
          <div class="dropdown dropdown--bottom reviews-sorting__trigger-container sortByMostPhyInPage">
            <span class="dropdown__trigger">
              <span class="sort-by__title">Order by:</span>
              <span class="sort-by__selected" ng-show="Most-helpful">Most helpful</span>
              <span class="sort-by__selected ng-hide" ng-show="Most-positive">Most positive</span>
              <span class="sort-by__selected ng-hide" ng-show="Most-critical">Most critical</span>
              <span class="sort-by__selected ng-hide" ng-show="Most-recent">Most recent</span>
              <svg class="sort-by__selected-icon icon-svg">
                <use xlink:href="#chevron">
                  <symbol viewBox="0 0 15 24" id="chevron">
                      <path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path>
                  </symbol>
                </use>
              </svg>
            </span>
            <div class="dropdown__layer">
              <div class="sort-dropdown__content">
                <label class="sort-dropdown__item sort-dropdown__item_selected" loadingDone="">
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-hide">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-full">
                    <use xlink:href="#checkbox-single">
                      <symbol viewBox="0 0 17 17" id="checkbox-single">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M8,11 C6.34314575,11 5,9.65685425 5,8 C5,6.34314575 6.34314575,5 8,5 C9.65685425,5 11,6.34314575 11,8 C11,9.65685425 9.65685425,11 8,11 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <span class="sort-by__selected sort-two-col" ng-show="Most-helpful">Most helpful</span>
                </label>
                <label class="sort-dropdown__item" loadingDone="">
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-full ng-hide">
                    <use xlink:href="#checkbox-single">
                      <symbol viewBox="0 0 17 17" id="checkbox-single">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M8,11 C6.34314575,11 5,9.65685425 5,8 C5,6.34314575 6.34314575,5 8,5 C9.65685425,5 11,6.34314575 11,8 C11,9.65685425 9.65685425,11 8,11 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <span class="sort-by__selected sort-two-col" ng-show="Most-positive">Most positive</span>
                </label>
                <label class="sort-dropdown__item" loadingDone="">
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-full ng-hide">
                    <use xlink:href="#checkbox-single">
                      <symbol viewBox="0 0 17 17" id="checkbox-single">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M8,11 C6.34314575,11 5,9.65685425 5,8 C5,6.34314575 6.34314575,5 8,5 C9.65685425,5 11,6.34314575 11,8 C11,9.65685425 9.65685425,11 8,11 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <span class="sort-by__selected sort-two-col" ng-show="Most-critical">Most critical</span>
                </label>
                <label class="sort-dropdown__item" loadingDone="">
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-full ng-hide">
                    <use xlink:href="#checkbox-single">
                      <symbol viewBox="0 0 17 17" id="checkbox-single">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M8,11 C6.34314575,11 5,9.65685425 5,8 C5,6.34314575 6.34314575,5 8,5 C9.65685425,5 11,6.34314575 11,8 C11,9.65685425 9.65685425,11 8,11 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <span class="sort-by__selected sort-two-col" ng-show="Most-recent">Most recent</span>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="reviews__main">
        <div class="reviews__main-col">
          <?php if($have_change_after_select_user > 0): ?>
            <?php
            if($check_comments_by_UserName > 0){
            } else {
            ?>
              <div class="review__item review-new ng-hide">
                <div class="review__col review__col--profile">
                  <div class="ng-isolate-scope">
                    <div class="profile-image--outside"><img srcset="<?php echo $fetch_gog_users_new_user['Profile_image']; ?>" /></div>
                    <p class="review__profile-name ng-binding"><?php echo $fetch_gog_users_new_user['UserName']; ?></p>
                    <p class="review__profile-stats">Reviews: 1</p>
                  </div>
                </div>
                <div class="review__col review__col--body">
                  <div class="review-new__row">
                    <div class="review-new__stars">
                      <div class="average-body__stars-rating" lastrating="">
                        <span class="rating-stars__star ng-scope is-empty first-star-rating" rate="1">
                          <svg class="ic-svg svg-star--full ng-hide">
                            <use xlink:href="#star-full">
                              <symbol viewBox="0 0 32 32" id="star-full">
                              <g id="star-full_icomoon-ignore">
                                <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                              </g>
                                <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                              </symbol>
                            </use>
                          </svg>
                          <svg class="ic-svg svg-star--empty">
                            <use xlink:href="#star-empty">
                              <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                              <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                 M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                "></path>
                              </symbol>
                            </use>
                          </svg>
                        </span>
                        <span class="rating-stars__star ng-scope is-empty" rate="2">
                          <svg class="ic-svg svg-star--full ng-hide">
                            <use xlink:href="#star-full">
                              <symbol viewBox="0 0 32 32" id="star-full">
                              <g id="star-full_icomoon-ignore">
                                <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                              </g>
                                <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                              </symbol>
                            </use>
                          </svg>
                          <svg class="ic-svg svg-star--empty">
                            <use xlink:href="#star-empty">
                              <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                              <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                 M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                "></path>
                              </symbol>
                            </use>
                          </svg>
                        </span>
                        <span class="rating-stars__star ng-scope is-empty" rate="3">
                          <svg class="ic-svg svg-star--full ng-hide">
                            <use xlink:href="#star-full">
                              <symbol viewBox="0 0 32 32" id="star-full">
                              <g id="star-full_icomoon-ignore">
                                <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                              </g>
                                <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                              </symbol>
                            </use>
                          </svg>
                          <svg class="ic-svg svg-star--empty">
                            <use xlink:href="#star-empty">
                              <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                              <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                 M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                "></path>
                              </symbol>
                            </use>
                          </svg>
                        </span>
                        <span class="rating-stars__star ng-scope is-empty" rate="4">
                          <svg class="ic-svg svg-star--full ng-hide">
                            <use xlink:href="#star-full">
                              <symbol viewBox="0 0 32 32" id="star-full">
                              <g id="star-full_icomoon-ignore">
                                <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                              </g>
                                <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                              </symbol>
                            </use>
                          </svg>
                          <svg class="ic-svg svg-star--empty">
                            <use xlink:href="#star-empty">
                              <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                              <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                 M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                "></path>
                              </symbol>
                            </use>
                          </svg>
                        </span>
                        <span class="rating-stars__star ng-scope is-empty" rate="5">
                          <svg class="ic-svg svg-star--full ng-hide">
                            <use xlink:href="#star-full">
                              <symbol viewBox="0 0 32 32" id="star-full">
                              <g id="star-full_icomoon-ignore">
                                <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                              </g>
                                <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                              </symbol>
                            </use>
                          </svg>
                          <svg class="ic-svg svg-star--empty">
                            <use xlink:href="#star-empty">
                              <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                              <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                 M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                "></path>
                              </symbol>
                            </use>
                          </svg>
                        </span>
                      </div>
                    </div>
                    <div class="review-new__input-wrapper">
                      <input required name="reviewtitle" type="text" placeholder="Review title..." class="type-text" minlength="10" maxlength="40"/>
                      <span class="review-new__charsleft ng-binding">40</span>
                    </div>
                  </div>
                  <div class="review-new__row">
                    <div class="review-new__textarea-wrapper">
                      <textarea required name="reviewtext" placeholder="Review text..." rows="10" class="type-text" minlength="7" maxlength="2000"></textarea>
                      <span class="review-new__charsleft">2000</span>
                    </div>
                  </div>
                  <div class="review-new__row">
                    <div class="review-new__guideline-wrapper">
                      <svg class="icon-svg review-new__icon-guideline">
                        <use xlink:href="#bulb">
                          <symbol viewBox="0 0 16 16" id="bulb">
                          <defs>
                              <path d="M7.667 3.133c2.42 0 4.405 1.967 4.371 4.334 0 1.033-.37 2.033-1.042 2.833-.74.867-1.144 2-1.144 3.267 0 .2-.134.333-.336.333H5.817c-.202 0-.336-.133-.336-.333 0-1.167-.437-2.367-1.278-3.4A4.272 4.272 0 0 1 3.33 6.8c.303-1.9 1.917-3.433 3.833-3.633.168-.034.337-.034.505-.034zm2.824 6.734c.572-.667.908-1.5.908-2.4 0-2.034-1.681-3.7-3.732-3.7-.135 0-.303.033-.437.033C5.615 3.967 4.237 5.267 4 6.867a3.637 3.637 0 0 0 .74 2.866c.874 1.067 1.345 2.267 1.413 3.5H9.18c.067-1.266.538-2.466 1.311-3.366zm4.506-2.6c.168 0 .336.133.336.333s-.134.333-.336.333h-1.984c-.202 0-.336-.133-.336-.333s.134-.333.336-.333h1.984zM2.69 7.6c0 .167-.168.333-.37.333H.336C.135 7.933 0 7.8 0 7.6s.135-.333.336-.333h2.018c.202 0 .336.133.336.333zm4.977-5.067c-.202 0-.337-.133-.337-.333V.333c0-.2.135-.333.337-.333.201 0 .336.133.336.333V2.2c0 .2-.135.333-.336.333zm3.8 1.6a.365.365 0 0 1-.236-.1.32.32 0 0 1 0-.466l1.345-1.334a.327.327 0 0 1 .47 0 .32.32 0 0 1 0 .467l-1.344 1.333a.307.307 0 0 1-.236.1zM3.664 11.1a.327.327 0 0 1 .471 0 .32.32 0 0 1 0 .467l-1.412 1.4a.307.307 0 0 1-.236.1.365.365 0 0 1-.235-.1.32.32 0 0 1 0-.467l1.412-1.4zm8.003-.033l1.412 1.4a.32.32 0 0 1 0 .466.307.307 0 0 1-.235.1.365.365 0 0 1-.235-.1l-1.413-1.4a.32.32 0 0 1 0-.466.327.327 0 0 1 .471 0zm-8.07-7.034L2.253 2.7a.32.32 0 0 1 0-.467.327.327 0 0 1 .47 0L4.07 3.567a.32.32 0 0 1 0 .466.307.307 0 0 1-.236.1.365.365 0 0 1-.235-.1zM9.415 14.3c.168 0 .336.133.336.333s-.134.334-.336.334H5.918c-.202 0-.336-.134-.336-.334s.134-.333.336-.333h3.497zm0 1.033c.168 0 .336.134.336.334S9.617 16 9.415 16H5.918c-.202 0-.336-.133-.336-.333s.134-.334.336-.334h3.497z" id="bulb_a"></path>
                          </defs>
                          <g fill="none" fill-rule="evenodd">
                              <mask id="bulb_b" fill="white">
                                  <use xlink:href="#bulb_a"></use>
                              </mask>
                              <use fill="#000000" fill-rule="nonzero" xlink:href="#bulb_a"></use>
                              <g mask="url(#bulb_b)" fill="#212121">
                                  <path d="M0 0h16v16H0z"></path>
                              </g>
                          </g>
                          </symbol>
                        </use>
                      </svg>
                      <span>Not sure what to write? <button>Check our guidelines</button></span>
                    </div>
                    <div class="review-new__buttons-wrapper">
                      <div class="button button--new-review cancel-button">Cancel</div>
                      <input class="button button--new-review save-button" type="submit" value="Save my review">
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php endif; ?>
          <div class="review__item--saved" id="reviewMyCommentWithOthre">
            <div id="for_catalog__paginator_wrapper">
              <?php
              foreach($fetch_comments as $fetch_comment){
                // select users info from comments
                $select_comments_user_information = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE UserName = ? LIMIT 1");
                $select_comments_user_information->execute(array($fetch_comment['comment_username']));
                $fetch_comments_user_information = $select_comments_user_information->fetch();

                $limitCommentsInOnePage += 1;
                // to collect comments id for [catalog__paginator]
                array_push($arrayCollectCommentsIDForUpdate, $fetch_comment['commentId']);
                if($limitCommentsInOnePage <= 5){
              ?>
              <?php if($limitCommentsInOnePage == 1){ ?>
                <div class="review__top-bar ng-scope">
                  <svg class="ic-svg review__pin-icon">
                    <use xlink:href="#pin">
                      <symbol viewBox="0 0 10 10" id="pin">
                          <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                          <title>icon_pin</title>
                          <desc>Created with Sketch.</desc>
                          <defs></defs>
                          <g id="pin_PRODUCT-PAGE" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g id="pin_###-ASSET-EXPORT-ARTBOARD-###" transform="translate(-120.000000, -149.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                  <path d="M127.313111,149.183232 C127.06956,148.939963 126.673868,148.938719 126.427813,149.180743 C126.362699,149.245449 126.31762,149.321976 126.286942,149.401614 C125.766031,150.481701 125.192528,151.090806 124.468762,151.45042 C123.656717,151.848609 122.724462,152.125475 121.221835,152.125475 C121.140442,152.125475 121.05905,152.141029 120.982666,152.17276 C120.829273,152.236221 120.707811,152.357544 120.643949,152.509354 C120.580713,152.661164 120.580713,152.832883 120.643949,152.984692 C120.67588,153.061219 120.721585,153.13028 120.779812,153.18752 L122.810237,155.205218 L120,158.652862 L120.370001,159 L123.757519,156.146561 L125.787318,158.163637 C125.844919,158.222121 125.914415,158.266918 125.991425,158.298648 C126.067809,158.330379 126.149201,158.347178 126.230593,158.347178 C126.311986,158.347178 126.393378,158.330379 126.469762,158.298648 C126.623155,158.235187 126.745243,158.115108 126.808479,157.962054 C126.84041,157.886772 126.856688,157.805267 126.856688,157.725007 C126.856688,156.231799 127.134674,155.305387 127.534749,154.510876 C127.896006,153.791647 128.508952,153.221739 129.596479,152.704093 C129.677245,152.673607 129.753629,152.628811 129.818117,152.564105 C130.061668,152.319592 130.060415,151.92638 129.815612,151.684356 L127.313111,149.183232 Z" id="pin_icon_pin"></path>
                              </g>
                          </g>
                      </symbol>
                    </use>
                  </svg>
                  <span class="ng-binding">filters based most helpful review</span>
                </div>
              <?php } ?>
                <div class="review__item" <?php if($limitCommentsInOnePage == 1){ ?> style="background: hsla(0,0%,100%,.2);" <?php } ?> commentid="<?php echo $fetch_comment['commentId']; ?>">
                  <div class="review__col review__col--profile">
                    <div class="ng-isolate-scope">
                      <?php
                      $select_comments_user_info = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE UserName = ?");
                      $select_comments_user_info->execute(array($fetch_comment['comment_username']));
                      $fetch_comments_user_info = $select_comments_user_info->fetch();
                      ?>
                      <div class="profile-image--outside"><img srcset="<?php echo $fetch_comments_user_info['Profile_image']; ?>" /></div>
                      <p class="review__profile-name ng-binding"><?php echo $fetch_comments_user_info['UserName']; ?></p>
                      <p class="review__profile-stats">Games: 1</p>
                      <p class="review__profile-stats">Reviews: 1</p>
                    </div>
                  </div>
                  <div class="review__col review__col--body">
                    <div class="review-new__row">
                      <div class="stars--review--title--inComment">
                        <div class="review-new__stars">
                          <div class="average-body__stars-rating no_event_here">
                            <span class="rating-stars__star ng-scope is-empty first-star-rating">
                              <svg class="ic-svg svg-star--full <?php if($fetch_comment['game_rating'] >= '1'){ } else{ echo 'ng-hide'; } ?>">
                                <use xlink:href="#star-full">
                                  <symbol viewBox="0 0 32 32" id="star-full">
                                  <g id="star-full_icomoon-ignore">
                                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                                  </g>
                                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                                  </symbol>
                                </use>
                              </svg>
                              <svg class="ic-svg svg-star--empty <?php if($fetch_comment['game_rating'] >= '1'){ echo 'ng-hide'; } else{ } ?>">
                                <use xlink:href="#star-empty">
                                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                    "></path>
                                  </symbol>
                                </use>
                              </svg>
                            </span>
                            <span class="rating-stars__star ng-scope is-empty">
                              <svg class="ic-svg svg-star--full <?php if($fetch_comment['game_rating'] >= '2'){ } else{ echo 'ng-hide'; } ?>">
                                <use xlink:href="#star-full">
                                  <symbol viewBox="0 0 32 32" id="star-full">
                                  <g id="star-full_icomoon-ignore">
                                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                                  </g>
                                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                                  </symbol>
                                </use>
                              </svg>
                              <svg class="ic-svg svg-star--empty <?php if($fetch_comment['game_rating'] >= '2'){ echo 'ng-hide'; } else{ } ?>">
                                <use xlink:href="#star-empty">
                                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                    "></path>
                                  </symbol>
                                </use>
                              </svg>
                            </span>
                            <span class="rating-stars__star ng-scope is-empty">
                              <svg class="ic-svg svg-star--full <?php if($fetch_comment['game_rating'] >= '3'){ } else{ echo 'ng-hide'; } ?>">
                                <use xlink:href="#star-full">
                                  <symbol viewBox="0 0 32 32" id="star-full">
                                  <g id="star-full_icomoon-ignore">
                                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                                  </g>
                                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                                  </symbol>
                                </use>
                              </svg>
                              <svg class="ic-svg svg-star--empty <?php if($fetch_comment['game_rating'] >= '3'){ echo 'ng-hide'; } else{ } ?>">
                                <use xlink:href="#star-empty">
                                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                    "></path>
                                  </symbol>
                                </use>
                              </svg>
                            </span>
                            <span class="rating-stars__star ng-scope is-empty">
                              <svg class="ic-svg svg-star--full <?php if($fetch_comment['game_rating'] >= '4'){ } else{ echo 'ng-hide'; } ?>">
                                <use xlink:href="#star-full">
                                  <symbol viewBox="0 0 32 32" id="star-full">
                                  <g id="star-full_icomoon-ignore">
                                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                                  </g>
                                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                                  </symbol>
                                </use>
                              </svg>
                              <svg class="ic-svg svg-star--empty <?php if($fetch_comment['game_rating'] >= '4'){ echo 'ng-hide'; } else{ } ?>">
                                <use xlink:href="#star-empty">
                                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                    "></path>
                                  </symbol>
                                </use>
                              </svg>
                            </span>
                            <span class="rating-stars__star ng-scope is-empty">
                              <svg class="ic-svg svg-star--full <?php if($fetch_comment['game_rating'] == '5'){ } else{ echo 'ng-hide'; } ?>">
                                <use xlink:href="#star-full">
                                  <symbol viewBox="0 0 32 32" id="star-full">
                                  <g id="star-full_icomoon-ignore">
                                    <line stroke-width="1" stroke="#449FDB" opacity=""></line>
                                  </g>
                                    <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
                                  </symbol>
                                </use>
                              </svg>
                              <svg class="ic-svg svg-star--empty <?php if($fetch_comment['game_rating'] == '5'){ echo 'ng-hide'; } else{ } ?>">
                                <use xlink:href="#star-empty">
                                  <symbol viewBox="0 0 12.043 11.964" id="star-empty">
                                  <path d="M6.016,2.58L6.8,4.433l0.208,0.491l0.524,0.101l2.395,0.461L8.234,7.07L7.831,7.448l0.105,0.543l0.378,1.948L6.539,8.863
                                    L6.024,8.551l-0.517,0.31L3.71,9.939l0.394-1.94l0.111-0.547L3.808,7.07L2.116,5.486L4.51,5.025l0.527-0.101l0.207-0.495L6.016,2.58
                                     M6.009,0L4.321,4.043L0,4.875L3.124,7.8l-0.846,4.164l3.743-2.245l3.705,2.245L8.918,7.8l3.125-2.925L7.721,4.043L6.009,0L6.009,0z
                                    "></path>
                                  </symbol>
                                </use>
                              </svg>
                            </span>
                          </div>
                        </div>
                        <div class="review-new__input-wrapper"><?php echo $fetch_comment['comment_title']; ?></div>
                      </div>
                      <div class="date_time"><?php echo $fetch_comment['comment_date']; ?> <?php if($fetch_comments_user_information['Realy_in_gog'] == "1"){ ?> <span class="Verified___owner">Verified owner</span> <?php } ?></div>
                      <div class="comment--text">
                        <pre class="long-text ng-hide"><?php echo $fetch_comment['comment_text']; ?></pre>
                        <pre class="short-text">
                          <?php if(strlen($fetch_comment['comment_text']) < 900){ echo $fetch_comment['comment_text']; } else { echo substr($fetch_comment['comment_text'], 0, 900); ?> <button class="read--more--comment"><img src="https://img.icons8.com/emoji/48/000000/eye-emoji.png"/> read more</button> <?php } ?>
                        </pre>
                      </div>
                      <div class="helpful-comment-yes--no">
                        <div class="your--vote">
                          <?php if($fetch_comment['helpful_comment_for_this_user'] == "0"){ ?>
                            <span>Is this helpful to you?</span>
                            <span class="HelpFulComment helpedComment">yes</span>
                            <span class="unHelpFulComment helpedComment">no</span>
                          <?php }?>
                          <span class="ThanksForVote <?php if($fetch_comment['helpful_comment_for_this_user'] == "0"){ echo 'ng-hide'; } ?>">Thanks For Your Vote!</span>
                        </div>
                        <span class="all-users-find-this-helpful">
                          (<helpful><?php echo ((int)$fetch_comment['helpful_comment_for_all']); ?></helpful>
                          of
                          <unhelpful><?php echo ((int)$fetch_comment['helpful_comment_for_all']) + ((int)$fetch_comment['Un_helpful_comment_for_all']); ?></unhelpful>
                          users found this helpful)
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } } ?>
            </div>
            <!---->
            <?php if($limitCommentsInOnePage == 0){ ?>
              <div class="noResultsFound">There are no reviews yet.</div>
            <?php } ?>
            <!-- catalog__paginator-wrapper -->
            <div class="catalog__paginator-wrapper">
              <div class="catalog__paginator">
                <div class="paginator-container">
                  <?php if(($limitCommentsInOnePage / 5) < 1){
                  } else { ?>
                    <div class="arrow-wrapper arrow-wrapper--left arrow-wrapper--hidden">
                      <svg class="arrow-left">
                        <use xlink:href="#paginator-chevron"><symbol viewBox="0 0 15 24" id="paginator-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use>
                      </svg>
                    </div>
                    <?php for($PagesNumber = 1; $PagesNumber <= ceil($limitCommentsInOnePage / 5); $PagesNumber++){ ?>
                      <div noloading="<?php if($PagesNumber == 1){ echo 'Done'; } ?>" ng-item-index="<?php echo $PagesNumber; ?>" class="page-indicator page-indicator--inner
                            <?php
                              if($PagesNumber == 1){ echo ' page-indicator--active page-indicator--first '; } else { echo ' page-index-wrapper--next '; }
                              if($PagesNumber == ceil($limitCommentsInOnePage / 5)){ echo ' page-indicator--last '; }
                              if(ceil($limitCommentsInOnePage / 5) > 6){
                                if($PagesNumber >= 5 && $PagesNumber != ceil($limitCommentsInOnePage / 5)){ echo ' ng-hide '; }
                                if($PagesNumber == 4){ echo ' Dots_bettween_f-l '; }
                              }
                              ?>
                            ">
                        <div class="page-ellipsis page-ellipsis-desktop <?php if(ceil($limitCommentsInOnePage / 5) > 6){ if($PagesNumber == 4){}else{ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">...</div>
                        <div class="page-index-wrapper page-indicator--inactive <?php if(ceil($limitCommentsInOnePage / 5) > 6){ if($PagesNumber == 4){ echo 'ng-hide'; }else{} } ?>"><?php echo $PagesNumber; ?></div>
                        <div class="page-ellipsis page-ellipsis-mobile ng-hide">...</div>
                      </div>
                    <?php } ?>
                    <div class="arrow-wrapper arrow-wrapper--right  <?php if(($limitCommentsInOnePage / 5) == 1){ echo 'arrow-wrapper--hidden'; } ?>">
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
            <div id="ReturnCommentsIdForWrapper" class="ReturnCommentsIdForWrapper ng-hide">
              <?php
              for($printId = 0; $printId < count($arrayCollectCommentsIDForUpdate); $printId++){
                if(($printId + 1) == count($arrayCollectCommentsIDForUpdate)){
                  echo $arrayCollectCommentsIDForUpdate[$printId];
                } else {
                  echo $arrayCollectCommentsIDForUpdate[$printId] . ",";
                }
              }
              ?>
            </div>
            <!---->
          </div>
        </div>
        <div class="reviews__aside-col ng-scope <?php if($countNumberOfComments > 0){}else{ echo 'ng-hide'; } ?>">
          <div class="container--two-columns__child--curated-collection">
            <!---->
            <div class="curated-collection-section filter__item filter__item--checkbox language--filter__item--checkbox" CustomLanguage="">
              <div class="filter__header">
                <div class="filter__clear-wrapper ng-hide">
                  <svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
                </div>
                <div class="filter__toggle">
                  <div class="filter__title">Written in</div>
                  <div class="filter__chevron-wrapper">
                    <svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg>
                  </div>
                </div>
              </div>
              <div class="ShowWhenFilterOff"></div>
              <div class="filter__item-options">
                <span class="option__item" itemTextFilterOff="English" loadingDone="" LanguageValue="English">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">English</div>
                </span>
                <span class="option__item" itemTextFilterOff="Deutsch" loadingDone="" LanguageValue="Deutsch">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">Deutsch</div>
                </span>
                <span class="option__item" itemTextFilterOff="français" loadingDone="" LanguageValue="French">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">français</div>
                </span>
                <span class="option__item" itemTextFilterOff="русский" loadingDone="" LanguageValue="Russian">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">русский</div>
                </span>
                <span class="option__item" itemTextFilterOff="polski" loadingDone="" LanguageValue="Polish">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">polski</div>
                </span>
                <span class="option__item" itemTextFilterOff="中文(简体)" loadingDone="" LanguageValue="ChineseSimplified">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">中文(简体)</div>
                </span>
                <span class="option__item" itemTextFilterOff="others" loadingDone="" LanguageValue="others">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">others</div>
                </span>
              </div>
            </div>
            <!---->
            <!---->
            <div class="curated-collection-section filter__item filter__item--checkbox featrues--filter__item--checkbox" CustomFeatrues="">
              <div class="filter__header">
                <div class="filter__clear-wrapper ng-hide">
                  <svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
                </div>
                <div class="filter__toggle">
                  <div class="filter__title">Written by</div>
                  <div class="filter__chevron-wrapper">
                    <svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg>
                  </div>
                </div>
              </div>
              <div class="ShowWhenFilterOff"></div>
              <div class="filter__item-options">
                <span class="option__item" FeatruesValue="VerifiedOwners" loadingDone="" itemTextFilterOff="Verified Owners">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">Verified owners</div>
                </span>
                <span class="option__item" FeatruesValue="others" loadingDone="" itemTextFilterOff="others">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">others</div>
                </span>
              </div>
            </div>
            <!---->
            <!---->
            <div class="curated-collection-section filter__item filter__item--radio" CustomLastAdded="">
              <div class="filter__header">
                <div class="filter__clear-wrapper ng-hide">
                  <svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
                </div>
                <div class="filter__toggle">
                  <div class="filter__title">Added</div>
                  <div class="filter__chevron-wrapper">
                    <svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg>
                  </div>
                </div>
              </div>
              <div class="ShowWhenFilterOff"></div>
              <div class="filter__item-options">
                <span class="option__item" loadingDone="" lastadded="30" itemTextFilterOff="last 30 days">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                    <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text"> Last 30 days</div>
                </span>
                <span class="option__item" loadingDone="" lastadded="90" itemTextFilterOff="last 90 days">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                    <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text"> Last 90 days</div>
                </span>
                <span class="option__item" loadingDone="" lastadded="6m" itemTextFilterOff="last 6 months">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                    <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">Last 6 months</div>
                </span>
                <span class="option__item last_of_radio" loadingDone="" lastadded="Whenever" itemTextFilterOff="whenever">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                    <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
                  </svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">	Whenever</div>
                </span>

                <span class="option__item option__item_Start_checkbox" lastadded="AfterRelease" loadingDone="" itemTextFilterOff="after release">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">After release</div>
                </span>
                <span class="option__item option__item_Start_checkbox" lastadded="DuringDevelopment" loadingDone="" itemTextFilterOff="during development">
                  <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
                  <svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                    <use xlink:href="#checkbox">
                      <symbol viewBox="0 0 17 17" id="checkbox">
                          <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                      </symbol>
                    </use>
                  </svg>
                  <div class="option__text">During development</div>
                </span>
              </div>
            </div>
            <!---->
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<!-- End With User Reviews -->
<!-- banner of using cookies -->
<div class="_floating-banner ng-scope">
  <div class="_floating-banner__container">
    <div class="_floating-banner__text">
      Not like it changes anything, but we are obligated to inform you that we are using cookies - well, we just did.
      <a href="cookie.php">More info on cookies</a>
    </div>
    <div class="_floating-banner__close">
      <span>x</span>
      I don’t want to see this again
    </div>
  </div>
</div>
