<div class="banner our-partner" style="height: 700px;">
  <div class="our-partner__circle">

  	<div class="our-partner__circle__content">
    <?php foreach($bg_p as $row){?>
  	<div class="our-partner__circle__content__title"><?=$row->SUBJECT?></div>
    <?php }?>
  		<br>

      <div class="col-md-12">
      <?php 
      $wow_delay = 0.25;
      foreach($image_p1 as $img){?>
  		<div class="col-md-3">
  			<div class="our-partner__circle__content__item" data-wow-delay="<?= $wow_delay ?>s" >
  				<img src="<?= base_url('uploads/'.$img->IMAGE) ?>" style="height: 80px;margin-bottom: 50px">
  			</div>
  		</div>
      <?php 
      $wow_delay = $wow_delay + 0.25;
      }?>
      <?php 
      $wow_delay = 0.25;
      foreach($image_p2 as $img){?>
      <div class="col-md-4">
        <div class="our-partner__circle__content__item" data-wow-delay="<?= $wow_delay ?>s" >
          <img src="<?= base_url('uploads/'.$img->IMAGE) ?>" style="height: 80px;margin-bottom: 50px">
        </div>
      </div>
      <?php 
      $wow_delay = $wow_delay + 0.25;
      }?>
      </div>

      <div class="col-md-12">
        <a href="<?php echo site_url('our_works/all_partners') ?>"><div class="our-partner__circle__content__subtitle">All Partner</div>
      </div>
      
  	</div>
  </div>
</div>
   