'use strict';

const headerCartBtn = document.querySelector('.mg-desktop-cart');
const cartDropdownBlock = document.querySelector('.c-cart__dropdown');

headerCartBtn.addEventListener('click', () => {
    if ($('.small-cart-table tr').length !== 0) {
        cartDropdownBlock.classList.toggle('small-cart-open');
    }
});
