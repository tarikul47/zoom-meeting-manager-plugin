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
