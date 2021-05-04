<?php
  require '../connect.php';

  // nuber of comments
	$limitCommentsInOnePage = 0;

	// arrayCollectGamesIDForUpdate
	$arrayCollectCommentsIDForUpdate = array();

  // [$TableName]
  //if(isset($_POST['esn7a841'])){ $esn7a841 = $_POST['esn7a841']; } else { $esn7a841 = ""; }
  $esn7a841 = $_POST['esn7a841'] ?? "";

  // [$ShowCommentNumberInPage]
  //if(isset($_POST['ShowCommentNumberInPage'])){ $ShowCommentNumberInPage = (int)$_POST['ShowCommentNumberInPage']; } else { $ShowCommentNumberInPage = 5; }
  $ShowCommentNumberInPage = (int)$_POST['ShowCommentNumberInPage'] ?? 5;

  // [$ShowCommentPhyInPage]
  //if(isset($_POST['ShowCommentPhyInPage'])){ $ShowCommentPhyInPage = $_POST['ShowCommentPhyInPage']; } else { $ShowCommentPhyInPage = ""; }
  $ShowCommentPhyInPage = $_POST['ShowCommentPhyInPage'] ?? "";

  // [$loadingDone]
  //if(isset($_POST['loadingDone'])){ $loadingDone = $_POST['loadingDone']; } else { $loadingDone = ""; }
  $loadingDone = $_POST['loadingDone'] ?? "";

  // [$CustomLastAdded]
  //if(isset($_POST['CustomLastAdded'])){ $CustomLastAdded = $_POST['CustomLastAdded']; } else { $CustomLastAdded = ""; }
  $CustomLastAdded = $_POST['CustomLastAdded'] ?? "";

  // [$CustomFeatrues]
  //if(isset($_POST['CustomFeatrues'])){ $CustomFeatrues = $_POST['CustomFeatrues']; } else { $CustomFeatrues = ""; }
  $CustomFeatrues = $_POST['CustomFeatrues'] ?? "";

  // [$CustomLanguage]
  //if(isset($_POST['CustomLanguage'])){ $CustomLanguage = $_POST['CustomLanguage']; } else { $CustomLanguage = ""; }
  $CustomLanguage = $_POST['CustomLanguage'] ?? "";

  // FOR reating
  $sumOfCommentsRating = 0;
  $commentIndex = 0;

  // [mosthelpful, most-recent, ...]
  $PrepareForMostEtc = "";
  if($ShowCommentPhyInPage == "Most-helpful"){ $PrepareForMostEtc = "SELECT * FROM " . $esn7a841 . " ORDER BY helpful_comment_for_all DESC"; }
  else if($ShowCommentPhyInPage == "Most-positive"){ $PrepareForMostEtc = "SELECT * FROM " . $esn7a841 . " ORDER BY game_rating DESC"; }
  else if($ShowCommentPhyInPage == "Most-critical"){ $PrepareForMostEtc = "SELECT * FROM " . $esn7a841 . " ORDER BY LENGTH(comment_text) ASC"; }
  else if($ShowCommentPhyInPage == "Most-recent"){ $PrepareForMostEtc = "SELECT * FROM " . $esn7a841 . " ORDER BY comment_date DESC"; }
  else { $PrepareForMostEtc = "SELECT * FROM " . $esn7a841 . " ORDER BY comment_date ASC"; }

  // select comments
  $select_comments = $connect->prepare($PrepareForMostEtc);
  $select_comments->execute(array());
  $fetch_comments = $select_comments->fetchAll();

?>
<!---->
<div class="catalog-spinner <?php if($loadingDone == "Done"){ echo 'ng-hide'; } ?>">
  <span class="spinner--big"></span>
</div>
<!---->

