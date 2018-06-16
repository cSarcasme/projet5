<!--page admins of dashboard -->
<?php $title = "Tableau de bord";
 ob_start();
?>

<session>
    <div class="container">
        <?php include('body/dashboard.php')?>
        <div class="col-12">
            <h2 class="mt-4">Récapitulatif d' administration</h2>
        </div>
        <div class="container mt-3"> 
            <div class="d-flex mb-3 ">
                <div class="mr-auto">Retrouvez tous vos administrateurs</div>
            </div>
        </div>
        <!--table of admins-->
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Role</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($datas as $data){                             
                ?>
                <tr>
                    <td><?=htmlspecialchars($data['name'])?></td>
                    <td><?= htmlspecialchars($data['pseudo'])?></td>
                    <td><?= htmlspecialchars($data['email'])?></td>
                    <td>Administrateur</td>
                    <td><?= date("d/m/Y",strtotime(htmlspecialchars($data['date'])))?></td>
                    <td>
                    <!-- bouton delete comment dashboard-->
                        <a href="#" data-toggle="modal" data-target="#mymodaldelete<?php echo $data['id'] ?>"><i class="fas fa-trash fa-lg text-danger" title="Supprimer"></i></a>

                        <!-- The Modal delete comment -->
                        <div class="modal fade" id="mymodaldelete<?php echo $data['id'] ?>">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                
                                    <div class="modal-header">
                                    <h4 class="modal-title">Voulez vous supprimer cet administrateur</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <p><strong><?=htmlspecialchars($data['name'])?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($data['date'])))?></span></p>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <form method="post">    
                                            <a href="admin.php?page=deleteadmin&amp;id=<?=$data['id']?>"><button type="button"class="btn btn-danger">Oui</button></a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</session>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>