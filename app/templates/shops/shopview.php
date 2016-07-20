<?php $this->layout('layout', ['title' => 'Boutique']) ?>

<?php $this->start('main_content') ?>



<div class="slider-container">
    <div class="slider-control left inactive"></div>
    <div class="slider-control right"></div>
    <ul class="slider-pagi"></ul>
    <div class="slider">
        <div class="slide slide-0 active">
            <div class="slide__bg"></div>
            <div class="slide__content">
                <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                    <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                </svg>
                <div class="slide__text">
                    <h2 class="slide__text-heading">Nom de la boutique</h2>
                    <img class="logo" src="<?= $this->assetUrl("img/logo.png")?>" alt="">
                    <p class="slide__text-desc">Description de la boutique <br>
                        <!-- <?php $id = 4; 
                        var_dump($shopViewDetails);?>
                        <?= $shopViewDetails['description'];
                        ?> --> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
                    <a class="slide__text-link">Project link</a>
                </div>
            </div>
        </div>
        <div class="slide slide-1 ">
            <style>
/*                body .slide:nth-child(1) .slide__bg {
                    background-image: url('<?= $this->assetUrl("img/kami.jpg")?>');
                }*/
                body .slide:nth-child(2) .slide__bg {
                    height: 100%;
                    background-image: url('<?= $this->assetUrl("img/chat.jpg")?>');
                }
                body .slide:nth-child(3) .slide__bg {
                    height: 100%;
                    background-image: url('<?= $this->assetUrl("img/chaton.jpg")?>');
                }
            </style>
            <div class="slide__bg"></div>
            <div class="slide__content">
                <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                    <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                </svg>
                <section>
                    <div class="slide__text">
                        <h2 class="slide__text-heading">Nos produits phare</h2>
                        <p class="slide__text-desc">Nos meilleures ventes <br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
                        <a class="slide__text-link">Découvrez notre site</a>
                    </div>

                    <style>

                    </style>

                    <div class="loadPage shown">
                        url('<?= $this->assetUrl("img/chat.jpg")?>')
                    </div>
                    <div class="elementWrapper">
                        <div class="elementItemWrapper">
                            <div class="elementItem superfarLeft"><img src="<?= $this->assetUrl("img/harnais.jpg")?>" alt=""></div>
                            <div class="elementItem farLeft">
                                <img src="<?= $this->assetUrl("img/jouet.jpg")?>" alt="">
                            </div>
                            <div class="elementItem left">
                                <img src="<?= $this->assetUrl("img/caisse.jpg")?>" alt="">
                            </div>
                            <div class="elementItem active">
                                <img src="<?= $this->assetUrl("img/harnais.jpg")?>" alt="">
                            </div>
                            <div class="elementItem right"><img src="<?= $this->assetUrl("img/arbre.jpg")?>" alt=""></div>
                            <div class="elementItem farRight"><img src="<?= $this->assetUrl("img/shampoing.jpg")?>" alt=""></div>
                            <div class="elementItem superfarRight">
                                <img src="<?= $this->assetUrl("img/sac.jpg")?>" alt=""></div>
                        </div>
                        <div class="elementArrowWrapper">
                            <div class="elementArrow arrowLeft">
                            </div>
                            <div class="elementArrow arrowRight">
                            </div>
                        </div>
                        <div class="elementBackgroundWrapper">
                            <div class="elementBackground backgroundLeft">
                            </div>
                            <div class="elementBackground backgroundRight">
                            </div>
                        </div>
                        <div class="elementContent">
                            <div class="elementContentWrapper left">
                                <h1>Maison Cat</h1>
                                <p>La maison de de toilette en forme de tête de chat à la fois originale et esthétique !.</p>
                            </div>
                            <div class="elementContentWrapper active">
                                <h1>Harnais</h1>
                                <p>Sangle nylon avec motif cousu, entièrement réglable avec clips de fermeture <br>
                                    Coloris selon arrivage</p>

                            </div>
                            <div class="elementContentWrapper right">
                                <h1>Arbre CatDream</h1>
                                <p>L'arbre à chat contient plusieurs endroits de repos, y compris 2 hamacs de 40 cm qui peuvent porter 20 kg. Vous retrouverez une maisonnette pour se cacher en bas, un endroit de repos ouvert plus haut, et une corde et petit ballon pour jouer. C'est à vous de choisir où vous mettez les différents composants.
                                    ﻿</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </section>
        <div class="slide slide-2">
            <style>
                .slide:nth-child(2) .slide__bg {
                    background-image: url('<?= $this->assetUrl("img/kami.jpg")?>');
                }
            </style>
            <div class="slide__bg"></div>
            <div class="slide__content">

                <  !--  mettre ici google map
                <!--   mettre photo devanture ici-->

                <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                    <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                </svg>
                <div class="slide__text">
                    <h2 class="slide__text-heading">Nom de la boutique</h2>
                        
                        <h5>Contact</h5>
                            <h6>Adresse</h6>
                                <p class="slide__text-desc"> 3 rue de l'impasse <br>
                                00000 Nimpville</p>
                            <h6>Téléphone / Fax</h6>
                                <p class="slide__text-desc">03 82 10 20 30 / 03 82 10 20 31</p>
                            <h6>Mail</h6>
                                <p class="slide__text-desc">adressemail@mail.com</p>
                    
                        <nav id="social_network">
                            <h5>Retrouvez-nous sur : </h5>
                            <ul>
                                <li id="facebook">
                                    <div>
                                        <a href="#">
                                            <span class="fontawesome-facebook">
                                            </span>
                                        </a>
                                    </div>
                                </li>                            
                                <li id="twitter">
                                    <div>
                                        <a href="#">
                                         <span class="fontawesome-twitter"></span>
                                        </a>
                                    </div>
                                 </li>

                                <li id="pinterest">
                                    <div>
                                        <a href="#">
                                            <span class="fontawesome-pinterest"></span>
                                        </a>
                                    </div>
                                </li>
                                <li id="google-plus">
                                    <div>
                                        <a href="#">
                                            <span class="fontawesome-google-plus"></span>
                                        </a>
                                    </div>
                                </li>
                                <li id="instagram">
                                    <div>
                                        <a href="#">
                                            <span class="fontawesome-camera">
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                    </nav>
                </div>
                <div id="container_text_two">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2592.8513968238226!2d5.929247315011792!3d49.4684224655143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDnCsDI4JzA2LjMiTiA1wrA1NSc1My4yIkU!5e0!3m2!1sfr!2sfr!4v1468397096496" frameborder="0" style="border:0" allowfullscreen></iframe>
                        
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop('main_content') ?>
