 // Vérifier si le téléchargement du fichier n'a pas été interrompu
                    /*if (($_FILES['logo']['error'] != UPLOAD_ERR_OK) || ($_FILES['image1']['error'] != UPLOAD_ERR_OK) || ($_FILES['image2']['error'] != UPLOAD_ERR_OK) || ($_FILES['image3']['error'] != UPLOAD_ERR_OK)) {
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
                        la méthode (statique) randomString($length) permet de facilement générer une chaîne aléatoire cryptographiquement sécuritaire.
                        $token1 = \W\Security\StringUtils::randomString(32);
                        $token2 = \W\Security\StringUtils::randomString(32);
                        $token3 = \W\Security\StringUtils::randomString(32);
                        $token4 = \W\Security\StringUtils::randomString(32);
                        // Renommer nom du fichier
                        $logo = sha1_file($_FILES['logo']['tmp_name']) . $token1 . '.' . $extFoundInArray_logo;
                        $pathupload ='assets/uploads/';
                        
                        $path_logo = 'assets/uploads/' . $logo; 
                        if (file_exists($pathupload )){
                        $moved_logo = move_uploaded_file($_FILES['logo']['tmp_name'], $path_logo);}else{
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
                            // Redimensionner l'image
                            DefaultController::resize($path_logo,NULL,200,0,true,$path_logo);
                            DefaultController::resize($path_image1,NULL,200,0,true,$path_image1);
                            DefaultController::resize($path_image2,NULL,200,0,true,$path_image2);
                            DefaultController::resize($path_image3,NULL,200,0,true,$path_image3);

                            // Delete Old File
                            @unlink('assets/uploads/' . $shopToEdit['logo']);
                            @unlink('assets/uploads/' . $shopToEdit['pictshop1']);
                            @unlink('assets/uploads/' . $shopToEdit['pictshop2']);
                            @unlink('assets/uploads/' . $shopToEdit['pictshop3']);
                                                
                            // Insert DB

                            $shopManager  = new \Manager\ShopManager();
                            $shopToEdit = $shopManager->find($id);               
                            $shopToEdit = $shopManager->setTable('shops');
                            
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
                                                      
                           print_r($data);
                           die();
                            $shopToEdit->update( $data,$id);
                            $_SESSION['flash'] = 'Données mise à jour';
                            $this->redirectToRoute('home');
                            exit;

                        }
                   }*/