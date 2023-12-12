<?php

include_once '../config.php';
include '../model/forum.php';

class forumC
{

    public function afficher()
    {
        $sql = "SELECT * FROM forum";
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
        $sql = "DELETE FROM forum WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function ajouter($forum)
    {
        $sql = "INSERT INTO forum (titre, date, description, etat)
        VALUES (:titre,:date, :description, :etat)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $forum->getTitre(),
                'date' => $forum->getDate(),
                'description' => $forum->getDescription(),
                'etat' => $forum->getEtat()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function modifier($forum, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE forum SET 
                    titre = :titre, 
                    date = :date,
                    description = :description,
                    etat = :etat
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'titre' => $forum->getTitre(),
                'date' => $forum->getDate(),
                'description' => $forum->getDescription(),
                'etat' => $forum->getEtat()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function recupererForum($id){
        $sql="SELECT * from forum where id=$id";
        $conn = new config();
        $db=$conn->getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $forum=$query->fetch();
            return $forum;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function triForum()
    {
        $sql = "SELECT * FROM forum order by titre";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function rechercheForum($rech)
    {
        $sql = "SELECT * FROM forum where forum.titre like '%$rech%' or forum.description like '%$rech%' or forum.etat like '%$rech%'";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    function count_Forum(){

        $sql="SELECT count(id) FROM forum" ;
        $db = config::getConnexion();
        try{
            $query = $db->query($sql);
            $query->execute();
               $forum_number =$query->fetchColumn();
            return $forum_number;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    function count_AvecCommentaire(){

        $sql="SELECT count(id) FROM commentaire" ;
        $db = config::getConnexion();
        try{
            $query = $db->query($sql);
            $query->execute();
               $commentaire_number =$query->fetchColumn();
            return $commentaire_number;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }   
    }
    public function afficheformumcomment($id)
{
    $sql = "SELECT * FROM forum WHERE id = $id";
    $conn = new config();
    $db = $conn->getConnexion();
    
    try {
        $query = $db->prepare($sql);
        $query->execute();
    
        $forum = $query->fetch();
    
       
        $sqlComments = "SELECT * FROM commentaire WHERE id_forum =? ";
        $queryComments = $db->prepare($sqlComments);
        $queryComments->bindParam(1 , $id, PDO::PARAM_INT);
        $queryComments->execute();
    
        $comments = $queryComments->fetchAll(PDO::FETCH_ASSOC);
    
       
        return ['forum' => $forum, 'comments' => $comments];
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
    
}
}
