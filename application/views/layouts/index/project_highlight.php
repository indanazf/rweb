<?php foreach($bg_ph as $row){?>
<div class="banner">
	
	<div class="container">
		<div class="col-md-3 u-pad">
		  <div class="our-past__title">
		  	<?=$row->SUBJECT?>
		  </div>
		</div>
		  <img src="<?= base_url('uploads/'.$row->IMG) ?>" width="100%" style="margin-top: 20px">
	</div>
</div>
<?php }?>