<?php $this->layout('layout', ['title' => 'newsletter']) ?>

<?php $this->start('main_content') ?>

<section id="hire">
	<article id="newsletter">

			<h1>Newsletter</h1>
    
    	<!-- Afficher le formulaire si les infos n'existent pas en base de donnée -->
    	<?php if(isset($infoInserted) === false) : ?>
	    <form method="POST" action="">
		      <div class="field lastname-box">

		      		<!-- **** LASTNAME **** -->
			        <input type="text" id="lastname" name="lastname" placeholder="Votre nom ..."/>

			        <!--**************
			        		ERRORS 
			        	**************-->

			        <!-- **** Too Short **** -->
			        <?php if(isset($errors['lastname']['tooShort'])) echo '<p class="errors">Le nom doit contenir au moins 3 caractères</p>' ?>

			        <!-- **** Too Long **** -->
			        <?php if(isset($errors['lastname']['tooLong'])) echo '<p class="errors">Le nom ne peut pas contenir plus de 100 caractères</p>' ?>

	        		<label for="lastname">Nom</label>
			        <span class="ss-icon">check</span>
		      </div>

		      <div class="field firstname-box">

		      		<!-- **** FIRSTNAME **** -->
			        <input type="text" id="firstname" name="firstname" placeholder="Votre prénom ..."/>

			        <!--**************
			        		ERRORS 
			        	**************-->

			        <!-- **** Too Short **** -->
			        <?php if(isset($errors['firstname']['tooShort'])) echo '<p class="errors">Le prénom doit contenir au moins 3 caractères</p>' ?>

			        <!-- **** Too Long **** -->
			        <?php if(isset($errors['firstname']['tooLong'])) echo '<p class="errors">Le prénom ne peut pas contenir plus de 100 caractères</p>' ?>

	        		<label for="firstname">Prénom</label>
			        <span class="ss-icon">check</span>
		      </div>

		      <div class="field age-box">

		      		<!-- **** AGE **** -->
			        <input type="text" id="age" name="age" placeholder="Age"/>

			        <!--**************
			        		ERRORS 
			        	**************-->

			        <!-- **** Empty **** -->
			        <?php if(isset($errors['age']['empty'])) echo '<p class="errors">L\'âge doit être spécifié</p>' ?>

			        <!-- **** Too Long **** -->
			        <?php if(isset($errors['age']['tooLong'])) echo '<p class="errors">L\'âge ne peut pas contenir plus de 2 caractères</p>' ?>

			        <label for="age">Age</label>
			        <span class="ss-icon">check</span>
		      </div>

		      <div class="field email-box">

		      		<!-- **** EMAIL **** -->
			        <input type="text" id="email" name="mail" placeholder="name@email.com"/>

			        <!--**************
			        		ERRORS 
			        	**************-->

			        <!-- **** Too Short **** -->
			        <?php if(isset($errors['mail']['tooShort'])) echo '<p class="errors">Le mail doit contenir au moins 8 caractères</p>' ?>

			        <!-- **** Too Long **** -->
			        <?php if(isset($errors['mail']['tooLong'])) echo '<p class="errors">Le mail ne peut pas contenir plus de 50 caractères</p>' ?>

			        <!-- *** Format *** -->
			        <?php if(isset($errors['mail']['format'])) echo '<p class="errors">Le mail doit avoir ce format : adresse@mail.com</p>' ?>

			        <!-- *** Format *** -->
			        <?php if(isset($errors['mail']['exist'])) echo '<p class="errors">Ce mail existe déjà</p>' ?>

			        <label for="email">Email</label>
			        <span class="ss-icon">check</span>
		      </div>

		      <div id="news_gender">

		      	<!-- *** HOMME *** -->
		      	<label for="male">Homme
		      		<input type="radio" name="gender" id="male" value="male" checked>
		      	</label>

		      	<!-- *** FEMME *** -->
		      	<label for="female">Femme
		      		<input type="radio" name="gender" id="female" value="female">
		      	</label>

		      </div>

		      <!-- **** SUBMIT **** -->
		      <input class="button" type="submit" name="news-submit" value="send" />

	  	</form>

	  	<!-- Si les coordonnées ont été enregistrées en base de donnée: -->
	  	<?php else : ?>
	  		<div class="news_success">
	  			<div class="container">
	  				<p>Votre inscription à la newsletter a bien été prise en compte.</p>
	  			</div>
	  		</div>
	  <?php endif; ?>

  	</article>
</section>


<?php $this->stop('main_content') ?>