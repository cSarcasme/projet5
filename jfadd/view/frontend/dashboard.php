<!--page dashboard of comment-->
<?php $title = "Tableau de bord";
 ob_start();
?>
<header>
    <?php include('body/topbar2.php'); ?>
</header>
<div class="color">
    <div class="container-fluid">
        <section>
            <div class="container">
                <?php include('body/dashboard.php')?>     
                <h2 class=" mt-3">Commentaires nons  lus</h2>
                <div class="text-muted ">Retrouvez tous vos nouveaux commentaires</div>
                <div class="row">
                    <aside class="col-12 clo-lg6 mt-4">
                        <div class="clearfix">
                            <div class="float-left">
                                <h5 class="bg-info border font-weight-bold border-info text-white">Commentaires du blog</h5>
                            </div>
                            <div class="d-flex float-right mb-3 ">
                                <div class=" size3 badge badge-danger mr-3" id="commentNewSignal"><?= $countCommentsSeenSignal['idComments'] ?>/SA </div>
                                <div class=" size3 badge badge-warning mr-3 text-white" id="commentNewSignal"><?= $tableCountCommentsSeenToValid['idComments'] ?>/NV </div>
                                <div class="size3 badge badge-success" id="commentNew"><?= $countCommentsSeen['idComments']  ?>/V</div>
                            </div>
                        </div>
                        <!--table of comment-->       
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Chapitres</th>
                                    <th>Commentaires</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                foreach($comments as $comment){                       
                                ?> 
                                <?php  
                                if($comment['seen']=='2'){
                                ?>
                                    <tr style="background-color:#ffd3d3;">
                                <?php 
                                }
                                else{
                                ?>
                                    <tr style="background-color:#d6ffd8;">
                                <?php
                                } 
                                ?>
                                
                                <td><?=$comment['title']?></td>
                                <td><?= htmlspecialchars(substr($comment['comment'],0,50))?></td>
                                <td>
                                    <!-- bouton update comment dashboard-->
                                    <a href="#" data-toggle="modal" data-target="#mymodalok<?php echo $comment['id'] ?>"><i class="fas fa-check fa-lg text-success" title="Valider"></i></a>
                                    
                                    <!-- The Modal update comment -->
                                    <div class="modal fade" id="mymodalok<?php echo $comment['id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <div class="modal-header">
                                                    <h4 class="modal-title">voulez vous valider ce commentaire</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <p>Par <strong><?=htmlspecialchars($comment['name'])?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($comment['date'])))?></span></p>
                                                    <p><em><?=htmlspecialchars($comment['comment'])?></em></p>
                                                    <p class="size1 text-right">De <span class="text-info"><?=htmlspecialchars($comment['email'])?></span></p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <form method="post">
                                                        <a href="index.php?page=updateValidComment&amp;id=<?=$comment['id']?>" class="btn btn-success">Oui</a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- bouton delete comment dashboard-->
                                    <a href="#" data-toggle="modal" data-target="#mymodaldelete<?php echo $comment['id'] ?>"><i class="fas fa-trash fa-lg text-danger" title="Supprimer"></i></a>

                                    <!-- The Modal delete comment -->
                                    <div class="modal fade" id="mymodaldelete<?php echo $comment['id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <div class="modal-header">
                                                <h4 class="modal-title">Voulez vous supprimer ce commentaire</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <p>Par <strong><?=$comment['name']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($comment['date'])))?></span></p>
                                                    <p><em><?=htmlspecialchars($comment['comment'])?></em></p>
                                                    <p class="size1 text-right">De <span class="text-info"><?=$comment['email']?></span></p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <form method="post">    
                                                        <a href="index.php?page=deleteComment&amp;id=<?=$comment['id']?>" class="btn btn-danger">Oui</a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- bouton see comment dashboard-->
                                    <a href="#" data-toggle="modal" data-target="#mymodalsee<?php echo $comment['id'] ?>" ><i  class="fas fa-eye fa-lg text-primary" title="Voir commentaire" ></i></a>

                                    <!-- The Modal see comment -->
                                    <div class="modal fade" id="mymodalsee<?php echo $comment['id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <div class="modal-header">
                                                <h4 class="modal-title"><?=$comment['title']?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <p>Par <strong><?=$comment['name']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($comment['date'])))?></span></p>
                                                    <p><em><?=$comment['comment']?></em></p>
                                                    <p class="size1 text-right">De <span class="text-info"><?=$comment['email']?></span></p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </aside>
                    <aside class="col-12 clo-lg6 mt-4">
                        <div class="clearfix">
                            <div class="float-left">
                                <h5 class="bg-info border font-weight-bold border-info text-white">Commentaires des films</h5>
                            </div>
                            <div class="d-flex float-right mb-3 ">
                                <div class=" size3 badge badge-danger mr-3" id="commentNewSignal"><?=  $countCommentsFilmSeenSignal['idComments'] ?>/SA </div>
                                <div class=" size3 badge badge-warning mr-3 text-white" id="commentNewSignal"><?=  $tableCountCommentsFilmSeenToValid['idComments'] ?>/NV </div>
                                <div class="size3 badge badge-success" id="commentNew"><?= $countCommentsFilmSeen['idComments'] ?>/V</div>
                            </div>
                        </div>
                        <!--table of comment-->       
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Chapitres</th>
                                    <th>Commentaires</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                foreach($commentsFilm as $commentFilm){                       
                                ?> 
                                <?php  
                                if($commentFilm['seen']=='2'){
                                ?>
                                    <tr style="background-color:#ffd3d3;">
                                <?php 
                                }
                                else{
                                ?>
                                    <tr style="background-color:#d6ffd8;">
                                <?php
                                } 
                                ?>
                                
                                <td><?=htmlspecialchars(substr($commentFilm['title'],0,30))?></td>
                                <td><?= htmlspecialchars(substr($commentFilm['comment'],0,30))?></td>
                                <td>
                                    <!-- bouton update comment dashboard-->
                                    <a href="#" data-toggle="modal" data-target="#mymodalokfilm<?php echo $commentFilm['id'] ?>"><i class="fas fa-check fa-lg text-success" title="Valider"></i></a>
                                    
                                    <!-- The Modal update comment -->
                                    <div class="modal fade" id="mymodalokfilm<?php echo $commentFilm['id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <div class="modal-header">
                                                    <h4 class="modal-title">voulez vous valider ce commentaire</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <p>Par <strong><?=htmlspecialchars($commentFilm['name'])?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($commentFilm['date'])))?></span></p>
                                                    <p><em><?=htmlspecialchars($commentFilm['comment'])?></em></p>
                                                    <p class="size1 text-right">De <span class="text-info"><?=htmlspecialchars($commentFilm['email'])?></span></p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <form method="post">
                                                        <a href="index.php?page=updateValidCommentFilm&amp;id=<?=$commentFilm['id']?>" class="btn btn-success">Oui </a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- bouton delete comment dashboard-->
                                    <a href="#" data-toggle="modal" data-target="#mymodaldeletefilm<?php echo $commentFilm['id'] ?>"><i class="fas fa-trash fa-lg text-danger" title="Supprimer"></i></a>

                                    <!-- The Modal delete comment -->
                                    <div class="modal fade" id="mymodaldeletefilm<?php echo $commentFilm['id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <div class="modal-header">
                                                <h4 class="modal-title">Voulez vous supprimer ce commentaire</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <p>Par <strong><?=$commentFilm['name']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($commentFilm['date'])))?></span></p>
                                                    <p><em><?=htmlspecialchars($commentFilm['comment'])?></em></p>
                                                    <p class="size1 text-right">De <span class="text-info"><?=$commentFilm['email']?></span></p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <form method="post">    
                                                        <a href="index.php?page=deleteCommentFilm&amp;id=<?=$commentFilm['id']?>" class="btn btn-danger">Oui</button></a>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- bouton see comment dashboard-->
                                    <a href="#" data-toggle="modal" data-target="#seecommentfilm<?php echo $commentFilm['id'] ?>" ><i  class="fas fa-eye fa-lg text-primary" title="Voir commentaire" ></i></a>

                                    <!-- The Modal see comment -->
                                    <div class="modal fade" id="seecommentfilm<?php echo $commentFilm['id'] ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <div class="modal-header">
                                                <h4 class="modal-title"><?=$commentFilm['title']?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <p>Par <strong><?=$commentFilm['name']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($commentFilm['date'])))?></span></p>
                                                    <p><em><?=$commentFilm['comment']?></em></p>
                                                    <p class="size1 text-right">De <span class="text-info"><?=$commentFilm['email']?></span></p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </aside>
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
                                    <a class="page-link" href="index.php?page=dashboard&amp;p=<?=$_GET["p"]-1?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                                }
                                else{
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=dashboard&amp;p=<?=$_GET["p"]=1?>" aria-label="Previous">
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
                                    <li class="page-item"><a class="page-link" href="index.php?page=dashboard&amp;p=<?=$i?>"><?=$i?></a></li>
                                <?php
                                }
                                ?>
                                <!--increase harrow right-->
                                <?php
                                if (isset($_GET["p"]) && $_GET['p']>0 && $_GET['p']<$nbPages) {                           
                                ?>
                                <li class="page-item">
                                <a class="page-link" href="index.php?page=dashboard&amp;p=<?=$_GET["p"]+1?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </li>
                                <?php
                                }
                                else{
                                    ?>
                                        <li class="page-item">
                                <a class="page-link" href="index.php?page=dashboard&amp;p=<?=$_GET["p"]=$nbPages?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <?php
                                }
                                ?>
                            </ul>            
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>