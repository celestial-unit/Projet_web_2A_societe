<?php

require 'C:\wamp64\www\Projet_web_2A_societe\Projet_web_2A_societe\config4.php';
require '../../Model/repon.php';

class rep
{
    public function getResponsesByReclamationId($reclamationId) {
        try {
            // Assuming you have a PDO connection
            $conn = config4::getConnexion();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Prepare and execute SQL statement to select responses by reclamation ID
            $stmt = $conn->prepare("SELECT * FROM repose WHERE id_reponse = (SELECT reponse FROM reclamation WHERE id_rec = :reclamationId)");
            $stmt->bindParam(':reclamationId', $reclamationId);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        } finally {
            // Close the database connection
            $conn = null;
        }
    }
    
    public function listreponse()
    {
        $sql = "SELECT * FROM repose";
        $db =config4::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function deletereponse($id_reponse)
    {
        $sql = "DELETE FROM repose WHERE id_reponse = :id";
        $db = config4::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_reponse);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function showreponse($id_r)
    {
        $sql = "SELECT * from repose where id_reponse = $id_r";
        $db = config4::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function addreponse($reponse)
    {
        $sql = "INSERT INTO repose (reponse) VALUES (:reponse)";
        $db = config4::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute(['reponse' => $reponse]);

            // Get the last inserted ID
            $lastId = $this->getLastInsertedId();

            // Update the corresponding reclamation with the new response
            $rec = new Rec(config::getConnexion());
            $rec->addReponseToReclamation($lastId, $reponse);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function updatereponse($reponse, $id_r)
{
    try {
        $db = config4::getConnexion();
        $query = $db->prepare(
            'UPDATE repose SET 
                reponse = :reponse
            WHERE id_reponse = :id_r'
        );
        $query->execute([
            'id_r' => $id_r,
            'reponse' => $reponse,
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
    public function getLastInsertedId()
    {
        // Assuming you're using PDO for database operations
        $db = config4::getConnexion();
        return $db->lastInsertId();
    }
}
