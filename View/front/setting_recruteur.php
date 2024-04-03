<?php
session_start();
include '../../Controller/sign.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = $_SESSION['user']['Email'];
    $currentPassword = $_GET['pwd'];
    $newPassword = $_GET['newPassword'];
    $confirmPassword = $_GET['ConfirmPassword'];

    // Créer une instance de la classe Personne en passant la connexion PDO
    $personne = new Personne();

    // Obtenez l'utilisateur par e-mail
    $pdo = Config::getConnexion();
    $user = $personne->getUserByEmail($email, $pdo);

    if ($newPassword !== $confirmPassword) {
        $_SESSION['alert'] = 'passwordmismatch';
        header("location: settings_recruteur.php");
        exit; // Ajout pour éviter l'exécution du reste du code
    }


    if ($user !== false) {
        // Obtenez le mot de passe haché actuel de l'utilisateur
        $currentPasswordHash = $user['mdp'];

        // Vérifiez si le mot de passe actuel fourni correspond au mot de passe haché dans la base de données
        if (password_verify($currentPassword, $currentPasswordHash)) {
            // Les mots de passe correspondent, vous pouvez maintenant mettre à jour le mot de passe dans la base de données
            $success = $personne->updatePassword($user['Email'], $newPassword, $pdo);

            if ($success) {
                $_SESSION['alert'] = 'success';
            } else {
                $_SESSION['alert'] = 'failure';
            }
        } else {
            $_SESSION['alert'] = 'wrongpassword';
        }
    } else {
        // L'utilisateur n'existe pas avec cet e-mail
        $_SESSION['alert'] = 'usernotfound';
    }

    // Rediriger vers settings_recruteur.php pour afficher l'alerte
    header("location: settings_recruteur.php");
} else {
    // Si la requête n'est pas de type GET, renvoyer une erreur
    echo 'Invalid request method';
}
?>
