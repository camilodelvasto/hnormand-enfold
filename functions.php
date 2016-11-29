<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

add_action( 'wp_enqueue_scripts', 'wp_enqueue_scripts_mod', 20 );

function wp_enqueue_scripts_mod() {
    
    wp_dequeue_style( 'avia-child' );
    wp_deregister_style( 'avia-child' );

    wp_register_style( 'new-child-style', get_stylesheet_directory_uri() . '/new.css', false, '1.0.0' ); 
    wp_enqueue_style( 'new-child-style' );

}