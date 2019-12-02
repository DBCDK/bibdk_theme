<div class="row">
  <div class="medium-24 columns">
    <?php if (!isset($_GET['search_block_form'])): ?>
      <span id="seasonal"></span>
    <?php endif; ?>
    <div id="search-block-wrapper" class="clearfix">
      <h1><?php print t('Søg,&nbsp;find&nbsp;og&nbsp;lån fra&nbsp;alle&nbsp;Danmarks&nbsp;biblioteker'); ?></h1>
      <div id="search-block-primary">
        <?php print $search['search_block_form']; ?>
        <?php print $search['select_material_type']; ?>
        <?php print $search['actions']; ?>
      </div>
      <!-- SEARCH PAGE NAVIGATION -->
      <nav id="custom-search--navigation">
        <div class="row">
          <div class="medium-24 columns">
            <?php print $search['searchpages']; ?>
          </div>
        </div>
      </nav>
      <!-- SEARCH PAGE NAVIGATION END-->
      <?php if (isset($search['advanced']) && isset($_GET['search_block_form'])): ?>
        <?php print $search['advanced']; ?>
      <?php endif; ?>
    </div>
    <?php print $search['hidden']; ?>
  </div>
</div>
