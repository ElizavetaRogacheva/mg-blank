<?php mgSEO($data); ?>
<!--секция слайдера-->
<div class="product-compare--main-page">
    <?php
        component(
        'compare/link',
        $data
    );
    ?>
</div>
<?php if (class_exists('Slider')): ?>
<section class="promo-slider">
    [mgslider id='<?php echo MG::get('templateParams')['sliderId']?>']
</section>
<?php endif; ?>

<!--секция с триггерами-->
<?php if (MG::get('templateParams')['triggersShow'] === '1') : ?>
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


<section class="featured-products-section">
    <div class="featured-products-wrapper">
    <?php 
    if (MG::get('templateParams')['bannersShow'] === '1') :?>
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


