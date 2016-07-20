<?php

namespace Controller;

use \W\Controller\Controller;

class ShopController extends Controller
{
    public function shopListCategory()
    {
        /*Pour sécuriser l'accès direct via url à la page /shops*/
        $this->allowTo(['editeur']);
        /*print_r($_POST);*/
        // J'ai recu des données de formulaire
        if (isset($_POST['shop-add'])) {

            // Vérification des champs
            $name = trim(htmlspecialchars($_POST['name']));
            $number = trim(htmlspecialchars($_POST['number']));
            $adress = trim(htmlspecialchars($_POST['adress']));
            $zip_code = trim(htmlspecialchars($_POST['zip_code']));
            $city = trim(htmlspecialchars($_POST['city']));
            $description = trim(htmlspecialchars($_POST['description']));
            $category = trim(htmlspecialchars($_POST['category']));
            $date_adding = trim(htmlspecialchars($_POST['date_adding']));
            $latitude = trim(htmlspecialchars($_POST['latitude']));
            $longitude = trim(htmlspecialchars($_POST['longitude']));
            $tel = trim(htmlspecialchars($_POST['phone']));
            $fax = trim(htmlspecialchars($_POST['fax']));
            $mail = trim(htmlspecialchars($_POST['mail']));
            $horaires = trim(htmlspecialchars($_POST['horaires']));
            $facebook = trim(htmlspecialchars($_POST['facebook']));
            $instagram = trim(htmlspecialchars($_POST['instagram']));
            $google = trim(htmlspecialchars($_POST['google']));
            $twitter = trim(htmlspecialchars($_POST['twitter']));
            $pinterest = trim(htmlspecialchars($_POST['pinterest']));
            $number_view = NULL;
            
            $errors = [];
            if(empty($name)) {
                $errors['name']['empty'] = 'entrer votre nom';

            }
            if(empty($number)) {
                $errors['number']['empty'] = true;
            }
            if(empty($adress)) {
                $errors['adress']['empty'] = true;
            }
            if(empty($zip_code)) {
                $errors['zip_code']['empty'] = true;
            }
            if(empty($city)) {
                $errors['city']['empty'] = true;
            }
            if(empty($description)) {
                $errors['description']['empty'] = true;
            }
            if(empty($latitude)) {
                $errors['latitude']['empty'] = true;
            }
            if(empty($longitude)) {
                $errors['longitude']['empty'] = true;
            }

            if(empty($_POST['date_adding'])) {
                $errors['date_adding']['empty'] = true;
            }

            if(empty($_POST['city']) || is_numeric($_POST['city'])) {
                $errors['city']['invalid'] = true;
            } else {
                $country = $_POST['city'];
            }
            /*refaire ce code d'erreur pour les champs name, adress, decription...*/
            
            if($_FILES['logo']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
            if($_FILES['image1']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
            if($_FILES['image2']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
            if($_FILES['image3']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
             // die('hello2');
            /* print_r($errors);*/
            if(count($errors) === 0) {
                // Vérifier si le téléchargement du fichier n'a pas été interrompu
                if (($_FILES['logo']['error'] != UPLOAD_ERR_OK) || ($_FILES['image1']['error'] != UPLOAD_ERR_OK) || ($_FILES['image2']['error'] != UPLOAD_ERR_OK) || ($_FILES['image3']['error'] != UPLOAD_ERR_OK)) {
                    // A ne pas faire en-dehors du DOM, bien sur.. En réalité on utilisera une variable intermédiaire
                    $errors['file']['upload'] = true;
                } else {
                    // Objet FileInfo
                    $finfo_logo = new  \finfo(FILEINFO_MIME_TYPE);
                    $finfo_image1 = new  \finfo(FILEINFO_MIME_TYPE);
                    $finfo_image2 = new  \finfo(FILEINFO_MIME_TYPE);
                    $finfo_image3 = new  \finfo(FILEINFO_MIME_TYPE);

                    // Récupération du Mime
                    $mimeType_logo = $finfo_logo->file($_FILES['logo']['tmp_name']);

                    $extFoundInArray_logo = array_search(
                        $mimeType_logo, array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                            'bmp' => 'images/bmp',
                        )
                    );

                    $mimeType_image1 = $finfo_image1->file($_FILES['image1']['tmp_name']);

                    $extFoundInArray_image1 = array_search(
                        $mimeType_image1, array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                            'bmp' => 'images/bmp',
                        )
                    );

                    $mimeType_image2 = $finfo_image2->file($_FILES['image2']['tmp_name']);

                    $extFoundInArray_image2 = array_search(
                        $mimeType_image2, array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                            'bmp' => 'images/bmp',
                        )
                    );

                    $mimeType_image3 = $finfo_image3->file($_FILES['image3']['tmp_name']);

                    $extFoundInArray_image3 = array_search(
                        $mimeType_image3, array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                            'bmp' => 'images/bmp',
                        )
                    );

                    if (($extFoundInArray_logo === false) || ($extFoundInArray_image1 === false) ||($extFoundInArray_image2 === false) ||($extFoundInArray_image3 === false) ) {
                        $errors['file']['noImg'] = true;
                    } else {

                        /*j'utilise la fonction randomString de W car le time() php dans mon hash de fichier ne tient pas compte des sauvegardes de fichier qui se font endéans 1s donc écrase les 4 fichiers insérés dans upload avec meme nom 
                        la méthode (statique) randomString($length) permet de facilement générer une chaîne aléatoire cryptographiquement sécuritaire.*/
                        $token1 = \W\Security\StringUtils::randomString(32);
                        $token2 = \W\Security\StringUtils::randomString(32);
                        $token3 = \W\Security\StringUtils::randomString(32);
                        $token4 = \W\Security\StringUtils::randomString(32);
                        // Renommer nom du fichier
                        $logo = sha1_file($_FILES['logo']['tmp_name']) . $token1 . '.' . $extFoundInArray_logo;
                        $pathupload ='assets/uploads/';
                        /*echo getcwd() . "\n";*/
                        $path_logo = 'assets/uploads/' . $logo; /*verifier existantce et droits d'ecriture dedant*/
                        if (file_exists($pathupload )){
                        $moved_logo = move_uploaded_file($_FILES['logo']['tmp_name'], $path_logo);}else{
                            /*die('dossier non existant');*/
                        }

                        $image1 = sha1_file($_FILES['image1']['tmp_name']) . $token2 . '.' . $extFoundInArray_image1;
                        $pathupload ='assets/uploads/';
                        $path_image1 = 'assets/uploads/' . $image1; 
                        if (file_exists($pathupload )){
                        $moved_image1 = move_uploaded_file($_FILES['image1']['tmp_name'], $path_image1);
                        }

                        $image2 = sha1_file($_FILES['image2']['tmp_name']) . $token3 . '.' . $extFoundInArray_image2;
                        $pathupload ='assets/uploads/';
                        $path_image2 = 'assets/uploads/' . $image2; 
                        if (file_exists($pathupload )){
                        $moved_image2 = move_uploaded_file($_FILES['image2']['tmp_name'], $path_image2);                        
                        }

                        $image3 = sha1_file($_FILES['image3']['tmp_name']) . $token4 . '.' . $extFoundInArray_image3;
                        $pathupload ='assets/uploads/';
                        $path_image3 = 'assets/uploads/' . $image3; 
                        if (file_exists($pathupload )){
                        $moved_image3 = move_uploaded_file($_FILES['image3']['tmp_name'], $path_image3);
                        }
                        
                        
                        if ((!$moved_logo) || (!$moved_image1) || (!$moved_image2) || (!$moved_image3)) {
                            $errors['files']['moveUpload'] = true;
                        } else {

                            // Redimensionner l'image
                            DefaultController::resize($path_logo,NULL,200,0,true,$path_logo);
                            DefaultController::resize($path_image1,NULL,200,0,true,$path_image1);
                            DefaultController::resize($path_image2,NULL,200,0,true,$path_image2);
                            DefaultController::resize($path_image3,NULL,200,0,true,$path_image3);
 
                            // Insert DB
                            $insertBDD = new \Manager\ShopManager();
                           
                            $shopsInsert = $insertBDD->setTable('shops');

                            $data = [
                                'name' =>           $name, 
                                'number' =>         $number, 
                                'address' =>        $adress, 
                                'zip_code' =>       $zip_code, 
                                'city' =>           $city, 
                                'logo' =>           $logo,
                                'pictshop1' =>      $image1,                         
                                'pictshop2' =>      $image2,
                                'pictshop3' =>      $image3,
                                /*'pictures' =>     $path, je peux garder la ligne d'au-dessus car le resize se fait avant*/
                                'description' =>    $description, 
                                'id_category' =>    $category, 
                                'date_adding' =>    $date_adding,
                                'latitude' =>       $latitude,  
                                'longitude' =>      $longitude,
                                'tel' =>            $tel ,
                                'fax' =>            $fax ,
                                'mail' =>           $mail,
                                'horaires' =>       $horaires ,
                                'facebook' =>       $facebook ,
                                'instagram' =>      $instagram ,
                                'google' =>         $google ,
                                'twitter' =>        $twitter ,
                                'pinterest' =>      $pinterest,
                                'number_view' =>    $number_view 
                                    ];
                            
                            $shopsInsert ->insert($data);
                            $_SESSION['flash'] = 'Données insérées';
                            $this->redirectToRoute('home');
                            exit;

                        }
                   }
                }
            }else{
                //print_r($errors);
                $this->show('shops/add-shop',['errors'=>$errors]);
            }
        } else{
                // die('test insert');
                $manager = new \Manager\ShopManager();
                $shopsCategory = $manager->getAllcategories();
                $this->show('shops/add-shop', ['shopsCategory' => $shopsCategory]);
        }
    }

