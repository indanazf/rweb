<div class="slide">
	<div class="map-detail">
		<div class="container" style="position: relative;">
			<div class="map-detail__content">
				<div class="row">
					<?php foreach($detail as $row){?>
					<div class="col-md-3">
						<div class="map-detail__content__item">
							<div class="map-detail__content__item__left">
								<img src="<?= base_url('uploads/'.$row->LINK) ?>" class="map-detail__content__item__left__img">
							</div>
							<div class="map-detail__content__item__right">
								<div class="map-detail__content__item__right__title"><b><?=$row->SUBJECT?></b></div>
								<div class="map-detail__content__item__right__value"><?=$row->CONTENT?></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			
			

		</div>
		<div class="container" style="position: relative;">
			<div class="row">
				<div class="col-md-6">
					<div class="map-detail__content__subtitle">Portfolio Split by:</div>
					<div class="map-detail__content__title">Sectore Coverage</div>
					<div class="map-detail__content__chart">
						<div id="container_chart-1" style="height: 250px; width: 100%; margin: 0 auto"></div>

					</div>

				</div>
				<div class="col-md-6">
					<div class="map-detail__content__subtitle">&nbsp;</div>
					<div class="map-detail__content__title">Geography</div>
					<div class="map-detail__content__chart">
						<div id="container_chart-2" style="height: 250px; width: 100%; margin: 0 auto"></div>
					</div>

				</div>
				
				<div class="map-detail__content__desc">Working with partners to create<br>opportunities and empower<br>the less fortunate</div>
					

			</div>
			
			<?php foreach($bg as $bg){?>
				
				<img src="<?= base_url('uploads/'.$bg->IMG) ?>" class="map-detail__background__img">
			
			<?php }?>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/highchart/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/highchart/highcharts.js"></script>

<script type="text/javascript">
	
$(document).ready(function () {

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

    // Build the chart
    Highcharts.chart('container_chart-2', {
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
                name: 'Java',
                y: 45
            }, {
                name: 'Sumatera',
                y: 15
            }, {
                name: 'Kalimantan',
                y: 10
            }, {
                name: 'NTT',
                y: 25
            }, {
                name: 'Sulawesi',
                y: 5
            }]
        }]
    });
});
</script>