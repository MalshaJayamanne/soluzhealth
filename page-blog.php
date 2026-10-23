<?php
/** Template Name: Blog */
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
                    <?php echo wp_kses_post($blog_hero_content); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php $blog_cards = get_field('blogcards'); ?>

<section class="blog-section">
    <div class="container">
        <div class="row blog-listing">
            <div class="col-sm-12 col-lg-3">
                <?php get_template_part('templates/blog', 'sidebar'); ?>
            </div>

            <div class="col-sm-12 col-lg-9">
                <div class="row">
                    <?php if ($blog_cards) : ?>
                        <?php foreach ($blog_cards as $blog_card) : ?>
                            <?php
                            $article = $blog_card['article'] ?? null;

                            if (is_numeric($article)) {
                                $article = get_post($article);
                            }

                            if (!$article instanceof WP_Post || $article->post_status !== 'publish') {
                                continue;
                            }
                            ?>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <?php
                                get_template_part('templates/blog', 'item', array(
                                    'article'   => $article,
                                    'content'   => $blog_card['content'] ?? '',
                                ));
                                ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="col-12">
                            <p>No blog posts have been added yet.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if ($blog_cta_content = get_field('blog_cta_content')) : ?>
    <section class="cta-section">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php echo wp_kses_post($blog_cta_content); ?>
                </div>

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
<?php endif; ?>

<?php get_footer(); ?>