<?php
include("../../Controller/sign.php");
session_start();
$personne=new Personne();
$conn = new config();
$pdo = $conn->getConnexion();
$personne->setValuesFromSession();
$result = $personne->desableaccount($_SESSION['user']['Email'],$pdo);
// Traitez la réponse de la fonction disableAccount()
if ($result) 
{
   echo "Le compte a été désactivé avec succès.";
} else {
    echo "Une erreur s'est produite lors de la désactivation du compte.";
}
$resultt = $personne->desableaccount($_SESSION['recruteur']['Email'],$pdo);
// Traitez la réponse de la fonction disableAccount()
if ($resultt) 
{
   echo "compte a été désactivé avec succès.";
} else {
    echo "Une erreur s'est produite.";
}

?>