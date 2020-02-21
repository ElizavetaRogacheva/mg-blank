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
<?php mgAddMeta('/js/catalog.js'); ?>

<div class="products-category-content">
  <h1 class="products-category-content__title"><?php echo $data['titleCategory'] ?></h1>
  
  <div class="products-category-content__desc">
    <?php if (MG::get('templateParams')['catalogBanner'] == true) :?>
      <?php if ($data['titleCategory'] === 'Каталог') : ?>
      <a href="<?php echo MG::get('templateParams')['catalogBannerLink']?>" 
        class="products-category-content__link"
        title="<?php echo MG::get('templateParams')['catalogBannerTitle']?>">
        <img title="<?php echo MG::get('templateParams')['catalogBannerImageTitle']?>" 
              src="<?php echo PATH_SITE_TEMPLATE .MG::get('templateParams')['catalogBannerUrl']?>" 
              alt="<?php echo MG::get('templateParams')['catalogBannerImageAlt']?>" 
              class="products-category-content__img">
      </a>
      <?php endif ;?>
      <?php if ($data['cat_img']): ?>
            <img src="<?php echo SITE . $data['cat_img'] ?>"
                 alt="<?php echo $data['seo_alt'] ?>"
                 title="<?php echo $data['seo_title'] ?>"
                 class="products-category-content__img--category">
        <?php endif; ?>

    <?php endif ;?>
    <?php if($cd = str_replace("&nbsp;", "", $data['cat_desc'])) :?>
        <p class="products-category-content__text"><?php echo $data['cat_desc']; ?></p>
    <?php endif ; ?>
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
        <button class="show-grid filterboard-btn--active js-show-grid">
        <svg  viewBox="-19 -19 600 600" xmlns="http://www.w3.org/2000/svg">
          <path d="m251.25 12.5c0-6.90625-5.59375-12.5-12.5-12.5h-226.25c-6.90625 0-12.5 5.59375-12.5 12.5v226.25c0 6.90625 5.59375 12.5 12.5 12.5h226.25c6.90625 0 12.5-5.59375 12.5-12.5zm-25 213.75h-201.25v-201.25h201.25zm0 0"/>
          <path d="m562.5 12.5c0-6.90625-5.59375-12.5-12.5-12.5h-226.25c-6.90625 0-12.5 5.59375-12.5 12.5v226.25c0 6.90625 5.59375 12.5 12.5 12.5h226.25c6.90625 0 12.5-5.59375 12.5-12.5zm-25 213.75h-201.25v-201.25h201.25zm0 0"/>
          <path d="m251.25 323.75c0-6.90625-5.59375-12.5-12.5-12.5h-226.25c-6.90625 0-12.5 5.59375-12.5 12.5v226.25c0 6.90625 5.59375 12.5 12.5 12.5h226.25c6.90625 0 12.5-5.59375 12.5-12.5zm-25 212.5h-201.25v-200h201.25zm0 0"/>
          <path d="m562.5 323.75c0-6.90625-5.59375-12.5-12.5-12.5h-226.25c-6.90625 0-12.5 5.59375-12.5 12.5v226.25c0 6.90625 5.59375 12.5 12.5 12.5h226.25c6.90625 0 12.5-5.59375 12.5-12.5zm-25 212.5h-201.25v-200h201.25zm0 0"/>
        </svg>
        </button>
        <button class="show-list js-show-list">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
            <g>
              <g>
                <path d="M176,32H16C7.168,32,0,39.168,0,48v160c0,8.832,7.168,16,16,16h160c8.832,0,16-7.168,16-16V48
                  C192,39.168,184.832,32,176,32z M160,192H32V64h128V192z"/>
              </g>
            </g>
            <g>
              <g>
                <path d="M176,288H16c-8.832,0-16,7.168-16,16v160c0,8.832,7.168,16,16,16h160c8.832,0,16-7.168,16-16V304
                  C192,295.168,184.832,288,176,288z M160,448H32V320h128V448z"/>
              </g>
            </g>
            <g>
              <g>
                <rect x="256" y="80" width="128" height="32"/>
              </g>
            </g>
            <g>
              <g>
                <rect x="256" y="144" width="256" height="32"/>
              </g>
            </g>
            <g>
              <g>
                <rect x="256" y="336" width="128" height="32"/>
              </g>
            </g>
            <g>
              <g>
                <rect x="256" y="400" width="256" height="32"/>
              </g>
            </g>
          </svg>

        </button>
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
  
  <?php if(!isSearch())  :?>
    <?php
    // Список свойств, которые выбраны в фильтре
    component(
      'filter/applied',
      $data['applyFilter']
    );
    ?>
  <?php endif ;?>
  <?php if(isSearch())  :?>
    <h1 class="search-title">
      <?php echo lang('search1'); ?>
      <span>
      «<?php echo $data['searchData']['keyword'] ?>»
      </span>
      <?php echo lang('search2'); ?>
      <span>
          <?php
          echo mgDeclensionNum(
            $data['searchData']['count'],
            array(
              lang('search3-1'),
              lang('search3-2'),
              lang('search3-3')
            )
          );
          ?>
      </span>
  </h1>
  <?php endif;?>
  <div class="products-block">

    <ul class="products-block__list products-block__list--grid js-products-block__list">
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




