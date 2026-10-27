</main>
</div>

<?php if ((get_theme_option('appointment_link_type') == 2) && get_theme_option('appointment_form')) : ?>
    <!-- Offer Modal -->
    <div class="modal theme-modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-wrapper">
                        <h2 id="appointmentModalLabel"><?php echo esc_html(get_theme_option('appointment_modal_title') ?: 'Schedule an Appointment'); ?></h2>
                    </div>
                    <?php echo do_shortcode(get_theme_option('appointment_form')); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<footer class="main-footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-top">

                <div class="footer-about">
                    <?php if (get_theme_option('logo') || get_theme_option('footer_logo_wordmark')) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo-row">
                            <?php if (get_theme_option('logo')) : ?>
                                <div class="footer-logo-mark">
                                    <?php get_image(get_theme_option('logo'), 'footer-logo-mark-img', get_bloginfo('name'), false); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (get_theme_option('footer_logo_wordmark')) : ?>
                                <?php get_image(get_theme_option('footer_logo_wordmark'), 'footer-logo-img', get_bloginfo('name'), false); ?>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>

                    <?php if (get_theme_option('footer_menu')) : ?>
                        <div class="footer-tagline">
                            <?php echo get_theme_option('footer_menu'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_option('bbb_logo')) : ?>
                        <div class="footer-badges">
                            <?php if (get_theme_option('bbb_link')) : ?>
                                <a href="<?php echo esc_url(get_theme_option('bbb_link')); ?>" target="_blank" rel="noopener noreferrer" aria-label="BBB Accredited Business">
                            <?php endif; ?>

                            <?php get_image(get_theme_option('bbb_logo'), 'footer-badge-img'); ?>

                            <?php if (get_theme_option('bbb_link')) : ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php foreach (array('quick_links', 'treatment_quick_links') as $field) : ?>
                    <?php if (get_theme_option($field) && ($menu_items = wp_get_nav_menu_items(get_theme_option($field)))) : ?>
                        <div class="footer-col">
                            <h4><?php echo esc_html(get_theme_option($field)); ?></h4>

                            <?php foreach ($menu_items as $menu_item) : ?>
                                <?php if ((int) $menu_item->menu_item_parent !== 0) continue; ?>

                                <a href="<?php echo esc_url($menu_item->url); ?>"<?php echo $menu_item->target === '_blank' ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
                                    <?php echo esc_html($menu_item->title); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php
                $phone_list = array_filter(array_map('trim', explode(',', get_theme_option('telephone') ?: '')));
                $email_list = array_filter(array_map('trim', explode(',', get_theme_option('email') ?: '')));
                ?>

                <?php if ($phone_list || $email_list || get_theme_option('address')) : ?>
                    <div class="footer-col">
                        <h4>Contact</h4>

                        <?php foreach ($phone_list as $number) : ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $number)); ?>">
                                <?php echo esc_html($number); ?>
                            </a>
                        <?php endforeach; ?>

                        <?php foreach ($email_list as $mail) : ?>
                            <a href="mailto:<?php echo esc_attr($mail); ?>">
                                <?php echo esc_html($mail); ?>
                            </a>
                        <?php endforeach; ?>

                        <?php if (get_theme_option('address')) : ?>
                            <a <?php echo get_link_attrs(get_theme_option('address_link')); ?>><?php echo nl2br(esc_html(get_theme_option('address'))); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>

            <?php if (get_theme_option('copyrights_text') || get_theme_option('policies')) : ?>
                <div class="footer-bottom">
                    <?php if (get_theme_option('copyrights_text')) : ?>
                        <p><?php echo esc_html(str_replace('[year]', date('Y'), get_theme_option('copyrights_text'))); ?></p>
                    <?php endif; ?>

                    <?php if (get_theme_option('policies')) : ?>
                        <p class="footer-policies">
                            <?php $first_policy = true; ?>

                            <?php foreach (get_theme_option('policies') as $policy) : ?>
                                <?php if (!empty($policy['link']['url'])) : ?>
                                    <?php if (!$first_policy) echo ' · '; ?>

                                    <a href="<?php echo esc_url($policy['link']['url']); ?>"<?php echo !empty($policy['link']['target']) ? ' target="' . esc_attr($policy['link']['target']) . '"' : ''; ?><?php echo ($policy['link']['target'] ?? '') === '_blank' ? ' rel="noopener noreferrer"' : ''; ?>>
                                        <?php echo esc_html($policy['link']['title'] ?? ''); ?>
                                    </a>

                                    <?php $first_policy = false; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>