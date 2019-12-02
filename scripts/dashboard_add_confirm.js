let dashBoardForms = document.querySelectorAll(
  "#dashboardOrdersForm, #dashboardDriversForm"
);
dashBoardForms.forEach(elm =>
  elm.addEventListener("change", function(evt) {
    document.querySelectorAll("#selectDriverP", "#selectOrderP");

    if (evt.target.parentElement.id == "dashboardOrdersForm") {
      //Take text from the label associated with the selected radio button , put it into a paragraph.
      document.querySelector("#selectedOrderP").textContent = $(
        'label[for="' + evt.target.id + '"]'
      ).text();
      //Set hidden input value to selected one, for confirmation of the link.
      document.querySelector("#orderSelectedInput").value = evt.target.value;
    } else if (evt.target.parentElement.id == "dashboardDriversForm") {
      //Take text from the label associated with the selected radio button , put it into a paragraph.
      document.querySelector("#selectedDriverP").textContent = $(
        'label[for="' + evt.target.id + '"]'
      ).text();
      //Set hidden input value to selected one, for confirmation of the link.
      document.querySelector("#driverSelectedInput").value = evt.target.value;
    }
  })
);
document
  .querySelector("#confirmAssignmentBtn")
  .addEventListener("click", function() {});
