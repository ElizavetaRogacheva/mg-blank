<!-- содержимое страниц из папки /views -->
<?php if (MG::get('isStaticPage')) { ?>
    <main class="static-page">
        <div class="static-page__wrapper">
            <?php layout('content'); ?>
        </div>
</main>
<?php } else { ?>
    <?php layout('content'); ?>
<?php } ?>
