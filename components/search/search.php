<?php mgAddMeta('components/search/search.css'); ?>
<?php mgAddMeta('components/search/search-dropdown.js'); ?>

<div class="c-search">
    <form class="search-form"
          aria-label="<?php echo lang('searchAriaLabel'); ?>"
          role="search"
          method="GET"
          action="<?php echo SITE; ?>/catalog">
        <div class="search-form__wrapper">
            <input class="search-form__input"
                   autocomplete="off"
                   aria-label="<?php echo lang('searchPh'); ?>"
                   name="search"
                   placeholder="<?php echo lang('searchPh'); ?>"
                   value="<?php if (isset($_GET['search'])) {
                       echo $_GET['search'];
                   } ?>">
    
            <button type="submit"
                    class="search-form__btn">
                <?php echo lang('search'); ?>
            </button>
        </div>

        <div class="search-results">
            <ul class="search-results__list js-add-search-results">
    
            </ul>
        </div>
    </form>
    
</div>
<template class="js-search-item-template">
	<li class="search-results__item search-result js-search-item-template-inner"
		id = ""
		tabindex = "-1"
	>
		<a href="" class="search-results__link">
			<img class ="search-results__img js-search-item-img" 
				 src =""
				 alt=""
			> 
			<div class="search-results__info">
				<div class="search-results__title js-search-item-title"></div>
				<div class="search-results__price js-search-item-price"></div> 
		
			</div>  				
		</a>
	</li>
</template>