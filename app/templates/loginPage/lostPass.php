<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
<?php
if ($displayMessage) :
    if ($mailExists) {
        echo 'Un lien pour réinitialiser votre mot de passe vous a été envoyé par mail.';
    } else {
        echo 'Ce mail ne correspond à aucun utilisateur enregistré.';
    }
endif;
?>
<form action="#" method="post">
    <input type="text" name="mail" placeholder="E-mail">
    <input type="submit" name="reset-pass" value="Réinitialiser le mot de passe">
</form>
<?php $this->stop('main_content') ?>