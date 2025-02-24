<?php 
/*
 * Plugin Name:       Quick Permalink Flusher
 * Plugin URI:        https://https://github.com/habibnote/quick-permalink-flusher
 * Description:       This plugin for quick wordpress website quick permalink flusher
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Habib
 * Author URI:        https://me.habibnote.com
 * Text Domain:       qpf
*/

namespace QuickPermalinkFlusher;

if( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class Quick_Permalink_Flusher {
    static $instance = false;

    /**
     * Class Constructor
     */
    private function __construct() {
        
        $this->include();
        $this->define();
        $this->hooks();
    }

    /**
     * Include all files
     */
    private function include() {
        require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );
    }

    /**
     * Define all constant
    */
    private function define() {
        define( 'QPF', __FILE__ );
        define( 'QPF_DIR', dirname( QPF ) );
        define( 'QPF_ASSET', plugins_url( 'assets', QPF ) );
    }

    /**
     * All Hooks
    */
    private function hooks() {
        
        //kick off adminbar class
        new App\Adminbar();
    }

    /**
     * Singleton Instance
    */
    static function get_qpf() {
        
        if( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }


}

/**
 * Cick off the plugin
 */
Quick_Permalink_Flusher::get_qpf();