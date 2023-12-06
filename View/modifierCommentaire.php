<?php
include_once '../controller/commentaireC.php';
include_once '../model/commentaire.php';


    $error = "";
    // create user
    $commentaire = null;
    // create an instance of the controller
    $commentaireC = new commentaireC();
    if (
        isset($_POST['date']) &&
        isset($_POST['contenu']) &&
        isset($_POST['id_forum'])
    ){
        if (
            !empty($_POST["date"]) &&
            !empty($_POST["contenu"]) &&
            !empty($_POST["id_forum"])
        ) {
            $commentaire = new commentaire(
                $_POST['date'],
                $_POST['contenu'] ,
                $_POST['id_forum']
            );
			$commentaireC->modifier($commentaire,$_GET['id']);
        }
        else
            $error = "Missing information";
   }

   if(isset($_POST['modifier']))
	{
    	header ('Location:afficherCommentaire.php');
	}

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
                        <br><br><br> 
              <?php 
                if (isset($_GET['id'])){
                  $comm = $commentaireC->recupererCommentaire($_GET['id']);
              ?> 
              <form method="POST" onsubmit="return verif();">
                        <div class="row mb-3">
                          <div class="col-sm-10">
                            <input type="date" class="form-control p-2" value="<?php echo $comm['date']?>" name="date" id="date" placeholder="Date">
                          </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control p-2" name="contenu" id="contenu" placeholder="contenu"><?php echo $comm['contenu']?></textarea>
                          </div>
                        </div>
                        <br>
                        <div class="row mb-3">
                          <div class="col-sm-10">
                            <input type="text" class="form-control p-2" value="<?php echo $comm['id_forum']?>" name="id_forum" id="id_forum" placeholder="Forum">
                          </div>
                        </div>
                        <br>
                        <div class="text-center">
                          <input class="btn btn-primary" type="submit" name="modifier" value="Modifier">
                        </div>
              </form>
              <?php } ?>
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
            
<script src="commentaire.js"></script>

</body>

</html>