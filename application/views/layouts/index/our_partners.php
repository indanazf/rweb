<div class="banner our-partner" style="height: 700px;">
  <div class="our-partner__circle">

  	<div class="our-partner__circle__content">
    <?php foreach($bg as $row){?>
  	<div class="our-partner__circle__content__title wow animated fadeInUp"><?=$row->SUBJECT?></div>
    <?php }?>
  		<br>
      <?php 
      $wow_delay = 0.25;
      foreach($image as $img){?>
  		<div class="col-md-4">
  			<div class="our-partner__circle__content__item wow animated fadeIn" data-wow-delay="<?= $wow_delay ?>s" >
  				<img src="<?= base_url('uploads/'.$img->IMAGE) ?>" >
  			</div>
  		</div>
      <?php 
      $wow_delay = $wow_delay + 0.25;
      }?>
      <!--
  		<div class="col-md-4">
  			<div class="our-partner__circle__content__item ">
  				<img src="<?= base_url() ?>assets/images/partner-2.png">
  			</div>
  		</div>
  		<div class="col-md-4">
  			<div class="our-partner__circle__content__item ">
  				<img src="<?= base_url() ?>assets/images/partner-3.png">
  			</div>
  		</div>
  		<div class="col-md-4">
  			<div class="our-partner__circle__content__item ">
  				<img src="<?= base_url() ?>assets/images/partner-4.png">
  			</div>
  		</div>
  		<div class="col-md-4">
  			<div class="our-partner__circle__content__item ">
  				<img src="<?= base_url() ?>assets/images/partner-5.png">
  			</div>
  		</div>
  		<div class="col-md-4">
  			<div class="our-partner__circle__content__item ">
  				<img src="<?= base_url() ?>assets/images/partner-6.png">
  			</div>
  		</div> -->
  	</div>
  </div>
</div>
   