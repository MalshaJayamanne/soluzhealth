
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
        <?php
        $header_message = get_theme_option('header_message');
        $logo           = get_theme_option('logo');
        $logo_wordmark  = get_theme_option('logo_wordmark');
        $menu           = get_theme_option('menu');
        $phone          = get_theme_option('phone');
        $header_link    = get_theme_option('header_link');
        $mobile_menu    = merge_menus(array($menu));
        ?>
        <?php if ($header_message) : ?>
            <div class="header-message">
                <?php echo wp_kses_post($header_message); ?>
            </div>
        <?php endif; ?>
        <header class="main-header">
            <div class="container">
                <!-- Logo -->
                <div class="logo-wrapper">
                    <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <?php if ($logo) : ?>
                            <span class="logo-mark">
                                <?php get_image($logo, 'logo', get_bloginfo('name'), false); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($logo_wordmark) : ?>
                            <span class="logo-wordmark">
                                <?php get_image($logo_wordmark, 'logo', get_bloginfo('name'), false); ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </div>
                <!-- Desktop Navigation -->
                <div class="menu-wrapper">
                    <?php if ($menu) : ?>
                        <nav class="navbar navbar-expand-md" aria-label="Main navigation">
                            <?php
                            wp_nav_menu(array(
                                'menu'        => $menu,
                                'container'   => false,
                                'menu_class'  => 'menu',
                                'echo'        => true,
                                'fallback_cb' => false,
                                'items_wrap'  => '<ul id="%1$s" class="%2$s navbar-nav">%3$s</ul>',
                                'depth'       => 0,
                            ));
                            ?>
                        </nav>
                    <?php endif; ?>
                    <!-- Desktop Phone -->
                    <?php if (!empty($phone['url']) && !empty($phone['title'])) : ?>
                        <a
                            href="<?php echo esc_url($phone['url']); ?>"
                            class="telephone"
                            target="<?php echo esc_attr(!empty($phone['target']) ? $phone['target'] : '_self'); ?>"
                            <?php if (!empty($phone['target']) && $phone['target'] === '_blank') : ?>
                                rel="noopener noreferrer"
                            <?php endif; ?>
                        >
                            <?php echo esc_html($phone['title']); ?>
                        </a>
                    <?php endif; ?>
                    <!-- Desktop Get Started -->
                    <?php if (is_array($header_link) && !empty($header_link['url']) && !empty($header_link['title'])) : ?>
                        <div class="theme-blue get-started">
                            <a
                                href="<?php echo esc_url($header_link['url']); ?>"
                                class="get-started"
                                target="<?php echo esc_attr(!empty($header_link['target']) ? $header_link['target'] : '_self'); ?>"
                                <?php if (!empty($header_link['target']) && $header_link['target'] === '_blank') : ?>
                                    rel="noopener noreferrer"
                                <?php endif; ?>
                            >
                                <?php echo esc_html($header_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Mobile Hamburger -->
                <?php if ($mobile_menu) : ?>
                    <button
                        class="menu-icon"
                        type="button"
                        aria-label="Open navigation menu"
                        aria-expanded="false"
                        aria-controls="navbarCollapse"
                    >
                        <i class="fa-solid fa-bars" aria-hidden="true"></i>
                    </button>
                <?php endif; ?>
            </div>
            <!-- Mobile Navigation -->
            <?php if ($mobile_menu) : ?>
                <div class="mobile-menu" id="navbarCollapse" aria-label="Mobile navigation" aria-hidden="true">
                    <nav class="mobile-menu-links" aria-label="Mobile navigation links">
                        <?php echo $mobile_menu; ?>
                    </nav>
                    <div class="mobile-actions">
                        <!-- Mobile Phone -->
                        <?php if (!empty($phone['url']) && !empty($phone['title'])) : ?>
                            <a
                                href="<?php echo esc_url($phone['url']); ?>"
                                class="telephone"
                                target="<?php echo esc_attr(!empty($phone['target']) ? $phone['target'] : '_self'); ?>"
                                <?php if (!empty($phone['target']) && $phone['target'] === '_blank') : ?>
                                    rel="noopener noreferrer"
                                <?php endif; ?>
                            >
                                <?php echo esc_html($phone['title']); ?>
                            </a>
                        <?php endif; ?>
                        <!-- Mobile Get Started -->
                        <?php if (is_array($header_link) && !empty($header_link['url']) && !empty($header_link['title'])) : ?>
                            <a
                                href="<?php echo esc_url($header_link['url']); ?>"
                                class="theme-blue get-started"
                                target="<?php echo esc_attr(!empty($header_link['target']) ? $header_link['target'] : '_self'); ?>"
                                <?php if (!empty($header_link['target']) && $header_link['target'] === '_blank') : ?>
                                    rel="noopener noreferrer"
                                <?php endif; ?>
                            >
                                <?php echo esc_html($header_link['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </header>
        <main>
