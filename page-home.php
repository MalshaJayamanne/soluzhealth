<?php
/**
 * Template Name: Home
 */
get_header();

/**
 * Builds href / target / rel attributes from an ACF Link array.
 */
$link_attrs = function ($link) {
    $target = !empty($link['target']) ? $link['target'] : '_self';
    $rel    = ($target === '_blank') ? ' rel="noopener noreferrer"' : '';
    return 'href="' . esc_url($link['url']) . '" target="' . esc_attr($target) . '"' . $rel;
};

/**
 * Number (0-5) => Font Awesome stars.
 */
$stars = function ($rating) {
    $count = max(0, min(5, (int) round((float) $rating)));
    $html  = '';

    for ($i = 0; $i < $count; $i++) {
        $html .= '<i class="fa-solid fa-star" aria-hidden="true"></i>';
    }

    return $html;
};
?>

<?php if ($hero_content = get_field('hero_content')) : ?>
    <section class="hero-section" id="home">
        <?php if ($hero_image = get_field('hero_image')) : ?>
            <div class="hero-bg">
                <?php get_image($hero_image, 'full', get_bloginfo('name'), false); ?>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="inner">
                <?php if ($hero_logo = get_field('hero_logo_wordmark')) : ?>
                    <div class="hero-logo">
                        <?php get_image($hero_logo, 'full', get_bloginfo('name'), false); ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php echo $hero_content; ?>
                </div>

                <?php if (($appointment = get_theme_option('appointment_link')) && !empty($appointment['url'])) : ?>
                    <div class="buttons">
                        <a <?php echo $link_attrs($appointment); ?> class="theme-blue">
                            <?php echo esc_html($appointment['title']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($welcome_content = get_field('welcome_content')) : ?>
    <section class="welcome-section" id="about">
        <div class="container">
            <div class="inner">
                <?php if ($welcome_image = get_field('welcome_image')) : ?>
                    <div class="image">
                        <?php get_image($welcome_image, 'large'); ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php echo $welcome_content; ?>

                    <?php if (have_rows('features')) : ?>
                        <ul class="features">
                            <?php while (have_rows('features')) : the_row(); ?>
                                <?php if ($feature = get_sub_field('item')) : ?>
                                    <li><?php echo esc_html($feature); ?></li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (($welcome_link = get_field('welcome_link')) && !empty($welcome_link['url'])) : ?>
                        <div class="buttons">
                            <a <?php echo $link_attrs($welcome_link); ?> class="theme-outline">
                                <?php echo esc_html($welcome_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (($work_title = get_field('work_title')) || have_rows('work_cards')) : ?>
    <section class="work-section">
        <div class="container">
            <?php if ($work_title) : ?>
                <div class="heading">
                    <?php echo $work_title; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('work_cards')) : ?>
                <div class="inner">
                    <?php while (have_rows('work_cards')) : the_row(); ?>
                        <div class="item">
                            <?php if ($title = get_sub_field('title')) : ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if ($content = get_sub_field('content')) : ?>
                                <?php echo wp_kses_post(wpautop($content)); ?>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (($treatment_content = get_field('treatment_content')) || have_rows('treatments')) : ?>
    <section class="treatment-section">
        <div class="container">
            <?php if ($treatment_content) : ?>
                <div class="heading">
                    <?php echo $treatment_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('treatments')) : ?>
                <div class="inner">
                    <?php while (have_rows('treatments')) : the_row(); ?>
                        <div class="item">
                            <?php if ($title = get_sub_field('title')) : ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php echo get_sub_field('content'); ?>
                            <?php if (($link = get_sub_field('link')) && !empty($link['url'])) : ?>
                                <a <?php echo $link_attrs($link); ?> class="more-link">
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

<?php if (($conditions_content = get_field('conditions_content')) || have_rows('conditions')) : ?>
    <section class="conditions-section" id="conditions">
        <div class="container">
            <?php if ($conditions_content) : ?>
                <div class="heading">
                    <?php echo $conditions_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('conditions')) : ?>
                <div class="inner">
                    <?php while (have_rows('conditions')) : the_row(); ?>
                        <div class="item">
                            <?php if ($title = get_sub_field('title')) : ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if ($content = get_sub_field('content')) : ?>
                                <?php echo wp_kses_post(wpautop($content)); ?>
                            <?php endif; ?>
                            <?php if (($link = get_sub_field('link')) && !empty($link['url'])) : ?>
                                <a <?php echo $link_attrs($link); ?> class="more-link">
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

