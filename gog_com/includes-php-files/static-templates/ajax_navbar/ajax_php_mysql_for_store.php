<?php
  require '../connect.php';

  // [$ng_href]
  //if(isset($_POST['ng_href'])){ $ng_href = $_POST['ng_href']; } else { $ng_href = ""; }
  $ng_href = $_POST['ng_href'] ?? "";

  // type of category send with post method [$ng_type]
  //if(isset($_POST['ng_type'])){ $ng_type = $_POST['ng_type']; } else { $ng_type = ""; }
  $ng_type = $_POST['ng_type'] ?? "";

  // name of category send with post method [$ng_type]
  //if(isset($_POST['ng_caregory_name'])){ $ng_caregory_name = str_replace("and", "&", $_POST['ng_caregory_name']); } else { $ng_caregory_name = ""; }
  $ng_caregory_name = str_replace("and", "&", $_POST['ng_caregory_name']) ?? "";

  // caregory_btn_inside send with post method [$ng_type]
  //if(isset($_POST['ng_caregory_btn_inside'])){ $ng_caregory_btn_inside = str_replace("and", "&", $_POST['ng_caregory_btn_inside']); } else { $ng_caregory_btn_inside = ""; }
  $ng_caregory_btn_inside = str_replace("and", "&", $_POST['ng_caregory_btn_inside']) ?? "";

  // caregory_title_inside send with post method [$ng_type]
  //if(isset($_POST['ng_caregory_title_inside'])){ $ng_caregory_title_inside = str_replace("and", "&", $_POST['ng_caregory_title_inside']); } else { $ng_caregory_title_inside = ""; }
  $ng_caregory_title_inside = str_replace("and", "&", $_POST['ng_caregory_title_inside']) ?? "";

  if($ng_type == "game"){
    $select_game_for_store = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_title = ? LIMIT 1");
    $select_game_for_store->execute(array($ng_caregory_name));
    $fetch_game_for_store = $select_game_for_store->fetch();

    // gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
    $gc_g_price_price = explode(" & ", $fetch_game_for_store['gc_g_price_price_and_discount_presentage'])[0];
    $gc_g_discount_presentage = explode(" & ", $fetch_game_for_store['gc_g_price_price_and_discount_presentage'])[1];
    $gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

    $gc_g_tba = explode(" & ", $fetch_game_for_store['gc_g_tba_free_owned__noPrice_inSearch'])[0];
    $gc_g_free = explode(" & ", $fetch_game_for_store['gc_g_tba_free_owned__noPrice_inSearch'])[1];
    $gc_g_owned = explode(" & ", $fetch_game_for_store['gc_g_tba_free_owned__noPrice_inSearch'])[2];

    $gc_g_soon = explode(" & ", $fetch_game_for_store['gc_g_soon_indev'])[0];

    $gc_g_incart = $fetch_game_for_store['gc_g_incart'];
    ?>
    <div ng-game-movies-id="<?php echo $fetch_game_for_store['gc_g_id']; ?>"
          gc_g_href="<?php echo $fetch_game_for_store['gc_g_href']; ?>"
          gc_g_title="<?php echo $fetch_game_for_store['gc_g_title']; ?>"
          gc_g_incart="<?php echo $fetch_game_for_store['gc_g_incart']; ?>"
          gc_g_type="<?php echo $fetch_game_for_store['gc_g_type']; ?>"
    class="menu-custom-category menu-product-state-holder ng-scope product-row--has-card is-buyable">
      <a class="menu-custom-category__link ng-scope" href="<?php echo $fetch_game_for_store['gc_g_href']; ?>"></a>
      <div class="menu-custom-category__bg-container">
        <div class="menu-custom-category__bg" style="background-image:url('<?php echo $fetch_game_for_store['gc_g_store_image_cover']; ?>')"></div>
      </div>
      <div class="menu-custom-category__content">
        <img src="<?php echo $fetch_game_for_store['gc_g_store_image_logo']; ?>" />
        <p class="menu-custom-category__description ng-binding"><?php echo $fetch_game_for_store['gc_g_store_details']; ?></p>
        <div class="menu-custom-category__price">
          <span class="menu-custom-category__price-regular _price ng-binding"><?php echo $gc_g_format_price_discount; ?></span>
          <div ng-game-movies-id="<?php echo $fetch_game_for_store['gc_g_id']; ?>"
                gc_g_href="<?php echo $fetch_game_for_store['gc_g_href']; ?>"
                gc_g_title="<?php echo $fetch_game_for_store['gc_g_title']; ?>"
                gc_g_incart="<?php echo $fetch_game_for_store['gc_g_incart']; ?>"
                gc_g_type="<?php echo $fetch_game_for_store['gc_g_type']; ?>"
                gc_g_type_parent="<?php echo $fetch_game_for_store['gc_g_type_parent']; ?>"
                gc_g_image_search_cart_modifyToStore="<?php echo $fetch_game_for_store['gc_g_image_search_cart_modifyToStore']; ?>"
                gc_g_price_price_and_discount_presentage="<?php echo $fetch_game_for_store['gc_g_price_price_and_discount_presentage']; ?>"
                gc_g_os_win_mac_linux="<?php echo $fetch_game_for_store['gc_g_os_win_mac_linux']; ?>"
                gc_g_newReleases_and_upcoming_and_onsale="<?php echo $fetch_game_for_store['gc_g_newReleases_and_upcoming_and_onsale']; ?>"
                gc_g_soon_indev="<?php echo $fetch_game_for_store['gc_g_soon_indev']; ?>"
                gc_g_tba_free_owned__noPrice_inSearch="<?php echo $fetch_game_for_store['gc_g_tba_free_owned__noPrice_inSearch']; ?>"
                gc_g_type_other="<?php echo $fetch_game_for_store['gc_g_type_other']; ?>"
                gc_g_user_rating="<?php echo $fetch_game_for_store['gc_g_user_rating']; ?>"
          class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_owned == 1 || $gc_g_tba == 1){ echo 'tba_owned_prevent_action_add_to_cart'; } ?> <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
            <span class="menu-product__price-btn-text">
              <span class="product-status__in-cart <?php if($gc_g_incart == 0){ echo 'ng-hide'; } ?>">
                <svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
                 M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
                C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
                c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
                c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use></svg>
              </span>
              <span class="product-state__is_choose product-state__is-buy-now <?php if($gc_g_soon == 1 || $gc_g_owned == 1 || $gc_g_incart == 1){ echo 'ng-hide'; } ?>">Buy now</span>
              <span class="product-state__is_choose product-state__is-free <?php if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; } ?>">Pre-order now</span>
              <span class="product-state__is_choose product-state__is-owned <?php if($gc_g_owned == 0 || $gc_g_incart == 1){ echo 'ng-hide'; } ?>">owned</span>
            </span>
          </div>
        </div>
      </div>
    </div>
  <?php } elseif($ng_type == "all-games"){ ?>
    <div class="menu-inside-category menu-inside-category-all-games">
      <p class="menu-inside-category__title ng-binding"><?php echo $ng_caregory_title_inside; ?></p>
      <div class="menu-products cf">
        <div class="menu-category-item menu-category-item-win ng-scope">
          <div class="menu-product menu-product--grid menu-product-state-holder">
            <a class="menu-product__link ng-scope" href="store.php?category=Allgames&system=windows">
              <div class="menu-product__picture">
                <span class="menu-product__loader-title ng-binding">All games for windows</span>
                <img class="menu-product__image" srcset="https://menu-static.gog-statics.com/assets/img/windows-cover.jpg">
              </div>
              <div class="menu-product__content">All games for windows</div>
            </a>
          </div>
        </div>
        <div class="menu-category-item menu-category-item-mac ng-scope">
          <div class="menu-product menu-product--grid menu-product-state-holder">
            <a class="menu-product__link ng-scope" href="store.php?category=Allgames&system=osx">
              <div class="menu-product__picture">
                <span class="menu-product__loader-title ng-binding">All games for mac</span>
                <img class="menu-product__image" srcset="https://menu-static.gog-statics.com/assets/img/mac-cover.jpg">
              </div>
              <div class="menu-product__content">All games for mac</div>
            </a>
          </div>
        </div>
        <div class="menu-category-item menu-category-item-lin ng-scope">
          <div class="menu-product menu-product--grid menu-product-state-holder">
            <a class="menu-product__link ng-scope" href="store.php?category=Allgames&system=linux">
              <div class="menu-product__picture">
                <span class="menu-product__loader-title ng-binding">All games for linux</span>
                <img class="menu-product__image" srcset="https://menu-static.gog-statics.com/assets/img/linux-cover.jpg">
              </div>
              <div class="menu-product__content">All games for linux</div>
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php } else{ ?>

    <?php
      $selectWithReturnCategoryName = "";
      $executeArrayValue = "";
      if($ng_type == "all-games-nr-bs-os" && $ng_caregory_name == "newReleases"){
        $selectWithReturnCategoryName = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = 'games' AND gc_g_comingSoon__gameDiv = '0' AND (gc_g_newReleases_and_upcoming_and_onsale = '1 & 1 & 0' OR gc_g_newReleases_and_upcoming_and_onsale = '1 & 1 & 1' OR gc_g_newReleases_and_upcoming_and_onsale = '1 & 0 & 1' OR gc_g_newReleases_and_upcoming_and_onsale = '1 & 0 & 0') LIMIT 6";
        $executeArrayValue = array();
      }
      elseif($ng_type == "all-games-nr-bs-os" && $ng_caregory_name == "onsale"){
        $selectWithReturnCategoryName = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = 'games' AND gc_g_comingSoon__gameDiv = '0' AND (gc_g_newReleases_and_upcoming_and_onsale = '0 & 0 & 1' OR gc_g_newReleases_and_upcoming_and_onsale = '1 & 1 & 1' OR gc_g_newReleases_and_upcoming_and_onsale = '1 & 0 & 1' OR gc_g_newReleases_and_upcoming_and_onsale = '0 & 1 & 1') LIMIT 6";
        $executeArrayValue = array();
      }
      elseif($ng_type == "all-games-nr-bs-os" && $ng_caregory_name == "bestsellers"){
        $selectWithReturnCategoryName = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_type_parent = 'games' AND gc_g_comingSoon__gameDiv = '0' LIMIT 6";
        $executeArrayValue = array();
      }
      elseif($ng_type == "caregory"){
        $selectWithReturnCategoryName = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE (gc_g_type = ? OR gc_g_type_other = ?) AND gc_g_comingSoon__gameDiv = '0' LIMIT 6";
        $executeArrayValue = array($ng_caregory_name, $ng_caregory_name);
      }
      else{
        $selectWithReturnCategoryName = "SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_comingSoon__gameDiv = '0' LIMIT 6";
        $executeArrayValue = array();
      }

      $select_game_for_store = $connect->prepare($selectWithReturnCategoryName);
      $select_game_for_store->execute($executeArrayValue);
      $fetch_games_for_store = $select_game_for_store->fetchAll();
     ?>

    <div class="menu-inside-category">
      <p class="menu-inside-category__title ng-binding"><?php echo $ng_caregory_title_inside; ?></p>
      <div class="menu-products cf">
        <?php foreach($fetch_games_for_store as $fetch_game_for_store){

          // gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
          $gc_g_tba = explode(" & ", $fetch_game_for_store['gc_g_tba_free_owned__noPrice_inSearch'])[0];
          $gc_g_free = explode(" & ", $fetch_game_for_store['gc_g_tba_free_owned__noPrice_inSearch'])[1];
          $gc_g_owned = explode(" & ", $fetch_game_for_store['gc_g_tba_free_owned__noPrice_inSearch'])[2];

          $gc_g_incart = $fetch_game_for_store['gc_g_incart'];

          // gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
          $gc_g_price_price = explode(" & ", $fetch_game_for_store['gc_g_price_price_and_discount_presentage'])[0];
          $gc_g_discount_presentage = explode(" & ", $fetch_game_for_store['gc_g_price_price_and_discount_presentage'])[1];
          $gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

          // href of game
          $gc_g_href = $fetch_game_for_store['gc_g_href'];

          $gc_g_title = $fetch_game_for_store['gc_g_title'];

          // flags [ soon, indev ]
          $gc_g_soon = explode(" & ", $fetch_game_for_store['gc_g_soon_indev'])[0];
          $gc_g_indev = explode(" & ", $fetch_game_for_store['gc_g_soon_indev'])[1];

          // coming-soon
          $gc_g_comingSoon__gameDiv = $fetch_game_for_store['gc_g_comingSoon__gameDiv'];

          // gc_g_type_parent
          $gc_g_type_parent = $fetch_game_for_store['gc_g_type_parent'];

          // operating system [ windows - mac - linux ]
          $gc_g_os_win = explode(" & ", $fetch_game_for_store['gc_g_os_win_mac_linux'])[0];
          $gc_g_os_mac = explode(" & ", $fetch_game_for_store['gc_g_os_win_mac_linux'])[1];
          $gc_g_os_linux = explode(" & ", $fetch_game_for_store['gc_g_os_win_mac_linux'])[2];

          $gc_g_image_search_cart_modifyToStore = $fetch_game_for_store['gc_g_image_search_cart_modifyToStore'];
          $replace_image_100_200_to_196_392 = str_replace(["_100", "_200"], ["_196", "_392"], $gc_g_image_search_cart_modifyToStore);
          ?>
          <div ng-game-movies-id="<?php echo $fetch_game_for_store['gc_g_id']; ?>"
                gc_g_href="<?php echo $fetch_game_for_store['gc_g_href']; ?>"
                gc_g_title="<?php echo $fetch_game_for_store['gc_g_title']; ?>"
                gc_g_incart="<?php echo $fetch_game_for_store['gc_g_incart']; ?>"
                gc_g_type="<?php echo $fetch_game_for_store['gc_g_type']; ?>"
          class="menu-category-item ng-scope">
            <div class="menu-product menu-product--grid menu-product-state-holder">
              <div ng-game-movies-id="<?php echo $fetch_game_for_store['gc_g_id']; ?>"
                    gc_g_href="<?php echo $fetch_game_for_store['gc_g_href']; ?>"
                    gc_g_title="<?php echo $fetch_game_for_store['gc_g_title']; ?>"
                    gc_g_incart="<?php echo $fetch_game_for_store['gc_g_incart']; ?>"
                    gc_g_type="<?php echo $fetch_game_for_store['gc_g_type']; ?>"
                    gc_g_type_parent="<?php echo $fetch_game_for_store['gc_g_type_parent']; ?>"
                    gc_g_image_search_cart_modifyToStore="<?php echo $fetch_game_for_store['gc_g_image_search_cart_modifyToStore']; ?>"
                    gc_g_price_price_and_discount_presentage="<?php echo $fetch_game_for_store['gc_g_price_price_and_discount_presentage']; ?>"
                    gc_g_os_win_mac_linux="<?php echo $fetch_game_for_store['gc_g_os_win_mac_linux']; ?>"
                    gc_g_newReleases_and_upcoming_and_onsale="<?php echo $fetch_game_for_store['gc_g_newReleases_and_upcoming_and_onsale']; ?>"
                    gc_g_soon_indev="<?php echo $fetch_game_for_store['gc_g_soon_indev']; ?>"
                    gc_g_tba_free_owned__noPrice_inSearch="<?php echo $fetch_game_for_store['gc_g_tba_free_owned__noPrice_inSearch']; ?>"
                    gc_g_type_other="<?php echo $fetch_game_for_store['gc_g_type_other']; ?>"
                    gc_g_user_rating="<?php echo $fetch_game_for_store['gc_g_user_rating']; ?>"
              class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_owned == 1 || $gc_g_tba == 1){ echo 'tba_owned_prevent_action_add_to_cart'; } ?> <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?> <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
                <span class="menu-product__price-btn-text">
                  <span class="product-status__in-cart <?php if($gc_g_incart == 0){ echo 'ng-hide'; } ?>">
                    <svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
                     M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
                    C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
                    c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
                    c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use></svg>
                  </span>
                  <span class="product-state__is_choose product-state__is-tba <?php if($gc_g_tba == 0 || $gc_g_incart == 1){ echo 'ng-hide'; } ?>">tba</span>
                  <span class="product-state__is_choose product-state__is-free <?php if($gc_g_free == 0 || $gc_g_incart == 1){ echo 'ng-hide'; } ?>">free</span>
                  <span class="product-state__is_choose product-state__is-owned <?php if($gc_g_owned == 0 || $gc_g_incart == 1){ echo 'ng-hide'; } ?>">owned</span>
                  <span class="product-state__is_choose _price product-state__price <?php if($gc_g_tba == 1 || $gc_g_free == 1 || $gc_g_owned == 1 || $gc_g_incart == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
                </span>
              </div>
              <div class="comming---soon--search <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">coming soon</div>
              <a class="menu-product__link ng-scope" href="<?php echo $gc_g_href; ?>">
                <div class="menu-product__picture">
                  <span class="menu-product__loader-title ng-binding"><?php echo $gc_g_title; ?></span>
                  <!-- https://images.gog-statics.com/7a3439f4b2e20a37518c773e2bcb236cb3b8ec0b7a30e7fad458cdf2a7004f61_196.jpg 1x, https://images.gog-statics.com/7a3439f4b2e20a37518c773e2bcb236cb3b8ec0b7a30e7fad458cdf2a7004f61_392.jpg 2x -->
                  <img class="menu-product__image" srcset="<?php echo $replace_image_100_200_to_196_392; ?>">
                </div>
                <div class="menu-product__content">
                  <div class="menu-product__content-in">
                    <div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
                      <span class="product_isGame">
                        <i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
                        <i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
                        <i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
                      </span>
                    </div>
                    <div class="menu-product__movie-label <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">movie</div>
                    <div class="menu-product__flags">
                      <span class="menu-product__flag menu-product__flag--soon <?php if($gc_g_soon == 0){ echo 'ng-hide'; } ?>">soon</span>
                      <span class="menu-product__flag menu-product__flag--in-dev <?php if($gc_g_indev == 0){ echo 'ng-hide'; } ?>">in dev</span>
                    </div>
                    <div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == 0){ echo 'ng-hide'; } ?>">
                      <span class="menu-product__discount-text">
                        <span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
                        %
                      </span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
      </div>
      <a href="<?php echo str_replace("---", "&", $ng_href); ?>" class="menu-btn menu-btn--full menu-category-btn ng-binding ng-scope"><?php echo $ng_caregory_btn_inside; ?></a>
    </div>
  <?php } ?>
