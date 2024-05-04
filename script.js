// Toggle class active utk humbburger menu
const navbarNav = document.querySelector(".navbar-nav");
// ketika hambuger menu di klik
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// Toggle class active untuk search form
const searchForm = document.querySelector('.search-form');
const searchBox = document.querySelector('#search-box');

document.querySelector('#search-button').onclick = (e) => {
  searchForm.classList.toggle('active');
  searchBox.focus();
  e.preventDefault();
};

//klik diluar elemen
const hm = document.querySelector("#hamburger-menu");
const sb = document.querySelector('#search-button');


document.addEventListener("click", function (e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove('active');
  }


  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove('active');
  }

<<<<<<< HEAD
  if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
    shoppingCart.classList.remove('active');
  }

});
=======
});
>>>>>>> 95e199cc5ec6b16d04e36d92b442123c4d518137
