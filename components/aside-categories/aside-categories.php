<?php  mgAddMeta('components/aside-categories/css/aside-categories.css'); ?>
<?php  mgAddMeta('components/aside-categories/js/aside-categories.js'); ?>

<div class="categories">
    <div class="categories__title js-categories__title aside-title">
        <span><?php echo lang('categories')?></span>
    </div>
    <ul class="categories__list js-categories__list"> 

        <?php foreach ($data['menuCategories'] as $category) : ?>

            <li class="categories__item">
                <div class="categories-title-wrapper js-categories-wrapper">
                    <a title="" 
                        href="<?php echo ($category['link']) ?>" 
                        class="categories__link">
                        <?php echo ($category['title']) ?>
                    </a>
                    <?php if(!(empty($category['child']))) : ?>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="10px" height="10px">
                        <g>
                            <g>
                                <path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0
                                    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667
                                    C491.696,131.368,491.696,124.605,487.536,120.445z"/>
                            </g>
                        </g>
                    </svg>
                    <?php endif ;?>
                </div>
                <?php if(!(empty($category['child']))) : ?>

                    <!--наполнение блока субкатегориями-->
                    <ul class="aside-subcategiries js-aside-subcategories">

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