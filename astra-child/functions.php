<?php
// Your code to enqueue parent theme styles
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
   wp_enqueue_style('main', get_stylesheet_directory_uri() . './css/main.css', array(), '1.1');
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );


?>
