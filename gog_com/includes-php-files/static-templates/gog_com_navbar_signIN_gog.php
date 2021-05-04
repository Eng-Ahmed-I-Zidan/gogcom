<!-- iframe signin gogcom -->
<div class=" l-loaded l-flexible GalaxyAccountsFrameContainer ng-hide">
	<div class=" GalaxyAccountsFrameContainer__overlay"></div>
	<div class="catalog-spinner ng-hide">
	    <span class="spinner--big"></span>
	  </div>
	<div class="GalaxyAccountsFrame_parent">
    <!-- action to signup or login -->
		<?php
			$action_sign_login = isset($_GET['action_sign_login']) ? $action_sign_login = $_GET['action_sign_login'] : "";

			if($action_sign_login == "create-new-account"){
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$sign_up_date = Date("Y-m-d");
					$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
					$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
					$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

					$update_gog_users_realyingog_0 = $connect->prepare("UPDATE " . $usersAccountInfo . " SET Realy_in_gog = ?");
					$update_gog_users_realyingog_0->execute(array("0"));

					$insert_into_gog_users_new_user = $connect->prepare("INSERT INTO " . $usersAccountInfo . "(Realy_in_gog, UserName, Email, Password, Profile_image, sign_up_date) VALUES(:Realy_in_gog, :UserName, :Email, :Password, :Profile_image, :sign_up_date)");
					$insert_into_gog_users_new_user->execute(array("Realy_in_gog" =>"1", "UserName" =>$username, "Email" =>$email, "Password" =>$password, "Profile_image" => "https://images.gog-statics.com/587bf85b2c59291f6f61e47a7aebd4309f0961398f24da72a86bee14d7c7bd9c_menu_user_av_big.jpg 1x, https://images.gog-statics.com/587bf85b2c59291f6f61e47a7aebd4309f0961398f24da72a86bee14d7c7bd9c_menu_user_av_big2.jpg 2x", "sign_up_date" => $sign_up_date));

					header('Location:http://localhost/AllYourGamesInOnePlace/gog_com/gogcom.php');
					exit();
				}
			}

			if($action_sign_login == "sign---in"){
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
					$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

					$insert_into_gog_users_new_user = $connect->prepare("UPDATE " . $usersAccountInfo . " SET Realy_in_gog = ? WHERE Email = ? AND Password = ?");
					$insert_into_gog_users_new_user->execute(array("1", $email, $password));

					header('location: gogcom.php');
					exit();
				}
			}
		?>

	    <!-- sign in -->
	    <div class="Start-playing-with-gog-sign-in toggle_between-signup-login">
	      <div class="close-login-page">
	        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 172 172" style=" fill:#000000;">
	          <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#726f6f"><path d="M143.78125,129.93029l-13.8768,13.85096c-2.53246,2.55829 -6.66707,2.55829 -9.22536,0l-34.67909,-34.65324l-34.65324,34.65324c-2.55829,2.55829 -6.71875,2.55829 -9.25121,0l-13.8768,-13.85096c-2.55829,-2.55829 -2.55829,-6.69291 0,-9.2512l34.65324,-34.67909l-34.65324,-34.65324c-2.53245,-2.58413 -2.53245,-6.74459 0,-9.25121l13.8768,-13.8768c2.53246,-2.55829 6.69291,-2.55829 9.25121,0l34.65324,34.67909l34.67909,-34.67909c2.55829,-2.55829 6.71875,-2.55829 9.22536,0l13.8768,13.85096c2.55829,2.55829 2.55829,6.71875 0.02584,9.27704l-34.67908,34.65324l34.65324,34.67909c2.55829,2.55829 2.55829,6.6929 0,9.2512z"></path></g></g>
	        </svg>
	      </div>
	      <div class="form form--register js-register-form">
	        <div class="logo-gog">
	          <svg class="gog-logo"><use xlink:href="#gog-logo"><symbol id="gog-logo" viewBox="0 0 46 42">
	            <g fill-rule="evenodd"><path d="M45 38.73528c0 .62805-.26415 1.19073-.6933 1.6032-.42915.40937-1.0176.66152-1.6719.66152H3.3652c-.6543 0-1.24275-.25215-1.6719-.66152-.42915-.41247-.69167-.97515-.6933-1.6032V3.26395c.00163-.62572.26415-1.1884.6933-1.60088.42915-.41014 1.0176-.6623 1.6719-.66307h39.2696c.6543.00078 1.24275.25293 1.6719.66307.42915.41248.6933.97516.6933 1.60088v35.47133zm.0188-37.7946C44.41511.35987 43.5771 0 42.6545 0H3.3455C2.4229 0 1.5849.35988.9812.94067.37588 1.51913 0 2.32553 0 3.20921v35.58002c0 .88524.37588 1.69164.9812 2.2701C1.58489 41.63934 2.4229 42 3.3455 42H42.6545c.92262 0 1.76062-.36066 2.36431-.94067.60532-.57846.9812-1.38486.9812-2.2701V3.2092c0-.88368-.37588-1.69008-.9812-2.26854z"></path><path d="M27.97107 34.99377h2.1012l-.00416-7.23603c0-.40683.34405-.7326.77453-.7326l2.14149.01247L32.98828 35l2.04517-.00623-.00914-7.2298c0-.40682.34322-.7326.77287-.7326l2.20784.00624L38.01416 35 40 34.99377V25l-10.01282-.00623c-1.1161 0-2.01611.8456-2.01611 1.8845v8.1155zM24.03092 32.27242c0 .40716-.34644.73365-.7909.73365l-4.43475-.0046c-.44953 0-.80527-.3265-.80527-.72905v-4.53953c0-.40716.35574-.73289.79935-.73289l4.43222.0046c.45291 0 .79935.32574.79935.72675v4.54107zm1.84416-5.38105c0-1.04478-.93286-1.89137-2.07866-1.89137h-5.7186C16.92948 25 16 25.84659 16 26.89137v6.21803C16 34.15495 16.92948 35 18.07782 35h5.7186c1.1458 0 2.07866-.84505 2.07866-1.8906v-6.21803zM6 33.10303c0 1.04435.91895 1.89074 2.05538 1.89074h5.96342V33.0968l-4.5833.00623h-.5754c-.44594 0-.79626-.32967-.79626-.72948v-4.62178c0-.40683.35032-.7326.7878-.7326l5.16716-.00624v-2.01916L8.05538 25C6.91895 25 6 25.8456 6 26.8845v6.21853zM31.89262 7C30.84646 7 30 7.82362 30 8.84006v6.04933c0 1.01719.83954 2.12318 1.8857 2.12318h4.1088v-1.97024l-3.24766-.00449c-.4048 0-.7297-.31838-.7297-.70927l.0069-4.60097c0-.39611.32492-.713.7228-.713l4.57004.00692c.40786 0 .732.32382.732.71396l-.00384 8.56103c0 .39387-.32414.71375-.72816.71375l-7.32072-.00244L30 21h8.10969C39.15124 21 40 20.17937 40 19.1592V8.84005C40 7.82362 39.15124 7 38.10969 7h-6.21707zM26.03092 14.27242c0 .40716-.34644.73365-.7909.73365l-4.43475-.0046c-.44953 0-.80527-.3265-.80527-.72905V9.73289C20 9.32573 20.35574 9 20.79935 9l4.43222.0046c.45291 0 .79935.32574.79935.72675v4.54107zm1.84416-5.38105C27.87508 7.8466 26.94222 7 25.79642 7h-5.7186C18.92948 7 18 7.84659 18 8.89137v6.21803C18 16.15495 18.92948 17 20.07782 17h5.7186c1.1458 0 2.07866-.84505 2.07866-1.8906V8.89137zM7.89046 7C6.84422 7 6 7.82362 6 8.84006v6.04933c0 1.01719.84422 2.089 1.89046 2.089h4.10515v-1.97725H8.7259c-.40943 0-.73283-.31839-.73283-.70927l.00768-4.57923c0-.39611.3234-.70702.72515-.70702l4.54585-.00855c.4102 0 .73283.31689.73283.70702L13.9969 18.29c0 .39387-.32263.71375-.72515.71375L6 19.0123V21h8.10877C15.15271 21 16 20.17937 16 19.1592V8.84005C16 7.82362 15.15271 7 14.10877 7H7.89046z">
	            </path></g></symbol></use>
	          </svg>
	          <div class="form__title--text">log in</div>
	        </div>
	        <form class="form-mail-pass" method="POST" action="?action_sign_login=sign---in">
	          <input id="email_signIn" required="required" name="email" type="email" placeholder="Email" autocomplete="off"/>
	          <input id="password_signIn" required="required" name="password" type="password" autocomplete="off" placeholder="Password"/>
	          <div id="submit_button_signIn"><input class="signup" type="submit" value="LOG IN NOW"/></div>
	        </form>
	        <div class="form__separator-text">
	          <span class="form__separator-text-or">OR</span>
	        </div>
	        <a class="form__buttons-container-continue-with-facebbok" href="" target="Login">continue with facebook</a>
	      </div>
	      <div class="footer__link js-normal-link">
	          <div class="footer__link-password-reset">password reset</div>
	          <div class="footer__link-sign-up-now footer__link-another-banner">sign up now</div>
	        </div>
	    </div>

	    <!-- creat account -->
	    <div class="Start-playing-with-gog-create-new-account toggle_between-signup-login">
	      <div class="close-login-page">
	        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="13" height="13" viewBox="0 0 172 172" style=" fill:#000000;">
	          <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#726f6f"><path d="M143.78125,129.93029l-13.8768,13.85096c-2.53246,2.55829 -6.66707,2.55829 -9.22536,0l-34.67909,-34.65324l-34.65324,34.65324c-2.55829,2.55829 -6.71875,2.55829 -9.25121,0l-13.8768,-13.85096c-2.55829,-2.55829 -2.55829,-6.69291 0,-9.2512l34.65324,-34.67909l-34.65324,-34.65324c-2.53245,-2.58413 -2.53245,-6.74459 0,-9.25121l13.8768,-13.8768c2.53246,-2.55829 6.69291,-2.55829 9.25121,0l34.65324,34.67909l34.67909,-34.67909c2.55829,-2.55829 6.71875,-2.55829 9.22536,0l13.8768,13.85096c2.55829,2.55829 2.55829,6.71875 0.02584,9.27704l-34.67908,34.65324l34.65324,34.67909c2.55829,2.55829 2.55829,6.6929 0,9.2512z"></path></g></g>
	        </svg>
	      </div>
				<div class="form form--register js-register-form">
		      <div class="logo-gog">
		        <svg class="gog-logo">
							<use xlink:href="#gog-logo"><symbol id="gog-logo" viewBox="0 0 46 42">
		          <g fill-rule="evenodd"><path d="M45 38.73528c0 .62805-.26415 1.19073-.6933 1.6032-.42915.40937-1.0176.66152-1.6719.66152H3.3652c-.6543 0-1.24275-.25215-1.6719-.66152-.42915-.41247-.69167-.97515-.6933-1.6032V3.26395c.00163-.62572.26415-1.1884.6933-1.60088.42915-.41014 1.0176-.6623 1.6719-.66307h39.2696c.6543.00078 1.24275.25293 1.6719.66307.42915.41248.6933.97516.6933 1.60088v35.47133zm.0188-37.7946C44.41511.35987 43.5771 0 42.6545 0H3.3455C2.4229 0 1.5849.35988.9812.94067.37588 1.51913 0 2.32553 0 3.20921v35.58002c0 .88524.37588 1.69164.9812 2.2701C1.58489 41.63934 2.4229 42 3.3455 42H42.6545c.92262 0 1.76062-.36066 2.36431-.94067.60532-.57846.9812-1.38486.9812-2.2701V3.2092c0-.88368-.37588-1.69008-.9812-2.26854z"></path><path d="M27.97107 34.99377h2.1012l-.00416-7.23603c0-.40683.34405-.7326.77453-.7326l2.14149.01247L32.98828 35l2.04517-.00623-.00914-7.2298c0-.40682.34322-.7326.77287-.7326l2.20784.00624L38.01416 35 40 34.99377V25l-10.01282-.00623c-1.1161 0-2.01611.8456-2.01611 1.8845v8.1155zM24.03092 32.27242c0 .40716-.34644.73365-.7909.73365l-4.43475-.0046c-.44953 0-.80527-.3265-.80527-.72905v-4.53953c0-.40716.35574-.73289.79935-.73289l4.43222.0046c.45291 0 .79935.32574.79935.72675v4.54107zm1.84416-5.38105c0-1.04478-.93286-1.89137-2.07866-1.89137h-5.7186C16.92948 25 16 25.84659 16 26.89137v6.21803C16 34.15495 16.92948 35 18.07782 35h5.7186c1.1458 0 2.07866-.84505 2.07866-1.8906v-6.21803zM6 33.10303c0 1.04435.91895 1.89074 2.05538 1.89074h5.96342V33.0968l-4.5833.00623h-.5754c-.44594 0-.79626-.32967-.79626-.72948v-4.62178c0-.40683.35032-.7326.7878-.7326l5.16716-.00624v-2.01916L8.05538 25C6.91895 25 6 25.8456 6 26.8845v6.21853zM31.89262 7C30.84646 7 30 7.82362 30 8.84006v6.04933c0 1.01719.83954 2.12318 1.8857 2.12318h4.1088v-1.97024l-3.24766-.00449c-.4048 0-.7297-.31838-.7297-.70927l.0069-4.60097c0-.39611.32492-.713.7228-.713l4.57004.00692c.40786 0 .732.32382.732.71396l-.00384 8.56103c0 .39387-.32414.71375-.72816.71375l-7.32072-.00244L30 21h8.10969C39.15124 21 40 20.17937 40 19.1592V8.84005C40 7.82362 39.15124 7 38.10969 7h-6.21707zM26.03092 14.27242c0 .40716-.34644.73365-.7909.73365l-4.43475-.0046c-.44953 0-.80527-.3265-.80527-.72905V9.73289C20 9.32573 20.35574 9 20.79935 9l4.43222.0046c.45291 0 .79935.32574.79935.72675v4.54107zm1.84416-5.38105C27.87508 7.8466 26.94222 7 25.79642 7h-5.7186C18.92948 7 18 7.84659 18 8.89137v6.21803C18 16.15495 18.92948 17 20.07782 17h5.7186c1.1458 0 2.07866-.84505 2.07866-1.8906V8.89137zM7.89046 7C6.84422 7 6 7.82362 6 8.84006v6.04933c0 1.01719.84422 2.089 1.89046 2.089h4.10515v-1.97725H8.7259c-.40943 0-.73283-.31839-.73283-.70927l.00768-4.57923c0-.39611.3234-.70702.72515-.70702l4.54585-.00855c.4102 0 .73283.31689.73283.70702L13.9969 18.29c0 .39387-.32263.71375-.72515.71375L6 19.0123V21h8.10877C15.15271 21 16 20.17937 16 19.1592V8.84005C16 7.82362 15.15271 7 14.10877 7H7.89046z">
		          </path></g></symbol></use>
		        </svg>
		        <div class="form__title--text">sign-up</div>
		      </div>
		      <form class="form-mail-pass" method="POST" action="?action_sign_login=create-new-account">
		        <input id="username_create-new-account" required="required" minlength="2" name="username" type="text" placeholder="Username" autocomplete="off"/>
						<span class="required_conditions_input_create_new_account username_create-new-account_conditions"></span>

						<input id="email_create-new-account" required="required" name="email" type="text" placeholder="Email" autocomplete="off"/>
						<span class="required_conditions_input_create_new_account email_create-new-account_conditions"></span>

						<input id="password_create-new-account" required="required" minlength="2" name="password" type="password" placeholder="Password" autocomplete="off" />
						<span class="required_conditions_input_create_new_account password_create-new-account_conditions"></span>

						<label>By signing up you acknowledge you are 13 or older and accept <a href="#">GOG User Agreement & Privacy Policy.</a> </label>
						<div id="submit_button_create_new_account"><input class="signup" type="submit" value="SIGN UP NOW" /></div>
		      </form>
		      <div class="form__separator-text"><span class="form__separator-text-or">OR</span></div>
		      <a class="form__buttons-container-continue-with-facebbok" href="" target="Login">continue with facebook</a>
				</div>
	      <div class="footer__link js-normal-link"><div class="footer__link-old-account footer__link-another-banner">log in to your account</div></div>
	    </div>
    <!-- End With login screen to sign in -->
	</div>
</div>
<!-- iframe signin gogcom -->
