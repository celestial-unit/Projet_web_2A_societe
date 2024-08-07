<?php
session_start();
/*empty($_SESSION['user']['Nom']) &&
    !empty($_SESSION['user']['Prenom']) &&
    !empty($_SESSION['user']['Numero']) &&
    !empty($_SESSION['user']['Age']) &&
    !empty($_SESSION['user']['Diplome']) &&
    !empty($_SESSION['user']['Niveau']) &&
    !empty($_SESSION['user']['cin'])*/
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Form for students</title>
  <link rel="stylesheet" href="formsuppetudiant.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body id="main">

  <header>
    <div class="survey-header">
      <h1 id="title">Form for students</h1>
      <p id="description">Thank you for taking your precious time to full fill the form!</p>
    </div>
  </header>

  <main>
    <div class="survey-container">
      <form id="survey-form" method="get" action="../../Model/formetudget.php" onsubmit="return validateForm()" >

        <!--         for name -->
        <div class="survey-element" id="survey-name">
          <label for="name" >First Name</label>
          <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" value=<?php echo $_SESSION['user']['Prenom']?> >
        </div>

        <div class="survey-element" id="survey-name">
            <label for="name" >Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Enter your last name"value=<?php echo $_SESSION['user']['Nom']?>  >
          </div>

          <div class="survey-element" id="survey-name">
            <label for="name" >Email</label>
            <input type="email" id="email" name="email" placeholder="Enter email"value=<?php echo $_SESSION['user']['Email']?>  >
          </div>
        <!--         for age -->
        <div class="survey-element" id="survey-age">
          <label for="number" >Age (optional)</label>
          <input type="number" id="age" placeholder="Age" min="1" max="100" name="age" value=<?php echo $_SESSION['user']['Age']?> >
        </div>

        <div class="level of study" id="level of study">
            <label for="text">level of study</label>
            <input type="text" id="level" placeholder="level of study" name="studies" value=<?php echo $_SESSION['user']['Niveau']?> >
        </div>

        <div class="Diploma" id="Diploma">
            <label for="text">Diploma</label>
            <input type="text" id="dip" placeholder="Diploma" name="diploma" value=<?php echo $_SESSION['user']['Diplome']?> >
        </div>

        <div class="cin" id="cin">
            <label for="text">CIN</label>
            <input type="number" id="CIN" placeholder="CIN" name="cin" value=<?php echo $_SESSION['user']['cin']?> >
        </div>

        <div class="num" id="num">
            <label for="text">Phone Number</label>
            <input type="number" id="number" placeholder="Number" name="num" value=<?php echo $_SESSION['user']['Numero']?> >
        </div>

        <!--         Submit button -->
        <div class="survey-element" id="survey-submit">
          <input type="submit" id="submit"  value="Send us" >
        </div>
      </form>
    </div>
  </main>
</body>
<script>
    function validateForm()
    {
        
            var firstName = document.getElementById("firstName").value;
            var lastName = document.getElementById("lastName").value;
            var studies = document.getElementById("level").value;
            var diploma = document.getElementById("dip").value;
            var cin = document.getElementById("CIN").value;
            var num = document.getElementById("number").value;
            var age = document.getElementById("age").value;
            var email = document.getElementById("email").value;

            if (firstName === "" || lastName === ""  || studies === "" || diploma === "" || cin === "" || num.length ==="" || age === "" || email==="") {
            alert("Please fill in all required fields and ensure the email field contains '@gmail.com', the 'Level of Study' is not empty, the 'Diploma' is not empty, the 'CIN' is not empty, and the 'Number' field has at least 8 characters.");
            return false;
            }
            if ( num.length <8) 
            {
            alert("Please enter a valid num.");
            return false;
            }
            if (age<5 && age>100) 
            {
            alert("Please enter a valid age.");
            return false;
            }
            return true;
    
    }
  </script>
  

</body>
</html>