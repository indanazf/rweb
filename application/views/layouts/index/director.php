<?php foreach($director as $row){?>
<div class="director">
	<div class="container">
		<div class="director__content">
			<div class="col-md-5" style="text-align: center;">
				<img src="<?= base_url('uploads/'.$row->IMG) ?>" class="director__content__img">
			</div>
			<div class="col-md-7">
				<div class="director__content__name"><?=$row->SUBJECT?></div>
				<div class="director__content__position"><?=$row->SUBTITLE?></div>
				<div class="director__content__desc"><?=$row->CONTENT?></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php }?>