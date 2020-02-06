<footer class="main-footer" 
        <?php if(MG::get('templateParams')['bgFooter'] == true) :?>
        style="background-image: url(<?php echo PATH_SITE_TEMPLATE . MG::get('templateParams')['bgFooterUrl'] ?>)"
        <?php endif ;?>>
            <div class="main-footer-container">
                <div class="main-footer-top">
                    <div class="main-footer__block contacts">
                        <div class="main-footer__block-title" id="contact"><span><?php echo lang('contactUs')?></span></div>
                        <ul class="contacts__list js-contacts__list">
                            <li class="contacts__item"><span><?php echo MG::getSetting('shopName')?></span></li>
                            <li class="contacts__item"><span><?php echo MG::getSetting('shopPhone')?></span></li>
                            <li class="contacts__item"><span><?php echo MG::getSetting('shopAddress')?></span></li>
                            <li class="contacts__item"><span><?php echo MG::getSetting('sitename')?></span></li>
                        </ul>
                    </div>
                    <div class="main-footer__block footer-info">
                        <div class="main-footer__block-title" id="info"><span><?php echo lang('footerMenu')?></span></div>
                        <?php 
                            component(
                                'footer-menu',
                                 $data
                            ); 
                        ?>

                    </div>     
                    <?php if (MG::get('templateParams')['socialsShow'] == true) :?>
                    <div class="main-footer__block footer-newsletter">
                        <div class="main-footer__block-title main-footer__block-title--not-arrow"><span><?php echo lang('socials')?></span></div>
                        <div class="main-footer__socials">
                            <ul class="socials__list">
                            <?php if (MG::get('templateParams')['footerFacebook'] == true) :?>
                                <li class="socials__item">
                                    <a title="" 
                                       href="<?php echo (MG::get('templateParams')['footerFacebookUrl']) ?>" 
                                       class="social__link social__link--fb"></a>
                                </li>
                            <?php endif ;?>
                            <?php if (MG::get('templateParams')['footerInstagram'] == true) :?>
                                <li class="socials__item">
                                    <a title="" 
                                       href="<?php echo (MG::get('templateParams')['footerInstagramUrl']) ?>" 
                                       class="social__link social__link--ig"></a>
                                </li>
                            <?php endif ;?>
                            <?php if (MG::get('templateParams')['footerVk'] == true) :?>
                                <li class="socials__item">
                                    <a title="" 
                                       href="<?php echo (MG::get('templateParams')['footerVkUrl']) ?>" 
                                       class="social__link social__link--vk"></a>
                                </li>
                            <?php endif ;?>
                            </ul>
                        </div>                       
                    </div>  
                    <?php endif ;?>         
                </div>
                <div class="main-footer-bottom">
                    <div class="copyright"><span><?php echo date('Y') . ' ' . lang('copyright'); ?></span></div>
                    <?php if (MG::get('templateParams')['paymentShow'] == true) :?>
                    <div class="main-footer-payment">
                        <ul class="payment__list">
                            <li class="payment__item"><img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/visa.png" alt=""></li>
                            <li class="payment__item"><img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/discover.png" alt=""></li>
                            <li class="payment__item"><img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/american_express.png" alt=""></li>
                            <li class="payment__item"><img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/google_wallet.png" alt=""></li>
                            <li class="payment__item"><img title="" src="<?php echo PATH_SITE_TEMPLATE ?>/img/paypal.png" alt=""></li>
                        </ul>
                    </div>
                    <?php endif ; ?>
                </div>
            </div>
        </footer>
