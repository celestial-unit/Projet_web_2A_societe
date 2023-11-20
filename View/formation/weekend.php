<?php
require '../controller/formationC.php'; 
$formationController = new formationC();
$weekendclasses = $formationController->getweekendclassesFormations();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recommended Formations</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./amoun.css">
</head>
<body>
    <div class="container">
        <div class="kutucuk col-md-6 col-md-offset-3 col-xs-12">
            <?php foreach ($weekendclasses as $formationn) { ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <img src="<?= $formationn['image_url'] ?>" class="img-responsive" alt="" />
                    </div>
                    <div class="col-xs-12 col-sm-6">
                    <p><?php echo $formationn['Nom']; ?></p>
                        <p><?php echo $formationn['nbheures']; ?></p>
                        <p><?php echo $formationn['domaine']; ?></p>
                        <p><?php echo $formationn['description']; ?></p>
                        <p><?php echo $formationn['datedebut']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>

<?php
if (empty($weekendclasses)) {
    echo "<p>No recommended formations based on criteria.</p>";
}
?>
