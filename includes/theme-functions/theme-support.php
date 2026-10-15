<?php
/**
 * Add Theme Support
 */
function soluz_theme_setup()
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form']);

    // Register WordPress menu locations.
    register_nav_menus([
        'primary' => __('Primary Menu', 'soluz-health'),
        'footer'  => __('Footer Menu', 'soluz-health'),
    ]);
}
add_action('after_setup_theme', 'soluz_theme_setup');

/**
 * Add custom colors to WYSIWYG editor
 */
function theme_editor_color_options($init)
{
    $custom_colours = [
        '000000', 'Black',
        '993300', 'Burnt orange',
        '333300', 'Dark olive',
        '003300', 'Dark green',
        '003366', 'Dark azure',
        '000080', 'Navy Blue',
        '333399', 'Indigo',
        '333333', 'Very dark gray',
        '800000', 'Maroon',
        'FF6600', 'Orange',
        '808000', 'Olive',
        '008000', 'Green',
        '008080', 'Teal',
        '0000FF', 'Blue',
        '666699', 'Grayish blue',
        '808080', 'Gray',
        'FF0000', 'Red',
        'FF9900', 'Amber',
        '99CC00', 'Yellow green',
        '339966', 'Sea green',
        '33CCCC', 'Turquoise',
        '3366FF', 'Royal blue',
        '800080', 'Purple',
        '999999', 'Medium gray',
        'FF00FF', 'Magenta',
        'FFCC00', 'Gold',
        'FFFF00', 'Yellow',
        '00FF00', 'Lime',
        '00FFFF', 'Aqua',
        '00CCFF', 'Sky blue',
        '993366', 'Red violet',
        'FFFFFF', 'White',
        'FF99CC', 'Pink',
        'FFCC99', 'Peach',
        'FFFF99', 'Light yellow',
        '36A9FF', 'Primary Blue',
        '808EED', 'Secondary Purple',
        'C0DFFF', 'Light Blue',
        '0A1F3D', 'Dark Navy',
    ];

    $init['textcolor_map'] = wp_json_encode($custom_colours);

    // Display 6 rows of color swatches.
    $init['textcolor_rows'] = 6;

    return $init;
}
add_filter('tiny_mce_before_init', 'theme_editor_color_options');