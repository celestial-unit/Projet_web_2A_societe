
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Training Form</title>
  <link rel="stylesheet" href="putstage.css">
</head>
<body>
<div class="container">
  <header class="header">
    <h1 id="title" class="text-center">Training Form</h1>
    <p id="description" class="description text-center">
      Help us improve the content of our training programs
    </p>
  </header> 
  <form  action="./putstage.php"  method="post"    id="Multiplex">
    <div class="form-group">
        <label for="tranche-age">Tranche d'âge</label>

        <select id="tranche-age" name="trancheage" class="form-control" >
            <option disabled selected value>Choose your age group</option>
            <option value="18-25">18 to 25</option>
            <option value="25-30">25 to 30</option>
        </select>
    </div>
    <div class="form-group">
      <label for="entreprise">Entreprise Name</label>
      <input type="text" name="entreprise" id="entreprise" class="form-control" placeholder="Enter the name of the enterprise">
    </div>
    <div class="form-group">
      <label for="domaine">Domaine</label>
      <select id="domaine" name="domaine" class="form-control" >
        <option disabled selected value>Choose your domain</option>
        <option value="Security">Security</option>
        <option value="AI">AI</option>
        <option value="Reseau">Reseau</option>
        <option value="Gaming">Gaming</option>
      </select>
    </div>
    <div class="form-group">
      <label for="post">Post Looking For</label>
      <select id="post" name="post" class="form-control" >
        <option disabled selected value>Choose the post</option>
        <option value="Security">Security</option>
        <option value="IA">IA</option>
        <option value="Reseau">Reseau</option>
        <option value="Gaming">Gaming</option>
        <option value="Installation">Installation</option>
        <option value="Development">Development</option>
      </select>
    </div>
    <div class="form-group">
      <label for="duree">Stage Duration</label>
      <input
        type="text"
        name="duree"
        id="duree"
        class="form-control"
        placeholder="Enter the stage duration"
        required
      >
    </div>
    <div class="form-group">
      <label for="type-formation">Type of Training</label>
      <select id="type-formation" name="type-formation" class="form-control" required>
        <option disabled selected value>Choose the type of training</option>
        <option value="Payant">Payant</option>
        <option value="Non-payant">Non-payant</option>
      </select>
    </div>
    <div class="form-group">
      <!--<button type="submit" id="Envoyer" class="submit-button">Submit</button-->
      <input type="submit" value="giug">
    </div>
  </form>
</div>
<script src="./putstage.js"></script>
</body>
</html>

<?php
require "./config.php";


$T_age = $_POST['trancheage'];
$nom_entrep = $_POST["entreprise"];
$Domaine = $_POST["domaine"];
$Post = $_POST["post"];
$Type = $_POST["type-formation"];

$db = config::getConnexion();

$query = $db->prepare("INSERT INTO putstage (Id_Ps,T_age ,nom_entrep ,Domaine ,Post , Type ) VALUES (:id_Ps, :T_age, :nom_entrep, :Domaine, :Post, :Type)");

$query->bindParam(':id_Ps', $id_Ps);
$query->bindParam(':T_age', $T_age);
$query->bindParam(':nom_entrep', $nom_entrep);
$query->bindParam(':Domaine', $Domaine);
$query->bindParam(':Post', $Post);
$query->bindParam(':Type', $Type);

$query->execute();
?>  