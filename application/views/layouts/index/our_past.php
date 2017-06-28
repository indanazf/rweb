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
						  			<?=$h->SUBJECT?>
						  		</div>
						  		<div class="our-past__content__head__subtitle">
						  			<?=$h->SUBTITLE?>

						  		</div>
						  	</div>
						  	
						  	
						  	<div class="our-past__content__body">
						  		<!-- <div class="our-past__content__body__title">Objectives</div>
						  		<div class="our-past__content__body__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</div> -->
						  		<table class="our-past__content__body__table">
						  			<tr> 
						  				<td valign="top"><img src="<?= base_url() ?>assets/images/farmer.png" style="width:50px; height:50px"></td>
						  				<td rowspan="2">
						  					<div class="our-past__content__body__value1" style="font-size: 12px"><?=$h->CONTENT?></div>
						  				</td>
						  				<!-- <td width="60" valign="top"><img src="<?= base_url() ?>assets/images/farmer.png" width="60"></td> -->
						  				<!-- 
						  				<td>
						  					<div class="our-past__content__body__desc"><?=$h->CONTENT?></div>
						  				</td> -->
						  			</tr>
						  			<tr> 
						  				<td valign="top"><img src="<?= base_url() ?>assets/images/handshake.png" style="width:50px; height:50px"></td>
						  				<td>
						  					<!-- <div class="our-past__content__body__title"></div>
						  					<div class="our-past__content__body__value1"> <?=$h->CONTENT?> </div> -->
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

