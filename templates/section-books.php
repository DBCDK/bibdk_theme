<div id="block-books" class="block clearfix">

  <div class="grid_24">

    <div class="block-title">
      <h2>Nye bøger</h2>
    </div>

  </div>
  <!-- .grid -->

  <div class="grid_14">

    <?php 
      $element = array(
        'box_height' => '2',
        'title' => "Luft under vingerne",
        'image' => array(
          '#src' => '../img/content/erica_jung.png',
          '#width' => '270',
          '#height' => '320',
        ),
        'body' => "<p>
                    Den 30-årige amerikanske forfatterinde Isadora Wings desperate forsøg på at frigøre sig fra det traditionelle
                  </p>",
        'more' => 'Læs mere',
      );
      print render('widget-lightgrey' , $element);
    ?> 

  </div>
  <!-- .grid -->

  <div class="grid_5">

    <?php 
      $element = array(
        'title' => "Neandertal",
        'artist' => "Emmanuel Roudier",
        'tags' => array('krig', 'død', 'ødelæggelse'),
      );
      print render('widget-darkgrey' , $element);
    ?>   

    <?php 
      $element = array(
        'title' => "Englen Esmeralda",
        'artist' => "Don Delillo",
        'tags' => array('tiden', 'USA', '1897-1901'),
      );
      print render('widget-darkgrey' , $element);
    ?>

    <?php 
      $element = array(
        'title' => "Englen Esmeralda",
        'artist' => "Don Delillo",
        'tags' => array('tiden', 'USA', '1897-1901'),
      );
      print render('widget-darkgrey' , $element);
    ?>

  </div>
  <!-- .grid -->

  <div class="grid_5">

    <?php 
      $element = array(
        'title' => "Min krig, suite",
        'artist' => "Emmanuel Roudier",
        'tags' => array('krig', 'kærlighed', 'romantik'),
      );
      print render('widget-darkgrey' , $element);
    ?>

    <?php 
      $element = array(
        'title' => "Mad til tiden",
        'artist' => "Mie Schlechthoff",
        'tags' => array('madlavning'),
      );
      print render('widget-darkgrey' , $element);
    ?>

  </div>
  <!-- .grid -->

</div>