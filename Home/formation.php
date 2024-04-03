

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/unipath1.jpg" type="">
  <title>Unipath</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- Fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
  <!-- Owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- Font Awesome style -->
  <link href="font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- Responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="../View/formation/search.css" rel="stylesheet" />
</head>
<body class="sub_page">

  <div class="hero_area">
    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>Unipath</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="formation.php">Training <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="why.php">Why Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="team.php">Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
              </li>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </ul>
          </div>
        </nav>
      </div>
    </header>
  </div>
  



<div class='search-container' tabindex='1'>
        <input id="searchInput" placeholder='Rechercher' type='text'>
        <a class='button' id="searchButton">
            <i class='fa fa-search'></i>
        </a>
    </div>
    

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
            fetch('../View/formation/search.php')
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
        fetch('../View/formation/search.php')
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
        fetch(`../View/formation/search.php?Nom=${searchTerm}`)
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

    // Check if messageContainer exists
    if (!messageContainer) {
        console.error('Error: messageContainer does not exist.');
        return;
    }

    container.innerHTML = ''; // Clear the current content

    if (data.length > 0) {
        // Message indicating the number of found trainings
        var message = 'We found ' + data.length + ' training(s) for you';
        messageContainer.innerHTML = '<p>' + message + '</p>';

        data.forEach(card => {
            // Build the HTML for each card
            var cardHtml = '<div class="card">';
            cardHtml += '<div class="card-details">';
            cardHtml += '<p class="text-title">' + card['Nom'] + '</p>';
            cardHtml += '<p class="text-body">' + card['datedebut'] + '</p>';
            cardHtml += '</div>';
            cardHtml += '<a href="../View/formation/formationdetails.php?id=' + card['id_formation'] + '" class="card-button">More info</a>';
            cardHtml += '</div>';

            // Add the card to the container
            container.innerHTML += cardHtml;
        });
    } else {
        // No training found
        container.innerHTML = '<p>No training found.</p>';
        // Clear the message if there is no training
        messageContainer.innerHTML = '';
    }
}
    </script>

<section class="info_section layout_padding2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 info_col">
                <!-- Info contact details -->
                <div class="info_contact">
                    <h4>
                        Address
                    </h4>
                    <div class="contact_link_box">
                        <!-- Address, Phone, Email -->
                        <a href="#">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Tunisia
                            </span>
                        </a>
                        <a href="#">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call +216 50270587
                            </span>
                        </a>
                        <a href="#">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                Unipath@gmail.com
                            </span>
                        </a>
                    </div>
                </div>
                <!-- Social media links -->
                <div class="info_social">
                    <a href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 mx-auto info_col">
                <!-- Quick links -->
                <div class="info_link_box">
                    <h4>
                        Links
                    </h4>
                    <div class="info_links">
                        <a class="active" href="index.php">
                            Home
                        </a>
                        <a class="" href="about.html">
                            About
                        </a>
                        <a class="" href="service.html">
                            Services
                        </a>
                        <a class="" href="why.html">
                            Why Us
                        </a>
                        <a class="" href="team.php">
                            Team
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 info_col">
                <!-- Subscription form -->
                <h4>
                    Subscribe
                </h4>
                <form action="#">
                    <input type="text" placeholder="Enter email" />
                    <button type="submit">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

      </div>
    </div>
  </section>
</body>
</html>