<?php
  require '../connect.php';

  // remove game from cart
  //if(isset($_POST['select_game_by_id_remove_from_cart'])){ $select_game_by_id_remove_from_cart = $_POST['select_game_by_id_remove_from_cart']; } else { $select_game_by_id_remove_from_cart = ""; }
  $select_game_by_id_remove_from_cart = $_POST['select_game_by_id_remove_from_cart'] ?? "";

  $select_gog_users_new_user = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE Realy_in_gog = ? LIMIT 1");
  $select_gog_users_new_user->execute(array("1"));
  $fetch_gog_users_new_user = $select_gog_users_new_user->fetch();
  $have_change_after_select_user = $select_gog_users_new_user->rowcount();

  $gc_g_cart_private_sign_out = 0;
  if($have_change_after_select_user > 0){
    $gc_g_cart_private_sign_out = 1;
    $Gamesowner = $fetch_gog_users_new_user['UserName'];
  } else {
    $gc_g_cart_private_sign_out = 0;
    $Gamesowner = "Root";
  }

  // select game by id
  $select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ? LIMIT 1");
  $select_game_by_id->execute(array($select_game_by_id_remove_from_cart));
  $fetch_game_by_id = $select_game_by_id->fetch();
  // to any changes rowcount > 0
  $have_change_after_fetch = $select_game_by_id->rowcount();

  if($have_change_after_fetch > 0){
    // select gc_g_cart_id
    $select_cart_table_id = $connect->prepare("SELECT * FROM " . $userCartTable . " WHERE gc_g_cart_id = ? AND gc_g_cart_private_sign_out = ? AND GamesOwner = ?");
    $select_cart_table_id->execute(array($select_game_by_id_remove_from_cart, $gc_g_cart_private_sign_out, $Gamesowner));
    $fetch_cart_table_id = $select_cart_table_id->fetch();
    $have_change_after_fetch_by_id = $select_cart_table_id->rowcount();

    if($have_change_after_fetch_by_id > 0){
      // delete game
      $delete_game_by_id = $connect->prepare("DELETE FROM " . $userCartTable . " WHERE gc_g_cart_id = ? AND gc_g_cart_private_sign_out = ? AND GamesOwner = ? LIMIT 1");
      $delete_game_by_id->execute(array($select_game_by_id_remove_from_cart, $gc_g_cart_private_sign_out, $Gamesowner));

      $update_game_by_id_column_in_cart = $connect->prepare("UPDATE " . $allGameInOnePlaceTable . " SET gc_g_incart = ? WHERE gc_g_id = ? LIMIT 1");
      $update_game_by_id_column_in_cart->execute(array("0", $select_game_by_id_remove_from_cart));

      // select games in cart
      $select_game_from_cart = $connect->prepare("SELECT * FROM " . $userCartTable . " WHERE gc_g_cart_private_sign_out = ? AND GamesOwner = ? ORDER BY gc_g_date_add_to_cart DESC");
      $select_game_from_cart->execute(array($gc_g_cart_private_sign_out, $Gamesowner));
      $fetch_games_from_cart = $select_game_from_cart->fetchAll();

      // total price of games
      $total_price_of_game_in_cart = 0;
      $count_num_of_games_in_cart = 0;
      foreach($fetch_games_from_cart as $fetch_game_from_cart){

        $gc_g_price_price = explode(" & ", $fetch_game_from_cart['gc_g_cart_price_price_and_discount_presentage'])[0];
        $gc_g_discount_presentage = explode(" & ", $fetch_game_from_cart['gc_g_cart_price_price_and_discount_presentage'])[1];
        $gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

        $total_price_of_game_in_cart += $gc_g_format_price_discount;
        $count_num_of_games_in_cart++;
      }

      if($count_num_of_games_in_cart > 0){
      ?>
        <!---->
        <div class="menu-header menu-header-cart">
          <div class="menu-cart-items">
            <span class="menu-header__label hide-in-lite-mode">Your shopping cart</span>
            <span class="menu-header__items hide-in-lite-mode">
              <span class="cart_cartCount"><?php echo $count_num_of_games_in_cart; ?></span>
              Item added
            </span>
          </div>
          <a class="menu-cart__btn menu-btn menu-btn--green" href="">Go to checkout</a>
          <div class="menu-cart__total-price _price"><?php echo $total_price_of_game_in_cart; ?></div>
        </div>
        <!---->
        <div class="js-gog-scrollbar-wrapper_parent <?php if($have_change_after_select_user > 0){ echo 'user_realy_in_gog_enjoy'; } ?>">
          <div class="dots-wrapper">
            <span class="dots"></span>
            <span class="dots"></span>
            <span class="dots"></span>
          </div>
          <div class="js-gog-scrollbar-wrapper _gog-menu-scrollbar__wrapper">
            <div class="js-gog-scrollbar-content _gog-menu-scrollbar__content menu-cart__content">
              <?php foreach($fetch_games_from_cart as $fetch_game_from_cart){
                /* global var assign data from database */
                // gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
                $gc_g_tba = explode(" & ", $fetch_game_from_cart['gc_g_cart_tba_free_owned'])[0];
                $gc_g_free = explode(" & ", $fetch_game_from_cart['gc_g_cart_tba_free_owned'])[1];
                $gc_g_owned = explode(" & ", $fetch_game_from_cart['gc_g_cart_tba_free_owned'])[2];

                // gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
                $gc_g_price_price = explode(" & ", $fetch_game_from_cart['gc_g_cart_price_price_and_discount_presentage'])[0];
                $gc_g_discount_presentage = explode(" & ", $fetch_game_from_cart['gc_g_cart_price_price_and_discount_presentage'])[1];
                $gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

                // href of game
                $gc_g_href = $fetch_game_from_cart['gc_g_cart_href'];

                // image search cover
                $gc_g_image_search_cover = $fetch_game_from_cart['gc_g_cart_image_cover'];

                // [ title ] of game and mark tag for charactes search
                $gc_g_title = $fetch_game_from_cart['gc_g_cart_title'];
              ?>
              <!---->
              <div ng-game-movies-id="<?php echo $fetch_game_from_cart['gc_g_cart_id']; ?>" gc_g_cart_href="<?php echo $fetch_game_from_cart['gc_g_cart_href']; ?>" gc_g_cart_title="<?php echo $fetch_game_from_cart['gc_g_cart_title']; ?>" class="menu-product menu-cart-item menu-product-state-holder js-focusable-element product-row--has-card is-discounted is-buyable is-in-cart is-first ">
                <div class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active">
                  <span class="product-state__is_choose product-state__is-tba <?php if($gc_g_tba == '0'){ echo 'ng-hide'; }else{ echo 'is-active-now'; } ?>">tba</span>
                  <span class="product-state__is_choose product-state__is-free <?php if($gc_g_free == '0'){ echo 'ng-hide'; }else{ echo 'is-active-now'; } ?>">free</span>
                  <span class="product-state__is_choose product-state__is-owned <?php if($gc_g_owned == '0'){ echo 'ng-hide'; }else{ echo 'is-active-now'; } ?>">owned</span>
                  <span class="product-state__is_choose _price product-state__price <?php if($gc_g_price_price == '0' || $gc_g_free == '1' || $gc_g_tba == '1' || $gc_g_owned == '1'){ echo 'ng-hide'; }else{ echo 'is-active-now'; } ?>">
                    <!-- number_format(float_number[1.2347], number of decimal points[2], separator for the decimal point[.], thousands separator['']); -->
                    <?php if($gc_g_discount_presentage == '0'){ echo $gc_g_price_price; } else { echo $gc_g_format_price_discount; } ?>
                  </span>
                </div>
                <a class="menu-product__link" href="<?php echo $gc_g_href; ?>">
                  <img srcset="<?php echo $gc_g_image_search_cover; ?>" alt="game_image_cover" />
                  <div class="menu-product__content">
                    <div class="menu-product__content-in">
                      <div class="menu-product__title"><?php echo $gc_g_title; ?></div>
                      <div class="menu-cart-item__options">
                        <!---->
                        <?php
                          $select_game_by_id_to_wishlist = $connect->prepare("SELECT * FROM " . $userWishlistTable . " WHERE gc_g_wishlist_id = ? AND GamesOwner = ? LIMIT 1");
                          $select_game_by_id_to_wishlist->execute(array($fetch_game_from_cart['gc_g_cart_id'], $Gamesowner));
                          $fetch_game_by_id_to_wishlist = $select_game_by_id_to_wishlist->fetch();
                          $have_change_after_fetch_from_wishlist = $select_game_by_id_to_wishlist->rowcount();
                        ?>
                        <!---->
                        <span class="menu-cart-option menu-cart-option-remove">remove</span>
                        <span class="menu-cart-option menu-cart-option--add-to-wishlist <?php if($have_change_after_select_user > 0){ if($have_change_after_fetch_from_wishlist > 0){ echo 'ng-hide'; } } ?>">Move to wishlist</span>
                        <span class="menu-cart-option menu-cart-option--wishlisted <?php if($have_change_after_select_user > 0){ if($have_change_after_fetch_from_wishlist > 0){}else{ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
                          <svg viewBox="0 0 32 32" class="menu-cart-option__icon menu-cart-option__icon--wishlisted"><use xlink:href="#icon-wishlisted2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 11 11" id="icon-wishlisted2"><path d="M5.5,1.8C4.3-1.1,0-0.5,0,3.9c0,2.4,2,3.2,3.2,4.3C4.2,9,5,9.9,5.5,11
                            c0.6-1.1,1.3-2,2.3-2.8C9,7.1,11,6.3,11,3.9C11-0.5,6.5-1.1,5.5,1.8z"></path></symbol></use></svg>
                            Wishlisted
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
              <!---->
              <?php } ?>
              <!-- for scroll in cart -->
              <div class="hide_16px_end_of_scroll"></div>
            </div>
          </div>
        </div>
      <?php
      } else {
      ?>
        <div class="menu-cart-empty">
         <div class="menu-cart-empty__header menu-uppercase">
           <svg viewBox="0 0 32 32" class="menu-cart-empty__header-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
            M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
           C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
           c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
           c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use></svg>
           Your cart is empty
         </div>
         <hr class="menu-cart-empty__line"/>
         <div class="menu-cart-empty__description">Explore great games and offers</div>
         <a href="" class="menu-btn menu-cart-empty__btn menu-cart-empty__btn_bestseller menu-uppercase">Browse bestsellers</a>
         <?php if($have_change_after_select_user > 0){ ?> <a href="" class="menu-btn menu-cart-empty__btn menu-cart-empty__btn_wishlist menu-uppercase">Your wishlist</a> <?php } ?>
        </div>
      <?php
      }
    }
  }
