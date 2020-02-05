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
                            component(
                                'search', 
                                $data['menuPages']);
                            ?>
                        <div class="c-search__dropdown wraper-fast-result">
                            <div class="fastResult"></div>
                        </div>
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
                                <li class="account-menu__item"><a title="" href="#" class="account-menu__link">Register</a></li>
                                <li class="account-menu__item"><a title="" href="#" class="account-menu__link">Login</a></li>
                                <li class="account-menu__item"><a title="" href="#" class="account-menu__link">Wish List <span>(0)</span></a></li>
                                <li class="account-menu__item"><a title="" href="#" class="account-menu__link">Shopping Cart</a></li>
                                <li class="account-menu__item"><a title="" href="#" class="account-menu__link">Checkout</a></li>
                            </ul>
                        </div>
                        <div class="account__language-menu">
                            <div class="language__title">
                                <span>Language</span> 
                                <span class="language-current">English</span>
                            </div>
                            <ul class="language-menu__list">
                                <li class="language-menu__item"><button class="language-menu__btn language-menu__btn--english">english</button></li>
                                <li class="language-menu__item"><button class="language-menu__btn language-menu__btn--arabic">arabic</button></li>
                            </ul>
                        </div>
                        <div class="account__currency-menu">
                            <div class="currency__title">
                                <span>currency</span>
                                <span class="currency-current">$</span>
                            </div>
                            <ul class="currency-menu__list">
                                <li class="currency-menu__item"><button class="currency-menu__btn">€</button></li>
                                <li class="currency-menu__item"><button class="currency-menu__btn">£</button></li>
                                <li class="currency-menu__item"><button class="currency-menu__btn">$</button></li>
                            </ul>
                        </div>  
                    </div>
                </div> <!--end main-header__account-->
            </div> <!--end main-header__wrapper-->   
        </div> <!--end main-header__bottom-->
    </div> <!--end main-header-container-->
</header>


