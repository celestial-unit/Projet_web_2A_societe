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
    $num = $_GET['num'];
    $email = $_GET['email'];
    $role = $_GET['role'];


    
    if ($role==='etudiant')
    {
    // Enregistrez les données dans la session ou dans une base de données, selon vos besoins
    $_SESSION['user']['Nom'] = $firstName;
    $_SESSION['user']['Prenom'] = $lastName;
    $_SESSION['user']['Numero'] = $num;
    $_SESSION['user']['Age'] = $age;
    $_SESSION['user']['Email'] = $email;
    $_SESSION['user']['Role'] = $role;
    }
    if ($role==='recruteur')
    {
    // Enregistrez les données dans la session ou dans une base de données, selon vos besoins
    $_SESSION['recruteur']['Nom'] = $firstName;
    $_SESSION['recruteur']['Prenom'] = $lastName;
    $_SESSION['recruteur']['Numero'] = $num;
    $_SESSION['recruteur']['Age'] = $age;
    $_SESSION['recruteur']['Email'] = $email;
    $_SESSION['recruteur']['Role'] = $role;
    }

    $personne->Nom=$firstName;
    $personne->Prenom=$lastName;
    $personne->tel=$num;
    $personne->role=$role;
    $personne->age=$age;
    $personne->email= $email;

    $checkUserQuery = "SELECT * FROM personne WHERE Email = '$email'";
    $result = $pdo->query($checkUserQuery);

    if ($result->rowCount() > 0) {
        // L'utilisateur existe déjà, mettre à jour les informations dans la même ligne
        $updateUserQuery = "UPDATE personne SET
        Nom = '$firstName',
        Prenom = '$lastName',
        Age = '$age',
        Tel = '$num'
        WHERE Email = '$email'";
        $pdo->query($updateUserQuery);
    } else 
    {
        // L'utilisateur n'existe pas, vous pouvez ajouter une nouvelle entrée dans la base de données
        $insertUserQuery = "INSERT INTO personne (Nom, Prenom, Email, Age, Tel,Role) 
            VALUES ('$firstName', '$lastName', '$email', '$age', '$num', '$role')";
        $pdo->query($insertUserQuery);
    }

    // Rediriger l'utilisateur vers la page d'accueil ou une autre page après le traitement du formulaire
    header('Location: ../View/signIn/affichage2.0.php');
    exit;
   
}
?>
