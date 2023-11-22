<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Assurez-vous que le chemin vers autoload.php est correct
require '../vendor/autoload.php';
include '../Controller/sign.php';

// Instanciation de PHPMailer
$mail = new PHPMailer(true);
$personne = new personne();
$pdo = Config::getConnexion();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = $_GET['email'];
    $pwd = $_GET['newPassword'];
}

$user = $personne->getUserByEmail($email, $pdo);

if (!$user) {
    // Si l'utilisateur n'existe pas, afficher une alerte
    echo '<script>alert("Compte inexistant");</script>';
} else 
{
    $personne->updatePassword($email,$pwd,$pdo);
    try {
        // Paramètres du serveur SMTP de Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'unipath913@gmail.com'; // Adresse e-mail depuis laquelle vous envoyez l'e-mail
        $mail->Password   = 'UNIPATH2023'; // Mot de passe de l'adresse e-mail Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

       // Paramètres de l'e-mail
        $mail->setFrom('unipath913@gmail.com','unipath');
        $mail->addAddress($email); // Adresse e-mail du destinataire
        $mail->Subject = 'Mail de verification';
        $mail->Body    = 'Vous avez changé le mdp de votre compte a unipathc';
        
        

        // Envoyer l'e-mail
        $mail->send();
        echo 'E-mail envoyé avec succès';

        // Rediriger l'utilisateur vers une autre page après l'envoi de l'e-mail
       // header('Location: autre_page.php');
        exit();
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        header('../View/signIn/setnewmdp.php');
    }
    
}

?>