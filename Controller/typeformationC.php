<?php
//include 'sign.php';
//include '../model/formation.php';
include '../Model/typeformation.php';
include_once  "../config.php";
class typeformationC{
    public function getTypeFormationIdByDomaine($domaine) {
        $db = config::getConnexion();
        try {
            $sql = "SELECT id_typeformation FROM typeformation WHERE domaine = :domaine";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':domaine', $domaine, PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result['id_typeformation'];
            } else {
                // Si aucun enregistrement n'est trouvé, vous pouvez gérer cela en conséquence
                return null;
            }
        } catch (PDOException $e) {
            echo "Erreur de base de données : " . $e->getMessage();
            return null;
        }
    }
    public function affichertypeFormation()
    {
        $sql = "SELECT * FROM typeformation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletetypeFormation($id)
    {
        $sql = "DELETE FROM typeformation WHERE id_typeformation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function addtypeFormation($typeformation)
{
  $sql='INSERT INTO typeformation  (domaine, description) VALUES(:dom,:dscr)';
  $db=config::getConnexion();
try{
    $req=$db->prepare($sql);
    $req->execute(
        [
            'dom' => $typeformation->getDomaine(),
            'dscr' => $typeformation->getdescription(),
        ]
    );
}
catch (PDOException $e) {
    if ($e->errorInfo[1] === 1062) { // 1062 is the MySQL error code for duplicate entry
        // Handle the duplicate entry error (e.g., display an error message)
        die('Error: Domaine must be unique.');
    } else {
        // Handle other database errors
        die('Error:' . $e->getMessage());
    }
}
}
function showFormation($id)
{
    $sql = "SELECT * FROM typeformation WHERE id_typeformation = :id";
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


public function update($typeformation, $id) {
    $sql = "UPDATE typeformation SET domaine = :domaine, description = :description WHERE id_typeformation = :id";
    $db = config::getConnexion();

    try {
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        $req->bindValue(':domaine', $typeformation->getDomaine());
        $req->bindValue(':description', $typeformation->getdescription());
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
public function getAlldomaine() {
    $db = config::getConnexion();
    try {
        $sql = "SELECT  domaine FROM typeformation";
        $stmt = $db->prepare($sql);

        // Exécuter la requête
        $stmt->execute();
        $typesFormation = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $typesFormation;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        return [];
    }
}
public function getDescriptionForFormation($idFormation)
{
    $sql = "SELECT typeformation.description
            FROM formation
            INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
            WHERE formation.id_formation = :idFormation";

    $db = config::getConnexion();

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':idFormation', $idFormation, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['description'];
        } else {
            return "Aucune description trouvée pour la formation avec l'ID : $idFormation";
        }
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}
}
?>
