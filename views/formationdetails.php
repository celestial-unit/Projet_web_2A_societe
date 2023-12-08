<?php
require '../config.php';
$db = config::getConnexion();
$id_formation = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT formation.*, typeformation.description, typeformation.domaine, formation.image_url,formation.location,formation.email
        FROM formation
        LEFT JOIN typeformation ON formation.id_typeformation = typeformation.id_typeformation
        WHERE formation.id_formation = $id_formation";

$result = $db->query($sql);

if (!$result) {
    die("Erreur dans la requête : " . $db->errorInfo());
}
$row = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - test</title>
  <link rel="stylesheet" href="./style.css">
  <style>
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Ajustez cette valeur en fonction de votre besoin */
}
.intro-left i.fa-map-marker {
    color: rgb(123, 67, 39);
}
.intro-left i.fa-envelope {
    color: rgb(123, 67, 39);
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE  html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gene.ly | Home</title>
        <link rel="stylesheet" href="./ich.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>
    <body>
        <!-- Logo and Menu -->
        <header id="header">
            <div class="wrapper">
               <a href="/">
                <img src="https://i.postimg.cc/tTxjZ7MF/biology.png">
            </a> 

            <button id="submenu">
                <span></span>
                <span></span>
                <span></span>
            </button>

        <!-- Menu Links-->    

            <ul class="menu-left">
                <li><a href="#">
                        Our mission
                </a></li>
                <li><a href="#">
                        Services
                </a></li>
                <li><a href="#">
                        Pricing
                </a></li>
                <li><a href="#">
                        Contact
                </a></li>
            </ul>


            <ul class="menu-right">
                <li class="menu-cta"><a href="#">Get Started</a></li>
            </ul>
            </div>
        </header>
    
        <!-- MENU END -->

        <!-- INTRO PAGE START -->

        <section id="intro">

            <div class="top-right-gradient">
                
            </div>
            <div class="wrapper">

                <div class="intro-left">
                    <h1><?php echo $row['Nom'];?></h1>
                    <p><?php echo $row['description'];?></p>
                    <span><i class="fa fa-map-marker"></i></span>
                    <span><?php echo $row['location'];?></span>
                    <br>
                    <span><i class="fa fa-envelope"></i></span>
                    <span><?php echo $row['email'];?></span>
                </div>
                <div class="intro-right">
                    <img src="<?php echo $row['image_url']; ?>" alt="image">
                </div>
            </div>

            <div class="bottom-left-gradient">
                
            </div>
        </section>
        <center>
        <div class="container">
          <div class="row1">
                        <div class="details-box">
                            <h3>This courses includes:</h3>
                            <div class="all-box">
                                <div class="box">
                                    <i class="fa fa-bolt"></i>
                                    <h4><?php echo $row['nbheures']; ?> hours duration
                                    </h4>
                                </div>
                                <div class="box">
                                    <i class="fa fa-play-circle"></i>
                                    <h4> 02 hour per day
                                    </h4>
                                </div>
                                <div class="box">
                                    <i class="fa fa-file-code-o">
                                    </i>
                                    <h4> 4 articles + resources
                                    </h4>
                                </div>
                                <div class="box">
                                    <i class="fa fa-desktop"></i>
                                    <h4> weakly one project
                                    </h4>
                                </div>

                            </div>
                        </div>
                        </center>
        </div>
        <!-- Intro Page END -->
      
        <!-- About Page Start -->
      <section id="about">
        <div class="wrapper">
          <div class="about-left">
            <img src="https://i.postimg.cc/7PNKwwB6/undraw-report-mx0a.png" alt="">
          </div>
          <div class="about-right">
          
        </div>
        
        <div class="top-right-gradient">
          
        </div>
        
      </section>
      
      <!-- About Page End -->
      
      <!-- Page Banner START -->
      
      <div class="page-banner">
      <center style="width: 100%; background: #ffffff; text-align: left;">
		<div style="max-width: 600px; margin: auto;" class="email-container">
		                        <tr>
                          <td width="100%" align="left" valign="top">
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                              <tbody>
                                <tr bgcolor="#7ab3d4">
                                  <td class="tdimage" width="50%" valign="top" bgcolor="#7ab3d4"><img class="fluidimagebody" style="display: block;" src="http://i.imgur.com/dYcF9SV.png" border="0" alt="" width="300"></td>
                                  <td class="tdtext" style="padding: 0 40px 0 40px;" width="50%" valign="middle" bgcolor="#F3F4F4">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td height="20"></td>
                                        </tr>
                                        <tr>
                                          <td style="line-height: 30px;" valign="top">
                                            <h2 class="bodycopy" style="margin: 0; padding: 0; color: #364141; line-height: 30px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">Evaluation Tools</h2>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td height="10"></td>
                                        </tr>
                                        <tr>
                                          <td style="line-height: 24px;" valign="top">
                                            <p class="bodycopy" style="margin: 0; padding: 0; color: #364141; line-height: 24px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">We have decades of expertise in data analytics, internal assessment, and market&nbsp;research.</p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td height="20"></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>	                        
                        <table>
                        	<tr>
                        		<td class="spacer50" height="50" style="display:none;"></td>
                        	</tr>
                        </table>                
                        <tr>
                          <td width="100%" align="left" valign="top">
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                              <tbody>
                                <tr>
                                  <td class="tdtext" style="padding: 0 40px 0 40px;" width="50%" valign="middle" bgcolor="#F3F4F4">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td height="20"></td>
                                        </tr>
                                        <tr>
                                          <td style="line-height: 30px;  text-align:right;" valign="top">
                                            <h2 class="bodycopy" style="margin: 0; padding: 0; color: #364141; line-height: 30px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">Training Details</h2>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="spacer10" height="10"></td>
                                        </tr>
                                        <tr>
                                          <td style="line-height: 24px;  text-align:right;" valign="top">
                                            <p class="bodycopy" style="margin: 0; padding: 0; color: #364141; line-height: 24px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">Our business experts offer training in person and web-based, done on your&nbsp;schedule.</p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="spacer50" height="20"></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                   <td class="tdimage" width="50%" valign="top" bgcolor="#e0995f"><img class="fluidimagebody" style="display: block;" src="http://i.imgur.com/8NUvFgU.png" border="0" alt="" width="300"></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>                                                
                        <table>
                        	<tr>
                        		<td class="spacer50" height="50" style="display:none;"></td>
                        	</tr>
                        </table>                        			
                        <tr>
                          <td width="100%" align="left" valign="top">
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                              <tbody>
                                <tr>
                                  <td class="tdimage" width="50%" valign="top" bgcolor="#7b80bd"><img class="fluidimagebody" style="display: block;" src="http://i.imgur.com/B9uppy5.png" border="0" alt="" width="300"></td>
                                  <td class="tdtext" style="padding: 0 40px 0 40px;" width="50%" valign="middle" bgcolor="#F3F4F4">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td height="20"></td>
                                        </tr>
                                        <tr>
                                          <td style="line-height: 30px;" valign="top">
                                            <h2 class="bodycopy" style="margin: 0; padding: 0; color: #364141; line-height: 30px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">Customized Training</h2>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="spacer10" height="10"></td>
                                        </tr>
                                        <tr>
                                          <td style="line-height: 24px;" valign="top">
                                            <p class="bodycopy" style="margin: 0; padding: 0; color: #364141; line-height: 24px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">Our programs are customized to meet the specific challenges our clients face. </p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="spacer50" height="20"></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>				
                                        
             <!-- End 2 Columns -->						
					</td>
				</tr>
			</table>				

				<!-- Button : BEGIN -->
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
                            <tr>
                              <td height="60"></td>
                         	</tr>
						</table>

			<tr>
				<td aria-hidden="true" height="60px">
					&nbsp;
				</td>
			</tr>
      </div>
      </div>
    
      <footer>
        
        <div class="wrapper">
          
          <div class="footer-left">
            <a href="/">
              <img src="https://i.postimg.cc/tTxjZ7MF/biology.png" alt="logo">
          </div>
            
            <p class="footer-links">
              
              <a href="#">About</a>
              <a href="#">Services</a>
              <a href="#">Pricing</a>
              <a href="#">Contact</a>
              
            </p>
            
            <p class="footer-company-name">Gene.ly &copy;2013 Unipath. All Rights Reserved</p>
              
          <div class="footer-center">
            
            <div><i class="fas fa-map-marker-alt"></i>
              <p><span> 1234 Sawtelle Rd.</span>Los Angeles, CA 90025</p></div>
            
            <div><i class="fas fa-phone"></i>
              <p><span> (012) 345 6789</p></div>
                
              <div><i class="fas fa-envelope"></i>
                <p><a href="#">website@unipath.com</a></p>
            </div>
               </div>
            
          <div class="footer-right">
            <p class="footer-connect">
              <span>Connect with us</span>
              Consume out of the box genetic Analytics anywhere, anytime. Contact us to get Started. 
            </p>
            <div class="footer-icons">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            
               </div>
        </div>
      </footer>
      
      <!-- Footer END -->
      
        

     
    </body>
</html>
<!-- partial -->
  <script  src="./ich.js"></script>

</body>
</html>
