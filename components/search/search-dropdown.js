'use strict'

const ITEM_TEMPLATE = document.querySelector('.js-search-item-template').content.querySelector('.js-search-item-template-inner');
const ARR_TOP_KEY_CODE = 38;
const ARR_BOTTOM_KEY_CODE = 40;
const MIN_SEARCH_VALUE_LENGTH = 2;
const ONE_KEY_CODE = 49;
const BACK_SLASH_KEY_CODE = 220;
let fragment = document.createDocumentFragment();
let searchResults = document.querySelector('.js-add-search-results');
let choseResult = -1;

document.querySelector('.search-form').addEventListener('keyup', function(e) {
	e.preventDefault();
	e.stopPropagation();

	if (e.keyCode === ARR_TOP_KEY_CODE && searchResults.firstChild && choseResult > 0) {
		choseResult -= 1;
		searchResults.childNodes[choseResult].childNodes[1].focus();
	} else if (
			e.keyCode === ARR_BOTTOM_KEY_CODE &&
		 	searchResults.firstChild && 
		 	choseResult < searchResults.childNodes.length - 1
	 	) {
		choseResult++;
		searchResults.childNodes[choseResult].childNodes[1].focus();
	} 
});

document.querySelector('input[name=search]').addEventListener('keyup', searchFunc);

window.addEventListener('focusin', (e) => {
	if (!document.querySelector('.search-form').contains(e.target)) {
		searchResults.innerHTML = "";
	}
})

window.addEventListener('click', (e) => {
	if (!document.querySelector('.search-form').contains(e.target)) {
		searchResults.innerHTML = "";
	}
})

function searchFunc(e) {
	choseResult = -1;

	let text = e.target.value;

	if (text.length < MIN_SEARCH_VALUE_LENGTH && searchResults.firstChild) {
		searchResults.innerHTML = "";	
	}

	if (text.length >= MIN_SEARCH_VALUE_LENGTH && e.keyCode >= ONE_KEY_CODE && e.keyCode <= BACK_SLASH_KEY_CODE) {
		let dataObj = {
		    fastsearch: "true",
	        text: text
		};

		let data = Object.keys(dataObj).map(function (k) {
		    return encodeURIComponent(k) + '=' + encodeURIComponent(dataObj[k])
		}).join('&');

		fetch(`${mgBaseDir}/catalog`, {
			method: 'POST',
			headers: {
		      'Content-Type': 'application/x-www-form-urlencoded'
		    },
			body: data
		}).then(response => {
			return response.json();
		}).then(result => {
			createSearchItem(result.item.items.catalogItems);
		}).catch(error => {
			console.log(error);
		})
	}
}

function createSearchItem(results) {

    results.forEach((result, index) => {
    	let itemHtml = ITEM_TEMPLATE.cloneNode(true);
    	itemHtml.setAttribute('id', index);
    	itemHtml.querySelector(".search-results__link").setAttribute('href', result.link);
    	itemHtml.querySelector('.js-search-item-title').innerHTML = result.title;
    	itemHtml.querySelector('.js-search-item-price').innerHTML = `${result.price} ${result.currency}`;
    	itemHtml.querySelector(".js-search-item-img").setAttribute('src', result.image_url);
    	itemHtml.querySelector(".search-results__link").setAttribute('title', result.title);
    	fragment.append(itemHtml);
    });
    searchResults.innerHTML = "";
    searchResults.appendChild(fragment);
}
