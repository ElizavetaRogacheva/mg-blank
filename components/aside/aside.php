<?php mgAddMeta('components/aside/js/aside.js'); ?>
<?php mgAddMeta('components/aside/css/aside.css'); ?>

<aside class="products-aside">
    
    <?php if (!(empty($data['menuCategories']))) : ?>
        <?php
            component(
            'aside-categories',
            $data
        );
        ?>
    <?php endif; ?>

    <div class="filter">
    <div class="filter-title js-filter-title aside-title"><?php echo lang('filter')?></div>
    <div class="filter__list js-filter__list">
        <?php
            component(
            'filter',
            $data
        );
        ?>
    </div>
    </div>
    
    <?php if (MG::get('templateParams')['asideBannerShow'] === '1') :?>
        <div class="advertising">
            <a title="<?php echo (MG::get('templateParams')['asideBannerLinkTitle']) ?>" 
               href="<?php echo (MG::get('templateParams')['asideBannerLink']) ?>" 
               class="advertising-block__link">
                <img title="<?php echo (MG::get('templateParams')['asideBannerImgTitle']) ?>" 
                     src="<?php echo PATH_SITE_TEMPLATE . MG::get('templateParams')['asideBannerImgUrl'] ?>" 
                     alt="<?php echo (MG::get('templateParams')['asideBannerImgAlt']) ?>">
            </a>
        </div>
    <?php endif ;?>

    <?php if (class_exists('RecentlyViewed')) { ?>
    <div class="latest-products">
            <div class="l-col min-0--12">             
                <div class="latest-products__title js-latest-products__title aside-title">
                    <span><?php echo lang('RecentlyViewed'); ?></span>
                </div>
                <div class="latest-products__list js-latest-products__list">
                    [recently-viewed countPrint=3 count=3 random=0]
                </div>
            </div>
        </div>
        <?php } ?>
</aside>

