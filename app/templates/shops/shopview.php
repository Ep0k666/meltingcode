
<?php $this->layout('layout', ['title' => 'Boutique']) ?>

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
                        <h2 class="slide__text-heading">Project name 1</h2>
                        <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
                        <a class="slide__text-link">Project link</a>
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
                        <h2 class="slide__text-heading">Project name 3</h2>
                        <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
                        <a class="slide__text-link">Project link</a>
                    </div>
                </div>
            </div>
            <div class="slide slide-3">
                <div class="slide__bg"></div>
                <div class="slide__content">
                    <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                        <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                    </svg>
                    <div class="slide__text">
                        <h2 class="slide__text-heading">Project name 4</h2>
                        <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
                        <a class="slide__text-link">Project link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<?php $this->stop('main_content') ?>