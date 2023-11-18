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
        add_action( 'wp_before_admin_bar_render', [$this, 'qpf_add_adminbar_menu'] );
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
                    'title'   => __('Reset Permalinks'),
                    'onclick' => 'qpf_rewrite_rules(); return false;',
                ),
            )
        );
    }
}