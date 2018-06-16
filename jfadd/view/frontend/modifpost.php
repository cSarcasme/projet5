<!-- page modification article-->
<?php $title = "Article";
 ob_start();
?>
<session>
    <div class="container">
    <h1 class="text-center mt-4 mb-4">POSTER UN ARTICLE</h1>
        <!--form modification article-->
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-12">
                    <input type="name" name ="titre" placeholder="titre de l' article" value="<?= $post['title']?>" class="form mb-5">
                </div>
                <div class="form-group col-12">
                    <textarea name="contenu" placeholder="Contenu de l' article"  class="form mb-5"><?= $post['content']?></textarea>
                <div>

                <?php
                /* isset type submit form condition */
                    if(isset($_POST['postArticle'])){
                        $title=trim($_POST['titre']);
                        $content=trim($_POST['contenu']);               	
                        $content = preg_replace("/\s+/", " ", $content);
                        $posted=(isset($_POST['checkbox']));
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
                            modif_Post($_GET['id'], $title, $content, $posted);
                        }
                    }
                ?>

                <div class="row mt-3">     
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
                        <button type="submit" name="postArticle" class="btn btn-info pl-5 pr-5 ">Modifier l'article</button>
                    </div>
                </div>     
            </div>
        </form>
    </div>
</session>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>