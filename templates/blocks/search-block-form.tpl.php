<div id="search-block-action" class="clearfix">
  <?php print $search['actions']; ?>
</div>

<?php if (isset($search['searchpages'])): ?>
  <?php print $search['searchpages']; ?>
<?php endif; ?>

<div id="search-block-wrapper" class="clearfix">

  <div id="search-block-textinput" class="clearfix">
    <?php print $search['search_block_form']; ?>
  </div>

  <?php if (isset($search['advanced'])): ?>
    <?php print $search['advanced']; ?>
  <?php endif; ?>

</div>

<?php print $search['hidden']; ?>
