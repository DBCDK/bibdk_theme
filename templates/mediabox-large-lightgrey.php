<article class="mediabox mediabox-large-lightgrey">
	
	<?php if ($vars['image']): ?>
	  <div class="field-image">
      <img src="<?php print $vars['image']['#src']; ?>" width="<?php print $vars['image']['#width']; ?>" height="<?php print $vars['image']['#height']; ?>"/>
    </div>
	<?php endif; ?>


	<div class="mediabox-content box-height-<?php print $vars['box_height']; ?>">

	  <div class="inner">

			<?php if ($vars['title']): ?>
				<h3><a href="http://google.com"><?php print $vars['title']; ?></a></h3>
			<?php endif; ?>

			<?php if ($vars['body']): ?>
				<div class="field-body">
				  <?php print $vars['body']; ?>
				</div>
			<?php endif; ?>

			<footer class="footer">
				<?php if ($vars['more']): ?>
					<div class="field-read-more">
						<a class="link-blue-rightarrow" href="http://ibm.com"><?php print $vars['more']; ?></a>
					</div>	
				<?php endif; ?>
			</footer>

		</div> 
		<!-- .inner -->

  </div> 
  <!-- .mediabox-content -->

</article>  
<!-- .mediabox -->
