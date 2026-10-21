<?php
/** Template Name: Blog **/
get_header();
?>

<?php if ($blog_hero_content = get_field('blog_hero_content')) : ?>
    <section class="blog-hero-section">
        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo $blog_hero_content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('blogs')) : ?>
    <section class="blog-section">
        <div class="container">
            <div class="inner">
                <?php while (have_rows('blogs')) : the_row(); ?>
                    <div class="item">
                        <?php if ($content = get_sub_field('content')) : ?>
                            <div class="content-wrapper"><?php echo wp_kses_post(wpautop($content)); ?></div>
                        <?php endif; ?>

                        <?php if (($link = get_sub_field('link')) && !empty($link['url'])) : ?>
                            <a <?php echo get_link_attrs($link); ?> class="more-link">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($cta_content = get_field('blog_cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo $cta_content; ?>
                </div>

                <?php $appointment = get_theme_option('appointment_link'); ?>
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


