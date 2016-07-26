<?php $this->layout('layout', ['title' => 'edit-shop']) ?>

<?php $this->start('main_content') ?>

<div id="add-shop">
    <div class="container">
        <h2>Bienvenue dans l’aventure!</h2>
        <legend>Modifier une boutique</legend>

        <form enctype="multipart/form-data" action="#" method="post">

            <section>
                <h3>La Boutique</h3>
                <p><label>Intitulé de la boutique *:  <input type="text" name="name" value="<?php echo $shopToEdit['name'] ?>" placeholder="Aux plaisirs sucrés" class="add-shop"></label></p>
                <?php if(isset($errors['name']['empty'])) : ?>
                    <p class="error">Le nom de la boutique doit être spécifié</p>
                <?php endif ?>

                <!-- DESCRIPTION DE LA BOUTIQUE -->
                <p><label>Description de la boutique: <textarea name="description" placeholder="Ajoutez une description détaillée comprenant les valeurs de la société ainsi que le type de services que vous proposez"><?php echo $shopToEdit['description'] ?></textarea></label></p>
                <?php if(isset($errors['description']['empty'])) : ?>
                    <p  class="error">La description doit être spécifiée</p>
                <?php endif ?>

                <!-- LES CATEGORIES -->
                <p><label>Catégorie Boutique:  <span>(en sélectionnant "Personnalisée" vous pouvez créer votre propre catégorie)</span>
                        <select name="category">
                            <!-- boucle pour récupérer les différentes catégorie dans la DB-->
                            <?php foreach ($shopsCategory as $category) : ?>
                                <option value="<?php echo $category['id_catshops'] ?>" <?php if($shopToEdit['id_category'] == $category['id_catshops']) echo ' selected' ?>"><?php echo $category['category'] ?></option>
                            <?php endforeach ?>
                        </select></p></label>

                <!-- DATE DE CREATION DE BOUTIQUE -->
                <p><label>Date d'ouverture de votre boutique: <input type="text" name="date_adding" class="datepicker" placeholder="Date de création" value="<?php echo $shopToEdit['date_adding'] ?>" ></label></p>
            </section>

            <section>
                <h3>Adresse</h3>
                <p><label>Numéro de rue *:  <input type="text" name="number" value="<?php echo $shopToEdit['number'] ?>" placeholder="33" ></label></p> 

                <?php if(isset($errors['number']['empty'])) : ?>
                    <p  class="error">Le numéro de rue doit être spécifié</p>
                <?php endif ?>

                <p><label>Adresse *:  <input type="text" name="adress" value="<?php echo $shopToEdit['address'] ?>" placeholder="Avenue de Gaulle"></label></p> 
                <?php if(isset($errors['adress']['empty'])) : ?>
                    <p  class="error">L'adresse doit être spécifiée</p>
                <?php endif ?>

                <p><label>Code postal *: <input type="text" name="zip_code" value="<?php echo $shopToEdit['zip_code'] ?>" placeholder="57290" ></label></p> <!-- required  -->
                <?php if(isset($errors['zip_code']['empty'])) : ?>
                    <p  class="error">Le code postal doit être spécifié</p>
                <?php endif ?>

                <p><label>Ville *: <input type="text" name="city" value="<?php echo $shopToEdit['city'] ?>" placeholder="YUTZ" ></label></p> <!-- required  -->
                <?php if(isset($errors['city']['empty'])) : ?>
                    <p  class="error">La ville doit être spécifiée</p>
                <?php endif ?>
            </section>

            <section>
                <!-- CONTACT -->
                <h3>Contact</h3>
                
                <!-- TELEPHONE -->
                <p><label>Téléphone: <input type="tel" name="phone" value="<?php echo $shopToEdit['tel'] ?>" placeholder="0387040853"> </label></p>

                <!-- FAX -->
                <p><label>Fax: <input type="tel" name="fax" value="<?php echo $shopToEdit['fax'] ?>" placeholder="0387040853"> </label></p>

                <!-- MAIL -->
                <p><label>Mail: <input type="email" name="mail" value="<?php echo $shopToEdit['mail'] ?>" placeholder="auxplaisirsucres@gmail.com"></label></p>

                <!-- HORAIRE -->
                <p><label>Horaires: <textarea name="horaires" value="<?php echo $shopToEdit['horaires'] ?>" placeholder="Ajoutez les horaires d'ouverture de votre boutique"></textarea></label></p>
            </section>

            <section>
                <h3>Vos Images</h3>

                <!-- LOGO BOUTIQUE -->
                <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                <p>Logo actuel :</p>
                <img src="<?= $this->assetUrl('uploads/' . $shopToEdit['logo']) ?>">           
                <p>Choisissez un autre fichier si vous souhaitez changer de logo :</p>
                <p><input name="logo" type="file" /></p>
                <?php if(isset($errors['file']['upload'])) : ?>
                    <p  class="error">Erreur lors de l'upload du fichier</p>
                <?php elseif(isset($errors['file']['noImg'])) : ?>
                    <p  class="error">Le fichier n'est pas une image</p>
                <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                    <p  class="error">Erreur lors du déplacement du fichier</p>
                <?php elseif(isset($errors['file']['noFile'])) : ?>
                    <p  class="error">Merci de choisir un fichier</p>
                <?php endif ?>

                <!-- PREMIERE IMAGE BOUTIQUE -->
                <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                <p> Photo n° 1 actuel:</p>
                <img src="<?= $this->assetUrl('uploads/' . $shopToEdit['pictshop1']) ?>">      
                <p>Choisissez un autre fichier si vous souhaitez changer de photo n° 1:</p>
                <p><input name="image1" type="file" /></p>
                <?php if(isset($errors['file']['upload'])) : ?>
                    <p  class="error">Erreur lors de l'upload du fichier</p>
                <?php elseif(isset($errors['file']['noImg'])) : ?>
                    <p  class="error">Le fichier n'est pas une image</p>
                <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                    <p  class="error">Erreur lors du déplacement du fichier</p>
                <?php elseif(isset($errors['file']['noFile'])) : ?>
                    <p  class="error">Merci de choisir un fichier</p>
                <?php endif ?>

                <!-- DEUXIEME IMAGE BOUTIQUE -->
                <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                <p> Photo n° 2 actuel:</p>
                <img src="<?= $this->assetUrl('uploads/' . $shopToEdit['pictshop2']) ?>">      
                <p>Choisissez un autre fichier si vous souhaitez changer de photo n° 2:</p>
                <p><input name="image2" type="file" /></p>
                <!-- <?php if(isset($errors['file']['upload'])) : ?>
                    <p  class="error">Erreur lors de l'upload du fichier</p>
                <?php elseif(isset($errors['file']['noImg'])) : ?>
                    <p  class="error">Le fichier n'est pas une image</p>
                <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                    <p  class="error">Erreur lors du déplacement du fichier</p>
                <?php elseif(isset($errors['file']['noFile'])) : ?>
                    <p  class="error">Merci de choisir un fichier</p>
                <?php endif ?> -->

                <!-- TROISIEME IMAGE BOUTIQUE -->
                <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                <p> Photo n° 3 actuel:</p>
                <img src="<?= $this->assetUrl('uploads/' . $shopToEdit['pictshop3']) ?>">      <p>Choisissez un autre fichier si vous souhaitez changer de photo n° 3:</p>
                <p><input name="image3" type="file" /></p>
                <!-- <?php if(isset($errors['file']['upload'])) : ?>
                    <p  class="error">Erreur lors de l'upload du fichier</p>
                <?php elseif(isset($errors['file']['noImg'])) : ?>
                    <p  class="error">Le fichier n'est pas une image</p>
                <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                    <p  class="error">Erreur lors du déplacement du fichier</p>
                <?php elseif(isset($errors['file']['noFile'])) : ?>
                    <p  class="error">Merci de choisir un fichier</p>
                <?php endif ?> -->
            </section>

            <section>
                <!-- AFFICHAGE DES PRODUITS PHARES -->
                <h3>Vos 3 produits phares: </h3>

                <!-- PREMIER PRODUIT PHARE -->
                <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                    Sélectionnez votre premier produit phare: <input name="imgprod1" type="file" /></p>
                <?php if(isset($errors['file']['upload'])) : ?>
                    <p  class="error">Erreur lors de l'upload du fichier</p>
                <?php elseif(isset($errors['file']['noImg'])) : ?>
                    <p  class="error">Le fichier n'est pas une image</p>
                <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                    <p  class="error">Erreur lors du déplacement du fichier</p>
                <?php elseif(isset($errors['file']['noFile'])) : ?>
                    <p  class="error">Merci de choisir un fichier</p>
                <?php endif ?> 
                <!-- DESCRIPTION PRODUIT -->
                <p><label>Description du produit: <textarea name="descprod1" placeholder="Ajoutez une description courte et concise"></textarea></label></p>
                <?php if(isset($errors['description']['empty'])) : ?>
                    <p  class="error">La description doit être spécifiée</p>
                <?php endif ?> 

                <!-- SECOND PRODUIT PHARE -->
                <!-- <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                    Sélectionnez votre second produit phare: <input name="imgprod2" type="file" /></p>
                <?php if(isset($errors['file']['upload'])) : ?>
                    <p  class="error">Erreur lors de l'upload du fichier</p>
                <?php elseif(isset($errors['file']['noImg'])) : ?>
                    <p  class="error">Le fichier n'est pas une image</p>
                <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                    <p  class="error">Erreur lors du déplacement du fichier</p>
                <?php elseif(isset($errors['file']['noFile'])) : ?>
                    <p  class="error">Merci de choisir un fichier</p>
                <?php endif ?> -->
                <!-- DESCRIPTION PRODUIT -->
                <!-- <p><label>Description du produit: <textarea name="descprod2" placeholder="Ajoutez une description courte et concise"></textarea></label></p>
                <?php if(isset($errors['description']['empty'])) : ?>
                    <p  class="error">La description doit être spécifiée</p>
                <?php endif ?> -->

                <!-- TROISIEME PRODUIT PHARE -->
               <!--  <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                    Sélectionnez votre troisième produit phare: <input name="imgprod3" type="file" /></p>
                <?php if(isset($errors['file']['upload'])) : ?>
                    <p  class="error">Erreur lors de l'upload du fichier</p>
                <?php elseif(isset($errors['file']['noImg'])) : ?>
                    <p  class="error">Le fichier n'est pas une image</p>
                <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                    <p  class="error">Erreur lors du déplacement du fichier</p>
                <?php elseif(isset($errors['file']['noFile'])) : ?>
                    <p  class="error">Merci de choisir un fichier</p>
                <?php endif ?> -->
                <!-- DESCRIPTION PRODUIT -->
               <!--  <p><label>Description du produit: <textarea name="descprod3" placeholder="Ajoutez une description courte et concise"></textarea></label></p>
                <?php if(isset($errors['description']['empty'])) : ?>
                    <p  class="error">La description doit être spécifiée</p>
                <?php endif ?> -->
            </section>


            <section>
                <!-- LIENS RESEAUX SOCIAUX -->
                <h3>Les réseaux sociaux</h3>
                <!-- FACEBOOK -->
                <p><label>Lien vers votre Facebook:<input type="text" name="facebook" value="<?php echo $shopToEdit['facebook'] ?>" placeholder="Facebook"></label></p>

                <!-- INSTAGRAM -->
                <p><label>Lien vers votre Instagram:<input type="text" name="instagram" value="<?php echo $shopToEdit['instagram'] ?>" placeholder="Instagram"></label></p>

                <!-- GOOGLE + -->
                <p><label>Lien vers votre Google +:<input type="text" name="google" value="<?php echo $shopToEdit['google'] ?>" placeholder="Google +"></label></p>

                <!-- TWITTER -->
                <p><label>Lien vers votre Twitter:<input type="text" name="twitter" value="<?php echo $shopToEdit['twitter'] ?>" placeholder="Twitter"></label></p>

                <!-- PINTEREST -->
                <p><label>Lien vers votre Pinterest:<input type="text" name="pinterest" value="<?php echo $shopToEdit['pinterest'] ?>" placeholder="Pinterest"></label></p>

            </section>
            <div class="clearfix"></div>

            <p><button type="submit" name="edit-shop" value="" />Modifier la boutique</button></p>
            <!-- <p><button type="submit" name="draft-shop" value="" />Brouillon</button></p> -->
            <!-- <p><button type="submit" name="cancel">Annuler</button></p> -->
            <p><a href="<?= $this->url('admin-shop',['id'=>$w_user['id']]) ?>" name="cancel" id="cancel_link">Annuler</a></p>
        </form>
    </div>
</div>

<?php $this->stop('main_content') ?>
