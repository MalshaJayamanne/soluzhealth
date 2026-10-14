<?php
/**
 * Template Name: About
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

// First phone number from the theme option (used for the "Call" button)
$call_number = '';
if ($telephone) {
    $phones      = array_filter(array_map('trim', explode(',', $telephone)));
    $call_number = $phones ? reset($phones) : '';
}
?>

<?php
/* ==================== PAGE HERO ==================== */
$about_title   = get_field('about_title');
$about_content = get_field('about_content');
// Optional background: an "about_image" field on this page, otherwise the home page hero image
$about_image   = get_field('about_image') ?: get_field('hero_image', get_option('page_on_front'));
?>
<?php if ($about_title || $about_content) : ?>
    <section class="page-hero-section">
        <?php if ($about_image) : ?>
            <div class="page-hero-bg">
                <?php get_image($about_image, 'full', get_bloginfo('name'), FALSE); ?>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <?php echo esc_html(get_the_title()); ?>
                </div>

                <?php if ($about_title) : ?>
                    <h1><?php echo wp_kses($about_title, array('span' => array(), 'em' => array())); ?></h1>
                <?php endif; ?>

                <?php if ($about_content) : ?>
                    <div class="content">
                        <?php echo $about_content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== STAT BAR ==================== */
?>
<?php if (have_rows('about_features')) : ?>
    <section class="stats-section">
        <div class="container">
            <div class="inner">
                <?php while (have_rows('about_features')) : the_row(); ?>
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
/* ==================== MISSION ==================== */
$mission_image   = get_field('mission_image');
$mission_content = get_field('mission_content');
$mission_link    = get_field('mission_link');
?>
<?php if ($mission_image || $mission_content) : ?>
    <section class="mission-section">
        <div class="container">
            <div class="inner">
                <?php if ($mission_image) : ?>
                    <div class="image">
                        <?php get_image($mission_image, 'large', get_bloginfo('name'), FALSE); ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php echo $mission_content; ?>

                    <?php if (!empty($mission_link['url'])) : ?>
                        <div class="buttons">
                            <a <?php echo $link_attrs($mission_link); ?> class="theme-blue">
                                <?php echo esc_html($mission_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== TEAM ==================== */
$team_content = get_field('team_content');
?>
<?php if ($team_content || have_rows('members')) : ?>
    <section class="team-section" id="team">
        <div class="container">
            <?php if ($team_content) : ?>
                <div class="heading">
                    <?php echo $team_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('members')) : ?>
                <div class="inner">
                    <?php while (have_rows('members')) : the_row(); ?>
                        <?php
                        $member_image   = get_sub_field('image');
                        $member_content = get_sub_field('content');
                        ?>
                        <div class="item">
                            <?php if ($member_image) : ?>
                                <div class="photo">
                                    <?php get_image($member_image, 'medium_large', get_bloginfo('name')); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($member_content) : ?>
                                <div class="info">
                                    <?php echo $member_content; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== AWARDS ==================== */
?>
<?php if (have_rows('awards')) : ?>
    <section class="awards-section">
        <div class="container">
            <div class="inner">
                <?php $award_index = 0; ?>
                <?php while (have_rows('awards')) : the_row(); ?>
                    <?php if ($award_index > 0) : ?>
                        <span class="divider" aria-hidden="true"></span>
                    <?php endif; ?>
                    <div class="item">
                        <?php if ($icon = get_sub_field('icon')) : ?>
                            <div class="icon"><?php echo esc_html($icon); ?></div>
                        <?php endif; ?>
                        <?php echo get_sub_field('content'); ?>
                    </div>
                    <?php $award_index++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== VALUES ==================== */
// Field is currently named "title"; "values_title" also works if you rename it later
$values_title = get_field('values_title') ?: get_field('title');
?>
<?php if ($values_title || have_rows('values')) : ?>
    <section class="values-section">
        <div class="container">
            <?php if ($values_title) : ?>
                <div class="heading">
                    <?php echo $values_title; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('values')) : ?>
                <div class="inner">
                    <?php $value_step = 1; ?>
                    <?php while (have_rows('values')) : the_row(); ?>
                        <div class="item">
                            <div class="number"><?php echo sprintf('%02d', $value_step); ?></div>
                            <?php echo get_sub_field('content'); ?>
                        </div>
                        <?php $value_step++; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php
/* ==================== CTA ==================== */
$cta_content = get_field('cta_content');
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