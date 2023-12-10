<?php

class config
{

    public  static function getConnexion()
    {
        try {

            $pdo = new PDO(
                'mysql:host=localhost;dbname=unipath_db',
                'root',
                '',


                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]


            );

            // echo "connected successfully";
        } catch (PDOException $e) {

            echo " Erreur :" . $e->getMessage();
        }

        return $pdo;
    }
}