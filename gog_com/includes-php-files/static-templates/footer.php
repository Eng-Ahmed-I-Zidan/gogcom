
		<!-- Bootstrap File And HomePage File -->
		<script src="<?php echo $layout_html_js . $layout_html_js_bootstrap_min ?>"></script>
		<script src="<?php echo $layout_html_js . $layout_html_js_font_awesome_min ?>"></script>

		<?php if(isset($layout_html_js_mainFile_navbar)): ?>
			<script src="<?php echo $layout_html_js . $layout_html_js_mainFile_navbar ?>"></script>
		<?php endif; ?>

		<!-- For all games -->
		<?php if(isset($layout_html_js_allgames_staticStyle)): ?>
			<script src="<?php echo $layout_html_js . $layout_html_js_allgames_staticStyle ?>"></script>
		<?php endif; ?>

		<script src="<?php echo $layout_html_js . $layout_html_js_mainFile ?>"></script>

	</body>
</html>
