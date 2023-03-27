<?php
defined('ABSPATH') OR exit;
/****
 * Plugin Name: Sample plugin for wordpress
 * Description: This is the description that will show up in wordpress
 * Version: 0.1.0
 * Author: Author
 ****/

// SOME UTILITY FUNCTIONS FOR POKING AROUND WORDPRESS

// THIS WILL PRINT DATA TO YOUR SCREEN This is a wrapper for print_r to make output more readable
function print_rr( $array, $str_color = 'red', $int_size = 12, $title = null ){
    if( current_user_can('administrator') ) {
        if($title){
            echo '<h2>' . $title . '</h2>';
        }
        echo '<pre style="z-index:999; color:' . $str_color . '; font-size: ' . $int_size . 'px;">';
        print_r( $array );
        echo '</pre>';
    }
}

// WRAPPER FOR JAVASCRIPT ALERT
function alert( $str ){
    if( current_user_can('administrator') ) {
        ?> <script type="text/javascript">alert( '<?php echo $str ?>' );</script> <?php
    }
}

// WRAPPER FOR JAVASCRIPT CONSOLE LOG
function c_log( $str ){
    if( current_user_can('administrator') ) {
        ?> <script type="text/javascript">console.log( '<?php echo $str ?>' );</script> <?php
    }
}

//include Javascript and css NOTE plugin_dir_url
function igl_enqueue_additional_scripts() {
    wp_enqueue_script( 'custom-javascript', plugin_dir_url(__FILE__) . 'includes/js/custom-javascript.js', true );
    wp_enqueue_style( 'custom-css', plugin_dir_url(__FILE__) . 'includes/css/custom-css.css' );
}

add_action( 'wp_enqueue_scripts', 'igl_enqueue_additional_scripts', 99 );



