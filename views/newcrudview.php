<?php
include '../controller/formationC.php';
$fc= new formationC ();
$tab=$fc->afficherFormation();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Bootstrap : CRUD Table</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto|Varela+Round'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./newstyle.css">
<style>
  #searchButton {
  float: left;
  margin-left: 60px;
}

#searchInput {
  margin-left: 10px;
}
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container-fluid">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Manage <b>tranings</b></h2>
        </div>
        <div class="col-sm-6">
        <a href="addformation.php" class="btn btn-success" target="_blank">
    <i class="material-icons">&#xE147;</i> <span>Add New Training</span>
</a>
<div class="search form-inline">
  <input type="text" id="searchInput" placeholder="Search..." class="form-control">
  <button id="searchButton" class="btn btn-primary">Search</button>
</div>
        </div>
      </div>
    </div>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>
            <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
          </th>
          <!--<th>Id  formation</th>
          <th>Id type formation</th>-->
          <th>Name</th>
          <th>Is paid</th>
          <th>Date Debut</th>
          <th>niveau</th>
       <!--   <th>image_url</th>-->
          <th>Nb d'heures</th>
          <th>Type de cours</th>
          <th>Nature cours</th>
          <th>domaine</th>
          <th>description</th>
          <th>location</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
          </td>
          <?php
   foreach ($tab as $formationn) {
    ?>
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </td>
            <td><?php echo $formationn['Nom']; ?></td>
            <td><?php echo $formationn['ispaid']; ?></td>
            <td><?php echo $formationn['datedebut']; ?></td>
            <td><?php echo $formationn['Niveau']; ?></td>
            <td><?php echo $formationn['nbheures']; ?></td>
            <td><?php echo $formationn['type_cours']; ?></td>
            <td><?php echo $formationn['nature_cours']; ?></td>
            <td><?php echo $formationn['domaine']; ?></td>
            <td><?php echo $formationn['description']; ?></td>
            <td><?php echo $formationn['location']; ?></td>
            <td><?php echo $formationn['email']; ?></td>
            <td>
            <form method="POST" action="updateformation.php">
            <a href="updateformation.php?id_formation=<?php echo $formationn['id_formation']; ?>" class="edit">
    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
</a>
               </form>
               <a href="supprimerformation.php?id=<?php echo $formationn['id_formation']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
               </td>
               <td>     </td>
               <td>     </td>
        </tr>
    <?php
    }
    ?>
        </tr>
      </tbody>
    </table>
    <div class="clearfix">
      <ul class="pagination">
        <li class="page-item "><a href="#">Previous</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Next</a></li>
      </ul>
    </div>
  </div>
</div>


<!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script><script  src="./scriptnew.js"></script>
<script>
$(document).ready(function() {
  var elementsParPage = 4;
  var totalElements = $(".table tbody tr").length;
  var totalPages = Math.ceil(totalElements / elementsParPage);

  $(".table tbody tr").hide();
  $(".table tbody tr").slice(0, elementsParPage).show();

  // Définir la classe "active" sur la page 1 au chargement de la page
  $(".pagination li:contains('1')").addClass("active").siblings().removeClass("active");

  $(".pagination li").on('click', function(){
    var page = $(this).text();

    if (page === "Next") {
      page = $(".pagination li.active").text();
      if (page < totalPages) {
        page++;
      }
    } else if (page === "Previous") {
      page = $(".pagination li.active").text();
      if (page > 1) {
        page--;
      }
    }

    var debut = (page - 1) * elementsParPage;
    var fin = debut + elementsParPage;

    $(".table tbody tr").hide();
    $(".table tbody tr").slice(debut, fin).show();

    // Mettre à jour la classe active sur les liens de pagination
    $(".pagination li").removeClass("active");
    $(".pagination li:contains('" + page + "')").addClass("active");
  });

  $(document).ready(function() {

  $("#searchButton").on("click", function() {
    // Récupérer la valeur saisie dans le champ de recherche
    var searchValue = $("#searchInput").val().toLowerCase();

    // Parcourir toutes les lignes du tableau
    $(".table tbody tr").each(function() {
      var rowText = $(this).text().toLowerCase();

      // Vérifier si la valeur de recherche est présente dans le texte de la ligne (nom de formation, date de début ou domaine)
      var formationName = $(this).find("td:eq(3)").text().toLowerCase(); // Colonne du nom de formation
      var dateDebut = $(this).find("td:eq(5)").text().toLowerCase(); // Colonne de la date de début
      var domaine = $(this).find("td:eq(11)").text().toLowerCase(); // Colonne du domaine

      if (formationName.includes(searchValue) || dateDebut.includes(searchValue) || domaine.includes(searchValue)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
});
});
</script>
</body>
</html>
