<div id="region-search">

  <div class="container_24">

    <div class="grid_24">

      <nav id="search-form" >
        <form action="search-result.php" class="clearfix">
            <input type="text" name="search_string" value="<?php print $_GET['search_string']; ?>" placeholder="Skriv søgeord"  />
            <input type="submit" value="Søg" class="btn btn-blue btn-fixed-size" />
        </form>
      </nav>

      <nav id="search-tabs" class="horizontal-nav clearfix">
        <a class="active" href="#">Alt</a>
        <a href="#">Bøger</a>
        <a href="#">Film</a>
        <a href="#">Musik</a>
        <a href="#">Spil</a>
        <a href="#">Artikler</a>
        <a href="#">Noder</a>
        <a href="#">Net</a>
      </nav>

      <div id="search-advanced">
        <div id="search-advanced-toggle">
          <a class="icon-link icon-link-whitetext icon-link-darkgreyicon icon-link-plus" href="#">Flere søgemuligheder</a>
        </div>
        <div id="search-advanced-panel">
          <!-- ADVANCED SEARCH HERE -->
        </div>
      </div>


    </div>
    <!-- .grid_24 -->

  </div>
  <!-- .container_24 -->


</div>
<!-- #region-search -->