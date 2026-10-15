<?php
/**
 * Template Name: TMS
 */
get_header();

// CTA buttons
$appointment = get_field('appointment_link') ?: get_theme_option('appointment_link');
$phone       = get_field('phone') ?: get_theme_option('phone');

/**
 * Builds href / target / rel attributes from an ACF Link array.
 */
$link_attrs = function ($link) {
    $target = !empty($link['target']) ? $link['target'] : '_self';
    $rel    = ($target === '_blank') ? ' rel="noopener noreferrer"' : '';
    return 'href="' . esc_url($link['url']) . '" target="' . esc_attr($target) . '"' . $rel;
};

// Phone button text
$phone_label = '';
if (!empty($phone['title'])) {
    $phone_label = $phone['title'];
    if (stripos($phone_label, 'call') === false) {
        $phone_label = 'Call ' . $phone_label;
    }
}
?>

<?php
/* ==================== PAGE HERO ==================== */
$hero_image   = get_field('tms_hero_image');
$hero_content = get_field('tms_hero_content');
?>
<?php if ($hero_image || $hero_content) : ?>
    <section class="page-hero-section tms-hero">
        <?php if ($hero_image) : ?>
            <div class="page-hero-bg">
                <?php get_image($hero_image, 'full', get_bloginfo('name'), FALSE); ?>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <?php echo esc_html(get_the_title()); ?>
                </div>

                <?php if ($hero_content) : ?>
                    <div class="content">
                        <?php echo $hero_content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== WHAT TMS IS ==================== */
$what_content = get_field('what_tms_content');
$what_image   = get_field('what_tms_image');
?>
<?php if ($what_content || $what_image) : ?>
    <section class="tms-what-section">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php echo $what_content; ?>
                </div>

                <?php if ($what_image) : ?>
                    <div class="image">
                        <?php get_image($what_image, 'large', get_bloginfo('name')); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== ONE-DAY TIMELINE ==================== */
$timeline_content = get_field('tms_timeline_content');
$timeline_title   = get_field('tms_timeline_title');
?>
<?php if ($timeline_content || have_rows('tms_timelines')) : ?>
    <section class="tms-day-section">
        <div class="container">
            <?php if ($timeline_content) : ?>
                <div class="heading">
                    <?php echo $timeline_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('tms_timelines')) : ?>
                <div class="timeline">
                    <?php if ($timeline_title) : ?>
                        <h3><?php echo esc_html($timeline_title); ?></h3>
                    <?php endif; ?>

                    <?php while (have_rows('tms_timelines')) : the_row(); ?>
                        <?php
                        $time = get_sub_field('time');
                        $abbr = get_sub_field('abbreviation');
                        $note = get_sub_field('note');
                        ?>
                        <div class="item">
                            <div class="time">
                                <?php echo esc_html($time); ?>
                                <?php if ($abbr) : ?>
                                    <span class="abbr"><?php echo esc_html($abbr); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="note"><?php echo esc_html($note); ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== SYSTEM SHOWCASE ==================== */
$system_title   = get_field('tms_system_title');
$system_image   = get_field('tms_system_image');
$system_content = get_field('tms_system_content');
?>
<?php if ($system_title || $system_image || $system_content) : ?>
    <section class="tms-system-section">
        <div class="container">
            <?php if ($system_title) : ?>
                <div class="heading">
                    <?php echo $system_title; ?>
                </div>
            <?php endif; ?>

            <?php if ($system_image || $system_content) : ?>
                <div class="showcase">
                    <?php if ($system_image) : ?>
                        <div class="image">
                            <?php get_image($system_image, 'large', get_bloginfo('name')); ?>
                        </div>
                    <?php endif; ?>

                    <div class="content">
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
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== EFFICENCY ==================== */
$results_content = get_field('tms_efficiency_content');
?>
<?php if ($results_content || have_rows('tms_efficiency_cards')) : ?>
    <section class="tms-results-section">
        <div class="container">
            <?php if ($results_content) : ?>
                <div class="heading">
                    <?php echo $results_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('tms_efficiency_cards')) : ?>
                <div class="inner">
                    <?php while (have_rows('tms_efficiency_cards')) : the_row(); ?>
                        <?php
                        $card_label = get_sub_field('label');
                        $card_text  = get_sub_field('text');
                        ?>
                        <div class="item">
                            <?php if ($card_label) : ?>
                                <div class="number"><?php echo esc_html($card_label); ?></div>
                            <?php endif; ?>
                            <?php if ($card_text) : ?>
                                <p class="text"><?php echo esc_html($card_text); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== WHAT TO EXPECT ==================== */
$expect_image   = get_field('tms_expect_image');
$expect_content = get_field('tms_expect_content');
?>
<?php if ($expect_image || $expect_content) : ?>
    <section class="tms-expect-section">
        <div class="container">
            <div class="inner">
                <?php if ($expect_image) : ?>
                    <div class="image">
                        <?php get_image($expect_image, 'large', get_bloginfo('name')); ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php echo $expect_content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== TMS + KETAMINE COMBO ==================== */
$combo_content = get_field('tms_combo_content');
$work_together = get_field('tms_work_together');
?>
<?php if ($combo_content || !empty($work_together['content'])) : ?>
    <section class="tms-combo-section">
        <div class="container">
            <?php if ($combo_content) : ?>
                <div class="heading">
                    <?php echo $combo_content; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($work_together['content'])) : ?>
                <div class="callout">
                    <?php echo $work_together['content']; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== WHO TMS WORKS BEST FOR ==================== */
$right_content = get_field('tms_right_content');
$right_text    = get_field('tms_right_text');
?>
<?php if ($right_content || have_rows('tms_rights')) : ?>
    <section class="tms-fit-section">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php echo $right_content; ?>
                </div>

                <?php if ($right_text || have_rows('tms_rights')) : ?>
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

<?php
/* ==================== CERTIFICATIONS ==================== */
?>
<?php if (have_rows('tms_certifications')) : ?>
    <section class="tms-cert-section">
        <div class="container">
            <?php while (have_rows('tms_certifications')) : the_row(); ?>
                <?php
                $cert_image   = get_sub_field('image');
                $cert_content = get_sub_field('content');
                ?>
                <div class="item">
                    <?php if ($cert_image) : ?>
                        <div class="badge">
                            <?php get_image($cert_image, 'medium', get_bloginfo('name')); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($cert_content) : ?>
                        <div class="content">
                            <?php echo $cert_content; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== CTA ==================== */
$cta_content = get_field('tms_cta_content');
?>
<?php if ($cta_content) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php echo $cta_content; ?>
                </div>

                <?php if (!empty($appointment['url']) || !empty($phone['url'])) : ?>
                    <div class="buttons">
                        <?php if (!empty($appointment['url'])) : ?>
                            <a <?php echo $link_attrs($appointment); ?> class="theme-blue">
                                <?php echo esc_html($appointment['title']); ?>
                            </a>
                        <?php endif; ?>
                        <?php if (!empty($phone['url'])) : ?>
                            <a <?php echo $link_attrs($phone); ?> class="theme-outline">
                                <?php echo esc_html($phone_label); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>