    public function delete($id)
    {
        $this->allowTo(['editeur']);

        $shopManager  = new \Manager\ShopManager();
        $shopToDelete = $shopManager->find($id);

        @unlink('assets/uploads/' . $shopToDelete['logo']);
        @unlink('assets/uploads/' . $shopToDelete['pictshop1']);
        @unlink('assets/uploads/' . $shopToDelete['pictshop2']);
        @unlink('assets/uploads/' . $shopToDelete['pictshop3']);

        $shopManager->delete($id);
        $_SESSION['flash'] = 'Boutique supprimée';
        $this->redirectToRoute('home');
        exit;
    }


    public function shopEdit($id)
    {
        
        $this->allowTo(['editeur']);
        /*print_r( $shopToEdit);*/
        // J'ai recu des données de formulaire
        if (isset($_POST['edit-shop'])) {
             // Vérification des champs
            $name = trim(htmlspecialchars($_POST['name']));
            $number = trim(htmlspecialchars($_POST['number']));
            $adress = trim(htmlspecialchars($_POST['adress']));
            $zip_code = trim(htmlspecialchars($_POST['zip_code']));
            $city = trim(htmlspecialchars($_POST['city']));
            $description = trim(htmlspecialchars($_POST['description']));
            $category = trim(htmlspecialchars($_POST['category']));
            $date_adding = trim(htmlspecialchars($_POST['date_adding']));
            $latitude = trim(htmlspecialchars($_POST['latitude']));
            $longitude = trim(htmlspecialchars($_POST['longitude']));
            $tel = trim(htmlspecialchars($_POST['phone']));
            $fax = trim(htmlspecialchars($_POST['fax']));
            $mail = trim(htmlspecialchars($_POST['mail']));
            $horaires = trim(htmlspecialchars($_POST['horaires']));
            $facebook = trim(htmlspecialchars($_POST['facebook']));
            $instagram = trim(htmlspecialchars($_POST['instagram']));
            $google = trim(htmlspecialchars($_POST['google']));
            $twitter = trim(htmlspecialchars($_POST['twitter']));
            $pinterest = trim(htmlspecialchars($_POST['pinterest']));
            $number_view = NULL;
            
            $errors = [];
            if(empty($name)) {
                $errors['name']['empty'] = 'entrer votre nom';

            }
            if(empty($number)) {
                $errors['number']['empty'] = true;
            }
            if(empty($adress)) {
                $errors['adress']['empty'] = true;
            }
            if(empty($zip_code)) {
                $errors['zip_code']['empty'] = true;
            }
            if(empty($city)) {
                $errors['city']['empty'] = true;
            }
            if(empty($description)) {
                $errors['description']['empty'] = true;
            }
            if(empty($latitude)) {
                $errors['latitude']['empty'] = true;
            }
            if(empty($longitude)) {
                $errors['longitude']['empty'] = true;
            }

            if(empty($_POST['date_adding'])) {
                $errors['date_adding']['empty'] = true;
            }

            if(empty($_POST['city']) || is_numeric($_POST['city'])) {
                $errors['city']['invalid'] = true;
            } else {
                $country = $_POST['city'];
            }
            /*refaire ce code d'erreur pour les champs name, adress, decription...*/
            /*
            if($_FILES['logo']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
            if($_FILES['image1']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
            if($_FILES['image2']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
            if($_FILES['image3']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
             // die('hello2');
            /*print_r($errors);*/

            if(count($errors) === 0) {
                
                // pour chaque file
                if($_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE)
                {
                    // Vérifier si le téléchargement du fichier n'a pas été interrompu
                    if (($_FILES['logo']['error'] != UPLOAD_ERR_OK)) {
                        // A ne pas faire en-dehors du DOM, bien sur.. En réalité on utilisera une variable intermédiaire
                        $errors['file']['upload'] = true;
                    } else {
                        // Objet FileInfo
                        $finfo_logo = new  \finfo(FILEINFO_MIME_TYPE);

                        // Récupération du Mime
                        $mimeType_logo = $finfo_logo->file($_FILES['logo']['tmp_name']);

                        $extFoundInArray_logo = array_search(
                            $mimeType_logo, array(
                                'jpg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                                'bmp' => 'images/bmp',
                            )
                        );

                        if (($extFoundInArray_logo === false)) {
                            $errors['file']['noImg'] = true;
                        } else {
                            $token1 = \W\Security\StringUtils::randomString(32);
                            // Renommer nom du fichier
                            $logo = sha1_file($_FILES['logo']['tmp_name']) . $token1 . '.' . $extFoundInArray_logo;
                            $pathupload ='assets/uploads/';
                            /*echo getcwd() . "\n";*/
                            $path_logo = 'assets/uploads/' . $logo; /*verifier existantce et droits d'ecriture dedant*/
                            if (file_exists($pathupload )){

                                $moved_logo = move_uploaded_file($_FILES['logo']['tmp_name'], $path_logo);
                            }else{
                                /*die('dossier non existant');*/
                            }
                        
                        
                            if (!$moved_logo) {
                                $errors['files']['moveUpload'] = true;
                            } else {
                                $shopManager  = new \Manager\ShopManager();
                                $shopToEdit = $shopManager->find($id);
                                DefaultController::resize($path_logo,NULL,200,0,true,$path_logo);

                                // Delete Old File
                                @unlink('assets/uploads/' . $shopToEdit['logo']);
                            }
                        }
                    }

                   
                } // fin pour chaque file

                $shopManager  = new \Manager\ShopManager();               
                /*$shopToEditUpdate = $shopManager->setTable('shops');*/
                $shopToEdit = $shopManager->setTable('shops');
                
                $data = [
                    'name' =>           $name, 
                    'number' =>         $number, 
                    'address' =>        $adress, 
                    'zip_code' =>       $zip_code, 
                    'city' =>           $city,
                    'description' =>    $description, 
                    'id_category' =>    $category, 
                    'date_adding' =>    $date_adding,
                    'latitude' =>       $latitude,  
                    'longitude' =>      $longitude,
                    'tel' =>            $tel ,
                    'fax' =>            $fax ,
                    'mail' =>           $mail,
                    'horaires' =>       $horaires ,
                    'facebook' =>       $facebook ,
                    'instagram' =>      $instagram ,
                    'google' =>         $google ,
                    'twitter' =>        $twitter ,
                    'pinterest' =>      $pinterest,
                    'number_view' =>    $number_view 
                ];
                
                // Mise a jour des images si besoin
                if(isset($logo))
                    $data['logo'] = $logo;
                if(isset($image1))
                    $data['pictshop1'] = $image1;
                if(isset($image2))
                    $data['pictshop2'] = $image2;
                if(isset($image3))
                    $data['pictshop3'] = $image3;

                /* $shopToEditUpdate->update( $data,$id);*/
                $shopToEdit->update( $data,$id);
                
                $_SESSION['flash'] = 'Données mise à jour';
                $this->redirectToRoute('home');
            }else{
                 $this->show('shops/edit-shop',['errors'=>$errors]);
            }
        } else{
                
                $manager = new \Manager\ShopManager();
                $shopsCategory = $manager->getAllcategories();
                $shopManager  = new \Manager\ShopManager();
                $shopToEdit = $shopManager->find($id);  
                $this->show('shops/edit-shop', ['shopsCategory' => $shopsCategory,
                                                'shopToEdit' => $shopToEdit]);
        }
    }
    
    public function shopview($id)
    { 
        $shopManager  = new \Manager\ShopManager();
        $shopToView = $shopManager->find($id);

        if(!$shopToView) {
            $this->redirectToRoute('home');
            exit;
        }
        
        $this->show('shops/shopview', ['shopToView' => $shopToView]);
 
    }

}