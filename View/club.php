<?php
include("../Model/clubConnect.php");
?>
<html lang="en">

<head>
  <title>Unipath</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='club.css' rel='stylesheet' type='text/css'>
  <link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/144467/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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
              <li><a href="#">Training</a></li>
              <li><a href="#">Intership</a></li>
              <li><a href="../signIn/signIn.html">Account</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    </div>
  </div><!-- end jumbotron -->
  <section class="gallery">
        <div class="container">
            <div class="toolbar">
            <div class="search-wrapper">
                <input type="search" placeholder="Search for photos">
                <div class="counter">
                Total photos: <span>12</span></div>
            </div>
            <ul class="view-options">
                <li class="zoom">
                <input type="range" min="180" max="380" value="280">
                </li>
                <li class="show-grid active">
                <button disabled>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/grid-view.svg" alt="grid view">  
                </button>
                </li>
                <li class="show-list">
                <button>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/list-view.svg" alt="list view">  
                </button>
                </li>
            </ul>
            </div>
            <ol class="image-list grid-view">
            <?php
              $club = new club();
              $club->showClub();
            ?>
            </ol>
        </div>
    </section>

<script  src="./club.js"></script>
</body>
