// const searchBar = document.querySelector(".users .search input ")
const searchBar = document.querySelector(".users .search button");


searchBar.onclick = () => {
   searchBar.classList.toggle("active");
    searchBar.focus();
}