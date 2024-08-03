<?php
include("../../Controller/sign.php");
$personne = new Personne();
$pdo = config::getConnexion();
if ($_SERVER['REQUEST_METHOD'] === 'GET') 
$emailToDelete = $_GET['email'] ;

if ($personne->deleteUserByEmail($emailToDelete, $pdo)) 
{
    echo "L'utilisateur a été supprimé avec succès.";
} else 
{
    echo "L'utilisateur n'existe pas ou une erreur s'est produite lors de la suppression.";
}
?>