
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="setting.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="profile-holder">
          <div class="profile-people-holder">
            <div class="profile-name">
              <h3>Profile settings</h3>
              <p>Update your profile password and notifications settings</p>
            </div>
          </div>
          <div class="profile-settings-holder">
  
<form class="form-horizontal profile-update" method='get' action="setting_recruteur.php">

              <div class="form-group clearfix">
                <div class="col-sm-12 control-label">
                  <label for="profile_email">Your email</label>
                </div>
                <div class="col-sm-12 profile-email clearfix">
                    <p>
                      <?php
                    session_start();
                    $email = $_SESSION['recruteur']['Email'];
                    echo '<p>L\'email de l\'utilisateur est : ' . $email . '</p>';
                    ?>
                    </p>
                  <div class="btn btn-primary text-helper">Request new invitation</div>
                </div>
              </div>

              <div class="form-group clearfix">
                <div class="col-sm-12 control-label">
                    <label for="profile_password">Verif password</label>
                    <span class="text-helper">Enter your privious password</span>
                </div>
                <div class="col-sm-12">
                    <input  class="form-control" id="currentPalssword" name='pwd' placeholder="Enter your password ">
                </div>
                <div class="col-sm-12 control-label">
                    <label for="profile_password">Change password</label>
                    <span class="text-helper">Only enter a password if you want to change it</span>
                </div>
                <div class="col-sm-12">
                  <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter password to update it">
                </div>
              </div>
              <div class="form-group clearfix">
                <div class="col-sm-12">
                  <input type="password" class="form-control" id="profile_password_confirm" name="ConfirmPassword" placeholder="Re-enter password to confirm">
                </div>
              </div>
              <div class="notification-settings">
                  <div class="notification-legend">
                    <p>Enable notifications</p>
                    <span class="text-helper">You will receive notifications when new judgments are published</span>
                    <div class="notification-toggle">
                      <input id="notification_toggle" type="checkbox" class="tgl tgl-ios" />
                      <label for="notification_toggle" class="tgl-btn"></label>
                    </div>
                  </div>
                </div>

                <div class="form-btns clearfix">
                  <input class="btn btn-primary" type="submit" onclick="updatePassword()" >
                </div>
                <div class="form-btns clearfix">
                  <input class="btn btn-primary" value="Return" id="retourner" >
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</form>
</body>
<script>
  var retournerButton = document.getElementById('retourner');

// Ajouter un gestionnaire d'événements pour le clic
retournerButton.addEventListener('click', function() {
    window.location.href = '../signIn/compte_recruteur.php';
});
  const alertParam = '<?php echo isset($_SESSION['alert']) ? $_SESSION['alert'] : ''; ?>';

    // Afficher l'alerte correspondante
    if (alertParam === 'success') {
        alert('Password changed successfully');
    } else if (alertParam === 'failure') {
        alert('Failed to update password');
    } else if (alertParam === 'wrongpassword') {
        alert('Wrong password');
    }else if (alertParam === 'passwordmismatch') {
        alert('Password and confirmation do not match');
    }else if (alertParam === 'usernotfound') {
        alert('User not found');
    }

    // Effacer le message d'alerte de la session
    <?php unset($_SESSION['alert']); ?>
</script>
</html>