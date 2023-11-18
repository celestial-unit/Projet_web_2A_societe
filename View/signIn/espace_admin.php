<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../signIn/compte_etudiant.css">
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
                    <a href="affichage_users.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">user management</span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">internship management</span>
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">club management</span>
                    </a>
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

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                 <a href="../front/front_office.html">
                    <img src="../../assets/logo.png" alt="photo of the logo">
                </a>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">100</div>
                        <div class="cardName">Number of users</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
             <!-- ======================= Cards ================== -->
                <div class="card">
                    <div>
                        <div class="numbers">20</div>
                        <div class="cardName">Intership sharing</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">100</div>
                        <div class="cardName">club sharing</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">1000dt</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
              <!-- ================ Order Details List ================= -->
              <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>David</td>
                                <td>Paid</td>
                                <td><span class="status delivered">abled</span></td>
                            </tr>

                            <tr>
                                <td>Julia</td>
                                <td>Not paid</td>
                                <td><span class="status pending">abled</span></td>
                            </tr>

                            <tr>
                                <td>Mariem</td>
                                <td>Paid</td>
                                <td><span class="status return">disabled</span></td>
                            </tr>

                            <tr>
                                <td>Zied</td>
                                <td>Paid</td>
                                <td><span class="status inProgress">abled</span></td>
                            </tr>

                            <tr>
                                <td>Hejer</td>
                                <td>Paid</td>
                                <td><span class="status delivered">abled</span></td>
                            </tr>

                            <tr>
                                <td>fedi</td>
                                <td>not paid</td>
                                <td><span class="status pending">abled</span></td>
                            </tr>

                            <tr>
                                <td>yassine</td>
                                <td>Paid</td>
                                <td><span class="status return">disabled</span></td>
                            </tr>

                            <tr>
                                <td>olfa</td>
                                <td>Paid</td>
                                <td><span class="status inProgress">abled</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Team membres</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/celia.PNG" alt="photo of celia"></div>
                            </td>
                            <td>
                                <h4>Celia Marrakchi <br> <span>Tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/ghadhoun.PNG" alt="photo of ghadhoun"></div>
                            </td>
                            <td>
                                <h4>Aziz Ghadhoun <br> <span>Tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/kenza.PNG" alt="photo of kenza"></div>
                            </td>
                            <td>
                                <h4>Kenza Chtioui<br> <span>Tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/chouaia.PNG" alt="photo of chouaia"></div>
                            </td>
                            <td>
                                <h4>Aziz Chouaia<br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/emna.PNG" alt="photo of emna"></div>
                            </td>
                            <td>
                                <h4>Emna Masmoudi<br> <span>Tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="../../assets/chourabi.PNG" alt="photo of Malek"></div>
                            </td>
                            <td>
                                <h4>Malek Chourabi<br> <span>Tunisia</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
                </div>

    <table>
    <li>
        <img src="https://www.tuc.org.uk/sites/default/files/g2.gif" alt="stats">
    </li>
    <li>
        <img src="https://www.zippia.com/wp-content/uploads/2022/01/paid-unpaid-internship-breakdown.jpg" alt="stats">
    </li>
    <li>
        <img src="https://v8g5p6n8.rocketcdn.me/wp-content/uploads/2023/02/Reasons-Why-Userd-Leave-a-Page.jpeg" alt="stats">
    </li>
    <li>
        <img src="https://blog.hubspot.com/hs-fs/hubfs/copy-template-slide-pie-chart%20(7).jpg?width=975&height=549&name=copy-template-slide-pie-chart%20(7).jpg" alt="stats">
    </li>
    </table>
</div>
            </div>
            
        </div>
        
    </div>
    


    <!-- =========== Scripts =========  -->
    <script src="compte_etudiant.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>