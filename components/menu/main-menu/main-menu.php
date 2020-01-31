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
            </li>                          
        <?php endforeach; ?>
    </ul>
</nav>