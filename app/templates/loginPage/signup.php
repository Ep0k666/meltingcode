
<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<div class="containerconnect">

<section class="stark-login2">

    <form action="#" method="POST">
        <div id="fade-box">
            <label for="connexion">Inscription</label>
            <input type="text" name="login" placeholder="Identifiant" required>
            <input type="text" name="company" id="company" placeholder="Compagnie" required>
            <input type="text" name="firstname" id="firstname" placeholder="Prénom" required >
            <input type="text" name="lastname" id="lastname" placeholder="Nom de famille" required >
            <input type="email" name="mail" placeholder="Votre E-Mail" id="" required>
            <input type="password" name="pass1" placeholder="Mot de Passe" required>
            <br>
            <button type="submit" name="add-user" value="add-user">S'inscrire</button>
            <!--<a href="<?/*= $this->url("connexion")*/?>">Déjà Inscrit ? ?</a>
            <a href="<?/*= $this->url("home")*/?>">Revenir à l'acceuil</a>-->
        </div>
    </form>

</section>
    

<div id="circle2">
    <div id="inner-cirlce2">
        <h2> </h2>
    </div>
</div>

<canvas></canvas>


</div>
<?php $this->stop('main_content') ?>
