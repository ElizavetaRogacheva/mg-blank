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
                    <button class="search__btn js-search__btn">
                    <svg id="Capa_1" enable-background="new 0 0 551.13 551.13" height="512" viewBox="0 0 551.13 551.13" width="512" xmlns="http://www.w3.org/2000/svg" width="25px", height="25px">
                        <path d="m551.13 526.776-186.785-186.785c30.506-36.023 49.003-82.523 49.003-133.317 0-113.967-92.708-206.674-206.674-206.674s-206.674 92.707-206.674 206.674 92.707 206.674 206.674 206.674c50.794 0 97.294-18.497 133.317-49.003l186.785 186.785s24.354-24.354 24.354-24.354zm-344.456-147.874c-94.961 0-172.228-77.267-172.228-172.228s77.267-172.228 172.228-172.228 172.228 77.267 172.228 172.228-77.267 172.228-172.228 172.228z"/>
                    </svg>
                    </button>
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


