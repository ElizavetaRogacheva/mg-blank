'use strict';

const headerCartBtn = document.querySelector('.main-header__cart');
const cartDropdownBlock = document.querySelector('.c-cart__dropdown');

function toggleCartBlock() {
    cartDropdownBlock.classList.toggle('c-cart__dropdown--open');
}

headerCartBtn.addEventListener('click', toggleCartBlock);