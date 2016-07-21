<?php $this->layout('layout', ['title' => 'Account Management']) ?>

<?php $this->start('main_content') ?>

<div id="account">
    <div class="container">

        <form action="#" method="POST">
            <div id="fade-box">
                <label for="connexion">Vos donnàes</label>
                <input type="text" name="login" placeholder="Identifiant" required>
                <input type="text" name="company" id="company" placeholder="Compagnie" required>
                <input type="text" name="firstname" id="firstname" placeholder="Prénom" required >
                <input type="text" name="lastname" id="lastname" placeholder="Nom de famille" required >
                <input type="email" name="mail" placeholder="Votre E-Mail" id="" required>
                <input type="password" name="pass1" placeholder="Mot de Passe" required>
                <br>
                <button type="submit" name="add-user" value="add-user">S'inscrire</button>
                <!--<a href="<?/*= $this->url("connexion")*/?>">Déjà Inscrit ? ?</a>-->
                <a href="<?= $this->url("edit_account")?>">Modifier vos données</a>
                <a href="<?= $this->url("home")?>">Revenir à l'acceuil</a>
            </div>
        </form>


    </div>
</div>



<?php $this->stop('main_content') ?>
