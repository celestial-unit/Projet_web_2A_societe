<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";



class Club
{
    // Properties
    public $name;
    public $description;
    public $clubImage;
    public $links;
    public $university;
    public $city;
    public $country;
    public $field;
    public $postal;
    public $street;
    public $clubMail;

    function showClubAdmin()
    {
        $pdo = Config::getConnexion();
        $query = "SELECT club.*, location.country, location.city, location.university, location.street, location.postal FROM club INNER JOIN location ON club.clubMail = location.clubMail
       ";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($clubs as $club) {
            echo '<li>
                <figure>
                <img src="' . $club['clubImage'] . '" alt=""> 
                    <p>' . $club['name'] . '</p>
                    <form id="contact" action"../Controller/disclub.php" method="POST">
                        <p>' . $club['clubMail'] . '</p>
                        <p>club link :<a href="' . $club['links'] . '" target="_blank">' . $club['name'] . '</a></p>
                        <p>club field :' . $club['field'] . ' </p>
                        <p>club status: ' . $club['Status'] . '</p>
                        <p>club description :' . $club['description'] . ' </p>
                        
                    <figcaption>
                        
                        <iframe width="50%" height="200" src="https://maps.google.com/maps?q= '.$club['country'] . $club['city'] . $club['university']. $club['street']. $club['postal'].'&output=embed"></iframe>
                        <div class="buttons">
                        <button onclick="window.location.href=\'../Controller/disclub.php?clubMail=' . $club['clubMail'] . '\'" class="btn">
                        <span></span>   
                        <p data-start="good luck!" data-text="sure?" data-title="Delete"></p>
                    </button>
                        </div>
                        </form>
                    </figcaption>
                </figure>
            </li>';

        }
    }
    function showDashAdmin($pageNumber = 1, $clubsPerPage = 3)
    {
        $pdo = Config::getConnexion();
        $offset = ($pageNumber - 1) * $clubsPerPage;

        $query = "SELECT club.*, location.country, location.city, location.university 
                FROM club ²
                INNER JOIN location ON club.clubMail = location.clubMail
                LIMIT :clubsPerPage OFFSET :offset";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':clubsPerPage', $clubsPerPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        //$stmt->execute();
        $clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($clubs as $club) {
            echo '<div class="card">
                    <img src="' . $club['clubImage'] . '" alt="Description" width="100%" height="100%">
                    <div class="card__content">
                        <p class="card__title"> '. $club['name'] .'</p>
                        <p class="card__description">' . $club['description'] . '</p>
                        <a class="card__button" href="' . $club['links'] . '">Socials</a>
                        <a href="clubView.php?clubMail=' . $club['clubMail'] . '" class="card__button secondary">more</a>
                        <button onclick="window.location.href=\'../Controller/disclub.php?clubMail=' . $club['clubMail'] . '\'" class="btn">
                        <span></span>   
                        <p data-start="good luck!" data-text="sure?" data-title="Delete"></p>
                    </button>
                    </div>
                </div>';
        }

        // Display pagination links
        $totalClubs = $this->getTotalClubs();  // Implement this method to get the total number of clubs
        $totalPages = ceil($totalClubs / $clubsPerPage);

        if ($pageNumber > 1) {
            echo '<a href="?page=' . ($pageNumber - 1) . '">Previous</a>';
        }

        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a>';
        }

        if ($pageNumber < $totalPages) {
            echo '<a href="?page=' . ($pageNumber + 1) . '">Next</a>';
        }
    }

    function showClub($pageNumber = 1, $clubsPerPage = 3)
    {
        $pdo = Config::getConnexion();
        $offset = ($pageNumber - 1) * $clubsPerPage;

        $query = "SELECT club.*, location.country, location.city, location.university 
                FROM club 
                INNER JOIN location ON club.clubMail = location.clubMail
                WHERE club.Status = 'Active'
                LIMIT :clubsPerPage OFFSET :offset";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':clubsPerPage', $clubsPerPage, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($clubs as $club) {
            echo '<div class="card">
                    <img src="' . $club['clubImage'] . '" alt="Description" width="100%" height="100%">
                    <div class="card__content">
                        <p class="card__title"> '. $club['name'] .'</p>
                        <p class="card__description">' . $club['description'] . '</p>
                        <a class="card__button" href="' . $club['links'] . '">Socials</a>
                        <a href="clubView.php?clubMail=' . $club['clubMail'] . '" class="card__button secondary">more</a>
                    </div>
                </div>';
        }

        // Display pagination links
        $totalClubs = $this->getTotalClubs();  // Implement this method to get the total number of clubs
        $totalPages = ceil($totalClubs / $clubsPerPage);

        if ($pageNumber > 1) {
            echo '<a href="?page=' . ($pageNumber - 1) . '">Previous</a>';
        }

        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a href="?page=' . $i . '">' . $i . '</a>';
        }

        if ($pageNumber < $totalPages) {
            echo '<a href="?page=' . ($pageNumber + 1) . '">Next</a>';
        }
    }

    // Implement this method to get the total number of clubs
    private function getTotalClubs()
    {
        $pdo = Config::getConnexion();
        $query = "SELECT COUNT(*) as total FROM club WHERE Status = 'Active'";
        $stmt = $pdo->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    private function getTotalClubadmin()
    {
        $pdo = Config::getConnexion();
        $query = "SELECT COUNT(*) as total FROM club WHERE Status = 'Active'";
        $stmt = $pdo->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function disableClub($clubMail, $pdo)
    {
        try {
            $stmt = $pdo->prepare("UPDATE club SET Status = 'Disabled' WHERE clubMail = ?");
            $stmt->execute([$clubMail]);
            return true;
        } catch (PDOException $e) { // Fixed typo: "pdoException" to "PDOException"
            error_log('Error disabling the club: ' . $e->getMessage());
            return false;
        }
    }
    public function getClubsByPage($pageNumber, $clubsPerPage, $lastClubMail)
    {
        $pdo = Config::getConnexion();
        $offset = ($pageNumber - 1) * $clubsPerPage;

        $query = "SELECT club.*, location.country, location.city, location.university 
                  FROM club 
                  INNER JOIN location ON club.clubMail = location.clubMail
                  WHERE club.clubMail > ?
                  ORDER BY club.clubMail 
                  LIMIT ? OFFSET ?";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$lastClubMail, $clubsPerPage, $offset]);
        $clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //self::$clubs = $clubs;
        
        
    }
    
    
    
}


class Config
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
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
