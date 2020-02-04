'use strict'

const contactBtn = document.querySelector('#contact');
const contactList = document.querySelector('.js-contacts__list');
const infoBtn= document.querySelector('#info');
const infoList= document.querySelector('.js-footer-info__list');

.addEventListener('click', () => {
    contactList.classList.toggle('visible');
    contactBtn.classList.toggle('rotate');
});

.addEventListener('click', () => {
    infoList.classList.toggle('visible');
    infoBtn.classList.toggle('rotate');
});


