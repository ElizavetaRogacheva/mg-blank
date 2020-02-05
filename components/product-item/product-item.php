<!--блок карточки товара-->
<div class="product-block">
<?php console_log($data) ?>
    <?php if ($data['new'] === '1') : ?>
    <div class="sale-sticker">
        <span>new</span>
    </div>
    <?php endif ;?>
    <!--картинки карточки товара-->
    <a title="" href="<?php echo $data['link'] ?>" class="product-block__link">
        <img title="" src="<?php echo SITE ?>/uploads/<?php echo $data['images_product'][0] ?>" alt="" class="product-block__img">
        <?php if (!(empty($data['images_product'][1]))) : ?>
        <img title="" src="<?php echo SITE ?>/uploads/<?php echo $data['images_product'][1] ?>" alt="" class="product-block__img product-block__img--hover">
        <?php else : ?>
            <img title="" src="<?php echo SITE ?>/uploads/<?php echo $data['images_product'][0] ?>" alt="" class="product-block__img product-block__img--hover">
        <?php endif ;?>
    </a>

    <div class="product-block-content">

        <!--рейтинг товара-->
        <ul class="rating-block">
            <div class="product-container__rating">
                <div class="c-product__row">
                    [mg-product-rating id="<?php echo $data['id'] ?>"]
                </div>
            </div>
        </ul>

        <!--название товара на карточке-->
        <h4 class="product-block__title">
            <a title="" href="#"><?php echo $data['title'] ?></a>
        </h4>

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
            <li class="product-options__item">
                <button class="product-options__btn product-options__btn--view">
                </button>
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
            <li class="product-options__item">
                <button class="product-options__btn product-options__btn--cart"></button>
            </li>
        </ul>
    </div>
</div> <!--end product-block-->