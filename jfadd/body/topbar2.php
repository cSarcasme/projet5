<header>
    <!--topbar for dashboard-->
    <nav class="navbar navbar-expand-lg">
    <div class="container">   
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="container">
                <div class="dropdown">
                    <div class="row justify-content-start">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <span class=" align-text-top"><a class="nav-link text-primary size4"  data-toggle="tooltip" title="Deconnexion"    href="index.php?page=deconnexion"><i class="fas fa-sign-out-alt mr-1 "></i>Deconnexion</a></span>                              
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right"><img src="../public/images/logo-StreamAddikt.png" alt="" width="200" height="50"></div>
        </div>
    </nav>
    <div class="bg-dark p-1" id="titre2">
        <div class="container">
            <div class="d-flex justify-content-end mr-5">
                <a href="index.php?page=dashboard" data-toggle="tooltip" title="tableau de bord">
                    <?php  
                    if(isset($_GET['page']) && ($_GET['page']=='dashboard' OR $_GET['page']=='publications.dash' OR $_GET['page']=='admins.dash')) {
                    ?>
                        <i class="fas fa-th-large fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white"></i>
                    <?php 
                    }
                    else{
                    ?>
                        <i class="fas fa-th-large fa-2x text-white p-1 pl-2 pr-2 mr-2 bg-secondary"></i>
                    <?php   
                    }
                    ?>                                     
                </a>                            
                
                <a href="index.php?page=addSeries" data-toggle="tooltip" title="Tableau des médias">
                    <?php  
                    if(isset($_GET['page']) && ($_GET['page']=='addSeries' OR $_GET['page']=='addFilms' OR $_GET['page']=='addAnimes')) {
                    ?>
                        <i class="fas fa-video fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white"></i>
                    <?php 
                    }
                    else{
                    ?>
                        <i class="fas fa-video fa-2x text-white p-1 pl-2 pr-2 mr-2 bg-success"></i>
                    <?php   
                    }
                    ?>                                     
                </a>

                <a href="index.php?page=writte" data-toggle="tooltip" title="rédiger article">
                    <?php  
                    if(isset($_GET['page']) && $_GET['page']=='writte'){
                    ?>
                        <i class="fas fa-pencil-alt fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white "></i>
                    <?php 
                    }
                    else{
                    ?>
                        <i class="fas fa-pencil-alt fa-2x text-white p-1 pl-2 pr-2 mr-2 bg-info"></i>
                    <?php   
                    }
                    ?>                                     
                </a>
                
                <a href="index.php?page=config" data-toggle="tooltip" title="configuration">
                    <?php  
                    if(isset($_GET['page']) && $_GET['page']=='config'){
                    ?>
                        <i class="fab fa-whmcs fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white "></i>
                    <?php 
                    }
                    else{
                    ?>
                        <i class="fab fa-whmcs fa-2x text-white p-1 pl-2 pr-2 mr-2" style="background-color:#F7CD71;"></i>
                    <?php   
                    }
                    ?>                                     
                </a>                                             
            </div>
        </div>
    </div>
</header>




