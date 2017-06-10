<div class="success-stories">
	<div class="success-stories__frame">
	<div class="success-stories__badge">Success Stories</div>
	<?php
	$data = $counter;
	?>
		<div class="success-stories__content" style="width: <?php echo $counter * 380; ?>px;">
			<?php foreach($success as $row){?>
			<div class="success-stories__content__item">
				<div class="banner-overlay">
					<img src="<?= base_url('uploads/'.$row->IMG) ?>">
				</div>
				
				<div class="success-stories__content__item__headline">

					<div class="success-stories__content__item__headline__title"><?=$row->SUBJECT?></div>		
					<div class="success-stories__content__item__headline__desc"><?=$row->CONTENT?></div>		
				</div>
			</div>

			<?php }?>

			<div class="clear"></div>
		</div>
	</div>
</div>
   