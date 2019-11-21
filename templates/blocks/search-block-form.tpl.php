<!-- SEARCH PAGE NAVIGATION --
<nav id="custom-search--navigation" class="show-for-large-up">
  <div class="row">
    <div class="medium-24 columns">
      <?php //print $search['searchpages']; ?>
    </div>
  </div>
</nav>
!-- SEARCH PAGE NAVIGATION END-->
<section>
  <div class="row">
    <div class="medium-24 columns">
      <span id="seasonal"></span>

      <div id="search-block-wrapper" class="clearfix">
        <div id="search-block-primary">
          <?php print $search['search_block_form']; ?>
          <?php print $search['select_material_type']; ?>
          <?php print $search['actions']; ?>
        </div>

        <?php if (isset($search['advanced'])): ?>
          <?php //print $search['advanced']; ?>
        <?php endif; ?>

      </div>

      <?php print $search['hidden']; ?>
    </div>
  </div>
</section>
