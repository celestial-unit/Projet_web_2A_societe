<?php
 include_once '../controller/formationC.php';
//include '../model/formation.php';
$formationC = new formationC();
$error = "";
if (
    isset($_POST["id_formation"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["paiement"]) &&
    isset($_POST["domaine"]) && 
    isset($_POST["niveau"]) && 
    isset($_POST["image_url"]) &&
    isset($_POST["description"])
) {
    if (
        !empty($_POST['id_formation']) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["paiement"]) &&
        !empty($_POST["domaine"]) &&
        !empty($_POST["niveau"]) &&
        !empty($_POST["image_url"]) &&
        !empty($_POST["description"]) 
    ) {
        $formation = new formation(
            null,
            $_POST['nom'],
            $_POST['paiement'],
            $_POST['domaine'],
            $_POST['niveau'] ,
            $_POST["image_url"],
            $_POST["description"]
        );
        $formationC->addFormation($formation);
       header('Location:newcrudview.php');
    } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Formation</title>
    <link rel="stylesheet" href="./styleform.css">
</head>
<body>
<a href="">retour a la liste</a>
    <h1>Ajouter une Formation</h1>
    <form action="" method="POST">
    <table border="1" align="center">

<tr>
    <td>
        <label for="id_formation">id_formation:
        </label>
    </td>
    <td><input type="text" name="id_formation" id="id_formation" maxlength="20"></td>
</tr>
<tr>
    <td>
        <label for="nom">NomFormation:
        </label>
    </td>
    <td><input type="text" name="nom" id="nom" maxlength="20"></td>
</tr>
<tr>
    <td>
        <label for="paiement">Paiement:
        </label>
    </td>
    <td>
        <input type="text" name="paiement" id="paiement">
    </td>
</tr>
<tr>
    <td>
        <label for="domaine">Domaine:
        </label>
    </td>
    <td>
        <input type="text" name="domaine" id="domaine">
    </td>
</tr>
<tr>
    <td>
        <label for="niveau">Niveau:
        </label>
    </td>
    <td>
        <input type="text" name="niveau" id="niveau">
    </td>
</tr>
<tr>
    <td>
        <label for="image_url">Image_url:
        </label>
    </td>
    <td>
        <input type="text" name="image_url" id="image_url">
    </td>
</tr>
<tr>
    <td>
        <label for="description">Description:
        </label>
    </td>
    <td>
        <input type="text" name="description" id="description">
    </td>
</tr>
<tr align="center">
    <td>
        <input type="submit" value="Save">
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
