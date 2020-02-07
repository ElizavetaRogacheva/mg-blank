<?php
/**
 *  Файл представления Catalog - выводит сгенерированную движком информацию на странице сайта с каталогом товаров.
 *  В этом  файле доступны следующие данные:
 *   <code>
 *    $data['items'] => Массив товаров,
 *    $data['titleCategory'] => Название открытой категории,
 *    $data['cat_desc'] => Описание открытой категории,
 *    $data['pager'] => html верстка  для навигации страниц,
 *    $data['searchData'] => Результат поисковой выдачи,
 *    $data['meta_title'] => Значение meta тега для страницы,
 *    $data['meta_keywords'] => Значение meta_keywords тега для страницы,
 *    $data['meta_desc'] => Значение meta_desc тега для страницы,
 *    $data['currency'] => Текущая валюта магазина,
 *    $data['actionButton'] => Тип кнопки в мини карточке товара,
 *    $data['cat_desc_seo'] => SEO описание каталога,
 *    $data['seo_alt'] => Алтернативное подпись изображение категории,
 *    $data['seo_title'] => Title изображения категории
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['items']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['items']; ?>
 *   </code>
 *
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложную программную логику логику.
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */
// Установка значений в метатеги title, keywords, description.
mgSEO($data);
?>

<?php // viewData($data['items']) ?>
<div class="products-category-content">
  <h1 class="products-category-content__title"><?php echo $data['titleCategory'] ?></h1>

  <div class="products-category-content__desc">
    <?php if (MG::get('templateParams')['catalogBanner'] == true) :?>
    <a href="<?php echo MG::get('templateParams')['catalogBannerLink']?>" 
       class="products-category-content__link"
       title="<?php echo MG::get('templateParams')['catalogBannerTitle']?>">
       <img title="<?php echo MG::get('templateParams')['catalogBannerImageTitle']?>" 
            src="<?php echo PATH_SITE_TEMPLATE .MG::get('templateParams')['catalogBannerUrl']?>" 
            alt="<?php echo MG::get('templateParams')['catalogBannerImageAlt']?>" 
            class="products-category-content__img">
    </a>
    <?php endif ;?>
    <p class="products-category-content__text"><?php echo $data['cat_desc']; ?></p>
  </div>

  <!--Список подкатегорий, выводим, если разрешено в настройках-->
  
    <?php if (MG::getSetting('picturesCategory') == 'true'): ?> 
        <div class="subcategories">
            <?php
                // Список категорий каталога
                component(
                'catalog/categories',
                $data['cat_id']
                );
            ?>
        </div>
    <?php endif; ?>

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




