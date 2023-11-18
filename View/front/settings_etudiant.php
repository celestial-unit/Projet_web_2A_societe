
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
  
<form class="form-horizontal profile-update" method='get' action="setting_etudiant.php">

              <div class="form-group clearfix">
                <div class="col-sm-12 control-label">
                  <label for="profile_email">Your email</label>
                </div>
                <div class="col-sm-12 profile-email clearfix">
                    <p>
                      <?php
                    session_start();
                    $email = $_SESSION['user']['Email'];
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
  function retourner() 
  {
    window.location.href = '../signIn/compte_etudiant.php';
  }
  document.getElementById('retourner').addEventListener('click',retourner);
  function updatePassword() {
    var currentPasswordElement = document.getElementById('currentPalssword');
    var newPasswordElement = document.getElementById('newPassword');

    if (currentPasswordElement && newPasswordElement) {
      var currentPassword = currentPasswordElement.value;
      var newPassword = newPasswordElement.value;

      // Effectuer la requête AJAX
      fetch('setting_etudiant.php?pwd=' + encodeURIComponent(currentPassword) + '&newPassword=' + newPassword, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
      })
      .then(response => response.text())
      .then(data => {
        console.log('Server response:',data);

        if (data.includes('Password changed successfully')) {
          alert('Password updated successfully');
          window.location.href = 'settings_etudiant.php';
        } 
        else if (data.includes('Failed to update password'))
        {
          alert('Failed to update password');
          window.location.href = 'settings_etudiant.php';
        }
        else if (data.includes('Wrong password'))
        {
          alert('Wrong password');
          window.location.href = 'settings_etudiant.php';
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    } else {
      console.error('One or both elements not found');
    }
  }
</script>
</html>