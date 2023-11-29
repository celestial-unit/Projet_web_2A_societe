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

if (!$user) 
{
    // Si l'utilisateur n'existe pas, afficher une alerte
    echo '<script>alert("Compte inexistant");</script>';
    header('Location: mdp.php');
    exit();
} else 
{
    $personne->updatePassword($email,$pwd,$pdo);
    try {
        // Paramètres du serveur SMTP de Gmail
        $mail->isSMTP();
        $mail->Host       ='smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   ='marrakchicelia3@gmail.com'; // Adresse e-mail depuis laquelle vous envoyez l'e-mail
        $mail->Password   ='msdi xnvj mvhq gebx'; // Mot de passe de l'adresse e-mail Gmail
        $mail->SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       =587;

       // Paramètres de l'e-mail
        $mail->setFrom('marrakchicelia3@gmail.com','unipath');
        $mail->addAddress($email); // Adresse e-mail du destinataire
        $mail->Subject = 'Password Change Verification';
        $mail->isHTML(true);
$mail->Body = 'Hello ' . $user['Nom'] . ',<br>&nbsp;' .
    'Your password for your Unipath account has been changed successfully. If you did not initiate this change, please contact our support team immediately.<br>&nbsp;' .
    'Best regards,<br>&nbsp;Unipath Team';
        
        

        // Envoyer l'e-mail
        $mail->send();

        echo 'E-mail envoyé avec succès';
        echo '<script>alert("E-mail envoyé avec succès");</script>';
        echo '<script>window.location.href = "../View/signIn/signIn.html";</script>';
        exit();
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
       // header('../View/signIn/setnewmdp.php');
    }
    
}

?>