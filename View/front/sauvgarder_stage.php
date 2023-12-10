<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domain = $_POST["domain"];
    $email = $_POST["email"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $num_demands = $_POST["num_demands"];
    $company_name = $_POST["company_name"];
    $description = $_POST["description"];
    $type_stage = $_POST["type_stage"]; // Add this line to get type_stage

    // Validate and sanitize data
    $domain = mysqli_real_escape_string($conn, $domain);
    $email = mysqli_real_escape_string($conn, $email);
    // Add similar lines for other fields

    // Insert data into the type_stage table if not already exists
    

    // Fetch the id_types based on nom_types
    $result = $conn->query("SELECT id_types FROM type_stage WHERE nom_types = '$type_stage'");
    $row = $result->fetch_assoc();
    $typeStageID = $row['id_types'];

    // Insert data into the stage table with the type_stage ID
    $sqlStage = "INSERT INTO stage (Domaine, date_d, date_f, capacite, nom_societe, description, email, type_stage)
                 VALUES ('$domain', '$start_date', '$end_date', '$num_demands', '$company_name', '$description', '$email', '$typeStageID')";

    if ($conn->query($sqlStage) === TRUE) {
       header("location:typestage.php");
    } else {
        echo "Error: " . $sqlStage . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>