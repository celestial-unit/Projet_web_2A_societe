<?php
include '../controller/formationC.php';
//include '../model/formation.php';
$fc= new formationC ();
$tab=$fc->afficherFormation();
?>
<center>
    <h1>List of formation</h1>
    <h2>
        <a href="addformation.php">Add Formation</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id Formation</th>
        <th>NomFormation</th>
        <th>Paiement</th>
        <th>Domaine</th>
        <th>Niveau</th>
        <th>ImgUrl</th>
        <th>Description</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $formationn) {
    ?>
        <tr>
            <td><?php echo $formationn['id_formation']; ?></td>
            <td><?php echo $formationn['Nom']; ?></td>
            <td><?php echo $formationn['paiement']; ?></td>
            <td><?php echo $formationn['Domaine']; ?></td>
            <td><?php echo $formationn['Niveau']; ?></td>
            <td><?php echo $formationn['image_url']; ?></td>
            <td><?php echo $formationn['description']; ?></td>
            <td align="center">
            <form method="POST" action="update.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $formationn['id_formation']; ?> name="id_formation">
                </form>
            </td>
            <td>
            <a href="supprimerformation.php?id=<?php echo $formationn['id_formation']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>