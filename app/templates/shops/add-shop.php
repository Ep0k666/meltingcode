<?php
/*session_start(); attention existe deja dans W */
/*$currentPage = 'add-shop';*/
?>

<?php $this->layout('layout', ['title' => 'Création Boutique']) ?>

<?php $this->start('main_content') ?>

<div id="add-shop">
<div class="container">
    <h2>Bienvenue dans l’aventure!</h2>
    <legend>Ajouter une boutique</legend>
    
    <form enctype="multipart/form-data" action="#" method="post">

        <section>
            <h3>La Boutique</h3>
            <p><label>Intitulé de la boutique:  <input type="text" name="name" placeholder="Aux plaisirs sucrés" class="add-shop"></label></p>
            <?php if(isset($errors['name']['empty'])) : ?>
                <p class="error">Le nom de la boutique doit être spécifié</p>
            <?php endif ?>

            <!-- DESCRIPTION DE LA BOUTIQUE -->
            <p><label>Description de la boutique: <textarea name="description" placeholder="Ajoutez une description détaillée comprenant les valeurs de la société ainsi que le type de services que vous proposez"></textarea></label></p>
            <?php if(isset($errors['description']['empty'])) : ?>
                <p  class="error">La description doit être spécifiée</p>
            <?php endif ?>

            <!-- LES CATEGORIES -->
            <p><label>Catégorie Boutique:  <span>(en sélectionnant "Personnalisée" vous pouvez créer votre propre catégorie)</span>
            <select name="select">
                <!-- boucle pour récupérer les différentes catégorie dans la DB-->
                <?php foreach ($shopsCategory as $category) : ?>
                    <option value=" <?php echo $category['category'] ?>"><?php echo $category['category'] ?></option>
                <?php endforeach ?>
            </select></p></label>

            <!-- DATE DE CREATION DE BOUTIQUE -->
             <!-- <p><label>Date d'ouverture de votre boutique: <input type="text" name="date_adding" class="datepicker" placeholder="Date de création"></label></p>
            <?php if(isset($errors['date_adding']['empty'])) : ?>
            <p  class="error">La date de création doit être spécifiée</p>
            <?php elseif(isset($errors['date_adding']['invalid'])) : ?>
            <p  class="error">Le format n'est pas valide. Merci d'entrer une date au format Y-m-d </p>
            <?php endif ?> -->
        </section>

        <section>
            <h3>Adresse</h3>
            <p><label>Numéro de rue:  <input type="text" name="number" placeholder="33" ></label></p> <!-- required  -->
            <?php if(isset($errors['number']['empty'])) : ?>
                <p  class="error">Le numéro de rue doit être spécifié</p>
            <?php endif ?>

            <p><label>Adresse:  <input type="text" name="adress" placeholder="Avenue de Gaulle"></label></p> <!-- required  -->
            <?php if(isset($errors['adress']['empty'])) : ?>
                <p  class="error">L'adresse doit être spécifiée</p>
            <?php endif ?>

            <p><label>Code postal: <input type="text" name="zip_code" placeholder="57290" ></label></p> <!-- required  -->
            <?php if(isset($errors['zip_code']['empty'])) : ?>
                <p  class="error">Le code postal doit être spécifié</p>
            <?php endif ?>

            <p><label>Ville: <input type="text" name="city" placeholder="YUTZ" ></label></p> <!-- required  -->
            <?php if(isset($errors['city']['empty'])) : ?>
                <p  class="error">La ville doit être spécifiée</p>
            <?php endif ?>
            <!-- <div class="clearfix"></div> -->
        </section>

        <section>
            <!-- CONTACT -->
            <h3>Contact</h3>
            <!-- TELEPHONE -->
            <p><label>Téléphone: <input type="tel" name="phone" value="" placeholder="0387040853"> </label></p>

            <!-- FAX -->
            <p><label>Fax: <input type="tel" name="fax" value="" placeholder="0387040853"> </label></p>

            <!-- MAIL -->
            <p><label>Mail: <input type="email" name="mail" value="" placeholder="auxplaisirsucres@gmail.com"></label></p>

            <!-- COORDONNEES GPS -->
            <p><label>Coordonnées GPS:  </label>
                <input type="text" name="latitude" placeholder="Latitude">
                <?php /*if(isset($errors['latitude']['empty'])) :*/ ?>
                <!-- <p>La latitude doit être spécifiée</p>-->
                <?php /*endif*/ ?>

                <input type="text" name="longitude" placeholder="Longitude">
                <?php /*if(isset($errors['longitude']['empty'])) :*/ ?>
                <!-- <p>La longitude doit être spécifiée </p>-->
            <?php /*endif*/ ?><p>
                <!-- <div class="clearfix"></div> -->
        </section>

        <!-- <div class="separator" visibility="hidden"></div> -->

        <section>
            <h3>Vos Images</h3>

            <!-- LOGO BOUTIQUE -->
            <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                Sélectionnez votre logo: <input name="logo" type="file" /></p>
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
                Sélectionnez votre photo n° 1: <input name="image1" type="file" /></p>
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
                Sélectionnez votre photo n° 2: <input name="image2" type="file" /></p>
            <?php if(isset($errors['file']['upload'])) : ?>
                <p  class="error">Erreur lors de l'upload du fichier</p>
            <?php elseif(isset($errors['file']['noImg'])) : ?>
                <p  class="error">Le fichier n'est pas une image</p>
            <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                <p  class="error">Erreur lors du déplacement du fichier</p>
            <?php elseif(isset($errors['file']['noFile'])) : ?>
                <p  class="error">Merci de choisir un fichier</p>
            <?php endif ?>

            <!-- TROISIEME IMAGE BOUTIQUE -->
            <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                Sélectionnez votre photo n° 3: <input name="image3" type="file" /></p>
            <?php if(isset($errors['file']['upload'])) : ?>
                <p  class="error">Erreur lors de l'upload du fichier</p>
            <?php elseif(isset($errors['file']['noImg'])) : ?>
                <p  class="error">Le fichier n'est pas une image</p>
            <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                <p  class="error">Erreur lors du déplacement du fichier</p>
            <?php elseif(isset($errors['file']['noFile'])) : ?>
                <p  class="error">Merci de choisir un fichier</p>
            <?php endif ?>
        </section>
        <section>
            <!-- AFFICHAGE DES PRODUITS PHARES -->
            <h3>Vos 3 produits phares: </h3>

            <!-- PREMIER PRODUIT PHARE -->
            <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                Sélectionnez votre premier produit phare: <input name="image3" type="file" /></p>
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
            <p><label>Description du produit: <textarea name="description" placeholder="Ajoutez une description courte et concise"></textarea></label></p>
            <?php if(isset($errors['description']['empty'])) : ?>
                <p  class="error">La description doit être spécifiée</p>
            <?php endif ?>

            <!-- SECOND PRODUIT PHARE -->
            <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                Sélectionnez votre second produit phare: <input name="image3" type="file" /></p>
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
            <p><label>Description du produit: <textarea name="description" placeholder="Ajoutez une description courte et concise"></textarea></label></p>
            <?php if(isset($errors['description']['empty'])) : ?>
                <p  class="error">La description doit être spécifiée</p>
            <?php endif ?>

            <!-- TROISIEME PRODUIT PHARE -->
            <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                Sélectionnez votre troisième produit phare: <input name="image3" type="file" /></p>
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
            <p><label>Description du produit: <textarea name="description" placeholder="Ajoutez une description courte et concise"></textarea></label></p>
            <?php if(isset($errors['description']['empty'])) : ?>
                <p  class="error">La description doit être spécifiée</p>
            <?php endif ?>
        </section>


        <section>
            <!-- LIENS RESEAUX SOCIAUX -->
            <h3>Les réseaux sociaux</h3>
            <!-- FACEBOOK -->
            <p><label>Lien vers votre Facebook:<input type="text" name="link_facebook" value="" placeholder="Facebook"></label></p>

            <!-- INSTAGRAM -->
            <p><label>Lien vers votre Instagram:<input type="text" name="link_instagram" value="" placeholder="Instagram"></label></p>

            <!-- GOOGLE + -->
            <p><label>Lien vers votre Google +:<input type="text" name="link_google" value="" placeholder="Google +"></label></p>

            <!-- TWITTER -->
            <p><label>Lien vers votre Twitter:<input type="text" name="link_twitter" value="" placeholder="Google +"></label></p>

            <!-- PINTEREST -->
            <p><label>Lien vers votre Pinterst:<input type="text" name="link_pinterest" value="" placeholder="Google +"></label></p>

        </section>
        <div class="clearfix"></div>


        <p><button type="submit" name="add-shop" value="" />Ajouter la boutique</button></p>
        <p><button type="submit" name="cancel">Annuler</button></p>
    </form>
</div>
</div>


<?php $this->stop('main_content') ?>
