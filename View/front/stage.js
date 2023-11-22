
  function validateForm() {
    var domain = document.getElementById('domain').value;
    var email = document.getElementById('email').value;
    var startDate = document.getElementById('start_date').value;
    var endDate = document.getElementById('end_date').value;
    var numDemands = document.getElementById('num_demands').value;
    var companyName = document.getElementById('company_name').value;
    var termsConditions = document.getElementById('terms_conditions').checked;

    if (domain === '' || email === '' || startDate === '' || endDate === '' || numDemands === '' || companyName === '' || !termsConditions) {
      alert('Please fill in all required fields and agree to the Terms & Conditions.');
      return false;
    }

    // Additional validation logic, e.g., email format, date comparison, etc.
    // You can customize this according to your requirements.

    // If everything is valid, redirect to recruteur_page.php
    window.location.href = 'recruteur_page.php';

    // Prevent the form from submitting via its normal mechanism
    return false;
  }
