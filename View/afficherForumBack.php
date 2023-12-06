<?php
include '../controller/forumC.php';


$d = new forumC();

if ($_POST["aff"] == "Tri") {
  $tab = $d->triForum();
} else if ($_POST["aff"] == "Search") {
  $tab = $d->rechercheForum($_POST["rech"]);
} else
  $tab = $d->afficher();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="back/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="#">
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
                    <img src="back/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            

    
                              

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                        <br>
                        <div class="search">
                          <form action="afficherForumBack.php" method="POST">
                              <br>
                              <input type="text" placeholder="Search..." name="rech" id="inlineFormInputName2" style="height=50px;">
                              <input type="submit" class="btn" name="aff" value="Search" />
                              <input type="submit" class="btn" name="aff" value="Tri" />
                          </form>
                        </div>
                    </div>
                    <br><br>
                    <table>
                        <thead>
                            <tr>
                                <th> Titre </th>
                                <th> Date </th>
                                <th> Description </th>
                                <th> Etat </th>
                                <th>    </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tab as $foru) { ?>
                            <tr>
                                <td> <?= $foru['titre'] ?> </td>
                                <td> <?= $foru['date'] ?> </td>
                                <td> <?= $foru['description'] ?> </td>
                                <td> <?= $foru['etat'] ?> </td>
                                <td>
                                    <a href="modifierForum.php?id=<?php echo $foru['id']; ?>"><button class="btn btn-outline-success btn-sm">Modifier</button></a>
                                    <a href="supprimerForum.php?id=<?php echo $foru['id']; ?>"><button class="btn btn-outline-danger btn-sm">Supprimer</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <br><br>
                    <h4>Statistiques des Forums et des Commentaires</h4>
                    <br>
                    <div style="height:450;width:450px;">
                        <canvas id="myChartt"></canvas>
                    </div>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="back/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>med_Aziz <br> <span>tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="back/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>celia  <br> <span>romania</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="back/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>kenza <br> <span>nicaragua</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="back/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>med_Aziz <br> <span>tunisia</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="back/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>melek <br> <span>englend</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="back/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>emna <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="back/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>emna<br> <span>india</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="back/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>amir<br> <span>quatar</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- =========== Scripts =========  -->
<script src="back/js/main.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
      var xValues = ["Forums avec commentaires","Forums sans commentaires"];
      var yValues = [<?php echo $d->count_AvecCommentaire();?>, <?php echo $d->count_Forum()-$d->count_AvecCommentaire();?>];
      var barColors = [
              "#0d6efd",
                "#0dcaf0"
            ];  

          new Chart("myChartt", {
              type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                    }]
                },
                options: {
                    title: {
                    display: true,
                    text: "Forums - Commentaires"
                    }
                }
          });
    </script>




</body>

</html>

  

</body>

</html>