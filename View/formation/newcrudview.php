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

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
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
          <th>Id formation</th>
          <th>Name</th>
          <th>paiement</th>
          <th>Domaine</th>
          <th>niveau</th>
          <th>image_url</th>
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
   foreach ($tab as $formationn) {
    ?>
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </td>
            <td><?php echo $formationn['id_formation']; ?></td>
            <td><?php echo $formationn['Nom']; ?></td>
            <td><?php echo $formationn['paiement']; ?></td>
            <td><?php echo $formationn['Domaine']; ?></td>
            <td><?php echo $formationn['Niveau']; ?></td>
            <td><?php echo $formationn['image_url']; ?></td>
            <td><?php echo $formationn['description']; ?></td>
            <td>
            <form method="POST" action="update.php">
            <a href="update.php?id=<?php echo $formationn['id_formation']; ?>" class="edit">
    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
</a>
               </form>
               <a href="supprimerformation.php?id=<?php echo $formationn['id_formation']; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
               </td>
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
<!-- Edit Modal HTML -->

<!-- Edit Modal HTML -->
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Delete Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Delete">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script><script  src="./scriptnew.js"></script>

</body>
</html>
