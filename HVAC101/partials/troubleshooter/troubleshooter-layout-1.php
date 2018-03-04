<?php 
$content=get_option('home-troubleshooter-content');
?>
<div class="troubleshooter-calculator-container">
	<div class="container">
		<div class="row">
				<div class="col-md troubleshooter-content-wrapper text-center">
					<h3 class="section_heading text-center"><?php echo get_option('home-troubleshooter-title'); ?></h3>
		    		<?php echo $content; ?>
		    	</div>
		</div>
	</div>
</div>