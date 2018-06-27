<header>
    <!--topbar for dashboard-->
    <div class="color">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg bg-info navbar-light">
                <button class="navbar-toggler bg-white  " type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="float-left"><img src="../public/images/logo.png" alt="" width="200" height="50"></div>

                <div class="collapse navbar-collapse " id="navbarNavDropdown">
                    <div class="container">
                        <div class="row justify-content-end">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <span class=" align-text-top"><a class="nav-link size4 text-white"  data-toggle="tooltip" title="Deconnexion"    href="index.php?page=deconnexion"><i class="fas fa-sign-out-alt mr-1 "></i>Deconnexion</a></span>                              
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="p-2 bg-info" id="titre2" style="background:black;">

                <div class="d-flex justify-content-end mr-5">
                    <a href="index.php?page=dashboard&amp;p=1" data-toggle="tooltip" title="tableau de bord" class="bg-dark">
                        <?php  
                        if(isset($_GET['page']) && ($_GET['page']=='dashboard' OR $_GET['page']=='publications.dash' OR $_GET['page']=='admins.dash')) {
                        ?>
                            <i class="fas fa-th-large fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white"></i>
                        <?php 
                        }
                        else{
                        ?>
                            <i class="fas fa-th-large fa-2x text-success p-1 pl-2 pr-2 mr-2 bg-dark"></i>
                        <?php   
                        }
                        ?>                                     
                    </a>                            
                    
                    <a href="index.php?page=addFilms&amp;p=1" data-toggle="tooltip" title="Tableau des médias" class="bg-dark">
                        <?php  
                        if(isset($_GET['page']) && ($_GET['page']=='addSeries' OR $_GET['page']=='addFilms' OR $_GET['page']=='addAnimes')) {
                        ?>
                            <i class="fas fa-video fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white"></i>
                        <?php 
                        }
                        else{
                        ?>
                            <i class="fas fa-video fa-2x text-primary p-1 pl-2 pr-2 mr-2 bg-dark"></i>
                        <?php   
                        }
                        ?>                                     
                    </a>

                    <a href="index.php?page=writte" data-toggle="tooltip" title="rédiger article" class="bg-dark">
                        <?php  
                        if(isset($_GET['page']) && $_GET['page']=='writte'){
                        ?>
                            <i class="fas fa-pencil-alt fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white "></i>
                        <?php 
                        }
                        else{
                        ?>
                            <i class="fas fa-pencil-alt fa-2x text-warning p-1 pl-2 pr-2 mr-2 bg-dark"></i>
                        <?php   
                        }
                        ?>                                     
                    </a>
                    
                    <a href="index.php?page=config" data-toggle="tooltip" title="configuration" class="bg-dark">
                        <?php  
                        if(isset($_GET['page']) && $_GET['page']=='config'){
                        ?>
                            <i class="fab fa-whmcs fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white "></i>
                        <?php 
                        }
                        else{
                        ?>
                            <i class="fab fa-whmcs fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-dark"></i>
                        <?php   
                        }
                        ?>                                     
                    </a>                                             
                </div>
            </div>
        </div>
    </div>
</header>




