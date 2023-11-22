<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Formulaire de Stage</title>
  <link rel='stylesheet' href='./stage.css'>
</head>
<body>

<header>
  <div>
    <h2>Welcome to UNIPATH, </h2>
    <div>
        <a href="./front_office.php"><button>Go to Front</button></a>
        <a href="./typestage.php"><button>Go to Demande</button></a>
    </div>
  </div>
</header>

<main>
  <section class="container">
    <form action="./sauvgarder_stage.php" id="form" method="post">
      <div class="form-control text">
        <label for="domain" class="label">Domaine</label>
        <select class="input" name="domain" id="domain">
          <option value="RH">Ressources Humaines (RH)</option>
          <option value="programming">Programmation</option>
          <option value="web_development">Développement Web</option>
          <option value="security">Sécurité</option>
          <option value="software_engineering">Génie Logiciel</option>
          <option value="finance">Finance</option>
          <option value="marketing">Marketing</option>
        </select>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>
      <div class="form-control text">
  <label for="type_stage" class="label">Type de Stage</label>
  <select class="input" name="type_stage" id="type_stage">
    <option value="PFE">PFE</option>
    <option value="ouvrier">Ouvrier</option>
    <option value="ingenieur">Ingénieur</option>
    <option value="debutant">Débutant</option>
  </select>
  <i class="fa-solid fa-circle-exclamation"></i>
  <small>Error message</small>
</div>

      <div class="form-control text">
        <label for="email" class="label">Email</label>
        <input class="input" type="email" name="email" id="email" placeholder="E-mail Address">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-control text">
        <label for="start_date" class="label">Date de début</label>
        <input class="input" type="date" name="start_date" id="start_date">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-control text">
        <label for="end_date" class="label">Date de fin</label>
        <input class="input" type="date" name="end_date" id="end_date">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-control text">
        <label for="num_demands" class="label">Nombre de demandes</label>
        <input class="input" type="number" name="num_demands" id="num_demands" placeholder="Nombre de demandes">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div class="form-control text">
        <label for="company_name" class="label">Nom de la société</label>
        <input class="input" type="text" name="company_name" id="company_name" placeholder="Nom de la société">
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <div id="textarea-container">
        <textarea name="description" id="description" cols="30" rows="5" placeholder="Description"></textarea>
      </div>

      <div class="form-control least">
        <input type="checkbox" name="terms_conditions">
        <label for="">I agree to Terms & Conditions</label>
        <i class="fa-solid fa-circle-exclamation"></i>
        <small>Error message</small>
      </div>

      <button type="submit">Submit Application</button>
    </form>
  </section>
  
</main>
 <script>source</script>
</body>
</html>
