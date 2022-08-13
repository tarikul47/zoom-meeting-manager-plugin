<?php

namespace Wecoder\Knoiledge\Frontend\Meetings;

use Wecoder\Knoiledge\Traits\Form_Error;

/**
 * Meeting class
 * meeting content
 */

class Meetings
{
    public $zoom;

    use Form_Error;

    public function __construct($zoom)
    {
        $this->zoom = $zoom;
        $this->wc_knoiledege_meetings_load_views();
    }

    /**
     * Zoom Api Setting template shows if not set 
     * Meeting views load
     */

    public function wc_knoiledege_meetings_load_views()
    {

        $action = isset($_GET['action']) ? $_GET['action'] : 'active';

        switch ($action) {

            case 'set-api':
                $template = __DIR__ . '/views/wc-knoiledege-wcfm-zoom-set-api.php';
                break;

            case 'expired':
                if (we_knolidege_zoom_check_api_connection()) {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-expired-meetings.php';
                } else {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-zoom-set-api.php';
                }
                break;

            case 'settings':
                if (we_knolidege_zoom_check_api_connection()) {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-zoom-settings.php';
                } else {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-zoom-set-api.php';
                }
                break;

            case 'new':
                if (we_knolidege_zoom_check_api_connection()) {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-new-meetings.php';
                } else {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-zoom-set-api.php';
                }
                break;

            case 'edit':
                if (we_knolidege_zoom_check_api_connection()) {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-edit-meetings.php';
                } else {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-zoom-set-api.php';
                }
                break;

            default:
                if (we_knolidege_zoom_check_api_connection()) {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-active-meetings.php';
                } else {
                    $template = __DIR__ . '/views/wc-knoiledege-wcfm-zoom-set-api.php';
                }
                break;
        }

        if (file_exists($template)) {
            require_once $template;
        }

        // require_once __DIR__ . '/views/wcfm-views-meetings.php';

    }
}
