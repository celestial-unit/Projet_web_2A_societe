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
      <h1 id="title">Form for users added by admin</h1>
      <p id="description">New users!</p>
    </div>
  </header>

  <main>
    <div class="survey-container">
      <form id="survey-form" method="get" action="../../Model/formgetadmin.php" onsubmit="return validateForm()" >

        <!--         for name -->
        <div class="survey-element" id="survey-name">
          <label for="name" >First Name</label>
          <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" >
        </div>

        <div class="survey-element" id="survey-name">
            <label for="name" >Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" >
          </div>
        <!--         for age -->
        <div class="survey-element" id="survey-age">
          <label for="number" >Age (optional)</label>
          <input type="number" id="age" placeholder="Age" min="1" max="100" name="age">
        </div>

        <div class="level of study" id="level of study">
            <label for="text">Email</label>
            <input type="email" id="email" placeholder="enter your email please" name="email">
        </div>


        <div class="role">
            <label for="role">Role</label>
            <select id="role" name="role">
                <option value="etudiant">Etudiant</option>
                <option value="recruteur">Recruteur</option>
            </select>
        </div>

        <div class="num" id="num">
            <label for="text">Number</label>
            <input type="number" id="number" placeholder="Number" name="num">
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
            var role = document.getElementById("role").value;
            var num = document.getElementById("number").value;
            var age = document.getElementById("age").value;
            var email = document.getElementById("email").value;

            if (firstName === "" || lastName === ""  || role === "" || email === "" || age === "" || num==="" ) {
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