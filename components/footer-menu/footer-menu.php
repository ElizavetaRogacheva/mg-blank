<?php mgAddMeta('components/footer-menu/css/footer-menu.css') ;?>
<ul class="footer-info__list js-footer-info__list">
<?php foreach ($data['menuPages'] as $page): ?>
    <li class="footer-info__item">
        <a title="" 
           href="<?php echo $page['link'] ?>" 
           class="footer-info__link"><?php echo $page['title'] ?></a>
    </li>
<?php endforeach ; ?>
</ul>