<?php
/**
 *  Файл представления Product - выводит сгенерированную движком информацию на странице карточки товара.
 *  В этом файле доступны следующие данные:
 *   <code>
 *   $data['category_url'] => URL категории в которой находится продукт
 *   $data['product_url'] => Полный URL продукта
 *   $data['id'] => id продукта
 *   $data['sort'] => порядок сортировки в каталоге
 *   $data['cat_id'] => id категории
 *   $data['title'] => Наименование товара
 *   $data['description'] => Описание товара
 *   $data['price'] => Стоимость
 *   $data['url'] => URL продукта
 *   $data['image_url'] => Главная картинка товара
 *   $data['code'] => Артикул товара
 *   $data['count'] => Количество товара на складе  
 *   $data['activity'] => Флаг активности товара
 *   $data['old_price'] => Старая цена товара
 *   $data['recommend'] => Флаг рекомендуемого товара
 *   $data['new'] => Флаг новинок
 *   $data['thisUserFields'] => Пользовательские характеристики товара
 *   $data['images_product'] => Все изображения товара
 *   $data['currency'] => Валюта магазина.
 *   $data['propertyForm'] => Форма для карточки товара
 *     $data['liteFormData'] => Упрощенная форма для карточки товара
 *   $data['meta_title'] => Значение meta тега для страницы,
 *   $data['meta_keywords'] => Значение meta_keywords тега для страницы,
 *   $data['meta_desc'] => Значение meta_desc тега для страницы,
 *   $data['wholesalesData'] => Информация об оптовых скидках,
 *   $data['storages'] => Информация о складах,
 *   $data['remInfo'] => Информация при отсутсвии товара,
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['thisUserFields']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['thisUserFields']; ?>
 *   </code>
 *
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложную программную логику логику.
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */
// Установка значений в метатеги title, keywords, description.
mgSEO($data);
?>


<!--хлебные крошки-->
<?php if (class_exists('BreadCrumbs')): ?>
    <div class="breadcrumbs">
        [brcr]
    </div>
<?php endif; ?>

<!--секция с продуктом-->

