<?php
require '../../Controller/type_stage.php';  // Adjust the path accordingly
require '../../Model/type.php';  // Adjust the path accordingly

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newTypeValue = $_POST['new_type'];
    $newType = new type(null,$newTypeValue);

    $typeController = new type_s();
    $typeController->addStage($newType);

    // Redirect or other actions after adding
    header('Location:update_type.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Type</title>
    <link rel="stylesheet" href="../back/css/add_type.css">
</head>
<body>
    <form class="form" method="post" action="add_type.php">
        <header>
            Add type information
            <span class="message">Let's add a new type.</span>
        </header>
        
        <label>
            <span>New type</span>
            <input name="new_type" placeholder="Type" class="input" type="text" required="">
        </label>
        
        <div class="submitCard">
            <button type="submit">Add Type</button>
        </div>
    </form>
</body>
</html>
