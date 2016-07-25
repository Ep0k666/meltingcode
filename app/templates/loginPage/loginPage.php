<?php $this->layout('layout', ['title' => 'Account Management']) ?>

<?php $this->start('main_content') ?>

<div id="account">
    <div class="container">
        <fieldset>
            <form action="#" method="POST">

                <h1>VOS DO<span>N</span><span>N</span>EES</h1><br>

                <label for="login">Votre Identifiant : </label>
                <input type="text" name="login" placeholder="Identifiant" required><br>

                <label for="login">Le nom de votre Compangie : </label>
                <input type="text" name="company" id="company" placeholder="Compagnie" required><br>

                <label for="login">Votre Nom de famille : </label>
                <input type="text" name="firstname" id="firstname" placeholder="Prénom" required ><br>

                <label for="login">Votre prénom : </label>
                <input type="text" name="lastname" id="lastname" placeholder="Nom de famille" required ><br>

                <label for="login">Votre E-Mail : </label>
                <input type="email" name="mail" placeholder="Votre E-Mail" id="" required><br>

                <label for="login">Votre Mot de Passe : </label>
                <input type="password" name="pass" placeholder="Mot de Passe" required><br>
                <br>
                <button type="submit" name="edit-user" value="edit-user">Modifier vos données</button><br>
                <a href="<?= $this->url("home")?>">--> Revenir à l'acceuil</a><br>
                <a href="<?= $this->url("add-shop")?>">--> Vers l'administration de votre boutique</a>
            </form>

        </fieldset>

    </div>
</div>



<?php $this->stop('main_content') ?>
