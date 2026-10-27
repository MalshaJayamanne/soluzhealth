<?php
/** Template Name: TMS **/
get_header();
?>

<?php if (get_field('tms_hero_content')) : ?>
    <section class="page-hero-section tms-hero">
        <?php get_image(get_field('tms_hero_image'), 'full', get_bloginfo('name'), false); ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <?php get_theme_link(array('url' => home_url('/'), 'title' => 'Home')); ?>
                    / <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo get_field('tms_hero_content'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('what_tms_content')) : ?>
    <section class="tms-what-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo get_field('what_tms_content'); ?>
                </div>

                <div class="image">
                    <?php get_image(get_field('what_tms_image'), 'large'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('tms_timeline_content') || have_rows('tms_timelines')) : ?>
    <section class="tms-day-section">
        <div class="container">
            <?php if (get_field('tms_timeline_content')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('tms_timeline_content'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('tms_timelines')) : ?>
                <div class="timeline">
                    <?php if (get_field('tms_timeline_title')) : ?>
                        <h3><?php echo esc_html(get_field('tms_timeline_title')); ?></h3>
                    <?php endif; ?>

                    <?php while (have_rows('tms_timelines')) : the_row(); ?>
                        <div class="item">
                            <div class="time">
                                <?php echo esc_html(get_sub_field('time')); ?>

                                <?php if (get_sub_field('abbreviation')) : ?>
                                    <span class="abbr"><?php echo esc_html(get_sub_field('abbreviation')); ?></span>
                                <?php endif; ?>
                            </div>

                            <?php if (get_sub_field('note')) : ?>
                                <div class="note"><?php echo esc_html(get_sub_field('note')); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('tms_system_content')) : ?>
    <section class="tms-system-section">
        <div class="container">
            <?php if (get_field('tms_system_title')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('tms_system_title'); ?>
                </div>
            <?php endif; ?>

            <div class="showcase">
                <div class="image">
                    <?php get_image(get_field('tms_system_image'), 'large'); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo get_field('tms_system_content'); ?>

                    <?php if (have_rows('tms_features')) : ?>
                        <ul class="features">
                            <?php while (have_rows('tms_features')) : the_row(); ?>
                                <?php if (get_sub_field('item')) : ?>
                                    <li><?php echo esc_html(get_sub_field('item')); ?></li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('tms_efficiency_content') || have_rows('tms_efficiency_cards')) : ?>
    <section class="tms-results-section">
        <div class="container">
            <?php if (get_field('tms_efficiency_content')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('tms_efficiency_content'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('tms_efficiency_cards')) : ?>
                <div class="inner">
                    <?php while (have_rows('tms_efficiency_cards')) : the_row(); ?>
                        <div class="item">
                            <?php if (get_sub_field('label')) : ?>
                                <div class="number"><?php echo esc_html(get_sub_field('label')); ?></div>
                            <?php endif; ?>

                            <?php if (get_sub_field('text')) : ?>
                                <p class="text"><?php echo esc_html(get_sub_field('text')); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('tms_expect_content')) : ?>
    <section class="tms-expect-section">
        <div class="container">
            <div class="inner">
                <div class="image">
                    <?php get_image(get_field('tms_expect_image'), 'large'); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo get_field('tms_expect_content'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('tms_combo_content')) : ?>
    <section class="tms-combo-section">
        <div class="container">
            <div class="heading content-wrapper">
                <?php echo get_field('tms_combo_content'); ?>
            </div>

            <?php if (get_field('tms_work_together')['content']) : ?>
                <div class="callout">
                    <?php echo get_field('tms_work_together')['content']; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('tms_right_content') || have_rows('tms_rights')) : ?>
    <section class="tms-fit-section">
        <div class="container">
            <div class="inner">
                <?php if (get_field('tms_right_content')) : ?>
                    <div class="content-wrapper">
                        <?php echo get_field('tms_right_content'); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field('tms_right_text') || have_rows('tms_rights')) : ?>
                    <div class="box">
                        <?php if (get_field('tms_right_text')) : ?>
                            <h3><?php echo esc_html(get_field('tms_right_text')); ?></h3>
                        <?php endif; ?>

                        <?php if (have_rows('tms_rights')) : ?>
                            <ul>
                                <?php while (have_rows('tms_rights')) : the_row(); ?>
                                    <?php if (get_sub_field('label')) : ?>
                                        <li><?php echo esc_html(get_sub_field('label')); ?></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('tms_certifications')) : ?>
    <section class="tms-cert-section">
        <div class="container">
            <?php while (have_rows('tms_certifications')) : the_row(); ?>
                <div class="item">
                    <div class="badge">
                        <?php get_image(get_sub_field('image'), 'medium'); ?>
                    </div>

                    <?php if (get_sub_field('content')) : ?>
                        <div class="content-wrapper">
                            <?php echo get_sub_field('content'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('tms_cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo get_field('tms_cta_content'); ?>
                </div>

                <?php if (get_field('appointment_link') ?: get_theme_option('appointment_link')) : ?>
                    <div class="buttons">
                        <?php get_theme_link(get_field('appointment_link') ?: get_theme_option('appointment_link'), 'theme-blue'); ?>

                        <?php get_theme_link(get_field('phone') ?: get_theme_option('phone'), 'theme-outline'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>