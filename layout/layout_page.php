<!-- содержимое страниц из папки /views -->
<?php if (MG::get('isStaticPage')) { ?>
    <div class="static-page">
        <?php layout('content'); ?>
    </div>
<?php } else { ?>
    <?php layout('content'); ?>
<?php } ?>
