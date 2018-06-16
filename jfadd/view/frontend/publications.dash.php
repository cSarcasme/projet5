<!--page dasboard of all publication article-->
<?php $title = "Tableau de bord";
 ob_start();
?>

<session>
    <div class="container">
        <?php include('body/dashboard.php')?>
        <div class="col-12">
            <h2 class="mt-4">Mes publications</h2>
        </div>
                
        <div class="container mt-3"> 
            <div class="d-flex mb-3 ">
                <div class="mr-auto">Retrouvez toutes vos publications</div>
                <div class=" size3 badge badge-danger mr-3" id="commentNewSignal"><?= $countPostsNoPublish['idPosts'] ?>/NP </div>
                <div class="size3 badge badge-success" id="commentNew"><?= $countPostsPublish['idPosts'] ?>/P</div>
            </div>
        </div>
        <!--table of article-->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            foreach($posts as $post){                       
            ?> 
            <?php  
            if($post['posted']=='0'){
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
            
            <td><?=htmlspecialchars(substr($post['title'],0,35))?></td>
            <td><?= html_entity_decode(substr($post['content'],0,100))?>...</td>
            <td><?= date("d/m/Y H:i ",strtotime($post['date']))?></td>
            <td>
                <!-- bouton valid posts dashboard-->
                <a href="#" data-toggle="modal" data-target="#mymodalok<?php echo $post['id'] ?>"><i class="fas fa-check fa-lg text-success" title="Publier"></i></a>
                
                <!-- The Modal valid posts -->
                <div class="modal fade" id="mymodalok<?php echo $post['id'] ?>">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content modalPublish">
                        
                            <div class="modal-header">
                                <h4 class="modal-title">Voulez vous publier cet article</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <div class="modal-body">
                                <p><strong><?=$post['title']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime($post['date']))?></span></p>
                                <p><em><?=substr($post['content'],0,300)?>...</em></p>
                                <p class="size1 text-right">De <span class="text-info"><?=htmlspecialchars($post['name'])?></span></p>
                            </div>
                            
                            <div class="modal-footer">
                                <form method="post">
                                    <a href="admin.php?page=updaptePublishPost&amp;id=<?php echo $post['id'] ?>"><button type="button" class="btn btn-success">Publier</button></a>
                                    <a href="admin.php?page=updapteNoPublishPost&amp;id=<?php echo $post['id'] ?>"><button type="button" class="btn btn-danger">Retirer</button></a>
                                </form>
                            </div>           
                        </div>
                    </div>
                </div>
                                            
                <!-- bouton delete posts dashboard-->
                <a href="#" data-toggle="modal" data-target="#mymodaldelete<?php echo $post['id'] ?>"><i class="fas fa-trash fa-lg  text-danger" title="Supprimer "></i></i></a>
                
                <!-- The Modal delete posts -->
                <div class="modal fade" id="mymodaldelete<?php echo $post['id'] ?>">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content modalPublish">
                        
                            <div class="modal-header">
                                <h4 class="modal-title">Voulez vous supprimer cet article</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <?php $content=html_entity_decode($post['content'])?>
                            <div class="modal-body">
                                <p><strong><?=$post['title']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime($post['date']))?></span></p>
                                <p><em><?=substr($content,0,300)?>...</em></p>
                                <p class="size1 text-right">De <span class="text-info"><?=$post['name']?></span></p>
                            </div>
                            
                            <div class="modal-footer">
                                <form method="post">    
                                    <a href="admin.php?page=deletepost&amp;id=<?=$post['id']?>"<button type="button" name="delete" class="btn btn-danger">Oui</button></a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                </form>
                            </div>                                       
                        </div>
                    </div>
                </div>
                <!-- bouton see post dashboard-->
                <a href="admin.php?page=modifpost&amp;id=<?php echo $post['id'] ?>"><i class="fas fa-pencil-alt fa-lg text-warning" title="Modifier"></i></a>

                <!-- button modification post -->
                <a href="admin.php?page=adminpost&amp;id=<?php echo $post['id'] ?>"><i  class="fas fa-eye fa-lg text-primary" title="Voir l' article" ></i></a>
            </td>                          
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
                    <a class="page-link" href="admin.php?page=publications.dash&amp;p=<?=$_GET["p"]-1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php
                }
                else{
                ?>
                <li class="page-item">
                    <a class="page-link" href="admin.php?page=publications.dash&amp;p=<?=$_GET["p"]=1?>" aria-label="Previous">
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
                    <li class="page-item"><a class="page-link" href="admin.php?page=publications.dash&amp;p=<?=$i?>"><?=$i?></a></li>
                <?php
                }
                ?>
                <!--increase harrow right-->
                <?php
                if (isset($_GET["p"]) && $_GET['p']>0 && $_GET['p']<$nbPages) {                           
                ?>
                <li class="page-item">
                <a class="page-link" href="admin.php?page=publications.dash&amp;p=<?=$_GET["p"]+1?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
                <?php
                }
                else{
                    ?>
                        <li class="page-item">
                <a class="page-link" href="admin.php?page=publications.dash&amp;p=<?=$_GET["p"]=$nbPages?>" aria-label="Next">
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
</session>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>