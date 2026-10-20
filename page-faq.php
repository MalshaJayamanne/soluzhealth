<?php
/** Template Name: FAQ **/
get_header();

$faq_groups = array('qgeneral', 'qketamine', 'qtms', 'qcost');
?>

<?php if ($faq_hero_content = get_field('faq_hero_content')) : ?>
    <section class="faq-hero-section">
        <div class="container">
            <div class="inner">
                <div class="breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> / <?php echo esc_html(get_the_title()); ?>
                </div>

                <div class="content-wrapper">
                    <?php
                    if ($telephone = get_theme_option('telephone')) {
                        $tel_link         = ' <a href="tel:' . esc_attr(preg_replace('/[^0-9+]/', '', $telephone)) . '">' . esc_html($telephone) . '</a>.';
                        $faq_hero_content = preg_replace('/<\/p>(?!.*<\/p>)/s', $tel_link . '</p>', $faq_hero_content, 1);
                    }
                    echo $faq_hero_content;
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
                <?php if ($group = get_field($group_key)) : ?>
                    <div class="group">
                        <?php if ($title = $group['title']) : ?>
                            <div class="heading content-wrapper">
                                <?php echo $title; ?>
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

            <?php if ($faq_still_content = get_field('faq_still_content')) : ?>
                <div class="still">
                    <div class="content-wrapper">
                        <?php echo $faq_still_content; ?>
                    </div>

                    <?php $faq_still_link = get_field('faq_still_link'); ?>
                    <?php $telephone = get_theme_option('telephone'); ?>

                    <?php if (!empty($faq_still_link['url']) || $telephone) : ?>
                        <div class="buttons">
                            <?php if (!empty($faq_still_link['url'])) : ?>
                                <a <?php echo get_link_attrs($faq_still_link); ?> class="theme-blue">
                                    <?php echo esc_html($faq_still_link['title']); ?>
                                </a>
                            <?php endif; ?>

                            <?php if ($telephone) : ?>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $telephone)); ?>" class="theme-outline">
                                    Call <?php echo esc_html($telephone); ?>
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