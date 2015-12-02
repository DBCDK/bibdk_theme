<?php dpm($icon, 'ICON'); ?>
<span class="svg-icon">
  <svg class="<?php print $icon; ?>" title="<?php print $title;?>" alt="<?php print $title;?>">
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-<?php print $icon; ?>"></use>
  </svg>
</span>
<?php print $text; ?>
