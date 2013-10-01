<?php
/**
 * @file
 *
 *
 * * Available variables:
 * - $tab_position: String with settings info, values: top,bottom,left,right.
 * - $searches: Array with each tab search.
 *
 */
?>

<!-- The wrapper div is important because rs-carousel replaces it -->
<div class="rs-carousel-wrapper <?php echo $toggle_description; ?>">
  <div class="rs-carousel">

    <div class="rs-carousel-header span12">
      <span class="materialtype book-icon-small" title="book"></span>
      <span class="header"><?php echo t('LABEL_CAROUSEL_HEADER', array(), array('context' => 'ting_search_carousel')); ?></span>
    </div>

    <!-- Only print dropdown if there is more than 1 -->
    <?php if (count($searches) > 1): ?>
    <div class="rs-carousel-select span12">
      <form>
        <select>
          <!--
          <option value="" class="">
            <?php echo t('LABEL_CAROUSEL_SELECT'); ?>
          </option>
          -->
        <?php foreach ($searches as $i => $search): ?>
          <option value="<?php echo $i; ?>"
                  class="<?php echo ($i == 0) ? 'active' : ''; ?>" <?php echo ($i == 0) ? 'selected=selected' : ''; ?>>
            <?php echo $search['title'] ?>
          </option>
        <?php endforeach; ?>
        </select>
      </form>
    </div>
    <?php endif; ?>

    <div class="rs-carousel-inner span24 clearfix">
      <div class="ajax-loader"></div>
      <?php if ( $toggle_description == 'rs-carousel-wide' ): ?>
        <div class="rs-carousel-title"></div>
      <?php endif; ?>
      <ul class="rs-carousel-runner">
      </ul>
    </div>

  </div>
</div>
