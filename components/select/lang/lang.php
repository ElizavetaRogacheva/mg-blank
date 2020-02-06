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

<?php console_log($multiLang) ?>
    <ul class="language-menu__list" 
        id="js-lang-select">
    <?php $url = str_replace(url::getCutSection(), '', $_SERVER['REQUEST_URI']);?>
    <li class="language-menu__item"><button class="language-menu__btn language-menu__btn--arabic"><?php echo lang ('defaultLanguage') ?></button></li>
    <?php foreach ($multiLang as $mLang) {
                if ($mLang['active'] != 'true') {continue;} ?>
                <li class="language-menu__item"><button class="language-menu__btn language-menu__btn--arabic"><?php echo($mLang['full']) ?></button></li>
          <?php  } ?>
    </ul>



    <label class="select__wrap">
        <?php $url = str_replace(url::getCutSection(), '', $_SERVER['REQUEST_URI']);?>
        <select name="multiLang-selector"
                class="select"
                id="js-lang-select"
                aria-label="Выбор языка сайта">
            <?php echo '<option value="'.SITE.$url.'" '.((LANG == 'LANG' || LANG == '')?'selected="selected"':"").'>'.lang('defaultLanguage').'</option>';
            foreach ($multiLang as $mLang) {
                if ($mLang['active'] != 'true') {continue;}
                echo '<option value="'.SITE.'/'.$mLang['short'].$url.'" '.((LANG == $mLang['short'])?'selected="selected"':"").'>'.$mLang['full'].'</option>';
            } ?>
        </select>
    </label>
<?php } ?>