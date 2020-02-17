'use strict';

const headerCartBtn = document.querySelector('.mg-desktop-cart');
const cartDropdownBlock = document.querySelector('.c-cart__dropdown');

headerCartBtn.addEventListener('click', (evt) => {
    evt.preventDefault();
    console.log('123');
    if ($('.small-cart-table tr').length !== 0) {
        cartDropdownBlock.classList.toggle('small-cart-open');
    }
});
