<?php foreach($content_introducing as $row){?>
<div class="introducing">
	<div class="introducing__banner">
		<div class="banner-overlay banner-overlay-2">
      		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
    	</div>
    	<div class="introducing__banner__title"><?=$row->SUBJECT?></div>
	</div>
	<div class="container">
		<div class="introducing__content">
			<?=$row->CONTENT?>
		</div>
	</div>
</div>
<?php } ?>
   