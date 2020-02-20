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
                    <svg id="Capa_1" enable-background="new 0 0 551.13 551.13" height="512" viewBox="0 0 551.13 551.13" width="512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m551.13 526.776-186.785-186.785c30.506-36.023 49.003-82.523 49.003-133.317 0-113.967-92.708-206.674-206.674-206.674s-206.674 92.707-206.674 206.674 92.707 206.674 206.674 206.674c50.794 0 97.294-18.497 133.317-49.003l186.785 186.785s24.354-24.354 24.354-24.354zm-344.456-147.874c-94.961 0-172.228-77.267-172.228-172.228s77.267-172.228 172.228-172.228 172.228 77.267 172.228 172.228-77.267 172.228-172.228 172.228z"/>
                    </svg>
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