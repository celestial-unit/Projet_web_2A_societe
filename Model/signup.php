<?php
include("../Controller/sign.php");

$personne = new Personne();
$conn = new config();
$pdo= $conn->getConnexion();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = $_GET['email'];
    $role = $_GET['role'];
    $pwd = password_hash($_GET['pwd'], PASSWORD_DEFAULT);

    if (empty($email) || empty($role) || empty($pwd)) {
        echo '<script>alert("Veuillez remplir tous les champs.");';
        echo 'window.location.href="../View/SignIn/signIn.html";</script>';
        exit;
    }

    // Vérifier si l'utilisateur existe déjà
    $checkUserQuery = "SELECT * FROM personne WHERE Email = '$email'";
    $result = $pdo->query($checkUserQuery);
    $result1=$personne->getAssociativeArrayFromDatabase($pdo,$email);
    $status=$result1[0]['Status'];
    $emaiil=$result1[0]['Email'];

    if ($result->rowCount() > 0 && $status==='Abled') {
        echo '<script>alert("User already exists. Please choose a different email.");';
        echo 'window.location.href="../View/SignIn/signIn.html";</script>';
        exit;
        

    }
    else if ($result->rowCount() > 0 && $status==='Disabled') {
        $personne->ableaccount($emaiil,$pdo);
        $insertUserQuery = "UPDATE personne SET mdp = '$pwd' WHERE Email = '$emaiil'";
        try {
            $pdo->exec($insertUserQuery);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        echo '<script>alert("Welcome back!User reregistered successfully!");';
        echo 'window.location.href="../View/SignIn/signIn.html";</script>';
        exit;
        

    }
     else 
    {
        
        // Ajouter l'utilisateur à la base de données
        $insertUserQuery = "INSERT INTO personne (Email, Role, mdp,Status) VALUES ('$email', '$role', '$pwd','Abled')";
        try {
            $pdo->exec($insertUserQuery);
            echo '<script>alert("User registered successfully!");';
            echo 'window.location.href="../View/SignIn/signIn.html";</script>';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>