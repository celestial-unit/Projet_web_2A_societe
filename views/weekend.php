<?php
require '../controller/formationC.php'; 
$formationController = new formationC();
$weekendclasses = $formationController->getweekendclassesFormations();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Recommended Trainings</title>
  <link rel="stylesheet" href="./perfect.css">
  <style>
        .container.flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* ou une autre valeur selon votre préférence */
        }

        .card {
            /* Ajoutez le style nécessaire pour chaque carte ici */
            margin-bottom: 20px; /* Espace entre les cartes */
        }
    </style>
</head>
<body>
<?php foreach ($weekendclasses as $formationn) { ?>
    <section class="manipulation-listing">
        <div class="container flex">
            <div class="card">
                <div class="card-picture">
                    <img class="bg" src="<?= $formationn['image_url'] ?>">
                </div>
                <div class="card-content">
                    <div class="card-text">
                        <ul>
                            <li> <p><?php echo $formationn['datedebut']; ?></p></li>
                            <li><p><?php echo $formationn['Nom']; ?></p></li>
                        </ul>
                        <p><?php echo $formationn['description']; ?></p>
                    </div>
                    <button>&nbsp;</button>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<div id="modal" class="modal-container">
    <div class="modal">
        <button id="close" class="close-btn">x</button>
        <div class="modal-content"></div>
    </div>
</div>

<!-- partial -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>
<?php
if (empty($weekendclasses)) {
    echo "<p>No recommended formations based on criteria.</p>";
}
?>

