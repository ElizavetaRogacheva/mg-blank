'use strict';
var langBtns = document.querySelectorAll('.js-lang-select');
console.log(langBtns);

var changeLang = function(event) {
    var url = event.currentTarget.dataset.lang;
    console.log(url);

    location.href = url;
};

langBtns.forEach(function(langBtn) {
    langBtn.addEventListener('click', changeLang);
});
