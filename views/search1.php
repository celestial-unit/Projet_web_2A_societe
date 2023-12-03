<?php
header("Access-Control-Allow-Origin: *"); // Permettre toutes les origines (CORS)

// Connexion à la base de données (à remplacer avec vos informations)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération du terme de recherche depuis l'URL
$searchTerm = isset($_GET['term']) ? $_GET['term'] : '';

// Requête pour rechercher les formations dans la base de données
$sql = "SELECT * FROM formation WHERE Nom LIKE '%$searchTerm%'";
$result = $conn->query($sql);

$rows = array(); // Variable pour stocker le HTML des cartes

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

//echo json_encode($rows);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Barre de recherche CSS</title>
    <link href='https://fonts.googleapis.com/css?family=Scada:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
    <link rel="stylesheet" href="./search.css">

</head>
<body>
<div class='search-container' tabindex='1'>
        <input id="searchInput" placeholder='Rechercher' type='text'>
        <a class='button' id="searchButton">
            <i class='fa fa-search'></i>
        </a>
    </div>
    <div class="jumbotron">
    <div class="container">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Unipath</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="emna.php">Training</a></li>
              <li><a href="#">Intership</a></li>
              <li><a href="../signIn/signIn.html">Account</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

        <div id="messageContainer"></div>
        <!-- Ajout de la div pour contenir les cartes -->
        <div id="cardsContainer" class='container' tabindex='1'>
            <!-- Le contenu des cartes sera affiché ici -->
        </div>
    </div>

    <!-- Liens de secours pour Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Charger toutes les formations initialement
            fetch('search.php')
                .then(response => response.json())
                .then(data => {
                    displayResults(data);
                })
                .catch(error => console.error('Erreur :', error));

            document.getElementById("searchButton").addEventListener("click", function () {
                search();
            });

            // Ajout d'un événement pour détecter les changements instantanés dans la barre de recherche
            document.getElementById("searchInput").addEventListener("input", function () {
                search();
            });
        });

        function search() {
    var searchTerm = document.getElementById('searchInput').value;

    if (searchTerm === '') {
        // Si la barre de recherche est vide, afficher toutes les formations
        fetch('search.php')
            .then(response => response.json())
            .then(data => {
                displayResults(data);
            })
            .catch(error => {
                console.error('Erreur :', error);
                // Ajoutez ici le code pour gérer l'erreur, par exemple, afficher un message d'erreur à l'utilisateur
            });
    } else {
        // Sinon, effectuer une recherche basée sur le terme
        fetch(`search.php?Nom=${searchTerm}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Aucune formation trouvée.');
                }
                return response.json();
            })
            .then(data => {
                displayResults(data);
            })
            .catch(error => {
                console.error('Erreur :', error);
                // Ajoutez ici le code pour gérer l'erreur, par exemple, afficher un message d'erreur à l'utilisateur
            });
    }
}


function displayResults(data) {
    var container = document.getElementById('cardsContainer');
    var messageContainer = document.getElementById('messageContainer');

    // Vérifier si messageContainer existe
    if (!messageContainer) {
        console.error('Erreur : messageContainer n\'existe pas.');
        return;
    }

    container.innerHTML = ''; // Effacer le contenu actuel

    if (data.length > 0) {
        // Message indiquant le nombre de formations trouvées
        var message = 'We found ' + data.length + ' training(s) for you';
        messageContainer.innerHTML = '<p style="position: absolute; top: 0; left: 0;">' + message + '</p>';

        data.forEach(card => {
            // Construire le HTML de chaque carte
            var cardHtml = '<div class="card">';
            cardHtml += '<div class="card-details">';
            cardHtml += '<p class="text-title">' + card['Nom'] + '</p>';
            cardHtml += '<p class="text-body">' + card['nbheures'] + '</p>';
            cardHtml += '<p class="text-body">' + card['datedebut'] + '</p>';
            cardHtml += '</div>';
            cardHtml += '<a href="details.php?id=' + card['id_formation'] + '" class="card-button">More info</a>';
            cardHtml += '</div>';

            // Ajouter la carte au conteneur
            container.innerHTML += cardHtml;
        });
    } else {
        // Aucune formation trouvée
        container.innerHTML = '<p>Aucune formation trouvée.</p>';
        messageContainer.innerHTML = ''; // Effacer le message s'il n'y a aucune formation
    }
}


    </script>
</body>
</html>