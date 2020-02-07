<?php
if (MG::getSetting('printCurrencySelector') == 'true') {
  mgAddMeta('components/select/currency/currency.js');
  mgAddMeta('components/select/select.css');
  ?>
  <div class="currency__title">
      <span><?php echo lang ('currency') ?></span>
  </div>
  <ul class="currency-menu__list">
  <?php foreach (MG::getSetting('currencyShort') as $k => $v) : ?>
      <li class="currency-menu__item">
        <button class="currency-menu__btn js-currency-select" data-currency="<?php echo $k ?>"><?php echo $v ?></button>
      </li>
  <?php endforeach ;?>
  </ul>
  
  <?php } ?>
  

