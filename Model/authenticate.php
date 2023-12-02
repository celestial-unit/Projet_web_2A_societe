<?php
include('../vendor/autoload.php');
include('../Controller/sign.php');


function genererTokenReinitialisation($email)
{
    if (function_exists('random_bytes')) {
        $token = bin2hex(random_bytes(32));
    } else {
        $token = bin2hex(openssl_random_pseudo_bytes(32));
    }
    $expiration_time = date("Y-m-d H:i:s", strtotime("+1 hour")); 

    // Utilisez une table distincte pour stocker les tokens de réinitialisation
    $pdo = config::getConnexion();
    $query = $pdo->prepare(
        "INSERT INTO personne (Email, token, expiration_time) 
        VALUES (:email, :token, :expiration_time);"
    );
    $query->execute([
        'email' => $email,
        'token' => $token,
        'expiration_time' => $expiration_time
    ]);

    return $token;
}

// auth.php
function verifierTokenReinitialisation($email, $token)
{
    $pdo = config::getConnexion();
    $query = $pdo->prepare(
        "SELECT * FROM personne 
        WHERE Email = :email AND token = :token 
        AND expiration_time > NOW();"
    );
    $query->execute([
        'Email' => $email,
        'token' => $token
    ]);
    return $query->fetch();
}

?>
