<?php $this->layout('layout', ['title' => 'search']) ?>

<?php $this->start('main_content') ?>


<!-- ****************************
			SEARCHED SHOPS
	 ****************************-->

	<section id="search_shop">
		<div class="container">

		<div class="bordure1"></div>
			<h3>Résultat de recherche pour : <?= $tagSearch ?></h3>

			<!-- *** Pour chaque Shop Most Recent *** -->
			<?php foreach($resultShops as $shop): ?>

				<article class="shop_discovery">

					<!-- ** Définition du lien pour chaque image ** -->
					<?php
					$path = $shop['pictshop1'];
					$img = $this->assetUrl('uploads/'.$path);
					?>

					<img src="<?= $img ?>">

					<h4 class="shop_title"><?= $shop['name'] ?></h4>

					<p class="shop_description"><?= substr($shop['description'], 0, 250)." [...]"; ?></p>

				</article>

				<!-- ** Fin foreach ** -->
			<?php endforeach; ?>

			<div class="clearfix"></div>

		</div>
	</section>



<?php $this->stop('main_content') ?>