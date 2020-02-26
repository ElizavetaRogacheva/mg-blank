<?php
mgAddMeta('components/cart/btn/add/add.js');
?>

<?php
$remInfo = false;
$style = 'style="display:none;"';

if (MG::getSetting('printRemInfo') == "true") {
  $message = lang('countMsg1') . ' "' . str_replace("'", "&quot;", $data['title']) . '" ' . lang('countMsg2') . ' "' . $data['code'] . '"' . lang('countMsg3');
  $message = urlencode($message);

  if ($data['count'] == '0') {
    $style = 'style="display:block;"';
  }
  $remInfo = $data['remInfo'] != 'false' ? true : false;
} ?>

<?php
if ($remInfo && MG::get('controller') == "controllers_product"): ?>
    <div class="c-product__message" <?php echo $style ?>>
        <a class="c-button"
           rel='nofollow'
           href='<?php echo SITE . "/feedback?message=" . str_replace(' ', '&#32;', $message) ?>'>
          <?php echo lang('countMessage'); ?>
        </a>
    </div>
<?php endif; ?>

<?php
if (!empty($data['variants'])) {
  $firstVar = array_shift($data['variants']);
  $styleToggle = ($firstVar['count'] == 0) ? 'style="display:none"' : '';
}

if (!$data['liteFormData']['noneButton'] || (MG::getProductCountOnStorage(0, $data['id'], 0, 'all') != 0)) { ?>
  <?php
  $isAvailable = $data['count'] != 0 || $data['count'] == "много";
  $isProduct = MG::get('controller') === "controllers_product";
  if ($isAvailable && ($isProduct || MG::getSetting('actionInCatalog') === 'true')) {

    // Добавляем класс, на который вешается событие сlick из add.js
    $jsClass = 'js-add-to-cart';

    // Если это страница корзины или оформления, то нужно обновлять страницу, соответственно js не нужен
    if (URL::getClearUri() === '/cart' || URL::getClearUri() === '/order') {
      $jsClass = '';
    }
    ?>
      <a href="<?php echo SITE . '/catalog?inCartProductId=' . $data["id"]; ?>"
         rel="nofollow"
        <?php echo $styleToggle; ?>
         class="addToCart product-buy <?php echo $jsClass ?>"
         aria-label="<?php echo lang('buttonBuy'); ?>"
         data-item-id="<?php echo $data["id"]; ?>"
         title="<?php echo lang('buttonBuy') ?>">
        <?php echo lang('buttonBuy'); ?>
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="510px" height="510px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
          <g>
            <g id="shopping-cart">
              <path d="M153,408c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S181.05,408,153,408z M0,0v51h51l91.8,193.8L107.1,306
                c-2.55,7.65-5.1,17.85-5.1,25.5c0,28.05,22.95,51,51,51h306v-51H163.2c-2.55,0-5.1-2.55-5.1-5.1v-2.551l22.95-43.35h188.7
                c20.4,0,35.7-10.2,43.35-25.5L504.9,89.25c5.1-5.1,5.1-7.65,5.1-12.75c0-15.3-10.2-25.5-25.5-25.5H107.1L84.15,0H0z M408,408
                c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S436.05,408,408,408z"/>
            </g>
          </g>
        </svg>
      </a>

    <?php if (!empty($data['variant_exist'])) { ?>
          <a style="display:none"
             href="<?php echo SITE . '/' . ((MG::getSetting('shortLink') != 'true') && ($data["category_url"] == '') ? 'catalog/' : $data["category_url"]) . $data["product_url"]; ?>"
             class="js-product-more product-info action_buy_variant">
            <?php echo lang('buttonMore'); ?>
          </a>
    <?php } ?>

  <?php } else { ?>
      <a href="<?php echo SITE . '/' . ((MG::getSetting('shortLink') != 'true') && ($data["category_url"] == '') ? 'catalog/' : $data["category_url"]) . $data["product_url"]; ?>"
         class="product-info <?php echo $data['liteFormData']['classForButton'] ?>">
         <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="511.626px" height="511.626px" viewBox="0 0 511.626 511.626" style="enable-background:new 0 0 511.626 511.626;"
            xml:space="preserve">
          <g>
            <path d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687
              c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818
              c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68
              c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699
              C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554
              c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704
              c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971
              c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999
              c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04
              c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222
              c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362
              s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362
              c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04
              z"/>
          </g>
          </svg>
        <?php echo lang('buttonMore'); ?>
      </a>
  <?php } ?>
<?php } ?>


