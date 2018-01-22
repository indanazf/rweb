<?php foreach($vision as $row){?>
<div class="solution">
	<div class="solution__banner">
		<div class="banner-overlay banner-overlay-2  wow animated fadeIn">
      		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
    	</div>
    	<div class="solution__banner__title wow animated fadeIn" data-wow-delay="0.25s"><?=$row->SUBJECT?></div>
    	<div class="container">
	    	<div class="volunteer__content__icon media-social-icon">
			  	<div class="volunteer__content__icon__item">
			  	<a href="https://twitter.com/Sahabat_Cipta">
			  		<img src="<?= base_url('/assets/images/Asset-2.png') ?>">
			  	</a>
			  	</div>
			  	<div class="volunteer__content__icon__item">
			  	<a href="https://www.facebook.com/sahabatcipta">
			  		<img src="<?= base_url('/assets/images/Asset-3.png') ?>">
			  	</a>
			  	</div><div class="volunteer__content__icon__item"><img src="<?= base_url('/assets/images/Asset-4.png') ?>"></div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="solution__content  wow animated fadeInUp" data-wow-delay="0.5s">
			<?=$row->CONTENT?>
		</div>
	</div>
	
</div>
<?php }?>   