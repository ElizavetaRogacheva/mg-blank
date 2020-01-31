<?php mgAddMeta('components/search/search.js'); ?>
<?php mgAddMeta('components/search/search.css'); ?>



    <form class="search-form"
          aria-label="<?php echo lang('searchAriaLabel'); ?>"
          role="search"
          method="GET"
          action="<?php echo SITE ?>/catalog">

        <input class="search-form__input"
               autocomplete="off"
               aria-label="<?php echo lang('searchPh'); ?>"
               name="search"
               placeholder="<?php echo lang('searchPh'); ?>"
               value="<?php if (isset($_GET['search'])) {echo $_GET['search'];} ?>">

        <button type="submit"
                class="search-form__btn">
            <?php echo lang('search'); ?>
        </button>

    </form>

    <div class="c-search__dropdown wraper-fast-result">
        <div class="fastResult"></div>
    </div>
