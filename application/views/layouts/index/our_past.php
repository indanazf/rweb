<?php foreach($bg as $row){?>
<div class="banner" style="min-height: 900px">

	<div class="container" style="position: relative;">

		<div class="row">
			
			<div class="banner-overlay-map wow animated fadeIn" data-wow-delay="0.5s" style="min-height: 700px;">
			<div class="col-md-3 u-pad" style="position: absolute;">
			  <div class="our-past__title  wow animated fadeInLeft">
			  	<?=$row->SUBJECT?>
			  </div>
			  
			</div>
			<?php foreach($content as $h){?>
				
			  	<div class="our-past__content__map" style="top: <?=$h->MARGIN_Y; ?>%; left: <?=$h->MARGIN_X; ?>%">

			    	<div class="tooltip">
			    		<div class="our-past__content">
						  	
						  	<div class="our-past__content__head">
						  		<div class="our-past__content__head__title">
						  			<?=$h->JUDUL?>
						  		</div>
						  		<div class="our-past__content__head__subtitle">
						  			<?=$h->LOCATION?> | <?=$h->SECTOR?>

						  		</div>
						  	</div>
						  	
						  	
						  	<div class="our-past__content__body">
						  		<div class="our-past__content__body__title">Objectives</div>
						  		<div class="our-past__content__body__desc"><?=$h->OBJECTIVE?></div>
						  		<table class="our-past__content__body__table">
						  			<tr> 
						  				<td valign="top"><img src="<?= base_url() ?>assets/images/farmer.png" style="width:30px; height:30px"></td>
						  				<td>
						  					<div class="our-past__content__body__value1" style="font-size: 12px">
						  					Total Beneficiaries <br><?=$h->BENEFICIARIES?>
						  					</div>
						  				</td>
						  			</tr>
						  			<tr> 
						  				<td valign="top"><img src="<?= base_url() ?>assets/images/" style="width:30px; height:30px"></td>
						  				<td>
						  					<div class="our-past__content__body__value1" style="font-size: 12px">
						  					Budgets <br><?=$h->VALUE?>
						  					</div>
						  				</td>
						  			</tr>
						  			<tr> 
						  				<td valign="top"><img src="<?= base_url() ?>assets/images/handshake.png" style="width:30px; height:30px"></td>
						  				<td>
						  					<div class="our-past__content__body__value1" style="font-size: 12px">
						  					Partners <br><?=$h->PARTNER?>
						  					</div>
						  				</td>
						  			</tr>
						  			<tr> 
						  				<td valign="top"><img src="<?= base_url() ?>assets/images/....png" style="width:30px; height:30px"></td>
						  				<td>
						  					<div class="our-past__content__body__value1" style="font-size: 12px">
						  					Year Awarded <br><?=$h->YEAR_AWARDED?>
						  					</div>
						  				</td>
						  			</tr>
						  			<tr> 
						  				<td valign="top"><img src="<?= base_url() ?>assets/images/....png" style="width:30px; height:30px"></td>
						  				<td>
						  					<div class="our-past__content__body__value1" style="font-size: 12px">
						  					Year Completed <br><?=$h->YEAR_COMPLETED?>
						  					</div>
						  				</td>
						  			</tr>
						  		</table>
						  	</div>


						  </div>
			    	</div>
			  	</div>
			  	<?php } ?>
				<img src="<?= base_url('uploads/'.$row->IMG) ?>">

			</div>
			
			

		</div>
	</div>
</div>
<?php }?>

