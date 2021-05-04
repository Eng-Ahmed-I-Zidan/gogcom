<?php
	ob_start();
	$connectDB = "";
  $layout_html_css_mainFile = "storePage/store.css";
	$layout_html_js_mainFile = "storePage/store.js";
	$pagetitle = "store";
	$allgamedivStyleSheet = "";

	require 'includes-php-files/functions/title.php';
  require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_navbar;

	// use to custom price condition
  $limitGamesInOnePage = 0;

	// get games type and show resault
	$category = isset($_GET['category']) ? $_GET['category'] : "";
	$sort = isset($_GET['sort']) ? $_GET['sort'] : "";
	$system = isset($_GET['system']) ? $_GET['system'] : "";
	$searchText = isset($_GET['searchText']) ? $_GET['searchText'] : "";
?>

<div class="content cf" id="FullPage">
  <div class="nav-spacer menu-spacer"></div>
  <!---->
  <!---->
  <div class="container--spaced container--catalog">
    <div class="container--spaced--for_test catalog__search-container" GamesTypeList_1Par="Allgames" GamesTypeList_1Par_Parent="games">
      <div class="dropdown dropdown--bottom search-dropdown__trigger">
        <div class="dropdown__trigger">
          <div class="search-categories">
            <span class="selected-category">All games</span>
            <span class="search-categories-icon"><svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg></span>
          </div>
        </div>
        <div class="dropdown__layer">
          <div class="search-dropdown-content">
            <span GamesTypeList_1Par_Parent="games" GamesTypeList_1Par="Allgames" class="search-dropdown-item search-dropdown-item---selected">
              <svg class="sort-dropdown__icon-full search-dropdown-icon">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope ng-hide">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">All games</div>
            </span>
            <span GamesTypeList_1Par_Parent="games" GamesTypeList_1Par="role-playing" class="search-dropdown-item">
							<svg class="sort-dropdown__icon-full search-dropdown-icon ng-hide">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">Role-playing</div>
            </span>
            <span GamesTypeList_1Par_Parent="games" GamesTypeList_1Par="simulation" class="search-dropdown-item">
							<svg class="sort-dropdown__icon-full search-dropdown-icon ng-hide">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">Simulation</div>
            </span>
            <span GamesTypeList_1Par_Parent="games" GamesTypeList_1Par="indie" class="search-dropdown-item">
							<svg class="sort-dropdown__icon-full search-dropdown-icon ng-hide">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">Indie</div>
            </span>
            <span GamesTypeList_1Par_Parent="games" GamesTypeList_1Par="racing--AND--sports" class="search-dropdown-item">
							<svg class="sort-dropdown__icon-full search-dropdown-icon ng-hide">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">Sports &amp; Racing</div>
            </span>
            <span GamesTypeList_1Par_Parent="games" GamesTypeList_1Par="action" class="search-dropdown-item">
							<svg class="sort-dropdown__icon-full search-dropdown-icon ng-hide">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">Action</div>
            </span>
            <span GamesTypeList_1Par_Parent="games" GamesTypeList_1Par="strategy" class="search-dropdown-item">
							<svg class="sort-dropdown__icon-full search-dropdown-icon ng-hide">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">Strategy</div>
            </span>
            <span GamesTypeList_1Par_Parent="games" GamesTypeList_1Par="shooter" class="search-dropdown-item">
							<svg class="sort-dropdown__icon-full search-dropdown-icon ng-hide">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">Shooter</div>
            </span>
            <span GamesTypeList_1Par_Parent="games" GamesTypeList_1Par="adventure" class="search-dropdown-item">
							<svg class="sort-dropdown__icon-full search-dropdown-icon ng-hide">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">Adventure</div>
            </span>
						<span GamesTypeList_1Par_Parent="movies_for_gamers" GamesTypeList_1Par="movie" class="search-dropdown-item">
							<svg class="sort-dropdown__icon-full search-dropdown-icon ng-hide">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="search-dropdown-text search-dropdown-text--selected">Movies for gamers</div>
            </span>
          </div>
        </div>
      </div>
      <div class="search-input-container">
        <svg viewBox="0 0 32 32" class="menu-search-icon">
          <use xlink:href="#icon-search2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 13.8 15" id="icon-search2"><path d="M13.8,13.7L12.2,15L9,11.1C8.1,11.7,7.1,12,6,12c-3.2,0.1-5.9-2.4-6-5.6C0,6.3,0,6.1,0,6
				    c0-3.3,2.7-6,6-6s6,2.7,6,6c0,1.5-0.6,3-1.6,4.1L13.8,13.7z M6,1.6c-2.3-0.1-4.3,1.6-4.5,4c0,0.1,0,0.3,0,0.4c0,2.5,1.9,4.5,4.4,4.6s4.5-1.9,4.6-4.4C10.5,3.7,8.6,1.6,6,1.6C6.1,1.6,6,1.6,6,1.6z"></path></symbol></use>
        </svg>
        <input type="text" placeholder="Search for..."/>
        <div class="search-button-wrapper ng-hide">
          <svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
        </div>
      </div>
    </div>
		<!---->
		<div class="tabbed-section__head now-on-sale__title js-head">
			<div class="section-title_inside js-section-title tabbed-section__title">
				<div class="section-title__icon-wrapper">
					<svg class="filters__toggle-icon filters__toggle-icon--opened-dektop"><use xlink:href="#icon-toggle-filters"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 13 11" id="icon-toggle-filters"><path d="M7 5H1V0H0v11h1V6h6v3l6-3.5L7 2z" fill-rule="evenodd"></path></symbol></use></svg>
				</div>
				<div class="section-title__title-wrapper">filters</div>
				<div class="filters-status ng-hide">
					<span class="filters-status-number">(0)</span>
					<div class="filter__clear-wrapper">
						<svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
					</div>
				</div>
			</div>
			<div class="tabs-wrapper tabs-wrapper--select">
				<span class="tabs-wrapper--select--vis">Bestselling</span>
				<svg viewBox="0 0 32 32" class="menu-submenu-icon menu-submenu-icon--custom" ng-style="{'fill': customCategory.customisation.categoryColor}"><use xlink:href="#icon-arrow-right4"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 5 7" id="icon-arrow-right4"><path d="M2.76,3.5,0,5.93,1,7,5,3.5,1,0,0,1.07Z"></path></symbol></use></svg>
			</div>
			<div class="tabs-wrapper tabs-wrapper--inverted tabs-wrapper--shift-breakpoint-1 js-tabs-wrapper" bigThingyBannerParent="">
				<div bigThingyBanner="everything" class="tabbed-section__tab js-section-tab tabbed-section__tab--active">everything</div>
				<div bigThingyBanner="NewRelease" class="tabbed-section__tab js-section-tab">New releases</div>
				<div bigThingyBanner="Upcoming" class="tabbed-section__tab js-section-tab">Upcoming</div>
				<div bigThingyBanner="onSale" class="tabbed-section__tab js-section-tab">on sale</div>
			</div>
			<div class="catalog__sort-by-trigger-container" SortByOption="">
				<div class="catalog__sort-by dropdown--bottom">
					<div class="dropdown__trigger">
						<span class="sort-by-title">Sort by:</span>
						<span class="selected-category" style="text-transform: capitalize;">bestselling</span>
						<span class="search-categories-icon"><svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg></span>
					</div>
					<div class="dropdown__layer">
						<div class="search-dropdown-content">
	            <span class="search-dropdown-item search-dropdown-item---selected" SortByOptionHere="bestselling">
	              <svg ng-if="catalog.categoryItems['all_games'].selected" class="sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
	                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
	              </svg>
								<svg class="ng-hide sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
	                <use xlink:href="#checkbox">
	                  <symbol viewBox="0 0 17 17" id="checkbox">
	                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
	                  </symbol>
	                </use>
	              </svg>
	              <div class="search-dropdown-text search-dropdown-text--selected">bestselling</div>
	            </span>
	            <span class="search-dropdown-item" SortByOptionHere="alphabetically">
	              <svg ng-if="catalog.categoryItems['all_games'].selected" class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
	                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
	              </svg>
								<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
	                <use xlink:href="#checkbox">
	                  <symbol viewBox="0 0 17 17" id="checkbox">
	                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
	                  </symbol>
	                </use>
	              </svg>
	              <div class="search-dropdown-text search-dropdown-text--selected">alphabetically</div>
	            </span>
	            <span class="search-dropdown-item" SortByOptionHere="userRating">
	              <svg ng-if="catalog.categoryItems['all_games'].selected" class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
	                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
	              </svg>
								<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
	                <use xlink:href="#checkbox">
	                  <symbol viewBox="0 0 17 17" id="checkbox">
	                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
	                  </symbol>
	                </use>
	              </svg>
	              <div class="search-dropdown-text search-dropdown-text--selected">user rating</div>
	            </span>
	            <span class="search-dropdown-item" SortByOptionHere="dateAdded">
	              <svg ng-if="catalog.categoryItems['all_games'].selected" class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
	                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
	              </svg>
								<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
	                <use xlink:href="#checkbox">
	                  <symbol viewBox="0 0 17 17" id="checkbox">
	                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
	                  </symbol>
	                </use>
	              </svg>
	              <div class="search-dropdown-text search-dropdown-text--selected">date added</div>
	            </span>
	            <span class="search-dropdown-item" SortByOptionHere="bestsellingAllTime">
	              <svg ng-if="catalog.categoryItems['all_games'].selected" class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
	                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
	              </svg>
								<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
	                <use xlink:href="#checkbox">
	                  <symbol viewBox="0 0 17 17" id="checkbox">
	                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
	                  </symbol>
	                </use>
	              </svg>
	              <div class="search-dropdown-text search-dropdown-text--selected">bestselling (all time)</div>
	            </span>
	            <span class="search-dropdown-item" SortByOptionHere="oldestFirst">
	              <svg ng-if="catalog.categoryItems['all_games'].selected" class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
	                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
	              </svg>
								<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
	                <use xlink:href="#checkbox">
	                  <symbol viewBox="0 0 17 17" id="checkbox">
	                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
	                  </symbol>
	                </use>
	              </svg>
	              <div class="search-dropdown-text search-dropdown-text--selected">oldest first</div>
	            </span>
	            <span class="search-dropdown-item" SortByOptionHere="newestFirst">
	              <svg ng-if="catalog.categoryItems['all_games'].selected" class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
	                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
	              </svg>
								<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
	                <use xlink:href="#checkbox">
	                  <symbol viewBox="0 0 17 17" id="checkbox">
	                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
	                  </symbol>
	                </use>
	              </svg>
	              <div class="search-dropdown-text search-dropdown-text--selected">newest first</div>
	            </span>
	          </div>
					</div>
				</div>
				<div class="catalog__view-switch">
					<svg GameStyleShow="Default" class="view-switch-btn view-switch-btn-grid view-switch-btn--active"><use xlink:href="#icon-grid"><symbol preserveAspectRatio="xMidYMax meet" id="icon-grid"><path d="M11 10h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1zm-5 0h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1zm-5 0h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1zm10-5h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zM6 5h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zM1 5h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm10-5h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1zM6 0h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1zM1 0h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1z"></path></symbol></use></svg>
					<!---->
					<svg GameStyleShow="List" class="view-switch-btn view-switch-btn-list"><use xlink:href="#icon-list"><symbol preserveAspectRatio="xMidYMax meet" id="icon-list"><path d="M5 11h9v2H5v-2zm-4-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1zm4-4h9v2H5V6zM1 5h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm4-4h9v2H5V1zM1 0h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1z"></path></symbol></use></svg>
				</div>
			</div>
		</div>
		<!---->
  </div>
  <!---->
  <!---->
  <div class="discover_games" category__games="<?php echo $category; ?>" games__sort="<?php echo $sort; ?>" games__system="<?php echo $system; ?>" games__searchText="<?php echo $searchText; ?>">
    <div class="tabbed-section discover_games__content container--two-columns">
			<div class="container--two-columns__child--curated-collection">
        <!---->
        <div class="curated-collection-section filter__item filter__item--radio" CustomPrice="0">
					<div class="filter__header">
						<div class="filter__clear-wrapper ng-hide">
							<svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
						</div>
						<div class="filter__toggle">
							<div class="filter__title">price</div>
							<div class="filter__chevron-wrapper">
								<svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg>
							</div>
						</div>
					</div>
					<div class="ShowWhenFilterOff"></div>
					<div class="filter__item-options">
						<span class="option__item" loadingDone="" priceValue="5" itemTextFilterOff="Under $ 5">
              <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">under<span>5</span></div>
            </span>
						<span class="option__item" loadingDone="" priceValue="10" itemTextFilterOff="Under $ 10">
              <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">under<span>10</span></div>
            </span>
						<span class="option__item" loadingDone="" priceValue="15" itemTextFilterOff="Under $ 15">
              <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">under<span>15</span></div>
            </span>
						<span class="option__item" loadingDone="" priceValue="25" itemTextFilterOff="Under $ 25">
              <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">under<span>25</span></div>
            </span>
						<span class="option__item" loadingDone="" priceValue="30" itemTextFilterOff="$ 25+">
              <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text"><span>25+</span></div>
            </span>
						<span class="option__item" loadingDone="" priceValue="71440" itemTextFilterOff="Free">
              <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">free</div>
            </span>
						<span class="option__item" loadingDone="" priceValue="1692200" itemTextFilterOff="Discount">
              <svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected">
                <use xlink:href="#icon-checkbox-single"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-single"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></symbol></use>
              </svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">discount</div>
            </span>
					</div>
        </div>
				<!---->
				<!---->
        <div class="curated-collection-section filter__item filter__item--checkbox system--filter__item--checkbox" CustomSystem="">
					<div class="filter__header">
						<div class="filter__clear-wrapper ng-hide">
							<svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
						</div>
						<div class="filter__toggle">
							<div class="filter__title">system</div>
							<div class="filter__chevron-wrapper">
								<svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg>
							</div>
						</div>
					</div>
					<div class="ShowWhenFilterOff"></div>
					<div class="filter__item-options">
						<span class="option__item" systemValue="w" loadingDone="" itemTextFilterOff="windows">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">windows</div>
            </span>
						<span class="option__item" systemValue="m" loadingDone="" itemTextFilterOff="osx">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">OSX</div>
            </span>
						<span class="option__item" systemValue="l" loadingDone="" itemTextFilterOff="linux">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">linux</div>
            </span>
					</div>
        </div>
				<!---->
				<!---->
        <div class="curated-collection-section filter__item filter__item--checkbox featrues--filter__item--checkbox" CustomFeatrues="">
					<div class="filter__header">
						<div class="filter__clear-wrapper ng-hide">
							<svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
						</div>
						<div class="filter__toggle">
							<div class="filter__title">features</div>
							<div class="filter__chevron-wrapper">
								<svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg>
							</div>
						</div>
					</div>
					<div class="ShowWhenFilterOff"></div>
					<div class="filter__item-options">
						<span class="option__item" FeatruesValue="SinglePlayer" loadingDone="" itemTextFilterOff="Single-player">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Single-player</div>
            </span>
						<span class="option__item" FeatruesValue="MultiPlayer" loadingDone="" itemTextFilterOff="Multi-player">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Multi-player</div>
            </span>
						<span class="option__item" FeatruesValue="Coop" loadingDone="" itemTextFilterOff="co-op">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">co-op</div>
            </span>
						<span class="option__item" FeatruesValue="Achievements" loadingDone="" itemTextFilterOff="Achievements">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Achievements</div>
            </span>
						<span class="option__item" FeatruesValue="Leaderboards" loadingDone="" itemTextFilterOff="Leaderboards">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Leaderboards</div>
            </span>
						<span class="option__item" FeatruesValue="ControllerSupport" loadingDone="" itemTextFilterOff="Controller support">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Controller support</div>
            </span>
						<span class="option__item" FeatruesValue="InDevelopment" loadingDone="" itemTextFilterOff="In development">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">In development</div>
            </span>
						<span class="option__item" FeatruesValue="CloudSaves" loadingDone="" itemTextFilterOff="Cloud saves">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Cloud saves</div>
            </span>
						<span class="option__item" FeatruesValue="Overlay" loadingDone="" itemTextFilterOff="overlay">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">overlay</div>
            </span>
					</div>
        </div>
				<!---->
				<!---->
        <div class="curated-collection-section filter__item filter__item--checkbox language--filter__item--checkbox" CustomLanguage="">
					<div class="filter__header">
						<div class="filter__clear-wrapper ng-hide">
							<svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
						</div>
						<div class="filter__toggle">
							<div class="filter__title">language</div>
							<div class="filter__chevron-wrapper">
								<svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg>
							</div>
						</div>
					</div>
					<div class="ShowWhenFilterOff"></div>
					<div class="filter__item-options">
						<span class="option__item" itemTextFilterOff="English" loadingDone="" LanguageValue="English">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">English</div>
            </span>
						<span class="option__item" itemTextFilterOff="Deutsch" loadingDone="" LanguageValue="Deutsch">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Deutsch</div>
            </span>
						<span class="option__item" itemTextFilterOff="français" loadingDone="" LanguageValue="French">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">français</div>
            </span>
						<span class="option__item" itemTextFilterOff="español" loadingDone="" LanguageValue="Spanish">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">español</div>
            </span>
						<span class="option__item" itemTextFilterOff="italiano" loadingDone="" LanguageValue="Italiano">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">italiano</div>
            </span>
						<span class="option__item" itemTextFilterOff="Português do Brasil" loadingDone="" LanguageValue="BrazilianPortuguese">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Português do Brasil</div>
            </span>
						<span class="option__item" itemTextFilterOff="português" loadingDone="" LanguageValue="Portuguese">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">português</div>
            </span>
						<span class="option__item" itemTextFilterOff="русский" loadingDone="" LanguageValue="Russian">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">русский</div>
            </span>
						<span class="option__item" itemTextFilterOff="polski" loadingDone="" LanguageValue="Polish">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">polski</div>
            </span>
						<span class="option__item" itemTextFilterOff="日本語" loadingDone="" LanguageValue="Japanese">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">日本語</div>
            </span>
						<span class="option__item" itemTextFilterOff="český" loadingDone="" LanguageValue="Czech">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">český</div>
            </span>
						<span class="option__item" itemTextFilterOff="nederlands" loadingDone="" LanguageValue="Dutch">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">nederlands</div>
            </span>
						<span class="option__item" itemTextFilterOff="中文(简体)" loadingDone="" LanguageValue="ChineseSimplified">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">中文(简体)</div>
            </span>
						<span class="option__item" itemTextFilterOff="한국어" loadingDone="" LanguageValue="Korean">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">한국어</div>
            </span>
						<span class="option__item" itemTextFilterOff="Türkçe" loadingDone="" LanguageValue="Turkish">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Türkçe</div>
            </span>
						<span class="option__item" itemTextFilterOff="magyar" loadingDone="" LanguageValue="Hungarian">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">magyar</div>
            </span>
						<span class="option__item" itemTextFilterOff="svenska" loadingDone="" LanguageValue="Swedish">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">svenska</div>
            </span>
						<span class="option__item" itemTextFilterOff="suomi" loadingDone="" LanguageValue="Finland">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">suomi</div>
            </span>
						<span class="option__item" itemTextFilterOff="norsk" loadingDone="" LanguageValue="norsk">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">norsk</div>
            </span>
						<span class="option__item" itemTextFilterOff="Dansk" loadingDone="" LanguageValue="Dansk">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">Dansk</div>
            </span>
					</div>
        </div>
				<!---->
				<!---->
        <div class="curated-collection-section filter__item filter__item--checkbox DLCs--filter__item--checkbox" CustomDLCs="">
					<div class="filter__header">
						<div class="filter__clear-wrapper ng-hide">
							<svg class="search-button-clear"><use xlink:href="#icon-clear"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-clear"><path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1.33-8L12 5.33 10.67 4 8 6.67 5.33 4 4 5.33 6.67 8 4 10.67 5.33 12 8 9.33 10.67 12 12 10.67 9.33 8z" fill-rule="evenodd"></path></symbol></use></svg>
						</div>
						<div class="filter__toggle">
							<div class="filter__title">hide</div>
							<div class="filter__chevron-wrapper">
								<svg><use xlink:href="#icon-chevron"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 15 24" id="icon-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use></svg>
							</div>
						</div>
					</div>
					<div class="ShowWhenFilterOff"></div>
					<div class="filter__item-options">
						<span class="option__item" itemTextFilterOff="DLCs"  loadingDone="" DLCsValue="DLCs">
							<svg class="ng-hide sort-dropdown__icon-full search-dropdown-icon search-dropdown-icon--selected"><use xlink:href="#icon-checkbox-multi"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 16 16" id="icon-checkbox-multi"><path d="M3.43 0h9.14C14.47 0 16 1.54 16 3.43v9.14c0 1.9-1.54 3.43-3.43 3.43H3.43A3.43 3.43 0 0 1 0 12.57V3.43C0 1.53 1.54 0 3.43 0zm.6 1a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3h-8zm2.32 9.47L4.24 8.19a.94.94 0 0 1-.21-.85c.07-.3.29-.54.57-.62.28-.08.57 0 .78.23l1.54 1.68L10 5.25a.76.76 0 0 1 1.13 0c.31.35.32.9.01 1.24L7.5 10.47a.78.78 0 0 1-1.14 0z" id="checkbox-multi-Combined-Shape"></path></symbol></use></svg>
							<svg class="sort-dropdown__icon sort-dropdown__icon-empty ng-scope">
                <use xlink:href="#checkbox">
                  <symbol viewBox="0 0 17 17" id="checkbox">
                      <path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z"></path>
                  </symbol>
                </use>
              </svg>
              <div class="option__text">DLCs</div>
            </span>
					</div>
        </div>
				<!---->
      </div>
      <div class="container--two-columns__child--discover-games">
				<!---->
        <div id="AllResault_AnyFilters" big-thingy-banner="Bestselling" class="Bestselling tab-products--tabbed-section now-on-sale__tab-products--visible">
					<!---->
          <?php
					if($category == ""){
						// arrayCollectGamesIDForUpdate
						$arrayCollectGamesIDForUpdate = array();

							// games condition if allgames no type
							$select_game_by_id = $connect->prepare("SELECT * FROM gogcom_all_game_in_one_place WHERE gc_g_type_parent = ? ORDER BY gc_g_bestselling_num ASC");
							$select_game_by_id->execute(array('games'));
							// select games
	            $fetch_games_by_id = $select_game_by_id->fetchAll();
	            // to any changes rowcount > 0
	            $have_change_after_fetch = $select_game_by_id->rowcount();
							?>
							<div id="for_catalog__paginator_wrapper">
							<?php
	            if($have_change_after_fetch > 0){
	              foreach($fetch_games_by_id as $fetch_game_by_id){
	                $gc_g_id = $fetch_game_by_id['gc_g_id'];

	                // gc_g_price_price_and_discount_presentage [ price_price(0), discount_presentage(1) ]
	                $gc_g_price_price = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[0];
	                $gc_g_discount_presentage = explode(" & ", $fetch_game_by_id['gc_g_price_price_and_discount_presentage'])[1];
	                $gc_g_format_price_discount = number_format($gc_g_price_price - ($gc_g_price_price * ($gc_g_discount_presentage / 100)), 2, '.', '');

	                $gc_g_incart = $fetch_game_by_id['gc_g_incart'];
	                $gc_g_wishlisted = $fetch_game_by_id['gc_g_wishlisted'];

	                $gc_g_picture_cover = $fetch_game_by_id['gc_g_picture_cover'];

	                // coming-soon
	                $gc_g_comingSoon__gameDiv = $fetch_game_by_id['gc_g_comingSoon__gameDiv'];

	                // href of game
	                $gc_g_href = $fetch_game_by_id['gc_g_href'];

									// release date
						      $gc_g_release_date = $fetch_game_by_id['gc_g_release_date'];

	                $gc_g_title = $fetch_game_by_id['gc_g_title'];

	                // flags [ soon, indev ]
	                $gc_g_soon = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[0];
	                $gc_g_indev = explode(" & ", $fetch_game_by_id['gc_g_soon_indev'])[1];

	                // gc_g_type_parent
	                $gc_g_type = $fetch_game_by_id['gc_g_type'];
	                $gc_g_type_parent = $fetch_game_by_id['gc_g_type_parent'];

	                // operating system [ windows - mac - linux ]
	                $gc_g_os_win = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[0];
	                $gc_g_os_mac = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[1];
	                $gc_g_os_linux = explode(" & ", $fetch_game_by_id['gc_g_os_win_mac_linux'])[2];

	                // gc_g_tba_free_owned__noPrice_inSearch [ tba(0), free(1), owned(2) ]
	                $gc_g_tba = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[0];
	                $gc_g_free = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[1];
	                $gc_g_owned = explode(" & ", $fetch_game_by_id['gc_g_tba_free_owned__noPrice_inSearch'])[2];

									$limitGamesInOnePage += 1;
									// insert game to [gogcom_copy]
									array_push($arrayCollectGamesIDForUpdate, $gc_g_id);

									if($limitGamesInOnePage <= 48){
									?>
		                <div ng-game-movies-id="<?php echo $gc_g_id; ?>"
		                      gc_g_title="<?php echo $gc_g_title; ?>"
		                      gc_g_incart="<?php echo $gc_g_incart; ?>"
		                      gc_g_type="<?php echo $gc_g_type; ?>"
		                      gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
		                      gc_g_price_price="<?php echo $gc_g_price_price; ?>"
		                      class="product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
		                  <a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
		                    <div class="product-tile__title"><?php echo $gc_g_title; ?></div>
		                    <div class="product-tile__cover has-image">
		                      <picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
													<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
														<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																			<?php if($have_change_after_select_user > 0){
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} else {
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} ?>">
															<svg class="option-icon option-icon-full">
																<use xlink:href="#checkbox-multi">
																	<symbol viewBox="0 0 17 17" id="checkbox-multi">
																			<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																	</symbol>
																</use>
															</svg>
															In library
														</span>
														<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
															<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
															 M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
															C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
															c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
															c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
															</svg>
															in cart
														</span>
														<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																	<?php if($have_change_after_select_user > 0){
																					if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				} else {
																					if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				}
																					?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
															</svg>
															soon
														</span>
														<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
															</svg>
															wishlisted
														</span>
													</div>
		                    </div>
		                    <div class="product-tile__info">
		                      <div class="product-tile__platforms">
		                        <div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
		                          <span class="product_isGame">
		                            <i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
		                            <i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
		                            <i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
		                          </span>
		                        </div>
		                        <div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
		                          <span class="product-tile__movie-slug">movie</span>
		                        </div>
		                      </div>
		                      <div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
		                        <div class="product-tile__prices">
		                          <div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
		                            <span class="menu-product__discount-text">
		                              <span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
		                              %
		                            </span>
		                          </div>
		                          <div class="product-tile__prices-inner">
		                            <span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
		                            <span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
		                            <span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
		                          </div>
		                        </div>
		                        <div ng-game-movies-id="<?php echo $gc_g_id; ?>"
		                              href="<?php echo $gc_g_href; ?>"
		                              gc_g_title="<?php echo $gc_g_title; ?>"
		                              gc_g_incart="<?php echo $gc_g_incart; ?>"
		                              gc_g_type="<?php echo $gc_g_type; ?>"
		                              gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
		                              gc_g_price_price="<?php echo $gc_g_price_price; ?>"
		                              gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
		                              gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
		                              gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
		                              class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
		                              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
		                              </svg>
		                        </div>
		                      </div>
		                      <span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
		                      <span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
		                    </div>
		                  </a>
		                </div>
										<!--list-->
										<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
													gc_g_title="<?php echo $gc_g_title; ?>"
													gc_g_incart="<?php echo $gc_g_incart; ?>"
													gc_g_type="<?php echo $gc_g_type; ?>"
													gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
													gc_g_price_price="<?php echo $gc_g_price_price; ?>"
													class="ng-hide product-tile--games--list product-tile_for---all--place--games has-discount button-parent--class--to-find--labels">
											<a class="product-tile__content js-content" href="<?php echo $gc_g_href; ?>">
												<div class="product-tile__title"><?php echo $gc_g_title; ?></div>
												<div class="product-tile__cover has-image">
													<picture class="product-tile__cover-picture js-cover-image lazy"><?php echo $gc_g_picture_cover; ?></picture>
													<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper big-spot__ribbon-wrapper--for-lite-screen">
														<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																			<?php if($have_change_after_select_user > 0){
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} else {
																							if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																						} ?>">
															<svg class="option-icon option-icon-full">
																<use xlink:href="#checkbox-multi">
																	<symbol viewBox="0 0 17 17" id="checkbox-multi">
																			<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																	</symbol>
																</use>
															</svg>
														</span>
														<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
															<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
															 M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
															C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
															c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
															c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
															</svg>
														</span>
														<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																	<?php if($have_change_after_select_user > 0){
																					if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				} else {
																					if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																				}
																					?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
															</svg>
														</span>
														<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
															<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
															</svg>
														</span>
													</div>
												</div>
												<div class="product-tile__info">
													<div class="product-tile__platforms">
														<div class="product-tile__labels product-ribbon big-spot__ribbon-wrapper">
															<span class="product-tile__label product-tile__label--in-library big-spot__ribbon
																				<?php if($have_change_after_select_user > 0){
																								if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																							} else {
																								if($gc_g_indev == 0 || $gc_g_incart == 1 || $gc_g_soon == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																							} ?>">
																<svg class="option-icon option-icon-full">
																	<use xlink:href="#checkbox-multi">
																		<symbol viewBox="0 0 17 17" id="checkbox-multi">
																				<path d="M3.42883516,-8.8817842e-16 L12.5711648,-8.8817842e-16 C14.4648582,-8.8817842e-16 16,1.53514179 16,3.42883516 L16,12.5723956 C16,14.466089 14.4648582,16.0012308 12.5711648,16.0012308 L3.42883516,16.0012308 C1.53514179,16.0012308 0,14.466089 0,12.5723956 L0,3.42883516 C0,1.53514179 1.53514179,-8.8817842e-16 3.42883516,-8.8817842e-16 Z M4.03165622,1 C2.37480197,1 1.03165622,2.34314575 1.03165622,4 L1.03165622,12 C1.03165622,13.6568542 2.37480197,15 4.03165622,15 L12.0305794,15 C13.6874336,15 15.0305794,13.6568542 15.0305794,12 L15.0305794,4 C15.0305794,2.34314575 13.6874336,1 12.0305794,1 L4.03165622,1 Z M6.34695426,10.4694594 L4.23608246,8.1913056 C4.03233112,7.96881159 3.95286467,7.64463677 4.02761736,7.34089467 C4.10237004,7.03715258 4.31998516,6.79998885 4.59848918,6.7187408 C4.8769932,6.63749274 5.17407474,6.72450386 5.37782605,6.94699791 L6.91782605,8.62576714 L10.0000825,5.2473056 C10.3163417,4.91377931 10.8192352,4.91815007 11.130583,5.25713102 C11.4419309,5.59611198 11.4469322,6.14471337 11.1418261,6.49038252 L7.48982605,10.4694594 C7.16946272,10.8009501 6.66731759,10.8009501 6.34695426,10.4694594 Z"></path>
																		</symbol>
																	</use>
																</svg>
																In library
															</span>
															<span class="product-tile__label product-tile__label--in-cart big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_incart == 0){ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">
																<svg viewBox="0 0 32 32" class="menu-product__cart-icon"><use xlink:href="#icon-cart2"><symbol preserveAspectRatio="xMidYMax meet" viewBox="0 0 17 16.1" id="icon-cart2"><path d="M16.8,1.5l-1.8,0L13,11l-1,1l-9,0l-1.1-1L0,3l1.5,0l2.1,7.6h7.7L13.4,1l1-1L17,0L16.8,1.5z
																 M4.6,8.2V7.7h5.8v0.5L4.6,8.2L4.6,8.2z M4.3,5.6h6.2l0,0.5l-6.2,0V5.6L4.3,5.6z M3.5,4l0-0.4h7.9l0,0.4L3.5,4z M4.5,13
																C5.3,13,6,13.6,6,14.4c0,0,0,0.1,0,0.1c0,0.9-0.7,1.6-1.5,1.6c0,0,0,0,0,0C3.7,16,3,15.4,3,14.6c0,0,0-0.1,0-0.1
																c0-0.8,0.5-1.4,1.3-1.5C4.4,13,4.4,13,4.5,13L4.5,13z M10.4,13c0.8-0.1,1.6,0.6,1.6,1.4c0,0,0,0,0,0c0,0.9-0.7,1.6-1.6,1.6
																c-0.8,0-1.5-0.7-1.5-1.5C8.9,13.7,9.6,13,10.4,13L10.4,13L10.4,13z"></path></symbol></use>
																</svg>
																in cart
															</span>
															<span class="product-tile__label product-tile__label--is-upcoming big-spot__ribbon
																		<?php if($have_change_after_select_user > 0){
																						if($gc_g_soon == 0 || $gc_g_incart == 1 || $gc_g_wishlisted == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					} else {
																						if($gc_g_soon == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; }
																					}
																						?>">
																<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M150.5,50.16667v-5.375c0,-12.84267 -10.449,-23.29167 -23.29167,-23.29167h-82.41667c-12.84267,0 -23.29167,10.449 -23.29167,23.29167v5.375zM21.5,60.91667v66.29167c0,12.84267 10.449,23.29167 23.29167,23.29167h82.41667c12.84267,0 23.29167,-10.449 23.29167,-23.29167v-66.29167zM86,78.83333c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667zM53.75,121.83333c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM53.75,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667zM86,125.41667c-5.93758,0 -10.75,-4.81242 -10.75,-10.75c0,-5.93758 4.81242,-10.75 10.75,-10.75c5.93758,0 10.75,4.81242 10.75,10.75c0,5.93758 -4.81242,10.75 -10.75,10.75zM118.25,93.16667c-3.95958,0 -7.16667,-3.20708 -7.16667,-7.16667c0,-3.95958 3.20708,-7.16667 7.16667,-7.16667c3.95958,0 7.16667,3.20708 7.16667,7.16667c0,3.95958 -3.20708,7.16667 -7.16667,7.16667z"></path></g></g>
																</svg>
																soon
															</span>
															<span class="product-tile__label product-tile__label--is-wishlisted big-spot__ribbon <?php if($have_change_after_select_user > 0){ if($gc_g_wishlisted == 0 || $gc_g_incart == 1){ echo 'ng-hide'; }else{ echo 'current_label_active'; } }else{ echo 'ng-hide'; } ?>">
																<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M12.54167,21.5c-1.93842,-0.02741 -3.74144,0.99102 -4.71865,2.66532c-0.97721,1.6743 -0.97721,3.74507 0,5.41937c0.97721,1.6743 2.78023,2.69273 4.71865,2.66532h9.87516c2.60843,0 4.78277,1.80215 5.27702,4.36719l12.62565,66.28467c2.0895,10.94896 11.73607,18.93148 22.88574,18.93148h67.08952c11.14967,0 20.8003,-7.97945 22.88574,-18.93148l11.55485,-60.68571c0.43428,-1.91576 -0.211,-3.91585 -1.68301,-5.21659c-1.472,-1.30074 -3.5363,-1.69498 -5.38405,-1.02825c-1.84775,0.66673 -3.18469,2.28825 -3.48698,4.22922l-11.56185,60.69271c-1.13239,5.94697 -6.26721,10.1901 -12.32471,10.1901h-67.08952c-6.05535,0 -11.18678,-4.24338 -12.32471,-10.1901v-0.007l-12.62565,-66.27767c-1.44453,-7.5704 -8.1299,-13.10856 -15.83805,-13.10856zM113.11995,35.83333c-5.26392,0.04658 -10.24889,1.92587 -14.01139,5.60596l-2.35856,2.30957l-2.35156,-2.30257c-3.76967,-3.68008 -8.80839,-5.57371 -14.01139,-5.60596c-5.2675,0.0645 -10.18792,2.17564 -13.86442,5.94889c-7.58592,7.783 -7.43631,20.30015 0.33594,27.89681l26.13314,25.53125c1.04275,1.01767 2.4038,1.53271 3.7583,1.53271c1.3545,0 2.70838,-0.51505 3.7583,-1.53271l26.14014,-25.53825c7.77583,-7.59667 7.92885,-20.11039 0.34294,-27.88981c-3.6765,-3.78042 -8.60392,-5.88781 -13.87142,-5.95589zM71.66667,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM121.83333,129c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g></g>
																</svg>
																wishlisted
															</span>
														</div>
														<div class="menu-product__os js-os-support <?php if($gc_g_type_parent == 'movies_for_gamers'){ echo 'ng-hide'; } ?>">
															<span class="product_isGame">
																<i class="menu-product__os-icon menu-product__os-icon--windows <?php if($gc_g_os_win == 0){ echo 'ng-hide'; } ?>"></i>
																<i class="menu-product__os-icon menu-product__os-icon--mac <?php if($gc_g_os_mac == 0){ echo 'ng-hide'; } ?>"></i>
																<i class="menu-product__os-icon menu-product__os-icon--linux <?php if($gc_g_os_linux == 0){ echo 'ng-hide'; } ?>"></i>
															</span>
														</div>
														<div class="big-spot__super-title-text  <?php if($gc_g_type_parent == 'games'){ echo 'ng-hide'; } ?>">
															<span class="product-tile__movie-slug">movie</span>
														</div>
													</div>
													<div class="product-tile__buy-block <?php if($gc_g_comingSoon__gameDiv == 1){ echo 'ng-hide'; } ?>">
														<div class="product-tile__prices">
															<div class="menu-product__discount product-state__discount <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>">
																<span class="menu-product__discount-text">
																	<span class="product_price_discountPercentage"><?php echo $gc_g_discount_presentage; ?></span>
																	%
																</span>
															</div>
															<div class="product-tile__prices-inner">
																<span class="product-tile__price _price <?php if($gc_g_discount_presentage == '0' || $gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
																<span class="product-tile__price-discounted _price <?php if($gc_g_free == 1){ echo 'ng-hide'; } ?>"><?php echo $gc_g_format_price_discount; ?></span>
																<span class="product-tile__free <?php if($gc_g_free == 0){ echo 'ng-hide'; } ?>">free</span>
															</div>
														</div>
														<div ng-game-movies-id="<?php echo $gc_g_id; ?>"
																	href="<?php echo $gc_g_href; ?>"
																	gc_g_title="<?php echo $gc_g_title; ?>"
																	gc_g_incart="<?php echo $gc_g_incart; ?>"
																	gc_g_type="<?php echo $gc_g_type; ?>"
																	gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
																	gc_g_price_price="<?php echo $gc_g_price_price; ?>"
																	gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
																	gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
																	gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
																	class="product-state__price-btn menu-product__price-btn menu-product__price-btn--active <?php if($gc_g_incart == 1){ echo 'game_added_to_cart_successfuly'; } ?>">
																	<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
																	</svg>
														</div>
													</div>
													<span class="product-tile__no-buy-block-slug ng-hide">Play for free</span>
													<span class="product-tile__no-buy-block-slug <?php if($gc_g_comingSoon__gameDiv == 0){ echo 'ng-hide'; } ?>">Coming soon</span>
												</div>
											</a>
										</div>
										<!---->
										<!---->
										<!---->
										<!---->
	                <?php
									}
	              }
	            }
							?>
							</div>
	          <!---->
						<?php if($limitGamesInOnePage == 0){ ?>
							<div class="noResultsFound">no results found</div>
						<?php } ?>
						<!-- catalog__paginator-wrapper -->
						<div class="catalog__paginator-wrapper">
							<div class="catalog__paginator">
								<div class="paginator-container">
									<?php if(($limitGamesInOnePage / 48) < 1){
									} else { ?>
										<div class="arrow-wrapper arrow-wrapper--left arrow-wrapper--hidden">
											<svg class="arrow-left">
							        	<use xlink:href="#paginator-chevron"><symbol viewBox="0 0 15 24" id="paginator-chevron"><path d="M0 21.16L9.16 12 0 2.82 2.82 0l12 12-12 12z"></path></symbol></use>
							        </svg>
										</div>
										<?php for($PagesNumber = 1; $PagesNumber <= ceil($limitGamesInOnePage / 48); $PagesNumber++){ ?>
											<div noloading="<?php if($PagesNumber == 1){ echo 'Done'; } ?>" ng-item-index="<?php echo $PagesNumber; ?>" class="page-indicator page-indicator--inner
														<?php
															if($PagesNumber == 1){ echo ' page-indicator--active page-indicator--first '; } else { echo ' page-index-wrapper--next '; }
															if($PagesNumber == ceil($limitGamesInOnePage / 48)){ echo ' page-indicator--last '; }
															if(ceil($limitGamesInOnePage / 48) > 6){
																if($PagesNumber >= 5 && $PagesNumber != ceil($limitGamesInOnePage / 48)){ echo ' ng-hide '; }
																if($PagesNumber == 4){ echo ' Dots_bettween_f-l '; }
															}
															?>
														">
												<div class="page-ellipsis page-ellipsis-desktop <?php if(ceil($limitGamesInOnePage / 48) > 6){ if($PagesNumber == 4){}else{ echo 'ng-hide'; } }else{ echo 'ng-hide'; } ?>">...</div>
												<div class="page-index-wrapper page-indicator--inactive <?php if(ceil($limitGamesInOnePage / 48) > 6){ if($PagesNumber == 4){ echo 'ng-hide'; }else{} } ?>"><?php echo $PagesNumber; ?></div>
												<div class="page-ellipsis page-ellipsis-mobile ng-hide">...</div>
											</div>
										<?php } ?>
										<div class="arrow-wrapper arrow-wrapper--right  <?php if(($limitGamesInOnePage / 48) == 1){ echo 'arrow-wrapper--hidden'; } ?>">
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
						<div id="ReturnGamesIdForWrapper" class="ReturnGamesIdForWrapper ng-hide">
							<?php
							for($printId = 0; $printId < count($arrayCollectGamesIDForUpdate); $printId++){
								if(($printId + 1) == count($arrayCollectGamesIDForUpdate)){
									echo $arrayCollectGamesIDForUpdate[$printId];
								} else {
									echo $arrayCollectGamesIDForUpdate[$printId] . ",";
								}
							}
							?>
						</div>
						<!---->
					<?php } ?>
        </div>
        <!---->
      </div>
    </div>
  </div>
  <!---->
  <!---->
</div>

	<script>
		var vm = new Vue({
			el: '#FullPage', // element
			// data
			data: {},
			// methods
			methods: {}
		});
	</script>

	<!-- iframe signin gogcom -->
	<?php require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_navbar_signIN_gog; ?>
	<!-- iframe signin gogcom -->
  <?php
    require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_footer;
    require $includes_php_files_static_templates . $includes_php_files_static_templates_footer;
  ?>

	<?php ob_end_flush(); ?>
