<div id="sidebar">

	<div class="sidebar-header">
		232 resultater 
	</div>

	<nav class="sidebar-nav">

		<div class="facet-type">Materialetype</div>
		<ul>
			<li><a href="#">Bøger (83)</a></li>
			<li><a href="#">Tryktbog (68)</a></li>
			<li><a href="#">e-bog (23)</a></li>
			<li><a href="#">Lydbøger (43)</a></li>
			<li><a href="#">Bånd (32)</a></li>
			<li><a href="#"><span class="icon icon-left icon-blue-plus">+</span>Vis flere</a></li>
		</ul>

		<div class="facet-type">Emner</div>
		<ul>
			<li><a href="#">Krimi (186)</a></li>
			<li><a href="#">Romaner (201)</a></li>
			<li><a href="#">Hævn (89)</a></li>
			<li><a href="#">Norge (176)</a></li>
			<li><a href="#">Bander (76)</a></li>
			<li><a href="#"><span class="icon icon-left icon-blue-plus">+</span>Vis flere</a></li>
		</ul>

	</nav>

</div>	



<?php if (!empty($_GET['search_string'])): ?>
	<div class="search-string">
		"<?php print $_GET['search_string']; ?>"
	</div>
<?php endif;?>
