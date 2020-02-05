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
        <?php
            component(
            'filter',
            $data
        );
        ?>
    </div>

    <div class="advertising">
        <a title="" href="#" class="advertising-block__link">
            <img title="" src="./img/left-banner-1-278x320.jpg" alt="">
        </a>
    </div>
    <div class="latest-products">
        <div class="latest-products__title js-latest-products__title aside-title"><span>latest</span></div>
        <ul class="latest-products__list js-latest-products__list">
            <li class="latest-products__item">
                <div class="latest-product-card">
                    <a title="" href="#" class="featured-product-card__link">
                        <img title="" src="./img/05-360x302.jpg" alt="">
                    </a>
                    <div class="product-block-content">
                        <h4 class="product-block__title latest-product-title">
                            <a title="" href="#" class="latest-product-link">Consectetur Hampden</a>
                        </h4>
                        <p class="price latest-product-price">$110.00 <s>$119.60</s></p>
                        <button class="latest-products__btn">add to cart</button>
                    </div>
                </div>
            </li>
            <li class="latest-products__item">
                <div class="latest-product-card">
                    <a title="" href="#" class="featured-product-card__link">
                        <img title="" src="./img/03-360x302.jpg" alt="">
                    </a>
                    <div class="product-block-content">
                        <h4 class="product-block__title latest-product-title">
                            <a title="" href="#" class="latest-product-link">Aliquam Quaerat</a>
                        </h4>
                        <p class="price latest-product-price">$108.80</p>
                        <button class="latest-products__btn">add to cart</button>
                    </div>
                </div>
            </li>
            <li class="latest-products__item">
                <div class="latest-product-card">
                    <a title="" href="#" class="featured-product-card__link">
                        <img title="" src="./img/02-360x302.jpg" alt="">
                    </a>
                    <div class="product-block-content">
                        <h4 class="product-block__title latest-product-title">
                            <a title="" href="#" class="latest-product-link">Accusantium Doloremque</a>
                        </h4>
                        <p class="price latest-product-price">$104.00</p>
                        <button class="latest-products__btn">add to cart</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

