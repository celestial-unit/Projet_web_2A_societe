
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
        <!--         for name -->
        <div class="name" id="name_class">
          <label for="" id="name_label">Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>
          <span id="erreurnom" style="color: red"></span>
        </div>

        <!--         for email -->
        <div class="email" id="email_class">
          <label for="name" id="email_label">Email</label>
          <input type="email" id="email" placeholder="Enter your email" required>
          <span id="erreurmail" style="color: red"></span>
        </div>

        <!--         for age -->
        <div class="survey-element" id="survey-age">
          <label for="number" id="number-label">Age (optional)</label>
          <input type="number" id="number" placeholder="Age" min="1" max="200">
        </div>

        <!--         for drop-down menu -->
        <div class="survey-element" id="survey-dropdown">
          <label id="survey-dropdown-1-label">Which option best describes your current status?</label>
          <select>
            <option value="" disabled selected>Select current status</option>
            <option value="Student">Student</option>
            <option value="Working full-time">Working full-time</option>
            <option value="Working part-time">Working part-time</option>
            <option value="Not working">Not working</option>
            <option value="Retired">Retired</option>
            <option value="Prefer not to answer">Prefer not to answer</option>
          </select>
        </div>
        <div class="survey-element" id="survey-radio">
        <label id="survey-radio-label">Are you looking for a paid training?</label>
        <label class="survey-radio-button" for="definitely">
          <input type="radio" id="definitely" name="payment" value="Yes" required> Yes
        </label>
        <label class="survey-radio-button" for="maybe">
          <input type="radio" id="maybe" name="payment" value="No" required> No
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

        <!--         for checkboxes -->
        <div class="survey-element" id="survey-dropdown">
        <label id="survey-dropdown-1-label">Select Domain</label>
        <select name="domain" required>
          <option value="IT/Cyber security">IT/Cyber security</option>
          <option value="Marketing">Marketing</option>
          <option value="AI/Machine Learning">AI/Machine Learning</option>
          <option value="Design">Design</option>
          <option value="Game development">Game development</option>
          <option value="Web development">Web development</option>
        </select>
      </div>
        <!--         for text area -->
        <div class="survey-element" id="survey-text-area">
          <label for="review" id="survey-text-area-label">We would love to hear more from you</label>
          <textarea id="review" name="review" rows="7" placeholder="Give us any suggestions..."></textarea>
        </div>

        <!--         Submit button -->
        <div class="survey-element" id="survey-submit">
          <input type="submit" id="submit" value="Send us">
        </div>
      </form>
    </div>
  <script src="formation.js"></script>
</body>
</html>
