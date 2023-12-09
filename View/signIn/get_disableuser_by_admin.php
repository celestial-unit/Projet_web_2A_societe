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
        echo "Account disabled successfully.";
    } 
}
else 
{
    echo "User does not exist";
}
?>
