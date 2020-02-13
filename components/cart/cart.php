<?php
mgAddMeta('components/cart/cart.css');
mgAddMeta('components/cart/cart.js');
?>


<?php if (class_exists('MinOrder')): ?>
    <div class="l-col min-0--12">
        [min-order]
    </div>
<?php endif; ?>

<div class="l-col min-0--12">
    <div class="c-title">
      <?php echo lang('productCart'); ?>
    </div>
    <div class="product-cart"
         style="display:<?php echo $data['isEmpty'] ? 'block' : 'none'; ?>">
        <div class="c-form cart-wrapper">
            <form class="cart-form js-cart-form"
                  method="post"
                  action="<?php echo SITE ?>/cart">
                <div class="c-table">
                    <table class="cart-table">
                      <?php $i = 1;
                      foreach ($data['productPositions'] as $product): ?>
                          <tr>
                              <td class="c-table__img img-cell">
                                  <a href="<?php echo $product["link"] ?>"
                                     title="<?php echo $product["title"] ?>"
                                     target="_blank"
                                     class="cart-img">

                                      <img src="<?php echo mgImageProductPath($product["image_url"], $product['id'], 'small') ?>"
                                           title="<?php echo $product["title"] ?>"
                                           alt="<?php echo $product["title"] ?>">

                                  </a>
                              </td>
                              <td class="c-table__name name-cell">
                                  <a class="c-table__link"
                                     title="<?php echo $product["title"] ?>"
                                     href="<?php echo $product["link"] ?>"
                                     target="_blank">
                                    <?php echo $product['title'] ?>
                                  </a>
                                  <br>
                                <?php echo $product['property_html'] ?>
                              </td>
                              <td class="c-table__count count-cell">

                                <?php
                                // Компонент выбора количества товара
                                component(
                                  'amount',
                                  [
                                    'id' => $product['id'],
                                    'maxCount' => $data['maxCount'],
                                    'count' => $product['countInCart'],
                                    'type' => 'cart'
                                  ]
                                ); ?>

                                  <input type="hidden"
                                         name="property_<?php echo $product['id'] ?>[]"
                                         value="<?php echo $product['property'] ?>"/>
                              </td>
                              <td class="c-table__price price-cell js-cartPrice">
                                <?php echo MG::numberFormat($product['countInCart'] * $product['price']) ?>
                                <?php echo $data['currency']; ?>
                              </td>
                              <td class="c-table__remove remove-cell">
                                  <a class="deleteItemFromCart delete-btn js-delete-from-cart"
                                     href="<?php echo SITE ?>/cart"
                                     data-delete-item-id="<?php echo $product['id'] ?>"
                                     data-property="<?php echo $product['property'] ?>"
                                     data-variant="<?php echo(!empty($product['variantId']) ? $product['variantId'] : 0); ?>"
                                     title="<?php echo lang('deleteProduct'); ?>">
                                      <div class="icon__cart">
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
                      <?php endforeach; ?>
                    </table>
                </div>
            </form>

          <?php if ((class_exists('OikDisountCoupon')) ||
            (class_exists('PromoCode'))): ?>
              <div class="c-promo-code">
                  [promo-code]
              </div>
          <?php endif; ?>

            <div class="c-table__footer total-price-block">
                <div class="c-table__total">
                    <span class="title">
                        <?php echo lang('toPayment'); ?>:
                    </span>
                    <span class="total-sum">
                        <strong>
                            <?php echo priceFormat($data['totalSumm']) ?>&nbsp;
                            <?php echo $data['currency']; ?>
                        </strong>
                    </span>
                </div>

              <?php if (!URL::isSection('order')): ?>
                  <form action="<?php echo SITE ?>/order"
                        method="post"
                        class="checkout-form">
                      <button type="submit"
                              class="checkout-btn default-btn success"
                              name="order"
                              title="Оформить заказ"
                              value="<?php echo lang('checkout'); ?>">
                        <?php echo lang('checkout'); ?>
                      </button>
                  </form>
              <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="c-alert c-alert--blue empty-cart-block alert-info"
         style="display:<?php echo !$data['isEmpty'] ? 'block' : 'none'; ?>">
      <?php echo lang('cartIsEmpty'); ?>
    </div>
</div>