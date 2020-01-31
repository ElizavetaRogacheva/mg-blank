<?php // viewData($data['items']) ?>
<div class="products-category-content">
  <h1 class="products-category-content__title"><?php echo $data['titleCategory'] ?></h1>

  <div class="products-category-content__desc">
    <img title="" src="./img/category-banner-892x200.jpg" alt="" class="products-category-content__img">
    <p class="products-category-content__text"><?php echo $data['cat_desc']; ?></p>
  </div>

  <div class="subcategories">
    
    <?php
    /*
     * Список подкатегорий, выводим, если разрешено в настройках
     * */
    if (MG::getSetting('picturesCategory') == 'true'): ?>
    
        <?php
        // Список категорий каталога
        component(
          'catalog/categories',
          $data['cat_id']
        );
        ?>
    <?php endif; ?>
  </div>

  <div class="filterboard">
    <div class="filterboard__left">
        <button class="show-grid show-grid--active">grid</button>
        <button class="show-list">list</button>
        <div class="product-compare">
            <a title="" href="#" class="product-compare__link">Product Compare <span>(0)</span></a>
        </div>
    </div>
    <div class="filterboard__right">
        <div class="sort-by">
            <label for="sort-input" class="sort-by__label">Sort by:</label>
            <select name="sort-by" id="sort-input" class="select sort-by__select">
                <option selected="selected" class="sort-by__option">Default</option>
                <option class="sort-by__option">Name (A - Z)</option>
                <option class="sort-by__option">Name (Z - A)</option>
                <option class="sort-by__option">Price (Low > High)</option>
                <option class="sort-by__option">Price (High > Low)</option>
                <option class="sort-by__option">Rating (Highest)</option>
                <option class="sort-by__option">Rating (Lowest)</option>
                <option class="sort-by__option">Model (A - Z)</option>
                <option class="sort-by__option">Model (Z - A)</option>
            </select>
        </div>
        <div class="sort-show">
            <label for="sort-show-input">Show:</label>
            <select name="sort-show" id="sort-show-input" class="select sort-show__select">
                <option selected="selected" class="sort-show__option">12</option>
                <option class="sort-show__option">25</option>
                <option class="sort-show__option">50</option>
                <option class="sort-show__option">75</option>
                <option class="sort-show__option">100</option>
            </select>
        </div>
    </div>
  </div>


  <div class="products-block">

    <ul class="products-block__list">
    <?php
  // Циклом выводим все товары группы
  foreach ($data['items'] as $item) { ?>
        <li class="products-block__item">
      <?php
      // Миникарточка товара
      component(
        'product-item',
        $item
      );
      ?>
      <?php } ?>
        </li>
    </ul>

    <div class="pagination-container">
        <?php
        // Если несколько страниц, то выводим постраничную навигацию
        if (!empty($data['pager'])): ?>
            <?php component('pagination', $data['pager']); ?>
        <?php endif; ?>
    </div>

  </div>
</div>
