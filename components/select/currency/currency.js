'use strict';
var currencyBtns = document.querySelectorAll('.js-currency-select');

currencyBtns.forEach((currencyBtn) => {
    currencyBtn.addEventListener('click',  function() {
        $.ajax({
            type: 'GET',
            url: mgBaseDir + '/ajaxrequest',
            data: {
                userCustomCurrency: currencyBtn.dataset.currency,
            },
            success: function(response) {
                window.location.reload();
            },
        });
    });
});
