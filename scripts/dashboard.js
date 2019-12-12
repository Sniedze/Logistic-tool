let dashBoardForms = document.querySelectorAll(
  "#dashboardOrdersForm, #dashboardDriversForm"
);
dashBoardForms.forEach(elm =>
  elm.addEventListener("change", function(evt) {
    document.querySelectorAll("#selectDriverP", "#selectOrderP");

    if (evt.target.parentElement.id == "dashboardOrdersForm") {
      evt.target.parentElement.classList.remove("validationError");
      //Take text from the label associated with the selected radio button , put it into a paragraph.
      document.querySelector("#selectedOrderP").textContent = $(
        'label[for="' + evt.target.id + '"]'
      ).text();
      //Set hidden input value to selected one, for confirmation of the link.
      document.querySelector("#orderSelectedInput").value = evt.target.value;
    } else if (evt.target.parentElement.id == "dashboardDriversForm") {
      evt.target.parentElement.classList.remove("validationError");
      //Take text from the label associated with the selected radio button , put it into a paragraph.
      document.querySelector("#selectedDriverP").textContent = $(
        'label[for="' + evt.target.id + '"]'
      ).text();
      //Set hidden input value to selected one, for confirmation of the link.
      document.querySelector("#driverSelectedInput").value = evt.target.value;
    }
  })
);

//confirmation
document
  .querySelector("#confirmAssignmentBtn")
  .addEventListener("click", function(evt) {
    evt.preventDefault();
    let checkOrder = document.querySelector('input[name="order"]:checked');
    let checkDriver = document.querySelector('input[name="driver"]:checked');
    //add validation styling
    if (checkOrder == null) {
      document
        .querySelector("#dashboardOrdersForm input")
        .classList.add("validationError");
    }
    if (checkDriver == null) {
      document
        .querySelector("#dashboardDriversForm input")
        .classList.add("validationError");
    }
    if (checkOrder && checkDriver) {
      //add selections to the confirmation modal (hidden by default)
      document.querySelector("#orderSpan").textContent = document.querySelector(
        "#selectedOrderP"
      ).textContent;
      document.querySelector(
        "#driverSpan"
      ).textContent = document.querySelector("#selectedDriverP").textContent;
      //display modal
      document
        .querySelector("#confirmationModal")
        .classList.remove("dontDisplay");
      //cancel
      document
        .querySelector("#modalCancel")
        .addEventListener("click", function() {
          document
            .querySelector("#confirmationModal")
            .classList.add("dontDisplay");
        });
      //confirm
      document
        .querySelector("#modalConfirm")
        .addEventListener("click", function() {});
    }
  });
//date change
document.querySelector("#dateInput").addEventListener("change", function() {
  window.location.href = `index.php?date=${this.value}`;
});
