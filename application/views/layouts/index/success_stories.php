<div class="success-stories">
	<div class="success-stories__frame">
	<div class="success-stories__badge">Success Stories</div>
	<?php
	$data = 10;
	?>
		<div class="success-stories__content" style="width: <?php echo $data * 380; ?>px;">
			
			<?php
				for($i=1; $i<=10; $i++){
				?>
			<div class="success-stories__content__item">
				<div class="banner-overlay">
					<img src="assets/images/banner1.jpg">
				</div>
				
				<div class="success-stories__content__item__headline">

					<div class="success-stories__content__item__headline__title">Headline</div>		
					<div class="success-stories__content__item__headline__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>		
				</div>
			</div>
			<?php
			}
			?>
			<div class="clear"></div>
		</div>
	</div>
</div>
   