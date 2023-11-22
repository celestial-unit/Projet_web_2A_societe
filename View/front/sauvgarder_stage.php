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
    $type_stage = $_POST["type_stage"];

    // Validate and sanitize data
    $domain = mysqli_real_escape_string($conn, $domain);
    $email = mysqli_real_escape_string($conn, $email);
    // Add similar lines for other fields

    // Insert data into the type_stage table
    $sqlTypeStage = "INSERT INTO type_stage (nom_types) VALUES ('$type_stage')";
    if ($conn->query($sqlTypeStage) === FALSE) {
        echo "Error: " . $sqlTypeStage . "<br>" . $conn->error;
        $conn->close();
        exit;
    }

    // Get the last inserted ID from the type_stage table
    $typeStageID = $conn->insert_id;

    // Insert data into the stage table with the type_stage ID
    $sqlStage = "INSERT INTO stage (Domaine, date_d, date_f, capacite, nom_societe, description, email, type_stage)
                 VALUES ('$domain', '$start_date', '$end_date', '$num_demands', '$company_name', '$description', '$email', '$typeStageID')";

    if ($conn->query($sqlStage) === TRUE) {
        echo "Form submitted successfully";
    } else {
        echo "Error: " . $sqlStage . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
