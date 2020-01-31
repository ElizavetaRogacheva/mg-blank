<!--категории товаров в блоке-->
<div class="categories">
    <div class="categories__title js-categories__title aside-title">
        <span>categories</span>
    </div>

    <!--наполнение блока категориями-->
    <ul class="categories__list js-categories__list"> 

        <?php foreach ($data['menuCategories'] as $category) : ?>

            <li class="categories__item">
                <a title="" 
                    href="<?php echo ($category['link']) ?>" 
                    class="categories__link">
                    <?php echo ($category['title']) ?>
                </a>

                <?php if(!(empty($category['child']))) : ?>

                    <!--наполнение блока субкатегориями-->
                    <ul class="aside-subcategiries">

                        <?php foreach ($category['child']  as $subcategory) : ?>
                            <li class="aside-subcategories__item">
                                <a title="" 
                                    href="<?php echo ($subcategory['link']) ?>" 
                                    class="aside-subcategories__link">
                                    <?php echo ($subcategory['title']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        
                    </ul>
                <?php endif ;?>

            </li>

        <?php endforeach ; ?>

    </ul>
</div>