<div class="map-detail">
	<div class="container">
		<div class="map-detail__content">
			<div class="row">
				<?php foreach($detail as $row){?>
				<div class="col-md-3">
					<div class="map-detail__content__item">
						<div class="map-detail__content__item__left">
							<img src="<?= base_url('uploads/'.$row->LINK) ?>" class="map-detail__content__item__left__img">
						</div>
						<div class="map-detail__content__item__right">
							<div class="map-detail__content__item__right__title"><b><?=$row->SUBJECT?></b></div>
							<div class="map-detail__content__item__right__value"><?=$row->CONTENT?></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php foreach($bg as $bg){?>
		<div class="map-detail__background">
			<img src="<?= base_url('uploads/'.$bg->IMG) ?>" class="map-detail__background__img">
		</div>
		<?php }?>
	</div>
</div>
   