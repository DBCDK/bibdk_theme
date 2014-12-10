<div class="row">
  <div class="small-24 columns">
    <div class="panel panel-top">
      <?php print $content['top']; ?>
    </div>
  </div>
</div>

<div class="row">
  <div class="medium-6 hide-for-small columns">
    <div class="panel panel-left">
      <?php print $content['facets']; ?>
    </div>
  </div>
  <div class="medium-18 columns">
    <div class="panel panel-middle">
      <section class="works">
        <div class="works-controls clearfix">
          <?php print $content['works_controls_top']; ?>
        </div>
        <div>
          <?php print $content['works']; ?>
        </div>
        <div class="works-controls clearfix">
          <?php print $content['works_controls_bottom']; ?>
        </div>
      </section>
    </div>
  </div>
</div>

<div class="row">
  <div class="small-24 columns">
    <div class="panel panel-bottom">
      <?php print $content['bottom']; ?>
    </div>
  </div>
</div>
