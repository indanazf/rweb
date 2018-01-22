<div class="banner our-partner" style="height: 700px;">

  	<div class="our-partner__circle__content__all">
    <?php foreach($bg as $row){?>
  	<div class="our-partner__circle__content__title">All Partners</div>
    <?php }?>
  		<br>

      <div class="col-md-12">
      <?php 
      $wow_delay = 0.25;
      foreach($image as $img){?>
  		<div class="col-md-4">
  			<div class="our-partner__circle__content__item" data-wow-delay="<?= $wow_delay ?>s" >
  				<img src="<?= base_url('uploads/'.$img->IMAGE) ?>" style="height: 80px;margin-bottom: 50px">
  			</div>
  		</div>
      <?php 
      $wow_delay = $wow_delay + 0.25;
      }?>
      </div>

     
  	</div>
  
</div>
   