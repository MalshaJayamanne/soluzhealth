<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="blog-article-hero page-hero-section">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> /
                <a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a> /
                <?php the_title(); ?>
            </div>
            <div class="content-wrapper">
                <?php if ($article_hero_content = get_field('article_hero_content')) : ?>
                    <div class="lead">
                        <?php echo wp_kses_post($article_hero_content); ?>
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
                <?php if ($reviewed_by = get_field('article_reviewed_by')) : ?>
                    &middot;
                    Medically reviewed by <?php echo esc_html($reviewed_by); ?>
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
            <?php if ($cta_content = get_field('blog_cta_content', get_page_by_path('blog')->ID ?? 0)) : ?>
                <div class="content-wrapper">
                    <?php echo wp_kses_post($cta_content); ?>
                </div>
            <?php endif; ?>

            <?php $appointment = get_theme_option('appointment_link'); ?>

            <?php if ($telephone = get_theme_option('telephone')) : ?>
                <?php $phones = array_filter(array_map('trim', explode(',', $telephone))); ?>
                <?php $call_number = $phones ? reset($phones) : ''; ?>
            <?php else : ?>
                <?php $call_number = ''; ?>
            <?php endif; ?>

            <?php if (!empty($appointment['url']) || $call_number) : ?>
                <div class="buttons">
                    <?php if (!empty($appointment['url'])) : ?>
                        <a <?php echo get_link_attrs($appointment); ?> class="theme-blue">
                            <?php echo esc_html($appointment['title'] ?: 'Book an Appointment'); ?>
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

<?php endwhile; endif; ?>

<?php get_footer(); ?>