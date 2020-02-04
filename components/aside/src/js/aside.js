'use strict'

const catTitle  = document.querySelector('.js-categories__title');
const catList  = document.querySelector('.js-categories__list');
const filterTitle = document.querySelector('.js-filter-title');
const filterAsideList  = document.querySelector('.js-filter__list');
const latestProd  = document.querySelector('.js-latest-products__title');
const latestList  = document.querySelector('.js-latest-products__list');

catTitle.addEventListener('click', () => {
    catList.classList.toggle('visible');
    catTitle.classList.toggle('rotate');
});

filterTitle.addEventListener('click', () => {
    filterAsideList.classList.toggle('visible');
    filterTitle.classList.toggle('rotate');
});

latestProd.addEventListener('click', () => {
    latestList.classList.toggle('visible');
    latestProd.classList.toggle('rotate');
});

