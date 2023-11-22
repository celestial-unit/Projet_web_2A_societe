<?php

require 'C:\wamp64\www\Stage\config.php';

class sta
{
    public function liststage()
    {
        $sql = "SELECT stage.*, type_stage.nom_types AS type_stage
                FROM stage 
                LEFT JOIN type_stage ON stage.type_stage = type_stage.id_types";
    
        $db = config::getConnexion();
    
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    
    

    function deletsatge($id_stage)
    {
        $sql = "DELETE FROM stage WHERE id_stage = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_stage);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

 
    public function addStage($sta)
    {
        $sql = "INSERT INTO stage  
                VALUES (NULL, :domain, :email, :date_d, :date_f, :capacite, :nom_societe, :description)";
    
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'domain' => $sta->getDomain(),
                'email' => $sta->getEmail(),
                'date_d' => $sta->getStartDate()->format('Y-m-d'), // Assuming 'Y-m-d' is the correct format
                'date_f' => $sta->getEndDate()->format('Y-m-d'), // Assuming 'Y-m-d' is the correct format
                'capacite' => $sta->getNumDemands(),
                'nom_societe' => $sta->getCompanyName(),
                'description' => $sta->getDescription(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    


    function showStage($id_stage)
    {
        $sql = "SELECT * FROM stage WHERE id_stage = :id_stage";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_stage', $id_stage);
            $query->execute();
            $stage = $query->fetch();
            return $stage;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    

    function updatestage($sta, $id_stage)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE stage SET 
                    domain = :domain, 
                    email = :email, 
                    start_date = :start_date, 
                    date_f = :date_f, 
                    capacite = :capacite, 
                    nom_societe = :nom_societe, 
                    description = :description
                WHERE id_stage = :id_stage'
            );
            $query->execute([
                'id_stage' => $id_stage,
                'domain' => $sta->getDomain(),
                'email' => $sta->getEmail(),
                'start_date' => $sta->getStartDate()->format('Y-m-d'), // Assuming that getStartDate returns a DateTime object
                'date_f' => $sta->getEndDate()->format('Y-m-d'), // Assuming that getEndDate returns a DateTime object
                'capacite' => $sta->getNumDemands(),
                'nom_societe' => $sta->getCompanyName(),
                'description' => $sta->getDescription(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage(); // Print the error message for debugging purposes
        }
    }
    

    
    public function getStageById($id) 
    {
        $sql = "SELECT * FROM stage WHERE id_stage = :id";
        $db = config::getConnexion();
    
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo ('error' . $e->getMessage());
        }
    }
}
?>
