<div id="block-music" class="block clearfix">

  <div class="grid_24">

    <div class="block-title">
      <h2>Ny musik</h2>
    </div>

  </div>
  <!-- .grid -->

  <div class="grid_14">

    <?php 
      $element = array(
        'box_height' => '2',
        'title' => "Violator",
        'image' => array(
          '#src' => 'img/content/violator.png',
          '#width' => '350',
          '#height' => '320',
        ),
        'body' => "<p>Depeche Mode</p>",
        'more' => 'Læs mere',
      );
      print render('mediabox-large-lightgrey' , $element);
    ?> 

  </div>
  <!-- .grid -->

  <div class="grid_5">
    <?php 
      $element = array(
        'title' => "Lukas Graham",
        'artist' => "Lukas Graham",
        'tags' => array('folk'),
      );
      print render('mediabox-small-darkgrey' , $element);
    ?>   
    <?php 
      $element = array(
        'title' => "Warrior // Worrier",
        'artist' => "Outlandish",
        'tags' => array('hip hop'),
      );
      print render('mediabox-small-darkgrey' , $element);
    ?>
  </div>
  <!-- .grid -->

  <div class="grid_5">
    <?php 
      $element = array(
        'title' => "21",
        'artist' => "Adele",
        'tags' => array('pop'),
      );
      print render('mediabox-small-darkgrey' , $element);
    ?>   
    <?php 
      $element = array(
        'title' => "Old ideas",
        'artist' => "Leonard Cohen",
        'tags' => array('jazz'),
      );
      print render('mediabox-small-darkgrey' , $element);
    ?>
    <?php 
      $element = array(
        'title' => "21",
        'artist' => "Adele",
        'tags' => array('pop'),
      );
      print render('mediabox-small-darkgrey' , $element);
    ?>   
  </div> 
  <!-- .grid -->

</div>