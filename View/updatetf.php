<?php
include_once '../Controller/typeformationC.php';
$error = "";
$typeformationC = new typeformationC();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if required fields are set
    if (isset($_POST["id_typeformation"]) && isset($_POST["domaine"]) && isset($_POST["description"])) {
        if (!empty($_POST["id_typeformation"]) && !empty($_POST["domaine"]) && !empty($_POST["description"])) {
            // Create a typeformation object with form data
            $typeformation = new typeformation(
                $_POST["id_typeformation"],
                $_POST["domaine"],
                $_POST["description"]
            );

            // Update the record in the database
            $typeformationC->update($typeformation, $_POST["id_typeformation"]);

            // Redirect to the listing page
            header('Location: crudtypeformation.php');
            exit();
        } else {
            $error = "Missing information";
        }
    }
}

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    // Retrieve the record for the specified 'id'
    $idFormationToUpdate = $_GET['id'];
    $typeoftraining = $typeformationC->showFormation($idFormationToUpdate);

    // Check if the record exists
    if (!$typeoftraining) {
        echo 'Record not found';
        exit();
    }
} else {
    echo 'ID not provided';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <header>
        <div class="survey-header">
            <h1 id="title">Form for type of training edited by admin</h1>
            <p id="description">Edit type of training!</p>
        </div>
    </header>

    <main>
        <div class="survey-container">
            <form id="survey-form" method="POST">

                <!-- Hidden input for id_typeformation -->
                <input type="hidden" name="id_typeformation" value="<?php echo $typeoftraining['id_typeformation']; ?>">

                <!-- Domaine input -->
                <div class="survey-element" id="survey-name">
                    <label for="domaine">Domaine</label>
                    <input type="text" name="domaine" id="domaine" value="<?php echo $typeoftraining['domaine']; ?>">
                </div>

                <!-- Description input -->
                <div class="survey-element" id="survey-name">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="7"><?php echo $typeoftraining['description']; ?></textarea>
                </div>

                <!-- Submit and reset buttons -->
                <div class="survey-element" id="survey-name" align="center">
                    <input type="submit" value="Update" id="update">
                    <input type="reset" value="Reset">
                </div>
            </form>
        </div>
    </main>
</body>

<script>
  function switchpage1()
{
    var b = document.getElementById("update");
    b.addEventListener("update", function (e) {
        e.preventDefault();
        header('Location: newcrudview.php');
    });
}
</script>
</html>
