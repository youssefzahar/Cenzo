<?php

include  "../Controller/ForumC.php";

$forumC= new ForumC();

if(!isset($_POST['str'])){
    $liste=$forumC->afficherForums();
}
else{
    $liste = $forumC->rechercherTicket($_POST['str']);
}
                                foreach($liste as $row){
                                        ?>

                                        <tr>
                                            <td><?php echo $row['categorie']; ?></td>
                                            <?php
                                            $resultaa = $forumC->affichernomprenom($row["id_utilisateur"]);
                                            foreach($resultaa as $row2){
                                            ?>
                                            <td><?php echo $row2['nom']; ?> <?php echo $row2['prenom']; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td><?php echo $row['sujet']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                                <td>
                                                <form method="POST" action="AfficherCommentaireForum.php?id=<?PHP echo $row['id']; ?>">
                                                    <input type="submit" class="btn btn-light" value= "Commentaires">
                                                </form>
                                                </td>
                                            <?php 
                                            if($row['etat']==1)
                                                {
                                                    ?>
                                                <td>

                                                <form method="POST" action="NonApprouver.php?id=<?PHP echo $row['id']; ?>">
                                                    <input type="submit" class="btn btn-success" value= "Approuver">
                                                </form>
                                                </td>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                <td>
                                                <form method="POST" action="Approuver.php?id=<?PHP echo $row['id']; ?>">
                                                    <input type="submit" class="btn btn-warning" value= "Non Approuver">
                                                </form>
                                                </td>
                                                    <?php
                                                }
                                            ?>
                                            <td><?php echo $row['date_creation']; ?> </td>
                                            <td>
                                               <form method="POST" action="SupprimerForum.php">
                                                    <input type="submit" class="btn btn-danger" value= "supprimer">
                                                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                                </form>
                                            </td>
                                        </tr>

        <?php
    }
?>