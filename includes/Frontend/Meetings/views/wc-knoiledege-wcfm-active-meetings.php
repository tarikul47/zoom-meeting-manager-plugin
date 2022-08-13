<?php
global $WCFM, $wp_query;

?>

<div class="collapse wcfm-collapse" id="wcfm_build_listing">

	<div class="wcfm-page-headig">
		<span class="fa fa-cubes"></span>
		<span class="wcfm-page-heading-text"><?php _e('Meetings', 'wcfm-custom-menus'); ?></span>
		<?php do_action('wcfm_page_heading'); ?>
	</div>
	<div class="wcfm-collapse-content">
		<div id="wcfm_page_load"></div>
		<?php do_action('before_wcfm_build'); ?>

		<?php include __DIR__ . '/common/tab.php';?>

		<div class="wcfm-clearfix"></div><br />

		<div class="wcfm-container">
			<div id="wcfm_build_listing_expander" class="wcfm-content">

				<!---- Add Content Here ----->

			<h1>Active Meetings</h1>


				<div class="wcfm-clearfix"></div>
			</div>
			<div class="wcfm-clearfix"></div>
		</div>

		<div class="wcfm-clearfix"></div>
		<?php
		do_action('after_wcfm_build');
		?>
	</div>
</div>