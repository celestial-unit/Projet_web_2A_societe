<?php

include_once '../config.php';
include '../model/commentaire.php';

class commentaireC
{

    public function afficher()
    {
        $sql = "SELECT * FROM commentaire";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function supprimer($id)
    {
        $sql = "DELETE FROM commentaire WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function ajouter($commentaire)
    {
        $sql = "INSERT INTO commentaire (date, contenu, id_forum)
        VALUES (:date,:contenu, :id_forum)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'date' => $commentaire->getDate(),
                'contenu' => $commentaire->getContenu(),
                'id_forum' => $commentaire->getIDForum()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function modifier($commentaire, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commentaire SET 
                    date = :date, 
                    contenu = :contenu,
                    id_forum = :id_forum
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'date' => $commentaire->getDate(),
                'contenu' => $commentaire->getContenu(),
                'id_forum' => $commentaire->getIDForum()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function recupererCommentaire($id){
        $sql="SELECT * from commentaire where id=$id";
        $conn = new config();
        $db=$conn->getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $commentaire=$query->fetch();
            return $commentaire;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function triCommentaire()
    {
        $sql = "SELECT * FROM commentaire order by contenu";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function rechercheCommentaire($rech)
    {
        $sql = "SELECT * FROM commentaire where commentaire.contenu like '%$rech%'";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
