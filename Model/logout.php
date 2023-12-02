<?php
// Répondez avec un statut HTTP OK
http_response_code(200);

session_start();
// Détruire le token de la session
unset($_SESSION['jwtUserToken']);
session_destroy();

// Empêcher la mise en cache de la page précédente
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_destroy();
header('Location: ../View/SignIn/signIn.html');
exit;
?>
