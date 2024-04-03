<?php
include("../../Controller/sign.php");
session_start();
$personne=new Personne();
$conn = new config();
$pdo = $conn->getConnexion();
$personne->setValuesFromSession();
$email = $_SESSION['user']['Email'];
try 
{
    $pdo = config::getConnexion();
    $stmtSelect = $pdo->prepare("SELECT image_data FROM personne WHERE Email = :email");
    $stmtSelect->bindParam(':email',$email, PDO::PARAM_STR);
    $stmtSelect->execute();
    $result = $stmtSelect->fetch(PDO::FETCH_ASSOC);
    $imageUrl = $result['image_data'];

} 
catch (Exception $e) 
{
    die('Erreur: ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnal Details</title>
    <!-- ======= Styles ====== -->
    <style>
/* Style pour les boutons */
button {
  padding: 10px 15px;
  font-size: 16px;
  cursor: pointer;
  border: none;
  border-radius: 5px;
  margin-top: 10px; /* Ajout de marge en haut pour déplacer vers le bas */
}

/* Style spécifique pour le bouton "edit account" */
#editAccountBtn {
  background-color: #fff; /* Couleur de fond blanche */
  color: #000; /* Couleur du texte noire */
  order: 1; /* Ordre d'affichage */
}



/* Style spécifique pour le bouton "Télécharger" */
input[type="submit"] {
  background-color: #fff;
  color: #000;
}

/* Alignement des boutons */
form {
  text-align: center;
  margin-bottom: 20px;
}

/* Alignement spécifique pour le bouton "Télécharger" */
input[type="submit"] {
  position: fixed;
 
  margin-left: 30px;
  
}

/* Alignement spécifique pour le champ de fichier */
input[type="file"] {
  position: fixed;
  
  
  margin-top: -650px; /* Ajustez la valeur selon vos besoins */
  margin-left: 100px;
 
}




/* Style spécifique pour le bouton "Return" */
button:first-child {
  background-color: #000; /* Couleur de fond noire */
  color: #fff; /* Couleur du texte blanche */
}

/* Style spécifique pour le bouton "delete account" */
button:last-child {
  background-color: #fff; /* Couleur de fond blanche */
  color: #000; /* Couleur du texte noire */
  order: -1; /* Ordre d'affichage */
}

/* Alignement des boutons */
div {
  text-align: center; /* Centre les boutons */
  margin-bottom: 15px;
}

/* Alignement spécifique pour le bouton "edit account" à gauche */
#editAccountBtn {
  float: left;
  margin-right: 10px;
}

/* Alignement spécifique pour le bouton "delete account" à gauche */
button:first-child {
  float: left;
  margin-right: 10px;
}

/* Alignement spécifique pour le bouton "Return" à droite */
button:last-child {
  float: right;
  margin-left: 20px;
}

    
      @import url("https://fonts.googleapis.com/css?family=Quicksand:400,500,700&subset=latin-ext");
html {
  position: relative;
  overflow-x: hidden !important;
}

* {
  box-sizing: border-box;
}

body {
  font-family: "Quicksand", sans-serif;
  color: #324e63;
}

a, a:hover {
  text-decoration: none;
}

.icon {
  display: inline-block;
  width: 1em;
  height: 1em;
  stroke-width: 0;
  stroke: currentColor;
  fill: currentColor;
}

.wrapper {
  width: 100%;
  width: 100%;
  height: auto;
  min-height: 100vh;
  padding: 50px 20px;
  padding-top: 100px;
 
}
@media screen and (max-width: 768px) {
  .wrapper {
    height: auto;
    min-height: 100vh;
    padding-top: 100px;
  }
}

.profile-card {
  width: 100%;
  min-height: 460px;
  margin: auto;
  box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);
  background: #fff;
  border-radius: 12px;
  max-width: 700px;
  position: relative;
}
.profile-card.active .profile-card__cnt {
  filter: blur(6px);
}
.profile-card.active .profile-card-message,
.profile-card.active .profile-card__overlay {
  opacity: 1;
  pointer-events: auto;
  transition-delay: 0.1s;
}
.profile-card.active .profile-card-form {
  transform: none;
  transition-delay: 0.1s;
}
.profile-card__img {
  width: 150px;
  height: 150px;
  margin-left: auto;
  margin-right: auto;
  transform: translateY(-50%);
  border-radius: 50%;
  overflow: hidden;
  position: relative;
  z-index: 4;
  box-shadow: 0px 5px 50px 0px #6c44fc, 0px 0px 0px 7px rgba(107, 74, 255, 0.5);
}

