<?php
/** Template Name: Contact **/
get_header();

$contact_page_id = get_queried_object_id();

$top_content  = get_field('top_content', $contact_page_id);
$contact_form = get_field('contact_form', $contact_page_id);
$form_title   = get_field('contact_form_title', $contact_page_id);
$form_note    = get_field('contact_form_note', $contact_page_id);
?>

<?php if ($top_content || $contact_form) : ?>
    <section class="contact-form-section">
        <div class="container">
            <div class="inner">
                <!-- LEFT SIDE: CONTACT INFORMATION -->
                <div class="info">
                    <?php if ($top_content) : ?>
                        <div class="content-wrapper">
                            <?php echo $top_content; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    $telephone = get_theme_option('telephone');
                    $call_number = '';

                    if ($telephone) {
                        $phones = array_filter(array_map('trim', explode(',', $telephone)));
                        $call_number = $phones ? reset($phones) : '';
                    }

                    $email         = get_theme_option('email');
                    $address       = get_theme_option('address');
                    $address_link  = get_theme_option('address_link');
                    $location_note = get_theme_option('contact_location_note');
                    ?>
                    <?php if ($call_number || $email || $address || $location_note) : ?>
                        <ul class="details">

                            <?php if ($call_number) : ?>
                                <li class="item">
                                    <span class="icon">
                                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                                    </span>
                                    <div class="text">
                                        <span class="label">Phone</span>
                                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $call_number)); ?>">
                                            <?php echo esc_html($call_number); ?>
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if ($email) : ?>
                                <li class="item">
                                    <span class="icon">
                                        <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                                    </span>
                                    <div class="text">
                                        <span class="label">Email</span>
                                        <a href="mailto:<?php echo esc_attr(antispambot($email)); ?>">
                                            <?php echo esc_html(antispambot($email)); ?>
                                        </a>
                                    </div>
                                </li>
                            <?php endif; ?>

                            <?php if ($address || $location_note) : ?>
                                <li class="item">
                                    <span class="icon">
                                        <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                                    </span>
                                    <div class="text">
                                        <span class="item-label">Location</span>
                                        <?php if ($address) : ?>
                                            <?php if (is_array($address_link) && !empty($address_link['url'])) : ?>
                                                <a <?php echo get_link_attrs($address_link); ?>>
                                                    <?php echo nl2br(esc_html($address)); ?>
                                                </a>
                                            <?php else : ?>
                                                <address>
                                                    <?php echo nl2br(esc_html($address)); ?>
                                                </address>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if ($location_note) : ?>
                                            <p class="note">
                                                <?php echo esc_html($location_note); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- RIGHT SIDE: CONTACT FORM -->
                <?php if ($contact_form) : ?>
                    <div class="form-card">
                        <?php if ($form_title) : ?>
                            <div class="content-wrapper">
                                <?php echo $form_title; ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-wrapper">
                            <?php echo do_shortcode($contact_form); ?>
                        </div>
                        <?php if ($form_note !== false && $form_note !== null && $form_note !== '') : ?>
                            <p class="form-note">
                                <?php echo esc_html($form_note); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>