<?php
if (!function_exists('get_wcfm_custom_menus_url')) {
    function get_wcfm_custom_menus_url($endpoint)
    {
        global $WCFM;
        $wcfm_page = get_wcfm_page();
        $wcfm_custom_menus_url = wcfm_get_endpoint_url($endpoint, '', $wcfm_page);
        return $wcfm_custom_menus_url;
    }
}

if (!function_exists('we_knolidege_zoom_check_api_connection')) {
    function we_knolidege_zoom_check_api_connection()
    {
        $user_id    = get_current_user_id();
        $settings   = json_decode(get_user_meta($user_id, 'tutor_zoom_api', true), true);
        $api_key    = (!empty($settings['api_key'])) ? $settings['api_key'] : '';
        $api_secret = (!empty($settings['api_secret'])) ? $settings['api_secret'] : '';

        return ($api_key && $api_secret);
    }
}
