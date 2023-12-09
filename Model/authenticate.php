<?php
function genererTokenReinitialisation($email, $pdo)
{
    if (function_exists('random_bytes')) {
        $token = bin2hex(random_bytes(32));
    } else {
        $token = bin2hex(openssl_random_pseudo_bytes(32));
    }

    $expiration_time = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // Utilisez une table distincte pour stocker les tokens de réinitialisation
    $query = $pdo->prepare(
        "UPDATE personne 
        SET token = :token, expiration_time = :expiration_time 
        WHERE Email = :email;"
    );

    $query->execute([
        'email' => $email,
        'token' => $token,
        'expiration_time' => $expiration_time
    ]);

    return $token;
}


// auth.php
function verifierTokenReinitialisation($email, $pdo)
{
    $query = $pdo->prepare(
        "SELECT token, expiration_time FROM personne 
        WHERE Email = :email;"
    );
    $query->execute([
        'email' => $email,
    ]);

    $result = $query->fetch();

    if ($result && $result['token']) {
        // Vérifier si le token n'est pas expiré
        $expirationTime = new DateTime($result['expiration_time']);
        $currentTime = new DateTime();

        if ($expirationTime > $currentTime) {
            // Token valide
            return true;
        }
    }
    // Token expiré ou non trouvé
    return false;
}



?>
