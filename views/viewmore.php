<?php
require '../config.php';
$db = config::getConnexion();
$id_formation = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "SELECT formation.*, typeformation.description, typeformation.domaine
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
  <title>Formation Details</title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <link rel="stylesheet" href="./viewmore.css">

    <style>
       
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }
        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],	/* iOS */
        .x-gmail-data-detectors, 	/* Gmail */
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        /* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
        .a6S {
	        display: none !important;
	        opacity: 0.01 !important;
        }
        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
	        display:none !important;
	   	}
        /* What it does: Prevents underlining the button text in Windows 10 */
        .button-link {
            text-decoration: none !important;
        }
       
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
            .email-container {
                min-width: 375px !important;
            }
        }
    </style>

    <!-- Progressive Enhancements -->
    <style>
        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

      /* resize full-width images based on size */
      img[class="fluidimagebody"] { 
      height:auto !important; 
      width:100% !important;
      max-width: 600px !important;
      margin: 0 auto !important;
      }
      td[class="tdimage"] {
      width:22% !important;
      }

      /* blocks that will be hidden on mobile */
      td[class="hidethis"] {
      display: none !important;
      }
      body {
    background-color: #d3b8a5;
  }
  /* Global Styles */
body {
  font-family: "Raleway", Helvetica, Arial;
  font-size: 16px;
  color: #666666;
  font-weight: 400;
  letter-spacing: 1px;
}

p {
  line-height: 30px;
  font-weight: 400;
}

h1, h2, h3, h4, h5, h6 {
  color: #333333;
  text-transform: uppercase;
  font-family: "Raleway", Helvetica, Arial;
  font-weight: 700;
}

a {
  color: #3498db;
  text-decoration: none;
}

a:hover, a:focus {
  color: #308ac6;
}

/* Button Styles */
.btn-default {
  border-radius: 2px;
  border: 1px solid #bdc3c7;
  font-size: 14px;
  color: #95a5a6;
  font-weight: 700;
  text-transform: uppercase;
  padding: 11px 20px;
}

.btn-default:hover {
  background: #fff;
  color: #3498db;
  border: 1px solid #3498db;
}

.btn:active {
  box-shadow: none;
}

/* Logo Styles */
.navbar-brand {
  width: 179px;
  height: 32px;
  padding: 0;
  margin: 0;
  background: url() no-repeat;
  text-indent: -9999px;
}

/* Navigation Styles */
/* ... (your existing navigation styles) ... */

/* Jumbotron Styles */
.jumbotron {
  background: #2c3e50 url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/144467/banner.png) no-repeat;
  background-size: cover;
  max-height: 800px;
  padding: 60px 0;
  margin: 0;
}

.jumbotron h1 {
  color: #fff;
  font-weight: 300;
  margin: 0 0 60px 0;
}

.jumbotron h1 span {
  color: #f39c12;
  font-weight: 700;
}
	</style>

</head>
<body width="100%" bgcolor="#ffffff" style="margin: 0; mso-line-height-rule: exactly;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">

				<!-- Hero Image, Flush : BEGIN -->
				<tr>
					<td bgcolor="#ffffff" class="left-align">
						<img src="<?php echo $row['image_url']; ?>" width="600" height="" alt="Strengthen your managers" border="0" align="center" style="width: 100%; max-width: 600px; height: auto; background: #dddddd; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;" class="g-img">
            
					</td>
				</tr>


						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="font-family: sans-serif;">								
							<tr>
								<td style="padding:20px 40px;">
									<p style="text-align: left; font-size: 30px; line-height:30px; color:#000000">
                  
                                    <?php echo $row['description']; ?>
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
                            		</p>								
								</td>
							</tr>
							<tr>
								<td aria-hidden="true" height="30">
								&nbsp;
								</td>
							</tr>					
						</table>
           

	<center style="width: 100%; background: #ffffff; text-align: left;">
		<div style="max-width: 600px; margin: auto;" class="email-container">
			
			
                       
               <!-- Start 2 Columns -->          
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
       
       <div class="call-to-action text-center">
       <div class="container">
         <div class="row">
           <h2>Do you like what you see? <a href="#">Contact Us</a></h2>
         </div>
       </div>
     </div>
     <!-- end call-to-action-->
   
     <div class="contact-info">
       <div class="container">
         <div class="row">
   
           
   
           <div class="col-md-4">
             <div class="email text-center">
               <span class="icon-sprite sprite-mail">&nbsp;</span>
               <h6>Email</h6>
               <p>website@unipath.com</p>
             </div>
           </div><!-- end email-->
   
           <div class="col-md-4">
             <div class="location text-center">
               <span class="icon-sprite sprite-phone">&nbsp;</span>
               <h6>Phone</h6>
               <p>(012) 345 6789</p>
             </div>
           </div><!-- end phone-->
   
         </div>
       </div>
     </div>
    </center>
</body>
</html>
<!-- partial -->
  

