<!--page configuration and add admin-->
<?php $title = "Config";
 ob_start();
?>

<session>
    <div class="container">
        <h2 class="my-4">Ajouter un nouvelle Administrateur</h2>
        <?php
        /*isset type submit fom form add admin*/
            if(isset($_POST['submit'])){

                $name=$_POST['name'];
                $pseudo=$_POST['pseudo'];
                $email=$_POST['email'];
                $password=$_POST['password'];
                $rePassword=$_POST['repassword'];
                $errors=array();

                $configSubmit=new config;
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
                    add_Admins($name,$pseudo,$email,$password);
                }
            }         
        ?>
        <!--form add admin-->
        <form method="post">
            <div class="row">
                <div class="form-group col-sm-8 ">
                    <label for="name"><i class="fas fa-user bg-info text-white p-2"></i></label>
                    <input type="text" name="name" id="name" placeholder="Nom, prénom" class="form"/>
                </div>
                <div class="form-group col-sm-8 ">
                    <label for="name"><i class="fas fa-user-tie bg-info text-white p-2"></i></label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" class="form"/>
                </div>
                <div class="form-group col-sm-8 ">
                    <label for="email"><i class="fas fa-envelope bg-info text-white p-2"></i></label>
                    <input type="email" name="email" id="email" placeholder="Email" class="form"/>
                </div>
                <div class="form-group col-sm-8 ">
                    <label for="password"><i class="fas fa-key bg-info text-white p-2"></i></label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe" class="form"/>
                </div>
                <div class="form-group col-sm-8 mt-2 ">
                    <input type="password" name="repassword" id="repassword" placeholder="Re-saisir le mot de passe" class="form"/>
                </div>
                <div class="col-sm-12 mb-3">
                    <button type="submit" name="submit" class="btn btn-info">Ajouter administrateur</button>
                </div>
            </div> 
        </form>
    </div>
</session>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>