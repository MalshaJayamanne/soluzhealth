<div class="blog-item">
    <div class="image">
        <?php if (has_post_thumbnail()) : ?>
            <?php echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'full-image')); ?>
        <?php else : ?>
            <?php get_image(get_theme_option('default_blog_image'), 'full-image'); ?>
        <?php endif; ?>
    </div>

    <p class="date"><?php echo esc_html(get_the_date('F Y')); ?></p>
    <h3><?php echo esc_html(get_the_title()); ?></h3>

    <?php if (get_the_excerpt()) : ?>
        <div class="excerpt">
            <?php echo wp_kses_post(wp_trim_words(get_the_excerpt(), 25)); ?>
        </div>
    <?php endif; ?>

    <a href="<?php echo esc_url(get_permalink()); ?>"
       class="full-link"
       aria-label="<?php echo esc_attr('Read more: ' . get_the_title()); ?>"></a>
</div>