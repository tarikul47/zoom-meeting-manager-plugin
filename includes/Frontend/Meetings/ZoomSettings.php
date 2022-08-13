<?php
namespace Wecoder\Knoiledge\Frontend\Meetings;

/**
 * Meeting class
 * meeting content
 */

class ZoomSettings
{
    public function __construct()
    {
        $this->wc_knoiledege_settings_load_views();
    }

    /**
     * Zoom Api Setting template shows if not set 
     * Meeting views load
     */

    public function wc_knoiledege_settings_load_views()
    {

        $action = isset($_GET['action']) ? $_GET['action'] : 'zoom';

        switch ($action) {

            case 'new':
                $template = __DIR__ . '/views/wc_knoiledege_wcfm-new-meetings.php';
                break;

            case 'edit':
                $template = __DIR__ . '/views/wc_knoiledege_wcfm-edit-meetings.php';
                break;

            default:
                $template = __DIR__ . '/views/wc_knoiledege_wcfm-list-meetings.php';
                break;
        }

        if (file_exists($template)) {
            require_once $template;
        }

        // require_once __DIR__ . '/views/wcfm-views-meetings.php';

    }
}
