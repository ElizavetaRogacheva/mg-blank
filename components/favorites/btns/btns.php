<?php mgAddMeta('components/favorites/btns/btns.css') ?>
<?php mgAddMeta('components/favorites/btns/btns.js') ?>

<?php
if (in_array(EDITION, array('market', 'gipermarket')) && MG::getSetting('useFavorites') == 'true') {

  $favorites = explode(',', $_COOKIE['favorites']);
  if (in_array($data['id'], $favorites)) {
    $_fav_style_add = 'display:none;';
    $_fav_style_remove = '';
  } else {
    $_fav_style_add = '';
    $_fav_style_remove = 'display:none;';
  }
  ?>

    <a role="button"
       href="javascript:void(0);"
       data-item-id="<?php echo $data['id']; ?>"
       class="mg-remove-to-favorites js-remove-to-favorites <?php if (MG::get('controller') == "controllers_product"): ?>mg-remove-to-favorites--product<?php endif; ?>"
       style="<?php echo $_fav_style_remove ?>">
        <span class="remove__text"><?php echo lang('inFav') ?></span>
        <span class="remove__hover"><?php echo lang('delFav') ?></span>
    </a>

    <a role="button"
       href="javascript:void(0);"
       data-item-id="<?php echo $data['id']; ?>"
       class="mg-add-to-favorites js-add-to-favorites <?php if (MG::get('controller') == "controllers_product"): ?>mg-add-to-favorites--product<?php endif; ?>"
       style="<?php echo $_fav_style_add ?>">
      <?php echo lang('toFav') ?>
    </a>

<?php } ?>