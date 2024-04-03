<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
</head>
<body style="background: #f0f0f0;padding: 0;margin: 0;font-family: Roboto, sans-serif;color: #333;font-size: 16px;box-sizing: border-box;">
    <div style="width : 960px; margin : auto; box-sizing: border-box;">
      <header style="height : 200px; display : flex; justify-content : space-evenly ; align-items : center; padding : 50px 30px 0px;box-sizing: border-box;">
        <img style="height : 200px;" src="https://abcsiteweb.synology.me/PetitSapin/images/petit-sapin-logo-or-noir.png" alt="" class="logo">
      </header>
      <section style="border-radius: 5px; background: #fff; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); transition: all 0.56s cubic-bezier(0.25, 0.8, 0.25, 1); max-width: 500px; padding: 0; margin: 50px auto; overflow : hidden; padding : 50px 30px;box-sizing: border-box;">
        <h1 class="mailRecoveryPasswordTitle">Complete the registration</h1>
        <p style="line-height : 24px;">
        <p>Hello!</p>
        <p style="line-height : 24px;">Thank you for registering on the Unipath. Your account is about to be created with the following email address: .</p>
        <?php
        session_start();
        echo $_SESSION['user']['Email'];
        ?>
        <p style="line-height : 24px;">
Please click on the golden button below to finalize the creation of your account and take advantage of our wonderful opportunities: </p>
<button style="position: relative; overflow: hidden; outline: none; border: none; color: #fff; border-radius: 2px; padding: 8px 16px; margin: 8px; font-size: 14px; font-family: inherit; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); transition: 0.2s; background: #c49b63; box-sizing: border-box; cursor:pointer;" onclick="window.location.href='formsuppetudiant.html'">Validate</button>
<button style="position: relative; overflow: hidden; outline: none; border: none; color: #fff; border-radius: 2px; padding: 8px 16px; margin: 8px; font-size: 14px; font-family: inherit; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24); transition: 0.2s; background: #c49b63; box-sizing: border-box; cursor:pointer;" onclick="window.location.href='compte_etudiant.php'">Return</button>
        <p style="line-height : 24px; display : flex; align-items : center;" class="mailSignature">
          <img style=" height : 45px; border-radius : 54px;" src="https://abcsiteweb.synology.me/PetitSapin/images/petit-sapin-logo-or-noir.png" alt="">
        </p>
        <p style="color: #a6a6a6; font-size : 14px">P.S.: This is an automatic email. Please do not reply via this email address, we will not receive your email. You can contact us via your profile space!</p>
      </section>
    </div>
  </body>
</html>