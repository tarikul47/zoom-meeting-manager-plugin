<?php

namespace Wecoder\Knoiledge\Frontend;
use Wecoder\Knoiledge\Knoiledge_Zoom;

/**
 * Wcfm custom menu class
 */

class Menu
{
    public function __construct()
    {
        //echo "----------- Our Menu class -------------";

        // filter hook
        add_filter('wcfm_query_vars', [$this, 'wc_knoiledege_wcfmcsm_query_vars'], 50);
        add_filter('wcfm_endpoint_title', [$this, 'wc_knoiledege_wcfmcsm_endpoint_title'], 50, 2);
        add_filter('wcfm_endpoints_slug', [$this, 'wc_knoiledege_wcfm_custom_menus_endpoints_slug']);
        add_filter('wcfm_menus', [$this, 'wc_knoiledege_wcfmcsm_wcfm_menus'], 20);

        // action hook
        add_action('init', [$this, 'wc_knoiledege_wcfmcsm_init'], 50);
        add_action('wcfm_load_views', [$this, 'wc_knoiledege_wcfm_csm_load_views'], 50);
        add_action('before_wcfm_load_views', [$this, 'wc_knoiledege_wcfm_csm_load_views'], 50);
        add_action('wcfm_load_scripts', [$this, 'wc_knoiledege_wcfm_csm_load_scripts']);
        add_action('after_wcfm_load_scripts', [$this, 'wc_knoiledege_wcfm_csm_load_scripts']);
        add_action('wcfm_load_styles', [$this, 'wc_knoiledege_wcfm_csm_load_styles']);
        add_action('after_wcfm_load_styles', [$this, 'wc_knoiledege_wcfm_csm_load_styles']);
        //add_action('after_wcfm_ajax_controller', [$this, 'wc_knoiledege_wcfm_csm_ajax_controller']);

    }

    /**
     * WCFM - Custom Menus Query Var
     */
    public function wc_knoiledege_wcfmcsm_query_vars($query_vars)
    {
        $wcfm_modified_endpoints = (array) get_option('wcfm_endpoints');

        $query_custom_menus_vars = array(
            'wcfm-meetings' => !empty($wcfm_modified_endpoints['wcfm-meetings']) ? $wcfm_modified_endpoints['wcfm-meetings'] : 'meetings',
        );
        $query_vars = array_merge($query_vars, $query_custom_menus_vars);
        return $query_vars;
    }

    /**
     * WCFM - Custom Menus End Point Title
     */
    public function wc_knoiledege_wcfmcsm_endpoint_title($title, $endpoint)
    {
        global $wp;
        switch ($endpoint) {
            case 'wcfm-meetings':
                $title = __('Meetings', 'wcfm-custom-menus');
                break;
        }
        return $title;
    }

    /**
     * WCFM - Custom Menus Endpoint Intialize
     */
    public function wc_knoiledege_wcfmcsm_init()
    {
        global $WCFM_Query;

        // Intialize WCFM End points
        $WCFM_Query->init_query_vars();
        $WCFM_Query->add_endpoints();

        if (!get_option('wcfm_updated_end_point_cms')) {
            // Flush rules after endpoint update
            flush_rewrite_rules();
            update_option('wcfm_updated_end_point_cms', 1);
        }
    }

    /**
     * WCFM - Custom Menus Endpoiint Edit
     */
    public function wc_knoiledege_wcfm_custom_menus_endpoints_slug($endpoints)
    {

        $custom_menus_endpoints = array(
            'wcfm-meetings' => 'meetings',
        );
        $endpoints = array_merge($endpoints, $custom_menus_endpoints);
        return $endpoints;
    }

    /**
     * WCFM - Custom Menus
     */
    public function wc_knoiledege_wcfmcsm_wcfm_menus($menus)
    {
        global $WCFM;

        $custom_menus = array(
            'wcfm-meetings' => array(
                'label' => __('Meetings', 'wcfm-custom-menus'),
                'url' => get_wcfm_custom_menus_url('wcfm-meetings'),
                'icon' => 'cubes',
                'priority' => 5.6,
            ),
        );
        $menus = array_merge($menus, $custom_menus);
        return $menus;
    }

    /**
     *  WCFM - Custom Menus Views
     */
    public function wc_knoiledege_wcfm_csm_load_views($end_point)
    {
        global $WCFM, $WCFMu;
        $plugin_path = trailingslashit(dirname(__FILE__));
        //var_dump($plugin_path);

        switch ($end_point) {
            case 'wcfm-meetings':
                $zoom = new Knoiledge_Zoom();
                new Meetings\Meetings($zoom);
                //require_once __DIR__ . '/views/wcfm-views-meetings.php';
                break;
        }
    }

    // Custom Load WCFM Scripts
    public function wc_knoiledege_wcfm_csm_load_scripts($end_point)
    {
        global $WCFM;
        switch ($end_point) {
            case 'wcfm-meetings':
                wp_enqueue_script('knoiledge-script');
                break;
        }
    }

    // Custom Load WCFM Styles
    public function wc_knoiledege_wcfm_csm_load_styles($end_point)
    {
        global $WCFM, $WCFMu;
        switch ($end_point) {
            case 'wcfm-meetings':
                wp_enqueue_style('knoiledge-style');
                break;
        }
    }
}
