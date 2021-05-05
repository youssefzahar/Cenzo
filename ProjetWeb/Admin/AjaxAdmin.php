<?php

include  "../Controller/AdminC.php";

$adminc= new AdminC();

if(!isset($_POST['str'])){
    $liste=$adminc->afficherAdmins();
}
else{
    $liste = $adminc->rechercherTicket($_POST['str']);
}

                                        foreach($liste as $row){
        ?>
                                        <tr>
                                            <td><?php echo $row['nom']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['mdp']; ?></td>
                                            <td><?php echo $row['tel']; ?></td>
                                            <td><img src="<?php echo $row['image']; ?>" heigth="200" width=150></td>
                                            <td><?php echo $row['dernier_acc']; ?></td>
                                            <td>
                                                <form method="POST" action="ModifierAdmin.php?id=<?PHP echo $row['id']; ?>">
                                                    <input type="submit" class="btn btn-success" value= "Modifier">
                                                </form>
                                            </td>
                                            <td>
                                               <form method="POST" action="supprimerAdmin.php">
                                                    <input type="submit" class="btn btn-danger" value= "supprimer">
                                                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                                </form>
                                            </td>
                                        </tr>

        <?php
    }
?>