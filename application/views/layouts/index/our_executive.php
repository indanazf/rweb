<?php foreach($executive as $row){?>
<div class="our-executive">
	<div class="banner-overlay">
		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
	</div>
	
	<div class="container">
	  <div class="our-executive__content">
	    <div class="our-executive__content__title">Our Executive<br>Director</div>
	    <div class="our-executive__content__subtitle">Mrs. Dollaris Riauaty (Waty) Suhadi</div>
	    <div class="our-executive__content__desc">In SC we take pride in our well-trainer, experience,<br> highly committed specialist.</div>
	    <a href="<?php echo site_url($row->LINK) ?>"><span class="our-executive__content__button"><?=$row->TAGS?></span></a>
	  </div>
	</div>
</div>
<?php }?>