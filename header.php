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
    <?php wp_body_open(); ?>
    <?php echo get_theme_option('tag_body_script'); ?>

    <div id="page">

        <?php if (get_theme_option('header_message')) : ?>
            <div class="header-message">
                <?php echo wp_kses_post(get_theme_option('header_message')); ?>
            </div>
        <?php endif; ?>

        <header class="main-header">
            <div class="container">

                <!-- Logo -->
                <div class="logo-wrapper">
                    <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <span class="logo-mark">
                            <?php get_image(get_theme_option('logo'), 'logo', get_bloginfo('name'), false); ?>
                        </span>
                        <span class="logo-wordmark">
                            <?php get_image(get_theme_option('logo_wordmark'), 'logo', get_bloginfo('name'), false); ?>
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="right">
                    <?php if (get_theme_option('menu')) : ?>
                        <div class="menu-wrapper">
                            <nav class="navbar navbar-expand-md" aria-label="Main navigation">
                                <?php wp_nav_menu(array(
                                    'menu'        => get_theme_option('menu'),
                                    'container'   => false,
                                    'menu_class'  => 'menu',
                                    'fallback_cb' => false,
                                    'items_wrap'  => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                    'depth'       => 0,
                                )); ?>
                            </nav>
                        </div>
                    <?php endif; ?>

                    <!-- Desktop Phone -->
                    <?php if (get_theme_option('telephone')) : ?>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_option('telephone'))); ?>" class="telephone">
                            <?php echo esc_html(get_theme_option('telephone')); ?>
                        </a>
                    <?php endif; ?>

                    <!-- Desktop Get Started -->
                    <?php get_theme_link(get_theme_option('header_link'), 'theme-btn header-btn'); ?>
                </div>

                <!-- Mobile Hamburger -->
                <?php if (get_theme_option('menu')) : ?>
                    <a href="#navbarCollapse" class="menu-icon" aria-label="Open navigation menu">
                        <i class="fa-solid fa-bars" aria-hidden="true"></i>
                    </a>
                <?php endif; ?>

            </div>

            <!-- Mmenu Navigation -->
            <?php if (get_theme_option('menu')) : ?>
                <nav id="navbarCollapse" aria-label="Mobile navigation">
                    <?php echo merge_menus(array(get_theme_option('menu'))); ?>

                    <!-- Mobile Actions: copied into Mmenu bottom navbar -->
                    <div id="mobileMenuActions" hidden>
                        <div class="mobile-actions">
                            <?php if (get_theme_option('telephone')) : ?>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_option('telephone'))); ?>" class="telephone">
                                    <?php echo esc_html(get_theme_option('telephone')); ?>
                                </a>
                            <?php endif; ?>

                            <?php get_theme_link(get_theme_option('header_link'), 'theme-btn header-btn'); ?>
                        </div>
                    </div>
                </nav>
            <?php endif; ?>

        </header>

        <main>