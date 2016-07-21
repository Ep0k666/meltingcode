<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<section class="stark-login">

    <div class="containerconnect">
        <form action="#" method="POST">
            <div id="fade-box">
                <label for="connexion">Connexion</label>
                <!--<div class="g-signin2" data-onsuccess="onSignIn" ></div>
                <a class="g-signout" href="#" onclick="signOut();">Sign out</a>
                <script>
                    function signOut() {
                        var auth2 = gapi.auth2.getAuthInstance();
                        auth2.signOut().then(function () {
                            console.log('User signed out.');
                        });
                    }
                </script>-->
                <input type="email" name="email" placeholder="Identifiant" >
                <?php if(isset($errors['email']['empty'])) : ?>
                    <p class="error">l'adresse mail doit être spécifié</p>
                <?php endif ?>
                <input type="password" name="password" placeholder="Mot de Passe" >
                <?php if(isset($errors['password']['empty'])) : ?>
                    <p class="error">le mot de passe est faux doit être spécifié</p>
                <?php endif ?>
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


</div>
<?php $this->stop('main_content') ?>
