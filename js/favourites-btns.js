const favouritesItems = document.querySelectorAll('.js-favourites-item');
const favEmptyBlock = document.querySelector('.js-fav-empty');

function removeFromWishlist() {
    favouritesItems.forEach((favouritesItem) => {
        const removeFavBtn = favouritesItem.querySelector('.js-remove-to-favorites');
        removeFavBtn.addEventListener('click', (evt) => {
            evt.preventDefault();
            favouritesItem.style.display = 'none';
            checkEmpty();
            console.log(favouritesItems);
        });
    });
};

removeFromWishlist();

