<?php
  require '../connect.php';

  // [$ng_system]
  //if(isset($_POST['ng_system'])){ $ng_system = $_POST['ng_system']; } else { $ng_system = ""; }
  $ng_system = $_POST['ng_system'] ?? "";

  // [$ng_game_id]
  //if(isset($_POST['ng_game_id'])){ $ng_game_id = $_POST['ng_game_id']; } else { $ng_game_id = ""; }
  $ng_game_id = $_POST['ng_game_id'] ?? "";

  // select [gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other => [win-mac-lin] => [min-rec]]
	if($ng_system == "win"){ $prepareElement = "SELECT gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other, gc_g_win_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ?"; }
	else if($ng_system == "mac"){ $prepareElement = "SELECT gc_g_mac_min_system_requirements_sy_pr_me_gr_dix_st_sound_other, gc_g_mac_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ?"; }
	else if($ng_system == "lin"){ $prepareElement = "SELECT gc_g_lin_min_system_requirements_sy_pr_me_gr_dix_st_sound_other, gc_g_lin_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ?"; }
	else{ $prepareElement = "SELECT gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other, gc_g_win_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other FROM " . $allGameInOnePlaceTable . " WHERE gc_g_id = ?"; }

	$select_win_mac_lin_min_rec = $connect->prepare($prepareElement);
	$select_win_mac_lin_min_rec->execute(array($ng_game_id));
	$fetch_win_mac_lin_min_rec = $select_win_mac_lin_min_rec->fetch();

  $activeOperetingSystemMin = "";
	$activeOperetingSystemRec = "";
  if($ng_system == "win"){
    if($fetch_win_mac_lin_min_rec['gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other'] != "notsupport" && $fetch_win_mac_lin_min_rec['gc_g_win_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other'] != "notsupport"){
  		$activeOperetingSystemMin = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
  		$activeOperetingSystemRec = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_win_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
    } else {
      $activeOperetingSystemMin = "notsupport";
    	$activeOperetingSystemRec = "notsupport";
    }
	}
	else if($ng_system == "mac"){
    if($fetch_win_mac_lin_min_rec['gc_g_mac_min_system_requirements_sy_pr_me_gr_dix_st_sound_other'] != "notsupport" && $fetch_win_mac_lin_min_rec['gc_g_mac_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other'] != "notsupport"){
  		$activeOperetingSystemMin = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_mac_min_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
  		$activeOperetingSystemRec = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_mac_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
    } else {
      $activeOperetingSystemMin = "notsupport";
    	$activeOperetingSystemRec = "notsupport";
    }
  }
	else if($ng_system == "lin"){
    if($fetch_win_mac_lin_min_rec['gc_g_lin_min_system_requirements_sy_pr_me_gr_dix_st_sound_other'] != "notsupport" && $fetch_win_mac_lin_min_rec['gc_g_lin_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other'] != "notsupport"){
  		$activeOperetingSystemMin = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_lin_min_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
  		$activeOperetingSystemRec = explode("{{--}}", $fetch_win_mac_lin_min_rec['gc_g_lin_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other']);
    } else {
      $activeOperetingSystemMin = "notsupport";
    	$activeOperetingSystemRec = "notsupport";
    }
  }

  if($activeOperetingSystemMin != "notsupport" && $activeOperetingSystemRec != "notsupport"){
?>

  <!-- content -->
    <div class="table-header">
      <div class="system-requirements__minimum-header">Minimum system requirements:</div>
      <div class="system-requirements__recommended-header hide-on-small-screens">Recommended system requirements:</div>
    </div>
    <?php if($activeOperetingSystemMin[0] != "disabled" && $activeOperetingSystemRec[0] != "disabled"){ ?>
      <div class="table__row ng-scop">
        <div class="table__row-label system-requirements__label ng-binding">System:</div>
        <div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[0] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[0]; } ?></div>
        <div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[0] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[0]; } ?></div>
      </div>
    <?php } ?>
    <?php if($activeOperetingSystemMin[1] != "disabled" && $activeOperetingSystemRec[1] != "disabled"){ ?>
      <div class="table__row ng-scop">
        <div class="table__row-label system-requirements__label ng-binding">Processor:</div>
        <div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[1] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[1]; } ?></div>
        <div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[1] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[1]; } ?></div>
      </div>
    <?php } ?>
    <?php if($activeOperetingSystemMin[2] != "disabled" && $activeOperetingSystemRec[2] != "disabled"){ ?>
      <div class="table__row ng-scop">
        <div class="table__row-label system-requirements__label ng-binding">Memory:</div>
        <div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[2] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[2]; } ?></div>
        <div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[2] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[2]; } ?></div>
      </div>
    <?php } ?>
    <?php if($activeOperetingSystemMin[3] != "disabled" && $activeOperetingSystemRec[3] != "disabled"){ ?>
      <div class="table__row ng-scop">
        <div class="table__row-label system-requirements__label ng-binding">Graphics:</div>
        <div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[3] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[3]; } ?></div>
        <div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[3] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[3]; } ?></div>
      </div>
    <?php } ?>
    <?php if($activeOperetingSystemMin[4] != "disabled" && $activeOperetingSystemRec[4] != "disabled"){ ?>
      <div class="table__row ng-scop">
        <div class="table__row-label system-requirements__label ng-binding">DirectX:</div>
        <div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[4] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[4]; } ?></div>
        <div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[4] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[4]; } ?></div>
      </div>
    <?php } ?>
    <?php if($activeOperetingSystemMin[5] != "disabled" && $activeOperetingSystemRec[5] != "disabled"){ ?>
      <div class="table__row ng-scop">
        <div class="table__row-label system-requirements__label ng-binding">Storage:</div>
        <div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[5] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[5]; } ?></div>
        <div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[5] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[5]; } ?></div>
      </div>
    <?php } ?>
    <?php if($activeOperetingSystemMin[6] != "disabled" && $activeOperetingSystemRec[6] != "disabled"){ ?>
      <div class="table__row ng-scop">
        <div class="table__row-label system-requirements__label ng-binding">Sound:</div>
        <div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[6] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[6]; } ?></div>
        <div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[6] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[6]; } ?></div>
      </div>
    <?php } ?>
    <?php if($activeOperetingSystemMin[7] != "disabled" && $activeOperetingSystemRec[7] != "disabled"){ ?>
      <div class="table__row ng-scop">
        <div class="table__row-label system-requirements__label ng-binding">Other:</div>
        <div class="table__row-content system-requirements__minimum ng-binding"><?php if($activeOperetingSystemMin[7] == "empty"){ echo ''; }else{ echo $activeOperetingSystemMin[7]; } ?></div>
        <div class="table__row-content system-requirements__recommended ng-binding"><?php if($activeOperetingSystemRec[7] == "empty"){ echo ''; }else{ echo $activeOperetingSystemRec[7]; } ?></div>
      </div>
    <?php } ?>
  <?php } ?>
