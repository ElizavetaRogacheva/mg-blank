<!--секция слайдера-->
<?php if (class_exists('Slider')): ?>
<section class="promo-slider">
    [mgslider id='2']
</section>
<?php endif; ?>

<!--секция с триггерами-->
<section class="services-section">
    <?php component('services', $data); ?>
</section>

<!--секция плагин триггеры-->
<?php if (class_exists('trigger')): ?>
<section class="trigger-section">
    [trigger-guarantee id=" 1"]
</section>
<?php endif; ?>

<!--секция описание магазина-->
<section class="history-section">
    <div class="history-block">
        <p class="history-block__description history-block__description--top">
            <?php echo $data['cat_desc'] ?>
        </p>
    </div>
</section>

<!--секция товаров со скидкой-->
<?php if(!empty($data['recommendProducts'])) : ?>
    <?php
        component(
            'catalog-carousel',
            [
            'items' => $data['recommendProducts'],
            'link' => SITE . '/group?type=recommend',
            'title' => lang('indexHit')
            ]
        );
    ?>
<?php endif; ?>

<!--секция товары со скидкой-->
<?php if(!empty($data['saleProducts'])) : ?>
    <?php
    component(
        'catalog-carousel',
        [
        'items' => $data['saleProducts'],
        'link' => SITE . '/group?type=sale',
        'title' => lang('indexSale')
        ]
    );
  ?>
<?php endif; ?>

<!--секция по шаблону с рекомендованными товарами-->
<section class="featured-products-section">
    <div class="featured-products-wrapper">
    <?php if (MG::get('templateParams')['bannersShow'] == true) :?>
        <div class="banners">
            <ul class="banners__list">
                <li class="banners__item banners__item--left">
                    <a href="#" 
                       class="banners-item__link"
                       title="">
                        <img title="" src="<?php echo PATH_SITE_TEMPLATE . MG::get('templateParams')['bannerLeftUrl'] ?>" alt="">                   
                    </a>
                </li>
                <li class="banners__item banners__item--right">
                <a href="#" 
                   class="banners-item__link"
                   title="">
                    <img title="" src="<?php echo PATH_SITE_TEMPLATE . MG::get('templateParams')['bannerRightUrl'] ?>" alt="">                 
                   </a>
                </li>
            </ul>
        </div>
    <?php endif ;?>
    <!--секция новинок-->
    <?php // viewData($data) ?>
    <?php if(!empty($data['newProducts'])) : ?>
        <?php
            component(
                'news-catalog-carousel',
                [
                'items' => $data['newProducts'],
                'link' => SITE . '/group?type=latest',
                'title' => lang('indexNew')
                ]
            );
        ?>
    <?php endif; ?>
    </div>
</section>

