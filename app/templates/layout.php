<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Home</title>

	<!-- *** RESET CSS *** -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<!-- *** STYLE CSS *** -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<!-- *** FONT AWESON CSS *** -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">

	<!-- *** CDN JQUERY *** -->
	<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	<!-- *** JQUERY FLEXSLIDER *** -->
	<script src="<?= $this->assetUrl('js/jquery.flexslider.js') ?>"></script> 
	<!-- *** SCRIPT *** --> 
	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>

</head>
	<body>


	<!-- ****************************
				HIGH NAVIGATION 
		 ****************************-->

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

			<section>
				<?= $this->section('main_content') ?>
			</section>

			<footer>
				<div class="social-container">
				<!-- Réseaux Sociaux -->
					<ul>
						<li><a href="" id="facebook"></a></li>
						<li><a href="" id="twitter"></a></li>
						<li><a href="" id="google"></a></li>
					</ul>
					<div class="clearfix"></div>
				<!-- Copyright -->
				<p>copyright &copy; 2016 Lor'N Shop.com</p>
				
				</div>
				
			</footer>
		</div>
	</body>
</html>