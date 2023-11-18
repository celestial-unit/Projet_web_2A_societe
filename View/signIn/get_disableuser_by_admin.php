<?php
include("../../Controller/sign.php");
$personne = new Personne();
$pdo = config::getConnexion();
if ($_SERVER['REQUEST_METHOD'] === 'GET') 
$emailToDisable = $_GET['email'] ;
$user=$personne->getUserByEmail($emailToDisable, $pdo);
if($user!=false)
{
    if ($personne->desableaccount($emailToDisable, $pdo)) 
    {
        echo "L'utilisateur a été disabled avec succès.";
    } 
}
else 
{
    echo "L'utilisateur n'existe pas ";
}
?>