<?php if (($process_title = get_field('process_title')) || have_rows('processes')) : ?>
    <section class="process-section" id="process">
        <div class="container">
            <?php if ($process_title) : ?>
                <div class="heading">
                    <?php echo $process_title; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('processes')) : ?>
                <div class="inner">
                    <?php $step = 1; ?>
                    <?php while (have_rows('processes')) : the_row(); ?>
                        <div class="step">
                            <div class="number"><?php echo sprintf('%02d', $step); ?></div>
                            <?php if ($title = get_sub_field('title')) : ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            <?php if ($content = get_sub_field('content')) : ?>
                                <?php echo wp_kses_post(wpautop($content)); ?>
                            <?php endif; ?>
                        </div>
                        <?php $step++; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if ($doctor_content = get_field('doctor_content')) : ?>
    <section class="doctor-section" id="team">
        <div class="container">
            <div class="inner">
                <?php if ($doctor_image = get_field('doctor_image')) : ?>
                    <div class="image">
                        <?php get_image($doctor_image, 'large'); ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php echo $doctor_content; ?>

                    <?php if (($team_review = get_field('team_review')) && !empty($team_review['content'])) : ?>
                        <div class="review">
                            <div class="score">
                                <?php if (isset($team_review['rating']) && $team_review['rating'] !== '') : ?>
                                    <strong><?php echo esc_html(number_format((float) $team_review['rating'], 1)); ?></strong>
                                    <span class="stars"><?php echo $stars($team_review['rating']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($team_review['text'])) : ?>
                                    <h5 class="label"><?php echo esc_html($team_review['text']); ?></h5>
                                <?php endif; ?>
                            </div>
                            <div class="quote">
                                <?php echo wp_kses_post(wpautop($team_review['content'])); ?>
                                <?php if (!empty($team_review['reviewer'])) : ?>
                                    <h6 class="reviewer"><?php echo esc_html($team_review['reviewer']); ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (($team_link = get_field('team_link')) && !empty($team_link['url'])) : ?>
                        <div class="buttons">
                            <a <?php echo $link_attrs($team_link); ?> class="theme-blue">
                                <?php echo esc_html($team_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (($patient_title = get_field('patient_title')) || have_rows('reviews')) : ?>
    <section class="patient-section">
        <div class="container">
            <div class="heading">
                <?php if ($patient_title) : ?>
                    <div class="title">
                        <?php echo $patient_title; ?>
                    </div>
                <?php endif; ?>

                <?php if (($review_stat = get_field('review_stat')) && !empty($review_stat['current'])) : ?>
                    <div class="stat">
                        <div class="rating">
                            <?php echo esc_html(number_format((float) $review_stat['current'], 1)); ?>
                            <?php if (!empty($review_stat['overall'])) : ?>
                                <span>/ <?php echo esc_html((float) $review_stat['overall']); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="stars"><?php echo $stars($review_stat['current']); ?></div>
                        <?php if (!empty($review_stat['text'])) : ?>
                            <h5 class="label"><?php echo esc_html($review_stat['text']); ?></h5>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (have_rows('reviews')) : ?>
                <div class="inner">
                    <?php while (have_rows('reviews')) : the_row(); ?>
                        <div class="item">
                            <?php if ($rating = get_sub_field('rating')) : ?>
                                <div class="stars"><?php echo $stars($rating); ?></div>
                            <?php endif; ?>
                            <?php if ($content = get_sub_field('content')) : ?>
                                <?php echo wp_kses_post(wpautop($content)); ?>
                            <?php endif; ?>
                            <?php if ($patient = get_sub_field('patient')) : ?>
                                <h6 class="patient"><?php echo esc_html($patient); ?></h6>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if ($contact_content = get_field('contact_content')) : ?>
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php echo $contact_content; ?>
                </div>

                <?php if (($appointment = get_theme_option('appointment_link')) && !empty($appointment['url'])) : ?>
                    <div class="buttons">
                        <a <?php echo $link_attrs($appointment); ?> class="theme-blue">
                            <?php echo esc_html($appointment['title']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>