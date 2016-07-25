<?php $this->layout('layout', ['title' => 'admin-home']) ?>

<?php $this->start('main_content') ?>


<div id="admin-home">
	
	<section>
		<div class="container">

			<h2>Bienvenue dans l’aventure!</h2>
			<h3>Pas encore de boutique ?</h3>

			<a href="<?= $this->url('add-shop')  ?>" type="submit" name>Ajouter</a>
			<div class="clearfix"></div>
			<hr>
		</div>
	</section>

	<section>
		<div class="container">

			<h3>Gérer vos boutiques:</h3>

			<article>

				<div class="img-admin-shop">
					<div id="image-shop"></div>
				</div>

				<div class="link-admin-shop">
					<a href="<?= $this->url('add-shop')  ?>" type="submit" name>Modifier</a>

					<a href="<?= $this->url('add-shop')  ?>" type="submit" name>Supprimer</a>
				</div>

				<div class="clearfix"></div>

			</article>
		</div>
	</section>

</div>



<?php $this->stop('main_content') ?>