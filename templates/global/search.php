<div id="region-search">

  <div class="container_24">

    <div class="grid_24">

      <nav id="search-form" >
        <form action="search-result.php" class="clearfix">
            <input type="text" name="search_string" value="<?php print $_GET['search_string']; ?>" placeholder="Skriv søgeord"  />
            <input type="submit" value="Søg" class="btn btn-blue btn-fixed-size" />
        </form>
      </nav>

      <nav id="search-tabs">
      	<ul class="horizontal-nav clearfix">
	        <li class="active"><a href="#">Alt</a></li>
	        <li><a href="#">Bøger</a></li>
	        <li><a href="#">Film</a></li>
	        <li><a href="#">Musik</a></li>
	        <li><a href="#">Spil</a></li>
	        <li><a href="#">Artikler</a></li>
	        <li><a href="#">Noder</a></li>
	        <li><a href="#">Net</a></li>
      	</ul>
      </nav>

      <div id="search-advanced">
        <div id="search-advanced-toggle">
          <a class="text-white" href="#"><span class="icon icon-left icon-darkgrey-plus">&#9660;</span>Flere søgemuligheder</a>
        </div>
        <div id="search-advanced-panel" class="visuallyhidden">
          <!-- ADVANCED SEARCH HERE -->
        </div>
      </div>


    </div>
    <!-- .grid_24 -->

  </div>
  <!-- .container_24 -->


</div>
<!-- #region-search -->