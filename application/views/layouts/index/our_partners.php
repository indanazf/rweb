<div class="banner our-partner" style="height: 700px;">
  <div class="our-partner__circle">

  	<div class="our-partner__circle__content">
    <?php foreach($bg as $row){?>
  	<div class="our-partner__circle__content__title"><?=$row->SUBJECT?></div>
    <?php }?>
  		<br>
      <?php foreach($image as $img){?>
  		<div class="col-md-4">
  			<div class="our-partner__circle__content__item " >
  				<img src="<?= base_url('uploads/'.$img->IMAGE) ?>" >
  			</div>
  		</div>
      <?php }?>
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
   