<section id="block-news" class="block clearfix">

  <div class="grid_24">

    <div class="block-title">
      <h2>Nyheder & Information</h2>
    </div>

  </div>
  <!-- .grid -->

  <div class="grid_9">

    <?php 
      $element = array(
        'box_height' => '2',
        'title' => "Artikler fra infomedia",
        'body' => "<p>
                    Du kan se artikler og anmeldelser i Infomedia via bibliotek.dk, hvis dit bibliotek har tegnet abonnement på tjenesten.
                  </p>
                  <p>
                    Du kan se linket til Infomedia i posterne, men du skal være logget ind på bibliotek.dk for at få adgang til artiklen.
                  </p>",
        'more' => 'Læs mere',
      );
      print render('elements', 'widget-lightgrey' , $element);
    ?> 

  </div>
  <!-- .grid -->

  <div class="grid_5">
    
    <?php 
      $element = array(
        'box_height' => '2',
        'title' => "Bibliotek.dk App'en",
        'body' => "<p>
                    Hent vores app til din mobil på Android Marked
                  </p>",
        'more' => "Hent den her",
      );
      print render('elements', 'widget-lightgrey' , $element);
    ?> 

  </div>
  <!-- .grid -->

  <div class="grid_5">

     <?php 
      $element = array(
        'title' => "Brug Netbibliotekerne",
        'more' => TRUE,
      );
      print render('widget-darkgrey' , $element);
    ?>
    <?php 
      $element = array(
        'title' => "Kom med i bibliotek.dk brugerpanelet",
        'more' => TRUE,
      );
      print render('elements', 'widget-darkgrey' , $element);
    ?>

  </div>
  <!-- .grid -->

  <div class="grid_5">
    <?php print render('elements', 'widget-biblioteksvagt'); ?>



  </div>  
  <!-- .grid -->

</section>