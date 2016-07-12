
<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>


<div id="logo">
    <h1><i> Lor'N Shop FRANCE</i></h1>
</div>
<section class="stark-login2">

    <form action="#" method="POST">
        <div id="fade-box">
            <label for="connexion">Inscription</label>
            <input type="text" name="username" id="username" placeholder="Identifiant" required>
            <input type="text" name="company" id="company" placeholder="Compagnie" required>
            <input type="text" name="firstname" id="firstname" placeholder="Prénom" required >
            <input type="text" name="lastname" id="lastname" placeholder="Nom de famille" required >
            <input type="email" name="mail" placeholder="Votre E-Mail" id="" required>
            <input type="password" name="pass1" placeholder="Mot de Passe" required>
            <br>
            <button type="submit" name="add-user" value="add-user">S'inscrire</button>
            <a href="<?= $this->url("connect")?>">Déjà Inscrit ? ?</a>
        </div>
    </form>
    <canvas></canvas>
</section>

<div id="circle2">
    <div id="inner-cirlce2">
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
