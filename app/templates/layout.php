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

    <!-- *** LAYOUT CSS *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/layout-style.css') ?>">

    <!-- *** STYLE CSS HOME *** -->
    <?php if($title == 'home'):?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/home-style.css') ?>">
    <?php endif; ?>

    <!-- *** STYLE CSS ACTIVITY *** -->
    <?php if($title == 'activity') : ?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/activity-style.css') ?>">
    <?php endif; ?>

    <!-- *** STYLE CSS NEWSLETTER*** -->
    <?php if($title == 'newsletter') : ?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/news-style.css') ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

    <!-- *** STYLE CSS SEARCH *** -->
    <?php if($title == 'search') :?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/search-style.css') ?>">
    <?php endif; ?>

    <!-- *** STYLE CSS CONTACT *** -->
    <?php if($title == 'contact') :?>
        <link rel="stylesheet" href="<?= $this->assetUrl('css/contact-style.css') ?>">
    <?php endif; ?>
    <!-- *** FONT AWESOME CDN *** -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <!-- *** CSS Page Login/Connect *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/loginstyle.css') ?>">
    <!-- *** CSS Page Login/Connect *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/shopviewstyle.css') ?>">
    <!-- *** CSS Page Login/Connect *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/shopstyles.css') ?>">

    <!-- *** CDN JQUERY *** -->
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <!-- *** JQUERY FLEXSLIDER *** -->
    <script src="<?= $this->assetUrl('js/jquery.flexslider.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/home-script.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/scriptconnect.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/script.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/shopscript.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/script_shop.js') ?>"></script>
</head>
<body>
<!-- ****************************
        LOW NAVIGATION
 ****************************-->

<header>
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
                <li><a href="contact">Contact</a></li>
                <?php if ($w_user) :?>

                    <li><a href="<?= $this->url('id', ['id'=>$w_user['id'] ]) ?>"><?= $w_user['firstname']." ".$w_user['lastname'] ?></a></li>
                    <li><a href="<?= $this->url('add-shop') ?>">Administration Boutiques</a></li>
                    <li><a href="<?= $this->url('logoff') ?>">Logout</a></li>

                    <!-- sinon on affiche les liens de connexions et d'inscription -->
                <?php else :?>
                    <li><a href='<?= $this->url('connexion') ?>' id="connexion">Connexion</a></li>
                    <li><a href='<?= $this->url('login') ?>' id="suscribe">Inscription</a></li>
                <?php endif ?>
            </ul>

            <hr />

            <!-- *** Search formulaire *** -->
            <form method="POST" action="search">

                <button type="submit" name="search_submit">
                    <i class="fa fa-search fa-lg" id="search_icon"></i>
                </button>

                <input type="text" name="search_bar" placeholder="Recherche">
            </form>

            <div class="clearfix"></div>


    </nav>
</header>
<main>
    <section>

        <?= $this->section('main_content') ?>

        <!-- *** LINK NEWSLETTER *** -->
        <?php if($title == 'home' || $title == 'contact') :?>
            <a href="<?= $this->url('newsletter') ?>" id="newsletter_link">Souscrivez à la newsletter</a>
        <?php endif; ?>

    </section>

</main>
<footer>

    <div class="social">&#62220;</div>
    <div class="social">&#62217;</div>
    <div class="social">&#62223;</div>
    <div class="social">&#62232;</div>
    <div class="social">&#62235;</div>
    <div class="social">&#62226;</div>
    <div class="social">&#62214;</div>

    <!-- *** Copyright *** -->
    <p>copyright &copy; 2016 Lor'N Shop.com</p>


</footer>
</div>
</body>
</html>