<div class="slide">
<div class="success-stories">
	<div class="success-stories__frame">
	
	<?php
	$data = $counter;
	?>
		<div class="success-stories__content" style="width: <?php echo $counter * 380; ?>px;">
		<?php if($success){?>
			<?php 
			$ss_slider = 1;
			foreach($success as $row){?>
			<div class="success-stories__content__item" id="success-stories__content__item__animate-<?= $ss_slider?>">
				<?php if($ss_slider==1){ ?>
				<div class="success-stories__badge"><?=$judul?></div>
				<?php } ?>
				<div class="banner-overlay__height">
					<img src="<?= base_url('uploads/'.$row->IMG) ?>">
				</div>
				
				<div class="success-stories__content__item__headline">
					<?php 
						$subject = substr($row->SUBJECT, 0,10);
						$content = substr($row->CONTENT, 0,220);
					?>
					<a href="#" data-toggle="modal" data-target="#myModal-<?= $ss_slider?>" class="title-readmore" style="color:white;text-decoration: none;"><div class="success-stories__content__item__headline__title"><?=$subject?>...</div></a>
					<div class="success-stories__content__item__headline__desc"><?=$content?>... 
					<a href="#" data-toggle="modal" data-target="#myModal-<?= $ss_slider?>" class="readmore" style="text-decoration: none;"><b>read more</b></a></div>		
				</div>
			</div>

			
			

			<?php 
			$ss_slider++;
			}

			?>
			<?php }else{ ?>
			<div class="success-stories__content__item">
				<div class="banner-overlay">
					<img src="">
				</div>
				
				<div class="success-stories__content__item__headline">
					<a href="" style="color:white"><div class="success-stories__content__item__headline__title">...</div></a>
					<div class="success-stories__content__item__headline__desc">... <a href=""><b>read more</b></a></div>		
				</div>
			</div>
			<?php }?>
			
			<div class="clear"></div>
		</div>
	</div>
</div>
</div>

<?php 
$ss_slider_modal = 1;
foreach($success as $row_modal){?>
<div class="modal fade" id="myModal-<?= $ss_slider_modal?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title__own"><?=$row_modal->SUBJECT; ?></div>
        </div>
        <div class="modal-body">
          <div class="modal-body__own"><?=$row_modal->CONTENT; ?></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php
$ss_slider_modal++;
}
?>

<script type="text/javascript">
    	var deleteLog = false;
		$(document).ready(function() {

			$('#fullpage_ourimpact').fullpage({
				sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
				anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
				menu: '#menu',
				scrollingSpeed: 1000,
				slidesNavigation: true,
				onSlideLeave: function(anchorLink, index, slideIndex, direction, nextSlideIndex){
					
					if(slideIndex==0){
						for(var i=1; i<=6; i++){
							$("#map-detail__content__item__animate-"+i).hide();
						}
					}else if(slideIndex==2){
						for(var i=1; i<=<?= $ss_slider-1?>; i++){
							$("#success-stories__content__item__animate-"+i).hide();
						}
					}
				},
				
				afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){
					if(slideIndex==0){
						var delay = 0;
						for(var i=1; i<=6; i++){
							$("#map-detail__content__item__animate-"+i).delay(delay).fadeIn();

						delay = delay + 100;
						}
					}else if(slideIndex==2){
						var delay_ss = 0;
						for(var i=1; i<=<?= $ss_slider-1?>; i++){
							$("#success-stories__content__item__animate-"+i).delay(delay_ss).fadeIn();
						delay_ss = delay_ss + 300;
						}
					}
					
					$('.counter').counterUp({
				        delay: 10,
				        time: 3000
				    });
				}
			});
		});
	</script>