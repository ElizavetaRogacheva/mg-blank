'use strict'

const menuBtns = document.querySelectorAll('.js-accordion-btn');
const submenuBtns = document.querySelectorAll('.js-accordion-btn-inner');

function getAccordion(btns) {
    btns.forEach((btn) => {
        btn.addEventListener('click', (evt) => {
            evt.preventDefault;
            if(!(btn.classList.contains('accordion-active'))) {
                btns.forEach((elem) => {
                    elem.classList.remove('accordion-active');
                }); 
                btn.classList.add('accordion-active');
            }   else {
                btn.classList.remove('accordion-active');
            }
        })
    }); 
}

getAccordion(menuBtns);
getAccordion(submenuBtns);
