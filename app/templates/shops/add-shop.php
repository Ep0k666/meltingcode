<?php
/*session_start(); attention existe deja dans W */
/*$currentPage = 'add-shop';*/
?>

<?php $this->layout('layout', ['title' => 'Création Boutique']) ?>

<?php $this->start('main_content') ?>

<div id="cont">
    <h2>Bienvenue dans l’aventure!</h2>
    <fieldset>
    <legend>Ajouter une boutique</legend>
    <form enctype="multipart/form-data" action="#" method="post">
  
        <p><label>Intitulé de la boutique:  <input type="text" name="name" placeholder="Nom boutique"></label></p>
        <?php if(isset($errors['name']['empty'])) : ?>
        <p class="error">Le nom de la boutique doit être spécifié</p>
        <?php endif ?>

        <p><label>Numéro de rue:  <input type="text" name="number" placeholder="Num rue" ></label></p> <!-- required  -->
        <?php if(isset($errors['number']['empty'])) : ?>
        <p  class="error">Le numéro de rue doit être spécifié</p>
        <?php endif ?>

        <p><label>Adresse:  <input type="text" name="adress" placeholder="Adresse"></label></p> <!-- required  -->
        <?php if(isset($errors['adress']['empty'])) : ?>
        <p  class="error">L'adresse doit être spécifiée</p>
        <?php endif ?>

        <p><label>Code postal: <input type="text" name="zip_code" placeholder="Code postal" ></label></p> <!-- required  -->
        <?php if(isset($errors['zip_code']['empty'])) : ?>
        <p  class="error">Le code postal doit être spécifié</p>
        <?php endif ?>

        <p><label>Ville: <input type="text" name="city" placeholder="Ville" ></label></p> <!-- required  -->
        <?php if(isset($errors['city']['empty'])) : ?>
        <p  class="error">La ville doit être spécifiée</p>
        <?php endif ?>
        
        <p><label>Description de la boutique: <textarea name="description" placeholder="Description"></textarea></label></p>
        <?php if(isset($errors['description']['empty'])) : ?>
        <p  class="error">La description doit être spécifiée</p>
        <?php endif ?>
        
        <p><label>Catégorie Boutique:  <span>(en sélectionnant "Personnalisée" vous pouvez créer votre propre catégorie)</span></label>
        <select name="select">
        <!-- boucle pour récupérer les différentes catégorie dans la DB-->
        <?php foreach ($shopsCategory as $category) : ?>
            <option value=" <?php echo $category['category'] ?>"><?php echo $category['category'] ?></option>
        <?php endforeach ?>
        </select></p>

        <p><label>Date de création boutique: <input type="text" name="date_adding" class="datepicker" placeholder="Date de création"></label></p>
        <?php if(isset($errors['date_adding']['empty'])) : ?>
        <p  class="error">La date de création doit être spécifiée</p>
        <?php elseif(isset($errors['date_adding']['invalid'])) : ?>
        <p  class="error">Le format n'est pas valide. Merci d'entrer une date au format Y-m-d </p>
        <?php endif ?>
           
        <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
        Sélectionner l'image boutique : <input name="logo" type="file" /></p>
        <?php if(isset($errors['file']['upload'])) : ?>
        <p  class="error">Erreur lors de l'upload du fichier</p>
        <?php elseif(isset($errors['file']['noImg'])) : ?>
        <p  class="error">Le fichier n'est pas une image</p>
        <?php elseif(isset($errors['file']['moveUpload'])) : ?>
        <p  class="error">Erreur lors du déplacement du fichier</p>
        <?php elseif(isset($errors['file']['noFile'])) : ?>
        <p  class="error">Merci de choisir un fichier</p>
        <?php endif ?>

        <p><label>Coordonnées GPS:  </label>
        <input type="text" name="latitude" placeholder="Latitude">
        <?php /*if(isset($errors['latitude']['empty'])) :*/ ?>
        <!-- <p>La latitude doit être spécifiée</p>-->
        <?php /*endif*/ ?> 

        <input type="text" name="longitude" placeholder="Longitude">
        <?php /*if(isset($errors['longitude']['empty'])) :*/ ?>
        <!-- <p>La longitude doit être spécifiée </p>-->
        <?php /*endif*/ ?><p>
            
        <p><input type="submit" name="add-shop" value="Ajouter la boutique" />
        <button type="submit" name="cancel">Annuler</button></p>
    </form>
    </fieldset>
</div>
<?php $this->stop('main_content') ?>
