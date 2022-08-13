<div class="wcfm-container wcfm-top-element-container">
    <h2><?php _e('All Meetings Lists', 'wcfm-custom-menus'); ?></h2>

    <?php
    $wc_knoiledge_add_new_meeting_url = add_query_arg('action', 'new', home_url('/store-manager/meetings/'));
    $wc_knoiledge_zoom_set_api = add_query_arg('action', 'set-api', home_url('/store-manager/meetings/'));
    $wc_knoiledge_zoom_settings = add_query_arg('action', 'settings', home_url('/store-manager/meetings/'));
    $wc_knoiledge_zoom_expired_meeting = add_query_arg('action', 'expired', home_url('/store-manager/meetings/'));
    $wc_knoiledge_zoom_active_meeting = add_query_arg('action', 'active', home_url('/store-manager/meetings/'));

    ?>
    <?php if (we_knolidege_zoom_check_api_connection()) { ?>
        <a id="add_new_product_dashboard" class="add_new_wcfm_ele_dashboard t ext_tip" href="<?php echo esc_url($wc_knoiledge_add_new_meeting_url); ?>">
            <span class="wcfmfa fa-cube"></span><span class="text">Add New Meeting</span>
        </a>
        <a id="add_new_product_dashboard" class="add_new_wcfm_ele_dashboard t ext_tip" href="<?php echo esc_url($wc_knoiledge_zoom_active_meeting); ?>">
            <span class="wcfmfa fa-cube"></span><span class="text">Active Meeting</span>
        </a>
        <a id="add_new_product_dashboard" class="add_new_wcfm_ele_dashboard t ext_tip" href="<?php echo esc_url($wc_knoiledge_zoom_expired_meeting); ?>">
            <span class="wcfmfa fa-cube"></span><span class="text">Expired Meeting</span>
        </a>
        <a id="add_new_product_dashboard" class="add_new_wcfm_ele_dashboard t ext_tip" href="<?php echo esc_url($wc_knoiledge_zoom_settings); ?>">
            <span class="wcfmfa fa-cube"></span><span class="text">Zoom Settings</span>
        </a>
    <?php } ?>
    <a id="add_new_product_dashboard" class="add_new_wcfm_ele_dashboard t ext_tip" href="<?php echo esc_url($wc_knoiledge_zoom_set_api); ?>">
        <span class="wcfmfa fa-cube"></span><span class="text">Set API</span>
    </a>

    <div class="wcfm-clearfix"></div>
</div>