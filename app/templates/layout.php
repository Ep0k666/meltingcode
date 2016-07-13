<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- *** RESET CSS *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
    <!-- *** STYLE CSS *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
    <!-- *** FONT AWESON CSS *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">
    <!-- *** CSS Page Login/Connect *** -->
    <link rel="stylesheet" href="<?= $this->assetUrl('css/loginstyle.css') ?>">



    <!-- *** CDN JQUERY *** -->
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="<?= $this->assetUrl('js/jquery.js')?>"></script>
    <!-- *** JQUERY FLEXSLIDER *** -->
    <script src="<?= $this->assetUrl('js/jquery.flexslider.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/script.js') ?>"></script>
    <!-- *** SCRIPT *** -->
    <script src="<?= $this->assetUrl('js/scriptconnect.js') ?>"></script>

</head>
<body>


<!-- ****************************
            LOW NAVIGATION
     ****************************-->

<header>

    <nav id="low_nav">
        <div class="container">
            <ul>
                <?php if ($w_user) :?>

                    <li><a href="<?= $this->url('id', ['id'=>$w_user['id'] ]) ?>"><?= $w_user['firstname']." ".$w_user['lastname'] ?></a></li>
                    <li><a href="<?= $this->url('logoff') ?>">Logout</a></li>

                    <!-- sinon on affiche les liens de connexions et d'inscription -->
                <?php else :?>
                    <li><a href='<?= $this->url('connexion') ?>' id="connexion">Connexion</a></li>
                    <li><a href='<?= $this->url('login') ?>' id="suscribe">Inscription</a></li>
                <?php endif ?>
            </ul>
            <div class="clearfix"></div>

        </div>
    </nav>

    <section>
        <?= $this->section('main_content') ?>

    </section>

    <footer>

    </footer>

</body>
</html>