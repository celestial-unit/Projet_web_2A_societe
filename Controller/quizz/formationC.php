<?php
require '../config.php';
include '../model/formation.php';
class formationC{
    public function afficherFormation()
    {
        $sql = "SELECT * FROM formation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    } 
    function deleteFormation($id)
    {
        $sql = "DELETE FROM formation WHERE id_formation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function addFormation($formation)
{
  $sql='INSERT INTO formation VALUES(NULL,:n,:p,:d,:niv,:ur,:dsc)';
  $db=config::getConnexion();
try{
    $req=$db->prepare($sql);
    $req->execute(
        [
            'n' => $formation->getNom(),
            'p' => $formation->getpaiement(),
            'd' => $formation->getDomaine(),
            'niv' => $formation->getniveau(),
            'ur' => $formation->getimage_url(),
            'dsc' => $formation->getdescription(),
        ]
    );
}
catch(Exception $e) {
    die('Error:' . $e->getMessage());
}
}
function showFormation($id)
{
    $sql = "SELECT * FROM formation WHERE id_formation = :id";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $training = $query->fetch();
        return $training;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

public function update($formation, $id) {
    $sql = "UPDATE formation SET nom = :nom, paiement = :paiement, domaine = :domaine, niveau = :niveau,image_url= :image_url, description= :description WHERE id_formation = :id";
    $db = config::getConnexion();

    try {
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        $req->bindValue(':nom', $formation->getNom());
        $req->bindValue(':paiement', $formation->getpaiement());
        $req->bindValue(':domaine', $formation->getDomaine());
        $req->bindValue(':niveau', $formation->getniveau());
        $req->bindValue(':image_url', $formation->getimage_url());
        $req->bindValue(':description', $formation->getdescription());
  


        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

  
}
?>
