<?php
  require '../connect.php';

  // [$TableName]
  //if(isset($_POST['esn7a841'])){ $esn7a841 = $_POST['esn7a841']; } else { $esn7a841 = ""; }
  $esn7a841 = $_POST['esn7a841'] ?? "";

  // select comments
  $select_comments = $connect->prepare("SELECT * FROM " . $esn7a841);
  $select_comments->execute(array());
  $fetch_comments = $select_comments->fetchAll();
  $find_comments = $select_comments->rowcount();
  if($find_comments > 0){
    $sumOfVerifiedOwner = 0;
    $commentIndexVerifiedOwner = 0;
    foreach($fetch_comments as $fetch_comment){
      // select users info from comments
      $select_comments_user_information = $connect->prepare("SELECT * FROM ". $usersAccountInfo ." WHERE UserName = ? LIMIT 1");
      $select_comments_user_information->execute(array($fetch_comment['comment_username']));
      $fetch_comments_user_information = $select_comments_user_information->fetch();

      if($fetch_comments_user_information['Realy_in_gog'] == "1"){
        $sumOfVerifiedOwner += (int)$fetch_comment['game_rating'];
        $commentIndexVerifiedOwner += 1;
      }
    }
   echo number_format(($sumOfVerifiedOwner / $commentIndexVerifiedOwner), 1, ".", "");
 } else {
   echo '0.0';
 }
