<?php
	//$action_sign_login = isset($_GET['action_sign_login']) ? $action_sign_login = $_GET['action_sign_login'] : "";
	$action_sign_login = $_GET['action_sign_login'] ?? "";
?>
<div class="menu-overlay"></div>
<div class="--gog__com__navbar">
	<div class="menu__container">
		<!---->
		<div class="padding_lite_right_left_solve_problem_cart padding_lite_left_solve_problem_cart"></div>
		<!---->
		<a class="navbar-brand" href="gogcom.php" target="_self">
			<svg viewBox="0 0 32 32" class="menu__logo-icon">
				<use xlink:href="#icon-logo-gog"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 34 31" id="icon-logo-gog"><path class="cls-1" d="M31,31H3a3,3,0,0,1-3-3V3A3,3,0,0,1,3,0H31a3,3,0,0,1,3,3V28A3,3,0,0,1,31,31ZM4,24.5A1.5,1.5,0,0,0,5.5,26H11V24H6.5a.5.5,0,0,1-.5-.5v-3a.5.5,0,0,1,.5-.5H11V18H5.5A1.5,1.5,0,0,0,4,19.5Zm8-18A1.5,1.5,0,0,0,10.5,5h-5A1.5,1.5,0,0,0,4,6.5v5A1.5,1.5,0,0,0,5.5,13H9V11H6.5a.5.5,0,0,1-.5-.5v-3A.5.5,0,0,1,6.5,7h3a.5.5,0,0,1,.5.5v6a.5.5,0,0,1-.5.5H4v2h6.5A1.5,1.5,0,0,0,12,14.5Zm0,13v5A1.5,1.5,0,0,0,13.5,26h5A1.5,1.5,0,0,0,20,24.5v-5A1.5,1.5,0,0,0,18.5,18h-5A1.5,1.5,0,0,0,12,19.5Zm9-13A1.5,1.5,0,0,0,19.5,5h-5A1.5,1.5,0,0,0,13,6.5v5A1.5,1.5,0,0,0,14.5,13h5A1.5,1.5,0,0,0,21,11.5Zm9,0A1.5,1.5,0,0,0,28.5,5h-5A1.5,1.5,0,0,0,22,6.5v5A1.5,1.5,0,0,0,23.5,13H27V11H24.5a.5.5,0,0,1-.5-.5v-3a.5.5,0,0,1,.5-.5h3a.5.5,0,0,1,.5.5v6a.5.5,0,0,1-.5.5H22v2h6.5A1.5,1.5,0,0,0,30,14.5ZM30,18H22.5A1.5,1.5,0,0,0,21,19.5V26h2V20.5a.5.5,0,0,1,.5-.5h1v6h2V20H28v6h2ZM18.5,11h-3a.5.5,0,0,1-.5-.5v-3a.5.5,0,0,1,.5-.5h3a.5.5,0,0,1,.5.5v3A.5.5,0,0,1,18.5,11Zm-4,9h3a.5.5,0,0,1,.5.5v3a.5.5,0,0,1-.5.5h-3a.5.5,0,0,1-.5-.5v-3A.5.5,0,0,1,14.5,20Z"></path></symbol></use>
			</svg>
		</a>
		<div class="menu-main hide-in-lite-mode">
			<div class="menu-item has-submenu menu-item--animated js-menu-store">
				<a class="menu-link menu-uppercase js-menu-link" href="store.php">
					Store
					<svg viewBox="0 0 32 32" class="menu-link__dropdown-icon"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg>
				</a>
				<div class="ng-hide menu-submenu menu-store__submenu js-menu-sloped-submenu menu-store__submenu--category-expanded">
					<div id="menu-section-layer" class="ng-hide menu-section-layer" ng---category_background_game=""></div>
					<div ng_type="game" ng_href="" ng_caregory_name="THE outer WORLDs" ng_caregory_title_inside="" ng_caregory_btn_inside="" ng_caregory_background_store_class="menu-section-layer--outer_worlds_list" class="menu-submenu-item menu-submenu-item--custom_large">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="theouterworld.php">
							the outer worlds
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="game" ng_href="" ng_caregory_name="Baldur's Gate 3" ng_caregory_title_inside="" ng_caregory_btn_inside="" ng_caregory_background_store_class="menu-section-layer--Baldur_Gate_list" class="menu-submenu-item menu-submenu-item--custom_large">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="BaldursGate3.php">
							Baldur's Gate 3
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="game" ng_href="" ng_caregory_name="Cyberpunk 2077" ng_caregory_title_inside="" ng_caregory_btn_inside="" ng_caregory_background_store_class="menu-section-layer--Cyberpunk_list" class="menu-submenu-item menu-submenu-item--custom_large">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="cyberpunk2077.php">
							Cyberbank 2077
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div class="menu-submenu-separator"></div>
					<div ng_type="all-games-nr-bs-os" ng_caregory_name="newReleases" ng_caregory_title_inside="Latest new releases" ng_href="store.php?category=Allgames---sort=NewRelease" ng_caregory_btn_inside="Browse all new releases" ng_caregory_background_store_class="menu-section-layer--new_release_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=Allgames&sort=NewRelease">
							New Reseales
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="all-games-nr-bs-os" ng_caregory_name="bestsellers" ng_caregory_btn_inside="Browse all bestsellers" ng_href="store.php" ng_caregory_title_inside="Most popular right now" ng_caregory_background_store_class="menu-section-layer--bestselling_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php">
							Bestseller
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="all-games-nr-bs-os" ng_caregory_name="onsale" ng_caregory_title_inside="Featured games on sale" ng_href="store.php?category=Allgames---sort=onSale" ng_caregory_btn_inside="Browse all games on sale now" ng_caregory_background_store_class="menu-section-layer--onsale_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=Allgames&sort=onSale">
							On Sale Now
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div class="menu-submenu-separator"></div>
					<div ng_type="caregory" ng_caregory_name="action" ng_caregory_title_inside="Discover action games" ng_href="store.php?category=action" ng_caregory_btn_inside="Browse all action games" ng_caregory_background_store_class="menu-section-layer--action_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=action">
							Action
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="caregory" ng_caregory_name="adventure" ng_caregory_title_inside="Discover adventure games" ng_href="store.php?category=adventure" ng_caregory_btn_inside="Browse all adventure games" ng_caregory_background_store_class="menu-section-layer--adventure_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=adventure">
							Adventure
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="caregory" ng_caregory_name="indie" ng_caregory_title_inside="Discover indie games" ng_href="store.php?category=indie" ng_caregory_btn_inside="Browse all indie games" ng_caregory_background_store_class="menu-section-layer--indie_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=indie">
							Indei
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="caregory" ng_caregory_name="role-playing" ng_caregory_title_inside="Discover RPG games" ng_href="store.php?category=role-playing" ng_caregory_btn_inside="Browse all RPG games" ng_caregory_background_store_class="menu-section-layer--RPG_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=role-playing">
							RPG
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="caregory" ng_caregory_name="shooter" ng_caregory_title_inside="Discover shooters" ng_href="store.php?category=shooter" ng_caregory_btn_inside="Browse all shooters" ng_caregory_background_store_class="menu-section-layer--shooters_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=shooter">
							Shooters
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="caregory" ng_caregory_name="simulation" ng_caregory_title_inside="Discover simulation games" ng_href="store.php?category=simulation" ng_caregory_btn_inside="Browse all simulation games" ng_caregory_background_store_class="menu-section-layer--simulation_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=simulation">
							Sumulation
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="caregory" ng_caregory_name="racing and sports" ng_caregory_title_inside="Discover sports and racing games" ng_href="store.php?category=racing--AND--sports" ng_caregory_btn_inside="Browse all sports and racing games" ng_caregory_background_store_class="menu-section-layer--sports_racing_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=racing--AND--sports">
							Sports &amp; Racing
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="caregory" ng_caregory_name="strategy" ng_caregory_title_inside="Discover strategy games" ng_href="store.php?category=strategy" ng_caregory_btn_inside="Browse all strategy games" ng_caregory_background_store_class="menu-section-layer--strategy_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=strategy">
							Stratgy
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div ng_type="caregory" ng_caregory_name="movie" ng_caregory_title_inside="Discover movies for gamers" ng_href="store.php?category=movie" ng_caregory_btn_inside="Browse all movies for gamers" ng_caregory_background_store_class="menu-section-layer--movies_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php?category=movie">
							Movies For Gamers
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
					<div class="menu-submenu-separator"></div>
					<div ng_type="all-games" ng_caregory_name="all-games" ng_caregory_title_inside="Browse all games" ng_caregory_btn_inside="" ng_href="store.php" ng_caregory_background_store_class="menu-section-layer--all_games_list" class="menu-submenu-item menu-submenu-item--custom_small_grid">
						<a class="menu-submenu-link menu-custom-category-link menu-custom-category-link js-menu-category-link" href="store.php">
							Browse All Game
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
						</a>
					</div>
				</div>
			</div>
			<div class="menu-item menu-item-except-store has-submenu menu-item--animated hide-in-lite-mode js-menu-about">
				<a class="menu-link menu-uppercase js-menu-link" href="">
					About
					<svg viewBox="0 0 32 32" class="menu-link__dropdown-icon"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg>
				</a>
				<div class="menu-submenu js-menu ng-hide">
					<div class="menu-submenu-item menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">GOG.com</a>
					</div>
					<div class="menu-submenu-item menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">GOG Galaxy</a>
					</div>
					<div class="menu-submenu-separator"></div>
					<div class="menu-submenu-item menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Join the team</a>
					</div>
				</div>
			</div>
			<div class="menu-item menu-item-except-store has-submenu menu-item--animated hide-in-normal-mode js-menu-more">
				<a class="menu-link menu-uppercase js-menu-link" href="">
					more
					<svg viewBox="0 0 32 32" class="menu-link__dropdown-icon"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg>
				</a>
				<div class="menu-submenu js-menu ng-hide">
					<div class="menu-submenu-item menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">GOG.com</a>
					</div>
					<div class="menu-submenu-item menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">GOG Galaxy</a>
					</div>
					<div class="menu-submenu-item menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Join the team</a>
					</div>
					<div class="menu-submenu-separator"></div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Game Tichnical Isusses</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Order And Payments</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Acount And Website</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">GOG galaxy</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Download</a>
					</div>
					<div class="menu-submenu-separator"></div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Formus</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Community Wishlist</a>
					</div>
					<div class="menu-submenu-separator"></div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Facebook</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Twitter</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Twitch</a>
					</div>
				</div>
			</div>
			<div class="menu-item menu-item-except-store has-submenu menu-item--animated hide-in-lite-mode js-menu-community">
				<a class="menu-link menu-uppercase js-menu-link" href="">
					Community
					<svg viewBox="0 0 32 32" class="menu-link__dropdown-icon"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg>
				</a>
				<div class="menu-submenu js-menu ng-hide">
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">All Formus</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">General Disccution Formus</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Formus Replies</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Community Wishlist</a>
					</div>
					<div class="menu-submenu-separator"></div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Facebook</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Twitter</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Twitch</a>
					</div>
				</div>
			</div>
			<div class="menu-item menu-item-except-store has-submenu menu-item--animated hide-in-lite-mode js-menu-support">
				<a class="menu-link menu-uppercase js-menu-link" href="">
					Support
					<svg viewBox="0 0 32 32" class="menu-link__dropdown-icon"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg>
				</a>
				<div class="menu-submenu js-menu ng-hide">
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Game Tichnical Isusses</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Order And Payments</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Acount And Website</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">GOG galaxy</a>
					</div>
					<div class="menu-submenu-item  menu-submenu-item--hover">
						<a class="menu-submenu-link" href="">Download</a>
					</div>
				</div>
			</div>

			<!---->
			<?php
				$select_gog_users_new_user = $connect->prepare("SELECT * FROM " . $usersAccountInfo . " WHERE Realy_in_gog = ? LIMIT 1");
				$select_gog_users_new_user->execute(array("1"));
				$fetch_gog_users_new_user = $select_gog_users_new_user->fetch();
				$have_change_after_select_user = $select_gog_users_new_user->rowcount();

				$Gamesowner = "";
				if($have_change_after_select_user > 0){ $Gamesowner = $fetch_gog_users_new_user['UserName']; }
				else{ $Gamesowner = "Root"; }

				if($have_change_after_select_user > 0){
					// select from cart gc_g_cart_private_sign_out = 1
					$SELECT_game_by_id_1 = $connect->prepare("SELECT * FROM " . $userCartTable . " WHERE gc_g_cart_private_sign_out = ? AND GamesOwner = ?");
					$SELECT_game_by_id_1->execute(array("1", $Gamesowner));
					$FETCH_games_by_id_1 = $SELECT_game_by_id_1->fetchAll();
					$arr_1 = array('');
					foreach($FETCH_games_by_id_1 as $FETCH_game_by_id_1){ array_push($arr_1, $FETCH_game_by_id_1['gc_g_cart_id']); }

					// select from cart gc_g_cart_private_sign_out = 0
					$SELECT_game_by_id_0 = $connect->prepare("SELECT * FROM " . $userCartTable . " WHERE gc_g_cart_private_sign_out = ? OR GamesOwner = ?");
					$SELECT_game_by_id_0->execute(array("0", "Root"));
					$FETCH_games_by_id_0 = $SELECT_game_by_id_0->fetchAll();
					$arr_0 = array('');
					foreach($FETCH_games_by_id_0 as $FETCH_game_by_id_0){ array_push($arr_0, $FETCH_game_by_id_0['gc_g_cart_id']); }

					// compare {id} to [update] or [delete]
					$true__false = "false";
					for($small = 0; $small < count($arr_0); $small++){
						for($big = 0; $big < count($arr_1); $big++){
							if($arr_0[$small] == $arr_1[$big]){ $true__false = 'true'; break; }
							else{ $true__false = 'false'; }
						}
						if($true__false == "false"){
							$update_game_by_id_1_owner = $connect->prepare("UPDATE " . $userCartTable . " SET GamesOwner = ? WHERE gc_g_cart_id = ?");
							$update_game_by_id_1_owner->execute(array($Gamesowner, $arr_0[$small]));

							$update_game_by_id_1_out = $connect->prepare("UPDATE " . $userCartTable . " SET gc_g_cart_private_sign_out = ? WHERE gc_g_cart_id = ?");
							$update_game_by_id_1_out->execute(array("1", $arr_0[$small]));
						} else {
							$delete_game_by_id = $connect->prepare("DELETE FROM " . $userCartTable . " WHERE gc_g_cart_private_sign_out = ? AND gc_g_cart_id = ?");
							$delete_game_by_id->execute(array("0", $arr_0[$small]));
						}
					}
				}

				// select games from cart
				$select_game_from_cart = $connect->prepare("SELECT * FROM " . $userCartTable . " ORDER BY gc_g_date_add_to_cart DESC");
				$select_game_from_cart->execute(array());
				$fetch_games_from_cart = $select_game_from_cart->fetchAll();
				// to any changes rowcount > 0
				$have_change_after_fetch_from_cart = $select_game_from_cart->rowcount();
				// fetch
				// total price of games
				$total_price_of_game_in_cart = 0;
				$calcNumberOfGamesOwner = 0;
				foreach($fetch_games_from_cart as $fetch_game_from_cart){
					if($fetch_game_from_cart['gc_g_cart_private_sign_out'] == 1 && $fetch_game_from_cart['GamesOwner'] == $Gamesowner){
						$calcNumberOfGamesOwner += 1;
						$update_game_by_id_column_in_cart = $connect->prepare("UPDATE " . $allGameInOnePlaceTable . " SET gc_g_incart = ? WHERE gc_g_id = ?");
						$update_game_by_id_column_in_cart->execute(array("1", $fetch_game_from_cart['gc_g_cart_id']));

						$gc_g_price_price = explode(" & ", $fetch_game_from_cart['gc_g_cart_price_price_and_discount_presentage'])[0];
						$gc_g_discount_presentage = explode(" & ", $fetch_game_from_cart['gc_g_cart_price_price_and_discount_presentage'])[1];
						$gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

						$total_price_of_game_in_cart += $gc_g_format_price_discount;
					}
				}

				// // select games from wishlist
				$select_wishlist_table_count_games = $connect->prepare("SELECT * FROM " . $userWishlistTable . " ORDER BY gc_g_date_add_to_wishlist DESC");
				$select_wishlist_table_count_games->execute(array());
				$fetch_wishlist_table_count_games = $select_wishlist_table_count_games->fetchAll();
				$calcNumberOfGamesWishlist = 0;
				foreach($fetch_wishlist_table_count_games as $fetch_wishlist_table_count_game){
					if($fetch_wishlist_table_count_game['GamesOwner'] == $Gamesowner){
						$calcNumberOfGamesWishlist += 1;
						$update_game_by_id_column_in_Wishlist = $connect->prepare("UPDATE " . $allGameInOnePlaceTable . " SET gc_g_wishlisted = ? WHERE gc_g_id = ?");
						$update_game_by_id_column_in_Wishlist->execute(array("1", $fetch_wishlist_table_count_game['gc_g_wishlist_id']));
					}
				}
			?>
			<!---->
			<!---->
			<?php if($have_change_after_select_user > 0){ ?>
				<!---->
				<div class="menu-item menu-item-except-store has-submenu menu-item--animated js-menu-profile">
					<a class="menu-link menu-uppercase js-menu-link" href="">
						<img class="profile_image_user" srcset="<?php echo $fetch_gog_users_new_user['Profile_image']; ?>" alt=""/>
						<span class="menu-account__user-name_outside"><?php echo $fetch_gog_users_new_user['UserName']; ?></span>
						<svg viewBox="0 0 32 32" class="menu-link__dropdown-icon"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg>
					</a>
					<div class="menu-submenu js-menu ng-hide">
						<div class="menu-header menu-account__user">
							<div class="menu-account__user-in">
								<img srcset="<?php echo $fetch_gog_users_new_user['Profile_image']; ?>"/>
								<span class="menu-header__label">Your account</span>
								<span class="menu-account__user-name"><?php echo $fetch_gog_users_new_user['UserName']; ?></span>
							</div>
						</div>
						<!-- -->
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">Activity feed</a>
						</div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">Your profile</a>
						</div>
						<div class="menu-submenu-separator"></div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">
								Games
								<span id="usergamesItemsCount" class="usergamesItemsCount">0</span>
							</a>
						</div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">Movies</a>
						</div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">
								Wishlist
								<span id="userWishlistedItemsCount" class="userWishlistedItemsCount"><?php echo $calcNumberOfGamesWishlist; ?></span>
							</a>
						</div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">Redeem a code</a>
						</div>
						<div class="menu-submenu-separator"></div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">Friends</a>
						</div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">Chat</a>
						</div>
						<div class="menu-submenu-separator"></div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">Your Wallet</a>
						</div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">Privacy &amp; Setting</a>
						</div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<a class="menu-submenu-link" href="">
								Language &amp; Currency
								<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
								<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
							</a>
							<div class="menu-submenu-item--banner menu-language-and-currency ng-hide">
								<div class="menu-language menu-language-currency">
									<p class="menu-language-and-currency__header">Language:</p>
									<ul class="menu-language-and-currency__list">
										<li class="menu-language-and-currency__list-item is-active">
											<svg viewBox="0 0 32 32" class="menu-language-and-currency__tick"><use xlink:href="#icon-tick"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 32 32" id="icon-tick"><path d="M35.515 2.868l-5.269-2.868-15.251 23.076-10.651-9.674-4.344 3.945 16.030 14.653z"></path></symbol></use></svg>
											English
										</li>
										<li class="menu-language-and-currency__list-item">
											<svg viewBox="0 0 32 32" class="menu-language-and-currency__tick"><use xlink:href="#icon-tick"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 32 32" id="icon-tick"><path d="M35.515 2.868l-5.269-2.868-15.251 23.076-10.651-9.674-4.344 3.945 16.030 14.653z"></path></symbol></use></svg>
											Deutsch
										</li>
										<li class="menu-language-and-currency__list-item">
											<svg viewBox="0 0 32 32" class="menu-language-and-currency__tick"><use xlink:href="#icon-tick"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 32 32" id="icon-tick"><path d="M35.515 2.868l-5.269-2.868-15.251 23.076-10.651-9.674-4.344 3.945 16.030 14.653z"></path></symbol></use></svg>
											Français
										</li>
										<li class="menu-language-and-currency__list-item">
											<svg viewBox="0 0 32 32" class="menu-language-and-currency__tick"><use xlink:href="#icon-tick"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 32 32" id="icon-tick"><path d="M35.515 2.868l-5.269-2.868-15.251 23.076-10.651-9.674-4.344 3.945 16.030 14.653z"></path></symbol></use></svg>
											Polski
										</li>
										<li class="menu-language-and-currency__list-item">
											<svg viewBox="0 0 32 32" class="menu-language-and-currency__tick"><use xlink:href="#icon-tick"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 32 32" id="icon-tick"><path d="M35.515 2.868l-5.269-2.868-15.251 23.076-10.651-9.674-4.344 3.945 16.030 14.653z"></path></symbol></use></svg>
											Pусский
										</li>
										<li class="menu-language-and-currency__list-item">
											<svg viewBox="0 0 32 32" class="menu-language-and-currency__tick"><use xlink:href="#icon-tick"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 32 32" id="icon-tick"><path d="M35.515 2.868l-5.269-2.868-15.251 23.076-10.651-9.674-4.344 3.945 16.030 14.653z"></path></symbol></use></svg>
											中文(简体)
										</li>
									</ul>
								</div>
								<div class="menu-currency menu-language-currency">
									<p class="menu-language-and-currency__header">Currency:</p>
									<ul class="menu-language-and-currency__list">
										<li class="menu-language-and-currency__list-item is-active">
											<svg viewBox="0 0 32 32" class="menu-language-and-currency__tick"><use xlink:href="#icon-tick"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 32 32" id="icon-tick"><path d="M35.515 2.868l-5.269-2.868-15.251 23.076-10.651-9.674-4.344 3.945 16.030 14.653z"></path></symbol></use></svg>
											USD
										</li>
									</ul>
								</div>
								<div class="menu-language-and-currency__footer">
									<a class="menu-language-and-currency__apply" href="">Apply changes</a>
								</div>
							</div>
						</div>
						<div class="menu-submenu-separator"></div>
						<div class="menu-submenu-item  menu-submenu-item--hover">
							<form action="?action_sign_out=sign-out" method="POST"><input class="menu-submenu-link" type="submit" value="Sign out"/></form>
							<?php
							  //$action_sign_out = isset($_GET['action_sign_out']) ? $action_sign_out = $_GET['action_sign_out'] : "";
								$action_sign_out = $_GET['action_sign_out'] ?? "";
								if($action_sign_out == "sign-out"){
									if($_SERVER['REQUEST_METHOD'] == 'POST'){
										$insert_into_gog_users_new_user = $connect->prepare("UPDATE " . $usersAccountInfo . " SET Realy_in_gog = ?");
										$insert_into_gog_users_new_user->execute(array("0"));

										header('location: gogcom.php');
										exit();
									}
								}
							?>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<!---->
				<div class="menu-item menu-item-except-store has-submenu menu-item--animated js-menu-signin interval_is_cleared_sign_parent">
					<a class="menu-link menu-uppercase js-menu-link" href="">
						sign in
						<svg viewBox="0 0 32 32" class="menu-link__dropdown-icon"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg>
					</a>
					<div class="menu-submenu js-menu ng-hide">
						<div class="menu-header menu-anonymous-header">
							<div class="menu-btn menu-anonymous-header__btn menu-anonymous-header__btn--create-account menu-uppercase">create account</div>
							<div class="menu-btn menu-anonymous-header__btn menu-anonymous-header__btn--sign-in menu-uppercase">sign in</div>
						</div>
						<div class="menu-anonymous__shelf"></div>
						<div class="menu-anonymous__about">
							<span>GOG.com is a digital distribution platform – an online store with a curated selection of games, an optional gaming client giving you freedom of choice, and a vivid community of gamers.</span>
							All of this born from a deeply rooted love for games, utmost care about customers, and a belief that you should own the things you buy.
						</div>
						<div class="menu-anonymous__features-header"><span>What Is GOG.com About?</span></div>
						<div class="menu-features-slider">
							<div class="menu-features-slider-next menu-features-slider-icon">
								<svg viewBox="0 0 32 32" class="menu-features-slider__nav-icon"><use xlink:href="#icon-fat-arrow-right"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 20 32" id="icon-fat-arrow-right"><g id="fat-arrow-right-icomoon-ignore"><line stroke-width="1" stroke="#449FDB" opacity=""></line></g><path d="M20.446 16l-17.642-16-2.804 2.666 15.112 13.334-15.112 13.334 2.8 2.665 17.646-16z" fill="#000000"></path></symbol></use></svg>
							</div>
							<div class="menu-features-slider-prev menu-features-slider-icon">
								<svg viewBox="0 0 32 32" class="menu-features-slider__nav-icon"><use xlink:href="#icon-fat-arrow-left"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 20 32" id="icon-fat-arrow-left"><g id="fat-arrow-left-icomoon-ignore"><line stroke-width="1" stroke="#449FDB" opacity=""></line></g><path d="M17.646 32l2.8-2.665-15.112-13.334 15.112-13.334-2.804-2.666-17.642 16 17.646 16z" fill="#000000"></path></symbol></use></svg>
							</div>
							<div class="menu-features-slider__slide menu-features-slider__slide--one">
								<div class="menu-features-slider__slide-text">
									<svg viewBox="0 0 32 32" class="menu-features-slider__slide-icon menu-features-slider__slide-icon--slide1"><use xlink:href="#icon-star"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 29 27" id="icon-star"><g stroke="inherit" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linejoin="round"><g transform="translate(-533.000000, -1981.000000)" stroke="inherit" stroke-width="2"><g transform="translate(247.000000, 1763.000000)"><path d="M300.144,219 C301.176,219.78 302.814,223.393 304.284,227.563 C308.618,227.688 312.31,228.017 313.288,228.549 C312.571,230.048 310.107,232.661 306.683,235.343 C307.751,239.368 308.216,242.354 308.267,244 C306.252,243.034 303.668,242.049 300.144,239.883 C296.619,242.049 294.036,243.034 292.021,244 C292.073,242.354 292.537,239.368 293.605,235.343 C290.181,232.661 287.717,230.048 287,228.549 C287.978,228.017 291.669,227.688 296.004,227.563 C297.475,223.393 299.112,219.78 300.144,219 Z"></path></g></g></g></symbol></use></svg>
									<p><span>Hand-Picking The Best In Gamimg</span> A selection of great games, from modern hits to all-time classics, that you really shouldn’t miss.</p>
								</div>
							</div>
							<div class="menu-features-slider__slide menu-features-slider__slide--two">
								<div class="menu-features-slider__slide-text">
									<svg style="stroke: #a90000;" viewBox="0 0 32 32" class="menu-features-slider__slide-icon menu-features-slider__slide-icon--slide2"><use xlink:href="#icon-heart"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 30 24" id="icon-heart"><g stroke="inherit" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linejoin="round"><g transform="translate(-1239.000000, -1983.000000)" stroke="inherit" stroke-width="2"><g transform="translate(247.000000, 1763.000000)"><path d="M1008.87835,242.04525 C1007.78535,242.95225 1006.21535,242.95225 1005.12235,242.04525 C1001.92335,239.38825 995.647354,233.83725 994.489354,230.28025 C993.150354,226.83925 994.489354,221.62125 999.372354,221.04925 C1004.25435,220.47725 1007.00035,225.12325 1007.00035,225.12325 C1007.00035,225.12325 1009.74635,220.47725 1014.62835,221.04925 C1019.51135,221.62125 1020.85035,226.83925 1019.51135,230.28025 C1018.35435,233.83725 1012.07735,239.38825 1008.87835,242.04525 Z"></path></g></g></g></symbol></use></svg>
									<p><span style="color: #a90000;">Customer-first approach.</span> Delivering user-friendly support enriched with additional customer benefits.</p>
								</div>
							</div>
							<div class="menu-features-slider__slide menu-features-slider__slide--three">
								<div class="menu-features-slider__slide-text">
									<svg style="stroke: #7d00c9;" viewBox="0 0 32 32" class="menu-features-slider__slide-icon menu-features-slider__slide-icon--slide3"><use xlink:href="#icon-hand-picked"><svg preserveAspectRatio="xMidYMax meet" viewBox="0 0 28 28" id="icon-hand-picked"><g stroke="inherit" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linejoin="round"><g transform="translate(-886.000000, -1979.000000)" stroke-width="2" stroke="inherit"><g transform="translate(247.000000, 1763.000000)"><g transform="translate(640.000000, 217.000000)"><g><polyline stroke-linecap="round" points="18 3 26 3 26 21 0 21 0 3 8 3"></polyline><path d="M13,21 L13,27"></path><polygon points="17 26 13 26 9 26 13 26"></polygon><path d="M13,0 L13,12" stroke-linecap="round"></path></g><polyline stroke-linecap="round" points="8.7578 9 12.9998 13.243 17.2418 9"></polyline></g></g></g></g></svg></use></svg>
									<p><span style="color: #7d00c9;">Gamer-friendly platform.</span>  We’re here to make a difference in the way you buy and play your games, giving you freedom of choice and a hassle-free experience.</p>
								</div>
							</div>
							<div class="menu-features-slider__timer js-timer">
								<span class="menu-features-slider__timer-section js-timer-section"></span>
								<span class="menu-features-slider__timer-section js-timer-section"></span>
								<span class="menu-features-slider__timer-section js-timer-section"></span>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<!---->
		<div class="padding_lite_right_left_solve_problem_cart padding_lite_right_solve_problem_cart"></div>
		<!---->
		<div class="menu-tray">
			<!---->
			<?php if($have_change_after_select_user > 0){ ?>
				<div class="menu-item menu-cart menu-item--invisible-on-loading menu-notifications has-submenu js-menu-notifications">
					<a class="menu-link menu-link--icon menu-link--cart">
						<svg viewBox="0 0 15 16" class="menu-icon-svg menu-icon-svg--notifications" ng-class="{ 'got-notification': notifications.newNotificationAnimation }"><use xlink:href="#icon-notification"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16.3" id="icon-notification"><path d="M16,14.2c-0.1,0.3-0.4,0.4-0.7,0.4H9.6v0.2c0,1.6-0.9,1.4-1.6,1.4
				    c-0.8,0-1.7,0.2-1.7-1.4c0-0.1,0-0.1,0-0.2H0.7c-0.3,0-0.5-0.1-0.7-0.4c0,0,0-1,0-1c1.9-1.4,3.1-3.6,3-6c0-3.4,1.5-6.3,2.8-6.7
				    C6.2,0.3,6.6,0.2,7,0.2c0.6-0.2,1.4-0.2,2,0c0.4,0,0.8,0.1,1.1,0.3C11.7,0.9,13,4.6,13,7.2c0,2.4,1.1,4.6,3,6
				    C16,13.5,16,13.8,16,14.2z M11.5,7.3c0-3.7-2.2-5.7-2.5-5.7l-2,0c-0.3,0-2.5,1.9-2.5,5.7c0.1,2.1-0.6,4.2-2,5.8h11.1
				    C12.3,12.1,11.5,10.1,11.5,7.3z"></path></symbol></use></svg>
						<span class="menu-item__count menu-item__count--cart_notifications">0</span>
					</a>
					<div class="menu-submenu menu-cart__submenu ng-hide">
						<div class="menu-cart-empty">
							<div class="menu-cart-empty__header menu-uppercase">
								<svg viewBox="0 0 32 32" class="menu-notifications-empty__header-icon"><use xlink:href="#icon-notifications-empty"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 45 32.4" id="icon-notifications-empty"><path d="M43,28.2h-3c0,0,2-3.4,2-6c-0.2-2.1-0.9-4.2-2-6h3c1.1,1.8,1.8,3.8,2,6
						    C45,24.8,43,28.2,43,28.2z M37.5,24.7l-11.1,3c0,0.1,0.1,0.3,0.1,0.4c0.8,3.1-1,3.1-2.4,3.5c-1.5,0.4-3.1,1.2-3.9-1.8
						    c0-0.1-0.1-0.3-0.1-0.4l-11,3c-0.5,0.2-1.1,0-1.5-0.5c0,0-0.6-1.9-0.5-2c3-3.7,4-8.6,2.7-13.1c-1.7-6.5-0.3-13,1.9-14.4
						    c0.7-0.5,1.4-0.9,2.2-1.2c2-0.5,1.9-0.5,3.9-1.1C18.6,0,19.4,0,20.2,0.1c3.2,0.2,7.7,6.6,9,11.5c1.1,4.6,4.5,8.4,8.9,10
						    c0.1,0.7,0.3,1.3,0.5,1.9C38.5,24.1,38.1,24.6,37.5,24.7z M26.4,12.7c-1.9-7.2-7.2-9.8-7.8-9.6l-3.9,1c-0.6,0.2-3.8,5.1-1.9,12.3
						    c1.4,5.3,0.7,9.8-0.9,12.3l21.4-5.7C30.4,21.6,27.8,18,26.4,12.7z M2,28.2c-1.1-1.8-1.8-3.8-2-6c0-2.6,2-6,2-6h3c0,0-2,3.4-2,6
						    c0.2,2.1,0.9,4.2,2,6H2z"></path></symbol></use></svg>
								Your Notifications
							</div>
							<hr class="menu-cart-empty__line"/>
							<div class="menu-cart-empty__description">See new chat messages, friend invites, as well as important announcements and deals relevant to you</div>
						</div>
					</div>
				</div>
				<div class="menu-item menu-cart menu-friends has-submenu js-menu-friends">
					<a class="menu-link menu-link--icon menu-link--cart">
						<svg viewBox="0 0 17 16" class="menu-icon-svg menu-icon-svg--friends"><use xlink:href="#icon-friends2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17.6 16" id="icon-friends2"><path d="M17.7,13.4c0,2.2-4.6,2.6-6.7,2.6s-6.6-0.4-6.6-2.6c0-1.8,2.4-4.9,4.6-4.9c-1.2-1-2-2.4-2-4
				    C7,2,8.7,0,11,0c2.4,0.1,4.2,2.1,4,4.5c0,0,0,0,0,0.1c0,1.6-0.7,3-2,4C15.4,8.5,17.7,11.5,17.7,13.4z M13.6,4.5
				    c0.2-1.4-0.8-2.7-2.2-2.9C10,1.4,8.7,2.4,8.5,3.8c0,0.2,0,0.5,0,0.7c0,1.7,1,3,2.5,3C12.6,7.5,13.7,6.1,13.6,4.5
				    C13.6,4.6,13.6,4.6,13.6,4.5L13.6,4.5z M11,9.5c-3.4,0-4.9,2.2-5,3.8c0.3,0.3,1.8,1.2,5,1.2s4.8-0.9,5.1-1.2
				    C16,11.7,14.3,9.5,11,9.5L11,9.5z M3,5C3,3.6,4,2.5,5.3,2.4c0.2,0,0.4,0,0.6,0C6.1,2,6.2,1.5,6.4,1.1C6.1,1,5.8,0.9,5.4,1
				    C3.2,1,1.5,2.8,1.5,5c0,1.4,0.7,2.7,1.9,3.5c-2,0-3.3,2.5-3.3,4c0,1.3,1.6,2,3.2,2.2c-0.3-0.4-0.4-1-0.1-1.5c-0.6,0-1.2-0.3-1.7-0.7
				    c0-1.9,1.6-3.4,3.5-3.4c0,0,0,0,0.1,0c0.1-0.5,0.4-0.9,0.8-1C5.2,7.9,3,6.4,3,5z"></path></symbol></use></svg>
						<span class="menu-item__count menu-item__count--cart_friends">0</span>
					</a>
					<div class="menu-submenu menu-cart__submenu ng-hide">
						<div class="menu-cart-empty">
							<div class="menu-cart-empty__header menu-uppercase">
								<svg viewBox="0 0 32 32" class="menu-friends-empty__header-icon"><use xlink:href="#icon-friends2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17.6 16" id="icon-friends2"><path d="M17.7,13.4c0,2.2-4.6,2.6-6.7,2.6s-6.6-0.4-6.6-2.6c0-1.8,2.4-4.9,4.6-4.9c-1.2-1-2-2.4-2-4
						    C7,2,8.7,0,11,0c2.4,0.1,4.2,2.1,4,4.5c0,0,0,0,0,0.1c0,1.6-0.7,3-2,4C15.4,8.5,17.7,11.5,17.7,13.4z M13.6,4.5
						    c0.2-1.4-0.8-2.7-2.2-2.9C10,1.4,8.7,2.4,8.5,3.8c0,0.2,0,0.5,0,0.7c0,1.7,1,3,2.5,3C12.6,7.5,13.7,6.1,13.6,4.5
						    C13.6,4.6,13.6,4.6,13.6,4.5L13.6,4.5z M11,9.5c-3.4,0-4.9,2.2-5,3.8c0.3,0.3,1.8,1.2,5,1.2s4.8-0.9,5.1-1.2
						    C16,11.7,14.3,9.5,11,9.5L11,9.5z M3,5C3,3.6,4,2.5,5.3,2.4c0.2,0,0.4,0,0.6,0C6.1,2,6.2,1.5,6.4,1.1C6.1,1,5.8,0.9,5.4,1
						    C3.2,1,1.5,2.8,1.5,5c0,1.4,0.7,2.7,1.9,3.5c-2,0-3.3,2.5-3.3,4c0,1.3,1.6,2,3.2,2.2c-0.3-0.4-0.4-1-0.1-1.5c-0.6,0-1.2-0.3-1.7-0.7
						    c0-1.9,1.6-3.4,3.5-3.4c0,0,0,0,0.1,0c0.1-0.5,0.4-0.9,0.8-1C5.2,7.9,3,6.4,3,5z"></path></symbol></use></svg>
								Connect with friends
							</div>
							<hr class="menu-cart-empty__line"/>
							<div class="menu-cart-empty__description">Play, chat, and share experiences with your friends on GOG.com</div>
							<a href="" class="menu-btn menu-cart-empty__btn menu-uppercase">Invite friends</a>
						</div>
					</div>
				</div>
			<?php } ?>
			<!---->
			<div class="menu-item menu-cart has-submenu js-menu-cart">
				<a class="menu-link menu-link--icon menu-link--cart">
					<svg viewBox="0 0 32 32" class="menu-icon-svg"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
			     M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
			    C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
			    c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
			    c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use></svg>
					<span id="menu-item__count--cart" class="menu-item__count menu-item__count--cart <?php if($have_change_after_select_user > 0){ if($calcNumberOfGamesOwner != 0){ echo 'notify_cart_increased'; } } ?>"><?php if($have_change_after_select_user > 0){ echo $calcNumberOfGamesOwner; }else{ echo '0'; } ?></span>
				</a>
				<div class="menu-submenu menu-cart__submenu ng-hide">
					<div class="menu-cart__products-list" id="menu-cart__products-list">
						<!-- cart not empty -->
						<?php if($have_change_after_select_user > 0 && $calcNumberOfGamesOwner > 0){ ?>
							<!---->
							<div class="menu-header menu-header-cart">
				        <div class="menu-cart-items">
				          <span class="menu-header__label hide-in-lite-mode">Your shopping cart</span>
				          <span class="menu-header__items hide-in-lite-mode">
				            <span class="cart_cartCount"><?php echo $calcNumberOfGamesOwner; ?></span>
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
											if($fetch_game_from_cart['gc_g_cart_private_sign_out'] == 1 && $fetch_game_from_cart['GamesOwner'] == $Gamesowner){
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
				            <?php } } ?>
				            <!-- for scroll in cart -->
				            <div class="hide_16px_end_of_scroll"></div>
				          </div>
				        </div>
				      </div>
						<!-- cart empty -->
						<?php } else { ?>
							<?php
								if($action_sign_login == "create-new-account"){}
								else{
									// cart
									foreach($fetch_games_from_cart as $fetch_game_from_cart){
										$update_game_by_id_column_in_cartUP = $connect->prepare("UPDATE " . $allGameInOnePlaceTable . " SET gc_g_incart = ?");
										$update_game_by_id_column_in_cartUP->execute(array("0"));
									}
									// wishlist
									foreach($fetch_wishlist_table_count_games as $fetch_wishlist_table_count_game){
										$update_game_by_id_column_in_WishListUP = $connect->prepare("UPDATE " . $allGameInOnePlaceTable . " SET gc_g_wishlisted = ?");
										$update_game_by_id_column_in_WishListUP->execute(array("0"));
									}

									$delete_game_by_id = $connect->prepare("DELETE FROM " . $userCartTable . " WHERE gc_g_cart_private_sign_out = ? OR GamesOwner = ?");
									$delete_game_by_id->execute(array("0", "Root"));
								}
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
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="menu-item js-menu-search">
				<a class="menu-link menu-link--last menu-link--search menu-link--icon">
					<svg viewBox="0 0 14.69 16" class="menu-icon-svg menu-icon-svg--search"><use xlink:href="#icon-search2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 13.8 15" id="icon-search2"><path d="M13.8,13.7L12.2,15L9,11.1C8.1,11.7,7.1,12,6,12c-3.2,0.1-5.9-2.4-6-5.6C0,6.3,0,6.1,0,6
    			c0-3.3,2.7-6,6-6s6,2.7,6,6c0,1.5-0.6,3-1.6,4.1L13.8,13.7z M6,1.6c-2.3-0.1-4.3,1.6-4.5,4c0,0.1,0,0.3,0,0.4c0,2.5,1.9,4.5,4.4,4.6
    			s4.5-1.9,4.6-4.4C10.5,3.7,8.6,1.6,6,1.6C6.1,1.6,6,1.6,6,1.6z"></path></symbol></use></svg>
				</a>
				<div class="menu-submenu menu-search ng-hide">
					<div class="menu-search-toolbar">
						<svg viewBox="0 0 32 32" class="menu-search-icon"><use xlink:href="#icon-search2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 13.8 15" id="icon-search2"><path d="M13.8,13.7L12.2,15L9,11.1C8.1,11.7,7.1,12,6,12c-3.2,0.1-5.9-2.4-6-5.6C0,6.3,0,6.1,0,6
				    c0-3.3,2.7-6,6-6s6,2.7,6,6c0,1.5-0.6,3-1.6,4.1L13.8,13.7z M6,1.6c-2.3-0.1-4.3,1.6-4.5,4c0,0.1,0,0.3,0,0.4c0,2.5,1.9,4.5,4.4,4.6
				    s4.5-1.9,4.6-4.4C10.5,3.7,8.6,1.6,6,1.6C6.1,1.6,6,1.6,6,1.6z"></path></symbol></use></svg>
						<div class="menu-search-input">
							<input id="input_search" class="menu-search-input__field js-menu-search-input ng-valid ng-touched ng-dirty ng-valid-parse ng-empty" type="text" autocomplete="off" onkeyup=""/> <!-- [search_Term_Change((this.value).replace(/&amp;/g, 'A.N.D').replace(/'/g, 'S.Q.U'), 'games/movies_for_gamers');count_games_number((this.value).replace(/&amp;/g, 'A.N.D').replace(/'/g, 'S.Q.U'));count_movies_number((this.value).replace(/&amp;/g, 'A.N.D').replace(/'/g, 'S.Q.U'));] -->
							<a class="menu-search-input__clear menu-search-loader menu-uppercase ng-hide">clear</a>
						</div>
						<button onclick="" class="menu-search-toolbar__results-count menu-search-toolbar__results-count--games menu-uppercase button_is_active" id="search_totalGames"></button>
						<button onclick="" class="menu-search-toolbar__results-count menu-search-toolbar__results-count--movies menu-uppercase" id="search_totalmovies"></button>
						<a class="menu-search-toolbar__close">
							<svg viewBox="0 0 32 32" class="menu-icon-svg"><use xlink:href="#icon-close4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 14.9 15.2" id="icon-close4"><path d="M14.9,13.8l-1.4,1.4L7.6,9l-6.1,6.1L0,13.7l6.1-6.1L0.1,1.4L1.4,0l6.1,6.2L13.4,0l1.4,1.4L8.9,7.7
    					L14.9,13.8z"></path></symbol></use></svg>
						</a>
					</div>
					<div class="menu-search__results menu-search__results--for--games--movies" id="menu-search__results">

					</div>
				</div>
			</div>
			<!---->
			<div class="menu-lite js-menu-lite js-menu-signin">
				<a class="menu-link menu-link--icon menu-link--cart">
					<span class="menu-hamburger">
						<span class="menu-hamburger-line"></span>
						<span class="menu-hamburger-line"></span>
						<span class="menu-hamburger-line"></span>
					</span>
					menu
				</a>
				<div class="menu-submenu menu-cart__submenu ng-hide">
					<div class="menu-submenu-item">
						<a class="menu-submenu-link menu-submenu-link--lite" href="">store</a>
						<span class="menu-submenu-item__expand-trigger"><svg viewBox="0 0 32 32" class="menu-submenu-item__expand-icon" ng-class="{'is-expanded': accordion.expandedSections.store}"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg></span>
						<div class="menu-accordion ng-hide">
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link menu-submenu-item-link_color" href="">New releases</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link menu-submenu-item-link_color" href="">Bestsellers</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">On sale now</a></div>
						</div>
					</div>
					<!---->
					<div class="menu-submenu-item">
						<a class="menu-submenu-link menu-submenu-link--lite" href="">About</a>
						<span class="menu-submenu-item__expand-trigger"><svg viewBox="0 0 32 32" class="menu-submenu-item__expand-icon" ng-class="{'is-expanded': accordion.expandedSections.store}"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg></span>
						<div class="menu-accordion ng-hide">
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link menu-submenu-item-link_color" href="">GOG.com</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link menu-submenu-item-link_color" href="">GOG Galaxy</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">Join the team</a></div>
						</div>
					</div>
					<!---->
					<div class="menu-submenu-item">
						<a class="menu-submenu-link menu-submenu-link--lite" href="">Community</a>
						<span class="menu-submenu-item__expand-trigger"><svg viewBox="0 0 32 32" class="menu-submenu-item__expand-icon" ng-class="{'is-expanded': accordion.expandedSections.store}"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg></span>
						<div class="menu-accordion ng-hide">
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">All forums</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">General discussion forum</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">Forum replies</a></div>
						</div>
					</div>
					<!---->
					<div class="menu-submenu-item">
						<a class="menu-submenu-link menu-submenu-link--lite" href="">Support</a>
						<span class="menu-submenu-item__expand-trigger"><svg viewBox="0 0 32 32" class="menu-submenu-item__expand-icon" ng-class="{'is-expanded': accordion.expandedSections.store}"><use xlink:href="#icon-arrow-down2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 6.688 4.844" id="icon-arrow-down2"><path d="M3.5,3.684l-2.428-3L0.157,1.5,3.5,5.537,6.844,1.5,5.928,0.681Z"></path></symbol></use></svg></span>
						<div class="menu-accordion ng-hide">
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">Game technical issues</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">Orders and payments</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">Account and website</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">Downloads</a></div>
							<div class="menu-submenu-item menu-submenu-item--small"><a class="menu-submenu-item-link" href="">GOG Galaxy</a></div>
						</div>
					</div>
					<!---->
					<?php if($have_change_after_select_user > 0){ ?>
						<div class="menu-lite-anonymous menu-lite-account">
							<a class="menu-link menu-link--anonymous js-no-prevent-default"><span class="menu-account__user-name_outside"><img srcset="<?php echo $fetch_gog_users_new_user['Profile_image']; ?>"/><?php echo $fetch_gog_users_new_user['UserName']; ?></span></a>
							<div class="menu-account__list _gog-menu-scrollbar">
								<div class="js-gog-scrollbar-content _gog-menu-scrollbar__content menu-account__content">
									<a class="menu-account-link js-no-prevent-default" href="">Activity feed</a>
									<a class="menu-account-link js-no-prevent-default" href="">Your profile</a>
									<div class="menu-submenu-separator menu-submenu-separator--transparent"></div>
									<a class="menu-account-link js-no-prevent-default" href="">
										Games
										<span class="menu-submenu-item__label ng-hide">0</span>
									</a>
									<a class="menu-account-link js-no-prevent-default" href="">
										Movies
										<span class="menu-submenu-item__label ng-hide">0</span>
									</a>
									<a class="menu-account-link js-no-prevent-default" href="">
										Wishlist
										<span class="menu-submenu-item__label ng-hide">0</span>
									</a>
									<a class="menu-account-link js-no-prevent-default" href="">Redeem a code</a>
									<div class="menu-submenu-separator menu-submenu-separator--transparent"></div>
									<a class="menu-account-link js-no-prevent-default" href="">Friends</a>
									<a class="menu-account-link js-no-prevent-default" href="">Chat</a>
									<div class="menu-submenu-separator menu-submenu-separator--transparent"></div>
									<a class="menu-account-link js-no-prevent-default" href="">
										Your Wallet
										<span class="menu-submenu-item__label ng-hide">0</span>
									</a>
									<a class="menu-account-link js-no-prevent-default" href="">Privacy & settings</a>
									<a class="menu-account-link js-no-prevent-default" href="">Language & currency</a>
									<div class="menu-submenu-separator menu-submenu-separator--transparent"></div>
									<a class="menu-account-link menu-account-link_sign_out js-no-prevent-default">
										<form action="?action_sign_out=sign-out" method="POST"><input class="menu-submenu-link" type="submit" value="Sign out"/></form>
									</a>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="menu-lite-anonymous">
							<a class="menu-link menu-link--anonymous js-no-prevent-default">sign in</a>
							<div class="menu-header menu-anonymous-header">
								<div class="menu-btn menu-anonymous-header__btn menu-anonymous-header__btn--create-account menu-uppercase">create account</div>
								<div class="menu-btn menu-anonymous-header__btn menu-anonymous-header__btn--sign-in menu-uppercase">sign in</div>
							</div>
							<div class="menu-anonymous__shelf"></div>
							<div class="menu-anonymous__about">
								<span>GOG.com is a digital distribution platform – an online store with a curated selection of games, an optional gaming client giving you freedom of choice, and a vivid community of gamers.</span>
								All of this born from a deeply rooted love for games, utmost care about customers, and a belief that you should own the things you buy.
							</div>
							<div class="menu-anonymous__features-header"><span>What Is GOG.com About?</span></div>
							<div class="menu-features-slider">
								<div class="menu-features-slider-next menu-features-slider-icon">
									<svg viewBox="0 0 32 32" class="menu-features-slider__nav-icon"><use xlink:href="#icon-fat-arrow-right"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 20 32" id="icon-fat-arrow-right"><g id="fat-arrow-right-icomoon-ignore"><line stroke-width="1" stroke="#449FDB" opacity=""></line></g><path d="M20.446 16l-17.642-16-2.804 2.666 15.112 13.334-15.112 13.334 2.8 2.665 17.646-16z" fill="#000000"></path></symbol></use></svg>
								</div>
								<div class="menu-features-slider-prev menu-features-slider-icon">
									<svg viewBox="0 0 32 32" class="menu-features-slider__nav-icon"><use xlink:href="#icon-fat-arrow-left"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 20 32" id="icon-fat-arrow-left"><g id="fat-arrow-left-icomoon-ignore"><line stroke-width="1" stroke="#449FDB" opacity=""></line></g><path d="M17.646 32l2.8-2.665-15.112-13.334 15.112-13.334-2.804-2.666-17.642 16 17.646 16z" fill="#000000"></path></symbol></use></svg>
								</div>
								<div class="menu-features-slider__slide menu-features-slider__slide--one --slide_is--active">
									<div class="menu-features-slider__slide-text">
										<svg viewBox="0 0 32 32" class="menu-features-slider__slide-icon menu-features-slider__slide-icon--slide1"><use xlink:href="#icon-star"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 29 27" id="icon-star"><g stroke="inherit" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linejoin="round"><g transform="translate(-533.000000, -1981.000000)" stroke="inherit" stroke-width="2"><g transform="translate(247.000000, 1763.000000)"><path d="M300.144,219 C301.176,219.78 302.814,223.393 304.284,227.563 C308.618,227.688 312.31,228.017 313.288,228.549 C312.571,230.048 310.107,232.661 306.683,235.343 C307.751,239.368 308.216,242.354 308.267,244 C306.252,243.034 303.668,242.049 300.144,239.883 C296.619,242.049 294.036,243.034 292.021,244 C292.073,242.354 292.537,239.368 293.605,235.343 C290.181,232.661 287.717,230.048 287,228.549 C287.978,228.017 291.669,227.688 296.004,227.563 C297.475,223.393 299.112,219.78 300.144,219 Z"></path></g></g></g></symbol></use></svg>
										<p><span>Hand-Picking The Best In Gamimg</span> A selection of great games, from modern hits to all-time classics, that you really shouldn’t miss.</p>
									</div>
								</div>
								<div class="menu-features-slider__slide menu-features-slider__slide--two">
									<div class="menu-features-slider__slide-text">
										<svg style="stroke: #a90000;" viewBox="0 0 32 32" class="menu-features-slider__slide-icon menu-features-slider__slide-icon--slide2"><use xlink:href="#icon-heart"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 30 24" id="icon-heart"><g stroke="inherit" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linejoin="round"><g transform="translate(-1239.000000, -1983.000000)" stroke="inherit" stroke-width="2"><g transform="translate(247.000000, 1763.000000)"><path d="M1008.87835,242.04525 C1007.78535,242.95225 1006.21535,242.95225 1005.12235,242.04525 C1001.92335,239.38825 995.647354,233.83725 994.489354,230.28025 C993.150354,226.83925 994.489354,221.62125 999.372354,221.04925 C1004.25435,220.47725 1007.00035,225.12325 1007.00035,225.12325 C1007.00035,225.12325 1009.74635,220.47725 1014.62835,221.04925 C1019.51135,221.62125 1020.85035,226.83925 1019.51135,230.28025 C1018.35435,233.83725 1012.07735,239.38825 1008.87835,242.04525 Z"></path></g></g></g></symbol></use></svg>
										<p><span style="color: #a90000;">Customer-first approach.</span> Delivering user-friendly support enriched with additional customer benefits.</p>
									</div>
								</div>
								<div class="menu-features-slider__slide menu-features-slider__slide--three">
									<div class="menu-features-slider__slide-text">
										<svg style="stroke: #7d00c9;" viewBox="0 0 32 32" class="menu-features-slider__slide-icon menu-features-slider__slide-icon--slide3"><use xlink:href="#icon-hand-picked"><svg preserveAspectRatio="xMidYMax meet" viewBox="0 0 28 28" id="icon-hand-picked"><g stroke="inherit" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linejoin="round"><g transform="translate(-886.000000, -1979.000000)" stroke-width="2" stroke="inherit"><g transform="translate(247.000000, 1763.000000)"><g transform="translate(640.000000, 217.000000)"><g><polyline stroke-linecap="round" points="18 3 26 3 26 21 0 21 0 3 8 3"></polyline><path d="M13,21 L13,27"></path><polygon points="17 26 13 26 9 26 13 26"></polygon><path d="M13,0 L13,12" stroke-linecap="round"></path></g><polyline stroke-linecap="round" points="8.7578 9 12.9998 13.243 17.2418 9"></polyline></g></g></g></g></svg></use></svg>
										<p><span style="color: #7d00c9;">Gamer-friendly platform.</span>  We’re here to make a difference in the way you buy and play your games, giving you freedom of choice and a hassle-free experience.</p>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
