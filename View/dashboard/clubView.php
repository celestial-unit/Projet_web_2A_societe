<?php
include('../../Model/clubConnect.php');

function showByMail($clubMail) {
    $pdo = Config::getConnexion();
    $query = "SELECT club.*, location.country, location.city, location.university 
              FROM club 
              INNER JOIN location ON club.clubMail = location.clubMail
              WHERE club.clubMail = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$clubMail]);
    $club = $stmt->fetch(PDO::FETCH_ASSOC);

    return $club;
}

$clubMail = isset($_GET['clubMail']) ? $_GET['clubMail'] : '';
$club = showByMail($clubMail);

if ($club) {
    $clubName = $club['name'];
    $clubCountry = $club['country'];
    $clubCity = $club['city'];
    $clubUniversity = $club['university'];
} else {
    // Club not found
    header("Location: /path/to/club_not_found_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Club View</title>
  <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
  <link rel="stylesheet" href="./clubView.css">
</head>
<body>
<nav class="flex-nav">
  <div class="container">
    <div class="grid menu">
      <div class="column-xs-8 column-md-6">
        <p id="highlight">Unipath</p>
      </div>
      <div class="column-xs-4 column-md-6">
        <a href="#" class="toggle-nav">Menu <i class="ion-navicon-round"></i></a>
        <ul>
          <li class="nav-item"><a href="clubDashboard.php">Clubs</a></li>
          <li class="nav-item"><a href="#">About</a></li>
          <li class="nav-item"><a href="dashboard.php">My Account</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<main>
  <div class="container">
    <div class="grid second-nav">
      <div class="column-xs-12">
        <nav>
          <ol class="breadcrumb-list">
          </ol>
        </nav>
      </div>
    </div>
    <div class="grid product">
      <div class="column-xs-12 column-md-7">
        <div class="product-gallery">
          <div class="product-image">
            <img class="active" src="<?php echo $club['clubImage']; ?>" alt="Club Image"width="100%" height="100%">
          </div>
        </div>
      </div>
      <div class="column-xs-12 column-md-5">
        <h1><?php echo $club['name']; ?></h1>
        <div class="description">
          <p>Club description: <?php echo $club['description']; ?></p>
          <p>Club field: <?php echo $club['field']; ?></p>
          <p>Club Email: <?php echo $club['clubMail']; ?></p>
         
        <a href="<?php echo $club['links']; ?>" class="add-to-cart">Go to our page</a>
        
      </div>
    </div>
  </div>
</main>
<div>
<iframe width="50%" height="200" src="https://maps.google.com/maps?q=<?php echo $club['country'] . ' ' . $club['city'] . ' ' . $club['university'] . ' ' . $club['street'] . ' ' . $club['postal']; ?>&output=embed"></iframe>

</div>

<!-- partial -->
<script  src="./clubView.js"></script>
</body>
</html>
