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
        <?php
                component(
                'compare/link',
                $data
            );
            ?>
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
