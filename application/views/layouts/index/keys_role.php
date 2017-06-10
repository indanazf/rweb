<?php foreach($mission as $row){?>
<div class="keys-role bg-black">
	<div class="banner-overlay">
		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
	</div>
	
	<div class="container">
	  <div class="keys-role__content">
	    <div class="keys-role__content__title"><?=$row->SUBJECT?></div>
	    <?php foreach($list as $r){?>
	    <div class="col-md-4">
	    	<div class="keys-role__content__item">
	    		<div class="col-md-8"><img src="<?= base_url('uploads/'.$r->LINK) ?>" ></div>
	    		<div class="col-md-4"><div class="keys-role__content__item__number"><?=$r->SUBJECT?></div></div>
	    		<div class="col-md-12"><div class="keys-role__content__item__desc"><?=$r->CONTENT?></div></div>
	    	</div>
	    </div>
	    <?php }?>
	  </div>
	 </div>
	 
</div>
 <?php }?>