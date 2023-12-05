<?php
require '../config.php';
$db=config::getConnexion();
$id_formation = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Utilisez une requête pour sélectionner la formation en fonction de l'ID actuel
$sql = "SELECT formation.*, typeformation.description, typeformation.domaine
        FROM formation
        LEFT JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.id_formation = $id_formation";

$result = $db->query($sql);

if (!$result) {
    die("Erreur dans la requête : " . $db->errorInfo());
}

$currentData = $result->fetch(PDO::FETCH_ASSOC);

// Afficher le HTML des détails de la formation
echo '<div class="slide" data-id="' . $currentData['id_formation'] . '">
        <div class="values-slider">
            <div class="values-column">
                <div class="spacer-xxxs desktop-hidden"></div>
                <h6>' . $currentData['Nom'] . '</h6>
                <h2>' . $currentData['description'] . '</h2>
                <div class="spacer-xxxs"></div>
            </div>
            <div class="values-column-image">
                <img src="' . $currentData['image_url'] . '" loading="lazy" alt="" class="values-image">
            </div>
        </div>
    </div>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" href="./details.css">
</head>
<body>
    <div class="container">
        <div id="slider-2" class="slider">
            <div class="slider-wrapper" id="sliderWrapper">
                <!-- Les diapositives seront chargées ici -->
            </div>
        </div>
        <button class="slider-button--prev" onclick="changeSlide(-1)">
            <i class="material-icons">chevron_left</i>
        </button>
        <button class="slider-button--next" onclick="getNextFormation()">
    <i class="material-icons">chevron_right</i>
</button>
    </div>

    <script>
    let currentSlide = 0;
    let data = <?php echo json_encode($result->fetch(PDO::FETCH_ASSOC)); ?>;

    function changeSlide(direction) {
        currentSlide += direction;

        if (currentSlide < 0) {
            currentSlide = data.length - 1;
        } else if (currentSlide >= data.length) {
            currentSlide = 0;
        }

        if (data[currentSlide]) {
            const currentData = data[currentSlide];

            const sliderWrapper = document.getElementById('sliderWrapper');
            sliderWrapper.innerHTML = `
                <div class="slide" data-id="${currentData.id_formation}">
                    <div class="values-slider">
                        <div class="values-column">
                            <div class="spacer-xxxs desktop-hidden"></div>
                            <h6>${currentData.Nom}</h6>
                            <h2>${currentData.description}</h2>
                            <div class="spacer-xxxs"></div>
                        </div>
                        <div class="values-column-image">
                            <img src="${currentData.image_url}" loading="lazy" alt="" class="values-image">
                        </div>
                    </div>
                </div>
            `;
        } else {
            console.error("Données non disponibles pour la diapositive actuelle.");
        }
    }

    function getNextFormation() {
    if (data[currentSlide]) {
        const currentId = data[currentSlide].id_formation;

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                const newFormation = JSON.parse(this.responseText);
                if (newFormation && newFormation.id_formation) {
                    data[currentSlide] = newFormation;
                    changeSlide(0);
                } else {
                    console.error("Données non disponibles pour la formation suivante.");
                }
            }
        };

        // Utiliser l'ID actuel pour obtenir la formation suivante du côté serveur
        xhr.open("GET", "votre_script_php.php?id=" + currentId, true);
        xhr.send();
    } else {
        console.error("Indice de diapositive non valide : ", currentSlide);
    }
}


</script>
</body>
</html>
