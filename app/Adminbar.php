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
        add_action( 'wp_enqueue_scripts', [$this, 'qpf_load_assets'] );
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

    /**
     * Load assets
     */
    function qpf_load_assets() {
        ?>
            <script type="text/javascript">

                function qpf_rewrite_rules() {
                    jQuery.post(ajaxurl, {

                        action: 'qpf_flush_rules',
                        _wpnonce: '<?php echo wp_create_nonce('qpf_flush_rules_nonce'); ?>',

                    }, function(response) {

                        if (response.success) {
                            alert('Permalink reset successfully!');
                        } else {
                            alert('Failed to reset permalink. Please try again');
                        }
                    });
                }
                
            </script>
        <?php
    }
}