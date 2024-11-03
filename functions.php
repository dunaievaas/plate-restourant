<?php
if (! function_exists('plate_restaurant_setup')) {
    function plate_restaurant_setup() {
        add_theme_support('custom-logo', [
            'height'      => 60,
            'width'       => 155,
            'flex-width'  => false,
            'flex-height' => false,
            'header-text' => '',
            'unlink-homepage-logo' => false,
        ]);
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support('post_excerpt');

        //add menu location
        $locations =  array( 
            'left_menu' => __( 'Left Menu', 'plate-restaurant' ),
            'right_menu'  => __( 'Right Menu', 'plate-restaurant' ),
            'footer_menu'  => __( 'Footer Menu', 'plate-restaurant' ),
            
        );
        register_nav_menus( $locations );
    }
    add_action('after_setup_theme', 'plate_restaurant_setup');   
}

// Disable gutenberg
add_filter('use_block_editor_for_post_type', '__return_false');
add_filter( 'use_widgets_block_editor', '__return_false' );

// include styles and scripts
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'main_style', get_stylesheet_uri() );
    wp_enqueue_style( 'style.css', get_template_directory_uri() . '/build/css/style.css' );

    wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/9a00d6b11d.js', false, '6.5.2' );
    wp_enqueue_script( 'script.js', get_template_directory_uri() . '/build/js/script.js', false, '1.0.0' );
});

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

function gf_enqueue_required_files() {
    gravity_form_enqueue_scripts( get_field('contact_form', get_option('page_on_front')), true );
}
add_action( 'get_header', 'gf_enqueue_required_files' );
