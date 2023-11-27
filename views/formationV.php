<?php
include'../config.php';
function getAllDomains() {
  $db = config::getConnexion();
  $sql = "SELECT domaine FROM typeformation";
  $query = $db->prepare($sql);
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}
$domains = getAllDomains();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Survey Form - freecodecamp</title>
  <link rel="stylesheet" href="./formation.css">
</head>
<body>
  <header>
    <div class="survey-header">
      <h1 id="title">Omurice Quality Evaluation Form</h1>
      <p id="description">Thank you for taking your precious time to answer these questions!</p>
    </div>
  </header>
    <div class="survey-container">
    <form action="process.php" method="POST">
        <div class="survey-element" id="survey-dropdown">
          <label id="survey-dropdown-1-label">are you looking for night or day classes?</label>
          <select name="type_cours">
            <option value="nightclasses">night classes</option>
            <option value="dayclasses">day classes</option>
            <option value="weekend">weekend classes</option>
            <option value="both">both</option>
          </select>
        </div>
        <div class="survey-element" id="survey-radio">
        <label id="survey-radio-label">is paid?</label>
        <label class="survey-radio-button" for="definitely">
          <input type="radio" id="definitely" name="payment" value="Yes" required> Yes
        </label>
        <label class="maybe" for="maybe">
          <input type="radio" id="maybe" name="payment" value="No" required> No
        </label>
      </div>
        <!--         for checkboxes -->
        <div class="survey-element" id="survey-dropdown">
        <label id="survey-dropdown-1-label">Select Domain</label>
      <select name="domain" required>
        <?php foreach ($domains as $domain) : ?>
            <option value="<?php echo $domain['domaine']; ?>"><?php echo $domain['domaine']; ?></option>
        <?php endforeach; ?>
    </select>
        </select>
      </div>
      <div class="survey-element" id="survey-radio">
    <label id="survey-radio-label">Are you looking for accelerated courses?</label>
    <label class="survey-radio-button" for="yes_accelerated">
        <input type="radio" id="yes_accelerated" name="accelerated" value="Yes" required> Yes
    </label>
    <label class="maybe" for="no_accelerated">
        <input type="radio" id="no_accelerated" name="accelerated" value="No" required> No
    </label>
</div>
        <!--         for drop-down menu -->
        <div class="survey-element" id="dropdown">
          <label id="survey-dropdown-2-label">How did you hear about this training?</label>
          <select>
            <option value="" disabled selected>Select  an option</option>
            <option value="tomato">Colleague referral</option>
            <option value="cream"> Company website</option>
            <option value="curry"> Social media</option>
          </select>
        </div>
        <!--         for text area -->
        <div class="survey-element" id="survey-text-area">
          <label for="review" id="survey-text-area-label">We would love to hear more from you</label>
          <textarea id="review" name="review" rows="7" placeholder="Give us any suggestions..."></textarea>
        </div>
       

        <!--         Submit button -->
        <div class="survey-element" id="survey-submit">
          <input type="submit" id="submit" value="Send us" onclick="switchpage()">
        </div>
      </form>
    </div>
  <script src="formation.js"></script>
</body>
</html>
