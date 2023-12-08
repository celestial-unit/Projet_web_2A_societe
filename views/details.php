<?php
require '../config.php';
$db = config::getConnexion();
$id_formation = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT formation.*, typeformation.description, typeformation.domaine,formation.image_url
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Page</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./details.css">

    <style>
        /* Styles pour la mise en page */
        .container {
            display: flex;
            justify-content: space-between;
            margin: 20px; /* Ajout d'une marge autour du conteneur */
        }

        .left-column {
            width: 45%; /* Ajustez la largeur de la colonne de gauche selon vos besoins */
        }

        .left-column img {
            width: 100%;
            opacity: 1;
            transition: all 0.3s ease;
        }

        .right-column {
            width: 45%; /* Ajustez la largeur de la colonne de droite selon vos besoins */
            margin-left: 20px; /* Ajout d'une marge à gauche de la colonne de droite */
        }

    </style>
</head>
<body>

<!-- Conteneur principal avec les deux colonnes -->
<div class="container">
<div class="left-column">
        <img src="<?php echo $row['image_url']; ?>" alt="Strengthen your managers" class="g-img">
    </div>
  <!-- Right Column -->
  <div class="right-column">
    <!-- Product Description -->


    <div class="training-description">
      <span> Trainings</span>
      <h1><?php echo $row['Nom'];?></h1>
      <p><?php echo $row['description'];?></p>
    </div>
    <!-- Product Configuration -->
    <div class="product-configuration">
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
    </div>
      </div>
      <div class="product-price">
      <span><br>148$</span>
    </div>
    </div>    
  </div>
</main>
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
	
			<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="180" style="max-width: 680px;">		
		    	<tr>
		    		<td style="padding: 40px 0 0 0;">
		    			<a href="https://www.facebook.com/secretshopper" target="_blank"><img src="https://www.secretshopper.com/images/facebook.gif" width="38" height="38" alt="Facebook" title="Facebook" border="0" /></a>
                    </td>
                    <td align="center" style="padding: 40px 0 0 0;">
                    	<a href="https://twitter.com/secretshopper/" target="_blank"><img src="https://www.secretshopper.com/images/twitter.gif" width="38" height="38" alt="Twitter" title="Twitter" border="0" /></a>
                    </td>
                    <td align="right" style="padding: 40px 0 0 0;">
                    	<a href="https://plus.google.com/+becomesecretshopper" target="_blank"><img src="https://www.secretshopper.com/images/googlePlus.gif" width="38" height="38" alt="Google Plus" title="Vimeo" border="0" /></a>
                    </td>                                        
                </tr>                                      
			</table>
      </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script><script  src="./script.js"></script>
</body>
</html>