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
            <div class="header-message"><?php echo wp_kses_post(get_theme_option('header_message')); ?></div>
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
                <div class="menu-wrapper">
                    <?php if (get_theme_option('menu')) : ?>
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
                    <?php endif; ?>

                    <!-- Desktop Phone -->
                    <?php if (get_theme_option('telephone')) : ?>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_option('telephone'))); ?>" class="telephone">
                            <?php echo esc_html(get_theme_option('telephone')); ?>
                        </a>
                    <?php endif; ?>
                    <!-- Desktop Get Started -->
                    <?php get_theme_link(get_theme_option('header_link'), 'theme-blue'); ?>
                </div>

                <!-- Mobile Hamburger -->
                <?php if (get_theme_option('menu')) : ?>
                    <button class="menu-icon" type="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="navbarCollapse">
                        <i class="fa-solid fa-bars" aria-hidden="true"></i>
                    </button>
                <?php endif; ?>
            </div>

            <!-- Mobile Navigation -->
            <?php if (get_theme_option('menu')) : ?>
                <div class="mobile-menu" id="navbarCollapse" aria-label="Mobile navigation" aria-hidden="true">
                    <button class="menu-close" type="button" aria-label="Close navigation menu"></button>
                    <nav class="mobile-menu-links" aria-label="Mobile navigation links">
                        <?php echo merge_menus(array(get_theme_option('menu'))); ?>
                    </nav>

                    <div class="mobile-actions">
                        <!-- Mobile Phone -->
                        <?php if (get_theme_option('telephone')) : ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_option('telephone'))); ?>" class="telephone">
                                <?php echo esc_html(get_theme_option('telephone')); ?>
                            </a>
                        <?php endif; ?>

                        <!-- Mobile Get Started -->
                        <?php get_theme_link(get_theme_option('header_link'), 'theme-blue'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </header>
        <main>