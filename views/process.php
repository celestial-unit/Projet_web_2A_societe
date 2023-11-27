<?php
//require '../config.php';
include '../controller/formationC.php';
// Vérifier si le formulaire a été soumis avec la méthode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérifier si les clés du tableau $_POST sont définies avant de les utiliser
    $name = isset($_POST["name"]) ? $_POST["name"] : null;
    $paiement = isset($_POST["payment"]) ? $_POST["payment"] : null;
    $type_cours = isset($_POST["type_cours"]) ? $_POST["type_cours"] : null;
    $nature_cours = isset($_POST["accelerated"]) ? $_POST["accelerated"] : null;
    $domaine = isset($_POST["domaine"]) ? $_POST["domaine"] : null;

    // Vérifier si toutes les données nécessaires sont présentes
    if ($paiement && $type_cours && $nature_cours && $domaine) {
        // Connexion à la base de données
        $db = config::getConnexion();

        // Utilisation de requête préparée pour éviter les injections SQL
        $stmt = $db->prepare("
        SELECT formation.*, typeformation.description
        FROM formation
        INNER JOIN typeformation 
        WHERE formation.domaine = :domaine 
        AND formation.ispaid = :paiement 
        AND formation.type_cours = :type_cours 
        AND formation.nature_cours = :nature_cours");
    
    $stmt->bindParam(':domaine', $domaine);
    $stmt->bindParam(':paiement', $paiement);
   // $stmt->bindParam(':name', $name);
    $stmt->bindParam(':type_cours', $type_cours);
    $stmt->bindParam(':nature_cours', $nature_cours);
    

        // Exécution de la requête
        $stmt->execute();

        // Récupération des résultats
        $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($formations) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Recommended Formations</title>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
                <link rel="stylesheet" href="./style.css">
            </head>
            <body>
                <div class="container">
                    <?php foreach ($formations as $formation) { ?>
                        <div class="kutucuk col-md-6 col-md-offset-3 col-xs-12">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6"><img src="<?= $formation['image_url'] ?>" class="img-responsive" alt="" /></div>
                                <div class="col-xs-12 col-sm-6">
                                    <h2><?= $formation['Nom'] ?></h2>
                                    <p><?= $formation['ispaid'] ?></p>
                                    <p><?= $formation['description'] ?></p>
                                    <button class="btn btn-info">view info</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </body>
            </html>
            <?php
        } else {
            echo "<p>No recommended formations based on criteria.</p>";
        }
    } else {
        echo "<p>Please fill out the form completely.</p>";
    }
}
?>
