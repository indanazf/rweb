<div class="team">
	<div class="container">
		<div class="team__content">
			<?php 
			$wow_delay = 0;
			foreach($team as $row){?>
			<div class="col-md-3">
				<div class="team__content__item wow animated fadeIn" data-wow-delay="<?= $wow_delay ?>s">
					<img src="<?= base_url('uploads/'.$row->IMAGE) ?>" class="team__content__item__img">
					<div class="team__content__item__name"><?=$row->NAME_IMAGE?></div>
					<div class="team__content__item__position"><?=$row->INFO?></div>
				</div>
			</div>
			<?php
			$wow_delay = $wow_delay + 0.25;
			}
			?>
			<div class="clear"></div>
		</div>
	</div>
</div>
   