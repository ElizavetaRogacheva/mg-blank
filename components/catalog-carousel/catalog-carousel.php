<?php mgAddMeta('components/catalog-carousel/css/catalog-carousel.css') ;?>
<section class="popular-products-section">
    <div class="popular-products-block">
        <h2 class="popular-products__title italic-title"><?php echo $data['title']; ?></h2>
        <ul class="popular-products__list">
            <?php foreach($data[items] as $product) { ?>
                <li class="popular-products__item">
                <?php
                component(
                    'product-item',
                    $product
                );
                ?>
                </li>
            <?php } ?>  
        </ul>
        <a title="" href="<?php echo $data['link']; ?>" class="btn__link"><?php echo lang('viewMoreBtn')?></a>
    </div>
</section>