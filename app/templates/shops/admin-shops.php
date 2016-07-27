<?php $this->layout('layout', ['title' => 'admin-shop'])?>

<?php $this->start('main_content') ?>


<div id="admin-home">
	
	<section>
		<div class="container">

			<h2>Bienvenue dans l’aventure!</h2>
			<h3>Pas encore de boutique ?</h3>

			<!-- Lien de redirection vers l'ajout de boutique lors du clic -->
			<a href="<?= $this->url('add-shop')  ?>">Ajouter</a>
			<div class="clearfix"></div>

			<!-- Si il n'y a pas de boutiques, ne pas mettre la bordure de séparation -->
			<?php if(count($shopToAdmin) > 1) : ?>
				<hr>
			<?php endif; ?>

		</div>
	</section>

	<section>
		<div class="container">

			<!-- Permet de récupérer toutes les boutiques créées par le user et de toutes les afficher -->
			<?php foreach ($shopToAdmin as $key):?>
				<article>
				<h3>Votre boutique: <?=$key['name']?></h3>
					<div class="img-admin-shop">
						<?php
							$path=$key['pictshop1'];
							$img=$this->assetUrl('uploads/' . $path);
						?>
						<div id="image-shop" style="background-image: url('<?= $img ?>');"> </div>
					</div>

					<!-- Pour la modification et la suppression de boutique -->
					<div class="link-admin-shop">
						<a href="<?= $this->url('edit-shop',['id'=>$key['id']]) ?>">Modifier</a>
						<a href="<?= $this->url('delete-shop',['id'=>$key['id']])  ?>">Supprimer</a>
					</div>
	 
					<div class="clearfix"></div>


				<hr>

				</article>	
			<?php endforeach?>	
			
		</div>
	</section>

</div>

<?php $this->stop('main_content') ?>
