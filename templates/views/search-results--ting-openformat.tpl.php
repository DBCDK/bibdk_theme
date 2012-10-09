<?php
/*
 * @file
 * This file overrides search-results.tpl.php in modules/search
 */
?>
<?php if ($search_results): ?>
  <section class="works" >
    <?php print $search_results; ?>
  </section>
  <?php $pager; ?>
<?php else : ?>
  <h2><?php print t('Your search yielded no results'); ?></h2>
  <?php print search_help('search#noresults', drupal_help_arg()); ?>
<?php endif; ?>