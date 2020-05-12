<div class="row">
  <div class="medium-24 columns">
    <?php if (!isset($_GET['search_block_form'])): ?>
      <span id="seasonal"></span>
    <?php endif; ?>
    <div id="search-block-wrapper" class="clearfix">
      <h2 id="search-block-label"><?php print $search['search_block_label']; ?></h2>
      <div id="search-block-primary" class="clearfix">
        <?php print $search['search_block_form']; ?>
        <?php print $search['select_material_type']; ?>
        <?php print $search['actions']; ?>
      </div>
      <div class="">
        <?php if (isset($search['advanced'])): ?>
          <?php print $search['advanced']; ?>
        <?php endif; ?>
      </div>
    </div>
    <?php print $search['hidden']; ?>
  </div>
</div>
