<?php
// Получаем данные о посте
$item = get_query_var('post_item');
?>



<div class="swiper-slide h-auto">
    <div class="card css_news_card rounded-0 css_footer_bg_color ">
        <a href="<?php echo get_permalink($item->ID); ?>">
            <div class="swiper magazin">
                <div class="swiper-wrapper mb-3">
                    <?php
                    $images_loop = CFS()->get('images_loop', $item->ID);
                    if (is_iterable($images_loop)) {
                        global $alt_img;
                        $count = 0;
                        foreach ($images_loop as $images_loop_items) {
                            if ($images_loop_items['alt_img']) {
                                $alt_img = $images_loop_items['alt_img'];
                            } else {
                                $alt_img = get_the_title($item->ID);
                            }
                    ?>
                            <div class="swiper-slide d-flex justify-content-center align-items-center text-center">
                                <?php
                                $image_id = $images_loop_items['img'];
                                if ($image_id) {
                                    $attributes = [
                                        'title'   => $alt_img,
                                        'alt'     => $alt_img,
                                        'class' => 'css_news_img js_img_add_cart',
                                    ];

                                    if ($count >= 1) {
                                        $attributes['loading'] = 'lazy';
                                    }

                                    echo wp_get_attachment_image($image_id, 'full', false, $attributes);
                                }
                                ?>
                                <?php if ($count >= 1) {
                                    echo '<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>';
                                } ?>
                            </div>
                        <?php
                            $count++;
                        }
                    } else {
                        ?>
                        <div class="swiper-slide">
                            <?php echo get_the_post_thumbnail($item->ID, 'full', array('class' => 'card-img-top css_news_img js_img_add_cart', 'loading' => 'lazy', 'title' => get_the_title($item->ID), 'alt' => get_the_title($item->ID))); ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </a>
        <div class="card-body">
            <?php if (is_page_template('single-news.php')) : ?>
                <p class="small"><?php echo get_the_time('F jS Y', $item->ID); ?></p>
            <?php endif; ?>
            <a class="text-decoration-none" href="<?php echo get_permalink($item->ID); ?>">
                <p class="card-title fs-6 fw-bold css_news_title_text"><?php echo get_the_title($item->ID); ?></p>
            </a>
            <p class="css_news_title_text small"><?= CFS()->get('preview_text', $item->ID); ?></p>
        </div>
        <div class="card-footer ">
            <?php if (CFS()->get('catalog_price', $item->ID)) : ?>
                <span class="card-text fw-bold"><?= number_format(CFS()->get('catalog_price', $item->ID), 0, ',', ' '); ?> ₽</span>
                <span title="В корзину" alt="В корзину" data-title="<?php echo get_the_title($item->ID); ?>" data-img="" data-price="<?= CFS()->get('catalog_price', $item->ID); ?>" data-url="<?php echo get_permalink($item->ID); ?>" class="css_button_cart js_btn_cart_text js_cart_click_add_to_cart col-12">В корзину</span>
            <?php elseif (CFS()->get('price', $item->ID)) : ?>
                <span class="card-text fw-bold"><?= CFS()->get('price', $item->ID); ?></span><br>
                <a title="Оставить заявку" alt="Оставить заявку" class="css_button_cart col-12" data-bs-toggle="modal" data-bs-target="#startModal" href="#">Оставить заявку</a>
            <?php else : ?>
                <a href="<?php echo get_permalink($item->ID); ?>" class="css_button_cart col-12">Подробнее</a>
            <?php endif; ?>
        </div>
    </div>
</div>