<!--секция по шаблону предложение дня-->
<section class="special-section">
    <div class="special-container">
        <h2 class="special__title italic-title">Deal Of The Day</h2>
        <div class="special-slider">
            <ul class="special-slider__list js-special-slider__list">
                <li class="special-slider__item">
                    <div class="special-slider__item-wrapper">
                        <div class="image-block">
                            <div class="sale-sticker">
                                <span>sale</span>
                            </div>
                            <div class="discount-block">
                                <span>2% off</span>
                            </div>
                            <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/03-360x302.jpg" alt="" class="image-block__img">
                            <div id="timer" class="countdown">
                                <div class="countdown-number">
                                    <span class="days countdown-time" id="days"></span>
                                    <span class="countdown-text">Days</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="hours countdown-time" id="hours"></span>
                                    <span class="countdown-text">Hours</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="minutes countdown-time" id="minutes"></span>
                                    <span class="countdown-text">Mins</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="seconds countdown-time" id="seconds"></span>
                                    <span class="countdown-text">Secs</span>
                                </div>
                                </div>
                        </div>
                        <div class="special-content">
                            <h4 class="special-content__title">Commodi Consequatur</h4>
                            <p class="special-content__description">The standard Lorem Ipsum passage, used since the 1500 Fashion has been creating well-designed collections since 2010. T..</p>
                            <div class="price">
                                <span>$134.00</span>
                                <s>$136.40</s>
                            </div>
                            <div class="rating-block"></div>
                            <a title="" href="#" class="btn__link">add to cart</a>
                        </div>
                    </div>
                </li>
                <li class="special-slider__item">
                    <div class="special-slider__item-wrapper">
                        <div class="image-block">
                            <div class="sale-sticker">
                                <span>sale</span>
                            </div>
                            <div class="discount-block">
                                <span>8% off</span>
                            </div>
                            <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/04-360x302.jpg" alt="" class="image-block__img">
                            <div id="countdown" class="countdown">
                                <div class="countdown-number">
                                    <span class="days countdown-time">14</span>
                                    <span class="countdown-text">Days</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="hours countdown-time">23</span>
                                    <span class="countdown-text">Hours</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="minutes countdown-time">59</span>
                                    <span class="countdown-text">Mins</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="seconds countdown-time">00</span>
                                    <span class="countdown-text">Secs</span>
                                </div>
                                </div>
                        </div>
                        <div class="special-content">
                            <h4 class="special-content__title">Consectetur Hampden</h4>
                            <p class="special-content__description">Housed in a new aluminum design, the display has a very thin bezel that enhances visual accuracy. Each display features ..</p>
                            <div class="price">
                                <span>$110.00 </span>
                                <s>$110.60</s>
                            </div>
                            <div class="rating-block"></div>
                            <a title="" href="#" class="btn__link">add to cart</a>
                        </div>
                    </div>
                </li>
                <li class="special-slider__item">
                    <div class="special-slider__item-wrapper">
                        <div class="image-block">
                            <div class="sale-sticker">
                                <span>sale</span>
                            </div>
                            <div class="discount-block">
                                <span>6% off</span>
                            </div>
                            <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/08-954x800.jpg" alt="" class="image-block__img">
                            <div id="countdown" class="countdown">
                                <div class="countdown-number">
                                    <span class="days countdown-time">14</span>
                                    <span class="countdown-text">Days</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="hours countdown-time">23</span>
                                    <span class="countdown-text">Hours</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="minutes countdown-time">59</span>
                                    <span class="countdown-text">Mins</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="seconds countdown-time">00</span>
                                    <span class="countdown-text">Secs</span>
                                </div>
                                </div>
                        </div>
                        <div class="special-content">
                            <h4 class="special-content__title">Laudant Doloremque</h4>
                            <p class="special-content__description">The D300 reacts with lightning speed, powering up in a mere 0.13 seconds and shooting with an imperceptible 45-milliseco..</p>
                            <div class="price">
                                <span>$92.00 </span>
                                <s>$108.00</s></div>
                            <div class="rating-block"></div>
                            <a title="" href="#" class="btn__link">add to cart</a>
                        </div>
                    </div>
                    </li>
                <li class="special-slider__item">
                    <div class="special-slider__item-wrapper">
                        <div class="image-block">
                            <div class="sale-sticker">
                                <span>sale</span>
                            </div>
                            <div class="discount-block">
                                <span>3% off</span>
                            </div>
                            <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/10-954x800.jpg" alt="" class="image-block__img">
                            <div id="countdown" class="countdown">
                                <div class="countdown-number">
                                    <span class="days countdown-time">14</span>
                                    <span class="countdown-text">Days</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="hours countdown-time">23</span>
                                    <span class="countdown-text">Hours</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="minutes countdown-time">59</span>
                                    <span class="countdown-text">Mins</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="seconds countdown-time">00</span>
                                    <span class="countdown-text">Secs</span>
                                </div>
                                </div>
                        </div>
                        <div class="special-content">
                            <h4 class="special-content__title">Neque Porro Quisquam</h4>
                            <p class="special-content__description">Latest Intel mobile architecture Powered by the most advanced mobile processors from Intel, the new Core 2 Duo M..</p>
                            <div class="price">
                                <span>$115.00 </span>
                                <s>$118.00</s>
                            </div>
                            <div class="rating-block"></div>
                            <a title="" href="#" class="btn__link">add to cart</a>
                        </div>
                    </div>
                </li>
                <li class="special-slider__item">
                    <div class="special-slider__item-wrapper">
                        <div class="image-block">
                            <div class="sale-sticker">
                                <span>sale</span>
                            </div>
                            <div class="discount-block">
                                <span>6% off</span>
                            </div>
                            <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/11-360x302.jpg" alt="" class="image-block__img">
                            <div id="countdown" class="countdown">
                                <div class="countdown-number">
                                    <span class="days countdown-time">14</span>
                                    <span class="countdown-text">Days</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="hours countdown-time">23</span>
                                    <span class="countdown-text">Hours</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="minutes countdown-time">59</span>
                                    <span class="countdown-text">Mins</span>
                                </div>
                                <div class="countdown-number">
                                    <span class="seconds countdown-time">00</span>
                                    <span class="countdown-text">Secs</span>
                                </div>
                                </div>
                        </div>
                        <div class="special-content">
                            <h4 class="special-content__title">Nostrud Exercitation</h4>
                            <p class="special-content__description">Just when you thought iMac had everything, now there´s even more. More powerful Intel Core 2 Duo processors. And more me..</p>
                            <div class="price">
                                <span>$78.80 </span>
                                <s>$83.60</s>
                            </div>
                            <div class="rating-block"></div>
                            <a title="" href="#" class="btn__link">add to cart</a>
                        </div>
                    </div>
                </li>
            </ul>
            <button class="slider__btn slider__btn--left special-slider__btn special-slider__btn--left"></button>
            <button class="slider__btn slider__btn--right special-slider__btn special-slider__btn--right"></button>
        </div>
    </div>
</section>

