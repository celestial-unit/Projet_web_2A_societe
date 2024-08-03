<?php
//include'../config.php';
include '../Controller/formationC.php';
include '../Controller/typeformationC.php';
$error="";
$formationC = new formationC();
$typeformationC = new typeformationC();
// Fonction pour mettre à jour une formation
$db=config::getConnexion();

function updateFormation($id_formation, $nom, $ispaid, $datedebut, $niveau, $image_url, $nbheures, $type_cours, $nature_cours, $domaine, $id_typeformation, $location, $email)
{
    global $db;

    try {
        $sql = "UPDATE formation 
                SET nom=?, 
                    ispaid=?, 
                    datedebut=?, 
                    niveau=?, 
                    image_url=?, 
                    nbheures=?, 
                    type_cours=?, 
                    nature_cours=?, 
                    domaine=?, 
                    id_typeformation=?,
                    location=?,
                    email=?
                WHERE id_formation=?";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([$nom, $ispaid, $datedebut, $niveau, $image_url, $nbheures, $type_cours, $nature_cours, $domaine, $id_typeformation, $location, $email, $id_formation]);

        echo "Formation mise à jour avec succès";
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour de la formation : " . $e->getMessage();
    }
}

// Récupération des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mettez ici le code pour récupérer les données du formulaire
    $id_formation = $_POST["id_formation"];
    $nom = $_POST["nom"];
    $ispaid = $_POST["ispaid"];
    $datedebut = $_POST["datedebut"];
    $niveau = $_POST["niveau"];
    $image_url = $_POST["image_url"];
    $nbheures = $_POST["nbheures"];
    $type_cours = $_POST["type_cours"];
    $nature_cours = $_POST["nature_cours"];
    $domaine = $_POST["domaine"];
    $location = $_POST["location"];
    $email = $_POST["email"];

    $id_typeformation = $typeformationC->getTypeFormationIdByDomaine($domaine);
    // Mettez ici le code pour appeler la fonction de mise à jour
    updateFormation($id_formation, $nom, $ispaid, $datedebut, $niveau, $image_url, $nbheures, $type_cours, $nature_cours, $domaine, $id_typeformation,$location,$email);
    header('location: newcrudview.php');
    // Mettez ici le code pour rediriger l'utilisateur ou afficher un message de succès
}

// Fermer la connexion à la base de données

