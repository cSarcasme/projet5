<div class="modal fade bd-example-modal-sm modalConnexion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">             
        <div class="modal-content bg-dark">
            <?php
            /*isset type submit with condition for login*/
            if(isset($_POST['submitUser'])){
                
                $loginSubmit=new LoginUserConnexion;
                $result=$loginSubmit->is_User($_POST['email'],$_POST['email']);
                
                $email = htmlspecialchars(trim($_POST['email']));
                $password = htmlspecialchars(trim($_POST['password']));
                $hash = $result['password'];
                $isPasswordCorrect = password_verify($password, $hash);
                
                if(!empty($email) && !empty($password)){
                    if(!$result){
                        ?>
                    <div class="alert alert-danger size1 text-center">
                        Mauvais email ou mot de passe! 
                    </div>

                    <?php                            
                    }
    
                    else{
                        if($isPasswordCorrect){                                     
                            $_SESSION['user']['email'] = $result['email'] ;
                            $_SESSION['user']['pseudo'] = $result['pseudo'];
                            $_SESSION['user']['image'] = $result['image'];
                            $_SESSION['user']['name'] = $result['name'];
                            header('Location:index.php?page=home');
                        }
                        else{
                            
                            ?>
                            <div class="alert alert-danger size1 text-center">
                                Mauvais email ou mot de passe ! 
                            </div>

                            <?php 
                        }                                             
                    }
                }
                else{
                    ?>
                    <div class="alert alert-danger size1 text-center">
                        Tous les champs ne sont pas remplis !  
                    </div>
                    <?php
                }
            }   
                        
            ?>
            <h5 class="modal-title font-weight-bold p-1 ml-2 text-white" id="exampleModalLabel">Connexion</h5>
            <form method="post">
                <div class="form-group w-100 px-2">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group w-100 px-2">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group ml-2">
                <p class="text-white">Pas encore inscrit (<a href="index.php?page=inscription">s'inscrire</a>)</p>
                    <button type="submit" name="submitUser" class="px-5 btn btn-success btn-sm">
                        Ok
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>