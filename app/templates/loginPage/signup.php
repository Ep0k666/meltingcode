<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('connect') ?>


<div id="logo">
    <h1><i> Lor'N Shop FRANCE</i></h1>
</div>
<section class="stark-login">

    <form action="#" method="POST">
        <div id="fade-box">
            <label for="connexion">Connexion</label>
            <input type="text" name="username" id="username" placeholder="Identifiant" required>
            <input type="password" placeholder="Mot de Passe" required>
            <br>
            <button>Connexion</button>
            <a href="http://localhost/meltingnew/meltingcode/public/loginPage/connect">Pas encore de compte ?</a>

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






<?php $this->stop('connect') ?>
