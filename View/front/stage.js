
  // validation.js

function validateForm() {
  var startDate = document.getElementById("start_date").value;
  var endDate = document.getElementById("end_date").value;

  var startDateObj = new Date(startDate);
  var endDateObj = new Date(endDate);

  var currentDate = new Date();

  if (startDateObj < currentDate) {
    alert("La date de début doit être à partir du temps réel.");
    return false;
  }

  var minimumEndDate = new Date(startDateObj);
  minimumEndDate.setDate(startDateObj.getDate() + 30);

  if (endDateObj <= startDateObj || endDateObj < minimumEndDate) {
    alert("La date de fin doit être après la date de début et au moins 30 jours plus tard.");
    return false;
  }

  return true;
}

