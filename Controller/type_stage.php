<?php

require 'C:\wamp64\www\Projet_web_2A_societe\config.php';

class type_s
{

    public function listetype_s()
    {
        $sql = "SELECT * FROM type_stage";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function delettype_s($id_types)
    {
        $sql = "DELETE FROM type_stage WHERE id_types = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_types);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

 
    public function addStage($types)
    {
        $sql = "INSERT INTO type_stage (nom_types) VALUES (:nom_types)";
        
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_types' => $types->getNomtype(),  // Use the method from the type class
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function showStage($id_types)
    {
        $sql = "SELECT * FROM type_stage WHERE id_types = :id_types";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_types', $id_types);
            $query->execute();
            $stage = $query->fetch();
            return $stage;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    function updatestage($types, $id_types)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE type_stage SET 
                    nom_types = :nom_types
                WHERE id_types = :id_types'
            );
            $query->execute([
                'id_types' => $id_types,
                'nom_types' => $types->getNomtype(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Print the error message for debugging purposes
        }
    }
    
    }
    

    
 
?>
