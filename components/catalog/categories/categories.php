<?php
mgAddMeta('components/catalog/categories/categories.css');

$categories = MG::get('category')->getHierarchyCategory($data, true);
if(!empty($categories)): ?>
        <ul class="subcategories__list">
            <?php foreach($categories as $category): ?>
                <li class="subcategories__item">
                    <a class="subcategories__link" 
                    href="<?php echo SITE.'/'.$category['parent_url'].$category['url']; ?>">
                        <?php echo $category['title']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
<?php endif; ?>



