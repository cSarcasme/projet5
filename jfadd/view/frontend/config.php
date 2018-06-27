<!--page configuration and add admin-->
<?php $title = "Config";
 ob_start();
?>


<?php include('body/topbar2.php'); ?>

<div class="color">
    <div class="container-fluid">
        <section>
            <div class="container">
                <h2 class="mb-4">Ajouter un nouvel Administrateur</h2>
                <?php
                /*isset type submit fom form add admin*/
                    if(isset($_POST['submit'])){

                        $name=$_POST['name'];
                        $pseudo=$_POST['pseudo'];
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        $rePassword=$_POST['repassword'];
                        $errors=array();

                        $configSubmit=new Configuration;
                        $result=$configSubmit->verifConfig($pseudo,$email);

                        if(empty($name) OR empty($pseudo) OR empty($email) OR empty($password) OR empty($rePassword)){
                            $errors['empty']="Tous les champs ne sont pas remplis.";
                        }
                        elseif($result/*$email or $pseudo ==$result['pseudo'] or $result['email']*/){
                            $errors['pseudo']="Pseudo ou email déja utilisé.";                  
                        }
                        elseif($password!=$rePassword){
                            $errors['mdp']=" Mots de passe qui ne correspondent pas";
                        }
                        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $errors['email'] = "L' adresse email n' est pas valide.";
                        }

                        if(!empty($errors)){
                            ?>
                            <div class="alert alert-danger"> 
                            <?php
                                foreach($errors as $error){
                                    echo "<strong>"."ATTENTION!!! "."</strong>". $error."<br/>";
                                }
                            ?>
                            </div>
                            <?php
                        }
                        else{
                            $add = new Configuration;
                            $add -> add_Admins($name,$pseudo,$email,$password);
                        }
                    }         
                ?>
                <!--form add admin-->
                <div class="row">
                    <div class="col-12 col-md-7">
                        <form method="post">
                                <div class="form-group">
                                    <label for="name"><i class="fas fa-user bg-danger text-white p-2"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Nom, prénom" class="form-control formIns py-2"/>
                                </div>
                                <div class="form-group">
                                    <label for="name"><i class="fas fa-user-tie bg-danger text-white p-2"></i></label>
                                    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" class="form-control formIns py-2"/>
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="fas fa-envelope bg-danger text-white p-2"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control formIns py-2"/>
                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="fas fa-key bg-danger text-white p-2"></i></label>
                                    <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control formIns py-2"/>
                                </div>
                                <div class="form-group  mt-2">
                                    <input type="password" name="repassword" id="repassword" placeholder="Re-saisir le mot de passe" class="form-control formIns py-2"/>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="submit" class="btn btn-success font-weight-bold">Ajouter administrateur</button>
                                </div>
                            </div> 
                        </form>
                        <div class="col-md-5 mt-5">
                            <img src="../public/images/Ba-ins.jpg" alt="bande annonce">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>