<?php
/** Template Name: About **/
get_header();
?>

<?php if ($about_content = get_field('about_content')) : ?>
    <section class="page-hero-section">
        <?php if ($about_image = get_field('about_image') ?: get_field('hero_image', get_option('page_on_front'))) : ?>
            <?php get_image($about_image, 'full', get_bloginfo('name'), false); ?>
        <?php endif; ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo $about_content; ?>
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

<?php if ($mission_content = get_field('mission_content')) : ?>
    <section class="mission-section">
        <div class="container">
            <div class="inner">
                <?php if ($mission_image = get_field('mission_image')) : ?>
                    <div class="image">
                        <?php get_image($mission_image, 'large'); ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php echo $mission_content; ?>

                    <?php if (($mission_link = get_field('mission_link')) && !empty($mission_link['url'])) : ?>
                        <div class="buttons">
                            <a <?php echo get_link_attrs($mission_link); ?> class="theme-blue">
                                <?php echo esc_html($mission_link['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (($team_content = get_field('team_content')) || have_rows('members')) : ?>
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
                        <div class="item">
                            <?php if ($member_image = get_sub_field('image')) : ?>
                                <div class="photo">
                                    <?php get_image($member_image, 'medium_large'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($member_content = get_sub_field('content')) : ?>
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

<?php if (($values_title = get_field('values_title') ?: get_field('title')) || have_rows('values')) : ?>
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

<?php if ($cta_content = get_field('cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content">
                    <?php echo $cta_content; ?>
                </div>

                <?php
                $appointment = get_theme_option('appointment_link');
                $call_number = '';
                if ($telephone = get_theme_option('telephone')) {
                    $phones      = array_filter(array_map('trim', explode(',', $telephone)));
                    $call_number = $phones ? reset($phones) : '';
                }
                ?>

                <?php if (!empty($appointment['url']) || $call_number) : ?>
                    <div class="buttons">
                        <?php if (!empty($appointment['url'])) : ?>
                            <a <?php echo get_link_attrs($appointment); ?> class="theme-blue">
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