
<?php
  require '../connect.php';

  // [$username_val]
  //if(isset($_POST['username_val'])){ $username_val = trim($_POST['username_val']); } else { $username_val = ""; }
  $username_val = trim($_POST['username_val']) ?? "";

  // [$email_val]
  //if(isset($_POST['email_val'])){ $email_val = trim($_POST['email_val']); } else { $email_val = ""; }
  $email_val = trim($_POST['email_val']) ?? "";

  // [$password_val]
  //if(isset($_POST['password_val'])){ $password_val = trim($_POST['password_val']); } else { $password_val = ""; }
  $password_val = trim($_POST['password_val']) ?? "";

  // [$input_type]
  //if(isset($_POST['input_type'])){ $input_type = trim($_POST['input_type']); } else { $input_type = ""; }
  $input_type = trim($_POST['input_type']) ?? "";
?>
<!---->
<!---->
<!---->
  <?php if($input_type == "create-new-account"){ ?>
    <!---->
    <!---->
    <!---->
    <?php
      // check if info dosnt exist[[username]]
      $select_from_gog_users = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE UserName = ?");
      $select_from_gog_users->execute(array($username_val));
      $fetch_from_gog_users = $select_from_gog_users->fetch();
      $have_change_after_fetch_by_info = $select_from_gog_users->rowcount();
    ?>

    <?php if($have_change_after_fetch_by_info > 0){ ?>
      <span class="signup">Username already taken</span>
    <?php } else {
      // check if info dosnt exist[[email]]
      $select_from_gog_users_email = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE Email = ?");
      $select_from_gog_users_email->execute(array($email_val));
      $fetch_from_gog_users_email = $select_from_gog_users_email->fetch();
      $have_change_after_fetch_by_info_email = $select_from_gog_users_email->rowcount();
    ?>
      <?php if($have_change_after_fetch_by_info_email > 0){ ?>
        <span class="signup">Email already taken</span>
        <!---->
      <?php } elseif(strlen($username_val) != strlen(filter_var($username_val, FILTER_SANITIZE_STRING))) { ?>
        <span class="signup">Username not valid</span>
        <!---->
      <?php } elseif(strlen($email_val) != strlen(filter_var($email_val, FILTER_SANITIZE_EMAIL))) { ?>
        <span class="signup">Email not valid</span>
        <!---->
      <?php } elseif(strlen($password_val) != strlen(filter_var($password_val, FILTER_SANITIZE_STRING))) { ?>
        <span class="signup">password not valid</span>
        <!---->
      <?php } else { ?>
        <input class="signup" type="submit" value="SIGN UP NOW" />
      <?php } ?>
    <?php } ?>
    <!---->
    <!---->
    <!---->
  <?php } elseif($input_type == "sign--in"){ ?>
    <!---->
    <!---->
    <!---->
    <?php
      $email = filter_var($email_val, FILTER_SANITIZE_EMAIL);
      $password = filter_var($password_val, FILTER_SANITIZE_STRING);

      // update table [gog_users] check email
      $select_table_signIN_email = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE Email = ? LIMIT 1");
      $select_table_signIN_email->execute(array($email));
      $have_change_after_select_email = $select_table_signIN_email->rowcount();
    ?>
    <?php  if($have_change_after_select_email > 0){
        // check password
        $select_table_signIN_paaword = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE Password = ? LIMIT 1");
        $select_table_signIN_paaword->execute(array($password));
        $have_change_after_select_paaword = $select_table_signIN_paaword->rowcount();

        if($have_change_after_select_paaword > 0){
          // update table [gog_users]
          $update_table_signIN = $connect->prepare("UPDATE " . $usersAccountInfo . " SET Realy_in_gog = ? WHERE Email = ? AND Password = ?");
          $update_table_signIN->execute(array("1", $email, $password));
        ?>
        <input class="signup" type="submit" value="LOG IN NOW" />
        <?php } else { ?>
          <span class="signup">Incorrect Password</span>
        <?php }

      } else { ?>
        <span class="signup">User not found</span>
      <?php } ?>
    <!---->
    <!---->
    <!---->
  <?php } ?>
