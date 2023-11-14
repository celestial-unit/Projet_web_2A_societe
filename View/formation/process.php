<?php
//require '../config.php';
include '../controller/formationC.php';
$formation = new formation(
    null, 
    $_POST["name"], 
    $_POST["payment"],
    $_POST["domain"],
    null, 
    null ,
    null
);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $domaine = $_POST["domain"];
        $paiement = $_POST["payment"];

    if ($name && $domaine && $paiement) { 
      //  $db = new PDO("mysql:host=localhost;dbname=uni_path", "root", "");
        $db = config::getConnexion();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("SELECT * FROM formation WHERE domaine = :domaine AND paiement = :paiement");
        $stmt->bindParam(':domaine', $domaine);
        $stmt->bindParam(':paiement', $paiement);
        $stmt->execute();

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
                                    <p><?= $formation['paiement'] ?></p>
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
