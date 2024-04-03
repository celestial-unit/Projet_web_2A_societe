<?php
include '../../Controller/reclamation.php';
include '../../Model/Reclamation.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$error = "";

$rec = null;

$reclamationC = new Rec(config::getConnexion());
$type = $reclamationC->getTypes();



if (isset($_POST["g-recaptcha-response"]) && !empty($_POST["g-recaptcha-response"])) {
  $recaptchaResponse = $_POST["g-recaptcha-response"];
  $secretKey = "6LcQIyApAAAAAJQ23TlkkICMJAhUsJxRIfJJU64G"; // Replace with your actual reCAPTCHA secret key

  $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify";
  $recaptchaData = [
      'secret' => $secretKey,
      'response' => $recaptchaResponse,
  ];

  $recaptchaOptions = [
      'http' => [
          'method' => 'POST',
          'header' => 'Content-type: application/x-www-form-urlencoded',
          'content' => http_build_query($recaptchaData),
      ],
  ];

  $recaptchaContext = stream_context_create($recaptchaOptions);
  $recaptchaResult = json_decode(file_get_contents($recaptchaUrl, false, $recaptchaContext));

  if (!$recaptchaResult->success) {
      $error = "reCAPTCHA verification failed";
  } else {
      // Proceed with the rest of your form processing
      // ...
  }
}
?>

<!DOCTYPE html>
<html lang="en">
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
  <link rel="shortcut icon" href="home/images/favicon.png" type="">

  <title> unipath </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../../Home/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="../../Home/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../../Home/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../../Home/css/responsive.css" rel="stylesheet" />

</head>



  <meta charset="UTF-8">
  <title>Reclamation</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
   

   .reclamation-container {
  max-width: 600px;
  margin: 50px auto;
  background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
}

.reclamation-container h1 {
  color: #343a40; /* Dark color for the heading */
  text-align: center;
}

.reclamation-container form {
  display: flex;
  flex-direction: column;
}

.reclamation-container .form-group {
  margin-bottom: 16px;
}

.reclamation-container .form-group label {
  margin-bottom: 8px;
  color: #343a40; /* Dark color for labels */
  display: flex;
  align-items: center;
}

.reclamation-container .form-group label i {
  margin-right: 8px;
}

.reclamation-container input,
.reclamation-container select,
.reclamation-container textarea {
  padding: 10px;
  margin-bottom: 16px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 16px;
  background-color: #fff; /* White background for input fields */
}

.reclamation-container button {
  background-color: #765341; /* Green color for the button */
  color: #fff;
  padding: 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

.reclamation-container button:hover {
  background-color: #3d251e; /* Darker green on hover */
}

#goback {
  background-color: #765341;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  position: absolute;
  top: 750px;
  left: 300px;
}

    
  </style>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     
</head>
<body>
<div class="reclamation-container" id="rec">
  <h1>Formulaire de réclamation</h1>
  <form action="add_rec.php" method="post">
    <div class="form-group">
      <label for="sujet">Titre</label>
      
      <textarea id="sujet" name="titre" placeholder="Enter your title here"></textarea>
    </div>

    <div class="form-group">
      <label for="type_reclamation"><i class="fas fa-tag"></i> Type de réclamation</label>
      <select id="type_reclamation" name="type_reclamation">
        <?php
          if (empty($type)) {
            echo "<option>No types found.</option>";
          } else {
            foreach ($type as $tyyype) {
              echo "<option value='" . $tyyype['id_type'] . "'>" . $tyyype['nom_type'] . "</option>";
            }
          }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="subject"><i class="fas fa-comment"></i> Message</label>
      <textarea id="subject" name="description" placeholder="Votre message" style="height:200px"></textarea>
    </div>

    <div class="form-group">
      <div class="g-recaptcha" data-sitekey="6LdE9CYpAAAAAMWnnLOgIFSK6tP9fDQug9qoIESh"></div>
    </div>

    <button id="btn" value="send">Send</button>
  </form>
</div>
<button id="goback" value="go back">Go back</button>
</body>

  <!-- Add Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
</body>


<script src="https://smtpjs.com/v3/smtp.js"></script>


<script>
  document.getElementById("goback").addEventListener("click", function() {
  window.location.href = "../SignIn/compte_etudiant.php";
});
  var btn = document.getElementById('btn');
  

btn.addEventListener('click', function(e) {
    e.preventDefault();
    var titre = document.getElementById('sujet').value;
    var subject = document.getElementById('subject').value;
    var email = 'chouaia.mohamedaziz@esprit.tn';
    var body = 'Name: ' + titre + '<br/> Email: ' +'chouaia.mohamedaziz@esprit.tn' + '<br/> Subject: ' + subject;

    Email.send({
        Host: "smtp.elasticemail.com",
        Username: "chouaia.mohamedaziz@esprit.tn",
        Password: "053F230DA3CD7EAE31D3F342B98D73035615", // Replace with your Elastic Email API key
        To: 'medazizchouaia786@gmail.com',
        From: 'chouaia.mohamedaziz@esprit.tn',
        Subject: name,
        Body: body,
        SecureToken: "true",
        Port: 2525
    }).then(
        function(response) {
            // Check if the email was sent successfully
            if (response === 'OK') {
                // If successful, proceed to store data in the database
                storeDataInDatabase();
            } else {
                // Handle the case where the email sending failed
                alert('Email sending failed. Please try again.');
            }
        }
    );
});

function storeDataInDatabase(titre, type_reclamation, etat, subject) {
  var titre = document.getElementById('sujet').value;
    var type_r = document.getElementById('type_reclamation').value;
    var etat ='en cours de traitement';
    var subject = document.getElementById('subject').value;
  $(document).ready(function() 
  {
    $("#rec").load("recBase.php",{
            titre: titre,
            type_reclamation : type_r,
            etat: etat,
            subject : subject
          })
  })
  window.location.href = "affiche.php";
   
    
}

</script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>


</html>
