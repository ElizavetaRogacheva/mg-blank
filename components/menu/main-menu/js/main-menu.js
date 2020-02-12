'use strict'
const menuBtns = document.querySelectorAll('.js-accordion-btn');
const mainNavBtn = document.querySelector('.js-main-nav__btn');
const mainNavList = document.querySelector('.js-main-nav');

function getAccordion(btns) {
    btns.forEach((btn) => {
        btn.addEventListener('click', (evt) => {
            evt.preventDefault();
            evt.stopPropagation();
            evt.stopImmediatePropagation();

            if(!(btn.parentNode.classList.contains('accordion-active'))) {
                btns.forEach((elem) => {
                    elem.parentNode.classList.remove('accordion-active');
                }); 
                btn.parentNode.classList.add('accordion-active');
            }   else {
                btn.parentNode.classList.remove('accordion-active');
            }
        })
    }); 
};

mainNavBtn.addEventListener('click', () => {
    mainNavList.classList.toggle('main-nav-close');
})

getAccordion(menuBtns);
