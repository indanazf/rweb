<?php foreach($mission as $row){?>
<div class="keys-role">
	<div class="banner-overlay banner-overlay-volunteer wow animated fadeIn">
		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
	</div>
	
	<div class="container">
	  <div class="keys-role__content">
	    <div class="keys-role__content__title  wow animated fadeIn" data-wow-delay="0.5s"><?=$row->SUBJECT?></div>
	    <?php 
	    $wow_delay = 0.5;
	    foreach($list as $r){?>
	    <div class="col-md-4 wow animated fadeInUp" data-wow-delay="<?= $wow_delay ?>s">
	    	<div class="keys-role__content__item">
	    		<div class="col-md-8"><img src="<?= base_url('uploads/'.$r->LINK) ?>" ></div>
	    		<div class="col-md-4"><div class="keys-role__content__item__number"><?=$r->SUBJECT?></div></div>
	    		<div class="col-md-12"><div class="keys-role__content__item__desc"><?=$r->CONTENT?></div></div>
	    	</div>
	    </div>
	    <?php 
	    $wow_delay = $wow_delay + 0.25;
	    }?>
	  </div>
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
	  	</div>
		<div class="volunteer__content__icon__item"><img src="<?= base_url('/assets/images/Asset-4.png') ?>"></div>
	  </div>
	 </div>
	 
</div>
 <?php }?>