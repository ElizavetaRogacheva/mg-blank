<?php

/*
 * Plugin Name: Недавно просмотренные товары
 * Description: Выводит товары, которые пользователь недавно просматривал. Для вывода необходим шорткод и аргументы: count - количество выводимых товаров, random = 1 или 0 вывод в случайном порядке или по очередности просмотра, countprint - количество одновременно показываемых товаров. Шорткод [recently-viewed count=5 countprint=3 random=1]
 * Author: Чуркина Дарья
 * Version: 1.1.6
 */


mgAddMeta('<link href="'.SITE.'/mg-plugins/recently-viewed/css/recently.css" rel="stylesheet" type="text/css" />');
new RecentlyViewed;

class RecentlyViewed {
  private static $pluginName = ''; // Название плагина (соответствует названию папки).
  private static $path = ''; // Путь до файлов плагина.

  public function __construct() {
    mgAddAction('mg_end', array(__CLASS__, 'checkPage'),true,true);
    mgAddShortcode('recently-viewed', array(__CLASS__, 'recentlyViewed'));

    // Хук для сохранения актуальных цен (для скидок)
    mgAddAction('Models_Product_getProduct', array(__CLASS__, 'hook_getProduct'),1,10);

    self::$pluginName = PM::getFolderPlugin(__FILE__);
    self::$path = PLUGIN_DIR.self::$pluginName;
  }

  /**
   * 
   * Обработчик хука при загрузке страницы, идет проверка открыт какой-либо продукт или нет. Добавление в куки id, если открыт товар
   * 
   */
  static function checkPage() {
    if(MG::get('controller')=="controllers_product") {
      
      $product = URL::parsePageUrl();
      $res = DB::query('SELECT `code` FROM `'.PREFIX.'product` WHERE `url`='.DB::quote($product));
      if ($item = DB::fetchArray($res)) {
        $array_id = array();
        if (isset($_COOKIE['recently-viewed'])) {
          $tmp = explode('_~_', $_COOKIE['recently-viewed']);
          if (is_array($tmp)) {
            $array_id = $tmp;
          }
          else{
            $array_id[] = $tmp;
          }
          if (count($array_id) > 100) {
            array_shift($array_id);
          }
        }
        
        $array_id[] = $item['code'];
        $array_id = array_filter($array_id);
        $array_id = array_unique($array_id);
        $json = implode('_~_', $array_id);
        // сохранение истории на 2 дня
        echo '<script id="recentlyViewedCookieScript">
        function setRecentlyViewedCookie(){
          var expires = new Date();
          var key = "recently-viewed";
          var value = "'.$json.'";
          if (value.length) {
            expires.setTime(expires.getTime() + (2 * 24 * 60 * 60 * 1000));//2 дня
            document.cookie = key + "=" + value + ";expires=" + expires.toUTCString()+"; path=/";
          } 
        }
        setRecentlyViewedCookie();
        $("#recentlyViewedCookieScript").remove();
        </script>';
        // setcookie('recently-viewed', $json, time() + 172800, '/');
      }  
    }  
  }

  static function recentlyViewed($arg) {
    $count = $arg['count'] ? $arg['count'] : 10;
    $countPrint = !empty($arg['countprint']) ? $arg['countprint'] : 3;    
    if (isset($_COOKIE['recently-viewed'])) {
      $array_id = explode('_~_', $_COOKIE['recently-viewed']);
      $codes = array_reverse($array_id);
      if ($arg['random']) {
        shuffle($codes);
      }
      foreach($codes as $code) {
        if ($count > 0) {
          $products[] = $code;
        }
        $count--;
      }

      $related = self::getInfoRecentProduct($products);
      return $related;
    }
  }

  static function getInfoRecentProduct($products) {
    if(!$products) return null;

    $stringRelated = ' null';
    $sortRelated = array();

    $stringRelated = substr($stringRelated, 1);
    
    $model = new Models_Catalog;

    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      URL::setQueryParametr('page',1);
    }

    $tmp = $model->getListByUserFilter(count($products), ' p.code IN ('.DB::quoteIN($products).') and p.activity = 1');

    if (isset($page)) {
      URL::setQueryParametr('page',$page);
    }

    $data['products'] = $tmp['catalogItems'];

    foreach ($data['products'] as $k => $item) {
      for($i = 0; $i < count($item['variants']); $i++) {
        if($item['variants'][$i]['count'] == 0) {
          $item['variants'][] = $item['variants'][$i];
          unset($item['variants'][$i]);
        }
      }
    }

