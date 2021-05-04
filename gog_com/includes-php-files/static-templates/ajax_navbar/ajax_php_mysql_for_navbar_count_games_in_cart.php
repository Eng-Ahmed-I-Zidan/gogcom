<?php
  require '../connect.php';
  
  $select_gog_users_new_user = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE Realy_in_gog = ? LIMIT 1");
  $select_gog_users_new_user->execute(array("1"));
  $fetch_gog_users_new_user = $select_gog_users_new_user->fetch();
  $have_change_after_select_user = $select_gog_users_new_user->rowcount();

  $gc_g_cart_private_sign_out = 0;
  if($have_change_after_select_user > 0){
    $gc_g_cart_private_sign_out = 1;
    $Gamesowner = $fetch_gog_users_new_user['UserName'];
  }else{
    $gc_g_cart_private_sign_out = 0;
    $Gamesowner = "Root";
  }

  // count number of games in cart
  $select_cart_table_count_games = $connect->prepare("SELECT COUNT(*) FROM " . $userCartTable . " WHERE gc_g_cart_private_sign_out = ? AND GamesOwner = ?");
  $select_cart_table_count_games->execute(array($gc_g_cart_private_sign_out, $Gamesowner));
  $fetch_num_of_games_from_cart = $select_cart_table_count_games->fetchColumn();

 echo $fetch_num_of_games_from_cart;
