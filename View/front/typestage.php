<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-HJf1ktoKFF4ZDT0+9NloG7L5bghSYkpbPZhKR7ZdmdOnAjz5fezM5A6E5vRb7Ae2" crossorigin="anonymous">
    <style>
        body {
            
            color: #8b4513;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 10px; 
        }
        .title-up {
            margin-bottom: 10px; /* Décalage vers le haut */
            }

        form {
  margin-top: 40px; /* Décalage vers le bas */
  max-width: 400px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
div[name="choice"] {
  margin-top: 50px; /* Décalage vers le bas */
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
        .loader {
  width: 12em;
  height: 12em;
}

.loader path {
  stroke: #000;
  stroke-width: 0.6px;
  animation: dashArray 4s ease-in-out infinite,
    dashOffset 4s linear infinite;
}

@keyframes dashArray {
  0% {
    stroke-dasharray: 0 1 359 0;
  }

  50% {
    stroke-dasharray: 0 359 1 0;
  }

  100% {
    stroke-dasharray: 359 1 0 0;
  }
}

@keyframes dashOffset {
  0% {
    stroke-dashoffset: 365;
  }

  100% {
    stroke-dashoffset: 5;
  }
}

    </style>
    <title>Choix du Stage</title>
    <link rel="stylesheet" href="../signIn/compte_etudiant.css">
</head>
<body>
<div class="navigation">
<ul>
                <li>
                    <a href="../front/front_office.html">
                        <span class="icon">  
                        </span>
                        <span class="title">UniPath</span>
                    </a>
                </li>

                <li>
                    <a href="../signIn/compte_recruteur.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="../faq/faq.html">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="../front/settings_recruteur.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li id="profileLink">
                    <a href="typestage.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Profile</span>
                    </a>
                </li>

                </li>

                <li>
                    <a href="../../Model/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    <h1>Choose an option :</h1>:
    <div name="choice">
    <form action="#" method="get" onsubmit="return redirectToPage()">
    <h1 class="title-up"><i class="fas fa-cogs"></i> Choose an option :</h1>

        <label>
            <input type="radio" name="choix_stage" value="demande_stage"> <i class="fas fa-pencil-alt"></i> List of your interships
        </label>
        <br>
        <label>
            <input type="radio" name="choix_stage" value="publier_stage"> <i class="fas fa-briefcase"></i> New intership
        </label>
        <br>
        <input type="submit" value="Submit">
    </form>
    </div>

    <script>
        function redirectToPage() {
            var choix = document.querySelector('input[name="choix_stage"]:checked').value;

            if (choix === "demande_stage") {
                window.location.href = "afficher_stage.php";
            } else if (choix === "publier_stage") {
                window.location.href = "stage.php";
            }

            return false; 
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    

</body>
</html>