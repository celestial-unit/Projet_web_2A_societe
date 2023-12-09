<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update password</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../front/setting.css">
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
            <form class="form-horizontal profile-update" action="../../Model/mdp.php" method='get' onsubmit="return updatePassword()">
                <div>
                <label for="profile_password">Enter your email</label>
                <span class="text-helper">Enter your email </span>
                </div>
                <div class="col-sm-12">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
              </div>
              <div class="col-sm-12 control-label">
                <label for="profile_password">Change password</label>
                <span class="text-helper">Enter your new password </span>
              </div>
              <div class="col-sm-12">
                <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter password to update it">
              </div>
              <div class="form-group clearfix">
                <div class="col-sm-12">
                  <input type="password" class="form-control" id="profile_password_confirm" name="ConfirmPassword" placeholder="Re-enter password to confirm">
                </div>
              </div>
              <div class="form-btns clearfix">
                <input class="btn btn-primary" type="submit" value="Update Password">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  function updatePassword() {
        var newPasswordElement = document.getElementById('newPassword');
        var confirmPasswordElement = document.getElementById('profile_password_confirm');
        var pwdvalue = document.getElementById('newPassword').value;
        var email = document.getElementById('email');
        var emailValue = email.value.trim();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (newPasswordElement.value !== confirmPasswordElement.value) {
            alert("Enter correctly your newPassword");
            return false; // empêcher la soumission du formulaire
        }
        if (emailValue === "") {
            alert("Enter your e-mail.");
            return false; // empêcher la soumission du formulaire
        } else if (!emailRegex.test(emailValue)) {
            alert("Enter correctly your e-mail .");
            return false; // empêcher la soumission du formulaire
        }

        // Si toutes les conditions sont satisfaites, le formulaire peut être soumis
        return true;
    }
    </script>
</html>
