<?php
global $WCFM, $wp_query;

?>

<div class="collapse wcfm-collapse" id="wcfm_build_listing">

	<div class="wcfm-page-headig">
		<span class="fa fa-cubes"></span>
		<span class="wcfm-page-heading-text"><?php _e('Meetings', 'wcfm-custom-menus');?></span>
		<?php do_action('wcfm_page_heading');?>
	</div>
	<div class="wcfm-collapse-content">
		<div id="wcfm_page_load"></div>
		<?php do_action('before_wcfm_build');?>

		<div class="wcfm-container wcfm-top-element-container">
			<h2><?php _e('All Meetings Lists', 'wcfm-custom-menus');?></h2>

			<?php 
			$wc_knoiledge_add_new_meeting_url = add_query_arg( 'action', 'new', home_url('/store-manager/meetings/') );
			
			?>

			<a id="add_new_product_dashboard" class="add_new_wcfm_ele_dashboard t ext_tip" href="<?php echo esc_url( $wc_knoiledge_add_new_meeting_url);?>">
				<span class="wcfmfa fa-cube"></span><span class="text">Add New Meeting</span>
			</a>			
			<div class="wcfm-clearfix"></div>
	  </div>
	  <div class="wcfm-clearfix"></div><br />


		<div class="wcfm-container">
			<div id="wcfm_build_listing_expander" class="wcfm-content">

				<!---- Add Content Here ----->

                <button>All Meetings Lists</button>



                <?php
				var_dump($action);
				var_dump(home_url('/store-manager/meetings/'));
			?>





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