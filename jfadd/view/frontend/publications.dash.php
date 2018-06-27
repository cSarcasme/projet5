<!--page dasboard of all publication article-->
<?php $title = "Tableau de bord";
 ob_start();
?>

     <?php include('body/topbar2.php');?>     

<div class="color">
    <div class="container-fluid">
        <section>
            <div class="container">
                <?php include('body/dashboard.php')?>
                <h2 class="mt-3">Mes publications</h2>            
                <div class="mt-3"> 
                    <div class="d-flex mb-3 ">
                        <div class="text-muted mr-auto">Retrouvez toutes vos publications</div>
                        <div class=" size3 badge badge-danger mr-3" id="commentNewSignal"><?= $countPostsNoPublish['idPosts'] ?>/NP </div>
                        <div class="size3 badge badge-success" id="commentNew"><?= $countPostsPublish['idPosts'] ?>/P</div>
                    </div>
                </div>

                <!--table of article-->
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th class="tb1" scope="col">Titre</th>
                            <th class="tb2" scope="col">Contenu</th>
                            <th class="tb3" scope="col">date</th>
                            <th class="tb4" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                    foreach($posts as $post){                       
                    ?> 
                    <?php  
                    if($post['posted']=='0'){
                    ?>
                        <tr class="text-dark" style="background-color:#ffdbdb;">
                    <?php 
                    }
                    else{
                        ?>
                        <tr>                   
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
                                                <div><em><?=substr($post['content'],0,300)?>...</em></div>
                                                <p class="size1 text-right">De <span class="text-info"><?=htmlspecialchars($post['name'])?></span></p>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <form method="post">
                                                    <a href="index.php?page=updaptePublishPost&amp;id=<?php echo $post['id'] ?>" class="btn btn-success"> Publier</a>
                                                    <a href="index.php?page=updapteNoPublishPost&amp;id=<?php echo $post['id'] ?>" class="btn btn-danger"> Retirer</a>
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
                                                <div><em><?=substr($content,0,300)?>...</em></div>
                                                <p class="size1 text-right">De <span class="text-info"><?=$post['name']?></span></p>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <form method="post">    
                                                    <a href="index.php?page=deletepost&amp;id=<?=$post['id']?>" class="btn btn-danger">Oui</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                </form>
                                            </div>                                       
                                        </div>
                                    </div>
                                </div>
                                <!-- bouton see post dashboard-->
                                <a href="index.php?page=modifpost&amp;id=<?php echo $post['id'] ?>"><i class="fas fa-pencil-alt fa-lg text-warning" title="Modifier"></i></a>

                                <!-- button modification post -->
                                <a href="index.php?page=adminpost&amp;id=<?php echo $post['id'] ?>"><i  class="fas fa-eye fa-lg text-primary" title="Voir l' article" ></i></a>
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
                            <a class="page-link" href="index.php?page=publications.dash&amp;p=<?=$_GET["p"]-1?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php
                        }
                        else{
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=publications.dash&amp;p=<?=$_GET["p"]=1?>" aria-label="Previous">
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
                            <li class="page-item"><a class="page-link" href="index.php?page=publications.dash&amp;p=<?=$i?>"><?=$i?></a></li>
                        <?php
                        }
                        ?>
                        <!--increase harrow right-->
                        <?php
                        if (isset($_GET["p"]) && $_GET['p']>0 && $_GET['p']<$nbPages) {                           
                        ?>
                        <li class="page-item">
                        <a class="page-link" href="index.php?page=publications.dash&amp;p=<?=$_GET["p"]+1?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                        <?php
                        }
                        else{
                            ?>
                                <li class="page-item">
                        <a class="page-link" href="index.php?page=publications.dash&amp;p=<?=$_GET["p"]=$nbPages?>" aria-label="Next">
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