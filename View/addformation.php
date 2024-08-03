<?php
require '../config.php';
include '../Controller/formationC.php';
//include '../model/formation.php';
// Assurez-vous que la classe typeformationC est incluse ici
include '../Controller/typeformationC.php';
$formationC = new formationC();
$typeformationC = new typeformationC(); // Assurez-vous que la classe typeformationC est instanciée ici
//$error = "";
$db=config::getConnexion();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
    $ispaid = isset($_POST["ispaid"]) ? $_POST["ispaid"] : "";
    //$datedebut = isset($_POST["datedebut"]) ? $_POST["datedebut"] : "";
    $datedebut = isset($_POST["datedebut"]) ? new DateTime($_POST["datedebut"]) : null;
    $datedebutString = $datedebut ? $datedebut->format('Y-m-d') : null;
    $niveau = isset($_POST["niveau"]) ? $_POST["niveau"] : "";
    $image_url = isset($_POST["image_url"]) ? $_POST["image_url"] : "";
    $nbheures = isset($_POST["nbheures"]) ? $_POST["nbheures"] : "";
    $type_cours = isset($_POST["type_cours"]) ? $_POST["type_cours"] : "";
    $nature_cours = isset($_POST["nature_cours"]) ? $_POST["nature_cours"] : "";
    $domaine = isset($_POST["domaine"]) ? $_POST["domaine"] : "";
    $id_formation = isset($_POST["id_formation"]) ? $_POST["id_formation"] : "";
    $location = isset($_POST["location"]) ? $_POST["location"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    $result = $db->query("SELECT id_typeformation FROM typeformation WHERE domaine = '$domaine'");
    
    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $id_typeformation = $row['id_typeformation'];
    } else {
        // Gérer l'erreur de requête SQL
        $errorInfo = $db->errorInfo();
        echo "Error in SQL query: " . $errorInfo[2];
        exit;
    }
    $sqltraining = "INSERT INTO formation VALUES ('$nom','$ispaid','$niveau','$image_url','$nbheures','$type_cours','$nature_cours','$id_typeformation','$datedebutString','$domaine',NULL,'$location','$email')";
    if ($db->query($sqltraining) === TRUE) {
        echo "Form submitted successfully";
        header('location: newcrudview.php');
        exit;
    } else {
      header('location: newcrudview.php');
        // Gérer l'erreur de requête SQL
       // $errorInfo = $db->errorInfo();
       // echo "Error: " . $sqltraining . "<br>" . $errorInfo[2];
    }
    $db = null; // Fermer la connexion PDO
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Form for students</title>
  <link rel="stylesheet" href="form.css">

</head>
<body id="main">
  <header>
    <div class="survey-header">
      <h1 id="title">Form for training added by admin</h1>
      <p id="description">New training !</p>
    </div>
  </header>
  <form id="survey-form" method="POST" >
  <main>
    <div class="survey-container">

   

        <div class="survey-element" id="survey-name">
        <label for="nom">NomFormation: </label>
        <input type="text" name="nom" id="nom" maxlength="20">
        </div>
        
        <div class="survey-element" id="survey-paid">
        <label for="ispaid">Is paid:</label>
        <select name="ispaid" id="ispaid">
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
       </div>

       <div class="survey-element" id="survey-startdate">
        <label for="datedebut">Date Debut:</label>
        <input type="date" name="datedebut" id="datedebut">
        <span id="dateerreur" style="color: red"></span>
        </div>

        <div class="survey-element" id="survey-niveau">
        <label for="niveau">Niveau:</label>
        <input type="text" name="niveau" id="niveau">
        </div>

        <div class="survey-element" id="survey-image">
       <!-- <label for="image_url">Image_url:</label>
        <input type="text" name="image_url" id="image_url">
        </div>-->
        <div class="preview">
          <img id="file-ip-1-preview" style="max-width: 100%; max-height: 200px;">
        </div>
        <label for="image_url">Upload Image</label>
        <input type="file" id="image_url" name="image_url" accept="image/*" onchange="showPreview(event);">
        </div>

       
    
        <div class="survey-element" id="survey-hours">
        <label for="nbheures">Nb d'heures:</label>
        <input type="number" name="nbheures" id="nbheures">
        </div>
        <div class="survey-element" id="survey-type">
    <label for="type_cours">Type cours:</label>
    <select name="type_cours" id="type_cours">
        <option value="weekend">Weekend classes</option>
        <option value="normal">Normal classes</option>
        <option value="night">Night classes</option>
    </select>
</div>
<div class="survey-element" id="survey-nature">
    <label for="nature_cours">Nature cours:</label>
    <select name="nature_cours" id="nature_cours">
        <option value="accelerated">Accelerated courses</option>
        <option value="normal">Normal courses</option>
    </select>
</div>
        <div class="survey-element" id="survey-name">
        <label for="domaine">Domaine</label>
        <select name="domaine" id="domaine">
                        <?php
                        $typesFormation = $typeformationC->getAlldomaine();
                        foreach ($typesFormation as $type) {
                            echo "<option value='{$type['domaine']}'>{$type['domaine']}</option>";
                        }
                        ?>
                    </select>
        </div>  
        <div class="survey-element" id="survey-name">
    <label for="location">Location: </label>
        <input type="text" name="location" id="location" maxlength="20">
        </div>
        <div class="survey-element" id="survey-name">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        </div>
       <div class="survey-element" >
       <input type="submit" value="Save" id="save">
       <input type="reset" value="Reset">
       </div>
    </div>
    </div>   
  </main>
</form>
</body>
<script src="./scriptform.js"></script>
<script>
  function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      preview.src = src;
      preview.style.display = "block";
    }
  }
</script>
</html>
