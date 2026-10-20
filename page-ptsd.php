<?php
/** Template Name: PTSD **/
get_header();
?>

<?php if ($hero_content = get_field('ptsd_hero_content')) : ?>
    <section class="page-hero-section ptsd-hero">
        <?php if ($hero_image = get_field('ptsd_hero_image')) : ?>
            <?php get_image($hero_image, 'full', get_bloginfo('name'), false); ?>
        <?php endif; ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> /
                    <a href="<?php echo esc_url(home_url('/ketamine/')); ?>">Treatments</a> /
                    <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo $hero_content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('ptsd_features')) : ?>
    <section class="stats-section">
        <div class="container">
            <div class="inner">
                <?php while (have_rows('ptsd_features')) : the_row(); ?>
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

<?php if ($treatment_content = get_field('ptsd_treatment_content')) : ?>
    <section class="ptsd-treatment-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo $treatment_content; ?>

                    <?php if (($appointment = get_field('appointment_link') ?: get_theme_option('appointment_link')) && !empty($appointment['url'])) : ?>
                        <div class="buttons">
                            <a <?php echo get_link_attrs($appointment); ?> class="theme-blue">
                                <?php echo esc_html($appointment['title']); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($treatment_image = get_field('ptsd_treatment_image')) : ?>
                    <div class="image">
                        <?php get_image($treatment_image, 'large'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (($recognize_title = get_field('ptsd_recognize_title')) || have_rows('ptsd_signs')) : ?>
    <section class="ptsd-signs-section">
        <div class="container">
            <?php if ($recognize_title) : ?>
                <div class="heading content-wrapper">
                    <?php echo $recognize_title; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('ptsd_signs')) : ?>
                <ul class="signs">
                    <?php while (have_rows('ptsd_signs')) : the_row(); ?>
                        <?php if ($sign = get_sub_field('label')) : ?>
                            <li><?php echo esc_html($sign); ?></li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

            <?php if ($recognize_note = get_field('ptsd_recognize_note')) : ?>
                <p class="note"><?php echo esc_html($recognize_note); ?></p>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (($approach_content = get_field('ptsd_approach_content')) || have_rows('ptsd_approaches')) : ?>
    <section class="ptsd-approach-section">
        <div class="container">
            <?php if ($approach_content) : ?>
                <div class="heading content-wrapper">
                    <?php echo $approach_content; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('ptsd_approaches')) : ?>
                <div class="inner">
                    <?php while (have_rows('ptsd_approaches')) : the_row(); ?>
                        <div class="item">
                            <?php if ($content = get_sub_field('content')) : ?>
                                <div class="content-wrapper"><?php echo $content; ?></div>
                            <?php endif; ?>

                            <?php if (($link = get_sub_field('link')) && !empty($link['url'])) : ?>
                                <a <?php echo get_link_attrs($link); ?> class="learn-link">
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

<?php if ($cta_content = get_field('ptsd_cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo $cta_content; ?>
                </div>

                <?php $appointment = get_field('appointment_link') ?: get_theme_option('appointment_link'); ?>
                <?php $call_number = ''; ?>
                <?php if ($telephone = get_theme_option('telephone')) : ?>
                    <?php $phones = array_filter(array_map('trim', explode(',', $telephone))); ?>
                    <?php $call_number = $phones ? reset($phones) : ''; ?>
                <?php endif; ?>

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