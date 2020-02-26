$('.js-search__btn').click(() => {
    $('.js-search-container').toggleClass('visible');
}),
    $('.js-account__btn').click(() => {
        $('.js-account-container').toggleClass('visible');
    }),
    $('#contact').click(() => {
        $('.js-contacts__list').toggleClass('accordion-visible'),
            $('#contact').toggleClass('rotate');
    }),
    $('#info').click(() => {
        $('.js-footer-info__list').toggleClass('accordion-visible'),
            $('#info').toggleClass('rotate');
    });

const btnTop = $('.js-scroll-top');
$(window).scroll(() => {
    $(window).scrollTop() > 300
        ? btnTop.addClass('show-scroll')
        : btnTop.removeClass('show-scroll');
}),
    btnTop.on('click', (s) => {
        s.preventDefault(), $('html, body').animate({ scrollTop: 0 }, '300');
    });
