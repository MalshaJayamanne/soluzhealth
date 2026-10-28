<?php
get_header();
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <section class="blog-article-hero page-hero-section">
            <div class="container">
                <div class="inner">
                    <div class="breadcrumb">
                        <?php get_theme_link(array('url' => home_url('/'), 'title' => 'Home')); ?> /
                        <?php get_theme_link(array('url' => home_url('/blog/'), 'title' => 'Blog')); ?> /
                        <?php echo esc_html(get_the_title()); ?>
                    </div>

                    <div class="content-wrapper">
                        <?php if (get_field('article_hero_content')) : ?>
                            <div class="lead">
                                <?php echo wp_kses_post(get_field('article_hero_content')); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="article-wrap">
            <div class="container">
                <article class="article">
                    <p class="article-meta">
                        <?php echo esc_html(get_bloginfo('name')); ?>
                        &middot;
                        <?php echo esc_html(get_the_date('F Y')); ?>

                        <?php if (get_field('article_reviewed_by')) : ?>
                            &middot;
                            Medically reviewed by <?php echo esc_html(get_field('article_reviewed_by')); ?>
                        <?php endif; ?>
                    </p>

                    <div class="prose">
                        <?php the_content(); ?>
                    </div>

                    <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="back-to-blog">
                        &larr; Back to all posts
                    </a>
                </article>
            </div>
        </section>

        <section class="cta-section">
            <div class="container">
                <div class="inner">
                    <?php if (get_page_by_path('blog') && get_field('blog_cta_content', get_page_by_path('blog')->ID)) : ?>
                        <div class="content-wrapper">
                            <?php echo wp_kses_post(get_field('blog_cta_content', get_page_by_path('blog')->ID)); ?>
                        </div>
                    <?php endif; ?>

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

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>