<?php

include  "../Controller/ClientC.php";

$clientc= new ClientC();

if(!isset($_POST['str'])){
    $liste=$clientc->afficherClients();
}
else{
    $liste = $clientc->rechercherTicket($_POST['str']);
}

                                        foreach($liste as $row){
                                        ?>

                                        <tr>
                                            <td><?php echo $row['nom']; ?></td>
                                            <td><?php echo $row['prenom']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['mdp']; ?></td>
                                            <td><?php echo $row['tel']; ?></td>
                                            <td><?php echo $row['adresse']; ?></td>
                                            <td><?php echo $row['sexe']; ?></td>
                                            <td><?php echo $row['date_nais']; ?></td>
                                            <td><img src="../Views/<?php echo $row['image']; ?>" heigth="200" width=150></td>
                                            <td>
                                               <form method="POST" action="supprimerClient.php">
                                                    <input type="submit" class="btn btn-danger" value= "supprimer">
                                                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                                </form>
                                            </td>
                                      </tr>
                                <?php
                                }
?>