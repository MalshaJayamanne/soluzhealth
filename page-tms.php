<?php
/** Template Name: TMS **/
get_header();
?>

<?php if ($hero_content = get_field('tms_hero_content')) : ?>
    <section class="page-hero-section tms-hero">
        <?php if ($hero_image = get_field('tms_hero_image')) : ?>
            <?php get_image($hero_image, 'full', get_bloginfo('name'), false); ?>
        <?php endif; ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo $hero_content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($what_content = get_field('what_tms_content')) : ?>
    <section class="tms-what-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo $what_content; ?>
                </div>

                <?php if ($what_image = get_field('what_tms_image')) : ?>
                    <div class="image">
                        <?php get_image($what_image, 'large'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (($timeline_content = get_field('tms_timeline_content')) || have_rows('tms_timelines')) : ?>
    <section class="tms-day-section">
        <div class="container">
            <?php if ($timeline_content) : ?>
                <div class="heading content-wrapper">
                    <?php echo $timeline_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('tms_timelines')) : ?>
                <div class="timeline">
                    <?php if ($timeline_title = get_field('tms_timeline_title')) : ?>
                        <h3><?php echo esc_html($timeline_title); ?></h3>
                    <?php endif; ?>

                    <?php while (have_rows('tms_timelines')) : the_row(); ?>
                        <div class="item">
                            <div class="time">
                                <?php echo esc_html(get_sub_field('time')); ?>
                                <?php if ($abbr = get_sub_field('abbreviation')) : ?>
                                    <span class="abbr"><?php echo esc_html($abbr); ?></span>
                                <?php endif; ?>
                            </div>

                            <?php if ($note = get_sub_field('note')) : ?>
                                <div class="note"><?php echo esc_html($note); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if ($system_content = get_field('tms_system_content')) : ?>
    <section class="tms-system-section">
        <div class="container">
            <?php if ($system_title = get_field('tms_system_title')) : ?>
                <div class="heading content-wrapper">
                    <?php echo $system_title; ?>
                </div>
            <?php endif; ?>

            <div class="showcase">
                <?php if ($system_image = get_field('tms_system_image')) : ?>
                    <div class="image">
                        <?php get_image($system_image, 'large'); ?>
                    </div>
                <?php endif; ?>

                <div class="content-wrapper">
                    <?php echo $system_content; ?>

                    <?php if (have_rows('tms_features')) : ?>
                        <ul class="features">
                            <?php while (have_rows('tms_features')) : the_row(); ?>
                                <?php if ($feature = get_sub_field('item')) : ?>
                                    <li><?php echo esc_html($feature); ?></li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (($results_content = get_field('tms_efficiency_content')) || have_rows('tms_efficiency_cards')) : ?>
    <section class="tms-results-section">
        <div class="container">
            <?php if ($results_content) : ?>
                <div class="heading content-wrapper">
                    <?php echo $results_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('tms_efficiency_cards')) : ?>
                <div class="inner">
                    <?php while (have_rows('tms_efficiency_cards')) : the_row(); ?>
                        <div class="item">
                            <?php if ($card_label = get_sub_field('label')) : ?>
                                <div class="number"><?php echo esc_html($card_label); ?></div>
                            <?php endif; ?>

                            <?php if ($card_text = get_sub_field('text')) : ?>
                                <p class="text"><?php echo esc_html($card_text); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if ($expect_content = get_field('tms_expect_content')) : ?>
    <section class="tms-expect-section">
        <div class="container">
            <div class="inner">
                <?php if ($expect_image = get_field('tms_expect_image')) : ?>
                    <div class="image">
                        <?php get_image($expect_image, 'large'); ?>
                    </div>
                <?php endif; ?>

                <div class="content-wrapper">
                    <?php echo $expect_content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($combo_content = get_field('tms_combo_content')) : ?>
    <section class="tms-combo-section">
        <div class="container">
            <div class="heading content-wrapper">
                <?php echo $combo_content; ?>
            </div>

            <?php if (($work_together = get_field('tms_work_together')) && !empty($work_together['content'])) : ?>
                <div class="callout">
                    <?php echo $work_together['content']; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (($right_content = get_field('tms_right_content')) || have_rows('tms_rights')) : ?>
    <section class="tms-fit-section">
        <div class="container">
            <div class="inner">
                <?php if ($right_content) : ?>
                    <div class="content-wrapper">
                        <?php echo $right_content; ?>
                    </div>
                <?php endif; ?>

                <?php if (($right_text = get_field('tms_right_text')) || have_rows('tms_rights')) : ?>
                    <div class="box">
                        <?php if ($right_text) : ?>
                            <h3><?php echo esc_html($right_text); ?></h3>
                        <?php endif; ?>

                        <?php if (have_rows('tms_rights')) : ?>
                            <ul>
                                <?php while (have_rows('tms_rights')) : the_row(); ?>
                                    <?php if ($right_label = get_sub_field('label')) : ?>
                                        <li><?php echo esc_html($right_label); ?></li>
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
                    <?php if ($cert_image = get_sub_field('image')) : ?>
                        <div class="badge">
                            <?php get_image($cert_image, 'medium'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($cert_content = get_sub_field('content')) : ?>
                        <div class="content-wrapper">
                            <?php echo $cert_content; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php if ($cta_content = get_field('tms_cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo $cta_content; ?>
                </div>

                <?php $appointment = get_field('appointment_link') ?: get_theme_option('appointment_link'); ?>
                <?php $phone = get_field('phone') ?: get_theme_option('phone'); ?>

                <?php if (!empty($appointment['url']) || !empty($phone['url'])) : ?>
                    <div class="buttons">
                        <?php if (!empty($appointment['url'])) : ?>
                            <a <?php echo get_link_attrs($appointment); ?> class="theme-blue">
                                <?php echo esc_html($appointment['title']); ?>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($phone['url'])) : ?>
                            <a <?php echo get_link_attrs($phone); ?> class="theme-outline">
                                <?php echo esc_html(stripos($phone['title'], 'call') === false ? 'Call ' . $phone['title'] : $phone['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>