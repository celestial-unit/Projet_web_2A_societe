<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-HJf1ktoKFF4ZDT0+9NloG7L5bghSYkpbPZhKR7ZdmdOnAjz5fezM5A6E5vRb7Ae2" crossorigin="anonymous">
    <style>
        body {
            background-color: #ffdab9;
            color: #8b4513;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #8b4513;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #654321;
        }

        i.fas {
            margin-right: 5px;
        }

        i.fab.fa-twitter {
            color: #1da1f2;
        }

        i.fab.fa-facebook {
            color: #1877f2;
        }
    </style>

    <title>Choix du Stage</title>
</head>
<body>

    <h1>Choisissez une option :</h1>

    <form action="#" method="get" onsubmit="return redirectToPage()">
    <h1><i class="fas fa-cogs"></i> Choisissez une option :</h1>

    <label>
        <input type="radio" name="choix_stage" value="demande_stage"> <i class="fas fa-pencil-alt"></i> Demande de stage
    </label>
    <br>
    <label>
        <input type="radio" name="choix_stage" value="publier_stage"> <i class="fas fa-briefcase"></i> Publier un stage
    </label>
    <br>
    <input type="submit" value="Valider">
</form>

    <script>
        function redirectToPage() {
            var choix = document.querySelector('input[name="choix_stage"]:checked').value;

            if (choix === "demande_stage") {
                window.location.href = "demandestage.php";
            } else if (choix === "publier_stage") {
                window.location.href = "stage.php";
            }

            return false; 
        }
    </script>

</body>
</html>

