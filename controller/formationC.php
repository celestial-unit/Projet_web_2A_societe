<?php
require_once '../config.php';
include '../model/formation.php';
//include '../model/typeformation.php';
class formationC{
    public function afficherFormation()
{
    $sql = "SELECT formation.id_formation, formation.Nom, formation.ispaid,formation.datedebut,formation.Niveau, formation.type_cours, formation.nbheures, formation.niveau,formation.image_url,formation.nature_cours, 
    typeformation.id_typeformation, typeformation.description, typeformation.domaine
FROM formation
INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste->fetchAll(PDO::FETCH_ASSOC);
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
public function showFormation($id_formation) {
    // Assuming you have a database connection
    $db = config::getConnexion();

    // Utilisation d'une requête préparée pour éviter les injections SQL
    $stmt = $db->prepare("SELECT * FROM formation WHERE id_formation = :id_formation");
    $stmt->bindParam(':id_formation', $id_formation, PDO::PARAM_INT);
    $stmt->execute();

    $formationData = $stmt->fetch(PDO::FETCH_ASSOC);

    $db = null;
    return $formationData;
}



public function getAllTypesFormation() {
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
public function getAllFormations()
{
    $sql = "SELECT formation.*, typeformation.domaine, typeformation.description
            FROM formation
            INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
public function getPaidFormations()
{
    try {
        $db = config::getConnexion();
        $sql = "SELECT formation.*, typeformation.domaine, typeformation.description
        FROM formation
        INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.ispaid = 1";

        $stmt = $db->query($sql);
        $paidFormations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $paidFormations;
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
        return array();
    }
}

public function getFreeFormations()
{
    try {
        $db = config::getConnexion();
        $sql = "SELECT formation.*, typeformation.domaine, typeformation.description
        FROM formation
        INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.ispaid = 0";

        $stmt = $db->query($sql);
        $freeFormations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $freeFormations;
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
        return array();
    }
}

public function getAcceleratedFormations()
{
    try {
        $db = config::getConnexion();
        $sql = "SELECT formation.*, typeformation.domaine, typeformation.description
        FROM formation
        INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.nature_cours = 1";

        $stmt = $db->query($sql);
        $acceleratedFormations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $acceleratedFormations;
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
        return array();
    }
}

public function getNormalFormations()
{
    try {
        $db = config::getConnexion();
        $sql = "SELECT formation.*, typeformation.domaine, typeformation.description
        FROM formation
        INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.nature_cours = 0";

        $stmt = $db->query($sql);
        $normalFormations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $normalFormations;
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
        return array();
    }
}

public function getNormalClassesFormations()
{
    try {
        $db = config::getConnexion();
        $sql = "SELECT formation.*, typeformation.domaine, typeformation.description
        FROM formation
        INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.type_cours = 0";

        $stmt = $db->query($sql);
        $normalClassesFormations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $normalClassesFormations;
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
        return array();
    }
}
public function getnightclassesFormations() {
    try {
        $db = config::getConnexion(); 
         $sql = "SELECT formation.*, typeformation.domaine, typeformation.description
         FROM formation
         INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
         WHERE formation.type_cours = 1";
        $stmt = $db->query($sql);
        $nightclass = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $nightclass;
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
        return array();  
    }
}
public function getweekendclassesFormations() {
    try {
        $db = config::getConnexion(); 
        $sql = "SELECT formation.*, typeformation.domaine, typeformation.description
        FROM formation
        INNER JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.type_cours = 2";
        $stmt = $db->query($sql);
        $weekendclass = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $weekendclass;
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
        return array();  
    }

}
}

?>
