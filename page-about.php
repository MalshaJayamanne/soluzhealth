<?php
/** Template Name: About **/
get_header();
?>

<?php if (get_field('about_content')) : ?>
    <section class="page-hero-section">
        <?php get_image(get_field('about_image') ?: get_field('hero_image', get_option('page_on_front')), 'full', get_bloginfo('name'), false); ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <?php get_theme_link(array('url' => home_url('/'), 'title' => 'Home')); ?>
                    / <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo get_field('about_content'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('about_features')) : ?>
    <section class="stats-section">
        <div class="container">
            <div class="inner">
                <?php while (have_rows('about_features')) : the_row(); ?>
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

<?php if (get_field('mission_content')) : ?>
    <section class="mission-section">
        <div class="container">
            <div class="inner">
                <div class="image">
                    <?php get_image(get_field('mission_image'), 'large'); ?>
                </div>

                <div class="content">
                    <?php echo get_field('mission_content'); ?>

                    <div class="buttons">
                        <?php get_theme_link(get_field('mission_link'), 'theme-blue'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('team_content') || have_rows('members')) : ?>
    <section class="team-section" id="team">
        <div class="container">
            <?php if (get_field('team_content')) : ?>
                <div class="heading">
                    <?php echo get_field('team_content'); ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('members')) : ?>
                <div class="inner">
                    <?php while (have_rows('members')) : the_row(); ?>
                        <div class="item">
                            <div class="photo">
                                <?php get_image(get_sub_field('image'), 'medium_large'); ?>
                            </div>

                            <?php if (get_sub_field('content')) : ?>
                                <div class="info">
                                    <?php echo get_sub_field('content'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

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
                        <?php if (get_sub_field('icon')) : ?>
                            <div class="icon"><?php echo esc_html(get_sub_field('icon')); ?></div>
                        <?php endif; ?>

                        <?php echo get_sub_field('content'); ?>
                    </div>

                    <?php $award_index++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (get_field('values_title') ?: get_field('title') || have_rows('values')) : ?>
    <section class="values-section">
        <div class="container">
            <?php if (get_field('values_title') ?: get_field('title')) : ?>
                <div class="heading">
                    <?php echo get_field('values_title') ?: get_field('title'); ?>
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

<?php if (get_field('cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php echo get_field('cta_content'); ?>
                </div>

                <?php
                $phones = array_filter(array_map('trim', explode(',', get_theme_option('telephone') ?: '')));
                $call_number = $phones ? reset($phones) : '';
                ?>

                <div class="buttons">
                    <?php get_theme_link(get_theme_option('appointment_link'), 'theme-blue'); ?>

                    <?php if ($call_number) : ?>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $call_number)); ?>" class="theme-outline">
                            Call <?php echo esc_html($call_number); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>