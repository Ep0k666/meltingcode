
<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('signup') ?>


<div id="logo">
    <h1><i> Lor'N Shop FRANCE</i></h1>
</div>
<section class="stark-login2">

    <form action="" method="POST">
        <div id="fade-box">
            <label for="connexion">Inscription</label>
            <input type="text" name="username" id="username" placeholder="Identifiant" required>
            <input type="email" name="mail" placeholder="Votre E-Mail" id="" required>
            <input type="password" name="pass1" placeholder="Mot de Passe" required>
            <input type="password" name="pass2" placeholder="Confirmer Mot de Passe" required>
            <br>
            <button type="submit" name="add-user">S'inscrire</button>
            <a href="http://localhost/meltingcode/public/loginPage/signup">Déjà inscrit ?</a>
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






<?php $this->stop('signup') ?>
