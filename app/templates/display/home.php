<?php $this->layout('layout', ['title' => '']) ?>

<?php $this->start('main_content') ?>


	<!--*************************
			SLIDER BOUTIQUE 
		*************************-->
	<header>
		<div class="container">
			<ul>
				<li class="active"><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
			</ul>
			<div class="flexslider">
				<ul class="slides">

					<!-- *** First shop *** -->
					<li id="bonbon_fury">
					</li>

					<!-- *** Second shop *** -->
					<li id="fight_club">
					</li>

					<!-- *** Third shop *** -->
					<li id="sport_nutrition">
					</li>

				</ul>
			</div>

		</div>
	</header>


	<!-- ****************************
				NEWS BOUTIQUE 
		 ****************************-->

		<section id="new_shop">
			<div class="container">

				<h3>Découvrez les dernières boutiques</h3>

				<!-- *** Infos des boutiques récentes *** -->
				<?php foreach($shops as $shop): ?>

					<article class="shop_discovery">

					<?php 
					$path = $shop['pictures'];
					$img = '$this->assetUrl(' . $path . ')';
					?>

						<img href="<?= $img ?>">

						<h4 class="shop_title"><?= $shop['name'] ?></h4>

						<p class="shop_description"><?= $shop['description'] ?></p>

					</article>
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