<div id="for_catalog__paginator_wrapper">
  <?php
  $validCommentLanguage = array('English', 'Deutsch', 'French', 'Russian', 'Polish', 'ChineseSimplified');
  foreach($fetch_comments as $fetch_comment){
    // filter comments
    // for system checkbox [CustomLanguage]
    $comment_language = $fetch_comment['comment_language'];
    $CustomLanguageExplode = explode(",", $CustomLanguage);
    $resultOfExistLanguageInGame = "false";
    if($CustomLanguage == ""){}
    else{
      for($fromDatabase1 = 0; $fromDatabase1 < count($CustomLanguageExplode); $fromDatabase1++){

        if($CustomLanguageExplode[$fromDatabase1] == "others"){
          for($other = 0; $other < count($validCommentLanguage); $other++){
            if($validCommentLanguage[$other] == $comment_language){
              $resultOfExistLanguageInGame = "false";
              break;
            } else {
              $resultOfExistLanguageInGame = "true";
            }
          }
          if($resultOfExistLanguageInGame == "true"){ break; }
        } else {
          if($CustomLanguageExplode[$fromDatabase1] == $comment_language){
            $resultOfExistLanguageInGame = "true";
            break;
          } else {
            $resultOfExistLanguageInGame = "false";
          }
        }

      }
      if($resultOfExistLanguageInGame == "false"){ continue; }
    }

    // select users info from comments
    $select_comments_user_information = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE UserName = ? LIMIT 1");
    $select_comments_user_information->execute(array($fetch_comment['comment_username']));
    $fetch_comments_user_information = $select_comments_user_information->fetch();

    // written by
    $writtenbyU = "false";
    if($CustomFeatrues == "VerifiedOwners" || $CustomFeatrues == "others"){

      if($CustomFeatrues == "VerifiedOwners"){
        if($fetch_comments_user_information['Realy_in_gog'] == "1"){ $writtenbyU = "true"; }
        else{ $writtenbyU = "false"; continue; }
      } else {
        if($fetch_comments_user_information['Realy_in_gog'] == 1){ $writtenbyU = "false"; continue; }
        else{ $writtenbyU = "true"; }
      }
    } else {  }

    // last added
    $CustomLastAddedExplode = explode(",", $CustomLastAdded);
    $commentDate = strtotime($fetch_comment['comment_date']);
    $timeNow = Time();
    $continueToNext = "";
    for($la = 0; $la < count($CustomLastAddedExplode); $la++){
      if($CustomLastAddedExplode[$la] == "30"){
        $timeNow -= (30 * 24 * 60 * 60);
        if($commentDate > $timeNow){
          $continueToNext = "true";
           /* [valid] */
        } else { $continueToNext = "false"; continue; }
      } else if($CustomLastAddedExplode[$la] == "90"){
        $timeNow -= (90 * 24 * 60 * 60);
        if($commentDate > $timeNow){
          $continueToNext = "true";
           /* [valid] */
        } else { $continueToNext = "false"; continue; }
      } else if($CustomLastAddedExplode[$la] == "6m"){
        $timeNow -= (6 * 30 * 24 * 60 * 60);
        if($commentDate > $timeNow){
          $continueToNext = "true";
           /* [valid] */
        } else { $continueToNext = "false"; continue; }
      } else if($CustomLastAddedExplode[$la] == "Whenever" || $CustomLastAddedExplode[$la] == "AfterRelease"){
        /* [ all is valid ] */
      } else if($CustomLastAddedExplode[$la] == "DuringDevelopment"){
        continue;
      } else {  }
    }
    if($continueToNext == "false"){ continue; }

    $sumOfCommentsRating += (int)$fetch_comment['game_rating'];
    $commentIndex += 1;

    $limitCommentsInOnePage += 1;
    // to collect comments id for [catalog__paginator]
    array_push($arrayCollectCommentsIDForUpdate, $fetch_comment['commentId']);
    if($limitCommentsInOnePage <= $ShowCommentNumberInPage){
  ?>
  <?php if($limitCommentsInOnePage == 1 && $ShowCommentPhyInPage == "Most-helpful"){ ?>
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
    <div class="review__item" <?php if($limitCommentsInOnePage == 1 && $ShowCommentPhyInPage == "Most-helpful"){ ?> style="background: hsla(0,0%,100%,.2);" <?php } ?> commentid="<?php echo strval($fetch_comment['commentId']); ?>">
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
  <div class="noResultsFound">There’s no reviews matching your criteria.</div>
<?php } ?>
<!-- catalog__paginator-wrapper -->
<div class="catalog__paginator-wrapper">
  <div class="catalog__paginator">
    <div class="paginator-container">
      <?php if(($limitCommentsInOnePage / $ShowCommentNumberInPage) < 1){
      } else { ?>
        <div class="arrow-wrapper arrow-wrapper--left arrow-wrapper--hidden">
          <svg class="arrow-left">
            <use xlink:href="#paginator-chevron"><symbol viewBox="0 0 15 24" id="paginator-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use>
          </svg>
        </div>
        <?php for($PagesNumber = 1; $PagesNumber <= ceil($limitCommentsInOnePage / $ShowCommentNumberInPage); $PagesNumber++){ ?>
          <div noloading="<?php if($PagesNumber == 1){ echo 'Done'; } ?>" ng-item-index="<?php echo $PagesNumber; ?>" class="page-indicator page-indicator--inner
                <?php
                  if($PagesNumber == 1){ echo ' page-indicator--active page-indicator--first '; } else { echo ' page-index-wrapper--next '; }
                  if($PagesNumber == ceil($limitCommentsInOnePage / $ShowCommentNumberInPage)){ echo ' page-indicator--last '; }
                  if(ceil($limitCommentsInOnePage / $ShowCommentNumberInPage) > 6){
                    if($PagesNumber >= 5 && $PagesNumber != ceil($limitCommentsInOnePage / $ShowCommentNumberInPage)){ echo ' ng-hide '; }
                    if($PagesNumber == 4){ echo ' Dots_bettween_f-l '; }
                  }
                  ?>
                ">
            <div class="page-ellipsis page-ellipsis-desktop <?php if(ceil($limitCommentsInOnePage / $ShowCommentNumberInPage) > 6){ if($PagesNumber == 4){}else{ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">...</div>
            <div class="page-index-wrapper page-indicator--inactive <?php if(ceil($limitCommentsInOnePage / $ShowCommentNumberInPage) > 6){ if($PagesNumber == 4){ echo 'ng-hide'; }else{} } ?>"><?php echo $PagesNumber; ?></div>
            <div class="page-ellipsis page-ellipsis-mobile ng-hide">...</div>
          </div>
        <?php } ?>
        <div class="arrow-wrapper arrow-wrapper--right  <?php if(($limitCommentsInOnePage / $ShowCommentNumberInPage) == 1){ echo 'arrow-wrapper--hidden'; } ?>">
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
<div class="returnResalutForratingText ng-hide" option="<?php if($limitCommentsInOnePage == 0){ if($CustomFeatrues == "VerifiedOwners" && $CustomLastAdded == "" && $CustomLanguage == ""){ echo '4'; } else{ echo '1'; } } else { if($CustomFeatrues == "" && $CustomLastAdded == "" && $CustomLanguage == ""){ echo '0'; } else { echo '2'; } } ?>"><?php if($commentIndex > 0){ echo number_format(($sumOfCommentsRating / $commentIndex), 1, ".", ""); } else { echo '5'; } ?></div>
