<?php
include '../controller/forumC.php';


$d = new forumC();
$tab = $d->afficher();

?>


<html lang="en">

<head>
  <title>Unipath</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='front/front_office.css' rel='stylesheet' type='text/css'>
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

      <div class="row text-center">
        <h1> Hello! We are <span>Unipath</span></h1>
        <h3>we help students &amp; recruters to find<span>great opportunities
          </span></h3>
        <a class="btn btn-primary btn-lg" href="../signIn/signIn.html">Get a free account</a>
      </div>
    </div>
  </div><!-- end jumbotron -->

  <div class="services">
    <div class="container">
      <div class="row">
        <h1> This is a list of <span>Forums</span></h1>
        
            <?php foreach ($tab as $foru) { ?>
              <?php if ($foru['etat'] !== "En Attente"): ?>
    <div class="services-web text-center">
        <div style="width:100%;border:#f39c12 3px solid;margin-top:1%;padding-bottom:2%">
            <span class="icon-sprite sprite-web">&nbsp;</span>
           <div class="row">
            <h2 class="text"><?= $foru['titre'] ?></h2> 
            <h4> <?= $foru['date'] ?></h4>
            </div>

            <?php
            
                $truncatedDescription = substr($foru['description'], 0, 4);

           
                if (strlen($foru['description']) > 4):
            ?>
                <p><?= $truncatedDescription ?>... <a href="detailleforumfront.php?id=<?= $foru['id']; ?>">Voir plus</a></p>
            <?php else: ?>
                <p><?= $foru['description'] ?></p>
            <?php endif; ?>

           
        </div>
    </div><!-- end services web-->
<?php endif; ?>

            <?php } ?>
      </div>
    </div>
  </div>
  <!-- end services -->

  <div class="latest-work">
    <div class="heading text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>Highlights</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- end heading -->

    <div class="gallery clearfix">
      <div class="gallery-inner">
        <img src="https://images.pexels.com/photos/4491461/pexels-photo-4491461.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="thumbnail" class="img-responsive" />
        <div class="caption">
          <div class="caption-heading visible-lg">
            <h4>Title</h4>
            <small>Oct 22, 2013</small>
          </div>
          <div class="btn-group btn-trigger">
            <a href="#" class="btn btn-default web-link">Link</a>
            <a href="#" class="btn btn-default more-info">More</a>
          </div>
        </div><!-- end caption -->
      </div><!-- end gallery-inner -->
      <div class="gallery-inner">
        <img src="https://media.istockphoto.com/id/1446806057/photo/young-happy-woman-student-using-laptop-watching-webinar-writing-at-home.jpg?s=1024x1024&w=is&k=20&c=ICSLSiYaIZ-Cvk9MF3iF2JmrVRmE6br6dYjCEtyjLYs=" alt="thumbnail" class="img-responsive" />
        <div class="caption">
          <div class="caption-heading visible-lg">
            <h4>Title</h4>
            <small>Oct 22, 2013</small>
          </div>
          <div class="btn-group btn-trigger">
            <a href="#" class="btn btn-default web-link">Link</a>
            <a href="#" class="btn btn-default more-info">More</a>
          </div>
        </div><!-- end caption -->
      </div><!-- end gallery-inner -->
      <div class="gallery-inner">
        <img src="https://images.pexels.com/photos/920382/pexels-photo-920382.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="thumbnail" class="img-responsive" />
        <div class="caption">
          <div class="caption-heading visible-lg">
            <h4>Title</h4>
            <small>Oct 22, 2013</small>
          </div>
          <div class="btn-group btn-trigger">
            <a href="#" class="btn btn-default web-link">Link</a>
            <a href="#" class="btn btn-default more-info">More</a>
          </div>
        </div><!-- end caption -->
      </div><!-- end gallery-inner -->
      <div class="gallery-inner">
        <img src="https://images.pexels.com/photos/4144923/pexels-photo-4144923.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="thumbnail" class="img-responsive" />
        <div class="caption">
          <div class="caption-heading visible-lg">
            <h4>Title</h4>
            <small>Oct 22, 2013</small>
          </div>
          <div class="btn-group btn-trigger">
            <a href="#" class="btn btn-default web-link">Link</a>
            <a href="#" class="btn btn-default more-info">More</a>
          </div>
        </div><!-- end caption -->
      </div><!-- end gallery-inner -->

      <div class="gallery-inner">
        <img src="https://images.pexels.com/photos/6893933/pexels-photo-6893933.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="thumbnail" class="img-responsive" />
        <div class="caption">
          <div class="caption-heading visible-lg">
            <h4>Title</h4>
            <small>Oct 22, 2013</small>
          </div>
          <div class="btn-group btn-trigger">
            <a href="#" class="btn btn-default web-link">Link</a>
            <a href="#" class="btn btn-default more-info">More</a>
          </div>
        </div><!-- end caption -->
      </div><!-- end gallery-inner -->

      <div class="gallery-inner">
        <img src="https://images.pexels.com/photos/3277806/pexels-photo-3277806.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="thumbnail" class="img-responsive" />
        <div class="caption">
          <div class="caption-heading visible-lg">
            <h4>Title</h4>
            <small>Oct 22, 2013</small>
          </div>
          <div class="btn-group btn-trigger">
            <a href="#" class="btn btn-default web-link">Link</a>
            <a href="#" class="btn btn-default more-info">More</a>
          </div>
        </div><!-- end caption -->
      </div><!-- end gallery-inner -->

      <div class="gallery-inner">
        <img src="https://images.pexels.com/photos/3197390/pexels-photo-3197390.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="thumbnail" class="img-responsive" />
        <div class="caption">
          <div class="caption-heading visible-lg">
            <h4>Title</h4>
            <small>Oct 22, 2013</small>
          </div>
          <div class="btn-group btn-trigger">
            <a href="#" class="btn btn-default web-link">Link</a>
            <a href="#" class="btn btn-default more-info">More</a>
          </div>
        </div><!-- end caption -->
      </div><!-- end gallery-inner -->

      <div class="gallery-inner">
        <img src="https://images.pexels.com/photos/7567557/pexels-photo-7567557.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="thumbnail" class="img-responsive" />
        <div class="caption">
          <div class="caption-heading visible-lg">
            <h4>Title</h4>
            <small>Oct 22, 2013</small>
          </div>
          <div class="btn-group btn-trigger">
            <a href="#" class="btn btn-default web-link">Link</a>
            <a href="#" class="btn btn-default more-info">More</a>
          </div>
        </div><!-- end caption -->
      </div><!-- end gallery-inner -->
    </div><!-- end gallery -->
  </div>
  <!-- end latest-work -->

  

  <div class="testimonials">
    <div class="heading">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center">
            <h1>Testimonials</h1>
          </div>
        </div>
      </div>
    </div><!-- end heading -->

    <div class="container">
      <div class="row">

        <div id="carousel-testimonials" class="carousel slide">
          

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active text-center">
              <div class="row">
                <blockquote>
                  <p>We were surprised by the level of involvement and weight we had during the project. Together ideas were discussed, drafts presented and concepts examined so we, the client, could be satisfied and content with the final product.</p>
                  <cite class="hidden-lg">Redbull</cite>
                </blockquote>
              </div>
            </div>
            <!--end item -->

            <div class="item text-center">
              <div class="row">
                <blockquote>
                  <p>We were surprised by the level of involvement and weight we had during the project. Together ideas were discussed, drafts presented and concepts examined so we, the client, could be satisfied and content with the final product.</p>
                  <cite class="hidden-lg">Coca Cola</cite>
                </blockquote>
              </div>
            </div>
            <!--end item -->

            <div class="item text-center">
              <div class="row">
                <blockquote>
                  <p>We were surprised by the level of involvement and weight we had during the project. Together ideas were discussed, drafts presented and concepts examined so we, the client, could be satisfied and content with the final product.</p>
                  <cite class="hidden-lg">1st Web Designer</cite>
                </blockquote>
              </div>
            </div>
            <!--end item -->

            <div class="item text-center">
              <div class="row">
                <blockquote>
                  <p>We were surprised by the level of involvement and weight we had during the project. Together ideas were discussed, drafts presented and concepts examined so we, the client, could be satisfied and content with the final product.</p>
                  <cite class="hidden-lg">Redbull</cite>
                </blockquote>
              </div>
            </div>
            <!--end item -->

            <div class="item text-center">
              <div class="row">
                <blockquote>
                  <p>We were surprised by the level of involvement and weight we had during the project. Together ideas were discussed, drafts presented and concepts examined so we, the client, could be satisfied and content with the final product.</p>
                  <cite class="hidden-lg">Coca Cola</cite>
                </blockquote>
              </div>
            </div>
            <!--end item -->

          </div>
          <!--end carousel-inner -->

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-testimonials" data-slide="prev">
            Prev
          </a>
          <a class="right carousel-control" href="#carousel-testimonials" data-slide="next">
            Next
          </a>
        </div>
        <!--end carousel -->

      </div>
    </div>
  </div>
  <!-- end testimonials-->

  <div class="call-to-action text-center">
    <div class="container">
      <div class="row">
        <h2>Do you like what you see? <a href="#">Contact Us</a></h2>
      </div>
    </div>
  </div>
  <!-- end call-to-action-->

  <div class="contact-info">
    <div class="container">
      <div class="row">

        

        <div class="col-md-4">
          <div class="email text-center">
            <span class="icon-sprite sprite-mail">&nbsp;</span>
            <h6>Email</h6>
            <p>website@unipath.com</p>
          </div>
        </div><!-- end email-->

        <div class="col-md-4">
          <div class="location text-center">
            <span class="icon-sprite sprite-phone">&nbsp;</span>
            <h6>Phone</h6>
            <p>(012) 345 6789</p>
          </div>
        </div><!-- end phone-->

      </div>
    </div>
  </div>
  <!-- end contact-info-->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="copyright text-center">
            <small>&copy; 2013 Unipath. All Rights Reserved</small>
          </div>
        </div>
        <div class="col-md-6">
          <div class="social-icons text-center">
            <a href="#"><span class="icon-sprite sprite-ig">&nbsp;</span></a>
            <a href="#"><span class="icon-sprite sprite-fb">&nbsp;</span></a>
            <a href="#"><span class="icon-sprite sprite-dc">&nbsp;</span></a>
            <a href="#"><span class="icon-sprite sprite-gp">&nbsp;</span></a>
            <a href="#"><span class="icon-sprite sprite-db">&nbsp;</span></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end footer-->
  
                
  <script src="./forum.js"></script>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/144467/bootstrap.min.js"></script>

</body>

</html>
