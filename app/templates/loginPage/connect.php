<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<div id="logo">
    <h1><i> Lor'N Shop FRANCE</i></h1>
</div>
<section class="stark-login">

    <form action="#" method="POST">
        <div id="fade-box">
            <label for="connexion">Connexion</label>
            <input type="email" name="email" placeholder="Identifiant" >
            <input type="password" name="password" placeholder="Mot de Passe" >
            <button type="submit" name="connect" value="submit">Connexion</button>
            <a href="<?= $this->url("login")?>">Pas encore de compte ?</a>
        </div>
    </form>

</section>

<div id="circle1">
    <div id="inner-cirlce1">
        <h2> </h2>
    </div>
</div>

<canvas></canvas>


<ul>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>



<?php $this->stop('main_content') ?>
