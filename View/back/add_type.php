<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../back/css/add_type.css">
</head>
<body>
<form class="form">
  <header>
    Credit card information
  <span class="message">Fill the form to continue.</span>
  </header>
  <label>
    <span>Card Number</span>
    <input placeholder="Type your card number" class="input" type="number" required="">
  </label>
  <label>
    <span>Name on card</span>
    <input placeholder="Type your name as appear on card" class="input" type="text" required="">
  </label>
  <fieldset>
    <label class="sm">
    <span>Exp. Month</span>
    <div class="custom-select">
    <select class="input" type="select" required="">
      <option></option>
      <option>January</option>
      <option>February</option>
      <option>March</option>
      <option>April</option>
      <option>May</option>
      <option>June</option>
      <option>July</option>
      <option>August</option>
      <option>September</option>
      <option>October</option>
      <option>November</option>
      <option>Dicember</option>
    </select>
    </div>
  </label>
  <label class="sm">
    <span>Exp. Year </span>
    <div class="custom-select">
    <select class="input" type="select" required="">
      <option></option>
      <option>2023</option>
      <option>2024</option>
      <option>2025</option>
      <option>2026</option>

    </select>
    </div>
  </label>
    <label class="sm">
    <span>CW </span>   
    <input class="input" placeholder="1234" size="4" maxlength="4" type="text" required="">
  </label>
  </fieldset>
  <div class="submitCard">
    <button>Complete payment</button>
  </div>
</form>
</body>
</html>