<?php
include '../controller/forumC.php';


$id=$_GET["id"];
$d = new forumC();
$forumData = $d->afficheformumcomment($id);
$forum = $forumData['forum'];
$comments = $forumData['comments'];
?>
<html lang="en">

<head>
  <title>Unipath</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='front/front_office.css' rel='stylesheet' type='text/css'>
  <link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/144467/bootstrap.min.css" rel="stylesheet">
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .forum-container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .comment-container {
            border: 1px solid #eee;
            margin-top: 10px;
            padding: 10px;
        }
    </style>
</head>

<body>

<div class="jumbotron">
    <div class="container">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
     
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

<h1 style="text-align: center;">Details for this forum</h1>  
<div class="forum-container">
  
<h2 style="text-align: center;"><?= $forum['titre'] ?></h2>
<h4 style="text-align: center;"> <?= $forum['date'] ?></h4>
    <p><?= $forum['description'] ?></p>
    <p style="text-align: center;"> <a href="ajouterCommentaireFront.php?id=<?= $_GET["id"]; ?>">commenter</a></p>
</div>

<?php if (!empty($comments)): ?>
    <h2>Comments:</h2>
    <?php foreach ($comments as $comment): ?>
        <div class="comment-container">
            <p><?= $comment['contenu'] . ":    ". $comment['date']  ?></p>
       
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No comments yet.</p>
<?php endif; ?>


</body>
</html>

