</main>

</div>

<?php if ((get_theme_option('appointment_link_type') == 2) && ($form_shortcode = get_theme_option('appointment_form'))): ?>
    <!-- Offer Modal -->
    <div class="modal theme-modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-wrapper">
                        <h2><?php echo get_theme_option('appointment_modal_title') ?: 'Schedule an Appointment'; ?></h2>
                    </div>
                    <?php echo do_shortcode($form_shortcode); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
$footer_logo     = get_theme_option('logo');
$footer_wordmark = get_theme_option('footer_logo_wordmark');
$footer_content  = get_theme_option('footer_menu');
$bbb_logo        = get_theme_option('bbb_logo');
$copyrights      = get_theme_option('copyrights_text');
$policy_text     = get_theme_option('policy_text');
$telephone       = get_theme_option('telephone');
$email           = get_theme_option('email');
$address         = get_theme_option('address');

// BBB profile page (the BBB badge links here)
$bbb_url = 'https://www.bbb.org/us/tx/san-antonio/profile/mental-health-services/san-antonio-ketamine-specialists-0825-1000235048';

// WordPress menus (Appearance > Menus). Create menus with these exact names.
$footer_menus = array('Quick Links', 'Treatments');

// Comma separated values => array
$phone_list = $telephone ? array_filter(array_map('trim', explode(',', $telephone))) : array();
$email_list = $email ? array_filter(array_map('trim', explode(',', $email))) : array();

// Google Maps link built from the address
$address_link = '';
if ($address) {
    $address_link = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode(trim(preg_replace('/\s+/', ' ', wp_strip_all_tags($address))));
}
?>

<footer class="main-footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-top">

                <div class="footer-about">
                    <?php if ($footer_logo || $footer_wordmark) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo-row">
                            <?php if ($footer_logo) : ?>
                                <div class="footer-logo-mark">
                                    <?php get_image($footer_logo, 'footer-logo-mark-img', get_bloginfo('name')); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($footer_wordmark) : ?>
                                <?php get_image($footer_wordmark, 'footer-logo-img', get_bloginfo('name')); ?>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($footer_content) : ?>
                        <div class="footer-tagline">
                            <?php echo $footer_content; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($bbb_logo) : ?>
                        <div class="footer-badges">
                            <a href="<?php echo esc_url($bbb_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="BBB Accredited Business">
                                <?php get_image($bbb_logo, 'footer-badge-img', 'BBB Accredited Business'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <?php foreach ($footer_menus as $menu_name) : ?>
                    <?php
                    $menu_items = wp_get_nav_menu_items($menu_name);
                    if (!$menu_items) {
                        continue;
                    }
                    ?>
                    <div class="footer-col">
                        <h4><?php echo esc_html($menu_name); ?></h4>
                        <?php foreach ($menu_items as $menu_item) : ?>
                            <?php if ((int) $menu_item->menu_item_parent !== 0) { continue; } ?>
                            <?php $is_blank = ($menu_item->target === '_blank'); ?>
                            <a href="<?php echo esc_url($menu_item->url); ?>"<?php echo $is_blank ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>><?php echo esc_html($menu_item->title); ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

                <?php if ($phone_list || $email_list || $address) : ?>
                    <div class="footer-col">
                        <h4>Contact</h4>

                        <?php foreach ($phone_list as $number) : ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $number)); ?>"><?php echo esc_html($number); ?></a>
                        <?php endforeach; ?>

                        <?php foreach ($email_list as $mail) : ?>
                            <a href="mailto:<?php echo esc_attr($mail); ?>"><?php echo esc_html($mail); ?></a>
                        <?php endforeach; ?>

                        <?php if ($address) : ?>
                            <a href="<?php echo esc_url($address_link); ?>" target="_blank" rel="noopener noreferrer"><?php echo nl2br(esc_html($address)); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>

            <?php if ($copyrights || $policy_text) : ?>
                <div class="footer-bottom">
                    <?php if ($copyrights) : ?>
                        <p><?php echo esc_html(str_replace('[year]', date('Y'), $copyrights)); ?></p>
                    <?php endif; ?>
                    <?php if ($policy_text) : ?>
                        <p><?php echo esc_html($policy_text); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>