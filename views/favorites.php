<?php
/**
 *  Файл представления Favorites - выводит сгенерированную движком информацию на странице сайта с избранными товарами, который отметил пользователь.
 *  В этом  файле доступны следующие данные:
 *   <code>
 * 'items' => $items['catalogItems'],
 *    $data['items'] => Массив товаров,
 *    $data['titleCategory'] => Название открытой категории,
 *    $data['pager'] => html верстка  для навигации страниц,
 *    $data['meta_title'] => Значение meta тега для страницы,
 *    $data['meta_keywords'] => Значение meta_keywords тега для страницы,
 *    $data['meta_desc'] => Значение meta_desc тега для страницы,
 *    $data['currency'] => Текущая валюта магазина,
 *    $data['actionButton'] => тип кнопки в мини карточке товара
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
 * @author Гайдис Михаил
 * @package moguta.cms
 * @subpackage Views
 */
// Установка значений в метатеги title, keywords, description.
mgSEO($data);
?>

<main class="favourites-page">
  <h1>
      <?php echo $data['titleCategory'] ?>
  </h1>
  <ul class="c-goods favourites__list">
    <div class="favourites__empty js-fav-empty">
      <span><?php echo lang('emptyFavourites') ?></span>
    </div>
    <?php
      // Циклом выводим избранные товары
      foreach ($data['items'] as $item) { ?>
        <li class="favourites__item js-favourites-item">
          <?php
          // Миникарточка товара
          component(
            'product-item-related',
            $item
          );
          ?>
    </li>
      <?php } ?>
      </ul>

</main>
