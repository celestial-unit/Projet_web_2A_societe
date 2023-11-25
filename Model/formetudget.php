<?php
include("../Controller/sign.php");
$personne=new personne();
$conn = new config();
$pdo = $conn->getConnexion();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Récupérer les données du formulaire
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $age = $_GET['age'];
    $level = $_GET['studies'];
    $diplome = $_GET['diploma'];
    $cin = $_GET['cin'];
    $num = $_GET['num'];
    $newemail= $_GET['email'];


    
    
    // Enregistrez les données dans la session ou dans une base de données, selon vos besoins
    $_SESSION['user']['Nom'] = $firstName;
    $_SESSION['user']['Prenom'] = $lastName;
     
    $_SESSION['user']['Numero'] = $num;
    $_SESSION['user']['Age'] = $age;
    $_SESSION['user']['Diplome'] = $diplome;
    $_SESSION['user']['Niveau'] = $level;
    $_SESSION['user']['cin'] = $cin;
    $_SESSION['user']['Email'] = $newemail;

    $personne->Nom=$firstName;
    $personne->Prenom=$lastName;
    $personne->tel=$num;
    $personne->cin=$cin;
    $personne->diplome=$diplome;
    $personne->age=$age;
    $personne->level= $level;

    $email=$_SESSION['user']['Email'];
    $checkUserQuery = "SELECT * FROM personne WHERE Email = '$email'";
    $result = $pdo->query($checkUserQuery);

    if ($result->rowCount() > 0) {
        // L'utilisateur existe déjà, mettre à jour les informations dans la même ligne
        $updateUserQuery = "UPDATE personne SET
            CIN='$cin',
            Nom = '$firstName',
            Prenom = '$lastName',
            Age = '$age',
            Tel = '$num',
            Niveau = '$level',
            Diplome = '$diplome',
            Email='$newemail'
            WHERE Email = '$email'";
        $pdo->query($updateUserQuery);
    } else 
    {
        // L'utilisateur n'existe pas, vous pouvez ajouter une nouvelle entrée dans la base de données
        $insertUserQuery = "INSERT INTO personne (CIN, Nom, Prenom, Email, Age, Tel, Niveau, Diplome) 
            VALUES ('$cin', '$firstName', '$lastName', '$email', '$age', '$num', '$level', '$diplome')";
        $pdo->query($insertUserQuery);
    }

    // Rediriger l'utilisateur vers la page d'accueil ou une autre page après le traitement du formulaire
    header('Location: ../View/signIn/compte_etudiant.php');
    exit;
}
?>
