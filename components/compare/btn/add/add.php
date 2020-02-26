<?php mgAddMeta('components/compare/btn/add/add.css') ?>

<a href="<?php echo SITE . '/compare?inCompareProductId=' . $data["id"]; ?>"
   title="<?php echo lang('buttonCompare'); ?>"
   rel="nofollow"
   class="product-qty-group__btn compare-btn js-add-to-compare"
   data-item-id="<?php echo $data["id"]; ?> ">
    <?php echo lang('buttonCompare'); ?>
    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="22px" height="22px" viewBox="0 0 37.498 37.498" style="enable-background:new 0 0 37.498 37.498;"
        xml:space="preserve">
    <g>
        <path d="M18.249,22.834l7.333,7.332l-7.333,7.332v-5.664H7.416c-1.104,0-2-0.896-2-2V7.168h4v20.666h8.833V22.834z M30.081,5.168
            H19.749V0l-7.333,7.332l7.334,7.334V9.168h8.332v20.666h4V7.168C32.081,6.064,31.188,5.168,30.081,5.168z"/>
    </g>
    </svg>
</a>