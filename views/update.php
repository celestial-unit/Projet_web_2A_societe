<?php
require '../config.php';
include '../controller/formationC.php';
$error = "";
$formationC = new formationC();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

        // Prepare the SQL statement with placeholders
        $sqlUpdate = "UPDATE formation SET 
            nom = :nom,
            ispaid = :ispaid,
            niveau = :niveau,
            image_url = :image_url,
            nbheures = :nbheures,
            type_cours = :type_cours,
            nature_cours = :nature_cours,
            datedebut = :datedebut,
            domaine = :domaine 
            WHERE id_formation = :id_formation";
           $stmt = $db->prepare($sqlUpdate);
           
           // Liaison des paramètres
           $stmt->bindParam(':nom', $nom);
           $stmt->bindParam(':ispaid', $ispaid);
           $stmt->bindParam(':niveau', $niveau);
           $stmt->bindParam(':image_url', $image_url);
           $stmt->bindParam(':nbheures', $nbheures);
           $stmt->bindParam(':type_cours', $type_cours);
           $stmt->bindParam(':nature_cours', $nature_cours);
           $stmt->bindParam(':datedebut', $datedebut);
           $stmt->bindParam(':domaine', $domaine);
           $stmt->bindParam(':id_formation', $id_formation);
           
    }
    $id_formation = $_GET["id"];
    $sql = "SELECT * FROM formation WHERE id_formation = '$id_formation'";
    $result = $db->query($sql);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
    
        ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Formation</title>
    <link rel="stylesheet" href="./styleform.css">
</head>
<body>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">
        <tr>
        <td><input type="hidden" name="id_formation" value="<?php echo $row['id_formation']; ?>"></td>
            </tr>
            <tr>
                <td>  <label for="nom">NomFormation: </label></td>
       <td> <input type="text" name="nom" id="nom" maxlength="20"  value="<?php echo $row['nom']; ?>" ></td>
            </tr>
            <tr>
    <td>
        <label for="ispaid">Is paid:</label>
    </td>
    <td>
        <select name="ispaid" id="ispaid">
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
    </td>
</tr>
                <td><label for="datedebut">Date debut:</label></td>
                <td><input type="datetime" name="datedebut" value="<?php echo $row['datedebut']; ?>" id="datedebut"></td>
            </tr>
            <tr>
                <td><label for="niveau">Niveau:</label></td>
                <td><input type="text" name="niveau" id="niveau" value="<?php echo  $row['Niveau']; ?>"></td>
            </tr>
            <tr>
                <td><label for="image_url">image_url:</label></td>
                <td><input type="text" name="image_url" id="image_url" value="<?php echo  $row['image_url']; ?>"></td>
            </tr>
            <tr>
                <td><label for="nbheures">Nb d'heures:</label></td>
                <td><input type="number" name="nbheures" id="nbheures" value="<?php echo  $row['nbheures']; ?>"></td>
            </tr>
            <tr>
                <td><label for="type_cours">Type cours:</label></td>
                <td><input type="number" name="type_cours" id="type_cours" value="<?php echo  $row['type_cours']; ?>"></td>
            </tr>
            <tr>
                <td><label for="nature_cours">Nature cours:</label></td>
                <td><input type="number" name="nature_cours" id="nature_cours" value="<?php echo  $row['nature_cours']; ?>"></td>
            </tr>
            <tr>
                <td>
                    <label for="domaine">Domaine:</label>
                </td>
                <td>
                    <input type="text" name="domaine" id="domaine" value="<?php echo  $row['domaine']; ?>">
                </td>
</tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Update" id="update" >
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    <script src="./scriptform.js"></script>
</body>
</html>
<?php
?>