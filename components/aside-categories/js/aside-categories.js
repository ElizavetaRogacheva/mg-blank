'use strict'

const categoryTitleWrapper = document.querySelectorAll('.js-categories-wrapper');
const asideSubcategoriesList = document.querySelectorAll('.js-aside-subcategories');

categoryTitleWrapper.forEach((category) => {
    category.addEventListener('click', (evt) => {
        if(category.parentNode.querySelector('.js-aside-subcategories') !== null) {
            evt.preventDefault();
            category.classList.toggle('visible');
        }
    });
});