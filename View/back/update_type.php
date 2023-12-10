<?php
require '../../Model/type.php'; // Adjust the path accordingly
require '../../Controller/type_stage.php'; // Adjust the path accordingly

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
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 80%; /* Adjust the width as needed */
            margin-top: 20px;
            background-color: #ead7aa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #d0a45f;
            border-radius: 8px;
        }

        table, th, td {
            border: 1px solid #d0a45f;
        }

        th, td {
            padding: 10px;
            text-align: left;
            font-size: 14px;
            color: #634b35;
        }

        th {
            background-color: #c3a078;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #dbc3a0;
        }

        tr:hover {
            background-color: #d0a45f;
            color: #fff;
        }

        h1 {
            color: #634b35;
            margin-bottom: 20px;
        }
        button.return{
            background-color: #634b35; /* Couleur bleue pour le bouton de modification */
            color: #fff; /* Couleur du texte blanc */}
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
<button onclick="goBack()">Go Back</button>

<script>
    function goBack() {
        window.location.href = './chose_intership.php';
    }
</script>
</body>
</html>
