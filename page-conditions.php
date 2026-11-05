<?php
/** Template Name: Conditions **/
get_header();
?>

<?php if ($hero_content = get_field('conditions_hero_content')) : ?>
    <section class="page-hero-section">
        <?php get_image(get_field('conditions_hero_image'), 'full'); ?>

        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <?php get_theme_link(array('url' => home_url('/'), 'title' => 'Home')); ?> /
                    <?php get_theme_link(array('url' => home_url('/ketamine/'), 'title' => 'Treatments')); ?> /
                    <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php echo $hero_content; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_rows('page_content')) : ?>
    <?php while (have_rows('page_content')) : the_row(); ?>

        <?php if (get_row_layout() === 'conditions_features_section') : ?>

            <?php if (have_rows('features')) : ?>
                <section class="stats-section">
                    <div class="container">
                        <div class="inner">
                            <?php while (have_rows('features')) : the_row(); ?>
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

        <?php elseif (get_row_layout() === 'default_content_section') : ?>

            <?php if ($content = get_sub_field('content')) : ?>
                <?php
                $section_classes = array('default-content-section');
                $section_classes[] = 'is-' . (get_sub_field('background_type') ?: 'white');

                if (get_sub_field('image')) {
                    $section_classes[] = 'has-image';
                    $section_classes[] = 'image-' . (get_sub_field('image_position') ?: 'right');
                }

                if (get_sub_field('keep_image_size')) {
                    $section_classes[] = 'keep-image-size';
                }

                if (get_sub_field('content_padding')) {
                    $section_classes[] = 'has-padding';
                }

                if (get_sub_field('center_content')) {
                    $section_classes[] = 'is-centered';
                }

                if (get_sub_field('remove_top_margin')) {
                    $section_classes[] = 'no-top-space';
                }

                $content_classes = 'content-wrapper' . (get_sub_field('styled_list') ? ' styled-list' : '');
                ?>

                <section class="<?php echo esc_attr(implode(' ', $section_classes)); ?>">
                    <div class="container">
                        <div class="inner">
                            <div class="<?php echo esc_attr($content_classes); ?>">
                                <?php echo $content; ?>

                                <?php if ($link = get_sub_field('link')) : ?>
                                    <div class="buttons">
                                        <?php get_theme_link($link, 'theme-btn'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if (get_sub_field('image')) : ?>
                                <div class="image">
                                    <?php get_image(get_sub_field('image'), 'large'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

        <?php elseif (get_row_layout() === 'content_boxes') : ?>

            <?php if (get_sub_field('title') || have_rows('contents')) : ?>
                <section class="content-boxes-section align-<?php echo esc_attr(get_sub_field('text_align') ?: 'left'); ?>">
                    <?php if ($bg_image = get_sub_field('bg_image')) : ?>
                        <?php get_image($bg_image, 'full-image'); ?>
                    <?php endif; ?>

                    <div class="container">
                        <?php if ($title = get_sub_field('title')) : ?>
                            <div class="heading content-wrapper">
                                <?php echo $title; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (have_rows('contents')) : ?>
                            <div class="inner">
                                <?php while (have_rows('contents')) : the_row(); ?>
                                    <div class="item width-<?php echo esc_attr(get_sub_field('width') ?: 'half'); ?>">
                                        <?php if (get_sub_field('image')) : ?>
                                            <div class="image">
                                                <?php get_image(get_sub_field('image'), 'medium_large'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($item_title = get_sub_field('title')) : ?>
                                            <h3><?php echo nl2br(esc_html($item_title)); ?></h3>
                                        <?php endif; ?>

                                        <?php if ($description = get_sub_field('description')) : ?>
                                            <div class="description"><?php echo $description; ?></div>
                                        <?php endif; ?>

                                        <?php get_theme_link(get_sub_field('link'), 'learn-link'); ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($boxes_link = get_sub_field('link')) : ?>
                            <div class="buttons">
                                <?php get_theme_link($boxes_link, 'theme-btn'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

        <?php elseif (get_row_layout() === 'conditions_cta_section') : ?>

            <?php if ($cta_content = get_sub_field('cta_content')) : ?>
                <section class="cta-section">
                    <div class="container">
                        <div class="inner">
                            <div class="content-wrapper">
                                <?php echo $cta_content; ?>
                            </div>

                            <?php if (get_sub_field('cta_link') || get_sub_field('cta_link_2')) : ?>
                                <div class="buttons">
                                    <?php get_theme_link(get_sub_field('cta_link'), 'theme-btn'); ?>

                                    <?php get_theme_link(get_sub_field('cta_link_2'), 'theme-btn outline'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>