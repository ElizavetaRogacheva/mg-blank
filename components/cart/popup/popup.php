<?php
mgAddMeta('components/cart/cart.js');
mgAddMeta('components/cart/small/small.css');

$popupCartRow = function (
  $item = array('product_url' => 0,
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
                     alt="<?php echo $item['title'] ?>">
            </a>
        </td>
        <td class="c-table__name small-cart-name">
            <ul class="small-cart-list">
                <li>
                    <a class="c-table__link js-smallCartProdAnchor"
                       href="<?php echo SITE . "/" . (isset($item['category_url']) ? $item['category_url'] : 'catalog/') . $item['product_url'] ?>">
                      <?php echo $item['title'] ?>
                    </a>
                    <span class="property js-smallCartProperty">
                        <?php echo $item['property_html'] ?>
                    </span>
                </li>
                <li class="c-table__quantity qty">
                    x
                    <span class="js-smallCartAmount"><?php echo $item['countInCart'] ?></span>
                    <span class="js-cartPrice"><?php echo $item['priceInCart'] ?></span>
                </li>
            </ul>
        </td>
        <td class="c-table__remove small-cart-remove">
            <a href="#"
               class="deleteItemFromCart js-delete-from-cart"
               title="<?php echo lang('delete'); ?>"
               data-delete-item-id="<?php echo $item['id'] ?>"
               data-property="<?php echo $item['property'] ?>"
               data-variant="<?php echo (!empty($item['variantId']) ? $item['variantId'] : 0); ?>">
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

<div class="c-title"><?php echo lang('cartTitle'); ?></div>
<div class="c-table popup-body">
    <textarea class="popupCartRowTemplate"
              style="display:none;">
        <?php $popupCartRow(); ?>
    </textarea>
    <table class="small-cart-table js-popup-cart-table">
      <?php
      if (!empty($data['dataCart'])) {
        foreach ($data['dataCart'] as $item) {
          $popupCartRow($item);
        }
      }
      ?>
    </table>
</div>
<div class="popup-footer">
    <ul class="c-table__footer total sum-list">
        <li class="c-table__total total-sum">
          <?php echo lang('toPayment') ?>:
            <span class="total-payment">
                <?php
                if (!empty($data['cart_price_wc'])) {
                  echo $data['cart_price_wc'];
                }
                ?>
            </span>
        </li>
        <li class="checkout-buttons">
            <a class="c-button c-button--link c-modal__cart"
               href="javascript:void(0)">
              <?php echo lang('cartContinue'); ?>
            </a>
            <a class="c-button"
               href="<?php echo SITE ?>/order">
              <?php echo lang('cartCheckout'); ?>
            </a>
        </li>
    </ul>
</div>