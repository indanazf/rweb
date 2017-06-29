<div class="slide">
<div class="success-stories">
	<div class="success-stories__frame">
	<div class="success-stories__badge"><?=$judul?></div>
	<?php
	$data = $counter;
	?>
		<div class="success-stories__content" style="width: <?php echo $counter * 380; ?>px;">
		<?php if($success){?>
			<?php foreach($success as $row){?>
			<div class="success-stories__content__item">
				<div class="banner-overlay">
					<img src="<?= base_url('uploads/'.$row->IMG) ?>" style="min-width: 700px;">
				</div>
				
				<div class="success-stories__content__item__headline">
					<?php 
						$subject = substr($row->SUBJECT, 0,10);
						$content = substr($row->CONTENT, 0,220);
					?>
					<a href="" style="color:white"><div class="success-stories__content__item__headline__title"><?=$subject?>...</div></a>
					<div class="success-stories__content__item__headline__desc"><?=$content?>... <a href=""><b>read more</b></a></div>		
				</div>
			</div>

			<?php }?>
			<?php }else{ ?>
			<div class="success-stories__content__item">
				<div class="banner-overlay">
					<img src="">
				</div>
				
				<div class="success-stories__content__item__headline">
					<a href="" style="color:white"><div class="success-stories__content__item__headline__title">...</div></a>
					<div class="success-stories__content__item__headline__desc">... <a href=""><b>read more</b></a></div>		
				</div>
			</div>
			<?php }?>

			<div class="clear"></div>
		</div>
	</div>
</div>
</div>
   