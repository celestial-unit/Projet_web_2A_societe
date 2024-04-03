<?php
include '../controller/formationC.php';

if (isset($_GET['id'])) {
    $formationC = new formationC();

    // Vérifier si le formulaire de confirmation a été soumis
    if (isset($_GET['confirmation']) && $_GET['confirmation'] === 'oui') {
        // Supprimer la formation
        $formationC->deleteFormation($_GET['id']);
        header('location:newcrudview.php');
        exit; // Assurez-vous de terminer le script après la redirection
    } else {
        // Afficher le message de confirmation avec un formulaire
        echo '<script>
                var confirmation = confirm("Voulez-vous vraiment supprimer cette formation ?");
                if (confirmation) {
                    // Rediriger vers la même page avec la confirmation
                    window.location.href = "supprimerformation.php?id=' . $_GET['id'] . '&confirmation=oui";
                } else {
                    // Rediriger vers la liste des formations sans suppression
                    window.location.href = "newcrudview.php";
                }
              </script>';
    }
} else {
    echo "ID de la formation non spécifié.";
}
?>
