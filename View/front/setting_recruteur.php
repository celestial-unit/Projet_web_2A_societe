<?php
session_start();
error_reporting(E_ALL);
// Inclure votre classe Config et la classe Personne
include '../../Controller/sign.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = $_SESSION['recruteur']['Email'];
    $currentPassword = $_GET['pwd'];
    $newPassword = $_GET['newPassword'];

    // Créer une instance de la classe Personne en passant la connexion PDO
    $personne = new Personne();

    // Obtenez l'utilisateur par e-mail
    $pdo = Config::getConnexion();
    $user = $personne->getUserByEmail($email, $pdo);

    if ($user !== false) {
        // Obtenez le mot de passe haché actuel de l'utilisateur
        $currentPasswordHash = $user['mdp'];
    
        // Vérifiez si le mot de passe actuel fourni correspond au mot de passe haché dans la base de données
        if (password_verify($currentPassword, $currentPasswordHash)) {
            // Les mots de passe correspondent, vous pouvez maintenant mettre à jour le mot de passe dans la base de données
            $success = $personne->updatePassword($user['Email'],$newPassword,$pdo);
            header("location settings_recruteur.php");
            if ($success) 
            {
                echo 'Password changed successfully';
            } else {
                echo 'Failed to update password';
            }
        } else {
            echo 'Wrong password';
        }
    } else {
        // L'utilisateur n'existe pas avec cet e-mail
        echo 'User not found';
    }
    
} else {
    // Si la requête n'est pas de type GET, renvoyer une erreur
    echo 'Invalid request method';
}

?>
