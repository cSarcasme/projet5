<!--page writte article-->
<?php $title = "Article";
 ob_start();
?>

<?php include('body/topbar2.php');?>     

<div class="color">
    <div class="container-fluid">
        <section>
            <div class="container">  
                <h1 class="text-center">POSTER UN ARTICLE</h1>
                <!--send article in bbd with condition and errors-->
                <?php
                    if(isset($_POST['postArticle'])){
                        $title=trim($_POST['titre']);
                        $content=trim($_POST['contenu']);	
                        $content = preg_replace("/\s+/", " ", $content);
                        $posted=(isset($_POST['checkbox']));
                        $writer=$_SESSION['admin']['email'];
                        $errors=array();

                        if($posted){
                            $posted="1";
                        }
                        else{
                            $posted="0";
                        }

                        if(empty($title) or empty($content)){
                            $errors['empty'] = "Veuillez remplir tous les champs";
                        }

                        if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0){
                            if ($_FILES['file']['size'] <= 4000000){

                                $infosfichier = pathinfo($_FILES['file']['name']);
                                $extension_upload = $infosfichier['extension'];
                                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                                
                                if (in_array($extension_upload, $extensions_autorisees)){
                                    move_uploaded_file($_FILES['file']['tmp_name'], '../public/images/posts/' . basename($_FILES['file']['name']));
                                    $image=basename($_FILES['file']['name']);
                                } 
                                else{
                                    $errors['format'] = "Format de fichier non autorisé";
                                }   
                            }
                            else{
                                $errors['size'] = "Image qui dépasse la taille autorisé";
                            }
                        }
                        else{
                            $image = 'post.png' ;
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
                            $send= new AddArticle;
                            $send -> post_Post($title, $content,$writer, $image, $posted);
                        }
                    }
                ?>
                <!--form of writte a article-->
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group ">
                        <input type="name" name ="titre" placeholder="titre de l' article" class="form-control formIns  px-2 py-2">
                    </div>
                    <div class="form-group ">
                            <textarea id="writte" name="contenu" placeholder="Contenu de l' article" class="form-control formIns py-2"></textarea>
                    </div>
                    <div class="form-group ml-2">
                        <p class="font-weight-bold">Charger image</p>
                        <input type="file" class="btn btn-dark"name="file" id="imgInp">
                    </div>
                    <div class="material-switch pull-right ml-2">
                        <p><strong>Public</strong></p> 
                        <span class="mr-3"> Non</span>
                        <input id="someSwitchOptionDefault" name="checkbox" type="checkbox" value="on"/>
                        <label for="someSwitchOptionDefault" class="label-default bg-dark"></label>
                        <span class="ml-5"> Oui</span>
                    </div>       

                    <button type="submit" name="postArticle" class="font-weight-bold btn btn-success px-5 mt-3 ml-2 ">Publier</button>
                </form>
            </div>   
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>