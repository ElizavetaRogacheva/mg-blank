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
            
        </button>

        <input type="text"
               name="<?php echo ($data['type'] === 'cart') ? 'item_' . $data['id'] . '[]' : 'amount_input' ?>"
               aria-label="Количество данного товара"
               class="amount_input zeroToo js-amount-input js-onchange-price-recalc"
               data-max-count="<?php echo $data['maxCount'] ?>"
               value="<?php echo(isset($data['count']) ? $data['count'] : '1'); ?>"/>

        <button class="c-amount__up up js-amount-change-up js-cart-amount-change"">
            
        </button>
    </div>
</div>