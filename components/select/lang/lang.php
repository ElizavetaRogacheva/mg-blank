<?php
mgAddMeta('components/select/lang/lang.js');
mgAddMeta('components/select/select.css');

$multiLang = unserialize(stripcslashes(MG::getSetting('multiLang')));
$count = 0;

if (is_array($multiLang) && !empty($multiLang)) {
    foreach ($multiLang as $mLang) {
        if ($mLang['active'] == 'true') $count++;
    }
}
if ($count) { ?>

    <ul class="language-menu__list">
    <?php
    $url = str_replace(url::getCutSection(), '', $_SERVER['REQUEST_URI']);?>
    <li class="language-menu__item">
        <button class="language-menu__btn language-menu__btn--arabic js-lang-select <?php echo LANG === 'LANG' || LANG == '' ? 'language-menu__btn--active"':"" ?>" 
                aria-label="Выбор языка сайта"
                data-lang="<?php echo SITE.$url ?>" 
                data-trash="<?php echo SITE.$url ?>">
            <?php echo lang ('defaultLanguage') ?>
        </button>
    </li>
    <?php foreach ($multiLang as $mLang) {
                if ($mLang['active'] != 'true') {continue;} ?>
                <li class="language-menu__item">
                    <button class="language-menu__btn js-lang-select language-menu__btn--arabic  <?php echo LANG === $mLang['short'] ? 'language-menu__btn--active"':"" ?>"
                            aria-label="Выбор языка сайта"
                            data-lang="<?php echo SITE.'/'.$mLang['short'].$url ?>">
                        <?php echo($mLang['full']) ?>
                    </button>
                </li>
          <?php  } ?>
    </ul>
<?php } ?>
