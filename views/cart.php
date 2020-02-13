<?php
/**
 *  Файл представления Cart - выводит сгенерированную движком информацию на странице сайта с корзиной товаров.
 *  В этом  файле доступны следующие данные:
 *   <code>
 *    $data['isEmpty'] => 'Флаг наполненности корзины'
 *    $data['productPositions'] => 'Набор продуктов в корзине'
 *    $data['totalSumm'] => 'Общая стоимость товаров в корзине'
 *    $data['meta_title'] => 'Значение meta тега для страницы '
 *    $data['meta_keywords'] => 'Значение meta_keywords тега для страницы '
 *    $data['meta_desc'] => 'Значение meta_desc тега для страницы '
 *    $data['currency'] => 'Текущая валюта магазина',
 *    $data['related'] => 'Товары с которыми покупают данные товары',
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['productPositions']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php echo $data['productPositions']; ?>
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

<main class="cart-page">
  <?php
  // Задаём заголовок страницы
  mgTitle(lang('cart'));
  ?>

  <?php
  // Таблица товаров корзины
  component('cart', $data, 'cart');
  ?>
 <?php if(!empty($data['related'])) : ?>
  <?php
  // Карусель «С этими товаром покупают»
  component(
    'related-product-carousel',
    [
      'items' => $data['related']['products'],
      'title' => lang('relatedAddCart')
    ]
  );
  ?>
<?php endif ;?>

</main>
