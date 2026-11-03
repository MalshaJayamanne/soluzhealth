</main>
</div>

<footer class="main-footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-top">

                <?php if (get_theme_option('logo') || get_theme_option('footer_logo_wordmark') || get_theme_option('footer_menu') || get_theme_option('bbb_logo')) : ?>
                    <div class="footer-about">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo-row">
                            <div class="footer-logo-mark">
                                <?php get_image(get_theme_option('logo'), 'footer-logo-mark-img', get_bloginfo('name'), false); ?>
                            </div>

                            <?php get_image(get_theme_option('footer_logo_wordmark'), 'footer-logo-img', get_bloginfo('name'), false); ?>
                        </a>

                        <div class="footer-tagline">
                            <?php echo get_theme_option('footer_menu'); ?>
                        </div>

                        <div class="footer-badges">
                            <a href="<?php echo esc_url(get_theme_option('bbb_link')); ?>" target="_blank" rel="noopener noreferrer" aria-label="BBB Accredited Business">
                                <?php get_image(get_theme_option('bbb_logo'), 'footer-badge-img'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php foreach (array('quick_links', 'treatment_quick_links') as $field) : ?>
                    <?php if (get_theme_option($field)) : ?>
                        <div class="footer-col">
                            <h4><?php echo esc_html(wp_get_nav_menu_object(get_theme_option($field))->name); ?>

                            <?php foreach (wp_get_nav_menu_items(get_theme_option($field)) as $menu_item) : ?>
                                <?php if ((int) $menu_item->menu_item_parent !== 0) continue; ?>

                                <a href="<?php echo esc_url($menu_item->url); ?>"<?php echo $menu_item->target === '_blank' ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
                                    <?php echo esc_html($menu_item->title); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php if (get_theme_option('telephone') || get_theme_option('email') || get_theme_option('address')) : ?>
                    <div class="footer-col">
                        <h4>Contact</h4>

                        <?php foreach (explode(',', get_theme_option('telephone') ?: '') as $number) : ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', trim($number))); ?>">
                                <?php echo esc_html(trim($number)); ?>
                            </a>
                        <?php endforeach; ?>

                        <?php foreach (explode(',', get_theme_option('email') ?: '') as $mail) : ?>
                            <a href="mailto:<?php echo esc_attr(trim($mail)); ?>">
                                <?php echo esc_html(trim($mail)); ?>
                            </a>
                        <?php endforeach; ?>

                        <a <?php echo get_link_attrs(get_theme_option('address_link')); ?>>
                            <?php echo nl2br(esc_html(get_theme_option('address'))); ?>
                        </a>
                    </div>
                <?php endif; ?>

            </div>

            <?php if (get_theme_option('copyrights_text') || get_theme_option('policies')) : ?>
                <div class="footer-bottom">
                    <p><?php echo esc_html(str_replace('[year]', date('Y'), get_theme_option('copyrights_text'))); ?></p>

                    <p class="footer-policies">
                        <?php foreach (array_values(array_filter(get_theme_option('policies'), function ($policy) {
                            return !empty($policy['link']['url']);
                        })) as $index => $policy) : ?>
                            <?php echo $index > 0 ? ' · ' : ''; ?>

                            <a href="<?php echo esc_url($policy['link']['url']); ?>"<?php echo !empty($policy['link']['target']) ? ' target="' . esc_attr($policy['link']['target']) . '"' : ''; ?><?php echo ($policy['link']['target'] ?? '') === '_blank' ? ' rel="noopener noreferrer"' : ''; ?>>
                                <?php echo esc_html($policy['link']['title'] ?? ''); ?>
                            </a>
                        <?php endforeach; ?>
                    </p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>