<!--page info movies-->    
<?php $title = "Film info"?>

<?php ob_start(); ?>  

<?php include('body/topbar2.php');?>     


<div class="color">
    <div class="container-fluid">
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
                                <a href="index.php?page=addFilms&p=1" class="btn btn-danger px-4 mt-3 mr-3">Retour</a>
                            </div>
                        </div>
                        <!--info movies-->
                        <h2 class="shadow-sm mt-3 bg-success p-3 text-white" ><?=htmlspecialchars($movie['title'])?></h2>
                    </div>
                </div>
                <div class="row justify-content-center">          
                    <div class="col-3">      
                        <p class=""><img style="width:100%;" height="300" src="<?= $movie['image']?>"></p>
                    </div>
                    <div class="col-7">
                        <iframe src="<?=$movie['bandeannonce']?>" style="width:100%;" height="300"></iframe>
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
                        <p><span class="font-weight-bold">Date de sortie: </span><?=htmlspecialchars($movie['datesortie'])?></p>
                        <p><span class="font-weight-bold">note: <span><?= htmlspecialchars($movie['note'])?><i class="fas fa-star text-warning"></i></span></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>