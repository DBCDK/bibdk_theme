<div class="work element-wrapper">


	<div class="element">


		<div class="work-header element-section padded">



			<div class="actions">

				<div class="primary-actions">

					<div class="dropdown-wrapper">
						<a class="btn btn-blue dropdown-toggle" href="#">
							Bestil uanset udgave <span class="caret"></span>
						</a>
						<ul class="dropdown-menu visuallyhidden">
							<li><a href="#">Option 1</a></li>
							<li><a href="#">Option 2</a></li>
							<li><a href="#">Option 3</a></li>
							<li><a href="#">Option 4</a></li>
							<li><a href="#">Option 5</a></li>
						</ul>
					</div>

				</div>

			</div>
			<!-- actions -->

			<div class="element-title">

				<hgroup>
					<h2>Luft under vingerne</h2>
					<h3>Jo Næsbø</h3>
				</hgroup>

			</div>



			<div class="toggle-next-section toggle-work">
				<a class="icon-link icon-link-plus" href="#"><strong>Mere</strong> information</a>
			</div>


		</div>
		<!-- element-section (work-header) -->



		<div class="work-body work-body-has-cover element-section padded">

			<div class="work-shared-data clearfix">


				<div class="work-cover">

					<div class="work-cover-image">
						<a href="#"><img src="../img/cover-front-large.gif" /></a>
						<a href="#" class="visuallyhidden"><img src="../img/cover-back-large.gif" /></a>
					</div>

					<div class="work-cover-selector clearfix">
						<a href="#" class="work-cover-front active"></a>
						<a href="#" class="work-cover-back"></a>
					</div>

				</div>
				<!-- cover -->


				<div class="wrapper">

					<div class="field-summary text">
						<p>
							<strong>Krimi.</strong> Et bankrøveri i Oslo udvikler sig til en ren 
							henrettelse. Kriminalassistent Harry Hole er muligvis den sidste, 
							der har set sin gamle kæreste inden hun bliver myrdet, og sammenhængen 
							mellem de to forbrydelser fører til en sigøjner i en fængselscelle.
						</p>

					</div>


					<div class="field-tags">
						<?php $tags = array('Krimi', 'romaner', 'hævn', 'Oslo', 'Norge', '2000-2009'); ?>
						<?php print format_tags($tags); ?>
					</div>


					<div class="tabs tabs-light">

						<div class="tabs-nav clearfix">
							<a href="#" class="active">Find mere om</a>
							<a href="#">Anmeldelser</a>
						</div>
						<!-- tabs-nav -->

						<div class="tabs-sections">

							<div class="tabs-section">

								<div class="padded text clearfix">
									<ul>
										<li><a href="#">Se anmeldelse hos Infomedia</a></li>
										<li><a href="#">Se materialevurdering</a></li>
										<li><a href="#">Læs brugeranmeldelser og ratings</a></li>
									</ul>
								</div>

							</div>
							<!-- tabs-section -->

						</div>
						<!-- tabs-sections -->

					</div>
					<!-- tabs -->

				</div>
				<!-- wrapper -->


			</div>
			<!-- work-share-data -->



			<div class="tabs tabs-heavy">

				<div class="tabs-nav clearfix">
					<a href="#" class="active">Bog (4)</a>
					<a href="#">Lydbog (6)</a>
					<a href="#">Netdokument (2)</a>
					<a href="#">Punktskrift (1)</a>
				</div>
				<!-- tabs-nav -->

				<div class="tabs-sections">

					<?php render('work-section'); ?>

				</div>
				<!-- tabs-sections -->

			</div>
			<!-- tabs -->

		</div>
		<!-- element-section -->

	</div>
	<!-- element -->

</div>
<!-- element-wrapper -->

