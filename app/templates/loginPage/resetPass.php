<?php $this->layout('layout', ['title' => 'Reset de mot de passe']) ?>

<?php $this->start('main_content') ?>

<div id="lostP">
	

	<?php if (isset($passUpdated)) : ?>
	    Le mot de passe a été modifié<br>
	    <a href="<?= $this->url("home")?>">Revenir à l'acceuil</a>
	<?php else : ?>
	    <form action="#" method="post">
	    	<label for="">Nouveau mot de passe</label><br>
	    	 <input type="password" name="new_pass" placeholder="Nouveau mot de passe"><br>
	        <input type="submit" name="change_password" value="Modifier le mot de passe">
	    </form>
	<?php endif ?>

</div>
<?php $this->stop('main_content') ?>