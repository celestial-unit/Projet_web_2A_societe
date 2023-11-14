<?php
require "./config.php";

$nom = $_POST["firstname"];
$prenom = $_POST["lastname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$age = $_POST["age"];
$desc = $_POST["about"];
$id = 0;

$db = config::getConnexion();

$query = $db->prepare("INSERT INTO stage (Nom, Prenom, age, description, Id_stage, Number, Email) VALUES (:nom, :prenom, :age, :desc, :id_stage, :phone, :email)");

$query->bindParam(':nom', $nom);
$query->bindParam(':prenom', $prenom);
$query->bindParam(':email', $email);
$query->bindParam(':phone', $phone);
$query->bindParam(':age', $age);
$query->bindParam(':id_stage', $id);
$query->bindParam(':desc', $desc);

$query->execute();
?>
