<?php

namespace Controller;

use \W\Controller\Controller;

class NewsletterController extends Controller
{

    /***
     * Fonction pour page 'newsletter'
     * Ajout des infos utlisateurs
     * Envoi mail de confirmation
     ***/
    public function subscribeNewsletter()
    {

        /*** Si le formualire de souscription à la news a été soumi ***/
        if(isset($_POST['news-submit'])){

            /*** Newsletter Manager ***/
            $manager = new \Manager\NewsletterManager();

            // Vérification et nettoyage des champs
            $lastname   = trim(htmlspecialchars($_POST['lastname']));
            $firstname  = trim(htmlspecialchars($_POST['firstname']));
            $age        = trim(htmlspecialchars($_POST['age']));
            $mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
            $gender     = $_POST['gender'];

            // Gestion des erreurs
            $errors = [];

            // Vérification enregistrement pour affichage du message success 
            $infoInserted = false;


            /********************
             * LASTNAME
             ********************/

            /*** Too Short ***/
            if (strlen($lastname) < 3) {
                $errors['lastname']['tooShort'] = '
                    <p class="errors">Le nom doit contenir au moins 3 caractères</p>';
            }

            /*** Too Long ***/
            if (strlen($lastname) >= 50) {
                $errors['lastname']['tooLong'] = '
                    <p class="errors">Le nom ne peut pas contenir plus de 100 caractères</p>';
            }

            /*** Integer ***/
            if (filter_var($lastname, FILTER_VALIDATE_INT)) {
                $errors['lastname']['int'] = '
                    <p class="errors">Le nom ne peut pas contenir de chiffres</p>';
            }


            /********************
             * FIRSTNAME
             ********************/

            /*** Too Short ***/
            if (strlen($firstname) < 3) {
                $errors['firstname']['tooShort'] = '
                    <p class="errors">Le prénom doit contenir au moins 3 caractères</p>';
            }

            /*** Integer ***/
            if (filter_var($firstname, FILTER_VALIDATE_INT)) {
                $errors['firstname']['int'] = '
                    <p class="errors">Le nom ne peut pas contenir de chiffres</p>';
            }

            /*** Too Long ***/
            if (strlen($firstname) >= 50) {
                $errors['firstname']['tooLong'] = '
                    <p class="errors">Le prénom ne peut pas contenir plus de 100 caractères</p>';
            }


            /********************
             * AGE
             ********************/

            /*** Empty ***/
            if (empty($age)) {
                $errors['age']['empty'] = '
                    <p class="errors">L\'âge doit être spécifié</p>';
            }

            /*** Too Long ***/
            if (strlen($age) >= 3) {
                $errors['age']['tooLong'] = '
                    <p class="errors">L\'âge ne peut pas contenir plus de 2 caractères</p>';
            }


            /********************
             * EMAIL
             ********************/

            /*** Too  Short ***/
            if (strlen($mail) <= 8) {
                $errors['mail']['tooShort'] = '
                    <p class="errors">Le mail doit contenir au moins 8 caractères</p>';
            }

            /*** Too Long ***/
            if (strlen($mail) >= 50) {
                $errors['mail']['tooLong'] = '
                    <p class="errors">Le mail ne peut pas contenir plus de 50 caractères</p>';
            }

            /*** Invalid format ***/
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errors['mail']['format'] = '
                    <p class="errors">Le mail doit avoir ce format : adresse@mail.com</p>';
            }

            /*** Email exist ***/
            if ($manager->emailExists($mail)) {
                $errors['mail']['exist'] = '
                    <p class="errors">Ce mail existe déjà</p>';
            }

            // Si aucune erreurs dans le tableau $errors
            if (count($errors) === 0) {

                /*** Address pour confirmation ***/
                $addressUserConf = $mail;

                /*** Sujet confirmation ***/
                $subjectConf = 'Votre inscription à la newsletter Lor\'N Shop';

                // Déclaration des valeurs de "semaines"
                $thisWeek = date('Y-m-d');
                $lastWeek = date('Y-m-d', strtotime('-1 week'));

                /*** Début du contenu HTML ***/
                $contentConfHtml = '
                <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <title>Newsletter</title>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
                            <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet" type="text/css">
                            
                            <style type="text/css">

                            /* Fonts and Content */
                            body, td { font-family: "Titillium Web", sans-serif; font-size:14px; }
                            body { margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
                            h2{ padding-top:12px; /* ne fonctionnera pas sous Outlook 2007+ */color:#0E7693; font-size:22px; }

                            </style>
                        </head>
                
                        <body style="margin:0px; padding:0px; -webkit-text-size-adjust:none;">

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"  >
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <table  cellpadding="0" cellspacing="0" border="0">
                                                <tbody>                            
                                                    <tr>
                                                        <td class="w640"  width="640" height="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w640"  width="640" height="10"></td>
                                                    </tr>


                                                    <!-- entete -->
                                                    <tr class="pagetoplogo">
                                                        <td class="w640"  width="640">
                                                            <table  class="w640"  width="640" cellpadding="0" cellspacing="0" border="0">
                                                                <tbody>
                                                                    <tr style="background: #313A3D;">
                                                                        <td class="w30"  width="30" ></td>
                                                                        <td  class="w580"  width="580" valign="middle" align="left" >
                                                                            <div class="pagetoplogo-content" style="margin: auto;">
                                                                                       

                                                                                        <!-- *** Titre principal *** -->
                                                                                        <a href="http://localhost/MC/meltingcode/public" style="color: #80C2BB; text-decoration: none;">
                                                                                            <h1 style="font-family: "Lobster", cursive;font-size: 45px;color: #80C2BB;line-height: 42px;padding: 15px 0 18px;text-shadow: 1px 1px 1px #FFF;font-weight: 600; text-align: center;">
                                                                                                <strong>Lor\'
                                                                                                    <span style="color: #FFF;transform: rotate(0deg);display: inline-block;">N</span>
                                                                                                    <span> Shop</span>
                                                                                                </strong>
                                                                                            </h1>
                                                                                        </a>

                                                                            

                                                                                
                                                                            </div>
                                                                        </td> 
                                                                        <td class="w30"  width="30"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <!-- separateur horizontal -->
                                                    <tr>
                                                        <td  class="w640"  width="640" height="1" bgcolor="#d7d6d6"></td>
                                                    </tr>

                                                     <!-- contenu -->
                                                    <tr class="content">
                                                        <td class="w640" class="w640"  width="640" bgcolor="#efefef">
                                                            <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td  class="w30"  width="30"></td>
                                                                        <td  class="w580"  width="580">
                                                                            <!-- une zone de contenu -->
                                                                            <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                                                <tbody>                                                            
                                                                                    <tr>
                                                                                        <td class="w580"  width="580">
                                                                                            <h2 style="color:#80C2BB; font-size:22px; padding-top:12px; font-family: "Lobster", cursive;">
                                                                                                Bienvenue en Lorraine ! </h2>

                                                                                            <div align="left" class="article-content">
                                                                                                <p style="text-align: justify;">
                                                                                                    Bonjour ' . $firstname . ', <br /><br />
                                                                                                    Nous avons la joie de vous informer que vous êtes désormais abonné à notre newsletter. <br />
                                                                                                    N\'hésitez surtout pas à visiter les pages des dernières boutiques.<br /><br />
                                                                                                    L\'équipe Lor\'N Shop!

                                                                                                </p>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!-- fin zone -->   
                                                                            <!-- une autre zone de contenu -->
                                                                            <table class="w580"  width="580" cellspacing="0" cellpadding="0" border="0">
                                                                        </td>
                                                                        <td class="w30" class="w30"  width="30"></td> 
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <!--  separateur horizontal de 15px de  haut-->
                                                    <tr>
                                                        <td class="w640"  width="640" height="10" style="background:#80C2BB"></td>
                                                    </tr>

                                                    <!-- pied de page -->
                                                    <tr class="pagebottom" >
                                                        <td class="w640"  width="640">
                                                            <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" style="background: #313A3D;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="5" height="10"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w30"  width="30"></td>
                                                                        <td class="w580"  width="580" valign="top">
                                                                            <p align="right" class="pagebottom-content-left">
                                                                                <a style="color:#255D5C; text-decoration:none;" href="http://localhost/MC/meltingcode/public/"><span style="color:#255D5C;">copyright &copy; 2016 Lor"N Shop.com</span></a>
                                                                            </p>
                                                                        </td>

                                                                        <td class="w30"  width="30"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" height="10"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w640"  width="640" height="60"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>
                    </html>';

                // Contenu sans HTML
                $contentConfNoHtml = 'Bonjour ' . $firstname . '
                Nous avons la joie de vous informer que vous êtes désormais abonné à notre newsletter.';

                // Appel de sendMail pour envoi confirmation inscription "news"
                $this->sendMail($mail, $subjectConf, $contentConfHtml, $contentConfNoHtml);

                // Déclaration de data []
                $data = [
                    'lastname' => $lastname,
                    'firstname' => $firstname,
                    'age' => $age,
                    'mail' => $mail,
                    'gender' => $gender,
                ];

                /*** Insertion en DB des infos utilisateurs ***/
                $manager->insert($data);

                /*** Confirmation infos insérés ***/
                $infoInserted = true;

                /*** Show to template 'newsletter' ***/
                $this->show('display/newsletter', ['infoInserted' => $infoInserted]);

            } /*** S'il y des erreurs show to template 'newsletter' + $errors[] ***/
            else{
                $this->show('display/newsletter',['errors' => $errors]);
            }
        } /*** Sinon j'affiche newsletter ***/
        else{
            $this->show('display/newsletter');
        }
    }

    /***
     * Fonction d'envoi de mail
     * Envoi mail de confirmation
     * Envoi newsletter
     ***/
    public function sendMail($address, $subject, $contentHtml, $contentNoHtml, $recentShops = null)
    {
        $mail = new \PHPMailer();

        $mail->isSMTP();                                        // On va se servir de SMTP
        $mail->Host = 'smtp.gmail.com';                         // Serveur SMTP
        $mail->SMTPAuth = true;                                 // Active l'autentification SMTP
        $mail->Username = 'lor.n.shops@gmail.com';              // SMTP username
        $mail->Password = '1esquimauentongs%';                  // SMTP password
        $mail->SMTPSecure = 'tls';                              // TLS Mode
        $mail->Port = 587;                                      // Port TCP à utiliser


        /*** Username, sender et setform doivent être identiques pour Gmail ***/
        $mail->Sender = 'lor.n.shops@gmail.com';
        $mail->setFrom('lor.n.shops@gmail.com', $subject, false);

        // Ajouter un destinataire
        // Boucle foreach pour chaque user

        $mail->addAddress($address);                          // Le nom est optionnel

        $mail->addReplyTo($address);

        $mail->isHTML(true);                                     // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body = $contentHtml;
        $mail->AltBody = $contentNoHtml;

        $mail->send();
    }

    /***
     * Fonction envoi 'newsletter'
     * Récupère les boutiques ajoutés pendant la semaine
     * Envoi mail contenant les infos des boutiques récupérés
     ***/
    public function getNews()
    {
        /*** Newsletter Manager ***/
        $manager = new \Manager\NewsletterManager();

        /*** Récupération utilisateurs inscrits à la newsletter ***/
        $usersNews = $manager->findAll();

        /*** Récupération des infos utilisateurs ***/
        foreach ($usersNews as $userNews) {
            $firstnameUsersNews = $userNews['firstname'];
            $lastnameUsersNews = $userNews['lastname'];
            $addressUsersNews = $userNews['mail'];
        }

        /*** Date du week end en cours ***/
        $thisWeek = date('Y-m-d');

        /*** Date du week end dernier ***/
        $lastWeek = date('Y-m-d', strtotime('-1 week'));

        /*** Sujet confirmation ***/
        $subjectNews = 'Votre newsletter Lor\'N Shop';

        /*** Récupération boutiques ajoutés pendant la semaine ***/
        $recentShops = $manager->getShopsRecent($thisWeek, $lastWeek);

        /*** Début du contenu HTML ***/
        $StartContentNewsHtml = '
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <title>Newsletter</title>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
                            <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet" type="text/css">
                            
                            <style type="text/css">

                            /* Fonts and Content */
                            body, td { font-family: "Titillium Web", sans-serif; font-size:14px; }
                            body { margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
                            h2{ padding-top:12px; /* ne fonctionnera pas sous Outlook 2007+ */color:#0E7693; font-size:22px; }

                            </style>
                        </head>
                
                        <body style="margin:0px; padding:0px; -webkit-text-size-adjust:none;">

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"  >
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <table  cellpadding="0" cellspacing="0" border="0">
                                                <tbody>                            
                                                    <tr>
                                                        <td class="w640"  width="640" height="10"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w640"  width="640" height="10"></td>
                                                    </tr>


                                                    <!-- entete -->
                                                    <tr class="pagetoplogo">
                                                        <td class="w640"  width="640">
                                                            <table  class="w640"  width="640" cellpadding="0" cellspacing="0" border="0">
                                                                <tbody>
                                                                    <tr style="background: #313A3D;">
                                                                        <td class="w30"  width="30" ></td>
                                                                        <td  class="w580"  width="580" valign="middle" align="left" >
                                                                            <div class="pagetoplogo-content" style="margin: auto;">
                                                                                       

                                                                                        <!-- *** Titre principal *** -->
                                                                                        <a href="http://localhost/MC/meltingcode/public" style="color: #80C2BB; text-decoration: none;">
                                                                                            <h1 style="font-family: "Lobster", cursive;font-size: 45px;color: #80C2BB;line-height: 42px;padding: 15px 0 18px;text-shadow: 1px 1px 1px #FFF;font-weight: 600; text-align: center;">
                                                                                                <strong>Lor\'
                                                                                                    <span style="color: #FFF;transform: rotate(0deg);display: inline-block;">N</span>
                                                                                                    <span> Shop</span>
                                                                                                </strong>
                                                                                            </h1>
                                                                                        </a>

                                                                            

                                                                                
                                                                            </div>
                                                                        </td> 
                                                                        <td class="w30"  width="30"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <!-- separateur horizontal -->
                                                    <tr>
                                                        <td  class="w640"  width="640" height="1" bgcolor="#d7d6d6"></td>
                                                    </tr>

                                                     <!-- contenu -->
                                                    <tr class="content">
                                                        <td class="w640" class="w640"  width="640" bgcolor="#efefef">
                                                            <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td  class="w30"  width="30"></td>
                                                                        <td  class="w580"  width="580">
                                                                            <!-- une zone de contenu -->
                                                                            <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                                                <tbody>                                                            
                                                                                    <tr>
                                                                                        <td class="w580"  width="580">
                                                                                            <h2 style="color:#80C2BB; font-size:22px; padding-top:12px; font-family: "Lobster", cursive;">
                                                                                                Notre région a du talent: </h2>

                                                                                            <div align="left" class="article-content">
                                                                                                <p> Bienvenue en Lorraine! </p>
                                                                                                <p style="text-align: justify;">
                                                                                                    Notre région regorge de personnes talentueuses, de commerçants qui valent le coup d"être connus. Nous vous invitons donc, à travers notre site et notre newsletter, à découvrir l"univers riche de ceux qui rendent notre région plus belle.
                                                                                                </p>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <!-- fin zone -->                                                   

                                                                            <!-- une autre zone de contenu -->
                                                                            <table class="w580"  width="580" cellspacing="0" cellpadding="0" border="0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td colspan="3">
                                                                                           <h2 style="color:#80C2BB; font-size:22px; padding-top:12px; font-family: "Lobster", cursive;">
                                                                                                Découvrez les dernière boutiques: </h2>
                                                                                        </td>
                                                                                    </tr>
                                                                                        
                                                                                    ';
        /***** ------- FIN DU DEBUT DU CONTENU HTML -------- ******/


        /***** ------- ELEMENT DU CONTENU HTML ------------- ******/

        $eltContentNewsConfHtml = '';

        foreach ($recentShops as $shop) {

            /*** Chemin par URL pour l'image de la boutique ***/
            $pathImage = $shop['logo'];

            /*** Ajout de chaque article pour les boutiques de la semaine ***/
            $eltContentNewsHtml .=
                '<tr>
                                                                                                <td class="w275"  width="275" valign="top">

                                                                                                    <div align="left" class="article-content">
                                                                                                    <img style="width: 250px; height:150px; margin-top: 30px;" src="' . $pathImage . '">
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td class="w30"  width="30" class="w30"></td>
                                                                                                <td class="w275"  width="275" valign="top">
                                                                                                    <div align="left" class="article-content">
                                                                                                        
                                                                                                        <h3>' . $shop["name"] . '</h3>
                                                                                                        <p>' . substr($shop['description'], 0, 250) . ' <a href="#" class="link_read_more">Lire la suite ...</a>' .
                '</p>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                                                            </tr>';
        }

        /******* ------------- FIN DU DEBUT DU CONTENU HTML ---------------- ********/
        $endContentNewsHtml =
            '</tbody>
                                                            </table>

                                                                           
                                                                        </td>
                                                                        <td class="w30" class="w30"  width="30"></td> 
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <!--  separateur horizontal de 15px de  haut-->
                                                    <tr>
                                                        <td class="w640"  width="640" height="10" style="background:#80C2BB"></td>
                                                    </tr>

                                                    <!-- pied de page -->
                                                    <tr class="pagebottom" >
                                                        <td class="w640"  width="640">
                                                            <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" style="background: #313A3D;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td colspan="5" height="10"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w30"  width="30"></td>
                                                                        <td class="w580"  width="580" valign="top">
                                                                            <p align="right" class="pagebottom-content-left">
                                                                                <a style="color:#255D5C; text-decoration:none;" href="http://localhost/MC/meltingcode/public/"><span style="color:#255D5C;">copyright &copy; 2016 Lor"N Shop.com</span></a>
                                                                            </p>
                                                                        </td>

                                                                        <td class="w30"  width="30"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="5" height="10"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w640"  width="640" height="60"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>
                    </html>';

        /*** Concaténation de l'ensemble des éléments News Html ***/
        $startContentNewsHtml .= $eltContentNewsHtml;
        $startContentNewsHtml .= $endContentNewsHtml;
        $contentNewsHtml = $startContentNewsHtml;

        /*** Envoi de l'email newsletter à chaque utilisateurs abonnés ***/
        $this->sendMail($addressUsersNews, $firstnameUsersNews, $subjectNews, $contentNewsHtml, $contentNewsHtml);

    }
}