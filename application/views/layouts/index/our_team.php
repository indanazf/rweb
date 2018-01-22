<?php foreach($team as $row){?>
<div class="our-team">
	<div class="banner-overlay">
		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
	</div>
	
	  <div class="our-team__content">
	    <div class="our-team__content__title"><?=$row->SUBJECT?></div>
	    <div class="our-team__content__desc">In SC we take pride in our well-trainer, experience,<br> highly committed specialist.</div>
	    <a href="<?php echo site_url($row->LINK) ?>"><span class="our-team__content__button"><?=$row->TAGS?></span></a>
	  </div>
	 
</div>
<?php }?>
   