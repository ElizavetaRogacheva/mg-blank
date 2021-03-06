<?php mgAddMeta('components/news-catalog-carousel/css/news-catalog-carousel.css') ;?>
<div class="wrapper">
    <div class="featured-products-container">
        <div class="featured-products__title">
            <h3 class="italic-title"><?php echo $data['title']; ?></h3>
        </div>
        <div class="featured-products-carousel js-featured-products-carousel">             
            <?php
            $newsArr = array_chunk($data['items'], 3);
            foreach($newsArr as $newsBlock) { ?>
                <ul class="featured-products-carousel__list">
                    <?php foreach($newsBlock as $newsItem) { ?>
                        <li class="featured-products-carousel__item">
                            <?php
                                component(
                                    'product-item-news',
                                    $newsItem
                                );
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>

        <div class="featured-products__arrows">
            <button class="featured-products__arrow featured-products__arrow--left"></button>
            <button class="featured-products__arrow featured-products__arrow--right"></button>
        </div>
    </div>
    <?php if (MG::get('templateParams')['bgShow'] === '1') :?>
    <div class="featured-products__decor">
        <a href="<?php echo (MG::get('templateParams')['newsBgLink']) ?>" 
            class="featured-products__decor-link" 
            title="<?php echo (MG::get('templateParams')['newsBgLinkTitle']) ?>">
            <img src="<?php echo PATH_SITE_TEMPLATE . MG::get('templateParams')['newsBgUrl'] ?>"
                    title="<?php echo MG::get('templateParams')['newsBgImgTitle'] ?>"
                    alt="<?php echo MG::get('templateParams')['newsBgImgAlt'] ?>"
                    class="featured-products__decor-img">
        </a>
    </div>    
    <?php endif; ?>
</div>