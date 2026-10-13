<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo get_theme_option('tag_header_script'); ?>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php echo get_theme_option('tag_body_script'); ?>
    <div id="page">

        <?php if ($header_message = get_theme_option('header_message')) : ?>
            <div class="header-message"><?php echo wp_kses_post($header_message); ?></div>
        <?php endif; ?>

        <header class="main-header">
            <div class="container">
                <div class="logo-wrapper">
                    <a href="<?php echo site_url(); ?>">
                        <?php if ($logo = get_theme_option('logo')) : ?>
                            <span class="logo-mark">
                                <?php get_image($logo, 'logo', get_bloginfo('name'), FALSE); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($logo_wordmark = get_theme_option('logo_wordmark')) : ?>
                            <span class="logo-wordmark">
                                <?php get_image($logo_wordmark, 'logo', get_bloginfo('name'), FALSE); ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </div>

                <div class="menu-wrapper">
                    <?php if ($menu = get_theme_option('menu')) : ?>
                        <nav class="navbar navbar-expand-md">
                            <?php wp_nav_menu(array(
                                'menu'            => $menu,
                                'container'       => false,
                                'menu_class'      => 'menu',
                                'echo'            => true,
                                'fallback_cb'     => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                'depth'           => 0
                            )); ?>
                        </nav>
                    <?php endif; ?>

                    <?php if ($phone = get_theme_option('phone')) : ?>
                        <a href="<?php echo esc_url($phone['url']); ?>" class="telephone" target="<?php echo esc_attr($phone['target'] ?: '_self'); ?>">
                            <?php echo esc_html($phone['title']); ?>
                        </a>
                    <?php endif; ?>

                    <a href="#contact" class="theme-blue">Get Started</a>
                </div>

                <?php if ($mobile_menu = merge_menus([$menu])) : ?>
                    <a class="menu-icon" href="#navbarCollapse"><i class="fa-solid fa-bars"></i></a>
                <?php endif; ?>
            </div>

            <?php if ($mobile_menu) : ?>
                <div class="mobile-menu">
                    <div id="navbarCollapse">
                        <?php echo $mobile_menu; ?>
                    </div>
                    <div class="mobile-actions">
                        <?php if (!empty($phone['url'])) : ?>
                            <a href="<?php echo esc_url($phone['url']); ?>" class="telephone"><?php echo esc_html($phone['title']); ?></a>
                        <?php endif; ?>
                        <a href="#contact" class="theme-blue">Request Consultation</a>
                    </div>
                </div>
            <?php endif; ?>
        </header>

        <main>