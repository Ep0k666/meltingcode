<?php $this->layout('layout', ['title' => 'activity']) ?>

<?php $this->start('main_content') ?>

<!--*************************
		  LOW NAVIGATION 
	*************************-->

    <!-- *** Desktop Navigation *** -->
	<div id="activity_shop">
		<nav id="low_nav_desktop">
			<div class="container">

                <!-- *** Liste de liens "activity" *** -->
				<ul>
					<?php foreach($activities as $activity) : ?>

						<li>
							<a href="<?= $this->url('activity', ['id' => $activity['id_catshops']])?>">
							<?= $activity['category'] ?>
							</a>
						</li>

					<?php endforeach; ?>
				</ul>

				<div class="clearfix"></div>

			</div>
		</nav>

		<!-- *** Mobile Navigation *** -->
		<nav id="low_nav_mobile">

            <!-- *** Hamburger *** -->
            <i class="fa fa-bars fa-1x" id="hamburger" aria-hidden="true">
                <span>Catégorie</span>
            </i>

            <!-- *** Cross Menu *** -->
            <span id="close_menu">
				<i class="fa fa-times" id="cross" aria-hidden="true"></i> Catégorie
			</span>

            <!-- *** Liste de liens "activity" *** -->
            <ul>

                <?php foreach ($activities as $activity) : ?>

                    <li>
                        <a href="<?= $this->url('activity', ['id' => $activity['id_catshops']]) ?>">
                            <?= $activity['category'] ?>
                        </a>
                    </li>

                <?php endforeach; ?>

            </ul>

            <div class="clearfix"></div>

		</nav>


<!-- ****************************
			SEARCHED SHOPS
	 ****************************-->

	<section id="activity_shop">
		<div class="container">

		<div class="bordure1"></div>

            <!-- *** Titre de l'activité recherché *** -->
            <h3><?= $categorySearch['category'] ?></h3>

            <?php foreach ($shopByActivity as $shop): ?>

				<article class="shop_discovery">

						<!-- ** Définition du lien pour chaque image ** -->
						<?php
							$path = $shop['pictshop1'];
							$img  = $this->assetUrl('uploads/'.$path);
						?>

						<!-- *** Image Shop *** -->
						<a href="<?= $this->url('shop-view', ['id' => $shop['id']])?>">
							<div class="img_shop_discovery" style="background-image: url('<?= $img ?>');">

								<!-- *** Name Shop *** -->
								<h4 class="shop_title"><?= $shop['name'] ?></h4>

							</div>
						</a>

						<!-- *** Shop Description *** -->
						<p class="shop_description"><?= substr($shop['description'], 0, 260) . "[...]"; ?></p>

					</article>

			<?php endforeach; ?>

			<div class="clearfix"></div>

		</div>
	</section>



<?php $this->stop('main_content') ?>