<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

<form action="#" method="post">
    <input type="text" name="mail" placeholder="E-mail">
    <input type="submit" name="reset-pass" value="Réinitialiser le mot de passe">
</form>
<?php $this->stop('main_content') ?>