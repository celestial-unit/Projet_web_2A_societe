<?php
class Personne
{ 
    public $cin;
    public $Nom;
    public $Prenom;
    public $email;
    public $age;
    public $tel;
    public $role;
    public $pwd;
    public $diplome;
    public $level;
    public $Type_formateur;
    public $status;
   
    public function show($personne)
    {
        echo '<table border="1">';
        echo"<tr><td>First Name</td><td>Last Name</td><td>Email</td><td>pwd</td><td>role</td><td>CIN</td><td>Level</td><td>Diploma</td></td><td>Num</td><td>Age</td></tr>";
        echo "<td>".$personne->Prenom."</td>";
        echo "<td>".$personne->Nom."</td>";
        echo "<td>".$personne->email."</td>";
        echo "<td>".$personne->pwd."</td>";
        echo "<td>".$personne->role."</td>";
        echo "<td>".$personne->cin."</td>";
        echo "<td>".$personne->level."</td>";
        echo "<td>".$personne->diplome."</td>";
        echo "<td>".$personne->tel."</td>";
        echo "<td>".$personne->age."</td>";
    }
    public function getUserByEmail($email, $pdo) {
        // Préparez la requête SQL
        $query = "SELECT * FROM personne WHERE Email = :email";
        $stmt = $pdo->prepare($query);
    
        // Exécutez la requête en liant le paramètre :email
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    
        // Récupérez la première ligne du résultat
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $user; // Retourne un tableau associatif avec les données de l'utilisateur, ou false si l'utilisateur n'est pas trouvé.
    }
           
    public function setValuesFromSession()
    {
        $this->cin = $_SESSION['user']['cin'];
        $this->Nom = $_SESSION['user']['Nom'];
        $this->Prenom = $_SESSION['user']['Prenom'];
        $this->email = $_SESSION['user']['Email'];
        $this->age = $_SESSION['user']['Age'];
        $this->tel = $_SESSION['user']['Numero'];
        $this->role = $_SESSION['user']['Role'];
        $this->diplome = $_SESSION['user']['Diplome'];
        $this->level = $_SESSION['user']['Niveau'];
        $this->status = $_SESSION['user']['Status'];
    }
    public function getCurrentPasswordHash($userEmail,$pdo)
    {
        $stmt = $this->$pdo->prepare("SELECT mdp FROM personne WHERE Email = ?");
        $stmt->execute([$userEmail]);

        $result = $stmt->fetchColumn();

        return $result !== false ? $result : null;
    }

    public function updatePassword($userEmail, $newPassword, $pdo)
{
    try {
        $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("UPDATE personne SET mdp = ? WHERE Email = ?");
        $stmt->execute([$newPasswordHash, $userEmail]);

        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

public function desableaccount($userEmail,$pdo)
{
    try 
    {
        $stmt = $pdo->prepare("UPDATE personne SET Status = ? WHERE Email = ?");
        $stmt->execute(['Disabled', $userEmail]);
        return true;

    } 
    catch (PDOException $e)
     {
        // Gérer les erreurs de base de données
        error_log('Erreur : ' . $e->getMessage());
        return false;
    }
}
public function ableaccount($userEmail,$pdo)
{
    try 
    {
        $stmt = $pdo->prepare("UPDATE personne SET Status = ? WHERE Email = ?");
        $stmt->execute(['Abled', $userEmail]);
        return true;

    } 
    catch (PDOException $e)
     {
        // Gérer les erreurs de base de données
        error_log('Erreur : ' . $e->getMessage());
        return false;
    }
}

function getAssociativeArrayFromDatabase($pdo, $email) 
{
    $query = "SELECT * FROM personne WHERE Email='$email'";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

public function showUserList()
    {
        $pdo = config::getConnexion();

        // Retrieve all users from the database
        $query = "SELECT * FROM personne";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display the list of users
        echo '<table border="1">';
        echo "<tr><td>First Name</td><td>Last Name</td><td>Email</td><td>Role</td><td>CIN</td><td>Age</td><td>Phone number</td><td>ID</td><td>Level</td><td>Diploma</td><td>Recruter Domain</td><td>Status</td><td>Recruiter Title</td></tr>";

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user['Prenom'] . "</td>";
            echo "<td>" . $user['Nom'] . "</td>";
            echo "<td>" . $user['Email'] . "</td>";
            echo "<td>" . $user['Role'] . "</td>";
            echo "<td>" . $user['CIN'] . "</td>";
            echo "<td>" . $user['Age'] . "</td>";
            echo "<td>" . $user['Tel'] . "</td>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['Niveau'] . "</td>";
            echo "<td>" . $user['Diplome'] . "</td>";
            echo "<td>" . $user['Domaine_recruteur'] . "</td>";
            echo "<td>" . $user['Status'] . "</td>";
            echo "<td>" . $user['Titre_recruteur'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    public function deleteUserByEmail($email, $pdo)
{
    try {
        // Vérifier d'abord si l'utilisateur existe
        $user = $this->getUserByEmail($email, $pdo);

        if ($user) {
            // L'utilisateur existe, supprimer de la base de données
            $stmt = $pdo->prepare("DELETE FROM personne WHERE Email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            return true; // Retourner true si la suppression réussit
        } else {
            // L'utilisateur n'existe pas
            return false;
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de base de données
        error_log('Erreur : ' . $e->getMessage());
        return false; // Retourner false en cas d'erreur
    }
}

    
    
    

}
class config
{
     private static $pdo = null;
     public static function getConnexion()
     {
     if (!isset(self::$pdo)) {
            try {
            self::$pdo = new PDO(
            'mysql:host=localhost;dbname=unipath_db',
            'root',
            '',
            [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
            );
           // echo "connected successfully";
            } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
            }
            }
            return self::$pdo;
            }
}
?>
