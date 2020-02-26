'use strict';

const filterTitle = document.querySelector('.js-filter-title');
const filterAsideList = document.querySelector('.js-filter__list');

if (filterTitle) {
    filterTitle.addEventListener('click', () => {
        filterAsideList.classList.toggle('accordion-visible');
        filterTitle.classList.toggle('rotate');
    });
}
