<?php
include("../Controller/sign.php");
$personne=new personne();
$conn = new config();
$pdo = $conn->getConnexion();
session_start();
$email=$_SESSION['recruteur']['Email'];
if ($_SERVER['REQUEST_METHOD'] === 'GET')
 {
    // Récupérer les données du formulaire
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $num = $_GET['num'];
    $Recruiter_domain = $_GET['Recruiterdomain'];
    $Recruiter_title = $_GET['Recruitertitle'];
    $adresse = $_GET['adresse'];
    $num = $_GET['num'];


    
    
    // Enregistrez les données dans la session ou dans une base de données, selon vos besoins
    $_SESSION['recruteur']['Nom'] =$firstName;
    $_SESSION['recruteur']['Prenom'] =$lastName;
    $_SESSION['recruteur']['Adresse'] =$adresse;
    $_SESSION['recruteur']['Numero'] =$num;
    $_SESSION['recruteur']['Domaine_recruteur'] =$Recruiter_domain;
    $_SESSION['recruteur']['Titre_recruteur'] =$Recruiter_title;

    $checkUserQuery = "SELECT * FROM personne WHERE Email = :email";
    $stmt = $pdo->prepare($checkUserQuery);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    
        // L'utilisateur existe déjà, mettre à jour les informations dans la même ligne
        $updateUserQuery = "UPDATE personne SET
            Nom = '$firstName',
            Prenom = '$lastName',
            Tel = '$num',
            Titre_recruteur='$Recruiter_title',
            Domaine_recruteur = '$Recruiter_domain'
            WHERE Email = '$email'";
            $pdo->query($updateUserQuery);
    

    // Rediriger l'utilisateur vers la page d'accueil ou une autre page après le traitement du formulaire
    header('Location: ../View/signIn/compte_recruteur.php');
    exit;
}
?>
