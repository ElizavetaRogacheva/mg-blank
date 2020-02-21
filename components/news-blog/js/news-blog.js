$('.js-news-block__slider-list').slick({
    infinite: !1,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: $('.news-slider__btn--left'),
    nextArrow: $('.news-slider__btn--right'),
    responsive: [
        {
            breakpoint: 800,
            settings: { slidesToShow: 2, slidesToScroll: 1 },
        },
        {
            breakpoint: 480,
            settings: { slidesToShow: 1, slidesToScroll: 1 },
        },
    ],
});
