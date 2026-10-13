<?php

function theme_front_scripts()
{
    wp_enqueue_script('jquery');

    $version = get_theme_cache_version();

    wp_enqueue_script('custom-js', THEME_JS . 'custom.min.js', array('jquery'), $version, true);

    if (!is_page_template('page-home.php') && !is_page_template('page-contact.php')) {
        wp_enqueue_script('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), '5.0', true);
    }

    $customParams = array(
        'ADMIN_AJAX_URL' => admin_url('admin-ajax.php'),
        'SOCIAL_MEDIA'   => get_social_links(),
        'STICKY_HEADER'  => get_theme_option('enable_sticky_header', 'option')
    );
    wp_localize_script('custom-js', 'THEME_PARAMS', $customParams);

    wp_dequeue_script('comment-reply');
    wp_dequeue_script('wp-embed');
}
add_action('wp_enqueue_scripts', 'theme_front_scripts');

function theme_front_styles()
{
    $version = get_theme_cache_version();

    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Oswald:wght@600;700&family=Montserrat:wght@400;500;600&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'theme-styles',
        THEME_THEMEROOT . '/style.css',
        array(),
        filemtime(get_stylesheet_directory() . '/style.css'),
        'screen'
    );

    if (!is_page_template('page-home.php') && !is_page_template('page-contact.php')) {
        wp_enqueue_style('fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', array(), '5.0', 'screen');
    }

    wp_enqueue_style('master-styles', THEME_CSS . 'master.min.css', array(), $version, 'screen');

    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
}
add_action('wp_enqueue_scripts', 'theme_front_styles');

function get_theme_cache_version()
{
    return get_option('custom_theme_cache_version', '1.0.0');
}