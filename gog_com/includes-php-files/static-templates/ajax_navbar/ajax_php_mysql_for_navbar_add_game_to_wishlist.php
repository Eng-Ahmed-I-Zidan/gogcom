<?php
  require '../connect.php';

  // add game to wishlist
  $add_game_to_wishlist_by_id = $_POST['add_game_to_wishlist_by_id'] ?? "";

  $select_gog_users_new_user = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE Realy_in_gog = ? LIMIT 1");
  $select_gog_users_new_user->execute(array("1"));
  $fetch_gog_users_new_user = $select_gog_users_new_user->fetch();
  $have_change_after_select_user = $select_gog_users_new_user->rowcount();

  // if find user
  if($have_change_after_select_user > 0){ $Gamesowner = $fetch_gog_users_new_user['UserName']; } else { $Gamesowner = "Root"; }
?>
<!---->
<?php
  // select game by id
  $select_game_by_id = $connect->prepare("SELECT * FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ? LIMIT 1");
  $select_game_by_id->execute(array($add_game_to_wishlist_by_id));
  $fetch_game_by_id = $select_game_by_id->fetch();
  // to any changes rowcount > 0
  $have_change_after_fetch = $select_game_by_id->rowcount();

  if($have_change_after_fetch > 0){
?>
<!---->
<?php

    // check if game is wishlisted
    $select_wishlist_table_id = $connect->prepare("SELECT * FROM " . $userWishlistTable . " WHERE gc_g_wishlist_id = ? AND GamesOwner = ?");
    $select_wishlist_table_id->execute(array($add_game_to_wishlist_by_id, $Gamesowner));
    $fetch_wishlist_table_id = $select_wishlist_table_id->fetch();
    $have_change_after_fetch_by_id = $select_wishlist_table_id->rowcount();

    if($have_change_after_fetch_by_id > 0){
      $update_game_by_id_column_in_wishlist = $connect->prepare("UPDATE " . $allGameInOnePlaceTable . " SET gc_g_wishlisted = ? WHERE gc_g_id = ? LIMIT 1");
      $update_game_by_id_column_in_wishlist->execute(array("0", $add_game_to_wishlist_by_id));

      $delete_game_from_wishlist = $connect->prepare("DELETE FROM " . $userWishlistTable . " WHERE gc_g_wishlist_id = ? AND GamesOwner = ? LIMIT 1");
      $delete_game_from_wishlist->execute(array($add_game_to_wishlist_by_id, $Gamesowner));
    }
    else{

      $update_game_by_id_column_in_wishlist = $connect->prepare("UPDATE " . $allGameInOnePlaceTable . " SET gc_g_wishlisted = ? WHERE gc_g_id = ? LIMIT 1");
      $update_game_by_id_column_in_wishlist->execute(array("1", $add_game_to_wishlist_by_id));

      $DateTime_game_added_to_wishlist = Date("y-m-d h:i:s");
      $select_game_by_id = $connect->prepare("INSERT INTO " . $userWishlistTable . "(gc_g_wishlist_id, gc_g_wishlist_href, gc_g_wishlist_image_cover, gc_g_wishlist_title, gc_g_wishlist_price_price_and_discount_presentage, gc_g_wishlist_tba_free_owned, gc_g_user_rating_wishlist, gc_g_wishlist_os_win_mac_linux, gc_g_date_add_to_wishlist, gc_g_wishlist_type, gc_g_wishlist_type_parent, gc_g_wishlist_soon_indev, GamesOwner)
                                              VALUES (:gc_g_wishlist_id, :gc_g_wishlist_href, :gc_g_wishlist_image_cover, :gc_g_wishlist_title, :gc_g_wishlist_price_price_and_discount_presentage, :gc_g_wishlist_tba_free_owned, :gc_g_user_rating_wishlist, :gc_g_wishlist_os_win_mac_linux, :gc_g_date_add_to_wishlist, :gc_g_wishlist_type, :gc_g_wishlist_type_parent, :gc_g_wishlist_soon_indev, :GamesOwner) LIMIT 1");
      $select_game_by_id->execute(array(
                                  "gc_g_wishlist_id" => $fetch_game_by_id['gc_g_id'],
                                  "gc_g_wishlist_href" => $fetch_game_by_id['gc_g_href'],
                                  "gc_g_wishlist_image_cover" => $fetch_game_by_id['gc_g_image_search_cart_modifyToStore'],
                                  "gc_g_wishlist_title" => $fetch_game_by_id['gc_g_title'],
                                  "gc_g_wishlist_price_price_and_discount_presentage" => $fetch_game_by_id['gc_g_price_price_and_discount_presentage'],
                                  "gc_g_wishlist_tba_free_owned" => $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'],
                                  "gc_g_user_rating_wishlist" => $fetch_game_by_id['gc_g_user_rating'],
                                  "gc_g_wishlist_os_win_mac_linux" => $fetch_game_by_id['gc_g_os_win_mac_linux'],
                                  "gc_g_date_add_to_wishlist" => $DateTime_game_added_to_wishlist,
                                  "gc_g_wishlist_type" => $fetch_game_by_id['gc_g_type'],
                                  "gc_g_wishlist_type_parent" => $fetch_game_by_id['gc_g_type_parent'],
                                  "gc_g_wishlist_soon_indev" => $fetch_game_by_id['gc_g_soon_indev'],
                                  "GamesOwner" => $Gamesowner
                                ));
    }

    // count number of games in wishlist
    $select_wishlist_table_count_games = $connect->prepare("SELECT COUNT(*) FROM " . $userWishlistTable . " WHERE GamesOwner = ?");
    $select_wishlist_table_count_games->execute(array($Gamesowner));
    $fetch_wishlist_table_count_games = $select_wishlist_table_count_games->fetchColumn();

    echo $fetch_wishlist_table_count_games;

  }