$id_formation_to_update = $_GET["id_formation"]; // Assurez-vous de sécuriser cette valeur contre les injections SQL
$sql_select_formation = "SELECT * FROM formation WHERE id_formation = $id_formation_to_update";
$result_formation = $db->query($sql_select_formation);
// Vérifiez s'il y a des résultats et pré-remplissez les champs du formulaire
if ($result_formation->rowCount() > 0) {
    $row_formation = $result_formation->fetch(PDO::FETCH_ASSOC);
    $nom_formation = $row_formation["Nom"];
    $ispaid_formation = $row_formation["ispaid"];
    $datedebut_formation = $row_formation["datedebut"];
    $niveau_formation = $row_formation["Niveau"];
    $image_url_formation = $row_formation["image_url"];
    $nbheures_formation = $row_formation["nbheures"];
    $type_cours_formation = $row_formation["type_cours"];
    $nature_cours_formation = $row_formation["nature_cours"];
    $domaine_formation = $row_formation["domaine"];
    $id_typeformation_formation = $row_formation["id_typeformation"];
    $id_formation_formation = $row_formation["id_formation"];
    $location_formation = $row_formation["location"];
    $email_formation = $row_formation["email"];

} else {
    // Gérer le cas où la formation n'est pas trouvée
    echo "Formation non trouvée.";
    exit();
}
//$conn->close();
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
      <h1 id="title">Form for training edited by admin</h1>
      <p id="description">edit training !</p>
    </div>
  </header>
  <form id="survey-form" method="POST" >
  <main>
    <div class="survey-container">
    <div class="survey-element" id="survey-name">
    <label for="id_formation">id_formation: </label>
        <input type="text" name="id_formation" id="id_formation" maxlength="20" value="<?php echo $id_formation_formation; ?>">
        </div>

        <div class="survey-element" id="survey-name">
        <label for="nom">NomFormation: </label>
        <input type="text" name="nom" id="nom" maxlength="20" value="<?php echo $nom_formation; ?>">
        </div>
        
        <div class="survey-element" id="survey-paid">
        <label for="ispaid">Is paid:</label>
        <select name="ispaid" id="ispaid" value="<?php echo $ispaid_formation; ?>">
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
       </div>

       <div class="survey-element" id="survey-startdate">
        <label for="datedebut">Date Debut:</label>
        <input type="date" name="datedebut" id="datedebut" value="<?php echo $datedebut_formation; ?>">
        </div>

        <div class="survey-element" id="survey-niveau">
        <label for="niveau">Niveau:</label>
        <input type="text" name="niveau" id="niveau" value="<?php echo $niveau_formation; ?>">
        </div>

        <div class="survey-element" id="survey-image">
        <div class="preview">
          <img id="file-ip-1-preview" style="max-width: 100%; max-height: 200px;">
        </div>
        <label for="image_url">Upload Image</label>
        <input type="file" id="image_url" name="image_url" accept="image/*" onchange="showPreview(event);">
        </div>
        <div class="survey-element" id="survey-hours">
        <label for="nbheures">Nb d'heures:</label>
        <input type="number" name="nbheures" id="nbheures" value="<?php echo $nbheures_formation; ?>">
        </div>

        <div class="survey-element" id="survey-type">
    <label for="type_cours">Type cours:</label>
    <select name="type_cours" id="type_cours">
        <option value="weekend" <?php if ($type_cours_formation === 'weekend') echo 'selected'; ?>>Weekend classes</option>
        <option value="normal" <?php if ($type_cours_formation === 'normal') echo 'selected'; ?>>Normal classes</option>
        <option value="night" <?php if ($type_cours_formation === 'night') echo 'selected'; ?>>Night classes</option>
    </select>
</div>

<div class="survey-element" id="survey-nature">
    <label for="nature_cours">Nature cours:</label>
    <select name="nature_cours" id="nature_cours">
        <option value="accelerated" <?php if ($nature_cours_formation === 'accelerated') echo 'selected'; ?>>Accelerated courses</option>
        <option value="normal" <?php if ($nature_cours_formation === 'normal') echo 'selected'; ?>>Normal courses</option>
    </select>
</div>
        <div class="survey-element" id="survey-name">
    <label for="domaine">Domaine</label>
    <select name="domaine" id="domaine" onchange="updateIdTypeFormation()">
        <?php
        $typesFormation = $typeformationC->getAlldomaine();
        foreach ($typesFormation as $type) {
            $selected = ($type['domaine'] == $domaine_formation) ? "selected" : "";
            echo "<option value='{$type['domaine']}' $selected>{$type['domaine']}</option>";
        }
        ?>
    </select>
</div>
<div class="survey-element" id="survey-hours">
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="<?php echo $location_formation; ?>">
 </div>
 <div class="survey-element" id="survey-hours">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $email_formation; ?>">
 </div>
        <div class="survey-element" id="survey-nature">
        <input type="hidden" name="id_typeformation" id="id_typeformation">
        </div>
       <div class="survey-element"  >
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
        // Fonction pour mettre à jour l'id_typeformation en fonction du domaine choisi
        function updateIdTypeFormation() {
    var domaineSelect = document.getElementById("domaine");
    var idTypeFormationInput = document.getElementById("id_typeformation");
    // Récupérer la valeur de id_typeformation à partir de l'option sélectionnée
    var idTypeFormation = domaineSelect.options[domaineSelect.selectedIndex].value;

    // Mettez à jour la valeur de id_typeformation dans le champ caché
    idTypeFormationInput.value = idTypeFormation;
}
    </script>
</html>