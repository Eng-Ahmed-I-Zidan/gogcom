<!DOCTYPE html>
<html>
	<head lang="en">
    <meta  charset="UTF-8"/>

    <!-- Meta To Amobile To Responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tht Title Of Page -->
    <title><?php echo gettitle(); ?></title>

    <!-- Bootstrap File Extention [Css] -->
    <link rel="stylesheet" href="<?php echo $layout_html_css . $layout_html_css_bootstrap_min; ?>" />

		<!-- Font Icons Library When You Zoom The Page The Images Still Useful And Good -->
    <link rel="stylesheet" href="<?php echo $layout_html_css . $layout_html_css_font_awesome_min; ?>"/>

    <!-- Make Your Page Is Very Good And Solve Problem Of [ font, padding, margin ] -->
    <link rel="stylesheet" href="<?php echo $layout_html_css . $layout_html_css_normalize; ?>"/>

		<!-- sign in  -->
		<?php if(isset($layout_html_css_mainFile_navbar_signIN_gog)): ?> <link rel="stylesheet" href="<?php echo $layout_html_css . $layout_html_css_mainFile_navbar_signIN_gog; ?>"/> <?php endif; ?>

		<!-- navbar -->
		<?php if(isset($layout_html_css_mainFile_navbar)): ?> <link rel="stylesheet" href="<?php echo $layout_html_css . $layout_html_css_mainFile_navbar; ?>"/> <?php endif; ?>

		<!-- static For Allgames -->
		<?php if(isset($layout_html_css_allgames_staticStyle)): ?> <link rel="stylesheet" href="<?php echo $layout_html_css . $layout_html_css_allgames_staticStyle; ?>"/> <?php endif; ?>

    <!-- Your File Code -->
    <link rel="stylesheet" href="<?php echo $layout_html_css . $layout_html_css_mainFile; ?>"/>

		<!-- static For Allgames -->
		<?php if(isset($allgamedivStyleSheet)): ?> <link rel="stylesheet" href="<?php echo $layout_html_css . $allgamedivStyleSheet_css; ?>"/> <?php endif; ?>

		<!-- footer -->
		<?php if(isset($layout_html_css_mainFile_footer)): ?> <link rel="stylesheet" href="<?php echo $layout_html_css . $layout_html_css_mainFile_footer; ?>"/> <?php endif; ?>

		<link href="https://fonts.googleapis.com/css2?family=Bellota:wght@300;400;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Some Words Internet Explorer Didn't Understand That To Solve It ==> Use This Links -->
    <!--[if lt IE 9]>
       <script src="Js/html5shiv.min.js"></script>
    <![endif]-->

		<!-- Jquery File -->
		<script src="<?php echo $layout_html_js . $layout_html_js_jquery_min ?>"></script>

		<!-- vue -->
		<script src="<?php echo $layout_html_js . $layout_html_js_vue ?>"></script>
		<script src="<?php echo $layout_html_js . $layout_html_js_axios_min ?>"></script>

	</head>
	<body onunload=location.reload()>