    foreach ($data['products'] as $key => $product) {
      if (!empty($product['variants'])) {
        $data['products'][$key]["price"] = MG::numberFormat($product['variants'][0]["price_course"]);
        $data['products'][$key]["old_price"] = $product['variants'][0]["old_price"];
        $data['products'][$key]["count"] = $product['variants'][0]["count"];
        $data['products'][$key]["code"] = $product['variants'][0]["code"];
        $data['products'][$key]["weight"] = $product['variants'][0]["weight"];
        $data['products'][$key]["price_course"] = $product['variants'][0]["price_course"];
        $data['products'][$key]["variant_exist"] = $product['variants'][0]["id"];
      } else {
        if (method_exists('MG', 'convertPrice')) {
          $cachedPrices = Storage::get('recentlyViewedPrices');
          if (!empty($cachedPrices) && isset($cachedPrices[$product['code']])) {
            $product["price_course"] = $cachedPrices[$product['code']]['price_course'];
          }
          $data['products'][$key]["price_course"] = MG::convertPrice($product["price_course"]);
        }
      }
      if (MG::numberDeFormat($data['products'][$key]["price"]) > MG::numberDeFormat($data['products'][$key]["old_price"])) {
        $data['products'][$key]["old_price"] = 0;
      }
    }

    // viewdata($data);

    if (!empty($data['products'])) {
      $data['currency'] = MG::getSetting('currency');
      foreach ($data['products'] as $item) {
        $img = explode('|', $item['image_url']);
        $item['img'] = $img[0];
        if ((defined('SHORT_LINK') && SHORT_LINK == 1) || MG::getSetting('shortLink')=='true') {
          $item['url'] = SITE.'/'.$item["product_url"];
        } else {
          $item['url'] = SITE.'/'.(isset($item["category_url"]) ? $item["category_url"] : 'catalog').'/'.$item["product_url"];
        }        
        $item['price'] = MG::priceCourse($item['price_course']);
        $sortRelated[$item['code']] = $item;
      }
      $data['products'] = array();
      //сортируем связанные товары в том порядке, в котором они идут в строке артикулов
      foreach ($sortRelated as $item) {
        if (!empty($item['id']) && is_array($item)) {
          $data['products'][$item['id']] = $item;
        }
      }
    }

    return self::htmlRecentlyProducts($data);
  }

  /**
   * функция фозвращает html код для вывода блока с недавно просмотренными товарами
   * @param type $args
   * @return string
   */
  static function htmlRecentlyProducts($data) {
    $lang = self::getLang(LANG);
    $block = '';
    foreach ($data["products"] as $item) {
      $block .= '
        <div class="product-wrapper " >
        <div class="mg-recently-viewed">
        <div class="mg-recently-product-wrapper " >
        <div class="mg-recently-product-image">
        <a href="'.$item['url'].'">';
      $item["image_url"] = $item['img'];
      $block .= mgImageProduct($item).'</a>
        </div>
        <div class="recently-product-content">
          <div class="mg-recently-product-name"> 
          <a href="'.$item['url'].'">'.MG::textMore($item["title"], 20).'</a>
          </div>
          <span class="mg-recently-product-price">'.$item["price"].' '.$data['currency'].'</span>
          <form action="http://localhost/gipermarket/catalog" method="POST" class="property-form actionBuy" data-product-id="'.$item['id'].'">
          <input type="hidden" name="inCartProductId" value="'.$item['id'].'">';
        if($item['count'] == 0) {
           $block .= '<a href="'.$item['url'].'" class="product-info default-btn">'.$lang['PRODUCT_INFO'].'</a>';
        }
        else {
  
          $block .= '<a class="addToCart default-btn product-buy" href="'.SITE.'/catalog?inCartProductId='.$item['id'].'" data-item-id="'.$item['id'].'">'.$lang['ADD'].'</a>';
        }
          $block .= '<table class="variants-table" style="display:none;">';
          $first = true;
          foreach ($item['variants'] as $key => $value) {
            $block .= '<tr class="variant-tr"><td><input type="radio" id="variant-'.$value['id'].'" name="variant" value="'.$value['id'].'" '.($first ? 'checked' : '').'></td></tr>';
            $first = false;
          }
          $block .= '</table>';
          $block .='</form>
        </div>
        </div>
        </div></div>';
    }

    $html = '      
      
      <div class="mg-recently-viewed-plugin">
      <div class="mg-recently-viewed-slider">'.$block.'</div></div>';
    return $html;
  }

  public static function getLang($locale){
    $path = self::$path.'/locales/'.$locale.'_'.strtoupper($locale).'.php';

    if (in_array($locale, self::listLocales()) && file_exists($path)) {
      include($path);
    } else {
      include(self::$path.'/locales/ru_RU.php');
    }

    return $lang;
  }

  public static function listLocales() {
    $locales = array_diff(scandir(self::$path.'/locales/'), array('.','..'));

    $langs = array();
    foreach ($locales as $key => $filename) {
      $tmp = explode("_", $filename);
      $langs[] = $tmp[0];
    }

    return $langs;
  }

  static function hook_getProduct($args) {
    $cacheName = 'recentlyViewedPrices';
    $cachedPrices = Storage::get($cacheName);
    if (empty($cachedPrices)) {
      $cachedPrices = array();
    }

    if (!empty($cachedPrices[$args['result']['code']])) {
      return $args['result'];
    } else {
      $cachedPrices[$args['result']['code']]['price'] = $args['result']['price'];
      $cachedPrices[$args['result']['code']]['price_course'] = $args['result']['price_course'];
      $cachedPrices[$args['result']['code']]['old_price'] = $args['result']['old_price'];
      Storage::save($cacheName, $cachedPrices, 2*60*60*24);
    }
    return $args['result'];
  }

}
