<?php $this->layout('layout', ['title' => 'contact']) ?>

<?php $this->start('main_content') ?>

<div id="contact_us">
	<section id="hire">
		<article id="contact">

			<!-- *** Principal title *** -->
			<h2>Contactez-nous</h2>
	    
			<!-- Afficher le formulaire si aucun message enregistré avant -->
	    	<?php if(isset($msgInserted) === false) : ?>

		    <form method="POST" action="">
			      <div class="field name-box">

				        <!--**************
				        		NAME 
				        	**************-->

				        <input type="text" id="name" name="name" placeholder="Votre nom ..."/>


			      		<!-- **** ERRORS **** -->

				        <!-- **** Too Short **** -->
				        <?php if(isset($errors['name']['tooShort'])) echo $errors['name']['tooShort'] ?>

				        <!-- **** Integer **** -->
				        <?php if(isset($errors['name']['int'])) echo $errors['name']['int'] ?>

				        <!-- **** Too Long **** -->
				        <?php if(isset($errors['name']['tooLong'])) echo $errors['name']['tooLong'] ?>

		        		<label for="name">Nom</label>
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

				        <!-- **** Invalid Format **** -->
				         <?php if(isset($errors['mail']['format'])) echo $errors['mail']['format'] ?>

				        <label for="email">Email</label>
				        <span class="ss-icon">check</span>
			      </div>

			      <div class="field msg-box">

				        <!--**************
				        		MESSAGE 
				        	**************-->

				        <textarea id="msg" rows="4" name="message" placeholder="Écrivez votre message ici"/></textarea>

			      		<!-- **** ERRORS **** -->

				        <!-- **** Too Short **** -->
				        <?php if(isset($errors['message']['tooShort'])) echo $errors['message']['tooShort'] ?>

				        <!-- **** Too Long **** -->
				        <?php if(isset($errors['message']['tooLong'])) echo $errors['message']['tooLong'] ?>

				        <label for="msg">Msg</label>
				        <span class="ss-icon">check</span>
			      </div>

			      <!-- **** SUBMIT **** -->
			      <input class="button" type="submit" name="send-message" value="Envoyer" />

		  	</form>

		  	<!-- Si un message a déjà été enregistré en DB -->
		  	<?php else : ?>
		  		<div class="contact_success">
		  			<div class="container">

		  				<p>Votre message a bien été pris en compte.</p>

		  				<a href="<?= $this->url('home') ?>" id="back_home">Retour <span>accueil<span></a>

		  			</div>
		  		</div>

		  <?php endif; ?>

	  	</article>
	</section>
</div>

<?php $this->stop('main_content') ?>