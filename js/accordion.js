'use strict';
const menuBtns = document.querySelectorAll('.js-accordion-btn'),
    submenuBtns = document.querySelectorAll('.js-accordion-btn-inner');
function getAccordion(c) {
    c.forEach((e) => {
        e.addEventListener('click', (n) => {
            n.preventDefault,
                e.classList.contains('accordion-active')
                    ? e.classList.remove('accordion-active')
                    : (c.forEach((c) => {
                          c.classList.remove('accordion-active');
                      }),
                      e.classList.add('accordion-active'));
        });
    });
}
getAccordion(menuBtns), getAccordion(submenuBtns);
