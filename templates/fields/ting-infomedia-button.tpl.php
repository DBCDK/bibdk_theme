<a href="<?php print $ting_infomedia_button['#href'] ?>"
   class="<?php print $ting_infomedia_button['#popup'] ?>popover-button text-small text-darkgrey"
   rel="infomedia">
  <span class="icon icon-left icon-darkgrey-infomedia">&nbsp;</span>
  <span class="link-infomedia infomedia-title" data-pid="<?php print $ting_infomedia_button['#data-pid'] ?>"><?php print $ting_infomedia_button['#title'] ?></span>
</a>

<div class='popover element-wrapper visuallyhidden infomedia-wrapper'>
  <p class="user-msg"><?php print $ting_infomedia_button['#user-message'] ?></p>
  <p class='close icon icon-left icon-red-x'>&nbsp;</p>
</div>
