<!--секция слайдера-->
<?php if (class_exists('Slider')): ?>
<section class="promo-slider">
    [mgslider id='<?php echo MG::get('templateParams')['sliderId']?>']
</section>
<?php endif; ?>

<!--секция с триггерами-->
<?php if (MG::get('templateParams')['triggersShow'] == true) : ?>
<section class="services-section">
    <?php component('services', $data); ?>
</section>
<?php endif ;?>

<!--секция описание магазина-->
<?php if (!empty($data['cat_desc'])) :?>
<section class="history-section">
    <div class="history-block">
        <?php echo $data['cat_desc'] ?>
    </div>
</section>
<?php endif ;?>

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
                    <a href="<?php echo (MG::get('templateParams')['bannerLeftLink'])?>" 
                       class="banners-item__link"
                       title="<?php echo (MG::get('templateParams')['bannerLeftLinkTitle'])?>">
                        <img title="<?php echo (MG::get('templateParams')['bannerLeftImgTitle'])?>" 
                             src="<?php echo PATH_SITE_TEMPLATE . MG::get('templateParams')['bannerLeftImageUrl'] ?>" 
                             alt="<?php echo (MG::get('templateParams')['bannerLeftImgAlt'])?>">                   
                    </a>
                </li>
                <li class="banners__item banners__item--right">
                <a href="<?php echo (MG::get('templateParams')['bannerRightLink'])?>" 
                   class="banners-item__link"
                   title="<?php echo (MG::get('templateParams')['bannerRightLinkTitle'])?>">
                    <img title="<?php echo (MG::get('templateParams')['bannerRightImgTitle'])?>" 
                         src="<?php echo PATH_SITE_TEMPLATE . MG::get('templateParams')['bannerRightImageUrl'] ?>" 
                         alt="<?php echo (MG::get('templateParams')['bannerLeftLinkTitle'])?>">                 
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


