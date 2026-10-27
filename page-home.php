<?php
/** Template Name: Home **/
get_header();
?>

<?php if (get_field('hero_content')) : ?>
    <section class="hero-section" id="home">
        <?php get_image(get_field('hero_image'), 'full', get_bloginfo('name'), false); ?>

        <div class="container">
            <div class="inner">
                <?php get_image(get_field('hero_logo_wordmark'), 'full', get_bloginfo('name'), false); ?>

                <div class="content-wrapper">
                    <?php echo get_field('hero_content'); ?>
                </div>

                <div class="buttons">
                    <?php get_theme_link(get_theme_option('appointment_link'), 'theme-blue'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('welcome_content')) : ?>
    <section class="welcome-section" id="about">
        <div class="container">
            <div class="inner">
                <div class="image">
                    <?php get_image(get_field('welcome_image'), 'large'); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo get_field('welcome_content'); ?>

                    <?php if (have_rows('features')) : ?>
                        <ul class="features">
                            <?php while (have_rows('features')) : the_row(); ?>
                                <?php if (get_sub_field('item')) : ?>
                                    <li><?php echo esc_html(get_sub_field('item')); ?></li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="buttons">
                        <?php get_theme_link(get_field('welcome_link'), 'theme-outline'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('work_title') || have_rows('work_cards')) : ?>
    <section class="work-section">
        <div class="container">
            <?php if (get_field('work_title')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('work_title'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('work_cards')) : ?>
                <div class="inner">
                    <?php while (have_rows('work_cards')) : the_row(); ?>
                        <div class="item">
                            <?php if (get_sub_field('title')) : ?>
                                <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                            <?php endif; ?>

                            <?php if (get_sub_field('content')) : ?>
                                <div class="content-wrapper"><?php echo wp_kses_post(wpautop(get_sub_field('content'))); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('treatment_content') || have_rows('treatments')) : ?>
    <section class="treatment-section">
        <div class="container">
            <?php if (get_field('treatment_content')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('treatment_content'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('treatments')) : ?>
                <div class="inner">
                    <?php while (have_rows('treatments')) : the_row(); ?>
                        <div class="item">
                            <?php if (get_sub_field('title')) : ?>
                                <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                            <?php endif; ?>

                            <?php if (get_sub_field('content')) : ?>
                                <div class="content-wrapper"><?php echo wp_kses_post(wpautop(get_sub_field('content'))); ?></div>
                            <?php endif; ?>

                            <?php get_theme_link(get_sub_field('link'), 'more-link'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('conditions_content') || have_rows('conditions')) : ?>
    <section class="conditions-section" id="conditions">
        <div class="container">
            <?php if (get_field('conditions_content')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('conditions_content'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('conditions')) : ?>
                <div class="inner">
                    <?php while (have_rows('conditions')) : the_row(); ?>
                        <div class="item">
                            <?php if (get_sub_field('title')) : ?>
                                <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                            <?php endif; ?>

                            <?php if (get_sub_field('content')) : ?>
                                <div class="content-wrapper"><?php echo wp_kses_post(wpautop(get_sub_field('content'))); ?></div>
                            <?php endif; ?>

                            <?php get_theme_link(get_sub_field('link'), 'more-link'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('process_title') || have_rows('processes')) : ?>
    <section class="process-section" id="process">
        <div class="container">
            <?php if (get_field('process_title')) : ?>
                <div class="heading content-wrapper">
                    <?php echo get_field('process_title'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('processes')) : ?>
                <div class="inner">
                    <?php $step = 1; ?>
                    <?php while (have_rows('processes')) : the_row(); ?>
                        <div class="step">
                            <div class="number"><?php echo sprintf('%02d', $step); ?></div>

                            <?php if (get_sub_field('title')) : ?>
                                <h3><?php echo esc_html(get_sub_field('title')); ?></h3>
                            <?php endif; ?>

                            <?php if (get_sub_field('content')) : ?>
                                <div class="content-wrapper"><?php echo wp_kses_post(wpautop(get_sub_field('content'))); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php $step++; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('doctor_content')) : ?>
    <section class="doctor-section" id="team">
        <div class="container">
            <div class="inner">
                <div class="image">
                    <?php get_image(get_field('doctor_image'), 'large'); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo get_field('doctor_content'); ?>

                    <?php if (get_field('team_review') && !empty(get_field('team_review')['content'])) : ?>
                        <div class="review">
                            <div class="score">
                                <?php if (isset(get_field('team_review')['rating']) && get_field('team_review')['rating'] !== '') : ?>
                                    <strong><?php echo esc_html(number_format((float) get_field('team_review')['rating'], 1)); ?></strong>
                                    <div class="stars" aria-label="5 out of 5 stars"><i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i></div>
                                <?php endif; ?>

                                <?php if (!empty(get_field('team_review')['text'])) : ?>
                                    <h5 class="label"><?php echo esc_html(get_field('team_review')['text']); ?></h5>
                                <?php endif; ?>
                            </div>

                            <div class="quote">
                                <?php echo wp_kses_post(wpautop(get_field('team_review')['content'])); ?>

                                <?php if (!empty(get_field('team_review')['reviewer'])) : ?>
                                    <h6 class="reviewer"><?php echo esc_html(get_field('team_review')['reviewer']); ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="buttons">
                        <?php get_theme_link(get_field('team_link'), 'theme-blue'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('patient_title') || have_rows('reviews')) : ?>
    <section class="patient-section">
        <div class="container">
            <div class="heading content-wrapper">
                <?php if (get_field('patient_title')) : ?>
                    <div class="title">
                        <?php echo get_field('patient_title'); ?>
                    </div>
                <?php endif; ?>

                <?php if (get_field('review_stat') && !empty(get_field('review_stat')['current'])) : ?>
                    <div class="stat">
                        <div class="rating">
                            <?php echo esc_html(number_format((float) get_field('review_stat')['current'], 1)); ?>

                            <?php if (!empty(get_field('review_stat')['overall'])) : ?>
                                <span>/ <?php echo esc_html((float) get_field('review_stat')['overall']); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="stars" aria-label="5 out of 5 stars"><i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i></div>

                        <?php if (!empty(get_field('review_stat')['text'])) : ?>
                            <h5 class="label"><?php echo esc_html(get_field('review_stat')['text']); ?></h5>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (have_rows('reviews')) : ?>
                <div class="inner">
                    <?php while (have_rows('reviews')) : the_row(); ?>
                        <div class="item">
                            <?php if (get_sub_field('rating')) : ?>
                                <div class="stars" aria-label="5 stars"><i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i> <i class="fa-solid fa-star" aria-hidden="true"></i></div>
                            <?php endif; ?>

                            <?php if (get_sub_field('content')) : ?>
                                <div class="content-wrapper"><?php echo wp_kses_post(wpautop(get_sub_field('content'))); ?></div>
                            <?php endif; ?>

                            <?php if (get_sub_field('patient')) : ?>
                                <h6 class="patient"><?php echo esc_html(get_sub_field('patient')); ?></h6>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('contact_content')) : ?>
    <section class="contact-section" id="contact">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo get_field('contact_content'); ?>
                </div>

                <div class="buttons">
                    <?php get_theme_link(get_theme_option('appointment_link'), 'theme-blue'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>