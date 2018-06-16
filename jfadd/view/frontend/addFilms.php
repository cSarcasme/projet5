<!--page add dashboard-->    
<?php $title = "Films"?>

<?php ob_start(); ?>   

<section>
    <div class="container">
        <?php include('body/adddashboard.php')?>

        <div class="alert alert-danger" id="danger" style="visibility:hidden;" role="alert">Tous les champs ne sont pas remplies</div> 

        <h2 class="mt-4 ml-3">Films</h2>
        <div class="clearfix mb-1">
            <p class="ml-3 float-left">Retrouvé tous vos films</p>           
            <div class="float-right mr-2">

                <script>
                    function send() {
                        var DSLScript  = document.createElement("script");
                        DSLScript.src  = "public/js/addMovie.js";
                        DSLScript.type = "text/javascript";
                        document.body.appendChild(DSLScript);
                        document.body.removeChild(DSLScript);
                    }
                </script>

                <!--icon add link movie -->
                <a href="" class="mr-1" title="ajouter liens du film" data-toggle="modal" data-target="#addLink"><i class="fas fa-link fa-lg text-white p-2 bg-success"></i></a>
                <!--modal of icone add link movie-->
                <div class="modal fade" id="addLink" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Ajouter film</h5>
                                <button type="button"  class="close" data-dismiss="modal" aria-label="Close" id="closeLinkMovie">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--if click on add a link-->
                                <?php
                                if(isset($_POST['linkMovie'])){
                                    $lang = htmlspecialchars($_POST['lang']);
                                    $title =htmlspecialchars(trim($_POST['titleLink']));
                                    $mango = htmlspecialchars(trim($_POST['mango']));
                                    $open = htmlspecialchars(trim($_POST['open']));
                                    $oza = htmlspecialchars(trim($_POST['oza']));
                                    $rapi = htmlspecialchars(trim($_POST['rapid']));
                                    $upto = htmlspecialchars(trim($_POST['upto']));
                                    $nc = htmlspecialchars(trim($_POST['nc']));   
                                            
                                    add_LinkFilm($title,$lang,$mango,$open,$oza,$rapi,$upto,$nc);                                           
                                }

                                ?>
                                <form method="post">
                                    <div class="form-group d-flex ">                        
                                        <input type="text" placeholder="Code IMDB" class="form-control imdb" id="imdbLink" >
                                        <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="importer info IMDB" id="valImdbLink" onclick="send()">
                                            <i class="fa fa-check-circle fa-lg text-white"></i>
                                        </button>  
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control language" name="lang">
                                            <option value="VO">Vo</option>
                                            <option value="VF">Vf</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Titre" class="form-control" name="titleLink" id="titleLink" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Stream mango" class="form-control" name="mango" id="mango">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Openload" class="form-control" name="open" id="open">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Videoza" class="form-control" name="oza" id="oza">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="rapidVideo" class="form-control" name="rapid" id="rapid">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Uptobox" class="form-control" name="upto" id="upto">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nc" class="form-control" name="nc" id="nc">
                                    </div>                                       
                                    <div class="modal-footer">
                                        <button type="submit" name="linkMovie"  class="btn btn-success">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>    
                <!-- icone add film -->
                <a href="" title="ajouter film" data-toggle="modal" data-target="#addMovie"><i class="fa fa-plus-square fa-lg text-white p-2 bg-success"></i></a>
                <!--modal of icone add film-->
                <div class="modal fade" id="addMovie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Ajouter film</h5>
                                <button type="button"  class="close" data-dismiss="modal" aria-label="Close" id="closeMovie">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!--if click on add-->
                                <?php
                                if(isset($_POST['postFilm'])){
                                    $imdb = htmlspecialchars(trim($_POST['imdb']));
                                    $title =htmlspecialchars(trim($_POST['title']));
                                    $kind = htmlspecialchars(trim($_POST['kind']));
                                    $exit = htmlspecialchars(trim($_POST['year']));
                                    $tagline = htmlspecialchars(trim($_POST['tagline']));
                                    $image = htmlspecialchars(trim($_POST['image']));
                                    $note = htmlspecialchars(trim($_POST['note']));
                                    $ba = htmlspecialchars(trim($_POST['ba']));
                                    $prod = htmlspecialchars(trim($_POST['prod']));
                                    $acteurs = htmlspecialchars(trim($_POST['acteur']));
                                    $synops= htmlspecialchars(trim($_POST['synops']));    
                                
                                    if(empty($title) OR empty($kind) OR empty($exit) OR empty($tagline) OR empty($image) OR
                                    empty($note) OR empty($ba) OR empty($prod) OR empty($acteurs) OR empty($synops)){
                                        ?> 
                                        <script>
                                        var dangerElmt = document.getElementById("danger");
                                        dangerElmt.style.visibility ='visible';    
                                        </script>
                                        <?php
                                    }
                                    else{
                                        add_Film($imdb,$title,$kind,$exit,$tagline,$image,$note,$ba,$prod,$acteurs,$synops);  
                                    }
                                }

                                ?>
                                <form method="post">
                                    <div class="form-group d-flex ">                        
                                        <input type="text" placeholder="Code IMDB" class="form-control imdb" id="imdbMovie">
                                        <button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="importer info IMDB" id="valImdb" onclick="send()">
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
                                        <input type="text" placeholder="Tagline" class="form-control erase" name="tagline" id="tagline">
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
                                        <button type="submit" name="postFilm" id="submit" class="btn btn-success">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            ?>
            <div class="mr-2 float-right">
                <form method="post">                
                    <div class="input-group px-5" style="">
                        <input type="search" name="search" id="searchMovieBa" class="form-control">
                        
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-warning" name="submit">
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
                    <th class="th6" scope="col">Imdb</th>
                    <th class="th7" scope="col">Action</th>
                </tr>
            </thead>
            <?php 
            
                foreach($postFilms as $postFilm){
                    
                ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $postFilm['id']?></th>
                    <td><?= htmlspecialchars($postFilm['title'])?></td>
                    <td><?= substr(htmlspecialchars($postFilm['synopsis']),0,100)?>...</td>
                    <td><?= htmlspecialchars($postFilm['kind'])?></td>
                    <td><?= date('d/m/y' ,strtotime($postFilm['datesortie']))?></td>
                    <td><?= htmlspecialchars($postFilm['imdb'])?></td>

                   
                    <td>
                        <!--icone update movie-->
                        <a href="" title="mettre a jour film" data-toggle="modal" data-target="#<?= $postFilm['id']?>"><i class="fa fa-plus-square fa-lg text-primary"></i></a>
                        <!--modal of update movie-->
                        <div class="modal fade" id="<?=$postFilm['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Mettre à jour les infos film</h5>
                                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!--if click on  update movie-->
                                        <?php
                                        if(isset($_POST['updateFilm'])){
                                            $filmId =htmlspecialchars(trim($_POST['idUpMovie']));
                                            $title =htmlspecialchars(trim($_POST['titleUpMovie']));
                                            $kind = htmlspecialchars(trim($_POST['kindUpMovie']));
                                            $exit = htmlspecialchars(trim($_POST['yearUpMovie']));
                                            $tagline = htmlspecialchars(trim($_POST['taglineUpMovie']));
                                            $image = htmlspecialchars(trim($_POST['imageUpMovie']));
                                            $note = htmlspecialchars(trim($_POST['noteUpMovie']));
                                            $ba = htmlspecialchars(trim($_POST['baUpMovie']));
                                            $prod = htmlspecialchars(trim($_POST['prodUpMovie']));
                                            $acteurs = htmlspecialchars(trim($_POST['acteurUpMovie']));
                                            $synops= htmlspecialchars(trim($_POST['synopsUpMovie']));    
                                        
                                            if(empty($title) OR empty($kind) OR empty($exit) OR empty($tagline) OR empty($image) OR
                                            empty($note) OR empty($ba) OR empty($prod) OR empty($acteurs) OR empty($synops)){
                                                ?> 
                                                <script>
                                                    var dangerElmt = document.getElementById("danger");
                                                    dangerElmt.style.visibility ='visible';    
                                                </script>
                                                <?php
                                            }
                                            else{
                                                update_Film($title,$kind,$exit,$tagline,$image,$note,$ba,$prod,$acteurs,$synops,$filmId);  
                                            }
                                        }         
                                        ?>
                                    
                                        <form method="post">
                                            <div class="form-group d-flex ">                        
                                                <input type="text" placeholder="Id du film" class="form-control" name="idUpMovie" id="" value="<?=$postFilm['id']?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Titre" class="form-control" name="titleUpMovie" id="" value="<?=htmlspecialchars($postFilm['title'])?>">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="kindUpMovie" class="form-control" placeholder="Genre" id="" style="height:38px"><?=htmlspecialchars($postFilm['kind'])?></textarea> 
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Année" class="form-control" name="yearUpMovie" id="" value="<?=htmlspecialchars($postFilm['datesortie'])?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Tagline" class="form-control" name="taglineUpMovie" id="" value="<?=htmlspecialchars($postFilm['tagline'])?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Image" class="form-control" name="imageUpMovie" id="" value="<?=htmlspecialchars($postFilm['image'])?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Note" class="form-control" name="noteUpMovie" id="" value="<?=htmlspecialchars($postFilm['note'])?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Bande annonce" class="form-control" name="baUpMovie" id="" value="<?=htmlspecialchars($postFilm['bandeannonce'])?>">
                                            </div>
                                            <div class="form-group">
                                                <textarea placeholder="Production" class="form-control" name="prodUpMovie" id="" style="height:38px"><?=htmlspecialchars($postFilm['production'])?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="Acteur" class="form-control" name="acteurUpMovie" id="" value="<?=htmlspecialchars($postFilm['acteur'])?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label text-dark font-weight-bold">Synopsis</label>
                                                <textarea id="" name="synopsUpMovie" class="form-control" id=""><?=htmlspecialchars($postFilm['synopsis'])?></textarea>
                                            </div>
                                        
                                            <div class="modal-footer">
                                                <button type="submit" name="updateFilm" id="updateFilm" class="btn btn-success">Mettre a jour</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--icon page info-->
                        <a href="index.php?page=movies&amp;title=<?=$postFilm['title']?>" class="ml-1" title="ajouter liens du film"><i class="fas fa-info-circle fa-lg text-warning"></i> </a>
                        
                        <!--icon delete-->
                        <a href="" class="ml-1" title="supprimer film" data-toggle="modal" data-target="#delete<?=$postFilm['id']?>"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                        
                        <!-- Modal delete-->
                        <div class="modal fade" id="delete<?=$postFilm['id']?>" tabindex="-4" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Voulez vous supprimer ce film ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-dark"><?=htmlspecialchars($postFilm['title'])?></p>
                                </div>
                                <div class="modal-footer">
                                    <?php
                                        if(isset($_POST['delete'])){
                                            $title=$postFilm['title'];

                                            delete_Film($title);
                                        }
                                    ?>
                                    <form method="post" action="index.php?page=deleteFilm&amp;title=<?=$postFilm['title']?>">
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
    <?php
$url = "https://api.themoviedb.org/3/movie/tt1431045?api_key=3f531cbbcdf04ba2affab6f4e07dfd0d&language=fr";
$urlImg="https://image.tmdb.org/t/p/original";
$json_response = file_get_contents($url);
$object_response = json_decode($json_response);
 
$poster_url="";
if(!is_null($object_response) && isset($object_response->poster_path)) {
$poster_url = $object_response->poster_path;
?><img src="<?= $urlImg.$poster_url ?>" alt="" width="200" height="100"> 
<?php
}
?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>