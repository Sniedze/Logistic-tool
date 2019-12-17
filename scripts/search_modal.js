let orderContainer = document.querySelector("#order_table");
let searchContainer = document.querySelector("#search_container");
let tableTitle = document.querySelector("#order_title");
let clearSearchButton = document.querySelector("#clear_search_button");
let submitButton = document.querySelector("#search_button");

    function showSearch(){
        orderContainer.classList.add("dontDisplay");
        tableTitle.classList.add("dontDisplay");
        clearSearchButton.classList.remove("dontDisplay");
        clearSearchButton.addEventListener("click", clearSearch);
    }

    
    function clearSearch(){
        console.log("Clicked");
        searchContainer.classList.add("dontDisplay");
        orderContainer.classList.remove("dontDisplay");
        tableTitle.classList.remove("dontDisplay");
    }
   
    submitButton.addEventListener("click", showSearch)
   