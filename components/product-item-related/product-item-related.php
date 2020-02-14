<?php mgAddMeta('components/product-item-related/css/product-item-related.css') ?>

<!--блок карточки товара-->
<div class="product-block">
    <?php if ($data['new'] === '1') : ?>
    <div class="sale-sticker">
        <span><?php echo lang('newSticker')  ?></span>
    </div>
    <?php endif ;?>
    <!--картинки карточки товара-->
       <?php
          // Получаем массив миниатюр
          $thumbsArr = getThumbsFromUrl(explode('|', $data['image_url'])[0], $data['id']); ?>
    <a title="" 
       href="<?php echo $data['link'] ?>" 
       class="product-block__link">
            <img class="product-block__img"
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
            <div class="product-container__rating">
            <?php if (class_exists('ProductCommentsRating')): ?>
                <div class="c-product__row">
                    [mg-product-rating id="<?php echo $data['id'] ?>"]
                </div>
            <?php endif ;?>
            </div>
        </ul>

        <!--название товара на карточке-->
        <h4 class="product-block__title">
            <a title="" href="#"><?php echo $data['title'] ?></a>
        </h4>

        <!--Описание товара-->
        <?php if(!(empty($data['description']))) : ?>
        <div class="product-block__description">        
            <p>
                <?php echo MG::textMore($data['description'], 80)?>
            </p>
        </div>
        <?php endif ;?>

        <!--цена товара на карточке с указанием валюты-->
        <p class="price">
            <?php echo $data['price']; ?>
            <?php echo $data['currency']; ?>
        </p>

        <!--кнопки опции карточки товара-->
        <ul class="product-options">
            <li class="product-options__item--wishlist">
            <?php
                // Кнопка добавить-удалить из избранного
                component('favorites/btns', $data);
            ?>
            </li>
            <li class="product-options__item product-options__item--compare">
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
                <button class="product-options__btn product-options__btn--cart"></button>
            </li>
        </ul>
    </div>
</div> <!--end product-block-->