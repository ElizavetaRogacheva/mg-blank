'use strict';
var langBtns = document.querySelectorAll('.js-lang-select');

var changeLang = function(event) {
    var url = event.currentTarget.dataset.lang;
    location.href = url;
};

langBtns.forEach(function(langBtn) {
    langBtn.addEventListener('click', changeLang);
});

