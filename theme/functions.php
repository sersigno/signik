<?php

// ***************************************
// Para tener una página de opciones del theme con ACF. Es necesario tenerlo al principio para que funcionen los scripts dinámicos
// ***************************************
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}


// ***************************************
// Includes
// ***************************************

// Frontend scripts y estilos
require_once(__DIR__ . '/includes/scripts.php');


// Customize Admin area: Lo uso para quitar elementos del menú en el dashboard
//require_once(__DIR__ . '/includes/customize_admin_area.php');

// Menús
require_once(__DIR__ . '/includes/menus.php');

// Sidebars
//require_once(__DIR__ . '/includes/sidebars.php');

// Custom functions
//require_once(__DIR__ . '/includes/custom_functions.php');

// Para customizar Woocommerce 
//require_once(__DIR__ . '/includes/customize_woocommerce.php');

// ACF related. Para que funcionen los módulos
require_once(__DIR__ . '/includes/modules_core.php');


// ***************************************
//Add Featured Image Support
// ***************************************
add_theme_support('post-thumbnails');



// ***************************************
// Clean up the <head>
// ***************************************
function removeHeadLinks()
{
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');



// ***************************************
// Límite de los excerpts
// ***************************************
function custom_excerpt_length($length)
{
    return 24;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);



// ***************************************
// Texto al final de los excerpts
// ***************************************
function new_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



// ***************************************
// Para que Gravity Forms muestre el campo de visibilidad de sus labels
// ***************************************
add_filter('gform_enable_field_label_visibility_settings', '__return_true');
