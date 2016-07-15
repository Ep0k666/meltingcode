<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<section class="stark-login">

    <div class="containerconnect">
        <form action="#" method="POST">
            <div id="fade-box">
                <label for="connexion">Connexion</label>
                <input type="email" name="email" placeholder="Identifiant" >
                <input type="password" name="password" placeholder="Mot de Passe" >
                <button type="submit" name="connect" value="submit">Connexion</button>
               <!-- <a href="<?/*= $this->url("login")*/?>">Pas encore de compte ?</a>
                <a href="<?/*= $this->url("home")*/?>">Revenir à l'acceuil</a>-->
            </div>
        </form>

</section>

<div id="circle1">
    <div id="inner-cirlce1">
        <h2> </h2>
    </div>
</div>

<canvas></canvas>

</div>
<?php $this->stop('main_content') ?>
