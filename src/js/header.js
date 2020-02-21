'use strict'

const searchBtn = document.querySelector('.js-search__btn');
const searchContainer = document.querySelector('.js-search-container');
const accountBtn = document.querySelector('.js-account__btn');
const accountContainer = document.querySelector('.js-account-container');

searchBtn.addEventListener('click', () => {
    searchContainer.classList.toggle('visible');
});

accountBtn.addEventListener('click', () => {
    accountContainer.classList.toggle('visible');
});