.profile-card__img img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}
.profile-card__cnt {
  margin-top: -35px;
  text-align: center;
  padding: 0 20px;
  padding-bottom: 40px;
  transition: all 0.3s;
}
.profile-card__name {
  font-weight: 700;
  font-size: 24px;
  color: #6944ff;
  margin-bottom: 15px;
}
.profile-card__txt {
  font-size: 18px;
  font-weight: 500;
  color: #324e63;
  margin-bottom: 15px;
}
.profile-card__txt strong {
  font-weight: 700;
}
.profile-card-loc {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 18px;
  font-weight: 600;
}
.profile-card-loc__icon {
  display: inline-flex;
  font-size: 27px;
  margin-right: 10px;
}
.profile-card-inf {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  align-items: flex-start;
  margin-top: 35px;
}
.profile-card-inf__item {
  padding: 10px 35px;
  min-width: 150px;
}
@media screen and (max-width: 768px) {
  .profile-card-inf__item {
    padding: 10px 20px;
    min-width: 120px;
  }
}
.profile-card-inf__title {
  font-weight: 700;
  font-size: 27px;
  color: #324e63;
}
.profile-card-inf__txt {
  font-weight: 500;
  margin-top: 7px;
}
.profile-card-social {
  margin-top: 25px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}
.profile-card-social__item {
  display: inline-flex;
  width: 55px;
  height: 55px;
  margin: 15px;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
  color: #fff;
  background: #405de6;
  box-shadow: 0px 7px 30px rgba(43, 98, 169, 0.5);
  position: relative;
  font-size: 21px;
  flex-shrink: 0;
  transition: all 0.3s;
}
@media screen and (max-width: 768px) {
  .profile-card-social__item {
    width: 50px;
    height: 50px;
    margin: 10px;
  }
}
@media screen and (min-width: 768px) {
  .profile-card-social__item:hover {
    transform: scale(1.2);
  }
}
.profile-card-social__item.facebook {
  background: linear-gradient(45deg, #3b5998, #0078d7);
  box-shadow: 0px 4px 30px rgba(43, 98, 169, 0.5);
}
.profile-card-social__item.twitter {
  background: linear-gradient(45deg, #1da1f2, #0e71c8);
  box-shadow: 0px 4px 30px rgba(19, 127, 212, 0.7);
}
.profile-card-social__item.instagram {
  background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
  box-shadow: 0px 4px 30px rgba(120, 64, 190, 0.6);
}
.profile-card-social__item.behance {
  background: linear-gradient(45deg, #1769ff, #213fca);
  box-shadow: 0px 4px 30px rgba(27, 86, 231, 0.7);
}
.profile-card-social__item.github {
  background: linear-gradient(45deg, #333333, #626b73);
  box-shadow: 0px 4px 30px rgba(63, 65, 67, 0.6);
}
.profile-card-social__item.codepen {
  background: linear-gradient(45deg, #324e63, #414447);
  box-shadow: 0px 4px 30px rgba(55, 75, 90, 0.6);
}
.profile-card-social__item.link {
  background: linear-gradient(45deg, #d5135a, #f05924);
  box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.6);
}
.profile-card-social .icon-font {
  display: inline-flex;
}
.profile-card-ctr {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 40px;
}
@media screen and (max-width: 576px) {
  .profile-card-ctr {
    flex-wrap: wrap;
  }
}
.profile-card__button {
  background: none;
  border: none;
  font-family: "Quicksand", sans-serif;
  font-weight: 700;
  font-size: 19px;
  margin: 15px 35px;
  padding: 15px 40px;
  min-width: 201px;
  border-radius: 50px;
  min-height: 55px;
  color: #fff;
  cursor: pointer;
  backface-visibility: hidden;
  transition: all 0.3s;
}
@media screen and (max-width: 768px) {
  .profile-card__button {
    min-width: 170px;
    margin: 15px 25px;
  }
}
@media screen and (max-width: 576px) {
  .profile-card__button {
    min-width: inherit;
    margin: 0;
    margin-bottom: 16px;
    width: 100%;
    max-width: 300px;
  }
  .profile-card__button:last-child {
    margin-bottom: 0;
  }
}
.profile-card__button:focus {
  outline: none !important;
}
@media screen and (min-width: 768px) {
  .profile-card__button:hover {
    transform: translateY(-5px);
  }
}
.profile-card__button:first-child {
  margin-left: 0;
}
.profile-card__button:last-child {
  margin-right: 0;
}
.profile-card__button.button--blue {
  background: linear-gradient(45deg, #1da1f2, #0e71c8);
  box-shadow: 0px 4px 30px rgba(19, 127, 212, 0.4);
}
.profile-card__button.button--blue:hover {
  box-shadow: 0px 7px 30px rgba(19, 127, 212, 0.75);
}
.profile-card__button.button--orange {
  background: linear-gradient(45deg, #d5135a, #f05924);
  box-shadow: 0px 4px 30px rgba(223, 45, 70, 0.35);
}
.profile-card__button.button--orange:hover {
  box-shadow: 0px 7px 30px rgba(223, 45, 70, 0.75);
}
.profile-card__button.button--gray {
  box-shadow: none;
  background: #dcdcdc;
  color: #142029;
}
.profile-card-message {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  padding-top: 130px;
  padding-bottom: 100px;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s;
}
.profile-card-form {
  box-shadow: 0 4px 30px rgba(15, 22, 56, 0.35);
  max-width: 80%;
  margin-left: auto;
  margin-right: auto;
  height: 100%;
  background: #fff;
  border-radius: 10px;
  padding: 35px;
  transform: scale(0.8);
  position: relative;
  z-index: 3;
  transition: all 0.3s;
}
@media screen and (max-width: 768px) {
  .profile-card-form {
    max-width: 90%;
    height: auto;
  }
}
@media screen and (max-width: 576px) {
  .profile-card-form {
    padding: 20px;
  }
}
.profile-card-form__bottom {
  justify-content: space-between;
  display: flex;
}
@media screen and (max-width: 576px) {
  .profile-card-form__bottom {
    flex-wrap: wrap;
  }
}
.profile-card textarea {
  width: 100%;
  resize: none;
  height: 210px;
  margin-bottom: 20px;
  border: 2px solid #dcdcdc;
  border-radius: 10px;
  padding: 15px 20px;
  color: #324e63;
  font-weight: 500;
  font-family: "Quicksand", sans-serif;
  outline: none;
  transition: all 0.3s;
}
.profile-card textarea:focus {
  outline: none;
  border-color: #8a979e;
}
.profile-card__overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  pointer-events: none;
  opacity: 0;
  background: rgba(22, 33, 72, 0.35);
  border-radius: 12px;
  transition: all 0.3s;
}





.custom-file-upload input[type="file"] {
  display: none;
}

.custom-file-upload img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  overflow: hidden;
  object-fit: cover;
  box-shadow: 0px 5px 50px 0px #6c44fc, 0px 0px 0px 7px rgba(107, 74, 255, 0.5);
  display: none;
}

.custom-file-upload span {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #000; /* Changer la couleur du texte en noir */
  font-weight: bold;
  text-align: center;
  visibility: visible; /* Par défaut, le texte est visible */
}

/* Ajout de styles pour le texte lorsque l'image est sélectionnée */
.custom-file-upload img[src="#"] + span {
  visibility: visible; /* Le texte reste visible si l'image n'est pas chargée */
}

.custom-file-upload img:not([src="#"]) + span {
  visibility: hidden; /* Le texte est masqué lorsque l'image est chargée */
}


</style>
    <link rel="stylesheet" href="page_affichage_etudiant.css">
</head>
<body>
<div class="wrapper">
  <div class="profile-card js-profile-card">

  <div class="profile-card__img">
  <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($imageUrl); ?>" alt="Image" id="previewImage" name="img">
  </div>

  

    <div class="profile-card__cnt js-profile-cnt">
    <div class="profile-card__name"><?php echo $personne->Prenom . ' ' . $personne->Nom; ?></div>
      <div class="profile-card__txt"><strong><?php echo  $personne->role ?></strong>
    </div>
      <div class="profile-card-loc">
        
        <span class="profile-card-loc__txt">
        <?php echo  $personne->email ?>
        </span>
      </div>

      <div class="profile-card-inf">
        <div class="profile-card-inf__item">
          <div class="profile-card-inf__title">CIN</div>
          <div class="profile-card-inf__txt"><?php echo $personne->cin ?></div>
        </div>

        <div class="profile-card-inf__item">
          <div class="profile-card-inf__title">Level</div>
          <div class="profile-card-inf__txt"><?php echo $personne->level ?></div>
        </div>

        <div class="profile-card-inf__item">
          <div class="profile-card-inf__title">Diploma</div>
          <div class="profile-card-inf__txt"><?php echo $personne->diplome ?></div>
        </div>

        <div class="profile-card-inf__item">
          <div class="profile-card-inf__title">Phone number</div>
          <div class="profile-card-inf__txt"><?php echo $personne->tel?></div>
        </div>
      </div>
      </form>
</div>

   <div>
      <button onclick="redirectToMainPage()">Return </button>
      
    </div>
    <div>
    <button id="editAccountBtn">edit account</button>
    <button id="deleteAccountBtn" onclick="confirmDeactivation()">delete account</button>
    <form action="upload_image.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="image" accept="image/*">
    <button type="submit">Télécharger</button>
    </form>
    </div>
    
</body>
<script>
  var editAccountBtn = document.getElementById("editAccountBtn");
    editAccountBtn.addEventListener("click", function() {
        window.location.href = "formsuppetudiant.php"; 
    });
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









 



   </script>
</html>
