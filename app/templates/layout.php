<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $this->e($title) ?></title>

	<link href= "https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/styles.css') ?>">
 	<!-- *** CDN JQUERY *** -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<!-- *** SCRIPT *** --> 
	<script src="<?= $this->assetUrl('js/script.js') ?>"></script>

</head>
<body>
	<div class="container">
		<header>
			 
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>