<?php $this->layout('layout', ['title' => 'add-shop']) ?>

<?php $this->start('main_content') ?>
<?php print_r($_POST) ?>
   <!--  <style>   
      #map {
        height: 100%;
      }
    </style>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <style>
      #locationField, #controls {
        position: relative;
        width: 480px;
      }
      #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
      }
      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
      }
      #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
    </style> -->
  
<?php if (isset($errors) && count($errors)>0) :?>
  <style>
    #add-shop form p{
      margin-bottom: 0;
    }
  </style>
<?php endif; ?>

<div id="add-shop">
    <div class="container"> 
        <h2>Bienvenue dans l’aventure!</h2>
        <legend>Ajouter une boutique</legend>

        <form enctype="multipart/form-data" action="#" method="post">

            <section>
                <h3>La Boutique</h3>
                <p><label>Intitulé de la boutique *:  <input type="text" name="name" value="<?php if(isset($lastWrite['name'])) echo $lastWrite['name'] ?>" placeholder="Aux plaisirs sucrés" class="add-shop"></label><!--required  --></p>
                <?php if(isset($errors['name']['empty'])) : ?>
                    <p class="error">Le nom de la boutique doit être spécifié</p>
                <?php endif ?>

                <!-- DESCRIPTION DE LA BOUTIQUE -->
                <p><label>Description de la boutique: <textarea name="description"  placeholder="Ajoutez une description détaillée comprenant les valeurs de la société ainsi que le type de services que vous proposez"><?php if(isset($lastWrite['description'])) echo $lastWrite['description'] ?></textarea></label></p>
                <?php if(isset($errors['description']['empty'])) : ?>
                    <p  class="error">La description doit être spécifiée</p>
                <?php endif ?>

                 <!-- DATE DE CREATION DE BOUTIQUE -->
                <p><label>Date d'ouverture de votre boutique: <input type="text" name="date_adding" class="datepicker" placeholder="Date de création" value="<?php echo date("Y-m-d H:i:s");?>"></label></p>
                
                <!-- LES CATEGORIES -->
                <p><label>Catégorie Boutique:  <!-- <span>(en sélectionnant "Personnalisée" vous pouvez créer votre propre catégorie)</span> -->
                        <select name="category">
                            <!-- boucle pour récupérer les différentes catégorie shop dans le select-->
                            <?php foreach ($shopsCategory as $category) : ?>
                                <option value=" <?php echo $category['id_catshops'] ?>"><?php echo $category['category'] ?></option>
                            <?php endforeach ?>
                        </select></p></label>
            </section>

            <section>         
                <h3>Adresse</h3>
                <p><label>Numéro de rue *:  <input type="text" name="number" value="<?php if(isset($lastWrite['number'])) echo $lastWrite['number'] ?>" placeholder="33" ></label></p> <!-- required  -->
                <?php if(isset($errors['number']['empty'])) : ?>
                    <p  class="error">Le numéro de rue doit être spécifié</p>
                <?php endif ?>

                <p><label>Adresse *:  <input type="text" name="adress" value="<?php if(isset($lastWrite['adress'])) echo $lastWrite['adress'] ?>" placeholder="Avenue de Gaulle"></label></p> <!-- required  -->
                <?php if(isset($errors['adress']['empty'])) : ?>
                    <p  class="error">L'adresse doit être spécifiée</p>
                <?php endif ?>

                <!-- <p><label>Code postal *: <input type="text" name="zip_code" value="<?php if(isset($lastWrite['zip_code'])) echo $lastWrite['zip_code'] ?>" placeholder="57290" ></label></p>  --> <!-- required  -->
               <!--  <?php if(isset($errors['zip_code']['empty'])) : ?>
                    <p  class="error">Le code postal doit être spécifié</p>
                <?php endif ?>  -->
               
               <!--  <p><label>Ville *: <input type="text" name="city" value="<?php if(isset($lastWrite['city'])) echo $lastWrite['city'] ?>" placeholder="YUTZ" ></label></p>  --> <!-- required  -->
                <!-- <?php if(isset($errors['city']['empty'])) : ?>
                    <p  class="error">La ville doit être spécifiée</p>
                <?php endif ?>   -->


                <div>
                    <div id="zipbox" class="control-group">
                      <label for="zip">Code Postal *</label>
                     <!--  value="<?php if(isset($lastWrite['zip_code'])) echo $lastWrite['zip_code'] ?>" -->
                      <input type="text" class='' pattern="[0-9]*" name="zip" id="zip" value="" placeholder="Tapez votre code postal"/>
                      <?php if(isset($errors['zip_code']['empty'])) : ?>
                      <p  class="error">Le code postal doit être spécifié</p>
                      <?php endif ?>
                    </div>  
                </div>
                <div>
                    <div id="citybox" class="control-group" >
                      <label for="city">Ville *</label>
                      <input type="text" name="city" id="city" value="<?php if(isset($lastWrite['city'])) echo $lastWrite['city'] ?>" placeholder="D'abord taper votre code postal" />
                      <?php if(isset($errors['city']['empty'])) : ?>
                      <p  class="error">La ville doit être spécifiée</p>
                      <?php endif ?>  
                    </div>
                </div>          
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

                <!-- HORAIRE -->
                <p><label>Horaires: <textarea name="horaires" placeholder="Ajoutez les horaires d'ouverture de votre boutique"></textarea></label></p>
            </section>

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
                    Sélectionnez votre photo n° 3: <input name="image3" type="file" /></p>
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
                <!-- <?php if(isset($errors['file']['upload'])) : ?>
                    <p  class="error">Erreur lors de l'upload du fichier</p>
                <?php elseif(isset($errors['file']['noImg'])) : ?>
                    <p  class="error">Le fichier n'est pas une image</p>
                <?php elseif(isset($errors['file']['moveUpload'])) : ?>
                    <p  class="error">Erreur lors du déplacement du fichier</p>
                <?php elseif(isset($errors['file']['noFile'])) : ?>
                    <p  class="error">Merci de choisir un fichier</p>
                <?php endif ?>  -->

                <!-- DESCRIPTION PRODUIT -->
                <p><label>Description du produit: <textarea name="descprod1" placeholder="Ajoutez une description courte et concise"></textarea></label></p>
                <!-- <?php if(isset($errors['description']['empty'])) : ?>
                    <p  class="error">La description doit être spécifiée</p>
                <?php endif ?>
 -->
                <!-- SECOND PRODUIT PHARE -->
             <!--  <p><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
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
              <!--   <p><label>Description du produit: <textarea name="descprod2" placeholder="Ajoutez une description courte et concise"></textarea></label></p>
                <?php if(isset($errors['description']['empty'])) : ?>
                    <p  class="error">La description doit être spécifiée</p>
                <?php endif ?> 
 -->
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

            <!-- <div id="locationField">
                  <input id="autocomplete" placeholder="Enter your address"
                         onFocus="geolocate()" type="text"></input>
                </div>

                <table id="address">
                  <tr>
                    <td class="label">Street address</td>
                    <td class="slimField"><input class="field" id="street_number"
                          disabled="true"></input></td>
                    <td class="wideField" colspan="2"><input class="field" id="route"
                          disabled="true"></input></td>
                  </tr>
                  <tr>
                    <td class="label">City</td>
                    <td class="wideField" colspan="3"><input class="field" id="locality"
                          disabled="true"></input></td>
                  </tr>
                  <tr>
                    <td class="label">State</td>
                    <td class="slimField"><input class="field"
                          id="administrative_area_level_1" disabled="true"></input></td>
                    <td class="label">Zip code</td>
                    <td class="wideField"><input class="field" id="postal_code"
                          disabled="true"></input></td>
                  </tr>
                  <tr>
                    <td class="label">Country</td>
                    <td class="wideField" colspan="3"><input class="field"
                          id="country" disabled="true"></input></td>
                  </tr>
                </table>

                <script>
                    // This example displays an address form, using the autocomplete feature
                    // of the Google Places API to help users fill in the information.

                    var placeSearch, autocomplete;
                    var componentForm = {
                      street_number: 'short_name',
                      route: 'long_name',
                      locality: 'long_name',
                      administrative_area_level_1: 'short_name',
                      country: 'long_name',
                      postal_code: 'short_name'
                    };

                    function initAutocomplete() {
                      // Create the autocomplete object, restricting the search to geographical
                      // location types.
                      autocomplete = new google.maps.places.Autocomplete(
                          /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                          {types: ['geocode']});

                      // When the user selects an address from the dropdown, populate the address
                      // fields in the form.
                      autocomplete.addListener('place_changed', fillInAddress);
                    }

                    // [START region_fillform]
                    function fillInAddress() {
                      // Get the place details from the autocomplete object.
                      var place = autocomplete.getPlace();

                      for (var component in componentForm) {
                        document.getElementById(component).value = '';
                        document.getElementById(component).disabled = false;
                      }

                      // Get each component of the address from the place details
                      // and fill the corresponding field on the form.
                      for (var i = 0; i < place.address_components.length; i++) {
                        var addressType = place.address_components[i].types[0];
                        if (componentForm[addressType]) {
                          var val = place.address_components[i][componentForm[addressType]];
                          document.getElementById(addressType).value = val;
                        }
                      }
                    }
                    // [END region_fillform]

                    // [START region_geolocation]
                    // Bias the autocomplete object to the user's geographical location,
                    // as supplied by the browser's 'navigator.geolocation' object.
                    function geolocate() {
                      if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                          var geolocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                          };
                          var circle = new google.maps.Circle({
                            center: geolocation,
                            radius: position.coords.accuracy
                          });
                          autocomplete.setBounds(circle.getBounds());
                        });
                      }
                    }
                    // [END region_geolocation]

                </script>       
                <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
        async defer></script>
                </script> -->
            </section>

            <section>
                <!-- LIENS RESEAUX SOCIAUX -->
                <h3>Les réseaux sociaux</h3>
                
                <!-- FACEBOOK -->
                <p><label>Lien vers votre Facebook:<input type="text" name="facebook" value="" placeholder="Facebook"></label></p>

                <!-- INSTAGRAM -->
                <p><label>Lien vers votre Instagram:<input type="text" name="instagram" value="" placeholder="Instagram"></label></p>

                <!-- GOOGLE + -->
                <p><label>Lien vers votre Google +:<input type="text" name="google" value="" placeholder="Google +"></label></p>

                <!-- TWITTER -->
                <p><label>Lien vers votre Twitter:<input type="text" name="twitter" value="" placeholder="Twitter"></label></p>

                <!-- PINTEREST -->
                <p><label>Lien vers votre Pinterest:<input type="text" name="pinterest" value="" placeholder="Pinterest"></label></p>
            </section>
            <div class="clearfix"></div>

            <p><button type="submit" name="shop-add" value="" />Ajouter la boutique</button></p>
        </form>
      <a href="<?= $this->url('admin-shop',['id'=>$w_user['id']]) ?>" name="cancel" id="cancel_link">Annuler</a>
    </div>
</div>
<!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;language=fr></script> -->

<?php $this->stop('main_content') ?> 
