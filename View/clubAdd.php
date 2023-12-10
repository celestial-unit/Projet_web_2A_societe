<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>connect</title>
    <link rel="stylesheet" href="./clubAdd.css">
    <link rel="stylesheet" href="./clubImage.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    
</head>
<body>
<!-- partial:index.partial.html -->
<form id="contact" action="../Controller/club.php" method="POST">
<div class="container">
    <div class="avatar-upload">
        <div class="avatar-edit">
       
    </div>
            <div class="center">
            <div class="form-input">
              <div class="preview">
                <img id="file-ip-1-preview">
              </div>
              <label for="clubImage">Upload Image</label>
              <input type="file" id="clubImage" name="clubImage" accept="image/*" onchange="showPreview(event);">
    
            </div>
      </form>
</div>
</div>
<div class="container">  
  
    <h3>Add a new club</h3>
    <h4></h4>
    <fieldset>
      <input placeholder="Your Email" name="clubMail" type="email" id="clubMail" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your name" name="name" type="text" id="name" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Field" name="Field" type="text" id="Field" required>
    </fieldset>
    <fieldset>
      <input placeholder="Country" name="country" type="text" id="country" required>
    </fieldset>
    <fieldset>
      <input placeholder="City" type="text" name="city" id="4" required>
    </fieldset>
    <fieldset>
      <input placeholder="university" type="text" name="university"  id="university" required>
    </fieldset>
    <fieldset>
      <input placeholder="postal" type="number" id="postal" name="postal" required>
    </fieldset>
    <fieldset>
      <input placeholder="street" type="text" id="street" name="street" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your social links starts with https://" type="url" id="links" name="links" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your Message Here...." id="description" name="description" required></textarea>
    </fieldset>

    </div>
  <fieldset>
        <button name="submit" type="submit" id="contact-submit" value="submit">Submit</button>
      </fieldset>
      <fieldset>
        <button name="reset" type="reset" id="contact-submit" value="reset">reset</button>
      </fieldset>
</form>
<!-- partial -->
<script  src="./clubAdd.js"></script>
</body>
</html>