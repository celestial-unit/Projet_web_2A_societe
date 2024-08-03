<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Formulaire de Stage</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'>

  <style>
/* Reset some default styles */
h2 {
  color: black;
}
body, html {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Apply a background color and set font styles */
body {
    background-color: #FDF5E6; /* Light brown */
  color: #191515;
  font-family: Arial, sans-serif;
  transition: background-color 0.5s, color 0.5s;
}


/* Style the header */
header {
  
  color: white;
  padding: 10px;
  text-align: center;
}

/* Style the sun icon */
#dark-mode-toggle {
  cursor: pointer;
  font-size: 24px;
  margin-right: 10px;
  color: #FFD700; /* Yellow for light mode */
}

/* Style the main container */
.container {
  max-width: 800px;
  margin: 20px auto;
  background-color: #fff; /* White background for form container in light mode */
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(31, 30, 30, 0.1);
  transition: background-color 0,5s, color 0.5s;
}

/* Style form controls */
.form-control {
  margin-bottom: 15px;
}

.input {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.error {
  color: red;
}

/* Style the textarea */
#textarea-container textarea {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Style the Terms & Conditions checkbox */
.least {
  display: flex;
  align-items: center;
}

/* Style the submit button */
button {
  background-color: #ba2828;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Dark mode styles */
.dark-mode {
  background-color: #111;
  color: white;
}

/* Additional styles for dark mode */
.dark-mode h2 {
  color: white;
}

.dark-mode #dark-mode-toggle {
  color: white; /* White for dark mode */
}

.dark-mode body {
  background-color: #111; /* Black for dark mode */
  color: white;
}

.dark-mode .container {
  background-color: #000; /* Black background for form container in dark mode */
}

    
  </style>
</head>
<body>

<header>
  <div>
  <i id="dark-mode-toggle" class="fas fa-sun" onclick="toggleDarkMode()"></i>
    <h2> Welcome to UNIPATH </h2>
  </div>
</header>

<main>
  <section class="container">
    <form action="sauvgarder_stage.php" id="form" method="post" onsubmit="return validateForm()">
    
      <!-- Domain -->
      <div class="form-control text">
        <label for="domain" class="label">Domaine</label>
        <select class="input" name="domain" id="domain">
          <option value="RH">Ressources Humaines (RH)</option>
          <option value="programming">Programmation</option>
          <option value="web_development">Développement Web</option>
          <option value="security">Sécurité</option>
          <option value="software_engineering">Génie Logiciel</option>
          <option value="finance">Finance</option>
          <option value="marketing">Marketing</option>
        </select>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small id="domainError" class="error">Error message</small>  
      </div>

      <!-- Type de Stage -->
      <?php
        $dbHost = 'localhost';
        $dbName = 'unipath_db';
        $dbUser = 'root';
        $dbPass = '';

        try {
          $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
          $query = "SELECT nom_types FROM type_stage";
          $stmt = $pdo->prepare($query);
          $stmt->execute();
          $types = $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
          // Handle database connection error
        }
      ?>
      <div class="form-control text">
        <label for="type_stage" class="label">Type de Stage</label>
        <select class="input" name="type_stage" id="type_stage">
          <?php
            foreach ($types as $type) {
              echo "<option value='$type'>$type</option>";
            }
          ?>
        </select>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small id="typeStageError" class="error">Error message</small>
      </div>

      <!-- Email -->
      <div class="form-control text">
        <label for="email" class="label">Email</label>
        <input class="input" type="email" name="email" id="email" placeholder="E-mail Address">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small id="emailError" class="error">Error message</small>
      </div>

      <!-- Date de début -->
      <div class="form-control text">
        <label for="start_date" class="label">Date de début</label>
        <input class="input" type="date" name="start_date" id="start_date">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small id="startDateError" class="error">Error message</small>
      </div>

      <!-- Date de fin -->
      <div class="form-control text">
        <label for="end_date" class="label">Date de fin</label>
        <input class="input" type="date" name="end_date" id="end_date">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small id="endDateError" class="error">Error message</small>
      </div>

      <!-- Nombre de demandes -->
      <div class="form-control text">
        <label for="num_demands" class="label">Nombre de demandes</label>
        <input class="input" type="number" name="num_demands" id="num_demands" placeholder="Nombre de demandes">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small id="numDemandsError" class="error">Error message</small>
      </div>

      <!-- Nom de la société -->
      <div class="form-control text">
        <label for="company_name" class="label">Nom de la société</label>
        <input class="input" type="text" name="company_name" id="company_name" placeholder="Nom de la société">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small id="companyNameError" class="error">Error message</small>
      </div>

      <!-- Description -->
      <div id="textarea-container">
        <textarea name="description" id="description" cols="30" rows="5" placeholder="Description"></textarea>
      </div>

      <!-- Terms & Conditions -->
      <div class="form-control least">
        <input type="checkbox" name="terms_conditions" id="terms_conditions">
        <label for="terms_conditions">I agree to Terms & Conditions</label>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small id="termsConditionsError" class="error">Error message</small>
      </div>

      <button type="submit">Submit Application</button>
    </form>
  </section>
</main>
<script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
<script>
  function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    document.querySelector('.container').classList.toggle('dark-mode');
  }
</script>
<script>
  function validateForm() {
    var domain = document.getElementById("domain").value;
    var typeStage = document.getElementById("type_stage").value;
    var email = document.getElementById("email").value;
    var startDate = document.getElementById("start_date").value;
    var endDate = document.getElementById("end_date").value;
    var numDemands = document.getElementById("num_demands").value;
    var companyName = document.getElementById("company_name").value;
    var termsConditions = document.getElementById("terms_conditions").checked;

    // Reset previous error messages
    var errorMessages = document.querySelectorAll(".error");
    errorMessages.forEach(function (errorMsg) {
      errorMsg.textContent = "";
    });

    // Perform validation
    if (domain === "" || typeStage === "" || email === "" || startDate === "" || endDate === "" || numDemands === "" || companyName === "") {
      alert("Please fill in all the required fields.");
      return false;
    }

    var currentDate = new Date().toISOString().split('T')[0];

    if (startDate < currentDate) {
     alert("Start date should be today or a future date.");
      return false;
    }

    if (endDate < startDate) {
      displayError("endDateError", "End date should be equal to or after the start date.");
      return false;
    }

    if (!termsConditions) {
      displayError("termsConditionsError", "You must agree to the Terms & Conditions.");
      return false;
    }

    return true;
  }

  function displayError(fieldId, message) {
    var errorField = document.getElementById(fieldId);
    errorField.textContent = message;
  }
</script>

</body>
</html>