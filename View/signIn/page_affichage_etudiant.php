<?php
include("../../Controller/sign.php");
session_start();
$personne=new Personne();
$conn = new config();
$pdo = $conn->getConnexion();
$personne->setValuesFromSession();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnal Details</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="page_affichage_etudiant.css">
</head>
<body>
<div class="table-users">
    <div class="table-row header">
       <div>
         <?php
        echo  $personne->role 
         ?>
       </div>
    </div>
    <div class="table-row names">
       <div>First Name</div>
       <div>Last Name</div>
       <div>Email</div>
       <div>CIN</div>
       <div>Level</div>
       <div>Diploma</div>
       <div>Num</div>
       <div>Age</div>
    </div>
    <div class="table-row item">
       <div><img src="http://lorempixel.com/100/100/people/1" alt="" /></div>
       <div class="info">
       <div><?php echo $personne->Prenom ?></div>
       <div><?php echo $personne->Nom ?></div>
       <div><?php echo $personne->email ?></div>
       <div><?php echo $personne->cin ?></div>
       <div><?php echo $personne->level ?></div>
       <div><?php echo $personne->diplome ?></div>
       <div><?php echo $personne->tel?></div>
       <div><?php echo $personne->age ?></div>
    </div>
    
 </div>
   <div>
      <button onclick="redirectToMainPage()">Return </button>
    </div>
    <div>
    <button id="editAccountBtn">edit account</button>
    <button onclick=confirmDeactivation()>delete account</button>
    </div>
</body>
<script>
   function redirectToMainPage() 
   {
	window.location.href = "compte_etudiant.php";
   }

   document.getElementById("deleteAccountBtn").addEventListener("click", function() {
    confirmDeactivation();
});
   function deactivateAccountAndRedirect()
   {
      fetch('desableaccount.php', 
      {
            method: 'GET',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
      })
          .then(response => response.text())
          .then(data => {
            console.log('Server response:', data);

            if (data.includes('Le compte a été désactivé avec succès.')) 
            {
              alert('Le compte a été désactivé avec succès.');
              window.location.href = '../front/front_office.html';
            } else
            {
              alert("Une erreur s'est produite lors de la désactivation du compte.");
            }
          });
    }

function confirmDeactivation() 
{
    var userResponse = prompt("Voulez-vous vraiment désactiver votre compte ? Tapez 'Oui' pour confirmer.");

    if (userResponse !== null && userResponse.toLowerCase() === 'oui') 
    {
        deactivateAccountAndRedirect();
    } else 
    {
        // L'utilisateur a tapé autre chose ou a annulé, aucune action n'est nécessaire
    }
}


var editAccountBtn = document.getElementById("editAccountBtn");
    editAccountBtn.addEventListener("click", function() {
        window.location.href = "formsuppetudiant.php"; 
    });
   </script>
</html>
