<?php
/**
 * @file
 *
 */
// dpm($variables);
?>
<li class="rs-carousel-item">
  <a href="search/work/rec.id=<?php echo urlencode($collection->pid); ?>" class="rs-carousel-item-image"><img src="<?php echo $collection->image; ?>" alt=""/></a>
  <a href="search/work/rec.id=<?php echo urlencode($collection->pid); ?>" class="rs-carousel-item-title"><?php print check_plain($collection->title); ?></a>
</li>
