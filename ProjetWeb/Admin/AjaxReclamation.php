<?php

include  "../Controller/ReclamationC.php";

$reclamationC= new ReclamationC();

if(!isset($_POST['str'])){
    $liste=$reclamationC->afficherReclamations();
}
else{
    $liste = $reclamationC->rechercherTicket($_POST['str']);
}
                       foreach($liste as $row){
        ?>
                                        <tr>
                                            <?php
                                            $resultaa = $reclamationC->affichernomprenom($row["id_utilisateur"]);
                                            foreach($resultaa as $row2){
                                            ?>
                                            <td><?php echo $row2['nom']; ?> <?php echo $row2['prenom']; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td><?php echo $row['sujet']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td>
                                               <form method="POST" action="SupprimerReclamation.php">
                                                    <input type="submit" class="btn btn-danger" value= "supprimer">
                                                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                                </form>
                                            </td>
                                        </tr>

        <?php
    }
?>