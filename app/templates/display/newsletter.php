<?php $this->layout('layout', ['title' => 'newsletter']) ?>

<?php $this->start('main_content') ?>

<div id="subscribe_newsletter">
	<section id="hire">
		<article id="newsletter">

				<!-- *** Principal title *** -->
				<h1>Newsletter</h1>
	    
	    	<!-- Afficher le formulaire si aucun message n'a déja été enregistré -->
	    	<?php if(isset($infoInserted) === false) : ?>

		    <form method="POST" action="">
			      <div class="field lastname-box">

				        <!--**************
				        		LASTNAME 
				        	**************-->

				        <input type="text" id="lastname" name="lastname" placeholder="Votre nom ..."/>

			      		<!-- **** ERRORS **** -->

				        <!-- **** Too Short **** -->
				        <?php if(isset($errors['lastname']['tooShort'])) echo $errors['lastname']['tooShort'] ?>

				        <!-- **** Too Long **** -->
				        <?php if(isset($errors['lastname']['tooLong'])) echo $errors['lastname']['tooLong'] ?>

				        <!-- **** INTEGER **** -->
				        <?php if(isset($errors['lastname']['int'])) echo $errors['lastname']['int'] ?>

		        		<label for="lastname">Nom</label>
				        <span class="ss-icon">check</span>
			      </div>

			      <div class="field firstname-box">

				        <!--**************
				        	   FIRSTNAME 
				        	**************-->

				        <input type="text" id="firstname" name="firstname" placeholder="Votre prénom ..."/>

			      		<!-- **** ERRORS **** -->

				        <!-- **** Too Short **** -->
				        <?php if(isset($errors['firstname']['tooShort'])) echo $errors['firstname']['tooShort'] ?>

				        <!-- **** INTEGER **** -->
				        <?php if(isset($errors['firstname']['int'])) echo $errors['firstname']['int'] ?>

				        <!-- **** Too Long **** -->
				        <?php if(isset($errors['firstname']['tooLong'])) echo $errors['firstname']['tooLong'] ?>

		        		<label for="firstname">Prénom</label>
				        <span class="ss-icon">check</span>
			      </div>

			      <div class="field age-box">

				        <!--**************
				        		  AGE 
				        	**************-->

				        <input type="text" id="age" name="age" placeholder="Votre âge ..."/>

			      		<!-- **** ERRORS **** -->

				        <!-- **** Empty **** -->
				        <?php if(isset($errors['age']['empty'])) echo $errors['age']['empty'] ?>

				        <!-- **** Too Long **** -->
				        <?php if(isset($errors['age']['tooLong'])) echo $errors['age']['tooLong'] ?>

				        <label for="age">Âge</label>
				        <span class="ss-icon">check</span>
			      </div>

			      <div class="field email-box">

				        <!--**************
				        		EMAIL 
				        	**************-->

				        <input type="text" id="email" name="mail" placeholder="name@email.com"/>

			      		<!-- **** ERRORS **** -->

				        <!-- **** Too Short **** -->
				        <?php if(isset($errors['mail']['tooShort'])) echo $errors['mail']['tooShort'] ?>

				        <!-- **** Too Long **** -->
				        <?php if(isset($errors['mail']['tooLong'])) echo $errors['mail']['tooLong'] ?>

				        <!-- *** Format *** -->
				        <?php if(isset($errors['mail']['format'])) 
				        	echo $errors['mail']['format'] 
				        ?>

				        <!-- *** Mail exist *** -->
				        <?php if(isset($errors['mail']['exist'])) echo $errors['mail']['exist'] ?>

				        <label for="email">Email</label>
				        <span class="ss-icon">check</span>
			      </div>

			      <div id="news_gender">

			      	<!--**************
				        	GENDER 
				        **************-->

			      	<!-- *** HOMME *** -->
			      	<label for="male">Homme</label>
			      		<input type="radio" name="gender" id="male" value="male" checked>
			      	

			      	<!-- *** FEMME *** -->
			      	<label for="female">Femme</label>
			      		<input type="radio" name="gender" id="female" value="female">
			      	

			      </div>

			      <!-- **** SUBMIT **** -->
			      <input class="button" type="submit" name="news-submit" value="Envoyer" />

		  	</form>

		  	<!-- Message de succès -->
		  	<?php else : ?>
		  		<div class="news_success">
		  			<div class="container">

		  				<p>Votre inscription à la newsletter a bien été prise en compte.</p>

		  				<a href="<?= $this->url('home') ?>" id="back_home">Retour <span>accueil<span></a>

		  			</div>
		  		</div>
		  <?php endif; ?>

	  	</article>
	</section>
</div>


<?php $this->stop('main_content') ?>