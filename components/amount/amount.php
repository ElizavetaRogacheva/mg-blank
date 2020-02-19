<?php
mgAddMeta('components/amount/amount.js');
mgAddMeta('components/amount/amount.css');

if ($data['type'] === 'cart') {
  mgAddMeta('components/cart/cart.amount.js');
}
?>

<div class="cart_form js-amount-wrap">
    <div class="c-amount amount_change">
        <button class="c-amount__down down js-amount-change-down js-cart-amount-change">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 443.52 443.52" style="enable-background:new 0 0 443.52 443.52;" xml:space="preserve">
            <g>
              <g>
                <path d="M143.492,221.863L336.226,29.129c6.663-6.664,6.663-17.468,0-24.132c-6.665-6.662-17.468-6.662-24.132,0l-204.8,204.8
                  c-6.662,6.664-6.662,17.468,0,24.132l204.8,204.8c6.78,6.548,17.584,6.36,24.132-0.42c6.387-6.614,6.387-17.099,0-23.712
                  L143.492,221.863z"/>
              </g>
            </g>
          </svg>
        </button>

        <input type="text"
               name="<?php echo ($data['type'] === 'cart') ? 'item_' . $data['id'] . '[]' : 'amount_input' ?>"
               aria-label="Количество данного товара"
               class="amount_input zeroToo js-amount-input js-onchange-price-recalc"
               data-max-count="<?php echo $data['maxCount'] ?>"
               value="<?php echo(isset($data['count']) ? $data['count'] : '1'); ?>"/>

        <button class="c-amount__up up js-amount-change-up js-cart-amount-change"">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;" xml:space="preserve">
            <g>
              <g>
                <path d="M388.425,241.951L151.609,5.79c-7.759-7.733-20.321-7.72-28.067,0.04c-7.74,7.759-7.72,20.328,0.04,28.067l222.72,222.105
                  L123.574,478.106c-7.759,7.74-7.779,20.301-0.04,28.061c3.883,3.89,8.97,5.835,14.057,5.835c5.074,0,10.141-1.932,14.017-5.795
                  l236.817-236.155c3.737-3.718,5.834-8.778,5.834-14.05S392.156,245.676,388.425,241.951z"/>
              </g>
            </g>
          </svg>
        </button>
    </div>
</div>