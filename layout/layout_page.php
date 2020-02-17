<!-- содержимое страниц из папки /views -->
<?php if (MG::get('isStaticPage')) { ?>
    <main class="static-page">
        <?php layout('content'); ?>
</main>
<?php } else { ?>
    <?php layout('content'); ?>
<?php } ?>
