<?php
/** Template Name: FAQ **/
get_header();

$faq_groups = array('qgeneral', 'qketamine', 'qtms', 'qcost');
?>

<?php if (get_field('faq_hero_content')) : ?>
    <section class="faq-hero-section">
        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <?php get_theme_link(array('url' => home_url('/'), 'title' => 'Home')); ?> /
                    <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php
                    if (get_theme_option('telephone')) {
                        $tel_link = ' <a href="tel:' . esc_attr(preg_replace('/[^0-9+]/', '', get_theme_option('telephone'))) . '">' . esc_html(get_theme_option('telephone')) . '</a>.';

                        echo preg_replace('/<\/p>(?!.*<\/p>)/s', $tel_link . '</p>', get_field('faq_hero_content'), 1);
                    } else {
                        echo get_field('faq_hero_content');
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="faq-section">
    <div class="container">
        <div class="inner" id="faqAccordion">
            <?php foreach ($faq_groups as $group_key) : ?>
                <?php if (get_field($group_key)) : ?>
                    <?php $group = get_field($group_key); ?>

                    <div class="group">
                        <?php if (!empty($group['title'])) : ?>
                            <div class="heading content-wrapper">
                                <?php echo $group['title']; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($group['faqs'])) : ?>
                            <div class="list">
                                <?php foreach ($group['faqs'] as $i => $faq) : ?>
                                    <?php $faq_id = 'faq-' . $group_key . '-' . ($i + 1); ?>

                                    <div class="item">
                                        <button class="question collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($faq_id); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr($faq_id); ?>">
                                            <span class="text"><?php echo esc_html($faq['question']); ?></span>
                                            <span class="icon" aria-hidden="true"></span>
                                        </button>

                                        <div id="<?php echo esc_attr($faq_id); ?>" class="answer collapse" data-bs-parent="#faqAccordion">
                                            <div class="content-wrapper">
                                                <?php echo wp_kses_post(wpautop($faq['answer'])); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if (get_field('faq_still_content')) : ?>
                <div class="still">
                    <div class="content-wrapper">
                        <?php echo get_field('faq_still_content'); ?>
                    </div>

                    <?php if (get_field('faq_still_link') || get_theme_option('telephone')) : ?>
                        <div class="buttons">
                            <?php get_theme_link(get_field('faq_still_link'), 'theme-blue'); ?>

                            <?php if (get_theme_option('telephone')) : ?>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_option('telephone'))); ?>" class="theme-outline">
                                    Call <?php echo esc_html(get_theme_option('telephone')); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>