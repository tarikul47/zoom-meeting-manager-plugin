<?php
namespace Wecoder\Knoiledge;

/**
 * Assets handlers class
 */
class Assets {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'knoiledge-script' => [
                'src'     => WC_KNOILEDGE_ASSETS . '/js/wcfm-script-build.js',
                'version' => filemtime( WC_KNOILEDGE_PATH . '/assets/js/wcfm-script-build.js' ),
                'deps'    => [ 'jquery' ]
            ],
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {
        return [
            'knoiledge-style' => [
                'src'     => WC_KNOILEDGE_ASSETS . '/css/wcfm-style-build.css',
                'version' => filemtime( WC_KNOILEDGE_PATH . '/assets/css/wcfm-style-build.css' )
            ],
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, $style['version'] );
        }

        // wp_localize_script( 'academy-enquiry-script', 'weDevsAcademy', [
        //     'ajaxurl' => admin_url( 'admin-ajax.php' ),
        //     'error'   => __( 'Something went wrong', 'wedevs-academy' ),
        // ] );

        // wp_localize_script( 'academy-admin-script', 'weDevsAcademy', [
        //     'nonce' => wp_create_nonce( 'wd-ac-admin-nonce' ),
        //     'confirm' => __( 'Are you sure?', 'wedevs-academy' ),
        //     'error' => __( 'Something went wrong', 'wedevs-academy' ),
        // ] );
    }
}