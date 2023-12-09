<?php
// Connect to your database (replace these variables with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unipath_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $id_stage = $_POST["id_stage"];
    $domaine = $_POST["domaine"];
    $date_d = $_POST["date_d"];
    $date_f = $_POST["date_f"];
    $capacite = $_POST["capacite"];
    $nom_societe = $_POST["nom_societe"];
    $description = $_POST["description"];
    $email = $_POST["email"];

    // Update the record in the "stage" table
    $sql = "UPDATE stage SET 
            domaine = '$domaine',
            date_d = '$date_d',
            date_f = '$date_f',
            capacite = '$capacite',
            nom_societe = '$nom_societe',
            description = '$description',
            email = '$email'
            WHERE id_stage = '$id_stage'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Retrieve the id_stage from the URL parameter
$id_stage = $_GET["id"];

// Retrieve the existing data for the specified id_stage
$sql = "SELECT * FROM stage WHERE id_stage = '$id_stage'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Display a form with the existing data for the user to update
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Stage Information</title>
    </head>
    <body>
        <h2>Update Stage Information</h2>
        <form method="post" action="">
            <input type="hidden" name="id_stage" value="<?php echo $row["id_stage"]; ?>">
            Domaine: <input type="text" name="domaine" value="<?php echo $row["Domaine"]; ?>"><br>
            Date Début: <input type="text" name="date_d" value="<?php echo $row["date_d"]; ?>"><br>
            Date Fin: <input type="text" name="date_f" value="<?php echo $row["date_f"]; ?>"><br>
            Capacité: <input type="text" name="capacite" value="<?php echo $row["capacite"]; ?>"><br>
            Nom Société: <input type="text" name="nom_societe" value="<?php echo $row["nom_societe"]; ?>"><br>
            Description: <input type="text" name="description" value="<?php echo $row["description"]; ?>"><br>
            Email: <input type="text" name="email" value="<?php echo $row["email"]; ?>"><br>
            <input type="submit" value="Update">
        </form>
    </body>
    </html>
    <?php
} else {
    echo "Record not found";
}

$conn->close();
?>
