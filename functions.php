<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

/*
* Register frontend javascripts:
*/
if(!function_exists('avia_frontend_js'))
{
if(!is_admin()){
add_action('wp_enqueue_scripts', 'avia_register_frontend_scripts');
}

function avia_register_frontend_scripts()
{
$template_url = get_template_directory_uri();
$child_theme_url = get_stylesheet_directory_uri();

//register js
wp_register_script( 'avia-compat', $template_url.'/js/avia-compat.js', array('jquery'), 1, false ); //needs to be loaded at the top to prevent bugs
wp_register_script( 'avia-default', $template_url.'/js/avia.js', array('jquery'), 1, true );
wp_register_script( 'avia-shortcodes', $template_url.'/js/shortcodes.js', array('jquery'), 1, true );
wp_register_script( 'avia-prettyPhoto',  $template_url.'/js/prettyPhoto/js/jquery.prettyPhoto.js', 'jquery', "3.1.5", true);
wp_register_script( 'avia-html5-video',  $template_url.'/js/mediaelement/mediaelement-and-player.min.js', 'jquery', "1", true);

wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'avia-compat' );
wp_enqueue_script( 'avia-default' );
wp_enqueue_script( 'avia-shortcodes' );
wp_enqueue_script( 'avia-prettyPhoto' );
wp_enqueue_script( 'avia-html5-video' );

if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }

//register styles
wp_register_style( 'avia-style' ,  $child_theme_url."/style.css", array(), '1', 'screen' ); //register default style.css file. only include in childthemes. has no purpose in main theme
wp_register_style( 'avia-grid' ,   $template_url."/css/grid.css", array(), '1', 'screen' );
wp_register_style( 'avia-base' ,   $template_url."/css/base.css", array(), '1', 'screen' );
wp_register_style( 'avia-layout',  $template_url."/css/layout.css", array(), '1', 'screen' );
wp_register_style( 'avia-scs',     $template_url."/css/shortcodes.css", array(), '1', 'screen' );
wp_register_style( 'avia-custom',  $template_url."/css/custom.css", array(), '1', 'screen' );
wp_register_style( 'avia-prettyP', $template_url."/js/prettyPhoto/css/prettyPhoto.css", array(), '1', 'screen' );
wp_register_style( 'avia-media'  , $template_url."/js/mediaelement/skin-1/mediaelementplayer.css", array(), '1', 'screen' );

wp_enqueue_style( 'avia-grid');
wp_enqueue_style( 'avia-base');
wp_enqueue_style( 'avia-layout');
wp_enqueue_style( 'avia-scs');
wp_enqueue_style( 'avia-prettyP');
wp_enqueue_style( 'avia-media');

//register styles
if($child_theme_url !=  $template_url)
{
wp_enqueue_style( 'avia-style');
}

global $avia;
$safe_name = avia_backend_safe_string($avia->base_data['prefix']);

if( get_option('avia_stylesheet_exists'.$safe_name) == 'true' )
{
$avia_upload_dir = wp_upload_dir();

$avia_dyn_stylesheet_url = $avia_upload_dir['baseurl'] . '/dynamic_avia/'.$safe_name.'.css';
wp_register_style( 'avia-dynamic', $avia_dyn_stylesheet_url, array(), '1', 'screen' );
wp_enqueue_style( 'avia-dynamic');
}

wp_enqueue_style( 'avia-custom');

}
}