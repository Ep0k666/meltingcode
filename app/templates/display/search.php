<?php $this->layout('layout', ['title' => '']) ?>

<?php $this->start('main_content') ?>

<!-- ****************************
			SEARCHED SHOPS
	 ****************************-->

	<section id="new_shop">
		<div class="container">

		<div class="bordure1"></div>
			<h3>Résultat de votre recherche</h3>

			<!-- *** Pour chaque Shop Most Recent *** -->
			<?php foreach($resultShops as $shop): ?>

				<article class="shop_discovery">

					<!-- ** Définition du lien pour chaque image ** -->
					<?php
					$path = $shop['pictures'];
					$img = $this->assetUrl($path);
					?>

					<img src="<?= $img ?>">

					<h4 class="shop_title"><?= $shop['name'] ?></h4>

					<p class="shop_description"><?= $shop['description'] ?></p>

				</article>

				<!-- ** Fin foreach ** -->
			<?php endforeach; ?>

			<div class="clearfix"></div>

		</div>
	</section>



<?php $this->stop('main_content') ?>