<?php
include("../../Controller/sign.php");
$personne = new Personne();
$pdo = config::getConnexion();
if ($_SERVER['REQUEST_METHOD'] === 'GET') 
$emailToDisable = $_GET['email'] ;
$user=$personne->getUserByEmail($emailToDisable, $pdo);
if($user!=false)
{
    if ($personne->ableaccount($emailToDisable, $pdo)) 
    {
        echo "Account abled successfully.";
    } 
}
else 
{
    echo "User does not exist  ";
}
?>
