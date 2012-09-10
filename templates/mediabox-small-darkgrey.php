<article class="mediabox mediabox-small-darkgrey">
	

  <div class="inner">

		<?php if ($vars['title']): ?>
			<h3><a href="#"><?php print $vars['title']; ?></a></h3>
		<?php endif; ?>

		<?php if ($vars['artist']): ?>
			<div class="field-artist">
			  <?php print $vars['artist']; ?>
			</div>
		<?php endif; ?>

		<footer class="footer">
			<?php if ($vars['tags']): ?>
				<div class="field-taxonomy">
					<?php print format_tags($vars['tags']); ?>
				</div>
			<?php endif; ?>

			<?php if ($vars['more']): ?>
				<div class="field-read-more">
					<a class="link-blue-rightarrow" href="#">Læs mere</a>
				</div>	
			<?php endif; ?>
		</footer>

  </div> 


</article>  

