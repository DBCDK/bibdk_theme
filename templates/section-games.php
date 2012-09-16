<div id="block-games" class="block clearfix">

  <div class="grid_24">

    <div class="block-title">
      <h2>Nye spil</h2>
    </div>

  </div>
  <!-- .grid -->

  <div class="grid_5">

    <?php 
      $element = array(
        'title' => "Test drive - Ferrari racing legends",
        'artist' => "Slightly Mad Studios",
        'tags' => array('computerspil', 'racerspil'),
      );
      print render('widget-darkgrey' , $element);
    ?>   

    <?php 
      $element = array(
        'title' => "Catherine",
        'artist' => "Deep Silver",
        'tags' => array('computerspil', 'hovedbrudsspil'),
      );
      print render('widget-darkgrey' , $element);
    ?>

    <?php 
      $element = array(
        'title' => "Lego Batman 2 - DC super heroes",
        'artist' => "Warner Bros. Interactive Ent.",
        'tags' => array('computerspil', 'adventure'),
      );
      print render('widget-darkgrey' , $element);
    ?>   

  </div>
  <!-- .grid -->

  <div class="grid_9">

    <?php 
      $element = array(
        'box_height' => '3',
        'title' => "Spec ops - the line",
        'image' => array(
          '#src' => '../img/content/spec_ops.png',
          '#width' => '160',
          '#height' => '210',
        ),
        'body' => "<p>Shooter. Dubai er blevet ramt af en voldsom sandstorm - en uforklarlig naturkatastrofe, som har lagt det tidligere stenrige ørkenland øde. Obert John Konrad fik evakueringsopgaven med landets civile - men noget gik galt ...</p>",
        'more' => 'Læs mere',
      );
      print render('widget-lightgrey' , $element);
    ?> 

  </div>
  <!-- .grid -->

  <div class="grid_10">

    <?php 
      $element = array(
        'box_height' => '3',
        'title' => "Olympic Games - London 2012",
        'image' => array(
          '#src' => '../img/content/ol.png',
          '#width' => '190',
          '#height' => '250',
        ),
        'body' => "<p>Sportsspil. De Olympiske Lege 2012. Du kan kæmpe for de danske farver i hele 45 forskellige discipliner fordelt på 12 kategorier. Atletik, svømning, cykling, skydning ...</p>",
        'more' => 'Læs mere',
      );
      print render('widget-lightgrey' , $element);
    ?>  

  </div>
  <!-- .grid -->
  
</div>