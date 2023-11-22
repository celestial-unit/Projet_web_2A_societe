


<?php
include "../../controler/stage.php";

$c = new sta();
$tab = $c->liststage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./demende_stage.css">
    <title>Demande de stage</title>
    <style>
        /* Reset some default styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        /* Header Styles */
        header {
            background-color: #c15f26;
            color: white;
            padding: 1.2rem;
            text-align: center;
            min-height: 30vh;
        }

        /* Main Content Styles */
        main {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Container Styles */
        .container {
            text-align: center;
            width: 80%; /* Adjust the width as needed */
            margin: 20px auto; /* Center the container */
            padding: 20px;
            background-color: #f9f3e6; /* Cream background color */
            border-left: 10px solid #8b4513; /* Brown band on the left */
        }

        /* Table Styles */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        /* Header Cell Styles */
        th {
            background-color: #c15f26;
            color: white;
        }

        /* Hover Effect on Table Rows */
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <header>
        <h1>N'hésitez pas à contacter les entreprises pour plus d'informations sur les offres de stage qui vous intéressent</h1>
        <div>
        <a href="./front_office.php"><button>Go to Front</button></a>
        <a href="./typestage.php"><button>Go to Demande</button></a>
    </div>
    </header>
    
    <div class="container">
        <table border="1" align="center">
            <tr>
                <th>Domain</th>
                <th>Email</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Number of Demands</th>
                <th>Company Name</th>
                <th>Description</th>
                <th>Type de Stage</th> <!-- New header cell -->
            </tr>

            <?php foreach ($tab as $s) { ?>
                <tr>
                    <td><?= $s['Domaine']; ?></td>
                    <td><?= $s['email']; ?></td>
                    <td><?= $s['date_d']; ?></td>
                    <td><?= $s['date_f']; ?></td>
                    <td><?= $s['capacite']; ?></td>
                    <td><?= $s['nom_societe']; ?></td>
                    <td><?= $s['description']; ?></td>
                    <td><?= $s['type_stage']; ?></td> <!-- Display the Type de Stage -->

                    <td align="center">nom_types
                        <form method="POST" action="./demandestage.php">
                            <input type="hidden" value="<?= $s['id_stage']; ?>" name="idstage">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
