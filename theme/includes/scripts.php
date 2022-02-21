<?php
function my_scripts()
{
    if (!is_admin()) {
        wp_enqueue_script('glide', 'https://cdn.jsdelivr.net/npm/@glidejs/glide', array(), null, true);
        wp_enqueue_script('mainJs', get_template_directory_uri() . '/main.js', array('glide'), null, true);
        wp_enqueue_style('mainStyle', get_template_directory_uri() . '/style.css');
    }
}
add_action('wp_enqueue_scripts', 'my_scripts');
