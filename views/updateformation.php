<?php
require '../config.php';
include '../controller/formationC.php';
include '../controller/typeformationC.php';
$error="";
$formationC = new formationC();
$typeformationC = new typeformationC();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fonction pour mettre à jour une formation
function updateFormation($id_formation, $nom, $ispaid, $datedebut, $niveau, $image_url, $nbheures, $type_cours, $nature_cours, $domaine, $id_typeformation)
{
    global $conn;

    // Échapper les valeurs pour éviter les injections SQL
    $nom = mysqli_real_escape_string($conn, $nom);
    $ispaid = mysqli_real_escape_string($conn, $ispaid);
    $datedebut = mysqli_real_escape_string($conn, $datedebut);
    $niveau = mysqli_real_escape_string($conn, $niveau);
    $image_url = mysqli_real_escape_string($conn, $image_url);
    $nbheures = mysqli_real_escape_string($conn, $nbheures);
    $type_cours = mysqli_real_escape_string($conn, $type_cours);
    $nature_cours = mysqli_real_escape_string($conn, $nature_cours);
    $domaine = mysqli_real_escape_string($conn, $domaine);
    $sql = "UPDATE formation 
            SET nom='$nom', 
                ispaid='$ispaid', 
                datedebut='$datedebut', 
                niveau='$niveau', 
                image_url='$image_url', 
                nbheures='$nbheures', 
                type_cours='$type_cours', 
                nature_cours='$nature_cours', 
                domaine='$domaine', 
                id_typeformation='$id_typeformation' 
            WHERE id_formation=$id_formation";

    // Exécution de la requête
    if ($conn->query($sql) === TRUE) {
        echo "Formation mise à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour de la formation : " . $conn->error;
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
    $id_typeformation = $typeformationC->getTypeFormationIdByDomaine($domaine);
    // Mettez ici le code pour appeler la fonction de mise à jour
    updateFormation($id_formation, $nom, $ispaid, $datedebut, $niveau, $image_url, $nbheures, $type_cours, $nature_cours, $domaine, $id_typeformation);
    header('location: newcrudview.php');
    // Mettez ici le code pour rediriger l'utilisateur ou afficher un message de succès
}

// Fermer la connexion à la base de données

$id_formation_to_update = $_GET["id_formation"]; // Assurez-vous de sécuriser cette valeur contre les injections SQL
$sql_select_formation = "SELECT * FROM formation WHERE id_formation = $id_formation_to_update";
$result_formation = $conn->query($sql_select_formation);
// Vérifiez s'il y a des résultats et pré-remplissez les champs du formulaire
if ($result_formation->num_rows > 0) {
    $row_formation = $result_formation->fetch_assoc();
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
        <label for="image_url">Image_url:</label>
        <input type="text" name="image_url" id="image_url" value="<?php echo $image_url_formation; ?>">
        </div>
       
    
        <div class="survey-element" id="survey-hours">
        <label for="nbheures">Nb d'heures:</label>
        <input type="number" name="nbheures" id="nbheures" value="<?php echo $nbheures_formation; ?>">
        </div>

        <div class="survey-element" id="survey-type">
        <label for="type_cours">Type cours:</label>
        <input type="number" name="type_cours" id="type_cours" value="<?php echo $type_cours_formation; ?>">
        </div>
      
        <div class="survey-element" id="survey-nature">
        <label for="nature_cours">Nature cours:</label>
        <input type="number" name="nature_cours" id="nature_cours" value="<?php echo $nature_cours_formation; ?>">
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
