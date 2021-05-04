
<?php

	/* Start With anothor folder have many pages */
	$gog_com = "gog_com/";
	$gog_com_Cookie_Policy_for_GOGcom = "Cookie.php";

	$gog_galaxy = "gog_galaxy/";
	$cd_projekt = "cd_projekt/";

	/* Start With variables [includes-php-files] to get file easy */
	$includes_php_files_functions = "includes-php-files/functions/";
	$includes_php_files_functions_title = "title.php";

	$includes_php_files_languages = "includes-php-files/languages/";
	$includes_php_files_languages_en = "en.php";
	$includes_php_files_languages_de = "de.php";
	$includes_php_files_languages_fr = "fr.php";
	$includes_php_files_languages_pl = "pl.php";
	$includes_php_files_languages_ru = "ru.php";
	$includes_php_files_languages_zhcn = "zh-cn.php";

	$includes_php_files_static_templates = "includes-php-files/static-templates/";
	$includes_php_files_static_templates_header = "header.php";
	$includes_php_files_static_templates_footer = "footer.php";
	$includes_php_files_static_templates_connect = "connect.php";
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

	$layout_html_images = "layout-html/images/";
	/* End With variables [layout-html] to get file easy */

	/* Start Connecting With DB */
	if(isset($connectDB)){
		require $includes_php_files_static_templates . $includes_php_files_static_templates_connect;
	}
	/* End Connecting With DB */

	/* Start With DB Tables And Columns With functions [gog_lang] */
	// intilization table of lang and column
	$gog_lang = "gog_lang";
	$gog_lang_item = "gog_lang_gogGalaxy2AllYourGameInOnePlace";

	// select [] from gog_lang
	$statement = $connect->prepare("SELECT $gog_lang_item FROM $gog_lang");
  $statement->execute();
  $fetchLanguage = $statement->fetch();

	// if coulmn in gog_lang empty update to [en]
	if($fetchLanguage[$gog_lang_item] == ""):
		$statement = $connect->prepare("UPDATE $gog_lang SET $gog_lang_item = ?");
		$statement->execute(array('en'));
		header('location: ?lang=en');
	endif;

	// if Lang NOt Found In Link Of Website Put It by Database original Value
	if(!isset($_GET['lang'])): header('location: ?lang='. $fetchLanguage[$gog_lang_item]); endif;

	// Get Lang From Link If Found If Not Put Value From DB
	$languagePostInLink = isset($_GET['lang']) ? $languagePostInLink = $_GET['lang'] : $fetchLanguage[$gog_lang_item];

	// if realy value in database not equal value in link that user change put realy and not care
	if($fetchLanguage[$gog_lang_item] != $languagePostInLink): header('location: ?lang='. $fetchLanguage[$gog_lang_item]); endif;

	// require language files
	require $includes_php_files_languages . $fetchLanguage[$gog_lang_item] . '.php';

	/* End With DB Tables And Columns With functions [gog_lang] */

	/* Start With function to get title	*/
	function gettitle(){
	  $checktitle = language_en_de_pl_fr_ru_zhcn('Pagetitle');
	  return $checktitle;
	}
	/* End With function to get title	*/
	/* require header.php */
	require $includes_php_files_static_templates . $includes_php_files_static_templates_header;
