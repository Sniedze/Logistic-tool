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

//get form values

//confimation
document
  .querySelector("#confirmAssignmentBtn")
  .addEventListener("click", function(evt) {
    evt.preventDefault();
    let checkOrder = document.querySelector('input[name="order"]:checked');
    let checkDriver = document.querySelector('input[name="driver"]:checked');
    if (checkOrder == null || checkDriver == null) {
      if (checkOrder == null) {
        //document.querySelector("#dashboardOrdersForm").
      }
    }
    document.querySelector("#orderSpan").textContent = document.querySelector(
      "#selectedOrderP"
    ).textContent;
  });
//date change
document.querySelector("#dateInput").addEventListener("change", function() {
  console.log("datechange");
});
