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
                    <span><?php echo lang('searchBtn') ?></span>
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
                        $data['cartData']);
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
                    <button class="account__btn js-account__btn">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 482.9 482.9" style="enable-background:new 0 0 482.9 482.9;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M239.7,260.2c0.5,0,1,0,1.6,0c0.2,0,0.4,0,0.6,0c0.3,0,0.7,0,1,0c29.3-0.5,53-10.8,70.5-30.5
                                    c38.5-43.4,32.1-117.8,31.4-124.9c-2.5-53.3-27.7-78.8-48.5-90.7C280.8,5.2,262.7,0.4,242.5,0h-0.7c-0.1,0-0.3,0-0.4,0h-0.6
                                    c-11.1,0-32.9,1.8-53.8,13.7c-21,11.9-46.6,37.4-49.1,91.1c-0.7,7.1-7.1,81.5,31.4,124.9C186.7,249.4,210.4,259.7,239.7,260.2z
                                    M164.6,107.3c0-0.3,0.1-0.6,0.1-0.8c3.3-71.7,54.2-79.4,76-79.4h0.4c0.2,0,0.5,0,0.8,0c27,0.6,72.9,11.6,76,79.4
                                    c0,0.3,0,0.6,0.1,0.8c0.1,0.7,7.1,68.7-24.7,104.5c-12.6,14.2-29.4,21.2-51.5,21.4c-0.2,0-0.3,0-0.5,0l0,0c-0.2,0-0.3,0-0.5,0
                                    c-22-0.2-38.9-7.2-51.4-21.4C157.7,176.2,164.5,107.9,164.6,107.3z"/>
                                <path d="M446.8,383.6c0-0.1,0-0.2,0-0.3c0-0.8-0.1-1.6-0.1-2.5c-0.6-19.8-1.9-66.1-45.3-80.9c-0.3-0.1-0.7-0.2-1-0.3
                                    c-45.1-11.5-82.6-37.5-83-37.8c-6.1-4.3-14.5-2.8-18.8,3.3c-4.3,6.1-2.8,14.5,3.3,18.8c1.7,1.2,41.5,28.9,91.3,41.7
                                    c23.3,8.3,25.9,33.2,26.6,56c0,0.9,0,1.7,0.1,2.5c0.1,9-0.5,22.9-2.1,30.9c-16.2,9.2-79.7,41-176.3,41
                                    c-96.2,0-160.1-31.9-176.4-41.1c-1.6-8-2.3-21.9-2.1-30.9c0-0.8,0.1-1.6,0.1-2.5c0.7-22.8,3.3-47.7,26.6-56
                                    c49.8-12.8,89.6-40.6,91.3-41.7c6.1-4.3,7.6-12.7,3.3-18.8c-4.3-6.1-12.7-7.6-18.8-3.3c-0.4,0.3-37.7,26.3-83,37.8
                                    c-0.4,0.1-0.7,0.2-1,0.3c-43.4,14.9-44.7,61.2-45.3,80.9c0,0.9,0,1.7-0.1,2.5c0,0.1,0,0.2,0,0.3c-0.1,5.2-0.2,31.9,5.1,45.3
                                    c1,2.6,2.8,4.8,5.2,6.3c3,2,74.9,47.8,195.2,47.8s192.2-45.9,195.2-47.8c2.3-1.5,4.2-3.7,5.2-6.3
                                    C447,415.5,446.9,388.8,446.8,383.6z"/>
                            </g>
                        </g>
                    </svg>
                    <span><?php echo lang('accountMenuBtn') ?></span>
                    </button>
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


