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
  if (
    ($data['count'] != 0 || $data['count'] == "много") &&
    MG::getSetting('actionInCatalog') == 'true'
  ) {

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
          <svg height="20px" viewBox="0 -11 414.00226 414" width="20px" xmlns="http://www.w3.org/2000/svg">
            <path d="m202.480469 352.132812c0-21.800781-17.671875-39.472656-39.46875-39.472656-21.800781 0-39.472657 17.671875-39.472657 39.46875 0 21.800782 17.671876 39.472656 39.472657 39.472656 21.785156-.023437 39.445312-17.679687 39.46875-39.46875zm-64.941407 0c0-14.070312 11.402344-25.472656 25.472657-25.472656 14.066406 0 25.46875 11.402344 25.46875 25.46875 0 14.070313-11.402344 25.472656-25.46875 25.472656-14.0625-.015624-25.457031-11.410156-25.472657-25.46875zm0 0"/>
            <path d="m309.167969 391.601562c21.800781.003907 39.472656-17.667968 39.472656-39.46875.003906-21.800781-17.667969-39.472656-39.46875-39.472656s-39.472656 17.671875-39.472656 39.472656c.027343 21.785157 17.679687 39.441407 39.46875 39.46875zm0-64.941406c14.066406 0 25.472656 11.402344 25.472656 25.46875.003906 14.066406-11.402344 25.472656-25.46875 25.472656s-25.472656-11.402343-25.472656-25.46875c.015625-14.058593 11.410156-25.453124 25.46875-25.472656zm0 0"/>
            <path d="m7 14h42.699219c14.050781-.054688 26.03125 10.175781 28.171875 24.066406l33.800781 213.511719c3.191406 20.703125 21.050781 35.957031 42 35.875h208.929687c3.863282 0 7-3.136719 7-7 0-3.867187-3.136718-7-7-7h-208.929687c-14.050781.054687-26.03125-10.179687-28.171875-24.066406l-5.746094-36.300781h213.980469c18.117187-.007813 34.242187-11.484376 40.179687-28.597657l39.699219-114.578125c.746094-2.140625.40625-4.507812-.90625-6.355468-1.316406-1.84375-3.441406-2.941407-5.707031-2.941407h-311.386719l-3.914062-24.738281c-3.191407-20.703125-21.050781-35.9570312-42-35.875h-42.699219c-3.867188 0-7 3.136719-7 7 0 3.867188 3.132812 7 7 7zm390.164062 60.617188-36.476562 105.285156c-3.984375 11.480468-14.800781 19.179687-26.953125 19.183594h-216.199219l-19.707031-124.472657zm0 0"/>
          </svg>
      </a>

    <?php if (!empty($data['variant_exist'])) { ?>
          <a style="display:none"
             href="<?php echo SITE . '/' . ((MG::getSetting('shortLink') != 'true') && ($data["category_url"] == '') ? 'catalog/' : $data["category_url"]) . $data["product_url"]; ?>"
             class="js-product-more product-info action_buy_variant">
            <?php echo lang('buttonMore'); ?>
          </a>
    <?php } ?>

  <?php } elseif (!URL::isSection('product')) { ?>
      <a href="<?php echo SITE . '/' . ((MG::getSetting('shortLink') != 'true') && ($data["category_url"] == '') ? 'catalog/' : $data["category_url"]) . $data["product_url"]; ?>"
         class="product-info <?php echo $data['liteFormData']['classForButton'] ?>">
         <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 341.333 341.333" style="enable-background:new 0 0 341.333 341.333;" xml:space="preserve">
          <g>
            <g>
              <g>
                <rect x="128" y="128" width="85.333" height="85.333"/>
                <rect x="0" y="0" width="85.333" height="85.333"/>
                <rect x="128" y="256" width="85.333" height="85.333"/>
                <rect x="0" y="128" width="85.333" height="85.333"/>
                <rect x="0" y="256" width="85.333" height="85.333"/>
                <rect x="256" y="0" width="85.333" height="85.333"/>
                <rect x="128" y="0" width="85.333" height="85.333"/>
                <rect x="256" y="128" width="85.333" height="85.333"/>
                <rect x="256" y="256" width="85.333" height="85.333"/>
              </g>
            </g>
          </g>
          </svg>
        <?php echo lang('buttonMore'); ?>
      </a>
  <?php } ?>
<?php } ?>


