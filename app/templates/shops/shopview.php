<?php $this->layout('layout', ['title' => 'shop-view']) ?>

<?php $this->start('main_content') ?>


<div id="boutik">

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
                        <h2 class="slide__text-heading"><?php echo $shopToView['name'] ?></h2>
                        <p class="slide__text-desc">Description de la boutique <br>
                            <?php echo $shopToView['description'] ?></p>
                    </div>
                </div>
            </div>
            <div class="slide slide-1 ">
                <div class="slide__bg"></div>
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

                        <div class="loadPage shown">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/276996/                        orange-01.svg" />
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
                                    <p>subtitle</p>
                                    <h1>Title</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.                        Summum a vobis bonum voluptas dicitur.</p>
                                </div>
                                <div class="elementContentWrapper active">
                                    <p>subtitle</p>
                                    <h1>Title</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.                        Summum a vobis bonum voluptas dicitur.</p>
                                </div>
                                <div class="elementContentWrapper right">
                                    <p>subtitle</p>
                                    <h1>Title</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.                        Summum a vobis bonum voluptas dicitur.</p>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="slide slide-2">
                <div class="slide__bg"></div>
                <div class="slide__content">
                    <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                        <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                    </svg>
                    <div class="slide__text">
                        <h2 class="slide__text-heading"><?php echo $shopToView['name'] ?></h2>

                        <h5>Contact</h5>
                        <h6>Adresse</h6>
                        <p class="slide__text-desc"> <?php echo $shopToView['number'] . ',' . $shopToView['address'] ?>
                            <br>
                            <?php echo $shopToView['zip_code'] . ' ' . $shopToView['city'] ?></p>
                        <h6>Téléphone / Fax</h6>
                        <p class="slide__text-desc"><?php echo $shopToView['tel'] ?>
                            / <?php echo $shopToView['fax'] ?></p>
                        <h6>Mail</h6>
                        <p class="slide__text-desc"><?php echo $shopToView['mail'] ?></p>

                        <nav id="social_links">
                            <h5>Retrouvez-nous sur : </h5>
                            <ul>
                                <li id="facebook">
                                    <div>
                                        <a href="<?php echo $shopToView['facebook'] ?>">
                                            <span class="fontawesome-facebook">
                                            </span>
                                        </a>
                                    </div>
                                </li>
                                <li id="twitter">
                                    <div>
                                        <a href="<?php echo $shopToView['twitter'] ?>">
                                            <span class="fontawesome-twitter"></span>
                                        </a>
                                    </div>
                                </li>

                                <li id="pinterest">
                                    <div>
                                        <a href="<?php echo $shopToView['pinterest'] ?>">
                                            <span class="fontawesome-pinterest"></span>
                                        </a>
                                    </div>
                                </li>
                                <li id="google-plus">
                                    <div>
                                        <a href="<?php echo $shopToView['google'] ?>">
                                            <span class="fontawesome-google-plus"></span>
                                        </a>
                                    </div>
                                </li>
                                <li id="instagram">
                                    <div>
                                        <a href="<?php echo $shopToView['instagram'] ?>">
                                            <span class="fontawesome-camera">
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="container_text_two">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2592.8513968238226!2d5.929247315011792!3d49.4684224655143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDnCsDI4JzA2LjMiTiA1wrA1NSc1My4yIkU!5e0!3m2!1sfr!2sfr!4v1468397096496"
                            frameborder="0" style="border:0" allowfullscreen></iframe>

                    </div>
                    <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<?php $this->stop('main_content') ?>