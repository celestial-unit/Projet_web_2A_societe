<?php
include "../../controler/stage.php";

$c = new sta();
$tab = $c->liststage();
$c = new sta();
$totalStages = $c->countStages();

    echo "Total Stages: " . $totalStages;

$itemsPerPage = 4;
$totalItems = $c->countStages(); 
$totalPages = ceil($totalItems / $itemsPerPage);
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;
$tab = $c->liststage($offset, $itemsPerPage);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Demande de Stage</title>
   
    <style>
          
          body {
            background-color: #e1ccb8; /* Creme */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #705d56; /* Brown */
            color: #e1ccb8; /* Creme */
            text-align: center;
            padding: 20px;
        }

        .row-container {
            position: relative;
            border: 2px solid #705d56; /* Brown */
            border-radius: 8px;
            margin: 20px 0;
            padding: 20px;
            background-color: #f2e1cf; /* Caramel */
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .row-details {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            border: 2px solid #705d56; /* Brown */
            border-radius: 8px;
            padding: 30px;
            background-color: #f2e1cf; /* Caramel */
            max-width: 800px;
            text-align: left;
        }

        .row-container:hover {
            background-color: #e8d8c6; /* Lighter Caramel */
        }

        label {
            color: #705d56; /* Brown */
            margin-right: 5px;
        }

        input {
            padding: 10px;
            border: 1px solid #705d56; /* Brown */
            border-radius: 4px;
            width: 200px;
        }

        button {
            background-color: #705d56; /* Brown */
            color: #e1ccb8; /* Creme */
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        button:hover {
            background-color: #8c756d; /* Darker Brown */
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #705d56; /* Brown */
            color: #e1ccb8; /* Creme */
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 3;
        }

        .modal-content {
            background-color: #ffffff;
            border: 2px solid #34495e;
            border-radius: 8px;
            padding: 30px;
            max-width: 800px;
            text-align: left;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            font-size: 20px;
            color: #34495e;
        }
    </style>
</head>
<body>
    <header>
        <h1>Les offres de stage</h1>
        <div>
            <label for="search">Search: </label>
            <input type="text" id="search" oninput="searchTable()" placeholder="Enter search term">
            <div>
                <a href="./front_office.php"><button>Go to Front</button></a>
                <a href="./typestage.php"><button>Go to Demande</button></a>
            </div>
        </div>
    </header>

    <?php
    foreach ($tab as $s) {
    ?>
        <div class="row-container" onclick="showModal('<?= $s['Domaine']; ?>', '<?= $s['email']; ?>', '<?= $s['date_d']; ?>', '<?= $s['date_f']; ?>', '<?= $s['capacite']; ?>', '<?= $s['nom_societe']; ?>', '<?= $s['description']; ?>', '<?= $s['type_stage']; ?>')">
            <div><strong>Domain:</strong> <?= $s['Domaine']; ?></div>
            <div><strong>Description:</strong> <?= $s['description']; ?></div>
            <div><strong>typestage:</strong> <?= $s['type_stage']; ?></div>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://localhost:8080'); ?>" target="_blank">
                           Partagez
            </a>
        
        </div>
        <div style="margin-top: 10px;">
    
</div>

    <?php
    }
    ?>

    <div id="myModal" class="modal">
        <div class="modal-content">
        <span class="close-btn" onclick="hideModal()">&times;</span>
            <div><strong>Domain:</strong> <span id="modalDomain"></span></div>
            <div><strong>Email:</strong> <span id="modalEmail"></span></div>
            <div><strong>Start Date:</strong> <span id="modalStartDate"></span></div>
            <div><strong>End Date:</strong> <span id="modalEndDate"></span></div>
            <div><strong>Number of Demands:</strong> <span id="modalDemands"></span></div>
            <div><strong>Company Name:</strong> <span id="modalCompanyName"></span></div>
            <div><strong>Description:</strong> <span id="modalDescription"></span></div>
            <div><strong>Type de Stage:</strong> <span id="modalType"></span></div>
        </div>
    </div>
    
    <div style="text-align: center; margin-top: 20px;">
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <a href="?page=<?= $i ?>" style="margin-right: 5px;"><?= $i ?></a>
        <?php endfor; ?>
    </div>


    <footer>
        &copy; 2023 unipath
    </footer>

    <script>
        function searchTable() {
            var input = document.getElementById('search');
            var filter = input.value.toUpperCase();
            var rows = document.getElementsByClassName('row-container');

            for (var i = 0; i < rows.length; i++) {
                var rowText = rows[i].innerText || rows[i].textContent;

                rows[i].style.display = rowText.toUpperCase().indexOf(filter) > -1 ? '' : 'none';
            }
        }

        function showModal(domain, email, startDate, endDate, demands, companyName, description, type) {
            document.getElementById('modalDomain').innerText = domain;
            document.getElementById('modalEmail').innerText = email;
            document.getElementById('modalStartDate').innerText = startDate;
            document.getElementById('modalEndDate').innerText = endDate;
            document.getElementById('modalDemands').innerText = demands;
            document.getElementById('modalCompanyName').innerText = companyName;
            document.getElementById('modalDescription').innerText = description;
            document.getElementById('modalType').innerText = type;

            document.getElementById('myModal').style.display = 'flex';
        }
        function hideModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script>
</body>
</html>

