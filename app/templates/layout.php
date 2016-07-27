<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lor'N Shop | Achetez plus proche</title>

    <title>Home</title>

    <!-- *** RESET CSS *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
    <!-- *** FLEXSLIDER CSS *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/flexslider.css') ?>">

    <!-- *******************************************
                            DISPLAY STYLE   
             *******************************************-->


        <!-- *** LAYOUT CSS *** -->
        <link rel="stylesheet" href="<?= $this->assetUrl('css/layout-style.css') ?>">

        <!-- *** STYLE CSS HOME *** -->
        <?php if($title == 'home'):?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/home-style.css') ?>">
        <?php endif; ?>

        <!-- *** STYLE CSS NEWSLETTER*** -->
        <?php if($title == 'newsletter') : ?>
            <link rel="stylesheet" href="<?= $this->assetUrl('css/news-style.css') ?>">
        <?php endif; ?>

        <!-- *** STYLE CSS CONTACT *** -->
        <?php if($title == 'contact') :?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/contact-style.css') ?>">
        <?php endif; ?>

        <!-- *** STYLE CSS A PROPOS *** -->
        <?php if($title == 'a-propos') :?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/a-propos-style.css') ?>">
        <?php endif; ?>

    
 <!-- *******************************************
                            SEARCH STYLE
             *******************************************-->


        <!-- *** STYLE CSS SEARCH *** -->
        <?php if($title == 'search') :?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/search-style.css') ?>">
        <?php endif; ?>

        <!-- *** STYLE CSS DETAILED SEARCH *** -->
        <?php if($title == 'detailed-search') :?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/detailed-search-style.css') ?>">
        <?php endif; ?>

        <!-- *** STYLE CSS ACTIVITY *** -->
        <?php if($title == 'activity') : ?>
            <link rel="stylesheet" href="<?= $this->assetUrl('css/activity-style.css') ?>">
        <?php endif; ?>



    <!-- *** FONT AWESOME CDN *** -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

     <!-- *******************************************
                            LOGIN STYLE
             *******************************************-->
    <!-- *** CSS Page Login/Connect *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/loginstyle.css') ?>">
    <?php if ($title == 'login'): ?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/account-user.css') ?>">
    <?php endif; ?>
    
    <!-- *** STYLE CSS BACK SHOP *** -->
    <!-- *** CSS Page AdminShops *** -->
   <!--  <link rel="stylesheet" href="<?= $this->assetUrl('css/admin-shops.css') ?>"> -->
    <!-- *** CSS Page Add/Edit/Delete Shop *** -->
    <!-- <link rel="stylesheet" href="<?= $this->assetUrl('css/shopstyles.css') ?>"> -->
    <!-- *** CSS Page View Shop *** -->
    <!-- <link rel="stylesheet" href="<?= $this->assetUrl('css/shopviewstyle.css') ?>"> -->

   <!-- *******************************************
                        SHOP STYLE
         *******************************************-->

    <!-- *** STYLE CSS ADMIN HOME *** -->
    <?php if ($title == 'admin-shop') : ?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/admin-shops.css') ?>">
    <?php endif; ?>

    <!-- *** STYLE CSS ADD SHOP *** -->
    <?php if ($title == 'add-shop') : ?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/shopstyles.css') ?>">
    <?php endif; ?>

    <!-- *** STYLE CSS EDIT SHOP *** -->
    <?php if ($title == 'edit-shop') : ?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/shopstyles.css') ?>">
    <?php endif; ?>

    <!-- *** STYLE CSS SHOP VIEW *** -->
    <?php if ($title == 'shop-view') : ?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/shopviewstyle.css') ?>">
    <?php endif; ?>


    <!-- *** CDN JQUERY *** -->
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <!-- *** JQUERY FLEXSLIDER *** -->
    <script src="<?= $this->assetUrl('js/jquery.flexslider.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/home-script.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/scriptconnect.js') ?>"></script>
    <!-- *** SCRIPT affichage datepicker et ajax api google maps *** -->
    <script src="<?= $this->assetUrl('js/script.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/shopscript.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/script_shop.js') ?>"></script>

    <!-- pour autocomplet places dans addShop -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
</head>
<body>
<!-- ****************************
        LOW NAVIGATION
 ****************************-->

<header>

<!-- cela me permet d'afficher une alerte une fois le formulaire validé -->
<?php if(isset($_SESSION['flash'])) {
    echo '<dialog open>' . $_SESSION['flash'] . '</dialog>';
    unset($_SESSION['flash']);
} ?>

    <nav id="high_nav">
        <div class="container">

            <!-- *** Titre principal *** -->
            <a href="<?= $this->url('home') ?>">
                <h1>
                    <strong>Lor'
                        <span>N</span>
                        <span> Shop</span>
                    </strong>
                </h1>
            </a>

            <!-- *** Liens de navigation *** -->
            <ul>
                <li><a href="<?= $this->url('home') ?>">Accueil</a></li>
                <li><a href="<?= $this->url('contact') ?>">Contact</a></li>
                <?php if ($w_user) :?>

                    <li><a href="<?= $this->url('account', ['id'=>$w_user['id'] ]) ?>"><!-- <?= $w_user['firstname']." ".$w_user['lastname'] ?>  --> Compte</a></li>
                    <li><a href="<?= $this->url('admin-shop',['id'=>$w_user['id']]) ?>">Boutiques</a></li>
                    <li><a href="<?= $this->url('logoff') ?>">Logout</a></li>

                    <!-- sinon on affiche les liens de connexions et d'inscription -->
                <?php else :?>
                    <li><a href='<?= $this->url('connexion') ?>' id="connexion">Connexion</a></li>
                    <li><a href='<?= $this->url('login') ?>' id="suscribe">Inscription</a></li>
                <?php endif ?>
            </ul>

            <hr />

            <!-- *** Search formulaire *** -->
            <form method="POST" action="<?= $this->url('search') ?>">

                <button type="submit" name="search_submit">
                    <i class="fa fa-search fa-lg" id="search_icon"></i>
                </button>

                <input type="text" name="search_bar" placeholder="Recherche">
            </form>

            <div id="open_search">

                    <p>Recherche</p>

                </div>

                <div id="close_search">

                    <p>Fermer</p>

                </div>
                
            <div class="clearfix"></div>


    </nav>
</header>
<main>
    <section>

        <?= $this->section('main_content') ?>

        <!-- *** LINK NEWSLETTER *** -->
        <?php if($title == 'home' || $title == 'contact' || $title == 'a-propos') :?>
            <a href="<?= $this->url('newsletter') ?>" id="newsletter_link">Souscrivez à la newsletter</a>
        <?php endif; ?>

    </section>

</main>
<footer>

    <div class="social" ><a href="https://www.facebook.com/LorN-Shop-1221309817903801/?fref=ts">&#62220;</a></div>
    <div class="social">&#62217;</div>
    <div class="social">&#62223;</div>
    <div class="social">&#62232;</div>
    <div class="social">&#62235;</div>
    <div class="social">&#62226;</div>
    <div class="social">&#62214;</div>

    <!-- *** Copyright *** -->
   <p>copyright &copy; 2016 Lor'N Shop.com <a href="<?= $this->url('a-propos') ?>">A propos</a></p>


</footer>
</div>
</body>
</html>