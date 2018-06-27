<!--page login-->
<?php $title = 'Login';
if(isset($_SESSION['email'])){
    header('Location:index.php?page=dashboard');
}
 ob_start()
?>

<?php include('body/topbar.php'); ?>

<div class="color">
    <div class="container-fluid">        
        <section>
            <div class="row justify-content-center">
                <div class="col-auto mt-5 mb-5">
                    <div class="card border border-dark bg-info" style="width: 20rem;">
                        <div class="row ">
                            <div class="col-6 offset-3">
                                <img class="card-img-top" src="../public/images/admin.png" alt="Card image cap">
                            </div>
                        </div>
                        <div class="card-body ">
                            <h4 class="card-title text-white font-weight-bold text-center">Se connecter</h4>

                            <?php
                            /*isset type submit with condition for login*/
                            if(isset($_POST['submit'])){
                                
                                $loginSubmit=new login;
                                $result=$loginSubmit->submitLogin($_POST['email'],$_POST['email']);
                                
                                $email = htmlspecialchars(trim($_POST['email']));
                                $password = htmlspecialchars(trim($_POST['password']));
                                $hash = $result['password'];
                                $isPasswordCorrect = password_verify($password, $hash);
                                
                                if(!empty($email) && !empty($password)){
                                    if(!$result){
                                        ?>
                                    <div class="alert alert-danger size1 text-center">
                                        Mauvais email ou mot de passe t! 
                                    </div>

                                    <?php                            
                                    }
                    
                                    else{
                                        if($isPasswordCorrect){                                     
                                            $_SESSION['admin']['email']=$result['email'] ;
                                            $_SESSION['admin']['pseudo']=$result['pseudo'];
                                            header('Location:index.php?page=dashboard&p=1');
                                        }
                                        else{
                                            
                                            ?>
                                            <div class="alert alert-danger size1 text-center">
                                                Mauvais email ou mot de passe n ! 
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
                            <!--form of login-->
                            <form method="post">
                                <div class="row">
                                    <div class="form-group mt-1 col-12">
                                        <label for="email">Email ou pseudo</label>
                                        <input type="text" name="email" id="email" class="form-control formIns py-2 w-100">                              
                                    </div>
                                
                                    <div class="form-group mt-1 col-12">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" name="password" id="password" class="form-control formIns py-2">                              
                                    </div>

                                    <div class="form-group ml-3 col-12 mt-3">
                                        <label><input type="checkbox" value=""> Connexion automatique</label>
                                    </div>

                                    <div class="col-12 text-center mt-1" id="buttonLogin" >
                                        <button  type="submit" name="submit" id="submit" class="btn btn-success ">SE CONNECTER</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>