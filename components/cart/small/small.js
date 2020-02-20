'use strict';

const headerCartBtn = document.querySelector('.mg-desktop-cart');
const cartDropdownBlock = document.querySelector('.c-cart__dropdown');

headerCartBtn.addEventListener('click', () => {
    if ($('.small-cart-table tr').length !== 0) {
        cartDropdownBlock.classList.toggle('small-cart-open');
    }
}); /* 
document.addEventListener('click', function(evt) {
    const target = evt.target;
    const itsCart = target == cartDropdownBlock || cartDropdownBlock.contains(target);
    const itsCartBtn = target == headerCartBtn;
    const cartDropdownActive = cartDropdownBlock.classList.contains(
        'small-cart-open'
    );

    if (!itsCart && !itsCartBtn && cartDropdownActive) {
        if ($('.small-cart-table tr').length !== 0) {
            cartDropdownBlock.classList.toggle('small-cart-open');
        }
    }
});
 */

/* document.addEventListener('click', function(evt) {
    if(!cartDropdownBlock.contains(evt.target) && cartDropdownBlock.classList.contains('small-cart-open')) {
        cartDropdownBlock.classList.toggle('small-cart-open');
    }
});
 */
