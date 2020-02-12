'use strict'

const menuBtns = document.querySelectorAll('.js-accordion-btn');

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
}

getAccordion(menuBtns);
