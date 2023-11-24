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

        add_filter( 'cron_schedules', [$this,'qpf_custom_cron_intervals'] );

        add_action( 'qpf_daily', [$this,'qpf_event_everyday_callback'] );
    }

    /**
     * register cron schedules
     */
    function qpf_custom_cron_intervals( $schedules ) {
		$schedules['daily'] = array(
			'interval' => 24*60*60,
			'display'  => __( 'Every day', 'qpf' ),
		);
		return $schedules;
	}

    /**
     * Execute cron job from here
     */
    function qpf_event_everyday_callback() {

        //flush the permalink
        flush_rewrite_rules();
    }

    /**
     * Register cron scheduler event
     */
    function qpf_activation_function() {

        if ( ! wp_next_scheduled( 'qpf_daily' ) ) {
            wp_schedule_event( time(), 'daily', 'qpf_daily' );
        }
    }
}