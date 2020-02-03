<?php
mgAddMeta('components/compare/link/link.css');
mgAddMeta('components/compare/link/link.js');
?>

<a class="product-compare__link js-to-compare-link"
   href="<?php echo SITE ?>/compare"
   title="<?php echo lang('compareToList'); ?>">
    <div class="c-compare__link--count mg-compare-count js-compare-count"
         style="<?php echo ($_SESSION['compareCount']) ? 'display:block;' : 'display:none;'; ?>">
        <div class="c-compare__link--number">
           (<?php if (isset($_SESSION['compareCount'])) {
                echo $_SESSION['compareCount'];
            } else {
                echo 0;
            } ?>)
        </div>
    </div>
    <div class="c-compare__link--text">
        <?php echo lang('compareCompare'); ?>
    </div>
</a>

<?php component('compare/informer'); ?>

