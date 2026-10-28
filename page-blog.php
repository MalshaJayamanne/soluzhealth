<?php
/** Template Name: Blog **/
get_header();
?>

<?php if (get_field('blog_hero_content')) : ?>
    <section class="blog-hero-section">
        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <?php get_theme_link(array('url' => home_url('/'), 'title' => 'Home')); ?> /
                    <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo wp_kses_post(get_field('blog_hero_content')); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$paged = max(1, get_query_var('paged'), get_query_var('page'));

$blog = new WP_Query(array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'posts_per_page' => get_option('posts_per_page') ?: 12,
    'paged'          => $paged,
));
?>

<section class="blog-section">
    <div class="container">
        <div class="row blog-listing">
            <div class="col-sm-12 col-lg-3">
                <?php get_template_part('templates/blog', 'sidebar'); ?>
            </div>

            <div class="col-sm-12 col-lg-9">
                <div class="row">
                    <?php if ($blog->have_posts()) : ?>
                        <?php while ($blog->have_posts()) : $blog->the_post(); ?>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <?php get_template_part('templates/blog', 'item'); ?>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <div class="col-12">
                            <p>No blog posts have been published yet.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($blog->max_num_pages > 1) : ?>
                    <div class="pagination-wrapper">
                        <?php
                        echo paginate_links(array(
                            'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'format'    => '?paged=%#%',
                            'current'   => $paged,
                            'total'     => $blog->max_num_pages,
                            'prev_text' => '&laquo; Previous',
                            'next_text' => 'Next &raquo;',
                        ));
                        ?>
                    </div>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<?php if (get_field('blog_cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo wp_kses_post(get_field('blog_cta_content')); ?>
                </div>

                <?php
                $phones = array_filter(array_map('trim', explode(',', get_theme_option('telephone') ?: '')));
                $call_number = $phones ? reset($phones) : '';
                ?>

                <?php if ((get_theme_option('appointment_link') && !empty(get_theme_option('appointment_link')['url'])) || $call_number) : ?>
                    <div class="buttons">
                        <?php get_theme_link(get_theme_option('appointment_link'), 'theme-blue'); ?>

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