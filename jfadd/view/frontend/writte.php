<!--page writte article-->
<?php $title = "Article";
 ob_start();
?>
<session>
    <div class="container">
    <h1 class="text-center mt-4 mb-4">POSTER UN ARTICLE</h1>
    <!--form of writte a article-->
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-12">
                    <input type="name" name ="titre" placeholder="titre de l' article" class="form mb-5">
                </div>
                <div class="form-group col-12">
                    <textarea id="writte"name="contenu" placeholder="Contenu de l' article" class="form mb-5"></textarea>
                <div>
                <!--send article in bbd with condition and errors-->
                <?php
                    if(isset($_POST['postArticle'])){
                        $title=trim($_POST['titre']);
                        $content=trim($_POST['contenu']);	
                        $content = preg_replace("/\s+/", " ", $content);
                        $posted=(isset($_POST['checkbox']));
                        $writer=$_SESSION['email'];
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
                            post_Post($title, $content,$writer, $image, $posted);
                        }
                    }
                ?>

                <div class="row mt-3">
                    <div class="col-12 col-md-5 mt-3">
                        <div class="form-group ">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                    <button  class="btn btn-info">Charger image</button> <input type="file" name="file" id="imgInp">
                                    </span>
                                </span>
                                <input type="text" class="form2"  readonly>
                            </div>
                            <img id='img-upload'/>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-3">
                        <div class="col-12">
                            <p><strong>Public</strong></p> 
                        </div>
                        <div class="col-12">
                            <div class="material-switch pull-right">
                                <span class="mr-3"> Non</span>
                                <input id="someSwitchOptionDefault" name="checkbox" type="checkbox" value="on"/>
                                <label for="someSwitchOptionDefault" class="label-default bg-info"></label>
                                <span class="ml-5"> Oui</span>
                            </div>       
                        </div>   
                    </div>
                    <div class="col-12 col-md-1 mt-5">
                        <button type="submit" name="postArticle" class="btn btn-info pl-5 pr-5 ">Publier</button>
                    </div>
                </div>     
            </div>
        </form>
    </div>
</session>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>