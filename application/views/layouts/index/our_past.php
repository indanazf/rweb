<?php foreach($bg as $row){?>
<div class="banner" style="min-height: 800px">

	<a href="<?php echo site_url('our_works/downloads') ?>"><div class="past__circle-button__item__circle past__circle-button__item__circle__item-1"></div></a>
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
<div class="banner" style="min-height: 400px">
<div class="container" style="position: relative;">
<div class="row wow animated fadeIn">
				<div class="col-md-6">
					<div class="map-detail__content__title">Sectore Coverage</div>
					<div class="map-detail__content__chart">
						<div id="container_chart-1" data-wow-delay="2.5s" style="height: 250px; width: 100%; margin: 0 auto"></div>
					</div>
				</div>
				<div class="map-detail__content__desc">Working with partners to create<br>opportunities and empower<br>the less fortunate</div>
			</div>
			<?php foreach($bg2 as $bg){?>
				
				<img src="<?= base_url('uploads/'.$bg->IMG) ?>" class="map-detail__background__img wow animated fadeIn">
			
			<?php }?>
</div>
</div>
<script src="<?= base_url() ?>assets/js/highchart/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/highchart/highcharts.js"></script>

<!-- counter -->
<script src="<?= base_url() ?>assets/js/counter/jquery.min.js"></script> 
<script src="<?= base_url() ?>assets/js/counter/waypoints.min.js"></script> 
<script src="<?= base_url() ?>assets/js/counter/jquery.counterup.min.js"></script> 


<script type="text/javascript">
	
$(document).ready(function () {

    $('.counter').counterUp({
        delay: 10,
        time: 3000
    });

    // Build the chart
    Highcharts.chart('container_chart-1', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                colors: [
			     '#8eb73f', 
			     '#27a557', 
			     '#2b9070', 
			     '#0093b6', 
			     '#55bac9'
			   ],
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white'
                    },
                    format: ' {point.percentage:.1f} %',
                },
                showInLegend: true,
                
            }
        },
        legend: {
            align: 'right',
            layout: 'vertical',
            verticalAlign: 'top',
            x: -100,
            y: 60
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            
            data: [{
                name: 'Agriculture',
                y: 45
            }, {
                name: 'Micro-finance',
                y: 15
            }, {
                name: 'Health',
                y: 10
            }, {
                name: 'Environment',
                y: 25
            }, {
                name: 'Research',
                y: 5
            }]
        }]
    });
});
</script>