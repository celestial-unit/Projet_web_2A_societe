<?php
include '../controller/formationC.php';

$error = "";
$formationC = new formationC();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
                $_POST['id_formation'],
                $_POST['nom'],
                $_POST['paiement'],
                $_POST['domaine'],
                $_POST['niveau'],
                $_POST['image_url'],
                $_POST['description']
            );

            $formationC->update($formation, $_POST["id_formation"]);

            header('Location: newcrudview.php');
        } else {
            $error = "Missing information";
        }
    }
}

// Retrieve the formation details if the form was not submitted or there was an error
if (!isset($training)) {
    if (isset($_GET['id'])) {
        $idFormationToUpdate = $_GET['id'];
        $training = $formationC->showFormation($idFormationToUpdate);
    } else {
        echo 'id introuvable';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Formation</title>
    <link rel="stylesheet" href="./styleform.css">
</head>
<body>
    <a href="viewcrud.php">Retour à la liste</a>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td><label for="id_formation">id_formation:</label></td>
                <td><input type="text" name="id_formation" id="id_formation" value="<?php echo $training['id_formation']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td><label for="nom">NomFormation:</label></td>
                <td><input type="text" name="nom" id="nom" value="<?php echo $training['Nom']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td><label for="paiement">Paiement:</label></td>
                <td><input type="text" name="paiement" id="paiement" value="<?php echo $training['paiement']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td><label for="domaine">Domaine:</label></td>
                <td><input type="text" name="domaine" value="<?php echo $training['Domaine']; ?>" id="domaine"></td>
            </tr>
            <tr>
                <td><label for="niveau">Niveau:</label></td>
                <td><input type="text" name="niveau" id="niveau" value="<?php echo $training['Niveau']; ?>"></td>
            </tr>
            <tr>
                <td><label for="image_url">image_url:</label></td>
                <td><input type="text" name="image_url" id="image_url" value="<?php echo $training['image_url']; ?>"></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><input type="text" name="description" id="description" value="<?php echo $training['description']; ?>"></td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="Update">
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
