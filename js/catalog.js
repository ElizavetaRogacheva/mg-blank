'use strict';

let gridBtn = document.querySelector('.js-show-grid');
let listBtn = document.querySelector('.js-show-list');
let productList = document.querySelector('.js-products-block__list');

if(localStorage['activeMode'] === 'list') {
    addList();
} else if (localStorage['activeMode'] === 'grid') {
    addGrid();
} else {
    addGrid();
}

function addList() {
    localStorage['activeMode'] = 'list';
    gridBtn.classList.remove('filterboard-btn--active');
    productList.classList.remove('products-block__list--grid');
    productList.classList.add('products-block__list--list');
    listBtn.classList.add('filterboard-btn--active');
}

function addGrid() {
    localStorage['activeMode'] = 'grid';
    listBtn.classList.remove('filterboard-btn--active');
    productList.classList.remove('products-block__list--list');
    productList.classList.add('products-block__list--grid');
    gridBtn.classList.add('filterboard-btn--active');
}

listBtn.addEventListener('click', addList);
gridBtn.addEventListener('click', addGrid);
