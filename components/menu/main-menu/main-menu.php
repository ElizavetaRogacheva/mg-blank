<button class="main-nav__btn js-main-nav__btn">menu</button>

<!--блок главного меню-->
<nav class="main-nav js-main-nav">
    <ul class="main-nav__list">
        <!--заполнение меню данными о содержащихся страницах-->
        <?php foreach ($data as $page): ?>
            <li class="main-nav__item">
                <a title="" 
                   href="<?php echo $page['link'] ?>" 
                   class="main-nav__link main-nav__accordion-btn main-nav-collapse js-accordion-btn"
                   title=""><?php echo $page['title'] ?>
                </a>
                <?php if (!(empty($page['child']))) : ?>
                    <ul class="main-nav-submenu main-nav-submenu--big">
                    <?php foreach($page['child'] as $subPage) : ?>
                        <li class="main-nav-submenu__item">
                            <a title="" 
                               href="<?php echo ($subPage['link']) ?>" 
                               class="main-nav-submenu__link main-nav__accordion-btn js-accordion-btn-inner"><?php echo ($subPage['title']) ?></a>
                        </li>
                    <?php endforeach ;?>
                    </ul>
                <?php endif ;?>
            </li>                          
        <?php endforeach; ?>
    </ul>
</nav>