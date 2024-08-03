<?php
    include '../../Controller/reclamation.php';
    include '../../Model/Reclamation.php';

    $reclamationC = new Rec(config::getConnexion());
    $reclamations = $reclamationC->affichage1();

    // Check if a reclamation ID is provided for deletion
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        
        // Assuming you have a method to delete a reclamation by ID
        $reclamationC->deleteReclamation($id);

        // Redirect back to the reclamations list after deletion
        header("location: affiche.php");
        exit;
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Reclamations List</title>
        <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4e8e6; /* Nude color background */
            margin: 0;
            padding: 0;
            color: #fff; /* White color for text */
        }

        h1 {
            color: #573d33; /* Dark brown color for heading */
            text-align: center;
            padding: 20px;
        }

        table {
            width: 70%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff; /* White color for table background */
            color: #573d33; /* Dark brown color for table text */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #c9b6ac; /* Light brown color for table borders */
        }

        th {
            background-color: #8c6355; /* Dark brown color for table header */
            color: #fff; /* White color for header text */
        }

        tr:hover {
            background-color: #a0756c; /* Darker brown on hover */
        }

        a.button {
            background-color: #8c6355; /* Dark brown color for buttons */
            color: #fff;
            padding: 10px;
            text-decoration: none;
            display: inline-block;
            margin: 10px;
            border-radius: 5px;
        }

        a.button:hover {
            background-color: #a0756c; /* Darker brown on hover */
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.7);
        }

        .modal-content {
            background-color: #fff; /* White color for modal content */
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #8c6355;
            width: 70%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000; /* Black color on hover/focus */
            text-decoration: none;
            cursor: pointer;
        }
        #goback {
  background-color: #765341;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  position: absolute;
  top: 550px;
  left: 730px;
}   
    </style>
    </head>

    <body>
        <h1>Reclamations List</h1>
        <table border="1">
            <tr>
                <th>Type</th>
                <th>Titre</th>
                <th>Subject</th>
                <th>Etat</th>
                <th>Action</th>
            </tr>
            <?php foreach ($reclamations as $reclamation) : 
    $typeId = $reclamation->getType();
    $type = $reclamationC->getTypeById($typeId);
    $typeName = $type['nom_type'] ?? 'Unknown';
?>
    <tr title="<?= date('Y-m-d H:i:s', strtotime($reclamation->getTimestampColumn())) ?>">
        <td><?= $typeName ?></td>
        <td><?= $reclamation->gettitre() ?></td>
        <td><?= $reclamation->getsubject() ?></td>
        <td><?= $reclamation->getEtat() ?></td>
        <td>
            <a href="#" onclick="openModal(<?= $reclamation->getIdreclamationt() ?>)">View Responses</a>
            <a href="update.php?id=<?= $reclamation->getIdreclamationt() ?>">Update</a>
            <a href="affiche.php?id=<?= $reclamation->getIdreclamationt() ?>" onclick="return confirm('Are you sure you want to delete this reclamation?')">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>
        </table>
        <tr title="<?= date('Y-m-d H:i:s', strtotime($reclamation->getTimestampColumn())) ?>">
        <!-- ... existing code ... -->
    </tr>       

    <div id="responseModal" class="modal">
        <div class="modal-content" id="modalContent">
            <!-- Responses will be loaded dynamically here -->
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
    </div>
    </div>
<button id="goback" value="go back">Go back</button>
</body>
    <script>
        document.getElementById("goback").addEventListener("click", function() {
  window.location.href = "../SignIn/compte_recruteur.php";
});
        var modal = document.getElementById('responseModal');
        var modalContent = document.getElementById('modalContent');

        function openModal(reclamationId) {
            fetch('get_responses.php?id_rec=' + reclamationId)
                .then(response => response.text())
                .then(data => {
                    modalContent.innerHTML = data;
                    modal.style.display = 'block';
                })
                .catch(error => console.error('Error fetching responses:', error));
        }

        function closeModal() {
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>



    </body>
    </html>
