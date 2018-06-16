<!--page info movies-->    
<?php $title = "Film info"?>

<?php ob_start(); ?>   

<section>
     
    <div class="container">
        <!--<?php// include('body/adddashboard.php')?>-->
        <div class="row justify-content-center">
            <div class=" col-10 ">
                <div class="d-flex bd-highlight">
                    <div class="mr-auto bd-highlight">
                        <h1 class="mt-1">Fiche info</h1>
                    </div>
                    <div class=" bd-highlight">
                        <a href="index.php?page=addFilms" class="btn btn-danger px-4 mt-3 mr-3">Retour</a>
                    </div>
                </div>
                <!--info movies-->
                <h2 class="shadow-sm mt-3 bg-success p-2 text-white" ><?=htmlspecialchars($movie['title'])?></h2>
            </div>
        </div>
        <div class="row justify-content-center">          
            <div class="col-3">      
                <p class=""><img style="width:100%;" height="200" src="https://image.tmdb.org/t/p/original<?= $movie['image']?>"></p>
            </div>
            <div class="col-7">
                <iframe src="<?=$movie['bandeannonce']?>" style="width:100%;" height="200"></iframe>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <h6 class="font-weight-bold">synopsis</h6>
                <p><?=htmlspecialchars($movie['synopsis'])?></p>
                <h6 class="font-weight-bold">Production</h6>
                <p><?= htmlspecialchars($movie['production'])?></p>
                <h6 class="font-weight-bold">Acteur</h6>
                <p><?= htmlspecialchars($movie['acteur'])?></p>
                <p><span class="font-weight-bold">Date de sortie: </span><?=date('d/m/y',strtotime(htmlspecialchars($movie['datesortie'])))?></p>
                <p><span class="font-weight-bold">note: <span><?= htmlspecialchars($movie['note'])?><i class="fas fa-star text-warning"></i></span></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="d-flex justify-content-end">
                    <!--icon update link movie -->
                    <a href="" class="ml-1" title="Mettre a jour liens du film vf" data-toggle="modal" data-target="#<?=$linkVf['id']?>"><i class="mb-1 mr-2 fas fa-link fa-lg p-2 bg-primary text-white"></i> </a>
                    <!--modal of icone update link movie-->
                    <div class="modal fade" id="<?=$linkVf['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Mettre a jour les liens du film</h5>
                                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!--if click on update a link-->
                                    <?php
                                    if(isset($_POST['upLinkMovieVf'])){
                                        $title =$_GET['title'];
                                        $mango = htmlspecialchars(trim($_POST['mangoLinkUpVf']));
                                        $open = htmlspecialchars(trim($_POST['openLinkUpVf']));
                                        $oza = htmlspecialchars(trim($_POST['ozaLinkUpVf']));
                                        $rapi = htmlspecialchars(trim($_POST['rapidLinkUpVf']));
                                        $upto = htmlspecialchars(trim($_POST['uptoLinkUpVf']));
                                        $nc = htmlspecialchars(trim($_POST['ncLinkUpVf']));   
                                                
                                        update_LinksFilmVf($title,$mango,$open,$oza,$rapi,$upto,$nc);                                           
                                    }
                                    ?>
                                    
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" placeholder="Stream mango" class="form-control" name="mangoLinkUpVf" value="<?= htmlspecialchars($linkVf['mango'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Openload" class="form-control" name="openLinkUpVf" value="<?= htmlspecialchars($linkVf['open'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Videoza" class="form-control" name="ozaLinkUpVf" value="<?= htmlspecialchars($linkVf['oza'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="rapidVideo" class="form-control" name="rapidLinkUpVf" value="<?= htmlspecialchars($linkVf['rapi'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Uptobox" class="form-control" name="uptoLinkUpVf" value="<?= htmlspecialchars($linkVf['upto'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Nc" class="form-control" name="ncLinkUpVf"  value="<?= htmlspecialchars($linkVf['nc'])?>">
                                        </div>                                       
                                        <div class="modal-footer">
                                            <button type="submit" name="upLinkMovieVf"  class="btn btn-success">Mette a jour</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--table vf link-->
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th class="thInf1" scope="col">Stream</th>
                            <th class="thInf2" scope="col">Langue</th>
                            <th class="thInf3" scope="col">Lien</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th scope="row">streamango</th>
                            <td><?= htmlspecialchars($linkVf['language'])?></td>
                            <td><?= htmlspecialchars($linkVf['mango'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">open</th>
                            <td><?= htmlspecialchars($linkVf['language'])?></td>
                            <td><?= htmlspecialchars($linkVf['open'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">oza</th>
                            <td><?= htmlspecialchars($linkVf['language'])?></td>
                            <td><?= htmlspecialchars($linkVf['oza'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">rapi</th>
                            <td><?= htmlspecialchars($linkVf['language'])?></td>
                            <td><?= htmlspecialchars($linkVf['rapi'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">upto</th>
                            <td><?= htmlspecialchars($linkVf['language'])?></td>
                            <td><?= htmlspecialchars($linkVf['upto'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">nc</th>
                            <td><?= htmlspecialchars($linkVf['language'])?></td>
                            <td><?= htmlspecialchars($linkVf['nc'])?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-5">
                <div class="d-flex justify-content-end">
                    <!--icon update link movie -->
                    <a href="" class="ml-1" title="Mettre a jour liens du film vo" data-toggle="modal" data-target="#vo<?=$linkVo['id']?>"><i class="mb-1 mr-2 fas fa-link fa-lg p-2 bg-primary text-white"></i> </a>
                    <!--modal of icone update link movie-->
                    <div class="modal fade" id="vo<?=$linkVo['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="exampleModalLabel">Mettre a jour les liens du film</h5>
                                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!--if click on update a link-->
                                    <?php
                                    if(isset($_POST['upLinkMovieVo'])){
                                        $title =$_GET['title'];
                                        $mango = htmlspecialchars(trim($_POST['mangoLinkUpVo']));
                                        $open = htmlspecialchars(trim($_POST['openLinkUpVo']));
                                        $oza = htmlspecialchars(trim($_POST['ozaLinkUpVo']));
                                        $rapi = htmlspecialchars(trim($_POST['rapidLinkUpVo']));
                                        $upto = htmlspecialchars(trim($_POST['uptoLinkUpVo']));
                                        $nc = htmlspecialchars(trim($_POST['ncLinkUpVo']));   
                                                
                                        update_LinksFilmVo($title,$mango,$open,$oza,$rapi,$upto,$nc);                                           
                                    }
                                    ?>
                                    
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" placeholder="Stream mango" class="form-control" name="mangoLinkUpVo"  value="<?= htmlspecialchars($linkVo['mango'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Openload" class="form-control" name="openLinkUpVo"  value="<?= htmlspecialchars($linkVo['open'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Videoza" class="form-control" name="ozaLinkUpVo" value="<?= htmlspecialchars($linkVo['oza'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="rapidVideo" class="form-control" name="rapidLinkUpVo"  value="<?= htmlspecialchars($linkVo['rapi'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Uptobox" class="form-control" name="uptoLinkUpVo"  value="<?= htmlspecialchars($linkVo['upto'])?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Nc" class="form-control" name="ncLinkUpVo"  value="<?= htmlspecialchars($linkVo['nc'])?>">
                                        </div>                                       
                                        <div class="modal-footer">
                                            <button type="submit" name="upLinkMovieVo"  class="btn btn-success">Mette a jour</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--table vo link-->
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th class="thInf1" scope="col">Stream</th>
                            <th class="thInf2" scope="col">Langue</th>
                            <th class="thInf3" scope="col">Lien</th>

                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <th scope="row">streamango</th>
                            <td><?= htmlspecialchars($linkVo['language'])?></td>
                            <td><?= htmlspecialchars($linkVo['mango'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">open</th>
                            <td><?= htmlspecialchars($linkVo['language'])?></td>
                            <td><?= htmlspecialchars($linkVo['open'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">oza</th>
                            <td><?= htmlspecialchars($linkVo['language'])?></td>
                            <td><?= htmlspecialchars($linkVo['oza'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">rapi</th>
                            <td><?= htmlspecialchars($linkVo['language'])?></td>
                            <td><?= htmlspecialchars($linkVo['rapi'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">upto</th>
                            <td><?= htmlspecialchars($linkVo['language'])?></td>
                            <td><?= htmlspecialchars($linkVo['upto'])?></td>
                        </tr>
                        <tr>
                            <th scope="row">nc</th>
                            <td><?= htmlspecialchars($linkVo['language'])?></td>
                            <td><?= htmlspecialchars($linkVo['nc'])?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>