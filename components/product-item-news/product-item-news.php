<?php //viewData($data) ?>
<li class="featured-products-carousel__item featured-product-card">
    <div class="sale-sticker">
        <span><?php echo lang('newSticker')  ?></span>
    </div>
    <?php $thumbsArr = getThumbsFromUrl(explode('|', $data['image_url'])[0], $data['id']);?>

    <a title="" 
       href="<?php echo ($data['link']) ?>" 
       class="featured-product-card__link">
       <img class="featured-product-card__img"
                 src="<?php echo $thumbsArr[30]['main'] ?>"
                 srcset="<?php echo $thumbsArr[30]['2x'] ?> 2x"
                 alt="<?php echo $data['item']['images_alt'][0] ?>"
                 title="<?php echo $data['item']['images_title'][0] ?>"
                 data-transfer="true"
                 data-product-id="<?php echo $data['item']['id'] ?>">
    </a>
    <div class="product-block-content">
        <!--рейтинг товара-->
        <ul class="rating-block">
            <?php if (class_exists('ProductCommentsRating')): ?>
                <div class="c-product__row">
                    [mg-product-rating id="<?php echo $data['id'] ?>"]
                </div>
            <?php endif ;?>
        </ul>
        <h4 class="product-block__title">
            <a 
            title="" 
            href="<?php echo ($data['link']) ?>"><?php echo ($data['title']) ?></a>
        </h4>
        <p class="price"><?php echo ($data['price']) ?> <?php echo ($data['currency'])?></p>
        <ul class="product-options">
            <li class="product-options__item--wishlist">
            <?php
                // Кнопка добавить-удалить из избранного
                component('favorites/btns', $data);
            ?>
            </li>
            <li class="product-options__item--compare">
                <?php
                    if (
                        (EDITION == 'gipermarket' || EDITION == 'market') &&
                        ($data['liteFormData']['printCompareButton'] == 'true')
                    ) {
                        component(
                            'compare/btn/add',
                            $data
                        );
                    }
                ?>
            </li>
            <li class="product-options__item product-options__item--cart">
                <?php component('cart/btn/add', $data);?>
            </li>
        </ul>
    </div>
</li>