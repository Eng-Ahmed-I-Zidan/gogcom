<?php
	ob_start();
	$connectDB = "";
	$layout_html_css_mainFile = "cookiePage/Cookie_Policy_for_GOGcom.css";
	$layout_html_js_mainFile = "cookiePage/cookie.js";
	$pagetitle = "Privacy Policy";

  require 'includes-php-files/functions/title.php';
  require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_navbar;
?>

  <div class="sta_container wrapper content">
	<div class="mainTemplateHolder">
		<div class="nav-spacer"></div>
		<h1>Cookie Policy for GOG.com</h1>
		<h2>What Are Cookies</h2>
		<p>As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience. This page describes what information they gather, how we use it and why we sometimes need to store these cookies. We will also share how you can prevent these cookies from being stored however this may downgrade or 'break' certain elements of the sites functionality.</p>
		<p>For more general information on cookies see the <a href="">Wikipedia article on HTTP Cookies.</a></p>
		<!---->
		<h2>How We Use Cookies</h2>
		<p>We use cookies for a variety of reasons detailed below. Unfortunately is most cases there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site. It is recommended that you leave on all cookies if you are not sure whether you need them or not in case they are used to provide a service that you use.</p>
		<!---->
		<h2>Disabling Cookies</h2>
		<p>You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help for how to do this). Be aware that disabling cookies will affect the functionality of this and many other websites that you visit. Disabling cookies will usually result in also disabling certain functionality and features of the this site.</p>
		<!---->
		<h2>The Cookies We Set</h2>
		<p>In order to provide you with a great experience on this site we provide the functionality to set your preferences for how this site runs when you use it. In order to remember your preferences we need to set cookies so that this information can be called whenever you interact with a page is affected by your preferences.</p>
		<p>We use cookies when you are logged in so that we can remember this fact. This prevents you from having to log in every single time you visit a new page. These cookies are typically removed or cleared when you log out to ensure that you can only access restricted features and areas when logged in.</p>
		<p>This site offers e-commerce or payment facilities and some cookies are essential to ensure that your order is remembered between pages so that we can process it properly.</p>
		<!---->
		<h2>Third Party Cookies</h2>
		<p>In some special cases we also use cookies provided by trusted third parties. The following section details which third party cookies you might encounter through this site.</p>
		<p>This site uses Google Analytics which is one of the most widespread and trusted analytics solution on the web for helping us to understand how you use the site and ways that we can improve your experience. These cookies may track things such as how long you spend on the site and the pages that you visit so we can continue to produce engaging content.</p>
		<p>For more information on Google Analytics cookies, see the <a href="">official Google Analytics page.</a></p>
		<p>We also use social media buttons and/or plugins on this site that allow you to connect with your social network in various ways. For these to work the following social media sites including; <a href="">Facebook</a>, <a href="">Twitter</a>, <a href="">Google+</a>, will set cookies through our site which may be used to enhance your profile on their site or contribute to the data they hold for various purposes outlined in their respective privacy policies.</p>
		<!---->
		<h2>Ad Serving Technologies</h2>
		<p>his site may use targeting and advertising technologies such as web beacons and pixel tags to deliver relevant advertisements. These technologies collect information about your browsing habits across our site and how you use our services. Our advertising partners may use the information as outlined in their respective privacy policies. We currently use the following ad serving technologies: (i) Facebook Pixel; and (ii) AdRoll Pixel. You can opt out of use of these technologies (which means you may see less relevant advertisements).</p>
		<!---->
		<h2>More Information</h2>
		<p>Hopefully that has clarified things for you and as was previously mentioned if there is something that you aren't sure whether you need or not it's usually safer to leave cookies enabled in case it does interact with one of the features you use on our site. However if you are still looking for more information then you can <a href="">contact us.</a></p>
	</div>
  </div>

	<!-- iframe signin gogcom -->
	<?php require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_navbar_signIN_gog; ?>
	<!-- iframe signin gogcom -->
<?php
  require $includes_php_files_static_templates . $includes_php_files_static_templates_gog_com_footer;
  require 'includes-php-files/static-templates/' . $includes_php_files_static_templates_footer;
?>
<?php ob_end_flush(); ?>
