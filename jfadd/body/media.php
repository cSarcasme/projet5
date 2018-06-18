<!--model for adddashboard-->
<h1 class="text-center mt-4">TABLEAU DES MEDIAS</h1>
<div class="row mt-4">
    <!-- Films-->
    <div class="col-12 col-sm-12 col-md-4 mb-2">        
        <div class="card bg-success">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-success btn-sm px-4 font-weight-bold" title="tableau des films" href="index.php?page=addFilms&amp;p=1">Films</a>
                </div> 
            </div>
            <div class="card-body">          
                <h3 class="card-text cardDashboard text-white"><?= $countFilms['idFilms'] ?></h3>
            </div>
        </div>
           
    </div>
    <!-- Series-->
    <div class="col-12 col-sm-12 col-md-4 mb-2">      
        <div class="card bg-warning">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-warning text-white btn-sm px-4 font-weight-bold" title="tableau des séries" href="index.php?page=addSeries&amp;p=1">Series</a>
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-text cardDashboard text-white"><?= $countSeries['idSeries'] ?></h3>
            </div>
        </div>                       
    </div>
    <!-- Animé-->
    <div class="col-12 col-sm-12 col-md-4 mb-2">      
        <div class="card bg-danger">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-center">
                    <a class="btn btn-danger text-white btn-sm px-4 font-weight-bold" title="tableau des animés" href="index.php?page=addAnimes">Animés</a>
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-text cardDashboard text-white">1</h3>
            </div>
        </div>                       
    </div>
</div>           