<!--секция по шаблону новости-->
<section class="main-page__news-section">
    <div class="news-block">
        <div class="news-popup">
            <img title="" src="" alt="">
            <button class="close-popup__btn"></button>
        </div>
        <h4 class="news-block__title italic-title">Latest News</h4>
        <ul class="news-block__slider-list js-news-block__slider-list">
            <li class="news-block__slider-item">
                <div class="news-article">
                    <div class="bg-fade">
                        <div class="news-article__links">
                            <a title="" href="#" class="news-article__link news-article__link--fullimg" id="new-1"></a>
                            <a title="" href="#" class="news-article__link news-article__link--viewmore"></a>
                        </div>        
                    </div>
                    <div class="news-article__img">
                        <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/blog-6-892x610.jpg" alt="">
                    </div>
                    <div class="news-article__content">
                        <div class="date"><span>28/02/2018</span></div>
                        <div class="news-article__title"><span>Necessitatibus Saepe Eveniet</span></div>
                        <p class="news-article__description"> The standard Lorem Ipsum passage, used since the 1500s"Lorem ipsum dolor sit amet, consectetur adipi...  </p>
                    </div>
                </div>
            </li>
            <li class="news-block__slider-item">
                <div class="news-article">
                    <div class="bg-fade">
                        <div class="news-article__links">
                            <a title="" href="#" class="news-article__link news-article__link--fullimg" id="new-2"></a>
                            <a title="" href="#" class="news-article__link news-article__link--viewmore"></a>
                        </div>        
                    </div>
                    <div class="news-article__img">
                        <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/blog-5-892x610.jpg" alt="">
                    </div>
                    <div class="news-article__content">
                        <div class="date"><span>28/02/2018</span></div>
                        <div class="news-article__title"><span>Quis Autem Reprehender Pariatur</span></div>
                        <p class="news-article__description">1914 translation by H. Rackham"But I must explain to you how all this mistaken idea of denouncing pl...</p>
                    </div>
                </div>
            </li>
            <li class="news-block__slider-item">
                <div class="news-article">
                    <div class="bg-fade">
                        <div class="news-article__links">
                            <a title="" href="#" class="news-article__link news-article__link--fullimg" id="new-3"></a>
                            <a title="" href="#" class="news-article__link news-article__link--viewmore"></a>
                        </div>        
                    </div>
                    <div class="news-article__img">
                        <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/blog-4-892x610.jpg" alt="">
                    </div>
                    <div class="news-article__content">
                        <div class="date"><span>28/02/2018</span></div>
                        <div class="news-article__title"><span>Morbi condimentum molestie Nam</span></div>
                        <p class="news-article__description">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrass...</p>
                    </div>
                </div>
            </li>
            <li class="news-block__slider-item">
                <div class="news-article">
                    <div class="bg-fade">
                        <div class="news-article__links">
                            <a title="" href="#" class="news-article__link news-article__link--fullimg" id="new-4"></a>
                            <a title="" href="#" class="news-article__link news-article__link--viewmore"></a>
                        </div>        
                    </div>
                    <div class="news-article__img">
                        <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/blog-3-892x610.jpg" alt="">
                    </div>
                    <div class="news-article__content">
                        <div class="date"><span>28/02/2018</span></div>
                        <div class="news-article__title"><span>Matters To This Principle Of Selection</span></div>
                        <p class="news-article__description">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classi...</p>
                    </div>
                </div>
            </li>
            <li class="news-block__slider-item">
                <div class="news-article">
                    <div class="bg-fade">
                        <div class="news-article__links">
                            <a title="" href="#" class="news-article__link news-article__link--fullimg" id="new-5"></a>
                            <a title="" href="#" class="news-article__link news-article__link--viewmore"></a>
                        </div>        
                    </div>
                    <div class="news-article__img">
                        <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/blog-2-892x610.jpg" alt="">
                    </div>
                    <div class="news-article__content">
                        <div class="date"><span>28/02/2018</span></div>
                        <div class="news-article__title"><span>Omnis Voluptas Assumenda Est</span></div>
                        <p class="news-article__description">It is a long established fact that a reader will be distracted by the readable content of a page whe...</p>
                    </div>
                </div>
            </li>
            <li class="news-block__slider-item">
                <div class="news-article">
                    <div class="bg-fade">
                        <div class="news-article__links">
                            <a title="" href="#" class="news-article__link news-article__link--fullimg" id="new-6"></a>
                            <a title="" href="#" class="news-article__link news-article__link--viewmore"></a>
                        </div>        
                    </div>
                    <div class="news-article__img">
                        <img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/blog-1-892x610.jpg" alt="">
                    </div>
                    <div class="news-article__content">
                        <div class="date"><span>28/02/2018</span></div>
                        <div class="news-article__title"><span>Praesentium Voluptatum Deleniti</span></div>
                        <p class="news-article__description">Suspendisse posuere, diam in bibendum lobortis, turpis ipsum aliquam risus, sit amet dictum ligula l...</p>
                    </div>
                </div>
            </li>
        </ul>
        <button class="slider__btn slider__btn--left news-slider__btn news-slider__btn--left"></button>
        <button class="slider__btn slider__btn--right news-slider__btn news-slider__btn--right"></button>
    </div>
</section>

<!--секция бренды-->
<section class="brands-section">
    <?php if (class_exists('Brands')): ?>
          <div class="l-col min-0--12 max-767--hide">
              <div class="mg-brand c-carousel ">
                  [mg-brand]
              </div>
          </div>
      <?php endif; ?>
</section>


