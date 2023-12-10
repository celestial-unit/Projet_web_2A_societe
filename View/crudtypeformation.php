<?php
include "../config.php";
include '../Controller/typeformationC.php';
$fc= new typeformationC ();
$tab=$fc->affichertypeFormation();
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

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container-fluid">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Manage type of <b>tranings</b></h2>
        </div>
        <div class="col-sm-6">
        <a href="addtypeformation.php" class="btn btn-success" target="_blank">
    <i class="material-icons">&#xE147;</i> <span>Add New Training</span>
</a>
          <a href="supprimerformation.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
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
          <th>Id  type formation</th>
          <th>domaine</th>
          <th>description</th>
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
   foreach ($tab as $typeformation) {
    ?>
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </td>
            <td><?php echo $typeformation['id_typeformation']; ?></td>
            <td><?php echo $typeformation['domaine']; ?></td>
            <td><?php echo $typeformation['description']; ?></td>
            <td>
            <form method="POST" action="updatetf.php">
            <a href="updatetf.php?id=<?php echo $typeformation['id_typeformation']; ?>" class="edit">
    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
</a>
               </form>
               <a href="supprimertf.php?id=<?php echo $typeformation['id_typeformation']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
      <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
      <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>
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
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script><script  src="./scriptnew.js"></script>
<script>
$(document).ready(function(){
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
});
</script>
</body>
</html>
