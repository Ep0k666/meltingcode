<?php

namespace Controller;

use \W\Controller\Controller;

class ShopController extends Controller
{
    public function shopListCategory()
    {
        //Pour sécuriser l'accès direct via url à la page /shops
        $this->allowTo(['editeur']);

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

            if(empty($_POST['city']) || is_numeric($_POST['city'])) {
                $errors['city']['invalid'] = true;
            } else {
                $country = $_POST['city'];
            }


            if($_FILES['logo']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
            if($_FILES['image1']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
            /*if($_FILES['image2']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }
            if($_FILES['image3']['error'] == UPLOAD_ERR_NO_FILE) {
                $errors['file']['noFile'] = true;
            }*/
            
            if(count($errors) === 0) {
                // Vérifier si le téléchargement du fichier n'a pas été interrompu
                if (($_FILES['logo']['error'] != UPLOAD_ERR_OK) || ($_FILES['image1']['error'] != UPLOAD_ERR_OK) /*|| ($_FILES['image2']['error'] != UPLOAD_ERR_OK) || ($_FILES['image3']['error'] != UPLOAD_ERR_OK)*/) {
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

                    if (($extFoundInArray_logo === false) || ($extFoundInArray_image1 === false) /*||($extFoundInArray_image2 === false) ||($extFoundInArray_image3 === false)*/) {
                        $errors['file']['noImg'] = true;
                    } else {

                        /*j'utilise la fonction randomString de W car le time() php dans mon hash de fichier ne tient pas compte des sauvegardes de fichier qui se font endéans 1s donc écrase les 4 fichiers insérés dans upload avec même nom:
                        la méthode (statique) randomString($length) permet de facilement générer une chaîne aléatoire cryptographiquement sécuritaire.*/
                        $token1 = \W\Security\StringUtils::randomString(32);
                        $token2 = \W\Security\StringUtils::randomString(32);
                        $token3 = \W\Security\StringUtils::randomString(32);
                        $token4 = \W\Security\StringUtils::randomString(32);
                        // Renommer nom du fichier
                        $logo = sha1_file($_FILES['logo']['tmp_name']) . $token1 . '.' . $extFoundInArray_logo;
                        $pathupload ='assets/uploads/';
                        /*echo getcwd() . "\n";*/
                        $path_logo = 'assets/uploads/' . $logo; 
                        if (file_exists($pathupload )){
                            $moved_logo = move_uploaded_file($_FILES['logo']['tmp_name'], $path_logo);
                        } else {
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


                        if ((!$moved_logo) || (!$moved_image1) /*|| (!$moved_image2) || (!$moved_image3)*/) {
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

                            //Récupération PHP des latitudes et longitudes via api google maps
                            $params = http_build_query([
                                'address' => $_POST['number'] . ',' . $_POST['adress'] . ',' . $_POST['zip_code'] . ',' . $_POST['city'],
                                'key' => '',
                            ]);
                            $url = 'https://maps.googleapis.com/maps/api/geocode/json';
                            $fullUrl = $url . '?' . $params;
                            $responseJSON = file_get_contents($fullUrl);
                            $responseArray = json_decode($responseJSON);

                            $latitude = $responseArray->results[0]->geometry->location->lat;
                            $longitude = $responseArray->results[0]->geometry->location->lng;                           
                            
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
                            // Méthode pour afficher via $_SESSION un message indicatif de CRUD en DB après validation formulaire
                            $_SESSION['flash'] = 'Données insérées';
                            $this->redirectToRoute('home');
                            exit;
                        }
                   }
                }
            }else{
                $manager = new \Manager\ShopManager();
                $shopsCategory = $manager->getAllActivities();
                $this->show('shops/add-shop', ['errors' => $errors,
                    'shopsCategory' => $shopsCategory]);
            }
        } else{
                $manager = new \Manager\ShopManager();
            $shopsCategory = $manager->getAllActivities();
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
            /*            $latitude = NULL;
                        $longitude = NULL ;*/
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

            if(empty($_POST['city']) || is_numeric($_POST['city'])) {
                $errors['city']['invalid'] = true;
            } else {
                $country = $_POST['city'];
            }


            if(count($errors) === 0) {

                // pour chaque file :Logo
                if($_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE)
                {
                    // Vérifier si le téléchargement du fichier n'a pas été interrompu
                    if (($_FILES['logo']['error'] != UPLOAD_ERR_OK)) {
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
                            $path_logo = 'assets/uploads/' . $logo; 
                            
                            if (file_exists($pathupload )){
                                $moved_logo = move_uploaded_file($_FILES['logo']['tmp_name'], $path_logo);
                            } else {
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
                } // fin pour chaque file: Logo

                // pour chaque file : image1
                if ($_FILES['image1']['error'] !== UPLOAD_ERR_NO_FILE) {
                    if (($_FILES['image1']['error'] != UPLOAD_ERR_OK)) {
                        $errors['file']['upload'] = true;
                    } else {
                        $finfo_image1 = new  \finfo(FILEINFO_MIME_TYPE);

                        $mimeType_image1 = $finfo_image1->file($_FILES['image1']['tmp_name']);

                        $extFoundInArray_image1 = array_search(
                            $mimeType_image1, array(
                                'jpg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                                'bmp' => 'images/bmp',
                            )
                        );

                        if (($extFoundInArray_image1 === false)) {
                            $errors['file']['noImg'] = true;
                        } else {
                            $token2 = \W\Security\StringUtils::randomString(32);

                            $image1 = sha1_file($_FILES['image1']['tmp_name']) . $token2 . '.' . $extFoundInArray_image1;
                            $pathupload = 'assets/uploads/';

                            $path_image1 = 'assets/uploads/' . $image1;

                            if (file_exists($pathupload)) {
                                $moved_image1 = move_uploaded_file($_FILES['image1']['tmp_name'], $path_image1);
                            } else {
                                /*die('dossier non existant');*/
                            }

                            if (!$moved_image1) {
                                $errors['files']['moveUpload'] = true;
                            } else {
                                $shopManager = new \Manager\ShopManager();
                                $shopToEdit = $shopManager->find($id);
                                DefaultController::resize($path_image1, NULL, 200, 0, true, $path_image1);

                                @unlink('assets/uploads/' . $shopToEdit['image1']);
                            }
                        }
                    }
                } // fin pour chaque file  : image1

                // pour chaque file: image2
                if ($_FILES['image2']['error'] !== UPLOAD_ERR_NO_FILE) {
                    if (($_FILES['image2']['error'] != UPLOAD_ERR_OK)) {
                        $errors['file']['upload'] = true;
                    } else {
                        $finfo_image2 = new  \finfo(FILEINFO_MIME_TYPE);

                        $mimeType_image2 = $finfo_image2->file($_FILES['image2']['tmp_name']);

                        $extFoundInArray_image2 = array_search(
                            $mimeType_image2, array(
                                'jpg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                                'bmp' => 'images/bmp',
                            )
                        );

                        if (($extFoundInArray_image2 === false)) {
                            $errors['file']['noImg'] = true;
                        } else {
                            $token3 = \W\Security\StringUtils::randomString(32);

                            $image2 = sha1_file($_FILES['image2']['tmp_name']) . $token3 . '.' . $extFoundInArray_image2;
                            $pathupload = 'assets/uploads/';

                            $path_image2 = 'assets/uploads/' . $image2;

                            if (file_exists($pathupload)) {

                                $moved_image2 = move_uploaded_file($_FILES['image2']['tmp_name'], $path_image2);
                            } else {
                                /*die('dossier non existant');*/
                            }

                            if (!$moved_logo) {
                                $errors['files']['moveUpload'] = true;
                            } else {
                                $shopManager = new \Manager\ShopManager();
                                $shopToEdit = $shopManager->find($id);
                                DefaultController::resize($path_image2, NULL, 200, 0, true, $path_image2);

                                @unlink('assets/uploads/' . $shopToEdit['logo']);
                            }
                        }
                    }
                } // fin pour chaque file  : image2

                // pour chaque file : image3
                if ($_FILES['image3']['error'] !== UPLOAD_ERR_NO_FILE) {
                    if (($_FILES['image3']['error'] != UPLOAD_ERR_OK)) {
                        $errors['file']['upload'] = true;
                    } else {
                        $finfo_image3 = new  \finfo(FILEINFO_MIME_TYPE);

                        $mimeType_image3 = $finfo_image3->file($_FILES['image3']['tmp_name']);

                        $extFoundInArray_image3 = array_search(
                            $mimeType_image3, array(
                                'jpg' => 'image/jpeg',
                                'png' => 'image/png',
                                'gif' => 'image/gif',
                                'bmp' => 'images/bmp',
                            )
                        );

                        if (($extFoundInArray_image3 === false)) {
                            $errors['file']['noImg'] = true;
                        } else {
                            $token4 = \W\Security\StringUtils::randomString(32);

                            $image3 = sha1_file($_FILES['image3']['tmp_name']) . $token4 . '.' . $extFoundInArray_image3;
                            $pathupload = 'assets/uploads/';

                            $path_image3 = 'assets/uploads/' . $image3;
                            if (file_exists($pathupload)) {
                                $moved_image3 = move_uploaded_file($_FILES['image3']['tmp_name'], $path_image3);
                            } else {
                                /*die('dossier non existant');*/
                            }


                            if (!$moved_image3) {
                                $errors['files']['moveUpload'] = true;
                            } else {
                                $shopManager = new \Manager\ShopManager();
                                $shopToEdit = $shopManager->find($id);
                                DefaultController::resize($path_image3, NULL, 200, 0, true, $path_image3);

                                @unlink('assets/uploads/' . $shopToEdit['image3']);
                            }
                        }
                    }
                } // fin pour chaque file  : image3


                $shopManager  = new \Manager\ShopManager();               
                $shopToEdit = $shopManager->setTable('shops');

                //Récupération PHP des latitudes et longitudes via api google maps
                $params = http_build_query([
                    'address' => $_POST['number'] . ',' . $_POST['adress'] . ',' . $_POST['zip_code'] . ',' . $_POST['city'],
                    'key' => '',
                ]);
                $url = 'https://maps.googleapis.com/maps/api/geocode/json';
                $fullUrl = $url . '?' . $params;
                $responseJSON = file_get_contents($fullUrl);
                $responseArray = json_decode($responseJSON);

                $latitude = $responseArray->results[0]->geometry->location->lat;
                $longitude = $responseArray->results[0]->geometry->location->lng; 
                
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

                $shopToEdit->update( $data,$id);
                $_SESSION['flash'] = 'Données mise à jour';
                $this->redirectToRoute('home');
            }else{
                 $this->show('shops/edit-shop',['errors'=>$errors]);
            }
        } else{
                
                $manager = new \Manager\ShopManager();
            $shopsCategory = $manager->getAllActivities();
                $shopManager  = new \Manager\ShopManager();
                $shopToEdit = $shopManager->find($id);  
                $this->show('shops/edit-shop', ['shopsCategory' => $shopsCategory,
                                                'shopToEdit' => $shopToEdit]);
        }
    }
    
    public function shopview($id)
    {
        $manager = new \Manager\ShopManager();
        $shopsCategory = $manager->getAllActivities();
        $shopManager  = new \Manager\ShopManager();
        $shopToView = $shopManager->find($id);

        if(!$shopToView) {
            $this->redirectToRoute('home');
            exit;
        }

        $this->show('shops/shopview', ['shopsCategory' => $shopsCategory,
            'shopToView' => $shopToView]);
    }

    public function adminHome($id)
    {
        $manager = new \Manager\ShopManager();
        $shopsCategory = $manager->getAllActivities();
        $shopManager = new \Manager\ShopManager();
        $shopToAdmin = $shopManager->find($id);

        /*if(!$shopToAdmin) {
            $this->redirectToRoute('home');
            exit;
        }*/

        $this->show('shops/admin-shops', ['shopsCategory' => $shopsCategory,
            'shopToAdmin' => $shopToAdmin]);
    }

}