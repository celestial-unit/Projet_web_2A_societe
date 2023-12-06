<?php
require '../../model/type.php'; // Adjust the path accordingly
require '../../controler/type_stage.php'; // Adjust the path accordingly

$typeController = new type_s();
$types = $typeController->listetype_s();

// Check if the form is submitted for delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $typeController->delettype_s($deleteId);

}
$error = "";

$periode = null;


$typee = new type_s();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    if (
        isset($_POST["update_id"]) &&
        isset($_POST["updated_type"])
    ) {
        if (
            !empty($_POST["update_id"]) &&
            !empty($_POST['updated_type'])
        ) {
            $t = new type(
                $_POST['update_id'],
                $_POST['updated_type']
            );

            $typee->updatestage($t, $t->getIdtypestage());

            header('Location: ./update_type.php');
            exit();
        } else {
            $error = "Missing information";
        }
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type Stage List</title>
   
        <style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f7f7f7; /* Light gray background */
        display: flex;
    }

    /* Navigation Styles */
    .navigation {
        background-color: #3d2914; /* Brown color for navigation background */
        color: #fff; /* White text color */
        width: 200px;
        padding: 20px;
    }

    .navigation ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .navigation li {
        margin-bottom: 15px;
    }

    .navigation a {
        text-decoration: none;
        color: #fff; /* White text color for links */
        display: flex;
        align-items: center;
    }

    /* Main Content Styles */
    .main-content {
        flex: 1;
        padding: 20px;
    }

    /* Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #3d2914; /* Brown border for table cells */
    }

    th {
        background-color: #6a4d25; /* Darker brown color for table header */
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #e0d4bf; /* Lighter brown color for even rows */
    }

    /* Footer Styles */
    footer {
        background-color: #3d2914;
        color: #fff;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>

    
    <!-- Add your CSS links here -->
</head>
<body>

<!-- Display all types -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($types as $type) : ?>
            <tr>
                <td><?= $type['id_types'] ?></td>
                <td><?= $type['nom_types'] ?></td>
                <td>
                    <!-- Form for delete action -->
                    <form method="post" action="update_type.php">
                        <input type="hidden" name="delete_id" value="<?= $type['id_types'] ?>">
                        <button type="submit">Delete</button>
                    </form>

               
                            <!-- Form for update action -->
                            <form method="post" action="">
                                <input type="hidden" name="update_id" value="<?= $type['id_types'] ?>">
                                <input type="text" name="nom_types" value="<?= $type['nom_types'] ?>">
                                <button type="submit">Update</button>
                                
                            </form>


                    
                </td>
                
            </tr>
        <?php endforeach; ?>
       
    </tbody>
</table>
<button ><a href="add_type.php">Add Type</a></button>

</body>
</html>
