<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <!-- ======= Styles ====== -->
    <style>
.cardBox {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 130px; /* Adjusted overall grid gap (100px margin + 30px grid gap) */
}

.cardBox .card {
  position: relative;
  background: var(--white);
  width: 300px;
  height: 300px;
  padding: 20px;
  border-radius: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  margin-right: 100px; /* 100px margin between the cards */
  margin-left: 200px;
  margin-top: 50px;
}

.cardBox .card:last-child {
  margin-right: 0; /* Remove margin for the last card in the row */
}

.cardBox .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 2.5rem;
  color: var(--blue);
}

.cardBox .card .cardName {
  color: var(--black2);
  font-size: 1.1rem;
  margin-top: 5px;
}

.cardBox .card .iconBx {
  font-size: 3.5rem;
  color: var(--black2);
}

.cardBox .card:hover {
  background: var(--blue);
}

.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx {
  color: var(--white);
}



    </style>
    <link rel="stylesheet" href="../signIn/espace_admin.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    
    <div class="container">
    
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
                    <a href="#">
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
                    <a href="choose_complaint1.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Complaints</span>
                    </a>
                </li>

                <li>
                    <a href="../front/settings_etudiant.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li id="profileLink">
                    <a href="#">
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

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

               

                <div class="user">
                 <a href="../front/front_office.html">
                    <img src="../../assets/logo.png" alt="photo of the logo">
                </a>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
    <button class="card" onclick="window.location.href='../front/add_rec1.php'">
        <div>
            <div class="numbers">Add complaints</div>
            <div class="cardName"></div>
        </div>
        
    </button>

    <button class="card" onclick="window.location.href='../front/affiche1.php'">
        <div>
            <div class="numbers">Show complaints</div>
            <div class="cardName"></div>
        </div>
        
    </button>
</div>

              <!-- ================ Order Details List ================= -->
              
                


                <!-- ================= New Customers ================ -->
             
            </div>
        </div>
       
    </div>
    <!-- =========== Scripts =========  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
