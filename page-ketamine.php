<?php
/**
 * Template Name: Ketamine
 */
get_header();
?>

<?php if ($ketamine_content = get_field('ketamine_content')) : ?>
    <section class="page-hero-section">
        <?php if ($ketamine_image = get_field('ketamine_image')) : ?>
            <?php get_image($ketamine_image, 'full', get_bloginfo('name'), false); ?>
        <?php endif; ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo $ketamine_content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($what_content = get_field('what_ketamine_content')) : ?>
    <section class="what-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo $what_content; ?>
                </div>

                <?php if ($what_image = get_field('what_ketamine_image')) : ?>
                    <div class="image">
                        <?php get_image($what_image, 'large'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($local_content = get_field('ketamine_san_antonio_content')) : ?>
    <section class="local-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo $local_content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (($cond_content = get_field('ketamine_conditions_content')) || have_rows('ketamine_conditions')) : ?>
    <section class="cond-section" id="conditions">
        <div class="container">
            <?php if ($cond_content) : ?>
                <div class="heading content-wrapper">
                    <?php echo $cond_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('ketamine_conditions')) : ?>
                <div class="inner">
                    <?php while (have_rows('ketamine_conditions')) : the_row(); ?>
                        <div class="item">
                            <?php if ($title = get_sub_field('title')) : ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>

                            <?php if ($content = get_sub_field('content')) : ?>
                                <div class="content-wrapper"><?php echo wp_kses_post(wpautop($content)); ?></div>
                            <?php endif; ?>

                            <?php if (($link = get_sub_field('link')) && !empty($link['url'])) : ?>
                                <a <?php echo get_link_attrs($link); ?> class="card-link">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (($howit_content = get_field('ketamine_howit_content')) || have_rows('ketamine_safety')) : ?>
    <section class="howit-section">
        <div class="container">
            <div class="inner">
                <?php if ($howit_content) : ?>
                    <div class="content-wrapper">
                        <?php echo $howit_content; ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('ketamine_safety')) : ?>
                    <div class="safety">
                        <?php while (have_rows('ketamine_safety')) : the_row(); ?>
                            <?php if ($safety_text = get_sub_field('item')) : ?>
                                <div class="item">
                                    <div class="content-wrapper"><?php echo wp_kses_post(wpautop($safety_text)); ?></div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (($steps_content = get_field('ketamine_process_content')) || have_rows('ketamine_processes')) : ?>
    <section class="steps-section" id="process">
        <div class="container">
            <?php if ($steps_content) : ?>
                <div class="heading content-wrapper">
                    <?php echo $steps_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('ketamine_processes')) : ?>
                <div class="inner">
                    <?php $step = 1; ?>
                    <?php while (have_rows('ketamine_processes')) : the_row(); ?>
                        <div class="item">
                            <div class="number"><?php echo (int) $step; ?></div>

                            <div class="info">
                                <?php if ($title = get_sub_field('title')) : ?>
                                    <h3><?php echo esc_html($title); ?></h3>
                                <?php endif; ?>

                                <?php if ($content = get_sub_field('content')) : ?>
                                    <div class="content-wrapper"><?php echo wp_kses_post(wpautop($content)); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php $step++; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (($faq_title = get_field('ketamine_faq_title')) || have_rows('ketamine_faqs')) : ?>
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="inner">
                <?php if ($faq_title) : ?>
                    <div class="heading content-wrapper">
                        <?php echo $faq_title; ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('ketamine_faqs')) : ?>
                    <div class="list">
                        <?php while (have_rows('ketamine_faqs')) : the_row(); ?>
                            <?php if (($question = get_sub_field('title') ?: get_sub_field('question')) || ($answer = get_sub_field('content') ?: get_sub_field('answer'))) : ?>
                                <div class="item">
                                    <?php if ($question) : ?>
                                        <h3><?php echo esc_html($question); ?></h3>
                                    <?php endif; ?>

                                    <?php if ($answer) : ?>
                                        <div class="content-wrapper"><?php echo wp_kses_post(wpautop($answer)); ?></div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($cta_content = get_field('ketamine_cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo $cta_content; ?>
                </div>

                <?php $appointment = get_theme_option('appointment_link'); ?>
                <?php $call_number = ''; ?>
                <?php if ($telephone = get_theme_option('telephone')) : ?>
                    <?php $phones = array_filter(array_map('trim', explode(',', $telephone))); ?>
                    <?php $call_number = $phones ? reset($phones) : ''; ?>
                <?php endif; ?>

                <?php if (!empty($appointment['url']) || $call_number) : ?>
                    <div class="buttons">
                        <?php if (!empty($appointment['url'])) : ?>
                            <a <?php echo get_link_attrs($appointment); ?> class="theme-blue">
                                <?php echo esc_html($appointment['title']); ?>
                            </a>
                        <?php endif; ?>

                        <?php if ($call_number) : ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $call_number)); ?>" class="theme-outline">
                                Call <?php echo esc_html($call_number); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($cred_content = get_field('ketamine_credentials_content')) : ?>
    <section class="credentials-section">
        <div class="container">
            <div class="inner">
                <?php if ($cred_image = get_field('ketamine_credentials_image')) : ?>
                    <div class="badge">
                        <?php get_image($cred_image, 'medium'); ?>
                    </div>
                <?php endif; ?>

                <div class="content-wrapper">
                    <?php echo $cred_content; ?>

                    <?php if (($cred_link = get_field('ketamine_credentials_link')) && !empty($cred_link['url'])) : ?>
                        <a <?php echo get_link_attrs($cred_link); ?> class="credentials-link">
                            <?php echo esc_html($cred_link['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>