<?php
/** Template Name: Ketamine **/
get_header();
?>

<?php if (get_field('ketamine_content')) : ?>
    <section class="page-hero-section">
        <?php get_image(get_field('ketamine_image'), 'full', get_bloginfo('name'), false); ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <?php get_theme_link(array('url' => home_url('/'), 'title' => 'Home')); ?>
                    / <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo get_field('ketamine_content'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('what_ketamine_content')) : ?>
    <section class="what-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo get_field('what_ketamine_content'); ?>
                </div>

                <div class="image">
                    <?php get_image(get_field('what_ketamine_image'), 'large'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('ketamine_san_antonio_content')) : ?>
    <section class="local-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo get_field('ketamine_san_antonio_content'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('ketamine_conditions_content') || have_rows('ketamine_conditions')) : ?>
    <section class="cond-section" id="conditions">
        <div class="container">
            <?php if (get_field('ketamine_conditions_content')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('ketamine_conditions_content'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('ketamine_conditions')) : ?>
                <div class="inner">
                    <?php while (have_rows('ketamine_conditions')) : the_row(); ?>
                        <div class="item">
                            <?php if (get_sub_field('title')) : ?>
                                <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                            <?php endif; ?>

                            <?php if (get_sub_field('content')) : ?>
                                <div class="content-wrapper"><?php echo wp_kses_post(wpautop(get_sub_field('content'))); ?></div>
                            <?php endif; ?>

                            <?php get_theme_link(get_sub_field('link'), 'card-link'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('ketamine_howit_content') || have_rows('ketamine_safety')) : ?>
    <section class="howit-section">
        <div class="container">
            <div class="inner">
                <?php if (get_field('ketamine_howit_content')) : ?>
                    <div class="content-wrapper">
                        <?php echo get_field('ketamine_howit_content'); ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('ketamine_safety')) : ?>
                    <div class="safety">
                        <?php while (have_rows('ketamine_safety')) : the_row(); ?>
                            <?php if (get_sub_field('item')) : ?>
                                <div class="item">
                                    <div class="content-wrapper"><?php echo wp_kses_post(wpautop(get_sub_field('item'))); ?></div>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('ketamine_process_content') || have_rows('ketamine_processes')) : ?>
    <section class="steps-section" id="process">
        <div class="container">
            <?php if (get_field('ketamine_process_content')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('ketamine_process_content'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('ketamine_processes')) : ?>
                <div class="inner">
                    <?php $step = 1; ?>
                    <?php while (have_rows('ketamine_processes')) : the_row(); ?>
                        <div class="item">
                            <div class="number"><?php echo (int) $step; ?></div>

                            <div class="info">
                                <?php if (get_sub_field('title')) : ?>
                                    <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                                <?php endif; ?>

                                <?php if (get_sub_field('content')) : ?>
                                    <div class="content-wrapper"><?php echo wp_kses_post(wpautop(get_sub_field('content'))); ?></div>
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

<?php if (get_field('ketamine_faq_title') || have_rows('ketamine_faqs')) : ?>
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="inner">
                <?php if (get_field('ketamine_faq_title')) : ?>
                    <div class="heading content-wrapper">
                        <?php echo get_field('ketamine_faq_title'); ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('ketamine_faqs')) : ?>
                    <div class="list">
                        <?php while (have_rows('ketamine_faqs')) : the_row(); ?>
                            <?php if ((get_sub_field('title') ?: get_sub_field('question')) || (get_sub_field('content') ?: get_sub_field('answer'))) : ?>
                                <div class="item">
                                    <?php if (get_sub_field('title') ?: get_sub_field('question')) : ?>
                                        <h3><?php echo esc_html(get_sub_field('title') ?: get_sub_field('question')); ?></h3>
                                    <?php endif; ?>

                                    <?php if (get_sub_field('content') ?: get_sub_field('answer')) : ?>
                                        <div class="content-wrapper"><?php echo wp_kses_post(wpautop(get_sub_field('content') ?: get_sub_field('answer'))); ?></div>
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

<?php if (get_field('ketamine_cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo get_field('ketamine_cta_content'); ?>
                </div>

                <?php
                $phones = array_filter(array_map('trim', explode(',', get_theme_option('telephone') ?: '')));
                $call_number = $phones ? reset($phones) : '';
                ?>

                <?php if (!empty(get_theme_option('appointment_link')['url']) || $call_number) : ?>
                    <div class="buttons">
                        <?php get_theme_link(get_theme_option('appointment_link'), 'theme-blue'); ?>

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

<?php if (get_field('ketamine_credentials_content')) : ?>
    <section class="credentials-section">
        <div class="container">
            <div class="inner">
                <div class="badge">
                    <?php get_image(get_field('ketamine_credentials_image'), 'medium'); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo get_field('ketamine_credentials_content'); ?>

                    <?php get_theme_link(get_field('ketamine_credentials_link'), 'credentials-link'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>