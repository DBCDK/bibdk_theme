<article class="widget widget-dark-grey widget-height-1">
	
  <div class="inner">

		<?php if (!empty($vars['title'])): ?>
			<div class="field-title">
				<h3><a href="#"><?php print $vars['title']; ?></a></h3>
			</div>
		<?php endif; ?>

		<?php if (!empty($vars['artist'])): ?>
			<div class="field-artist">
			  <a href="#"><?php print $vars['artist']; ?></a>
			</div>
		<?php endif; ?>

		<footer>
			<?php if (!empty($vars['tags'])): ?>
				<div class="field-taxonomy">
					<?php print format_tags($vars['tags']); ?>
				</div>
			<?php endif; ?>

			<?php if (!empty($vars['more'])): ?>
				<div class="field-read-more">
					<a class="text-white" href="#">
						<span class="icon icon-left icon-blue-right">&#9660;</span>Læs mere
					</a>
				</div>	
			<?php endif; ?>
		</footer>

  </div>
  <!-- inner -->


</article>  

