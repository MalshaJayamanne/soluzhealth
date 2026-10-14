<?php
/**
 * Template Name: Ketamine
 */
get_header();

$appointment = get_theme_option('appointment_link');
$telephone   = get_theme_option('telephone');

/**
 * Builds href / target / rel attributes from an ACF Link array.
 */
$link_attrs = function ($link) {
    $target = !empty($link['target']) ? $link['target'] : '_self';
    $rel    = ($target === '_blank') ? ' rel="noopener noreferrer"' : '';
    return 'href="' . esc_url($link['url']) . '" target="' . esc_attr($target) . '"' . $rel;
};

/**
 * Returns the first non-empty repeater sub field from a list of possible names.
 */
$sub_field = function (array $names) {
    foreach ($names as $name) {
        $value = get_sub_field($name);
        if ($value) {
            return $value;
        }
    }
    return '';
};

// First phone number from the theme option (used for the "Call" button)
$call_number = '';
if ($telephone) {
    $phones      = array_filter(array_map('trim', explode(',', $telephone)));
    $call_number = $phones ? reset($phones) : '';
}
?>

<?php
/* ==================== PAGE HERO ==================== */
$ketamine_content = get_field('ketamine_content');
$ketamine_image   = get_field('ketamine_image');
?>
<?php if ($ketamine_content || $ketamine_image) : ?>
    <section class="page-hero-section">
        <?php if ($ketamine_image) : ?>
            <div class="page-hero-bg">
                <?php get_image($ketamine_image, 'full', get_bloginfo('name'), FALSE); ?>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <?php echo esc_html(get_the_title()); ?>
                </div>

                <?php if ($ketamine_content) : ?>
                    <div class="content">
                        <?php echo $ketamine_content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== WHAT KETAMINE DOES ==================== */
$what_content = get_field('what_ketamine_content');
$what_image   = get_field('what_ketamine_image');
?>
<?php if ($what_content || $what_image) : ?>
    <section class="what-section">
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
/* ==================== KETAMINE IN SAN ANTONIO ==================== */
$local_content = get_field('ketamine_san_antonio_content');
?>
<?php if ($local_content) : ?>
    <section class="local-section">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php echo $local_content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== CONDITIONS ==================== */
$cond_content = get_field('ketamine_conditions_content');
?>
<?php if ($cond_content || have_rows('ketamine_conditions')) : ?>
    <section class="cond-section">
        <div class="container">
            <?php if ($cond_content) : ?>
                <div class="heading">
                    <?php echo $cond_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('ketamine_conditions')) : ?>
                <div class="inner">
                    <?php while (have_rows('ketamine_conditions')) : the_row(); ?>
                        <?php
                        $cond_title   = get_sub_field('title');
                        $cond_text    = get_sub_field('content');
                        $cond_link    = get_sub_field('link');
                        ?>
                        <div class="item">
                            <?php if ($cond_title) : ?>
                                <h3><?php echo esc_html($cond_title); ?></h3>
                            <?php endif; ?>
                            <?php if ($cond_text) : ?>
                                <?php echo wp_kses_post(wpautop($cond_text)); ?>
                            <?php endif; ?>
                            <?php if (!empty($cond_link['url'])) : ?>
                                <a <?php echo $link_attrs($cond_link); ?> class="card-link">
                                    <?php echo esc_html($cond_link['title']); ?>
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
/* ==================== HOW IT WORKS ==================== */
$howit_content = get_field('ketamine_howit_content');
?>
<?php if ($howit_content || have_rows('ketamine_safety')) : ?>
    <section class="howit-section">
        <div class="container">
            <div class="inner">

                <?php if ($howit_content) : ?>
                    <div class="content">
                        <?php echo $howit_content; ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('ketamine_safety')) : ?>
                    <div class="safety">
                        <?php while (have_rows('ketamine_safety')) : the_row(); ?>
                            <?php if ($safety_text = get_sub_field('item')) : ?>
                                <div class="item">
                                    <span class="check" aria-hidden="true">✓</span>
                                    <div class="text">
                                        <?php echo wp_kses_post($safety_text); ?>
                                    </div>

                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== PROCESS (WHAT TO EXPECT) ==================== */
$steps_content = get_field('ketamine_process_content');
?>
<?php if ($steps_content || have_rows('ketamine_processes')) : ?>
    <section class="steps-section">
        <div class="container">
            <?php if ($steps_content) : ?>
                <div class="heading">
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
                                <?php if ($step_title = get_sub_field('title')) : ?>
                                    <h3><?php echo esc_html($step_title); ?></h3>
                                <?php endif; ?>
                                <?php if ($step_text = get_sub_field('content')) : ?>
                                    <?php echo wp_kses_post(wpautop($step_text)); ?>
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

<?php
/* ==================== FAQ ==================== */
$faq_title = get_field('ketamine_faq_title');
?>
<?php if ($faq_title || have_rows('ketamine_faqs')) : ?>
    <section class="faq-section">
        <div class="container">
            <div class="inner">
                <?php if ($faq_title) : ?>
                    <div class="heading">
                        <?php echo $faq_title; ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('ketamine_faqs')) : ?>
                    <div class="list">
                        <?php while (have_rows('ketamine_faqs')) : the_row(); ?>
                            <?php
                            $faq_question = $sub_field(array('title', 'question'));
                            $faq_answer   = $sub_field(array('content', 'answer'));
                            ?>
                            <?php if ($faq_question || $faq_answer) : ?>
                                <div class="item">
                                    <?php if ($faq_question) : ?>
                                        <h3><?php echo esc_html($faq_question); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($faq_answer) : ?>
                                        <?php echo wp_kses_post(wpautop($faq_answer)); ?>
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

<?php
/* ==================== CTA ==================== */
$cta_content = get_field('ketamine_cta_content');
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

<?php
/* ==================== CREDENTIALS (ASKP3) ==================== */
$cred_image   = get_field('ketamine_credentials_image');
$cred_content = get_field('ketamine_credentials_content');
$cred_link    = get_field('ketamine_credentials_link');
?>
<?php if ($cred_image || $cred_content) : ?>
    <section class="credentials-section">
        <div class="container">
            <div class="inner">
                <?php if ($cred_image) : ?>
                    <div class="badge">
                        <?php get_image($cred_image, 'medium', get_bloginfo('name')); ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php echo $cred_content; ?>

                    <?php if (!empty($cred_link['url'])) : ?>
                        <a <?php echo $link_attrs($cred_link); ?> class="credentials-link">
                            <?php echo esc_html($cred_link['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>