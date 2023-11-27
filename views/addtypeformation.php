<?php
include_once '../controller/typeformationC.php';
$typeformationC = new typeformationC();
$error = "";

if (isset($_POST["domaine"]) && isset($_POST["description"])) {
    if (!empty($_POST["domaine"]) && !empty($_POST["description"])) {
        // Assuming id_typeformation is an auto-increment field, set it to null
        $typeformation = new typeformation(
            null,
            $_POST['domaine'],
            $_POST["description"]
        );
        try {
            $typeformationC->addtypeFormation($typeformation);
            header('Location:crudtypeformation.php');
            exit();
        } catch (Exception $e) {
            // Handle the exception, e.g., display an error message or log the error
            $error = "Error adding type formation: " . $e->getMessage();
        }
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Form for students</title>
  <link rel="stylesheet" href="form.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body id="main">

  <header>
    <div class="survey-header">
      <h1 id="title">Form for type of training added by admin</h1>
      <p id="description">New type of training !</p>
    </div>
  </header>

  <main>
    <div class="survey-container">
      <form id="survey-form" method="POST" >

        <!--         for name -->
        <div class="survey-element" id="survey-name">
          <label for="name" >Domaine</label>
          <input type="text" name="domaine" id="domaine">
        </div>

        <div class="survey-element" id="survey-name">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
       </div>
       <div class="survey-element" id="survey-name" align="center" >
       <input type="submit" value="Save" id="save">
       <input type="reset" value="Reset">
       </div>
      </form>
    </div>
  </main>
</body>
<script>
    function switchpage()
{
    var b = document.getElementById("save");
    b.addEventListener("save", function (e) {
        e.preventDefault();
        header('Location: crudtypeformation.php');
    });
}
</script>
</body>
</html>
