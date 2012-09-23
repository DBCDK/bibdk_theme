<section id="block-movies" class="block clearfix">

  <div class="grid_24">

    <div class="block-title">
      <h2>Nye film</h2>
    </div>

  </div>
  <!-- .grid -->

  <div class="grid_9">

    <?php 
      $element = array(
        'box_height' => '3',
        'title' => "School of Rock",
        'image' => array(
          '#src' => '../img/content/school_of_rock.png',
          '#width' => '160',
          '#height' => '210',
        ),
        'body' => "<p>
                    En falleret rockmusiker udgiver sig for at være lærer, og gør en femteklasse på en fin privatskole til sit nye rockband.
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
        'title' => "Zoolander",
        'artist' => "Ben Stiller",
        'tags' => array('farcer', 'mode', 'modeller'),
      );
      print render('elements', 'widget-darkgrey' , $element);
    ?>   

    <?php 
      $element = array(
        'title' => "Det lille hus på prærien",
        'artist' => "Blanche Hanalis",
        'tags' => array('familien', 'nybyggere', 'Minnesota'),
      );
      print render('elements', 'widget-darkgrey' , $element);
    ?>

    <?php 
      $element = array(
        'title' => "Forces speciales",
        'artist' => "David Jankowsko",
        'tags' => array('krig', 'overlevelse', 'Frankrig'),
      );
      print render('elements', 'widget-darkgrey' , $element);
    ?>

  </div>
  <!-- .grid -->

  <div class="grid_10">

    <?php 
      $element = array(
        'box_height' => '3',
        'title' => "The man who shot Liberty Valance",
        'image' => array(
          '#src' => '../img/content/liberty_valance.png',
          '#width' => '190',
          '#height' => '250',
        ),
        'body' => "<p>
                    Ransom Stoddard vender efter en strålende karriere som advokat og kongresmedlem tilbage til den lille by Shinbone i det vilde vesten til begravelsen af vennen Tom Doniphon, der i sin tid hjalp ham i kampen mod storforbryderen ...
                   </p>",
        'more' => 'Læs mere',
      );
      print render('elements', 'widget-lightgrey' , $element);
    ?> 
  </div>
  <!-- .grid -->
  
</section>