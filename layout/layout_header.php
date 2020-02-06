<header class="main-header">
    <div class="main-header__container">

        <div class="main-header__top">
            <!--логотип сайта-->
            <div class="main-logo">
            <a class="c-logo"
                title="<?php echo MG::getSetting('sitename') ?>"
                href="<?php echo SITE ?>">
                <?php echo mgLogo(); ?>
            </a>
            </div>
        </div>


        <div class="main-header__bottom">
            <!--главное меню-->          
            <?php 
                component(
                    'menu/main-menu', 
                    $data['menuPages']
                );
            ?>
            
            <div class="main-header__wrapper">
                <!--поиск-->
                <div class="main-header__search">
                    <button class="search__btn js-search__btn">Search</button>
                    <div class="search-container js-search-container">
                            <?php 
                            component('search');
                            ?>
                    </div>
                </div>

                <!--корзина кнопка-->

                <div class="main-header__cart">
                    <?php 
                    component(
                        'cart/small', 
                        $data);
                    ?>
                    <?php   // Если в настройках включена опция
                            // «Показывать покупателю сообщение о добавлении товара в корзину»,
                            // то выводим компонент модального окна с шаблоном «modal_cart»
                            if (MG::getSetting('popupCart') == 'true') {
                                component('modal', $data, 'modal_cart');
                            }; ?>
                </div>

                <!--блок опций для пользователя-->
                <div class="main-header__account">
                    <button class="account__btn js-account__btn">Развернуть</button>
                    <div class="account-container js-account-container">
                        <div class="account__menu">
                            <ul class="account-menu__list">
                                <li class="account-menu__item">
                                    <a title="" 
                                       href="<?php echo SITE .'/registration'; ?>" 
                                       class="account-menu__link"><?php echo lang('registration') ?></a>
                                </li>
                                <li class="account-menu__item">
                                    <a title="" 
                                       href="<?php echo SITE .'/enter'; ?>" 
                                       class="account-menu__link"><?php echo lang('login') ?></a>
                                </li>
                                <li class="account-menu__item">
                                    <a title="" 
                                       href="<?php echo SITE .'/personal'; ?>" 
                                       class="account-menu__link"><?php echo lang('personal') ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="account__language-menu">
                            <div class="language__title">
                                <span><?php echo lang ('language') ?></span> 
                            </div>
                                <?php 
                                component(
                                    'select/lang', 
                                    $data);
                                ?>
                        </div>
                        <div class="account__currency-menu">
                            <div class="currency__title">
                                <span><?php echo lang ('currency') ?></span>
                            </div>
                            <?php 
                                component(
                                    'select/currency', 
                                    $data);
                                ?>
                        </div>  
                    </div>
                </div> <!--end main-header__account-->
            </div> <!--end main-header__wrapper-->   
        </div> <!--end main-header__bottom-->
    </div> <!--end main-header-container-->
</header>


