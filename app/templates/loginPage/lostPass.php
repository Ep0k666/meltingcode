<?php $this->layout('layout', ['title' => 'Mot de passe Perdu']) ?>

<?php $this->start('main_content') ?>

<div id="lostP">
	
	<form action="#" method="post">
		<label >Votre adresse mail de récupération :</label><br>
	    	
	    <input type="text" name="mail" placeholder="E-mail"><br>
	    <input type="submit" name="reset-pass" value="Réinitialiser le mot de passe">
	</form>

</div>
<?php $this->stop('main_content') ?>