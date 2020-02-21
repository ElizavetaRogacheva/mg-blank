'use strict'

const navBtns = document.querySelectorAll('.js-product-nav-link');
const descriptionBlocks = document.querySelectorAll('.js-desc-item');

for(let i = 0; i < navBtns.length; i++) {
    navBtns[i].addEventListener('click', (evt) =>{
        evt.preventDefault();
        navBtns.forEach((elem) => {
            elem.classList.remove('product-tabs-info__nav-link--active');
        });
        descriptionBlocks.forEach((elem) => {
            elem.classList.remove('active-item');
        })
        navBtns[i].classList.add('product-tabs-info__nav-link--active');
        descriptionBlocks[i].classList.add('active-item');
    })
}
