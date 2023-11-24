<?php 

namespace QuickPermalinkFlusher\App;

/**
 * Cron job
 */
class Cron {

    /**
     * class constructor
     */
    function __construct() {
        register_activation_hook( QPF , [$this, 'qpf_activation_function'] );

        add_action( 'my_minute_event', [$this,'my_minute_event_callback'] );
    }

    /**
     * Execute cron job from here
     */
    function my_minute_event_callback() {

        $current_value = get_option( 'habib_option' ) ?? 1;

        if( $current_value ) {
            $current_value =+ 1;
        }

        update_option( 'habib_option', $current_value );
    }

    /**
     * Register cron scheduler
     */
    function qpf_activation_function() {
        if ( ! wp_next_scheduled( 'my_minute_event' ) ) {
            wp_schedule_event( time(), 'minute', 'my_minute_event' );
        }
    }
}