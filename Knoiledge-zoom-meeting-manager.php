<?php
/**
 * Plugin Name: Knoiledge Zoom Meeting Manager
 * Description: Video meeting manager
 * Plugin URI: https://onlytarikul.info
 * Author: Tarikul Islam
 * Author URI: https://onlytarikul.info
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}

// Exit if WCFM not installed
if (!class_exists('WCFM')) {
   // return;
}


require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */

final class Wecoder_Knoiledge
{

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * class constructor
     */
    private function __construct()
    {
        //echo "--------------- Our Main Class ---------------";
        $this->define_constants();
        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('WC_KNOILEDGE_VERSION', self::version);
        define('WC_KNOILEDGE_FILE', __FILE__);
        define('WC_KNOILEDGE_PATH', __DIR__);
        define('WC_KNOILEDGE_URL', plugins_url('', WC_KNOILEDGE_FILE));
        define('WC_KNOILEDGE_ASSETS', WC_KNOILEDGE_URL . '/assets');
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {

        new Wecoder\Knoiledge\Assets();

        if ( is_admin() ) {
           // new WeDevs\Academy\Admin();
        } else {
            new Wecoder\Knoiledge\Frontend\Menu();
        }

    }

    /**
     * Initializes a singleton instance
     *
     * @return Wecoder\Knoiledge
     */
    public function init()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
        return $instance;
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installed = get_option( 'wc_knoiledege_installed' );

        if ( ! $installed ) {
            update_option( 'wc_knoiledege_installed', time() );
        }

        update_option( 'wd_academy_version', WD_ACADEMY_VERSION );
    }
}

/**
 * Initializes the main plugin
 */
function wecoder_knoiledge()
{
    return Wecoder_Knoiledge::init();
}

// kick of the plugin
wecoder_knoiledge();
