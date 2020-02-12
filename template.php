<?php /*
Template Name: Template name
Author: Name
Version: 1.0.0
*/ ?>

<!DOCTYPE html>
<?php
/**
 * Функция getHtmlAttributes() вставляет атрибут lang в зависимости от языка сайта,
 * а также атрибут для openGraph
 * */
?>
<html <?php getHtmlAttributes() ?>>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <?php
    // Полифил для css-переменных
    mgAddMeta('lib/css-vars-ponyfill.js'); ?>

    <?php
    /**
     * Как подключать css/js
     * @link http://wiki.moguta.ru/devhelp/templates/podklyuchenie-css-js
     * */
    ?>

    <?php
    /*
     * Теги title, mata description, keywords не использовать – они подставятся движком
     * */
    ?>

    <?php
    /**
     *   Для указания адреса вы можете использовать готовые константы:
     *   PATH_TEMPLATE — путь относительно корня сайта к папке используемого щаблона mg-templates/mytempl;
     *   PATH_SITE_TEMPLATE — http ссылка на папку используемого щаблона (http://www.testsite.ru/mg-templates/mytempl);
     *   SITE - http ссылка на главную страницу (http://www.testsite.ru);
     *   SCRIPT —  ссылка на папку /mg-core/script/
     *   SITE_DIR — путь к корневой папке сайта /var/www/html/;
     *   CORE_DIR — путь относительно корня сайта к папке ядра mg-core/;
     *   CORE_LIB — путь относительно корня сайта к папке библиотек mg-core/lib/;
     *   CORE_JS — путь относительно корня сайта к папке скриптов mg-core/script/;
     *   ADMIN_DIR — путь относительно корня сайта к папке админки mg-admin/;
     *   PLUGIN_DIR — путь относительно корня сайта к папке с плагинами mg-plugins/;
     *   PAGE_DIR — путь относительно корня сайта к папке пользовательских скриптов mg-pages/;
     *
     * @link Подробнее: http://wiki.moguta.ru/devhelp/templates/direktivy-dvijka
     */
    ?>

    <?php
    // Выводим метатеги страницы, стили шаблона и плагинов, подключенные через mgAddMeta,
    // а также jquery из mg-core/scripts
    mgMeta("meta", "css", "jquery"); ?>

</head>

<?php
/**
 * Функция MG::addBodyClass() добавляет тегу body класс body__[открытая страница]
 * Эти классы вы можете использовать, если необходимо сделать разные стили для разных страниц.
 * Параметром функции задаётся префикс к классу (namespace)
 *
 * Функция backgroundSite() добавляет тегу body атрибут style c фоном, указанным пользователем в админке
 * */
?>
<body class="<?php MG::addBodyClass('l-'); ?>" <?php backgroundSite(); ?>">

<div class="main-container">
        <div class="main-bg-fade"></div>
        <?php
        // Шапка сайта
        // layout/layout_header.php
        layout('header', $data);
        ?>

        <?php
            component(
                'favorites/informer',
                $data
            );
        ?>

        <?php if(MG::get('controller')=="controllers_catalog"): ?>
            <main class="products-section">
                <?php component('aside', $data);?> 
                <?php layout('page'); ?>
            </main>
        <?php else: ?>
            <?php layout('page'); ?>
        <?php endif; ?>

        <?php
        // Шапка сайта
        // layout/layout_footer.php
        layout('footer', $data);
        ?>
        <?php if(MG::get('templateParams')['scrollToTopShow'] === '1') : ?>
        <a title="" 
           href="#" 
           class="scroll-top js-scroll-top"
           style="background-image: url(<?php echo PATH_SITE_TEMPLATE . MG::get('templateParams')['scrollToTopUrl'] ?>)"></a>
        <?php endif; ?>
    </div>
    <script src="<?php echo PATH_SITE_TEMPLATE ?>/js/hidden-blocks.js"></script>
    <script src="<?php echo PATH_SITE_TEMPLATE ?>/js/accordion.js"></script>
    <script src="<?php echo PATH_SITE_TEMPLATE ?>/js/slick.js"></script>
    <script src="<?php echo PATH_SITE_TEMPLATE ?>/js/sliders.js"></script>
    <script src="<?php echo PATH_SITE_TEMPLATE ?>/js/timer.js"></script>
    <script src="<?php echo PATH_SITE_TEMPLATE ?>/js/popup.js"></script>
    <script src="<?php echo PATH_SITE_TEMPLATE ?>/js/product-table.js"></script>




<?php
// Подключение общего скрипта шаблона
mgAddMeta('js/script.js'); ?>

<?php
// Подключение всех js-скриптов движка, плагинов, компонентов
// а также всех скриптов, подключенных через функции addScript и mgAddMeta
mgMeta('js'); ?>
</body>

</html>
