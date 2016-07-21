<?php $this->layout('layout', ['title' => 'contact']) ?>

<?php $this->start('main_content') ?>

<section id="hire">
	<article id="contact">

		<h1>Contactez-nous</h1>
    
	    <form method="POST" action="">
		      <div class="field name-box">

		      		<!-- **** NAME **** -->
			        <input type="text" id="name" name="name" placeholder="Votre nom ..."/>

			        <!--**************
			        		ERRORS 
			        	**************-->

			        <!-- **** Too Short **** -->
			        <?php if(isset($errors['name']['tooShort'])) echo '<p class="errors">Le nom doit contenir au moins 3 caractères</p>' ?>

			        <!-- **** Integer **** -->
			        <?php if(isset($errors['name']['int'])) echo '<p class="errors">Le nom ne peut pas contenir de chiffres</p>' ?>

			        <!-- **** Too Long **** -->
			        <?php if(isset($errors['name']['tooLong'])) echo '<p class="errors">Le nom ne peut pas contenir plus de 100 caractères</p>' ?>

	        		<label for="name">Name</label>
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

			        <!-- **** Invalid Format **** -->
			         <?php if(isset($errors['mail']['format'])) echo '<p class="errors">Le mail doit avoir ce format : adresse@mail.com</p>' ?>

			        <label for="email">Email</label>
			        <span class="ss-icon">check</span>
		      </div>

		      <div class="field msg-box">

		      		<!-- **** MESSAGE **** -->
			        <textarea id="msg" rows="4" name="message" placeholder="Écrivez votre message ici"/></textarea>

			        <!--**************
			        		ERRORS 
			        	**************-->

			        <!-- **** Too Short **** -->
			        <?php if(isset($errors['message']['tooShort'])) echo '<p class="errors">Le message doit contenir au moins 20 caractères</p>' ?>

			        <!-- **** Too Long **** -->
			        <?php if(isset($errors['message']['tooLong'])) echo '<p class="errors">Le message ne peut pas contenir plus de 750 caractères</p>' ?>

			        <label for="msg">Msg</label>
			        <span class="ss-icon">check</span>
		      </div>

		      <!-- **** SUBMIT **** -->
		      <input class="button" type="submit" name="send-message" value="send" />

	  	</form>
  	</article>
</section>


<?php $this->stop('main_content') ?>