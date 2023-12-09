<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disable User</title>

    <!-- Intégrer le style CSS ici -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5; /* Couleur de fond de la page */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .delete-form {
            background-color: #fff; /* Couleur de fond du formulaire */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
            padding: 20px;
            border-radius: 8px; /* Coins arrondis */
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc; /* Couleur des bordures */
            border-radius: 4px; /* Coins arrondis */
        }

        button {
            background-color: #d9534f; /* Couleur rouge pour le bouton de suppression */
            color: #fff; /* Couleur du texte blanc */
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px; /* Coins arrondis */
            cursor: pointer;
        }
    </style>
</head>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<body>
    <div class="delete-form">
        <h2>Able User</h2>
        <form id="deleteUserForm" method='get' action='get_ableduser_by_admin.php'>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter user's email" required>
            </div>
            <button type="button" id="able">Abled</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            // Ajoutez un gestionnaire d'événements de clic au bouton Disable
            $("#able").on("click", function () {
                // Récupérez la valeur de l'email
                var emailToAble = $("#email").val();
                
                // Utilisez AJAX pour appeler le script PHP
                $.ajax({
                    url: 'get_ableduser_by_admin.php',
                    type: 'GET',
                    data: { email: emailToAble },
                    success: function (response) {
                        console.log(response);
                        // Affichez la réponse du serveur (par exemple, un message de succès)
                        alert(response);
                        window.location.href = 'affichage_users.php';
                    },
                    error: function (error) {
                        console.error('Erreur lors de la désactivation d\'utilisateur:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>
