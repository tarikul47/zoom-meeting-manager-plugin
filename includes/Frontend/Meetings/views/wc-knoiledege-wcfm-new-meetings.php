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

		<div class="wcfm-container wcfm-top-element-container">
			<h2><?php _e('Add New Meetings', 'wcfm-custom-menus'); ?></h2>
			<?php
			$wc_knoiledge_add_new_meeting_url = add_query_arg('action', 'active', home_url('/store-manager/meetings/'));
			?>
			<a id="add_new_product_dashboard" class="add_new_wcfm_ele_dashboard t ext_tip" href="<?php echo esc_url($wc_knoiledge_add_new_meeting_url); ?>">
				<span class="wcfmfa fa-cube"></span><span class="text">Active Meetings</span>
			</a>
			<div class="wcfm-clearfix"></div>
		</div>
		<div class="wcfm-clearfix"></div><br />


		<div class="wcfm-container">
			<div id="wcfm_build_listing_expander" class="wcfm-content">

				<!---- Add Content Here ----->
				<?php //var_dump($action); 
				?>

				<div class="form-group">
					<p class="meeting_title wcfm_title"><strong>Meeting Name</strong></p>
					<label class="screen-reader-text" for="meeting_name">Meeting Name</label>
					<input type="text" id="meeting_name" name="meeting_name" class="wcfm-text" value="" placeholder="">
				</div>

				<div class="form-group">
					<p class="meeting_title wcfm_title"><strong>Meeting Summary</strong></p>
					<label class="screen-reader-text" for="meeting_summary">Meeting Summary</label>
					<input type="text" id="meeting_summary" name="meeting_summary" class="wcfm-text" value="" placeholder="">
				</div>

				<div class="form-group">
					<p class="meeting_title wcfm_title"><strong>Meeting Time</strong></p>
					<label class="screen-reader-text" for="meeting_time">Meeting Time</label>
					<input type="text" class="timepicker timepicker-with-dropdown text-center wcfm-text" id="meeting_time" name="meeting_time" value="" placeholder="">
					<button id="setTimeButton">Set current time</button>
				</div>

				<div class="form-group">
					<p class="meeting_title wcfm_title"><strong>Meeting Duration</strong></p>
					<label class="screen-reader-text" for="meeting_duration">Meeting Duration</label>
					<input type="text" id="meeting_title" name="meeting_duration" class="wcfm-text" value="" placeholder="">
				</div>

				<div class="form-group">
					<p class="meeting_title wcfm_title"><strong>Time Zone</strong></p>
					<label class="screen-reader-text" for="meeting_title">Time Zone</label>
					<select id="timezone-select">
						<option>Option 1</option>
						<option>Option 2</option>
						<option>Option 3</option>
					</select>
				</div>

				<div class="form-group">
					<p class="meeting_title wcfm_title"><strong>Auto Recording</strong></p>
					<label class="screen-reader-text" for="meeting_title">Auto Recording</label>
					<input type="text" id="meeting_title" name="meeting_title" class="wcfm-text" value="" placeholder="">
				</div>

				<div class="form-group">
					<p class="meeting_title wcfm_title"><strong>Password</strong></p>
					<label class="screen-reader-text" for="meeting_title">Password</label>
					<input type="password" id="meeting_title" name="meeting_title" class="wcfm-text" value="" placeholder="">
				</div>

				<div class="form-group">
					<p class="meeting_title wcfm_title"><strong>Meeting Host</strong></p>
					<label class="screen-reader-text" for="meeting_host">Meeting Host</label>
					<input readonly type="text" id="meeting_host" name="meeting_host" class="wcfm-text" value="" placeholder="">
				</div>
				<div class="form-group">
					<input type="submit" id="meeting_host" name="meeting_host" class="wcfm-text" value="Submit">
				</div>

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