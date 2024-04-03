<?php
include "../Controller/stage.php";

$c = new sta();
$tab = $c->liststage();
$c = new sta();
$totalStages = $c->countStages();

    echo "Total Stages: " . $totalStages;

$itemsPerPage = 4;
$totalItems = $c->countStages(); 
$totalPages = ceil($totalItems / $itemsPerPage);
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;
$tab = $c->liststage();

?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/unipath1.jpg" type="">

  <title> Unipath </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              Unipath
            </span>
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
                <a class="nav-link" href="about.html"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="service.html">Services</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="internship.php">Internship <span class="sr-only">(current)</span> </a>
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
    <!-- end header section -->
  </div>

  <!-- why section -->

  <header>
    <h1>Les offres de stage</h1>
    <div>
        <label for="search">Search: </label>
        <input type="text" id="search" oninput="searchTable()" placeholder="Enter search term">
    </div>
</header>

<?php
foreach ($tab as $s) {
?>
    <div class="row-container" onclick="showModal('<?= $s['Domaine']; ?>', '<?= $s['email']; ?>', '<?= $s['date_d']; ?>', '<?= $s['date_f']; ?>', '<?= $s['capacite']; ?>', '<?= $s['nom_societe']; ?>', '<?= $s['description']; ?>', '<?= $s['type_stage']; ?>')">
        <div><strong>Domain:</strong> <?= $s['Domaine']; ?></div>
        <div><strong>Description:</strong> <?= $s['description']; ?></div>
        <div><strong>typestage:</strong> <?= $s['type_stage']; ?></div>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://localhost:8080'); ?>" target="_blank">
                       Partagez
        </a>
    
    </div>
    <div style="margin-top: 10px;">

</div>

<?php
}
?>

<div id="myModal" class="modal">
    <div class="modal-content">
    <span class="close-btn" onclick="hideModal()">&times;</span>
        <div><strong>Domain:</strong> <span id="modalDomain"></span></div>
        <div><strong>Email:</strong> <span id="modalEmail"></span></div>
        <div><strong>Start Date:</strong> <span id="modalStartDate"></span></div>
        <div><strong>End Date:</strong> <span id="modalEndDate"></span></div>
        <div><strong>Number of Demands:</strong> <span id="modalDemands"></span></div>
        <div><strong>Company Name:</strong> <span id="modalCompanyName"></span></div>
        <div><strong>Description:</strong> <span id="modalDescription"></span></div>
        <div><strong>Type de Stage:</strong> <span id="modalType"></span></div>
    </div>
</div>

<div style="text-align: center; margin-top: 20px;">
    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
        <a href="?page=<?= $i ?>" style="margin-right: 5px;"><?= $i ?></a>
    <?php endfor; ?>
</div>


<footer>
    &copy; 2023 unipath
</footer>

<script>
    function searchTable() {
        var input = document.getElementById('search');
        var filter = input.value.toUpperCase();
        var rows = document.getElementsByClassName('row-container');

        for (var i = 0; i < rows.length; i++) {
            var rowText = rows[i].innerText || rows[i].textContent;

            rows[i].style.display = rowText.toUpperCase().indexOf(filter) > -1 ? '' : 'none';
        }
    }

    function showModal(domain, email, startDate, endDate, demands, companyName, description, type) {
        document.getElementById('modalDomain').innerText = domain;
        document.getElementById('modalEmail').innerText = email;
        document.getElementById('modalStartDate').innerText = startDate;
        document.getElementById('modalEndDate').innerText = endDate;
        document.getElementById('modalDemands').innerText = demands;
        document.getElementById('modalCompanyName').innerText = companyName;
        document.getElementById('modalDescription').innerText = description;
        document.getElementById('modalType').innerText = type;

        document.getElementById('myModal').style.display = 'flex';
    }
    function hideModal() {
        document.getElementById('myModal').style.display = 'none';
    }
</script>


  <!-- end why section -->

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
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
              <a class="" href="internship.html">
                Why Us
              </a>
              <a class="" href="team.php">
                Team
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col ">
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

  <!-- end info section -->

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </section>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>