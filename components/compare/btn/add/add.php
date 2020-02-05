<?php mgAddMeta('components/compare/btn/add/add.css') ?>

<a href="<?php echo SITE . '/compare?inCompareProductId=' . $data["id"]; ?>"
   title="<?php echo lang('buttonCompare'); ?>"
   rel="nofollow"
   class="product-qty-group__btn compare-btn js-add-to-compare"
   data-item-id="<?php echo $data["id"]; ?> ">
    <?php echo lang('buttonCompare'); ?>
    <svg height="20px" viewBox="0 -80 512.0007 512" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="m178 20c0-11.046875 8.953125-20 20-20h168c44.113281 0 80 35.890625 80 80v163c0 11.046875-8.953125 20-20 20s-20-8.953125-20-20v-163c0-22.054688-17.945312-40-40-40h-168c-11.046875 0-20-8.953125-20-20zm328.046875 242.761719c-7.863281-7.753907-20.527344-7.667969-28.285156.195312l-44.496094 45.109375c-1.882813 1.890625-4.371094 2.933594-7.011719 2.933594-.003906 0-.003906 0-.007812 0-2.636719 0-5.125-1.039062-7.007813-2.925781l-45.078125-45.195313c-7.800781-7.824218-20.464844-7.839844-28.285156-.039062-7.820312 7.800781-7.835938 20.464844-.035156 28.285156l45.078125 45.199219c9.441406 9.464843 21.988281 14.675781 35.328125 14.675781h.035156c13.351562-.007812 25.90625-5.238281 35.402344-14.785156l44.554687-45.167969c7.757813-7.863281 7.671875-20.527344-.191406-28.285156zm-194.046875 49.238281h-166c-22.054688 0-40-17.941406-40-40v-168c0-11.046875-8.953125-20-20-20s-20 8.953125-20 20v168c0 44.113281 35.886719 80 80 80h166c11.046875 0 20-8.953125 20-20s-8.953125-20-20-20zm-226.253906-272h.007812c2.636719 0 5.125 1.039062 7.007813 2.925781l45.078125 45.199219c3.90625 3.917969 9.035156 5.875 14.160156 5.875 5.109375 0 10.21875-1.945312 14.125-5.839844 7.820312-7.796875 7.835938-20.460937.035156-28.28125l-45.078125-45.199218c-9.449219-9.472657-21.996093-14.7343755-35.363281-14.679688-13.351562.0117188-25.90625 5.238281-35.402344 14.785156l-44.554687 45.171875c-7.757813 7.863281-7.671875 20.523438.195312 28.28125 7.859375 7.757813 20.523438 7.671875 28.28125-.191406l44.5-45.109375c1.878907-1.890625 4.367188-2.933594 7.007813-2.9375zm0 0"/></svg>
</a>