<!--page admins of dashboard -->
<?php $title = "Tableau de bord";
 ob_start();
?>

<?php include('body/topbar2.php'); ?>

<div class="color">
    <div class="container-fluid">
        <section>
            <div class="container">
                <?php include('body/dashboard.php')?>
                <h2 class="mt-4">Récapitulatif d' administration</h2>
                <div class="text-muted mb-4">Retrouvez tous vos administrateurs</div>
                <div class="d-flex bd-highlight">
                    <div class="mr-auto bd-highlight">
                        <h5 class="bg-info border font-weight-bold border-info text-white">Admin</h5>
                    </div>
                    <div class="bd-highlight">
                        <div class="size3 badge badge-success"><?= $countAdmin['idAdmins'] ?></div>
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
                            foreach($datasAdmin as $data){                             
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
                                                    <a href="index.php?page=deleteadmin&amp;id=<?=$data['id']?>"><button type="button"class="btn btn-danger">Oui</button></a>
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
            <div class="container">
                <div class="d-flex bd-highlight">
                    <div class="mr-auto bd-highlight">
                        <h5 class="bg-info border font-weight-bold border-info text-white">Utilisateurs</h5>
                    </div>
                    <div class="bd-highlight">
                        <div class="size3 badge badge-success"><?= $countUsers['idUsers'] ?></div>
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
                            foreach($datasUser as $data){                             
                        ?>
                        <tr>
                            <td><?=htmlspecialchars($data['name'])?></td>
                            <td><?= htmlspecialchars($data['pseudo'])?></td>
                            <td><?= htmlspecialchars($data['email'])?></td>
                            <td>Utilisateurs</td>
                            <td><?= date("d/m/Y",strtotime(htmlspecialchars($data['date'])))?></td>
                            <td>
                            <!-- bouton delete comment dashboard-->
                                <a href="#" data-toggle="modal" data-target="#mymodaldeleteUser<?php echo $data['id'] ?>"><i class="fas fa-trash fa-lg text-danger" title="Supprimer"></i></a>

                                <!-- The Modal delete comment -->
                                <div class="modal fade" id="mymodaldeleteUser<?php echo $data['id'] ?>">
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
                                                    <a href="index.php?page=deleteuser&amp;id=<?=$data['id']?>" class="btn btn-danger">Oui</button></a>
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
            <!-- pagination of the board -->
            <div class="container">
                <div class="row justify-content-center">
                    <nav aria-label="Page navigation example">               
                    <ul class="pagination ">
                        <!--decrease harrow left-->
                        <?php if (isset($_GET["p"]) && $_GET['p']>1 && $_GET['p']<=$nbPages) {
                            ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=admins.dash&amp;p=<?=$_GET["p"]-1?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php
                        }
                        else{
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=admins.dash&amp;p=<?=$_GET["p"]=1?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                        <!--number pagination-->
                        <?php
                        for($i=1; $i<=$nbPages; $i++){
                        ?>
                            <li class="page-item"><a class="page-link" href="index.php?page=admins.dash&amp;p=<?=$i?>"><?=$i?></a></li>
                        <?php
                        }
                        ?>
                        <!--increase harrow right-->
                        <?php
                        if (isset($_GET["p"]) && $_GET['p']>0 && $_GET['p']<$nbPages) {                           
                        ?>
                        <li class="page-item">
                        <a class="page-link" href="index.php?page=admins.dash&amp;p=<?=$_GET["p"]+1?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                        <?php
                        }
                        else{
                            ?>
                                <li class="page-item">
                        <a class="page-link" href="index.php?page=admins.dash&amp;p=<?=$_GET["p"]=$nbPages?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>;
                        <?php
                        }
                        ?>
                    </ul>            
                    </nav>
                </div>
            </div>
        </section>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>