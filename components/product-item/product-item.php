<?php mgAddMeta('components/product-item/css/product-item.css'); ?>


<!--блок карточки товара-->
<div class="product-block js-catalog-item">
    <?php if ($data['new'] === '1'): ?>
    <div class="sale-sticker">
        <span><?php echo lang('newSticker'); ?></span>
    </div>
    <?php endif; ?>
    <?php if ($data['recommend'] === '1'): ?>
        <div class="sale-sticker sale-sticker--recommend">
        <span><?php echo lang('hitSticker'); ?></span>
    </div>
    <?php endif; ?>
    <?php
    $thumbsArr = getThumbsFromUrl(
        explode('|', $data['image_url'])[0],
        $data['id']
    );
    $thumbsArrHover = getThumbsFromUrl(
        explode('|', $data['images_product'][1])[0],
        $data['id']
    );
    ?>
    <a title="" 
       href="<?php echo $data['link']; ?>" 
       class="product-block__link">
            <img class="product-block__img <?php echo !empty(
                $data['images_product'][1]
            )
                ? 'product-block__img--hovered'
                : 'js-catalog-item-image'; ?>"
                 src="<?php echo $thumbsArr[70]['main']; ?>"
                 srcset="<?php echo $thumbsArr[70]['2x']; ?> 2x"
                 alt="<?php echo $data['item']['images_alt'][0]; ?>"
                 title="<?php echo $data['item']['images_title'][0]; ?>"
                 data-transfer="true"
                 data-product-id="<?php echo $data['item']['id']; ?>">
            <?php if (!empty($data['images_product'][1])): ?>
            <img class="product-block__img product-block__img--hover js-catalog-item-image"
                 src="<?php echo $thumbsArrHover[70]['main']; ?>"
                 srcset="<?php echo $thumbsArrHover[70]['2x']; ?> 2x"
                 alt="<?php echo $data['item']['images_alt'][0]; ?>"
                 title="<?php echo $data['item']['images_title'][0]; ?>"
                 data-transfer="true"
                 data-product-id="<?php echo $data['item']['id']; ?>">
            <?php endif; ?>
    </a>
    <div class="product-block-content">

        <!--рейтинг товара-->
        <ul class="rating-block">
            <div class="product-container__rating">
            <?php if (class_exists('ProductCommentsRating')): ?>
                <div class="c-product__row">
                    [mg-product-rating id="<?php echo $data['id']; ?>"]
                </div>
            <?php endif; ?>
            </div>
        </ul>

        <!--название товара на карточке-->
        <h4 class="product-block__title">
            <a title="" href="#"><?php echo $data['title']; ?></a>
        </h4>
                <!--Описание товара-->
        <?php if (!empty($data['description'])): ?>
            <div class="product-block__description">        
                <p>
                    <?php echo MG::textMore($data['description'], 80); ?>
                </p>
            </div>
        <?php endif; ?>

        <form action="<?php echo SITE . $data['liteFormData']['action']; ?>"
              method="<?php echo $data['liteFormData']['method']; ?>"
              class="property-form js-product-form <?php echo $data['liteFormData']['catalogAction']; ?>"
              data-product-id='<?php echo $data['liteFormData']['id']; ?>'>
            <?php if (!empty($data['variants'])): ?>
                <!--блок с выбором вариантов товара-->
                <div class="c-goods__footer">
                    <div class="c-form">                                                  
                        <?php component('product/variants', $data); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php
             if (MG::getSetting('printQuantityInMini') == 'true') {
                component(
                    'amount',
                    [
                        'id' => $data['id'],
                        'maxCount' => $data['liteFormData']['maxCount'],
                        'count' => '1',
                    ]
                );
            }
            ?>

        <!--цена товара на карточке с указанием валюты-->
            <p class="price js-change-product-price">
                <?php echo priceFormat($data['price']); ?>
                <?php echo $data['currency']; ?>
            </p>
            <!--опция выбора количества продукта-->
            <div class="c-buy js-product-controls">
            <ul class="product-options">
                <li class="product-options__item product-options__item--wishlist">
                <?php // Кнопка добавить-удалить из избранного
                component('favorites/btns', $data); ?>
                </li>
                <li class="product-options__item product-options__item--compare">
                    <?php if (
                        (EDITION == 'gipermarket' || EDITION == 'market') &&
                        $data['liteFormData']['printCompareButton'] == 'true'
                    ) {
                        component('compare/btn/add', $data);
                    } ?>
                </li>
                <li class="product-options__item product-options__item--cart">
                    <?php component('cart/btn/add', $data); ?>
                </li>
            </ul>
        </div>
        </form>

        <!--кнопки опции карточки товара-->
</div> <!--end product-block-->