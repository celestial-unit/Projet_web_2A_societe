<?php
session_start();
include("../../Controller/sign.php");
$conn = new config();
$pdo = $conn->getConnexion();
$email = $_SESSION['user']['Email'];

// Vérifier si un fichier a été téléchargé
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
  
    $imageContent = file_get_contents($_FILES['image']['tmp_name']);
 
  // Effectuer la mise à jour de la base de données avec le contenu de l'image
  try {
    $updateUserQuery = "UPDATE personne SET image_data = :image_data WHERE Email = :email";
    $stmtUpdate = $pdo->prepare($updateUserQuery);
    $stmtUpdate->bindParam(':image_data', $imageContent, PDO::PARAM_LOB);
    $stmtUpdate->bindParam(':email', $email, PDO::PARAM_STR);
    $stmtUpdate->execute();

    $_SESSION['user']['image'] = $imageContent; // Mettre à jour l'URL de l'image dans la session

    // Rediriger ou afficher un message de succès
    header("Location: page_affichage_etudiant.php");
    exit();
  } catch (Exception $e) {
    die('Erreur: ' . $e->getMessage());
  }
}