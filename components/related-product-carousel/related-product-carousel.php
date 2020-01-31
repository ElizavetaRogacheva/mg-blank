<div class="related-products">
    <h3 class="related-products__title italic-title"><?php echo ($data['title']) ?></h3>
    <ul class="related-products__list js-related-products__list">
        <?php foreach($data[items] as $product) { ?>
            <li class="related-products__item">
            <?php
            component(
                'product-item',
                $product
            );
            ?>
            </li>
        <?php } ?>  
    </ul>
    <button class="slider__btn slider__btn--left related-products__btn related-products__btn--left"></button>
    <button class="slider__btn slider__btn--right related-products__btn related-products__btn--right"></button>
</div>
