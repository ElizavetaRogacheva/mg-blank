<?php
mgAddMeta('components/cart/cart.js');
//mgAddMeta('components/cart/cart.amount.js');

mgAddMeta('components/cart/small/small.css');
mgAddMeta('components/cart/small/small.js');

mgAddMeta('components/cart/cart.css');


$smallCartRow = function (
  $item = array(
    'product_url' => 0,
    'image_url_new' => 0,
    'title' => 0,
    'property_html' => 0,
    'countInCart' => 0,
    'priceInCart' => 0,
    'id' => 0,
    'property' => 0,
    'variantId' => 0)
) {

  // Получаем массив миниатюр изображений

  
  $thumbsArr = getThumbsFromUrl($item['image_url_new'], $item['id']);
  ?>
    <tr>
        <td class="c-table__img small-cart-img">
            <a class="js-smallCartImgAnchor"
               href="<?php echo SITE . "/" . (isset($item['category_url']) ? $item['category_url'] : 'catalog/') . $item['product_url'] ?>">
                <img class="js-smallCartImg"
                     src="<?php echo $thumbsArr[30]['main'] ?>"
                     srcset="<?php echo $thumbsArr[30]['2x'] ?> 2x"
                     alt="<?php echo $item['title'] ?>"/>
            </a>
        </td>
        <td class="c-table__name small-cart-name">
            <ul class="small-cart-list">
                <li>
                    <a class="c-table__link js-smallCartProdAnchor"
                       href="<?php echo SITE . "/" . (isset($item['category_url']) ? $item['category_url'] : 'catalog/') . $item['product_url'] ?>"><?php echo $item['title'] ?></a>
                    <span class="property js-smallCartProperty"><?php echo $item['property_html'] ?></span>
                </li>
                <li class="c-table__quantity qty">
                    x
                    <span class="js-smallCartAmount"><?php echo $item['countInCart'] ?></span>
                    <span class="js-cartPrice"><?php echo $item['priceInCart'] ?></span>
                </li>
            </ul>
        </td>
        <td class="c-table__remove small-cart-remove">
            <a href="javascript: void(0);"
               class="deleteItemFromCart js-delete-from-cart"
               title="<?php echo lang('delete'); ?>"
               data-delete-item-id="<?php echo $item['id'] ?>"
               data-property="<?php echo $item['property'] ?>"
               data-variant="<?php echo(!empty($item['variantId']) ? $item['variantId'] : 0); ?>">
                <div class="icon__cart-remove">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <g>
                                <polygon points="353.574,176.526 313.496,175.056 304.807,412.34 344.885,413.804 			"/>
                                <rect x="235.948" y="175.791" width="40.104" height="237.285"/>
                                <polygon points="207.186,412.334 198.497,175.049 158.419,176.52 167.109,413.804 			"/>
                                <path d="M17.379,76.867v40.104h41.789L92.32,493.706C93.229,504.059,101.899,512,112.292,512h286.74
                                    c10.394,0,19.07-7.947,19.972-18.301l33.153-376.728h42.464V76.867H17.379z M380.665,471.896H130.654L99.426,116.971h312.474
                                    L380.665,471.896z"/>
                            </g>
                        </g>
                    </g>
                    <g>
                        <g>
                            <path d="M321.504,0H190.496c-18.428,0-33.42,14.992-33.42,33.42v63.499h40.104V40.104h117.64v56.815h40.104V33.42
                                C354.924,14.992,339.932,0,321.504,0z"/>
                        </g>
                    </g>
                    </svg>
                </div>
            </a>
        </td>
    </tr>
<?php } ?>

<div class="c-cart mg-desktop-cart">
    <!--<a class="c-cart__small cart"
       href="<?php //echo SITE ?>/cart">-->
        <span class="small-cart-icon"></span>
        <div class="c-cart__small--icon">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <g>
                <g>
                    <path d="M35.944,264.348l34.305,205.837c2.684,16.101,16.614,27.902,32.937,27.902h310.857c16.618,0,30.706-12.219,33.056-28.67
                        l29.292-205.069H35.944z M172.522,414.609c0,9.223-7.473,16.696-16.696,16.696c-9.223,0-16.696-7.473-16.696-16.696V314.435
                        c0-9.223,7.473-16.696,16.696-16.696c9.223,0,16.696,7.473,16.696,16.696V414.609z M272.696,414.609
                        c0,9.223-7.473,16.696-16.696,16.696s-16.696-7.473-16.696-16.696V314.435c0-9.223,7.473-16.696,16.696-16.696
                        s16.696,7.473,16.696,16.696V414.609z M372.87,414.609c0,9.223-7.473,16.696-16.696,16.696c-9.223,0-16.696-7.473-16.696-16.696
                        V314.435c0-9.223,7.473-16.696,16.696-16.696c9.223,0,16.696,7.473,16.696,16.696V414.609z"/>
                </g>
            </g>
            <g>
                <g>
                    <path d="M495.304,164.174h-48.739L301.195,18.805c-6.521-6.521-17.087-6.521-23.609,0c-6.521,6.516-6.521,17.092,0,23.609
                        l121.761,121.76H112.652l121.76-121.761c6.521-6.516,6.521-17.092,0-23.609c-6.521-6.521-17.087-6.521-23.609,0L65.435,164.174
                        H16.696C7.475,164.174,0,171.649,0,180.87v33.391c0,9.22,7.475,16.696,16.696,16.696h478.609c9.22,0,16.696-7.475,16.696-16.696
                        V180.87C512,171.649,504.525,164.174,495.304,164.174z"/>
                </g>
        </svg>
        </div>
    
        <!--<ul class="c-cart__small--list cart-list">
            <li class="c-cart__small--count">
                <div class="c-cart__small--text">-->
                  <?php //echo lang('cartCart'); ?>
                    <span class="countsht">
                        <?php echo $data['cart_count'] ? $data['cart_count'] : 0 ?>
                    </span>
                <!--</div>
            </li>
            <li class="c-cart__small--price cart-qty">
                <span class="pricesht">
                  <?php //echo $data['cart_price'] ? $data['cart_price'] : 0 ?>
                </span>
              <?php //echo (!empty($data['currency'])) ? $data['currency'] : ''; ?>
            </li>
        </ul>-->
    </a>
    <div class="c-cart__dropdown small-cart">
        <div class="l-row">
            <div class="l-col min-0--12">
                <div class="c-title"><?php echo lang('cartTitle'); ?></div>
            </div>
            <div class="l-col min-0--12">
                <div class="c-table c-table--scroll">
                    <textarea class="smallCartRowTemplate"
                              style="display:none;"><?php $smallCartRow(); ?></textarea>
                    <table class="small-cart-table">
                      <?php
                      if (!empty($data['dataCart'])) {
                        foreach ($data['dataCart'] as $item) {
                          $smallCartRow($item);
                        }
                      }
                      ?>
                    </table>
                </div>
                <ul class="c-table__footer total">
                    <li class="c-table__total total-sum"><?php echo lang('cartPay'); ?>
                        <span>
                            <?php
                            if (!empty($data['cart_price_wc'])) {
                              echo $data['cart_price_wc'];
                            }
                            ?>
                        </span>
                    </li>
                    <li class="checkout-buttons">
                        <a href="<?php echo SITE ?>/cart"
                           class="c-button c-button--link">
                          <?php echo lang('cartLink'); ?>
                        </a>
                        <a href="<?php echo SITE ?>/order"
                           class="c-button">
                          <?php echo lang('cartCheckout'); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>