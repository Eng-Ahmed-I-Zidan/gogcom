
<?php

	/* Start With anothor folder have many pages */
	$layout_html_css_mainFile_navbar = "navbar_footer/gog_com_navbar.css";
	$layout_html_css_mainFile_navbar_signIN_gog = "navbar_footer/gog_com_navbar_signIN_gog.css";
  $layout_html_css_mainFile_footer = "navbar_footer/gog_com_footer.css";
	$layout_html_js_mainFile_navbar = "navbar_footer/gog_com_navbar.js";
	$allgamedivStyleSheet_css = "navbar_footer\allgamesdivstyle.css";

	if(isset($hereIsAllGamesPage)){
		// for all games
		$layout_html_css_allgames_staticStyle = "allgames/allgamesStatic.css";
		$layout_html_js_allgames_staticStyle = "allgames/allgamesStatic.js";
		$layout_html_css_mainFile = "allgames/allgamesInOnePage.css";
		$layout_html_js_mainFile = "allgames/allgamesInOnePage.js";
	}

	/* Start With variables [includes-php-files] to get file easy */
	$includes_php_files_functions = "includes-php-files/functions/";
	$includes_php_files_functions_title = "title.php";

	$includes_php_files_languages = "includes-php-files/languages/";

	$includes_php_files_static_templates = "includes-php-files/static-templates/";
	$includes_php_files_static_templates_Top = "staticForgamesContent/staticForgamesContentTop.php";
	$includes_php_files_static_templates_Bottom = "staticForgamesContent/staticForgamesContentbottom.php";
	$includes_php_files_static_templates_header = "header.php";
	$includes_php_files_static_templates_footer = "footer.php";
	$includes_php_files_static_templates_connect = "connect.php";
	$includes_php_files_static_templates_gog_com_navbar = "gog_com_navbar.php";
	$includes_php_files_static_templates_gog_com_navbar_signIN_gog = "gog_com_navbar_signIN_gog.php";
	$includes_php_files_static_templates_gog_com_footer = "gog_com_footer.php";
	/* End With variables [includes-php-files] to get file easy */

	/* Start With variables [layout-html] to get file easy */
	$layout_html_css = "layout-html/css/";
	$layout_html_css_bootstrap_min = "bootstrap.min.css";
	$layout_html_css_font_awesome_min = "all.min.css";
	$layout_html_css_normalize = "normalize.css";

	$layout_html_js = "layout-html/js/";
	$layout_html_js_jquery_min = "jquery-3.4.1.min.js";
	$layout_html_js_bootstrap_min = "bootstrap.min.js";
	$layout_html_js_font_awesome_min = "all.min.js";
	$layout_html_js_vue = "vue/vue.js";
	$layout_html_js_axios_min = "vue/axios.min.js";

	$layout_html_images = "layout-html/images/";
	/* End With variables [layout-html] to get file easy */

	/* Start Connecting With DB */
	if(isset($connectDB)){
		require $includes_php_files_static_templates . $includes_php_files_static_templates_connect;
	}
	/* End Connecting With DB */

	/* Start With function to get title	*/
	function gettitle(){
		global $pagetitle;
	  $checktitle = isset($pagetitle) ? $pagetitle : "";
	  return $checktitle;
	}
	/* End With function to get title	*/
	/* require header.php */
	require $includes_php_files_static_templates . $includes_php_files_static_templates_header;
