<?php foreach($about_us as $row){?>
<div class="banner">
	<div class="banner-overlay">
		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
	</div>
	<div class="col-md-5 u-pad">
		<div class="banner-1__content">
			<div class="banner-1__content__title"><?=$row->SUBJECT?></div>
			<div class="banner-1__content__desc"><?=$row->CONTENT?></div>
			<a href="<?php echo site_url($row->LINK) ?>"><div class="button__readmore__long"><?=$row->TAGS?></div></a>
		</div>
	</div>
</div>
<?php } ?>
