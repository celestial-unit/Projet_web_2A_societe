<?php
require '../controller/formationC.php'; 
$formationController = new formationC();
$paidFormations = $formationController->getPaidFormations();
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
        justify-content: space-around;
    }
    .card {
        margin: 0px; /* Ajustez cette valeur selon vos besoins pour rapprocher les cartes */
        border: 1px solid #ddd;
        box-sizing: border-box;
        width: 300px;
    }

    .card-picture img {
        max-width: 100%;
    }

    .card-content {
        padding: 30px;
    }
    </style>
</head>
<body>
<?php foreach ($paidFormations as $formationn) { ?>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script></body>
</html>
<?php
if (empty($paidFormations)) {
    echo "<p>No recommended formations based on criteria.</p>";
}
?>
