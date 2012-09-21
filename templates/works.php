<section class="works">



	<div class="works-controls clearfix">

		<div class="works-control-wrapper-left">

			<a class="works-control works-toggle" href="#">
				<span class="works-toggle-collapse hide-text">&or;</span>
				<span class="works-toggle-expand hide-text">&or;</span>
			</a>

		</div>
		<!-- works toggle all -->


		<div class="works-control-wrapper-left">

			<div class="dropdown-wrapper">

				<a href="#" class="works-control works-sort dropdown-toggle">Sortér efter år<span class="caret hide-text">&or;</span></a>

				<ul class="dropdown-menu dropdown-leftalign visuallyhidden">
					<li><a href="#" class="current">Sortér efter år</a></li>
					<li><a href="#">Sortér efter forfatter</a></li>
					<li><a href="#">Sortér efter titel</a></li>
				</ul>

			</div>

		</div>
		<!-- works sort -->


		<div class="works-control-wrapper-right">

			<a href="#" class="works-control works-pager-back hide-text">&or;</a>

			<div class="dropdown-wrapper">

				<a href="#" class="works-control works-pager-select dropdown-toggle">Side 1 <span class="caret hide-text">&or;</span></a>
				
				<ul class="dropdown-menu dropdown-leftalign visuallyhidden">
					<li><a href="#" class="current">Side 1</a></li>
					<li><a href="#">Side 2</a></li>
					<li><a href="#">Side 3</a></li>
					<li><a href="#">Side 4</a></li>
					<li><a href="#">Side 5</a></li>
					<li><a href="#">Side 6</a></li>
					<li><a href="#">Side 7</a></li>
				</ul>

			</div>

			<a href="#" class="works-control works-pager-forward hide-text">&or;</a>

		</div>
		<!-- works pager -->

	</div>
	<!-- works-controls -->



	<?php print render('work'); ?>

	


</section>
<!-- works -->




