var modal = document.querySelector(".modal");
var trigger = document.querySelector(".trigger");
var closeButton = document.querySelector(".close-button");
let orderContainer = document.querySelector("#order_table");
let searchContainer = document.querySelector("#search_container");
let tableTitle = document.querySelector("#order_title");
let clearSearchButton = document.querySelector("#clear_search_button");
let submitButton = document.querySelector("#submit_button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
           }
    function showSearch(){
        orderContainer.classList.add("dontDisplay");
        tableTitle.classList.add("dontDisplay");
        clearSearchButton.addEventListener("click", clearSearch);
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }
    function clearSearch(){
        console.log("Clicked");
        searchContainer.classList.add("dontDisplay");
        orderContainer.classList.remove("dontDisplay");
        tableTitle.classList.remove("dontDisplay");
    }
   
    submitButton.addEventListener("click", showSearch)
    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);