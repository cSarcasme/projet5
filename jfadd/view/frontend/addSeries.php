<!--page add dashboard-->    
<?php $title = "Series"?>

<?php ob_start(); ?>   
<?php include('body/topbar2.php');?>
<section>
    <div class="container">
        <?php include('body/media.php')?>

        <div class="alert alert-danger" id="danger" style="visibility:hidden;" role="alert">Tous les champs ne sont pas remplies</div> 

        <h2 class="mt-4 ml-3">Films</h2>
        <div class="clearfix mb-1">
            <p class="ml-3 float-left">Retrouvé tous vos films</p>           
            <div class="float-right mr-2">

                <!--icon add link movie -->
                <a href="" class="mr-1" title="ajouter liens de la serie" data-toggle="modal" data-target="#addLink"><i class="fas fa-link fa-lg text-white p-2 bg-success"></i></a>
                <!--modal of icone add link movie-->
                <div class="modal fade" id="addLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Ajouter lien de la serie</h5>
                                <button type="button"  class="close" data-dismiss="modal" aria-label="Close" id="closeLinkMovie">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--if click on add a link-->
                                <?php
                                if(isset($_POST['linkSerie'])){
                                    $season = htmlspecialchars($_POST['season']);
                                    $episode = htmlspecialchars($_POST['episode']);
                                    $lang = htmlspecialchars($_POST['lang']);
                                    $title =htmlspecialchars(trim($_POST['titleLink']));
                                    $mango = htmlspecialchars(trim($_POST['mango']));
                                    $open = htmlspecialchars(trim($_POST['open']));
                                    $oza = htmlspecialchars(trim($_POST['oza']));
                                    $rapi = htmlspecialchars(trim($_POST['rapid']));
                                    $upto = htmlspecialchars(trim($_POST['upto']));
                                    $nc = htmlspecialchars(trim($_POST['nc']));   
                                            
                                    add_LinkSerie($season,$episode,$title,$lang,$mango,$open,$oza,$rapi,$upto,$nc);                                           
                                }

                                ?>
                                <form method="post">
                                    <div class="form-group d-flex ">                        
                                        <input type="text" placeholder="Code IMDB" class="form-control imdb" id="imdbLink" >
                                        <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="importer info IMDB" id="valImdbLink">
                                            <i class="fa fa-check-circle fa-lg text-white"></i>
                                        </button>  
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Titre" class="form-control" name="titleLink" id="titleLink" value="">
                                    </div>
                                    <div class="form-group ">
                                        <select class="form-control season " name="season">
                                        <?php for($i=1; $i<=25; $i++){
                                            echo'<option value='.$i.'>S '.$i.'</option>';
                                             }
                                        ?>
                                        <select>
                                    </div>
                                    <div class="form-group ">
                                        <select class="form-control episode " name="episode">
                                        <?php for($i=0; $i<=100; $i++){
                                            echo'<option value='.$i.'>E '.$i.'</option>';
                                             }
                                        ?>
                                        <select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control " name="lang">
                                            <option value="VO">Vo</option>
                                            <option value="VF">Vf</option>
                                        </select>
                                    </div>                                  
                                    <div class="form-group">
                                        <input type="text" placeholder="Stream mango" class="form-control" name="mango" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Openload" class="form-control" name="open" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Videoza" class="form-control" name="oza" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="rapidVideo" class="form-control" name="rapid" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Uptobox" class="form-control" name="upto" >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nc" class="form-control" name="nc">
                                    </div>                                       
                                    <div class="modal-footer">
                                        <button type="submit" name="linkSerie"  class="btn btn-success">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>    
                <!-- icone add film -->
                <a href="" title="ajouter serie" data-toggle="modal" data-target="#addSerie"><i class="fa fa-plus-square fa-lg text-white p-2 bg-success"></i></a>
                <!--modal of icone add film-->
                <div class="modal fade" id="addSerie" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Ajouter serie</h5>
                                <button type="button"  class="close" data-dismiss="modal" aria-label="Close" id="closeMovie">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--if click on add-->
                                <?php
                                if(isset($_POST['postSerie'])){
                                    $title =htmlspecialchars(trim($_POST['title']));
                                    $kind = htmlspecialchars(trim($_POST['kind']));
                                    $exit = htmlspecialchars(trim($_POST['year']));
                                    $image = htmlspecialchars(trim($_POST['image']));
                                    $note = htmlspecialchars(trim($_POST['note']));
                                    $ba = htmlspecialchars(trim($_POST['ba']));
                                    $prod = htmlspecialchars(trim($_POST['prod']));
                                    $acteurs = htmlspecialchars(trim($_POST['acteur']));
                                    $synops= htmlspecialchars(trim($_POST['synops']));    
                                
                                    if(empty($title) OR empty($kind) OR empty($exit)  OR empty($image) OR
                                    empty($note) OR empty($ba) OR empty($prod) OR empty($acteurs) OR empty($synops)){
                                        ?> 
                                        <script>
                                            var dangerElmt = document.getElementById("danger");
                                            dangerElmt.style.visibility ='visible';    
                                        </script>
                                        <?php
                                    }
                                    else{
                                        add_Series($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops);  
                                    }
                                }

                                ?>
                                <form method="post">
                                    <div class="form-group d-flex ">                        
                                        <input type="text" placeholder="Code IMDB" class="form-control imdb" id="imdbMovie">
                                        <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="importer info IMDB" id="valImdb">
                                            <i class="fa fa-check-circle fa-lg text-white"></i>
                                        </button>  
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Titre" class="form-control erase" name="title" id="title">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="kind" class="form-control erase" placeholder="Genre" id="kind" style="height:38px"></textarea> 
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Année" class="form-control erase" name="year" id="year">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Image" class="form-control erase" name="image" id="image">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Note" class="form-control erase" name="note" id="note">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Bande annonce" class="form-control erase" name="ba" id="ba">
                                    </div>
                                    <div class="form-group">
                                        <textarea placeholder="Production" class="form-control erase" name="prod" id="prod" style="height:38px"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Acteur" class="form-control erase" name="acteur" id="acteur">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label text-dark font-weight-bold">Synopsis</label>
                                        <textarea id="synopsis" name="synops" class="form-control erase" id="message-text"></textarea>
                                    </div>
                                
                                    <div class="modal-footer">
                                        <button type="submit" name="postSerie"  class="btn btn-success">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        
            <div class="mr-2 float-right">
                <!-- barre de recherche -->
                <form method="post" action="index.php?page=addSeries&amp;p=1" id="searchMovieBa">                
                    <div class="input-group px-5" style="">
                        <input type="search" name="search" id="search" class="form-control" >
                        
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-warning">
                            <span><i class="fas fa-search text-dark"></i></span>
                        </button>         
                    </div>
                    </div>                                      
                </form>
            </div>
        </div>

        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th class="th1" scope="col">id</th>
                    <th class="th2" scope="col">Titre</th>
                    <th class="th3" scope="col">Synopsis</th>
                    <th class="th4" scope="col">Genre</th>
                    <th class="th5" scope="col">Année</th>
                    <th class="th6" scope="col">Action</th>
                </tr>
            </thead>
            <?php 
            
                foreach($postSeries as $postSerie){
                    
                ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $postSerie['id']?></th>
                    <td><?= htmlspecialchars($postSerie['title'])?></td>
                    <td><?= substr(htmlspecialchars($postSerie['synopsis']),0,100)?>...</td>
                    <td><?= htmlspecialchars($postSerie['kind'])?></td>
                    <td><?= htmlspecialchars($postSerie['datesortie'])?></td>

                   
                    <td>
                        <!--icone update serie-->
                        <a href="" title="mettre a jour les infos de la serie" data-toggle="modal" data-target="#<?= $postSerie['id']?>"><i class="fa fa-plus-square fa-lg text-primary"></i></a>
                        <!--modal of update serie-->
                        <div class="modal fade" id="<?=$postSerie['id']?>" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Mettre à jour les infos film</h5>
                                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!--if click on  update serie-->
                                        <?php
                                        if(isset($_POST['updateSerie'])){
                                            $serieId =$_POST['idUpSerie'];
                                            $title =htmlspecialchars(trim($_POST['titleUpSerie']));
                                            $kind = htmlspecialchars(trim($_POST['kindUpSerie']));
                                            $exit = htmlspecialchars(trim($_POST['yearUpSerie']));
                                            $image = htmlspecialchars(trim($_POST['imageUpSerie']));
                                            $note = htmlspecialchars(trim($_POST['noteUpSerie']));
                                            $ba = htmlspecialchars(trim($_POST['baUpSerie']));
                                            $prod = htmlspecialchars(trim($_POST['prodUpSerie']));
                                            $acteurs = htmlspecialchars(trim($_POST['acteurUpSerie']));
                                            $synops= htmlspecialchars(trim($_POST['synopsUpSerie']));    
                                        
                                            if(empty($title) OR empty($kind) OR empty($exit) OR empty($image) OR
                                            empty($note) OR empty($ba) OR empty($prod) OR empty($acteurs) OR empty($synops)){
                                                ?> 
                                                <script>
                                                    var dangerElmt = document.getElementById("danger");
                                                    dangerElmt.style.visibility ='visible';    
                                                </script>
                                                <?php
                                            }
                                            else{
                                                update_Serie($title,$kind,$exit,$image,$note,$ba,$prod,$acteurs,$synops,$serieId);  
                                            }
                                        }         
                                        ?>
                                    
                                        <form method="post">
                                            <div class="form-group d-flex ">                        
                                                <input type="text" placeholder="Id du film" class="form-control" name="idUpSerie" value="<?=$postSerie['id']?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Titre" class="form-control" name="titleUpSerie" value="<?=htmlspecialchars($postSerie['title'])?>">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="kindUpSerie" class="form-control" placeholder="Genre" style="height:38px"><?=htmlspecialchars($postSerie['kind'])?></textarea> 
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Année" class="form-control" name="yearUpSerie" value="<?=htmlspecialchars($postSerie['datesortie'])?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Image" class="form-control" name="imageUpSerie" value="<?=htmlspecialchars($postSerie['image'])?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Note" class="form-control" name="noteUpSerie" value="<?=htmlspecialchars($postSerie['note'])?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Bande annonce" class="form-control" name="baUpSerie" value="<?=htmlspecialchars($postSerie['bandeannonce'])?>">
                                            </div>
                                            <div class="form-group">
                                                <textarea placeholder="Production" class="form-control" name="prodUpSerie"  style="height:38px"><?=htmlspecialchars($postSerie['production'])?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Acteur" class="form-control" name="acteurUpSerie"  value="<?=htmlspecialchars($postSerie['acteur'])?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label text-dark font-weight-bold">Synopsis</label>
                                                <textarea id="" name="synopsUpSerie" class="form-control" id=""><?=htmlspecialchars($postSerie['synopsis'])?></textarea>
                                            </div>
                                        
                                            <div class="modal-footer">
                                                <button type="submit" name="updateSerie" class="btn btn-success">Mettre a jour</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--icon page info-->
                        <a href="index.php?page=seriesInfo&amp;title=<?=$postSerie['title']?>" class="ml-1" title="ajouter liens du film"><i class="fas fa-info-circle fa-lg text-warning"></i> </a>
                        
                        <!--icon delete-->
                        <a href="" class="ml-1" title="supprimer film" data-toggle="modal" data-target="#delete<?=$postSerie['id']?>"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                        
                        <!-- Modal delete-->
                        <div class="modal fade" id="delete<?=$postSerie['id']?>" tabindex="-4" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Voulez vous supprimer ce film ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark"><?=htmlspecialchars($postSerie['title'])?></p>
                                </div>
                                <div class="modal-footer">
                                    <?php
                                        if(isset($_POST['delete'])){
                                            $title=$postSerie['title'];

                                            delete_Film($title);
                                        }
                                    ?>
                                    <form method="post" action="index.php?page=deleteFilm&amp;title=<?=$postSerie['title']?>">
                                        <button type="submit" name="delete" class="btn btn-danger">Supprimer film et liens</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    
                </tr>
            </tbody>
            <?php
                
            }
            ?>
        </table>
    </div>
</section>

<script src="../public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>
<script  src="public/js/ajax.js"></script>
<script src="public/js/addMovie.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>