<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<!-- CDN -->
	<!-- <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script> --> 

	<!-- LOCAL -->
	<script src="js/jquery-2.2.3.min.js"></script> 
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- SCRIPT PERSO EN DERNIER -->
	<script src="js/script.js" type="text/javascript" charset="utf-8" defer></script>
</head>
<body>
	<div class="container">
		<nav>
			<div class="container">
				<h1>Lor'N SHOP</h1>
				<input type="text" name="search" placeholder="Recherche ...">
				<ul>
					<li><a href="#">Accueil</a></li>
					<li><a href="#">Boutique</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<!-- FR/EN -->
				<div class="clearfix"></div>
			</div>
		</nav>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>