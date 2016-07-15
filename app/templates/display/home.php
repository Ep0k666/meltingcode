<?php $this->layout('layout', ['title' => '']) ?>

<?php $this->start('main_content') ?>


	<!--*************************
			  LOW NAVIGATION 
		*************************-->

	<nav id="low_nav">
		<div class="container">

		<!-- *** Liste de liens "catégorie" *** -->
			<ul>
				<li><a href="">Livres</a></li>
				<li><a href="">High-Tech</a></li>
				<li><a href="">Vêtements</a></li>
				<li><a href="">Maison</a></li>
				<li><a href="">Décoration</a></li>
				<li><a href="">Produits régionaux</a></li>
				<li><a href="">Divers</a></li>
				<li><a href="">Divers</a></li>
			</ul>

			<div class="clearfix"></div>

		</div>
	</nav>

	<!--*************************
			 SLIDER BOUTIQUE 
		*************************-->

	<article id="slider">
		<div class="container">
			<div class="flexslider">
				<ul class="slides">

					<!-- *** Pour chaque Shop MostViewed *** -->
					<?php foreach($shopsMostViewed as $shopMostViewed) : ?>

						<!-- ** Définition du lien de l'image ** -->
						<?php
						$path = $shopMostViewed['pictures'];
						$img = $this->assetUrl($path);
						?>

						<!-- *** First shop *** -->
						<li class="most_viewed" style="background-image: url('<?= $img ?>')">

							<div id="slider_container"></div>

								<h2 class="title_most_viewed"><?= $shopMostViewed['name'] ?></h2>

								<p class="description_most_viewed"><?= $shopMostViewed['description'] ?></p>

						</li>

						<!-- ** Fin foreach ** -->
					<?php endforeach; ?>

				</ul>
			</div>
		</div>
	</article>


	<!-- ****************************
				NEWS BOUTIQUE
		 ****************************-->
	<section id="new_shop">
		<div class="container">

		<div class="bordure1"></div>
			<h3>Découvrez les dernières boutiques ...</h3>

			<!-- *** Pour chaque Shop Most Recent *** -->
			<?php foreach($shopsMostRecent as $shopMostRecent): ?>

				<article class="shop_discovery">

					<!-- ** Définition du lien pour chaque image ** -->
					<?php
					$path = $shopMostRecent['pictures'];
					$img = $this->assetUrl('uploads/'.$path);
					?>

					<img src="<?= $img ?>">

					<h4 class="shop_title"><?= $shopMostRecent['name'] ?></h4>

					<p class="shop_description"><?= $shopMostRecent['description'] ?></p>

				</article>

				<!-- ** Fin foreach ** -->
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

				<div class="bordure1"></div>
					<h3>La team Lor'N Shop</h3>

	  				<div data-column='5' class="at-grid">

	  			<!-- Malika -->
	    		<div class="at-column">
	      			<div class="at-user">
				        <!-- On définit le chemin vers l'image -->
	      				<?php 
							$path = "img/malika.jpg";
							$img = $this->assetUrl($path);
						?>
				        <div class="at-user__avatar"><img src="<?= $img ?>"/></div>
				        <div class="at-user__name">Malika</div>
				        <div class="at-user__title">CEO &amp; Co-Founder</div>
				        <ul class="at-social">
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M14 9h3l-.375 3H14v9h-3.89v-9H8V9h2.11V6.984c0-1.312.327-2.304.984-2.976C11.75 3.336 12.844 3 14.375 3H17v3h-1.594c-.594 0-.976.094-1.148.281-.172.188-.258.5-.258.938V9z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M20.875 7.5v.563c0 3.28-1.18 6.257-3.54 8.93C14.978 19.663 11.845 21 7.938 21c-2.5 0-4.812-.687-6.937-2.063.5.063.86.094 1.078.094 2.094 0 3.969-.656 5.625-1.968a4.563 4.563 0 0 1-2.625-.915 4.294 4.294 0 0 1-1.594-2.226c.375.062.657.094.844.094.313 0 .719-.063 1.219-.188-1.031-.219-1.899-.742-2.602-1.57a4.32 4.32 0 0 1-1.054-2.883c.687.328 1.375.516 2.062.516C2.61 9.016 1.938 7.75 1.938 6.094c0-.782.203-1.531.609-2.25 2.406 2.969 5.515 4.547 9.328 4.734-.063-.219-.094-.562-.094-1.031 0-1.281.438-2.36 1.313-3.234C13.969 3.437 15.047 3 16.328 3s2.375.484 3.281 1.453c.938-.156 1.907-.531 2.907-1.125-.313 1.094-.985 1.938-2.016 2.531.969-.093 1.844-.328 2.625-.703-.563.875-1.312 1.656-2.25 2.344z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M19.547 3c.406 0 .75.133 1.031.398.281.266.422.602.422 1.008v15.047c0 .406-.14.766-.422 1.078a1.335 1.335 0 0 1-1.031.469h-15c-.406 0-.766-.156-1.078-.469C3.156 20.22 3 19.86 3 19.453V4.406c0-.406.148-.742.445-1.008C3.742 3.133 4.11 3 4.547 3h15zM8.578 18V9.984H6V18h2.578zM7.36 8.766c.407 0 .743-.133 1.008-.399a1.31 1.31 0 0 0 .399-.96c0-.407-.125-.743-.375-1.009C8.14 6.133 7.813 6 7.406 6c-.406 0-.742.133-1.008.398C6.133 6.664 6 7 6 7.406c0 .375.125.696.375.961.25.266.578.399.984.399zM18 18v-4.688c0-1.156-.273-2.03-.82-2.624-.547-.594-1.258-.891-2.133-.891-.938 0-1.719.437-2.344 1.312V9.984h-2.578V18h2.578v-4.547c0-.312.031-.531.094-.656.25-.625.687-.938 1.312-.938.875 0 1.313.578 1.313 1.735V18H18z" fill-rule="evenodd"></path>
				              </svg></a></li>
				        </ul>
	      			</div>
	    		</div>

	    		<!-- Julie -->
	    		<div class="at-column">
	      			<div class="at-user">
	      				<!-- On définit le chemin vers l'image -->
	      				<?php 
							$path = "img/julie.jpg";
							$img = $this->assetUrl($path);
						?>
				        <div class="at-user__avatar"><img src="<?= $img ?>"/></div>
				        <div class="at-user__name">Julie</div>
				        <div class="at-user__title">CEO &amp; Co-Founder</div>
				        <ul class="at-social">
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M14 9h3l-.375 3H14v9h-3.89v-9H8V9h2.11V6.984c0-1.312.327-2.304.984-2.976C11.75 3.336 12.844 3 14.375 3H17v3h-1.594c-.594 0-.976.094-1.148.281-.172.188-.258.5-.258.938V9z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M20.875 7.5v.563c0 3.28-1.18 6.257-3.54 8.93C14.978 19.663 11.845 21 7.938 21c-2.5 0-4.812-.687-6.937-2.063.5.063.86.094 1.078.094 2.094 0 3.969-.656 5.625-1.968a4.563 4.563 0 0 1-2.625-.915 4.294 4.294 0 0 1-1.594-2.226c.375.062.657.094.844.094.313 0 .719-.063 1.219-.188-1.031-.219-1.899-.742-2.602-1.57a4.32 4.32 0 0 1-1.054-2.883c.687.328 1.375.516 2.062.516C2.61 9.016 1.938 7.75 1.938 6.094c0-.782.203-1.531.609-2.25 2.406 2.969 5.515 4.547 9.328 4.734-.063-.219-.094-.562-.094-1.031 0-1.281.438-2.36 1.313-3.234C13.969 3.437 15.047 3 16.328 3s2.375.484 3.281 1.453c.938-.156 1.907-.531 2.907-1.125-.313 1.094-.985 1.938-2.016 2.531.969-.093 1.844-.328 2.625-.703-.563.875-1.312 1.656-2.25 2.344z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M19.547 3c.406 0 .75.133 1.031.398.281.266.422.602.422 1.008v15.047c0 .406-.14.766-.422 1.078a1.335 1.335 0 0 1-1.031.469h-15c-.406 0-.766-.156-1.078-.469C3.156 20.22 3 19.86 3 19.453V4.406c0-.406.148-.742.445-1.008C3.742 3.133 4.11 3 4.547 3h15zM8.578 18V9.984H6V18h2.578zM7.36 8.766c.407 0 .743-.133 1.008-.399a1.31 1.31 0 0 0 .399-.96c0-.407-.125-.743-.375-1.009C8.14 6.133 7.813 6 7.406 6c-.406 0-.742.133-1.008.398C6.133 6.664 6 7 6 7.406c0 .375.125.696.375.961.25.266.578.399.984.399zM18 18v-4.688c0-1.156-.273-2.03-.82-2.624-.547-.594-1.258-.891-2.133-.891-.938 0-1.719.437-2.344 1.312V9.984h-2.578V18h2.578v-4.547c0-.312.031-.531.094-.656.25-.625.687-.938 1.312-.938.875 0 1.313.578 1.313 1.735V18H18z" fill-rule="evenodd"></path>
				              </svg></a></li>
				        </ul>
	      			</div>
	    		</div>

	    		<!-- Halima -->
	    		<div class="at-column">
	      			<div class="at-user">
	      				<!-- On définit le chemin vers l'image -->
	      				<?php 
							$path = "img/halima.jpg";
							$img = $this->assetUrl($path);
						?>
				        <div class="at-user__avatar"><img src="<?= $img ?>"/></div>
				        <div class="at-user__name">Halima</div>
				        <div class="at-user__title">CEO &amp; Co-Founder</div>
				        <ul class="at-social">
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M14 9h3l-.375 3H14v9h-3.89v-9H8V9h2.11V6.984c0-1.312.327-2.304.984-2.976C11.75 3.336 12.844 3 14.375 3H17v3h-1.594c-.594 0-.976.094-1.148.281-.172.188-.258.5-.258.938V9z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M20.875 7.5v.563c0 3.28-1.18 6.257-3.54 8.93C14.978 19.663 11.845 21 7.938 21c-2.5 0-4.812-.687-6.937-2.063.5.063.86.094 1.078.094 2.094 0 3.969-.656 5.625-1.968a4.563 4.563 0 0 1-2.625-.915 4.294 4.294 0 0 1-1.594-2.226c.375.062.657.094.844.094.313 0 .719-.063 1.219-.188-1.031-.219-1.899-.742-2.602-1.57a4.32 4.32 0 0 1-1.054-2.883c.687.328 1.375.516 2.062.516C2.61 9.016 1.938 7.75 1.938 6.094c0-.782.203-1.531.609-2.25 2.406 2.969 5.515 4.547 9.328 4.734-.063-.219-.094-.562-.094-1.031 0-1.281.438-2.36 1.313-3.234C13.969 3.437 15.047 3 16.328 3s2.375.484 3.281 1.453c.938-.156 1.907-.531 2.907-1.125-.313 1.094-.985 1.938-2.016 2.531.969-.093 1.844-.328 2.625-.703-.563.875-1.312 1.656-2.25 2.344z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M19.547 3c.406 0 .75.133 1.031.398.281.266.422.602.422 1.008v15.047c0 .406-.14.766-.422 1.078a1.335 1.335 0 0 1-1.031.469h-15c-.406 0-.766-.156-1.078-.469C3.156 20.22 3 19.86 3 19.453V4.406c0-.406.148-.742.445-1.008C3.742 3.133 4.11 3 4.547 3h15zM8.578 18V9.984H6V18h2.578zM7.36 8.766c.407 0 .743-.133 1.008-.399a1.31 1.31 0 0 0 .399-.96c0-.407-.125-.743-.375-1.009C8.14 6.133 7.813 6 7.406 6c-.406 0-.742.133-1.008.398C6.133 6.664 6 7 6 7.406c0 .375.125.696.375.961.25.266.578.399.984.399zM18 18v-4.688c0-1.156-.273-2.03-.82-2.624-.547-.594-1.258-.891-2.133-.891-.938 0-1.719.437-2.344 1.312V9.984h-2.578V18h2.578v-4.547c0-.312.031-.531.094-.656.25-.625.687-.938 1.312-.938.875 0 1.313.578 1.313 1.735V18H18z" fill-rule="evenodd"></path>
				              </svg></a></li>
				        </ul>
	      			</div> <!-- Fin du class="at-user" -->
	    		</div> <!-- Fin du class="at-column" -->

	    		<!-- François-Xavier -->
	    		<div class="at-column">
	      			<div class="at-user">
	      				<!-- On définit le chemin vers l'image -->
	      				<?php 
							$path = "img/fra_xa.jpg";
							$img = $this->assetUrl($path);
						?>

				        <div class="at-user__avatar"><img src="<?= $img ?>"/></div>
				        <div class="at-user__name">François-Xavier</div>
				        <div class="at-user__title">CEO &amp; Co-Founder</div>
				        <ul class="at-social">
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M14 9h3l-.375 3H14v9h-3.89v-9H8V9h2.11V6.984c0-1.312.327-2.304.984-2.976C11.75 3.336 12.844 3 14.375 3H17v3h-1.594c-.594 0-.976.094-1.148.281-.172.188-.258.5-.258.938V9z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M20.875 7.5v.563c0 3.28-1.18 6.257-3.54 8.93C14.978 19.663 11.845 21 7.938 21c-2.5 0-4.812-.687-6.937-2.063.5.063.86.094 1.078.094 2.094 0 3.969-.656 5.625-1.968a4.563 4.563 0 0 1-2.625-.915 4.294 4.294 0 0 1-1.594-2.226c.375.062.657.094.844.094.313 0 .719-.063 1.219-.188-1.031-.219-1.899-.742-2.602-1.57a4.32 4.32 0 0 1-1.054-2.883c.687.328 1.375.516 2.062.516C2.61 9.016 1.938 7.75 1.938 6.094c0-.782.203-1.531.609-2.25 2.406 2.969 5.515 4.547 9.328 4.734-.063-.219-.094-.562-.094-1.031 0-1.281.438-2.36 1.313-3.234C13.969 3.437 15.047 3 16.328 3s2.375.484 3.281 1.453c.938-.156 1.907-.531 2.907-1.125-.313 1.094-.985 1.938-2.016 2.531.969-.093 1.844-.328 2.625-.703-.563.875-1.312 1.656-2.25 2.344z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M19.547 3c.406 0 .75.133 1.031.398.281.266.422.602.422 1.008v15.047c0 .406-.14.766-.422 1.078a1.335 1.335 0 0 1-1.031.469h-15c-.406 0-.766-.156-1.078-.469C3.156 20.22 3 19.86 3 19.453V4.406c0-.406.148-.742.445-1.008C3.742 3.133 4.11 3 4.547 3h15zM8.578 18V9.984H6V18h2.578zM7.36 8.766c.407 0 .743-.133 1.008-.399a1.31 1.31 0 0 0 .399-.96c0-.407-.125-.743-.375-1.009C8.14 6.133 7.813 6 7.406 6c-.406 0-.742.133-1.008.398C6.133 6.664 6 7 6 7.406c0 .375.125.696.375.961.25.266.578.399.984.399zM18 18v-4.688c0-1.156-.273-2.03-.82-2.624-.547-.594-1.258-.891-2.133-.891-.938 0-1.719.437-2.344 1.312V9.984h-2.578V18h2.578v-4.547c0-.312.031-.531.094-.656.25-.625.687-.938 1.312-.938.875 0 1.313.578 1.313 1.735V18H18z" fill-rule="evenodd"></path>
				              </svg></a></li>
				        </ul>
	      			</div> <!-- Fin du class="at-user" -->
	    		</div> <!-- Fin du class="at-column" -->

	    		<!-- Steven -->
	    		<div class="at-column">
	      			<div class="at-user">
	      			<!-- On définit le chemin vers l'image -->
	      				<?php 
							$path = "img/steven.jpg";
							$img = $this->assetUrl($path);
						?>

				        <div class="at-user__avatar"><img src="<?= $img ?>"/></div>
				        <div class="at-user__name">Steven</div>
				        <div class="at-user__title">CEO &amp; Co-Founder</div>
				        <ul class="at-social">
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M14 9h3l-.375 3H14v9h-3.89v-9H8V9h2.11V6.984c0-1.312.327-2.304.984-2.976C11.75 3.336 12.844 3 14.375 3H17v3h-1.594c-.594 0-.976.094-1.148.281-.172.188-.258.5-.258.938V9z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M20.875 7.5v.563c0 3.28-1.18 6.257-3.54 8.93C14.978 19.663 11.845 21 7.938 21c-2.5 0-4.812-.687-6.937-2.063.5.063.86.094 1.078.094 2.094 0 3.969-.656 5.625-1.968a4.563 4.563 0 0 1-2.625-.915 4.294 4.294 0 0 1-1.594-2.226c.375.062.657.094.844.094.313 0 .719-.063 1.219-.188-1.031-.219-1.899-.742-2.602-1.57a4.32 4.32 0 0 1-1.054-2.883c.687.328 1.375.516 2.062.516C2.61 9.016 1.938 7.75 1.938 6.094c0-.782.203-1.531.609-2.25 2.406 2.969 5.515 4.547 9.328 4.734-.063-.219-.094-.562-.094-1.031 0-1.281.438-2.36 1.313-3.234C13.969 3.437 15.047 3 16.328 3s2.375.484 3.281 1.453c.938-.156 1.907-.531 2.907-1.125-.313 1.094-.985 1.938-2.016 2.531.969-.093 1.844-.328 2.625-.703-.563.875-1.312 1.656-2.25 2.344z" fill-rule="evenodd"></path>
				              </svg></a></li>
				          <li class="at-social__item"><a href="">
				              <svg viewBox="0 0 24 24" width="18" height="18" xmlns="http://www.w3.org/2000/svg">
				                <path d="M19.547 3c.406 0 .75.133 1.031.398.281.266.422.602.422 1.008v15.047c0 .406-.14.766-.422 1.078a1.335 1.335 0 0 1-1.031.469h-15c-.406 0-.766-.156-1.078-.469C3.156 20.22 3 19.86 3 19.453V4.406c0-.406.148-.742.445-1.008C3.742 3.133 4.11 3 4.547 3h15zM8.578 18V9.984H6V18h2.578zM7.36 8.766c.407 0 .743-.133 1.008-.399a1.31 1.31 0 0 0 .399-.96c0-.407-.125-.743-.375-1.009C8.14 6.133 7.813 6 7.406 6c-.406 0-.742.133-1.008.398C6.133 6.664 6 7 6 7.406c0 .375.125.696.375.961.25.266.578.399.984.399zM18 18v-4.688c0-1.156-.273-2.03-.82-2.624-.547-.594-1.258-.891-2.133-.891-.938 0-1.719.437-2.344 1.312V9.984h-2.578V18h2.578v-4.547c0-.312.031-.531.094-.656.25-.625.687-.938 1.312-.938.875 0 1.313.578 1.313 1.735V18H18z" fill-rule="evenodd"></path>
				              </svg></a></li>
				        </ul>
	      			</div> <!-- Fin du class="at-user" -->
	    		</div> <!-- Fin du class="at-column" -->
			</div> <!-- Fin du data-column='5' -->
	    	
	    	<div class="bordure2">
	    	<h4>Le projet</h4>
	    	<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>

		</div><!-- fin du container -->
	</section>

<?php $this->stop('main_content') ?>