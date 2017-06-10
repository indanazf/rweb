<?php foreach($vision as $row){?>
<div class="solution">
	<div class="solution__banner">
		<div class="banner-overlay banner-overlay-2">
      		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
    	</div>
    	<div class="solution__banner__title"><?=$row->SUBJECT?></div>
	</div>
	<div class="container">
		<div class="solution__content">
			<?=$row->CONTENT?>
		</div>
	</div>
</div>
<?php }?>   