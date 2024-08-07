<?php
// Démarrez la session
session_start();

include("../Controller/sign.php");
include("../Model/authenticate.php"); // Incluez le modèle d'authentification


$personne = new Personne();
$conn = new config();
$pdo = $conn->getConnexion(); // Obtenez la connexion PDO


if ($_SERVER['REQUEST_METHOD'] === 'GET') 
{
    $enteredEmail = $_GET['Email'];
    $enteredPassword = $_GET['Pwd'];
    if (empty($enteredEmail) || empty($enteredPassword)) 
    {
        echo '<script>alert("Veuillez remplir tous les champs.");';
        echo 'window.location.href="../View/SignIn/signIn.html";</script>';
        exit;
    }
    if ($enteredEmail === 'admin@unipath.com' && $enteredPassword === "UNIPATH") {
        $_SESSION['admin'] = array(
            'Email' => 'admin@unipath.com',
            'role' => 'admin'
        );
    
        $adminToken = genererTokenReinitialisation($enteredEmail, $pdo);
        $_SESSION['admintoken'] = $adminToken;
    
        if ($_SESSION['admin']['role'] === 'admin') {
            header('Location: ../View/SignIn/espace_admin.php');
            exit();
        }
    }
    else
    {
        $user = $personne->getUserByEmail($enteredEmail, $pdo);
        $recruteur = $personne->getUserByEmail($enteredEmail, $pdo);
        if ($user && password_verify($enteredPassword, $user['mdp'])) 
        {
            $_SESSION['user'] = array(
                'Nom' => $user['Nom'],
                'Prenom' => $user['Prenom'],
                'cin' => $user['CIN'],
                'Email' => $user['Email'],
                'Numero' => $user['Tel'],
                'Age' => $user['Age'],
                'Diplome' => $user['Diplome'],
                'Niveau' => $user['Niveau'],
                'Role' => $user['Role'],
                'Status' => $user['Status'],
                'image' => $user['image']
            );
            $_SESSION['recruteur'] = array(
                'Nom' => $recruteur['Nom'],
                'Prenom' => $recruteur['Prenom'],
                'cin' => $recruteur['CIN'],
                'Email' => $recruteur['Email'],
                'Numero' => $recruteur['Tel'],
                'Diplome' => $recruteur['Diplome'],
                'Role' => $recruteur['Role'],
                'Domaine_recruteur'=>$recruteur['Domaine_recruteur'],
                'Titre_recruteur'=>$recruteur['Titre_recruteur'],
                'Status' => $recruteur['Status']
            );
            //token
            $userToken=genererTokenReinitialisation($enteredEmail,$pdo );
            $_SESSION['reset_token'] = $userToken;
            if ($_SESSION['user']['Role'] === 'etudiant' && $user['Status']==='Abled') 
            {
                header('Location: ../View/SignIn/compte_etudiant.php');
                exit();
            } 
            else if ($_SESSION['recruteur']['Role'] === 'recruteur'  && $recruteur['Status']==='Abled')
            {
                header('Location: ../View/SignIn/compte_recruteur.php');
                exit();
            }
            else 
            {
            echo "<script>alert('Invalid email or password.');";
            echo 'window.location.href="../View/SignIn/signIn.html";</script>';
            exit;
            }

        } 
        else 
            {
            echo "<script>alert('Invalid email or password.');";
            echo 'window.location.href="../View/SignIn/signIn.html";</script>';
            exit;
            }
        
    
    }
}


    
?>
