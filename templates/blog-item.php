<?php
$article = $args['article'] ?? null;
$card_content = $args['content'] ?? '';

if (is_numeric($article)) {
    $article = get_post($article);
}

if (!$article instanceof WP_Post || $article->post_status !== 'publish') {
    return;
}

$article_title = get_the_title($article);
$article_url = get_permalink($article);
?>

<div class="blog-item">
    <div class="image">
        <?php if (has_post_thumbnail($article)) : ?>
            <?php echo get_the_post_thumbnail($article, 'full', array('class' => 'full-image')); ?>
        <?php else : ?>
            <?php get_image(get_theme_option('default_blog_image'), 'full-image'); ?>
        <?php endif; ?>
    </div>

    <p class="date"><?php echo esc_html(get_the_date('F Y', $article)); ?></p>

    <h3><?php echo esc_html($article_title); ?></h3>

    <?php if ($card_content) : ?>
        <div class="excerpt">
            <?php echo wp_kses_post($card_content); ?>
        </div>
    <?php endif; ?>

    <a href="<?php echo esc_url($article_url); ?>"
       class="full-link"
       aria-label="<?php echo esc_attr('Read more: ' . $article_title); ?>"></a>
</div>