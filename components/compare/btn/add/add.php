<?php mgAddMeta('components/compare/btn/add/add.css') ?>

<a href="<?php echo SITE . '/compare?inCompareProductId=' . $data["id"]; ?>"
   title="<?php echo lang('buttonCompare'); ?>"
   rel="nofollow"
   class="product-qty-group__btn compare-btn"
   data-item-id="<?php echo $data["id"]; ?> ">
    <?php echo lang('buttonCompare'); ?>
</a>