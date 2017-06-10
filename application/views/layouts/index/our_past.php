<?php foreach($bg as $row){?>
<div class="banner">
	<div class="banner-overlay">
		<img src="<?= base_url('uploads/'.$row->IMG) ?>">
	</div>
	<div class="container">
		<div class="col-md-3 u-pad">
		  <div class="our-past__title">
		  	<?=$row->SUBJECT?>
		  </div>
		  <div class="our-past__content">
		  	<?php foreach($header as $h){?>
		  	<div class="our-past__content__head">
		  		<div class="our-past__content__head__title">
		  			<?=$h->SUBJECT?>
		  		</div>
		  		<div class="our-past__content__head__subtitle">
		  			<?=$h->CONTENT?>
		  		</div>
		  	</div>
		  	<?php } ?>
		  	
		  	<div class="our-past__content__body">
		  		<div class="our-past__content__body__title">Objectives</div>
		  		<div class="our-past__content__body__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor </div>
		  		<table class="our-past__content__body__table">
		  			<tr> 
		  				<td valign="top"><img src="<?= base_url() ?>assets/images/farmer.png" width="60"></td>
		  				<td>
		  					<div class="our-past__content__body__title">Total Beneficiaries</div>
		  					<div class="our-past__content__body__value2">75+</div>
		  					<div class="our-past__content__body__title">Budges</div>
		  					<div class="our-past__content__body__value1">Rp1.000.000.000</div>
		  				</td>
		  			</tr>
		  			<tr> 
		  				<td valign="top"><img src="assets/images/handshake.png" width="60"></td>
		  				<td>
		  					<div class="our-past__content__body__title">Partners</div>
		  					<div class="our-past__content__body__value1"></div>
		  				</td>
		  			</tr>
		  		</table>
		  	</div>
		  	
		  </div>
		</div>
	</div>
</div>
<?php }?>