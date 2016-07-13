<?php

namespace Controller;

use \W\Controller\Controller;

class ShopController extends Controller
{
	public function shopListCategory()
    {
        // J'ai recu des données de formulaire
        if (isset($_POST['add-shop'])) {

            // Vérification des champs
            $name = trim(htmlspecialchars($_POST['name']));
            $number = trim(htmlspecialchars($_POST['number']));
            $adress = trim(htmlspecialchars($_POST['adress']));
            $zip_code = trim(htmlspecialchars($_POST['zip_code']));
            $city = trim(htmlspecialchars($_POST['city']));
            $description = trim(htmlspecialchars($_POST['description']));
            $category = trim(htmlspecialchars($_POST['select']));
            $date_adding = trim(htmlspecialchars($_POST['date_adding']));
            /*$originalDate = "2010-03-21";
            $newDate = date("d-m-Y", strtotime($originalDate));*/
            /*$pictures = NULL;*/
            $latitude = trim(htmlspecialchars($_POST['latitude']));
            $longitude = trim(htmlspecialchars($_POST['longitude']));
            $number_view = NULL;
            
            $errors = [];
            if(empty($name)) {
                $errors['name']['empty'] = 'entrrer votre nom';

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
             // die('hello2');
            /* print_r($errors);*/
            if(count($errors) === 0) { 
                // Vérifier si le téléchargement du fichier n'a pas été interrompu
                if ($_FILES['logo']['error'] != UPLOAD_ERR_OK) {
                    // A ne pas faire en-dehors du DOM, bien sur.. En réalité on utilisera une variable intermédiaire
                    $errors['file']['upload'] = true;
                } else {
                    // Objet FileInfo
                    $finfo = new  \finfo(FILEINFO_MIME_TYPE);

                    // Récupération du Mime
                    $mimeType = $finfo->file($_FILES['logo']['tmp_name']);

                    $extFoundInArray = array_search(
                        $mimeType, array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                        )
                    );
                    if ($extFoundInArray === false) {
                        $errors['file']['noImg'] = true;
                    } else {
                        // Renommer nom du fichier
                        $pictures = sha1_file($_FILES['logo']['tmp_name']) . time() . '.' . $extFoundInArray;
                        $pathupload ='assets/uploads/';
                        /*echo getcwd() . "\n";*/
                        $path = 'assets/uploads/' . $pictures; /*verifier existantce et droits d'ecriture dedant*/
                        if (file_exists($pathupload )){
                        $moved = move_uploaded_file($_FILES['logo']['tmp_name'], $path);}else{
                            die('dossier non existant');
                        }
                        
                        // Redimensionner l'image
                        /*commment appeler la fonction size */ /*resize($path, null, 300, 300, true);*/
                        
                        if (!$moved) {
                            $errors['files']['moveUpload'] = true;
                        } else {
                            // Insert DB
                            $insertBDD = new \Manager\ShopManager();
                           
                            $shopsInsert = $insertBDD->setTable('shops');
                           
                            $data = [
                                'name' =>         $name, 
                                'number' =>       $number, 
                                'adDress' =>      $adress, 
                                'zip_code' =>     $zip_code, 
                                'city' =>         $city, 
                                'pictures' =>     $pictures, 
                                'description' =>  $description, 
                                'category' =>     $category, 
                                'date_adding' =>  $date_adding, 
                                'latitude' =>     $latitude,  
                                'longitude' =>    $longitude,
                                'number_view' =>  $number_view 
                                    ];
                            
                            $shopsInsert ->insert($data);
                           
                                                
                            /*$this->redirectToRoot('home');*/ /*il me faut récupérer celui de steven et réadapter avec l'existant*/
                            exit;
                            /* gérer le tableau d'erreur*/
                        }
                   }
                }
            }else{
                print_r($errors);
                $this->redirectToRoute('add-shop',$errors);
            }
        } else{
                $manager = new \Manager\ShopManager();
                $shopsCategory = $manager->getAllcategories();
                $this->show('shops/add-shop', ['shopsCategory' => $shopsCategory]);
        }
    }
}