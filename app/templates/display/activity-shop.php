<?php $this->layout('layout', ['title' => 'activity']) ?>

<?php $this->start('main_content') ?>

<!--*************************
		  LOW NAVIGATION 
	*************************-->

	<div id="home">
		<nav id="low_nav_desktop">
			<div class="container">

			<!-- *** Liste de liens "catégorie" *** -->
				<ul>
					<?php foreach($activities as $activity) : ?>

						<li>
							<a href="<?= $this->url('activity', ['id' => $activity['id_catshops']])?>">
							<?= $activity['category'] ?>
							</a>
						</li>

					<?php endforeach; ?>
				</ul>

				<div class="clearfix"></div>

			</div>
		</nav>

		<!-- *** Mobile Navigation *** -->
		<nav id="low_nav_mobile">

				<i class="fa fa-bars fa-1x" id="hamburger" aria-hidden="true">
						<span>Catégorie</span>
					</i>

				<span id="close_menu">
					<i class="fa fa-times" id="cross" aria-hidden="true"></i> Catégorie
				</span>

				<ul>

					<?php
						$nbCategory = 0;
					?>

					<?php foreach($activities as $activity) : ?>

						<li>
							<a href="<?= $this->url('activity', ['id' => $activity['id_catshops']])?>">
							<?= $activity['category'] ?>
							</a>
						</li>

						<?php ++$nbCategory ?>

					<?php endforeach; ?>

				</ul>

				<div class="clearfix"></div>

		</nav>


<!-- ****************************
			SEARCHED SHOPS
	 ****************************-->

	<section id="activity_shop">
		<div class="container">

		<div class="bordure1"></div>
		
			<h3><?= $categorySearch['category'] ?></h3>

			<!-- *** Pour chaque Shop Most Recent *** -->
			<?php foreach($shopByActivity as $shop): ?>

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