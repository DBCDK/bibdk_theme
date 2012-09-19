<article class="widget-wrapper">
	
	<?php if (!empty($vars['image'])): ?>
	  <div class="field-image">
      <a href="#">
      	<img src="<?php print $vars['image']['#src']; ?>" width="<?php print $vars['image']['#width']; ?>" height="<?php print $vars['image']['#height']; ?>"/>
      </a>
    </div>
	<?php endif; ?>


	<div class="widget widget-light-grey widget-height-<?php print $vars['box_height']; ?>">

	  <div class="inner">

			<?php if (!empty($vars['title'])): ?>
				<div class="field-title">
					<h3><a href="http://google.com"><?php print $vars['title']; ?></a></h3>
				</div>
			<?php endif; ?>

			<?php if (!empty($vars['body'])): ?>
				<div class="field-body">
				  <?php print $vars['body']; ?>
				</div>
			<?php endif; ?>

			<footer class="footer">
				<?php if (!empty($vars['more'])): ?>
					<div class="field-read-more">
						<a class="icon-link icon-link-right" href="http://ibm.com"><?php print $vars['more']; ?></a>
					</div>	
				<?php endif; ?>
			</footer>

		</div> 
		<!-- inner -->

  </div> 
  <!-- widget -->

</article>  
<!-- widget-wrapper -->
