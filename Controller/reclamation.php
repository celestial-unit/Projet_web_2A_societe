<?php
require 'C:\wamp64\www\Projet_web_2A_societe\Projet_web_2A_societe\config.php'; 
require 'C:\wamp64\www\Projet_web_2A_societe\Projet_web_2A_societe\config3.php';

class Rec
{
      
    public function addReponseToReclamation($id_rec, $reponse)
    {
        $sql = "UPDATE reclamation SET reponse = :reponse WHERE id_rec = :id_rec";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute(['id_rec' => $id_rec, 'reponse' => $reponse]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getReclamationById($id)
    {
        $query = "SELECT * FROM reclamation WHERE id_rec = :id";
        $statement = $this->conn->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
    
        try {
            $statement->execute();
    
            $result = $statement->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                return new reclamation(
                    $result['id_rec'],
                    $result['titre'],
                    $result['description'],
                    $result['type_reclamation'],
                    $result['etat'],
                    $result['timestamp_column']
                );
            } else {
                // Add debug information
                echo "Debug: No reclamation found for ID: $id";
                return null; // or throw an exception, depending on your error handling strategy
            }
        } catch (PDOException $e) {
            // Add debug information
            echo "Debug: Error fetching reclamation - " . $e->getMessage();
            throw new Exception("Error fetching reclamation: " . $e->getMessage());
        }
    }
    
    

    public function getTypeById($typeId)
{
    $sql = "SELECT * FROM type_rec WHERE id_type = :typeId";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['typeId' => $typeId]);

        // Fetch the result as an associative array
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Check if the result is not empty
        if ($result) {
            return $result;
        } else {
            // Handle the case where no type is found by returning null
            return null;
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
    
public function getTypes()
{
    $sql = "SELECT * FROM type_rec";
    $db = config::getConnexion();
  
    try {
        $types = $db->query($sql);

        // Check if there are rows returned
        if ($types->rowCount() > 0) {
            return $types;
        } else {
            return array(); // Ensure you always return an array
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


    public function listReclamations()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function listReclamations2()
{
    $sql = "SELECT * FROM reclamation";
    $db = config::getConnexion();
    try {
        $query = $db->query($sql);
        $reclamations = array(); // Initialize an empty array to store reclamation objects

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // Create a reclamation object for each row and add it to the array
            $reclamations[] = new reclamation(
                $row['id_rec'],
                $row['titre'],
                $row['description'],
                $row['type_reclamation'],
                $row['etat'],
                $row['timestamp_column'] // Make sure the timestamp column name is correct
            );
        }

        return $reclamations;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    public function deleteReclamation($id_rec)
    {
        $sql = "DELETE FROM reclamation WHERE id_rec = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_rec);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


function addReclamation($reclamation)
{
    session_start();
    $email = $_SESSION['user']['Email'];
    $sql = "INSERT INTO reclamation (titre, description, type_reclamation, etat, timestamp_column,email) 
            VALUES (:titre, :description, :type_reclamation, :etat, CURRENT_TIMESTAMP,:email)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'titre' => $reclamation->gettitre(),
            'description' => $reclamation->getsubject(),
            'type_reclamation' => $reclamation->getType(),
            'etat' => $reclamation->getEtat(),
            'email' => $email,
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function affichage()
{
    session_start();
    $email = $_SESSION['user']['Email'];
    $sql = "SELECT * FROM reclamation WHERE email = :email"; // Added * to select all columns
    $db = config::getConnexion();
   
    try {
        $query = $db->prepare($sql);
        $query->execute(['email' => $email]);

        $reclamations = array(); // Initialize an empty array to store reclamation objects

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // Create a reclamation object for each row and add it to the array
            $reclamations[] = new reclamation(
                $row['id_rec'],
                $row['titre'],
                $row['description'],
                $row['type_reclamation'],
                $row['etat'],
                $row['timestamp_column']
            );
        }

        return $reclamations;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}   
function affichage1()
{
    session_start();
    $email = $_SESSION['recruteur']['Email'];
    $sql = "SELECT * FROM reclamation WHERE email = :email"; // Added * to select all columns
    $db = config::getConnexion();
   
    try {
        $query = $db->prepare($sql);
        $query->execute(['email' => $email]);

        $reclamations = array(); // Initialize an empty array to store reclamation objects

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // Create a reclamation object for each row and add it to the array
            $reclamations[] = new reclamation(
                $row['id_rec'],
                $row['titre'],
                $row['description'],
                $row['type_reclamation'],
                $row['etat'],
                $row['timestamp_column']
            );
        }

        return $reclamations;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    public function showReclamation($id_r)
    {
        $sql = "SELECT * FROM reclamation WHERE id_rec = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id_r);
            $query->execute();
            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updateReclamation($reclamation, $id_r, $type)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE reclamation SET 
            titre = :titre, 
            description = :description, 
            type_reclamation = :type_reclamation, -- Make sure to include type_reclamation
            etat = :etat
            WHERE id_rec = :id_r'
        );
        $query->execute([
            'id_r' => $id_r,
            'titre' => $reclamation->getTitre(),
            'description' => $reclamation->getsubject(),
            'type_reclamation' => $type,
            'etat' => $reclamation->getEtat(),
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}

public function updateRec($reclamation, $id_r, $type,$description,$titre)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE reclamation SET 
            etat = :etat
        WHERE id_rec = :id_rec AND titre = :titre AND description = :description AND type_reclamation = :type_reclamation '
        );
        $query->execute([
            'id_rec' => $id_r,
            'titre' => $titre,
            'description' => $description,
            'type_reclamation' => $type,
            'etat' => $reclamation->getEtat(),
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}

}
