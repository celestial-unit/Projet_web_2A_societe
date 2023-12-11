<?php
// Database connection details
$host = "localhost";
$dbname = "unipath_db";
$username = "root";
$password = "";

// Function to retrieve reclamations data from the database
function getReclamationsData() {
    global $host, $dbname, $username, $password;

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute SQL statement to select reclamations data
        $stmt = $conn->query("SELECT * FROM reclamation");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    } finally {
        // Close the database connection
        $conn = null;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the response from the form
    $response = $_POST["response"];

    // Retrieve the id_rec from the URL
    $idRec = $_GET["id"];

    try {
        // Create a PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Start a transaction
        $conn->beginTransaction();

        // Prepare the SQL statement to insert into 'repose' table
        $stmtRepose = $conn->prepare("INSERT INTO repose (id_reponse, rep) VALUES (NULL, :response)");
        $stmtRepose->bindParam(':response', $response);
        $stmtRepose->execute();

        // Retrieve the last inserted id_reponse
        $lastIdReponse = $conn->lastInsertId();

        // Update 'reclamation' table with the new id_reponse
        $stmtUpdateReclamation = $conn->prepare("UPDATE reclamation SET reponse = :lastIdReponse WHERE id_rec = :idRec");
        $stmtUpdateReclamation->bindParam(':lastIdReponse', $lastIdReponse);
        $stmtUpdateReclamation->bindParam(':idRec', $idRec);
        $stmtUpdateReclamation->execute();

        // Commit the transaction
        $conn->commit();

        // Redirect back to the original page or wherever you need
        header("location: reclamation_BACK.php");
        exit;
    } catch (PDOException $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    } finally {
        // Close the database connection
        $conn = null;
    }
}

// Initialize $tab with data
$tab = getReclamationsData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... Existing head content ... -->
    
    <!-- ... Existing head content ... -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .main {
            padding: 20px;
            background-color: #f7f3ed; /* Light brown color for main background */
            margin-top: 20px;
            border-radius: 8px;
        }

        h2 {
            color: #4f3b36; /* Dark brown color for heading */
        }

        form {
            display: flex;
            flex-direction: column;
            margin-top: 15px;
        }

        label {
            margin-bottom: 8px;
            color: #4f3b36; /* Dark brown color for label */
        }

        textarea {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #4f3b36; /* Dark brown color for textarea border */
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #926c63; /* Medium brown color for button background */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #7a584f; /* Darker brown on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main">
            <!-- Response Form -->
            <div class="container">
                <h2>Reponse Form</h2>
                <form action="./reponse.php?id=<?php echo $_GET['id']; ?>" method="post">
                    <!-- Include id_rec in the form action -->
                    <label for="response">Your Response:</label>
                    <textarea id="response" name="response" required></textarea>
                    <button type="submit">Submit Response</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
