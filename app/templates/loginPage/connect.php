<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<?php if(isset($_SESSION['user'])) echo 'Connecté en tant que ' . $_SESSION['user']['login'] ?>

<?php if(isset($errorEmptyFields)) : ?>
    Merci de renseigner un login et un mot de passe
<?php elseif(isset($errorLogin)) : ?>
Connexion impossible. Erreur d'identifiant !


<div id="logo">
    <h1><i> Lor'N Shop FRANCE</i></h1>
</div>
<section class="stark-login">

    <form action="#" method="POST">
        <div id="fade-box">
            <label for="connexion">Connexion</label>
            <input type="email" name="mail" placeholder="Votre E-Mail" >
            <input type="password" name="pass" placeholder="Mot de Passe" >
            <button type="submit" name="login-button" value="login">Connexion</button>
            <a href="<?= $this->url("login")?>">Pas encore de compte ?</a>
        </div>
    </form>
    <canvas></canvas>
</section>

<div id="circle1">
    <div id="inner-cirlce1">
        <h2> </h2>
    </div>
</div>



<ul>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>



<?php $this->stop('main_content') ?>
