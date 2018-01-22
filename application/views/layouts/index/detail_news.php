<div class="container">

	
	<div class="press-release__content">
		<div class="col-md-12">
			<div class="press-release__content__img">
			<img src="<?= base_url('uploads/'.$row->IMG)  ?>"></div>
		</div>
		<div class="col-md-12">
			<div class="press-release__content__date"><?=$row->LAST_UPDATE?></div>
			<div class="press-release__content__title"><?=$row->SUBJECT?></div>
			<div class="press-release__content__detail__desc"><?=$row->CONTENT?></div>
		</div>
		<div class="clear"></div>
	</div>
	
</div>