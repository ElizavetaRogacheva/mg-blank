'use strict';

const headerCartBtn = document.querySelector('.mg-desktop-cart');
const cartDropdownBlock = document.querySelector('.c-cart__dropdown');

headerCartBtn.addEventListener('mouseover', () => {
    if ($('.small-cart-table tr').length === 0) {
        cartDropdownBlock.style.display = 'none';
    }
});
