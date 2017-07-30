
<?php foreach($annual as $row){?>
<div class="slide">
<div class="banner">
	
	<div class="container">
		<div class="col-md-3 u-pad">
		  <div class="annual-report__title wow animated fadeInLeft">
		  	<?=$row->SUBJECT?> 
		  </div>
		</div>

		  <img src="<?= base_url('uploads/'.$row->IMG) ?>" width="100%" style="margin-top: 20px">
	</div>
</div>
</div>
<?php }?>