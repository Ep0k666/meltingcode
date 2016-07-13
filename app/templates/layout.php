<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>


	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
	<script src="<?= $this->assetUrl('js/script_shop.js') ?>"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?&callback=initMap"></script>
	<script src="<?= $this->assetUrl('js/map_module.js') ?>"></script>
</head>
<body>
	
			<?= $this->section('main_content') ?>


		<footer>
		</footer>

</body>
</html>