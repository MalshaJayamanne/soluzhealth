<?php
/**
 * Template Name: Depression
 */
get_header();

$appointment = get_field('appointment_link') ?: get_theme_option('appointment_link');
$telephone   = get_theme_option('telephone');

/**
 * Builds href / target / rel attributes from an ACF Link array.
 */
$link_attrs = function ($link) {
    $target = !empty($link['target']) ? $link['target'] : '_self';
    $rel    = ($target === '_blank') ? ' rel="noopener noreferrer"' : '';
    return 'href="' . esc_url($link['url']) . '" target="' . esc_attr($target) . '"' . $rel;
};

$call_number = '';
if ($telephone) {
    $phones      = array_filter(array_map('trim', explode(',', $telephone)));
    $call_number = $phones ? reset($phones) : '';
}
?>

<?php
/* ==================== PAGE HERO ==================== */
$hero_image   = get_field('dp_hero_image');
$hero_content = get_field('dp_hero_content');
?>
<?php if ($hero_image || $hero_content) : ?>
    <section class="page-hero-section dp-hero">
        <?php if ($hero_image) : ?>
            <div class="page-hero-bg">
                <?php get_image($hero_image, 'full'); ?>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> /
                    <a href="<?php echo esc_url(home_url('/ketamine/')); ?>">Treatments</a> /
                    <?php echo esc_html(get_the_title()); ?>
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
/* ==================== STAT BAR ==================== */
?>
<?php if (have_rows('dp_features')) : ?>
    <section class="stats-section">
        <div class="container">
            <div class="inner">
                <?php while (have_rows('dp_features')) : the_row(); ?>
                    <div class="item">
                        <?php if ($value = get_sub_field('value')) : ?>
                            <div class="number"><?php echo esc_html($value); ?></div>
                        <?php endif; ?>
                        <?php if ($name = get_sub_field('name')) : ?>
                            <div class="label"><?php echo esc_html($name); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== DEPRESSION TREATMENT ==================== */
$treatment_image   = get_field('dp_treatment_image');
$treatment_content = get_field('dp_treatment_content');
?>
<?php if ($treatment_image || $treatment_content) : ?>
    <section class="dp-treatment-section">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php echo $treatment_content; ?>

                    <?php if (!empty($appointment['url'])) : ?>
                        <div class="buttons">
                            <a <?php echo $link_attrs($appointment); ?> class="theme-blue">
                                <?php echo esc_html($appointment['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($treatment_image) : ?>
                    <div class="image">
                        <?php get_image($treatment_image, 'large'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== RECOGNIZING THE SIGNS ==================== */
$recognize_title = get_field('dp_recognize_title');
$recognize_note  = get_field('dp_recognize_note');
?>
<?php if ($recognize_title || have_rows('dp_signs')) : ?>
    <section class="dp-signs-section">
        <div class="container">
            <?php if ($recognize_title) : ?>
                <div class="heading">
                    <?php echo $recognize_title; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('dp_signs')) : ?>
                <ul class="signs">
                    <?php while (have_rows('dp_signs')) : the_row(); ?>
                        <?php if ($sign = get_sub_field('label')) : ?>
                            <li><?php echo esc_html($sign); ?></li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

            <?php if ($recognize_note) : ?>
                <p class="note"><?php echo esc_html($recognize_note); ?></p>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== OUR APPROACH ==================== */
$approach_content = get_field('dp_approach_content');
?>
<?php if ($approach_content || have_rows('dp_approaches')) : ?>
    <section class="dp-approach-section">
        <div class="container">
            <?php if ($approach_content) : ?>
                <div class="heading">
                    <?php echo $approach_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('dp_approaches')) : ?>
                <div class="inner">
                    <?php while (have_rows('dp_approaches')) : the_row(); ?>
                        <?php
                        $card_content = get_sub_field('content');
                        $card_link    = get_sub_field('link');
                        ?>
                        <div class="item">
                            <?php echo $card_content; ?>

                            <?php if (!empty($card_link['url'])) : ?>
                                <a <?php echo $link_attrs($card_link); ?> class="learn-link">
                                    <?php echo esc_html($card_link['title']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== CTA ==================== */
$cta_content = get_field('dp_cta_content');
?>
<?php if ($cta_content) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php echo $cta_content; ?>
                </div>

                <?php if (!empty($appointment['url']) || $call_number) : ?>
                    <div class="buttons">
                        <?php if (!empty($appointment['url'])) : ?>
                            <a <?php echo $link_attrs($appointment); ?> class="theme-blue">
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

<?php get_footer(); ?>