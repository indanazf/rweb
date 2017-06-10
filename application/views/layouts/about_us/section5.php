<div class="banner-5" id="newsroom">
	<?php foreach($content_press as $row){?>
	<a href="<?php echo site_url('newsroom/press_release') ?>">
	<div class="col-md-6 u-pad">
		<div class="banner-overlay">
	      <img src="<?= base_url('uploads/'.$row->IMG) ?>">
	    </div>
		<div class="banner-5__left">

			<div class="banner-5__left__icon"></div>
			<div class="banner-5__left__title"><?=$row->SUBJECT?></div>
		</div>
	</div>
	</a>
	<?php }?>
	<?php foreach($content_news as $row){?>
	<a href="<?php echo site_url('newsroom/news') ?>">
	<div class="col-md-6 u-pad">
		<div class="banner-overlay">
	      <img src="<?= base_url('uploads/'.$row->IMG) ?>">
	    </div>
		<div class="banner-5__right">
			<div class="banner-5__right__icon"></div>
			<div class="banner-5__right__title"><?=$row->SUBJECT?></div>
		</div>
	</div>
	</a>
	<?php }?>
</div>
   