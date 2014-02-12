<?php if (isset($search['searchpages'])): ?>
  <?php print $search['searchpages']; ?>
<?php endif; ?>

<div id="search-block-wrapper" class="clearfix">

  <div id="search-block-primary">
    <?php print $search['search_block_form']; ?>
    <?php print $search['actions']; ?>
  </div>

  <?php if (isset($search['advanced'])): ?>
    <?php print $search['advanced']; ?>
  <?php endif; ?>

</div>


<?php print $search['hidden']; ?>
