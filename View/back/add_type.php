<?php
require '../../Controller/type_stage.php';  // Adjust the path accordingly
require '../../Model/type.php';  // Adjust the path accordingly

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newTypeValue = $_POST['new_type'];
    $newType = new type(null, $newTypeValue);

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
    
    <style>
        body {
            background-color: #f0eae2; /* Ivory */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 15px;
            color: #4e4038; /* Brown - Dark */
        }

        .message {
            color: #6d635e; /* Brown - Medium */
        }

        label {
            display: block;
            margin-bottom: 15px;
            color: #4e4038; /* Brown - Dark */
        }

        span {
            display: block;
            margin-bottom: 5px;
            color: #6d635e; /* Brown - Medium */
        }

        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #b3a495; /* Brown - Light */
            border-radius: 4px;
            box-sizing: border-box;
            color: #4e4038; /* Brown - Dark */
        }

        button {
            background-color: #4e4038; /* Brown - Dark */
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #63564f; /* Brown - Dark (Slightly lighter) */
        }

        .submitCard {
            text-align: right;
        }
    </style>
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