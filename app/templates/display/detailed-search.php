<?php $this->layout('layout', ['title' => 'detailed-search']) ?>

<?php $this->start('main_content') ?>

<!-- ****************************
			SEARCH BOX
	 ****************************-->

	<section id="search_box">
	 	<article id="detailed_search">

		 	<!-- *** Principal title *** -->
		 	<h2>Recherche détaillée</h2>

	 		<form method="POST" action="">

	 			<!-- *** MOTS-CLÉS *** -->
	 			<label for="tag_detailed">Mots-clés</label>
	 			<input type="text" id="tag_detailed" name="tag_detailed" placeholder="Exemple : nom boutique, ville, secteur d'activité etc... "><br />

	 				<h3>Activités</h3>

	 				<h3>Secteur</h3>

	 				<div id="container_activity_check">

		 				<?php foreach($activities as $activity) : ?>

		 				<div class="activity_at_check">

			 				<label for="<?= $activity['category'] ?>"><?= $activity['category'] ?></label>

			 				<input type="checkbox" id="<?= $activity['category'] ?>" name="<?= $activity['name_id'] ?>" value="<?= $activity['id_catshops'] ?>">

			 			</div>

		 				<?php endforeach; ?>

		 				<div class="clearfix"></div>

		 			</div>

		 			<div id="container_sector_shop">

		 				<!-- *************
		 						  54
		 					 ************* -->

		 				<div class="sector_at_check">
			 				<label for="meurthe">Meurthe-et-Moselle</label>
			 				<input type="checkbox" name="meurthe" value="54" id="meurthe">
			 			</div>

		 				<!-- *************
		 						  57
		 					 ************* -->

		 				<div class="sector_at_check">
			 				<label for="moselle">Moselle</label>
			 				<input type="checkbox" name="moselle" value="57" id="moselle">
			 			</div>

		 				<!-- *************
		 						  55
		 					 ************* -->

		 				<div class="sector_at_check">
			 				<label for="meuse">Meuse</label>
			 				<input type="checkbox" name="meuse" value="55" id="meuse">
			 			</div>

		 				<!-- *************
		 						  88
		 					 ************* -->

		 				<div class="sector_at_check">
			 				<label for="vosges">Vosges</label>
			 				<input type="checkbox" name="vosges" value="88" id="vosges">
			 			</div>

		 			</div>

		 			<div class="clearfix"></div>


		 		   <!-- *************
		 					SUBMIT
		 				************* -->

		 			<button type="submit" name="search_detailed">Rechercher</button>

	 		</form>	

	 	</article>
	</section>


<?php $this->stop('main_content') ?>