<!--model for dashboard in file admin-->
<h1 class="text-center mt-4">TABLEAU DE BORD STREAMING</h1>
<div class="row mt-4">
    <!-- Publish-->
    <div class="col-12 col-sm-12 col-md-4 mb-2">
        <div class="card bg-secondary">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title text-center text-white"><strong>Publications</strong></h5>
                <h3 class="card-text cardDashboard text-white"><?= $countPosts['idPosts'] ?></h3>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <a href="index.php?page=publications.dash&amp;p=1"><button type="button"   class="btn btn-secondary">Publications</button></a>
        </div>    
    </div>
    <!-- Comment-->
    <div class="col-12 col-sm-12 col-md-4 mb-2">
        <div class="card bg-info">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title text-center text-white"><strong>Commentaires</strong></h5>
                <h3 class="card-text cardDashboard text-white"><?= $countComments['idComments'] ?></h3>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <a href="index.php?page=dashboard"><button type="button"  class="btn btn-info">Commentaires</button></a>
        </div>               
    </div>
    <!-- Admin-->
    <div class="col-12 col-sm-12 col-md-4 mb-2">
        <div class="card" style="background-color:#F7CD71;">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title text-center text-white"><strong>Administrateurs</strong></h5>
                <h3 class="card-text cardDashboard text-white"><?= $countAdmins['idAdmins'] ?></K>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <a href="index.php?page=admins.dash"><button type="button" class="btn btn-warning text-white" style="background-color:#F7CD71;" >Administrateurs</button></a>                  
        </div>
    </div>
</div>           