<section class="product-section">
    <div class="product-container">
        <!--блок с картинками одного товара-->
    <div class="product-container-top">
        <div class="product-container__left">
            <?php
                component(
                'product/images',
                $data       
                );
            ?>
        </div>
        <!--информация и опции для продукта-->
        <div class="product-container__right">
            <h3 class="product__title"><?php echo ($data['title']); ?> </h3>
            
            <!--рейтинг товара-->
            <?php if (class_exists('ProductCommentsRating')): ?>
            <div class="product-container__rating">        
                    <div class="c-product__row">
                    [mg-product-rating id="<?php echo $data['id'] ?>"]
                    </div>
            </div>
            <?php endif ;?>

            <div class="product-compare">
            <?php
                component(
                'compare/link',
                $data
            );
            ?>
            </div>

            <!--информация артикул и наличие-->
            <div class="product-info">
                <ul class="product-info__list">
                    <li class="product-info__item">
                        <span class="product-info-bold"><?php echo lang ('productCode') ?>:</span>
                        <span><?php echo ($data['code']); ?></span>
                    </li>
                    <li class="product-info__item">
                        <?php if($data['count'] === '0') { ?>
                            <span class="product-info-bold--red"><?php echo lang ('countOutOfStock')?></span>
                        <?php } else { ?>
                            <span class="product-info-bold"><?php echo lang ('Availability')?>:</span>
                            <span>
                               <?php console_log($data) ;?>
                                <?php if (!empty($data['count_hr'])) {
                                    echo $data['count_hr'] ;
                                } else {
                                    echo $data['count'] . ' ' . $data['category_unit'] ;
                                } ?>
                            </span>

                        <?php } ?>
                    </li>
                </ul>
            </div>

            
            <div class="options">
                <h3 class="options__title"><?php echo lang('optionsVariants') ?></h3>
                <div class="variants-container">
                    <form action="<?php echo SITE . $data['liteFormData']['action'] ?>"
                        method="<?php echo $data['liteFormData']['method'] ?>"
                        class="property-form js-product-form <?php echo $data['liteFormData']['catalogAction'] ?>"
                        data-product-id='<?php echo $data['liteFormData']['id'] ?>'>
                        
                        <?php if(!(empty($data['variants']))): ?>
                        <!--блок с выбором вариантов товара-->
                        <div class="c-goods__footer">
                            <div class="c-form">                                                  
                                <?php
                                    component(
                                    'product/variants',
                                    $data
                                );
                                ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="c-goods__footer">
                            <div class="c-form">                                                  
                                <?php
                                    // Сложные характеристики – чекбоксы, радиокнопки, селекты
                                    component(
                                        'product/html-properties',
                                        $data['propertyForm']['htmlProperty']
                                    );
                                ?>
                            </div>
                        </div>


                        <!--изменяющаяся цена при выборе варианта-->
                        <div class="product-price-block">
                            <div class="c-product__price--title">
                                <?php echo lang('productPrice'); ?>
                            </div>
                            <span class="product-price js-change-product-price">
                                <span itemprop="price"
                                        content="<?php echo MG::numberDeFormat($data['price']); ?>">
                                    <?php echo $data['price'] ?>
                                </span>
                                <span itemprop="priceCurrency"
                                        content="<?php echo MG::getSetting('currencyShopIso'); ?>">
                                    <?php echo $data['currency']; ?>
                                </span>

                                <?php
                                if ($data['count'] === 0 || $data['count'] === '0') {
                                    $availability = "OutOfStock";
                                } else {
                                    $availability = "InStock";
                                }
                                ?>
                                <meta itemprop="availability"
                                        content="http://schema.org/<?php echo $availability ?>">
                                <link itemprop="url"
                                        href="<?php echo SITE . URL::getClearUri() ?>">

                            </span>
                        </div>

                        <!--старая цена-->
                        <?php if($data['old_price'] !== 0) : ?>
                        <div class="c-product__price c-product__price--old old">
                            <div class="c-product__price--title">
                                <?php echo lang('productOldPrice'); ?>
                            </div>
                            <s class="c-product__price--value old-price">
                                <?php echo MG::numberFormat($data['old_price']) . " " . $data['currency']; ?>
                            </s>
                        </div>
                        <?php endif ; ?>
                        <!--опция выбора количества продукта-->
                        <div class="c-buy js-product-controls">
                            <?php
                                component(
                                    'amount',
                                    [
                                        'id' => $data['id'],
                                        'maxCount' => $data['liteFormData']['maxCount'],
                                        'count' => '1',
                                    ]
                                );
                            ?>
                            <!--добавление в корзину кнопка-->
                            <div class="c-buy__buttons">

                                <div class="add-to-cart-btn">
                                    <?php
                                        component(
                                            'cart/btn/add',
                                            $data
                                        );
                                        ?>
                                    </div>

                                <!--добавление в сравнение кнопка-->
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

                                <!--добавление товара в избранное кнопка-->

                                <?php
                                    // Кнопка добавить-удалить из избранного
                                    component('favorites/btns', $data);
                                ?>

                                <!-- Плагин купить одним кликом-->
                                <?php if (class_exists('BuyClick')): ?>
                                    [buy-click id="<?php echo $data['id'] ?>"]
                                <?php endif; ?>
                                <!--/ Плагин купить одним кликом-->

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!--end prodict-container__right-->
                                </div>
            <!--вкладки описания отзывов и характеристик-->
    <div class="product-tabs-info">
        <ul class="product-tabs-info__nav-list">
            <?php if (!empty($data['description'])) : ?>
                <li class="product-tabs-info__nav-item"><a title="" href="#" class="product-tabs-info__nav-link product-tabs-info__nav-link--active js-product-nav-link"><?php echo lang('desc') ?></a></li>
            <?php endif ;?>
            <?php if(!(empty($data['stringPropertiesSorted']['groupProperty'] || $data['stringPropertiesSorted']['unGroupProperty']))) : ?>
                <li class="product-tabs-info__nav-item"><a title="" href="#" class="product-tabs-info__nav-link js-product-nav-link"><?php echo lang('characteristic') ?></a></li>
            <?php endif ;?>
            <?php if (class_exists('ProductCommentsRating')): ?>
                <li class="product-tabs-info__nav-item"><a title="" href="#" class="product-tabs-info__nav-link js-product-nav-link"><?php echo lang('reviews') ?> <span>([mg-product-count-comments item="<?php echo (MG::getSetting('shortLink') == 'true' ? '' : $data['category_url']).'/'.$data['url'] ?>"])</span></a></li>
            <?php endif ?>
        </ul>
        <ul class="products-tabs-info__list">
            <?php if (!empty($data['description'])) : ?>
            <li class="products-tabs-info__item active-item js-desc-item">
                <!--добавление описания продукта-->
                <p class="products-tabs-info__description">
                <?php echo ($data['description']); ?>
                </p>
            </li>
            <?php endif ;?>
            <?php if(!(empty($data['stringPropertiesSorted']['groupProperty'] || $data['stringPropertiesSorted']['unGroupProperty']))) : ?>
            <li class="products-tabs-info__item js-desc-item">
                <!--добавление характеристик продукта-->
                <table class="products-tabs-info__table">                        
                    <?php if(!(empty($data['stringPropertiesSorted']['groupProperty']))) : ?>
                        <?php foreach ($data['stringPropertiesSorted']['groupProperty'] as $groupChar): ?>
                            <tr>
                                <td class="table-head" colspan="2">
                                    <?php echo ($groupChar['name_group']) ?>
                                </td>
                            </tr>                           
                            <?php foreach ($groupChar['property'] as $subcharscteristic): ?>
                                <tr>
                                    <td>
                                        <?php echo ($subcharscteristic['key_prop']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($subcharscteristic['name_prop']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>                       
                        <?php endforeach;?>
                    <?php endif; ?> 
                    <?php foreach ($data['stringPropertiesSorted']['unGroupProperty'] as $characteristic): ?>
                        <?php if(!(empty($characteristic['name']))): ?>
                            <tr>
                                <td>
                                    <?php echo ($characteristic['name_prop']) ?>
                                </td>
                                <td>
                                    <?php echo ($characteristic['name']) ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </li>
            <?php endif ;?>
            <?php if (class_exists('ProductCommentsRating')): ?>
            <li class="products-tabs-info__item js-desc-item">
                <!--плагин с отзывом-->
                <div class="tab-reviews">
                    [mg-product-comments-rating id="<?php echo $data['id'] ?>"] 
                </div>
            </li>
            <?php endif ;?>
        </ul>
    </div>

    <!--с этим товаром покупают-->
    <?php if(!empty($data['related'])) : ?>
        <?php
        component(
            'related-product-carousel',
            [
                'items' => $data['related']['products'],
                'title' => lang('relatedAdd'),
                'currency' => $data['related']['currency']
            ]
        );
        ?>
    <?php endif; ?>

    </div> <!--end prodict-container-->

</section>