<?php 

namespace QuickPermalinkFlusher\App;

/**
 * Adminbar class
 */
class Adminbar {

    /**
     * Class Constructor
     */
    function __construct() {

        //register admin menubar
        add_action( 'wp_before_admin_bar_render', [$this, 'qpf_add_adminbar_menu'] );

        //load all assets
        add_action( 'wp_enqueue_scripts', [$this, 'qpf_load_assets'] );
        add_action( 'admin_enqueue_scripts', [$this, 'qpf_load_assets'] );

        //process ajax request
        add_action( 'wp_ajax_qpf_flush_rules', [$this, 'qpf_ajax_flusher'] );
    }

    /**
     * Add adminbar menu
     */
    function qpf_add_adminbar_menu() {
        global $wp_admin_bar;

        // Add a menu item
        $wp_admin_bar->add_menu(
            array(
                'id'    => 'reset-permalinks',
                'title' => 'Reset Permalinks',
                'href'  => '#',
                'meta'  => array(
                    'title'   => __( 'Reset Permalinks', 'quick-permalink-flusher' ),
                    'onclick' => 'qpf_rewrite_rules(); return false',
                ),
            )
        );
    }

    /**
     * Load assets
     */
    function qpf_load_assets() {

        // Enqueue your script
        wp_enqueue_script( 'qpf-scritp', QPF_ASSET . '/js/script.js', array( 'jquery' ), '0.0.1', true );

        // Pass Ajax URL to script
        $admin_url =  admin_url( 'admin-ajax.php' );
        wp_localize_script( 'qpf-scritp', 'QPF_ajax_url', array( 
            'url'   => $admin_url,
            'nonce' => wp_create_nonce( 'qpf_nonce' )
         ));
    }

    /**
     * Processed ajax request
     */
    function qpf_ajax_flusher() {
        // Check the nonce
        if ( isset( $_POST['_nonce'] ) ) {
            $nonce = sanitize_text_field( wp_unslash( $_POST['_nonce'] ) );
    
            // Verify the nonce
            if( wp_verify_nonce( $nonce, 'qpf_nonce' ) ) {
                // Flush the permalinks
                flush_rewrite_rules();
        
                wp_send_json_success();
            } else {
                wp_send_json_error( array( 'message' => 'Nonce verification failed' ) );
            }
        } else {
            wp_send_json_error( array( 'message' => 'Nonce is missing' ) );
        }
    }
}