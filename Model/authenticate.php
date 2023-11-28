<?php
declare(strict_types=1);

use Firebase\JWT\JWT;
use DateTimeImmutable; // Ajoutez cette ligne pour importer la classe DateTimeImmutable
require_once('../vendor/autoload.php');

function generateJWT($data) {
    $secretKey = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';

    $issuedAt   = new DateTimeImmutable();
    $expire     = $issuedAt->modify('+6 minutes')->getTimestamp();  // Ajoutez 6 minutes (ajustez selon vos besoins)
    $serverName = "your.domain.name";

    $data = array_merge([
        'iat'  => $issuedAt->getTimestamp(),
        'iss'  => $serverName,
        'nbf'  => $issuedAt->getTimestamp(),
        'exp'  => $expire,
    ], $data);

    return \Firebase\JWT\JWT::encode($data, $secretKey, 'HS256');
}
?>
