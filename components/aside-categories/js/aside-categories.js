'use strict';

const asideSubcategoriesList = document.querySelectorAll(
    '.js-aside-subcategories'
);
const asideCategoriesBtns = document.querySelectorAll(
    '.js-categories-title-btn'
);

asideCategoriesBtns.forEach((categoryBtn) => {
    categoryBtn.addEventListener('click', (evt) => {
        evt.stopPropagation();
        categoryBtn.parentNode.classList.toggle('visible');
    });
});
