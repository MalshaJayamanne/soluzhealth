<?php
/** Template Name: Depression **/
get_header();
?>

<?php if (get_field('dp_hero_content')) : ?>
    <section class="page-hero-section dp-hero">
        <?php get_image(get_field('dp_hero_image'), 'full', get_bloginfo('name'), false); ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <?php get_theme_link(array('url' => home_url('/'), 'title' => 'Home')); ?> /
                    <?php get_theme_link(array('url' => home_url('/ketamine/'), 'title' => 'Treatments')); ?> /
                    <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo get_field('dp_hero_content'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('dp_features')) : ?>
    <section class="stats-section">
        <div class="container">
            <div class="inner">
                <?php while (have_rows('dp_features')) : the_row(); ?>
                    <div class="item">
                        <?php if (get_sub_field('value')) : ?>
                            <div class="number"><?php echo esc_html(get_sub_field('value')); ?></div>
                        <?php endif; ?>

                        <?php if (get_sub_field('name')) : ?>
                            <div class="label"><?php echo esc_html(get_sub_field('name')); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('dp_treatment_content')) : ?>
    <section class="dp-treatment-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo get_field('dp_treatment_content'); ?>

                    <?php if (get_field('appointment_link') ?: get_theme_option('appointment_link')) : ?>
                        <div class="buttons">
                            <?php get_theme_link(get_field('appointment_link') ?: get_theme_option('appointment_link'), 'theme-blue'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="image">
                    <?php get_image(get_field('dp_treatment_image'), 'large'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('dp_recognize_title') || have_rows('dp_signs')) : ?>
    <section class="dp-signs-section">
        <div class="container">
            <?php if (get_field('dp_recognize_title')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('dp_recognize_title'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('dp_signs')) : ?>
                <ul class="signs">
                    <?php while (have_rows('dp_signs')) : the_row(); ?>
                        <?php if (get_sub_field('label')) : ?>
                            <li><?php echo esc_html(get_sub_field('label')); ?></li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

            <?php if (get_field('dp_recognize_note')) : ?>
                <p class="note"><?php echo esc_html(get_field('dp_recognize_note')); ?></p>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('dp_approach_content') || have_rows('dp_approaches')) : ?>
    <section class="dp-approach-section">
        <div class="container">
            <?php if (get_field('dp_approach_content')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('dp_approach_content'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('dp_approaches')) : ?>
                <div class="inner">
                    <?php while (have_rows('dp_approaches')) : the_row(); ?>
                        <div class="item">
                            <?php if (get_sub_field('content')) : ?>
                                <div class="content-wrapper"><?php echo get_sub_field('content'); ?></div>
                            <?php endif; ?>

                            <?php get_theme_link(get_sub_field('link'), 'learn-link'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('dp_cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo get_field('dp_cta_content'); ?>
                </div>

                <?php
                $phones = array_filter(array_map('trim', explode(',', get_theme_option('telephone') ?: '')));
                $call_number = $phones ? reset($phones) : '';
                ?>

                <?php if ((get_field('appointment_link') ?: get_theme_option('appointment_link')) || $call_number) : ?>
                    <div class="buttons">
                        <?php get_theme_link(get_field('appointment_link') ?: get_theme_option('appointment_link'), 'theme-blue'); ?>

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

<?php get_footer(); ?>