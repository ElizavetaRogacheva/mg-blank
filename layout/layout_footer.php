<footer class="main-footer" 
        <?php if(MG::get('templateParams')['bgFooter'] === '1') :?>
        style="background-image: url(<?php echo PATH_SITE_TEMPLATE . MG::get('templateParams')['bgFooterUrl'] ?>)"
        <?php endif ;?>>
            <div class="main-footer-container">
                <div class="main-footer-top">
                    <div class="main-footer__block contacts">
                        <div class="main-footer__block-title" id="contact"><span><?php echo lang('contactUs')?></span></div>
                        <ul class="contacts__list js-contacts__list">
                            <li class="contacts__item">
                                <span>
                                    <?php
                                        $workTime = explode(',', MG::getSetting('timeWork'));
                                        $workTimeDays = explode(',', MG::getSetting('timeWorkDays'));
                                        foreach ($workTime as $key => $time) { ?>
                                        <div class="c-contact__row">
                                        <div class="c-contact__schedule">
                                        <span class="c-contact__span">
                                        <?php echo !empty($workTimeDays[$key]) ? htmlspecialchars($workTimeDays[$key]) : ''; ?>
                                        </span>
                                        <?php echo htmlspecialchars($workTime[$key]); ?>
                                        </div>
                                        </div>
                                    <?php } ?>
                                </span>
                            </li>
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
                    <?php if (MG::get('templateParams')['socialsShow'] === '1') :?>
                    <div class="main-footer__block footer-newsletter">
                        <div class="main-footer__block-title main-footer__block-title--not-arrow"><span><?php echo lang('socials')?></span></div>
                        <div class="main-footer__socials">
                            <ul class="socials__list">
                            <?php if (MG::get('templateParams')['footerFacebook'] === '1') :?>
                                <li class="socials__item">
                                    <a title="<?php echo (MG::get('templateParams')['footerFbTitle']) ?>" 
                                       href="<?php echo (MG::get('templateParams')['footerFacebookUrl']) ?>" 
                                       class="social__link social__link--fb"></a>
                                </li>
                            <?php endif ;?>
                            <?php if (MG::get('templateParams')['footerInstagram'] === '1') :?>
                                <li class="socials__item">
                                    <a title="<?php echo (MG::get('templateParams')['footerIgTitle']) ?>" 
                                       href="<?php echo (MG::get('templateParams')['footerInstagramUrl']) ?>" 
                                       class="social__link social__link--ig"></a>
                                </li>
                            <?php endif ;?>
                            <?php if (MG::get('templateParams')['footerVk'] === '1') :?>
                                <li class="socials__item">
                                    <a title="<?php echo (MG::get('templateParams')['footerVkTitle']) ?>" 
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
                    <?php if (MG::get('templateParams')['paymentShow'] === '1') :?>
                    <div class="main-footer-payment">
                    <ul class="payment__list">
                        <?php
                        $res = DB::query(
                            'SELECT name, id  FROM ' .
                                PREFIX .
                                'payment WHERE activity=1 ORDER BY id'
                        );
                        while ($payments = DB::fetchAssoc($res)) { ?>
                                <li title="<?php echo $payments['name']; ?>"
                                    class="payment__item icon-style <?php echo 'pay-' .
                                    $payments['id']; ?>"><?php echo $payments['name']; ?></li>
                            <?php }
                        ?>
                    </ul>
                    </div>
                    <?php endif ; ?>
                </div>
            </div>
</footer>
