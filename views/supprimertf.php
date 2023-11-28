
<?php
include '../controller/typeformationC.php';

if (isset($_GET['id'])) {
    $typeformationC = new typeformationC();
    // Vérifier si le formulaire de confirmation a été soumis
    if (isset($_GET['confirmation']) && $_GET['confirmation'] === 'oui') {
        // Supprimer la formation
        $typeformationC->deletetypeFormation($_GET['id']);
        header('location:crudtypeformation.php');
        exit; // Assurez-vous de terminer le script après la redirection
    } else {
        // Afficher le message de confirmation avec un formulaire
        echo '<script>
                var confirmation = confirm("Voulez-vous vraiment supprimer ce type de formation ?");
                if (confirmation) {
                    // Rediriger vers la même page avec la confirmation
                    window.location.href = "supprimertf.php?id=' . $_GET['id'] . '&confirmation=oui";
                } else {
                    // Rediriger vers la liste des formations sans suppression
                    window.location.href = "crudtypeformation.php";
                }
              </script>';
    }
} else {
    echo "ID de la formation non spécifié.";
}
?>
