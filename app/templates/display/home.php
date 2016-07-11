<?php $this->layout('layout', ['title' => '']) ?>

<?php $this->start('main_content') ?>


	<!--*************************
			SLIDER BOUTIQUE 
		*************************-->

	<nav id="high_nav">
		<div class="container">

			<!-- *** Titre *** -->
			<h1>
				<strong>Lor'
					<span>N</span>
					<span> Shop</span>
				</strong>
			</h1>

			<!-- *** Search formulaire *** -->
			<form method="POST" action="#">

				<button type="submit" name="search_submit">
					<i class="fa fa-search fa-lg" id="search_icon"></i>
				</button>

				<input type="text" name="search_bar_small" placeholder="Rechercher un produit">
			</form>

			<!-- *** Liens de navigation *** -->
			<ul>
				<li><a href="#">Accueil</a></li>
				<li><a href="#">Boutique</a></li>
				<li><a href="#">Produits</a></li>
				<li><a href="#">Contact</a></li>
			</ul>

			<div class="clearfix"></div>

		</div>
	</nav>

	<div class="container">
		<div class="flexslider">
			<ul class="slides">

				<!-- *** Pour chaque Shop MostViewed *** -->
				<?php foreach($shopsMostViewed as $shopMostViewed) : ?>

					<!-- ** Définition du lien de l'image ** -->
					<?php
					$path = $shopMostViewed['pictures'];
					$img = $this->assetUrl($path);
					?>

					<!-- *** First shop *** -->
					<li class="most_viewed" style="background-image: url('<?= $img ?>')">
					</li>

					<!-- ** Fin foreach ** -->
				<?php endforeach; ?>

			</ul>
		</div>

	</div>
	</header>


	<!-- ****************************
				NEWS BOUTIQUE
		 ****************************-->
	<section id="new_shop">
		<div class="container">

			<h3>Découvrez les dernières boutiques ...</h3>

			<!-- *** Pour chaque Shop Most Recent *** -->
			<?php foreach($shopsMostRecent as $shopMostRecent): ?>

				<article class="shop_discovery">

					<!-- ** Définition du lien pour chaque image ** -->
					<?php
					$path = $shopMostRecent['pictures'];
					$img = $this->assetUrl($path);
					?>

					<img src="<?= $img ?>">

					<h4 class="shop_title"><?= $shopMostRecent['name'] ?></h4>

					<p class="shop_description"><?= $shopMostRecent['description'] ?></p>

				</article>

				<!-- ** Fin foreach ** -->
			<?php endforeach; ?>

			<div class="clearfix"></div>

		</div>
	</section>

	<!-- ****************************
				   ABOUT US 
		 ****************************-->
	<section>
		<div class="container">

			<article id="about_us">

				<h3>La team melting code</h3>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>

				<div id="malika">
					<strong>
						Malika
					</strong>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
					</p>
				</div>

				<div id="julie">
					<strong>
						Julie
					</strong>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
					</p>
				</div>

				<div id="halima">
					<strong>
						Halima
					</strong>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
					</p>
				</div>

				<div id="fra_xa">
					<strong>
						François-Xavier
					</strong>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
					</p>
				</div>

				<div id="steven">
					<strong>
						Steven
					</strong>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
					</p>
				</div>

				<div class="clearfix"></div>

			</article>

		</div>
	</section>

<?php $this->stop('main_content') ?>