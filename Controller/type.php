<?php

require 'C:\wamp64\www\Projet_web_2A_societe\Projet_web_2A_societe\config2.php';

class type
{

    public function listtype()
    {
        $sql = "SELECT * FROM type_rec";
        $db = Configuration2::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletetype($id_type)
    {
        $sql = "DELETE FROM type_rec WHERE id_type = :id";
        $db = Configuration2::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_type);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addreclamationt($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES (NULL, :titre, :subject)";
        $db = Configuration2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $reclamation->gettitre(),
                'subject' => $reclamation->getsubject(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();  
        }
    }


    function showreclamation($id_r)
    {
        $sql = "SELECT * from reclamation where idreclamation = $id_r";
        $db = Configuration2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatereclamation($reclamation, $id_r)
    {
        try {
            $db = Configuration2::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    titre = :titre, 
                    subject = :subject, 
                    
                WHERE idreclamation= :id_r'
            );
            $query->execute([
                'idreclamation' => $id_r,
                'titre' => $reclamation->gettitre(),
                'subject' => $reclamation->getsubject(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
