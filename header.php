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
        <?php if ($header_message = get_theme_option('header_message')) : ?>
            <div class="header-message"><?php echo wp_kses_post($header_message); ?></div>
        <?php endif; ?>

        <header class="main-header">
            <div class="container">
                <!-- Logo -->
                <div class="logo-wrapper">
                    <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <?php if ($logo = get_theme_option('logo')) : ?>
                            <span class="logo-mark"><?php get_image($logo, 'logo', get_bloginfo('name'), false); ?></span>
                        <?php endif; ?>
                        <?php if ($logo_wordmark = get_theme_option('logo_wordmark')) : ?>
                            <span class="logo-wordmark"><?php get_image($logo_wordmark, 'logo', get_bloginfo('name'), false); ?></span>
                        <?php endif; ?>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="menu-wrapper">
                    <?php if ($menu = get_theme_option('menu')) : ?>
                        <nav class="navbar navbar-expand-md" aria-label="Main navigation">
                            <?php wp_nav_menu(array(
                                'menu'        => $menu,
                                'container'   => false,
                                'menu_class'  => 'menu',
                                'fallback_cb' => false,
                                'items_wrap'  => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                'depth'       => 0,
                            )); ?>
                        </nav>
                    <?php endif; ?>

                    <!-- Desktop Phone -->
                    <?php if ($phone = get_theme_option('telephone')) : ?>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="telephone"><?php echo esc_html($phone); ?></a>
                    <?php endif; ?>

                    <!-- Desktop Get Started -->
                    <?php if ($header_link = get_theme_option('header_link')) : ?>
                        <?php if (!empty($header_link['url']) && !empty($header_link['title'])) : ?>
                            <a href="<?php echo esc_url($header_link['url']); ?>" class="theme-blue" target="<?php echo esc_attr(!empty($header_link['target']) ? $header_link['target'] : '_self'); ?>" <?php if (!empty($header_link['target']) && $header_link['target'] === '_blank') : ?>rel="noopener noreferrer"<?php endif; ?>><?php echo esc_html($header_link['title']); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <!-- Mobile Hamburger -->
                <?php if ($menu = get_theme_option('menu')) : ?>
                    <button class="menu-icon" type="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="navbarCollapse">
                        <i class="fa-solid fa-bars" aria-hidden="true"></i>
                    </button>
                <?php endif; ?>
            </div>

            <!-- Mobile Navigation -->
            <?php if ($menu = get_theme_option('menu')) : ?>
                <div class="mobile-menu" id="navbarCollapse" aria-label="Mobile navigation" aria-hidden="true">
                    <nav class="mobile-menu-links" aria-label="Mobile navigation links">
                        <?php echo merge_menus(array($menu)); ?>
                    </nav>
                    <div class="mobile-actions">
                        <!-- Mobile Phone -->
                        <?php if ($phone = get_theme_option('telephone')) : ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="telephone"><?php echo esc_html($phone); ?></a>
                        <?php endif; ?>

                        <!-- Mobile Get Started -->
                        <?php if ($header_link = get_theme_option('header_link')) : ?>
                            <?php if (!empty($header_link['url']) && !empty($header_link['title'])) : ?>
                                <a href="<?php echo esc_url($header_link['url']); ?>" class="theme-blue get-started" target="<?php echo esc_attr(!empty($header_link['target']) ? $header_link['target'] : '_self'); ?>" <?php if (!empty($header_link['target']) && $header_link['target'] === '_blank') : ?>rel="noopener noreferrer"<?php endif; ?>><?php echo esc_html($header_link['title']); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </header>
        <main>