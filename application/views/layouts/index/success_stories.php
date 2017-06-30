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
					<a href="#firstPage/2" onclick="Readmore(<?php echo $row->ID_CONTENT; ?>);" class="title-readmore" style="color:white;text-decoration: none;"><div class="success-stories__content__item__headline__title"><?=$subject?>...</div></a>
					<div class="success-stories__content__item__headline__desc"><?=$content?>... <a href="#firstPage/2" onclick="Readmore(<?php echo $row->ID_CONTENT; ?>);" class="readmore"style="text-decoration: none;"><b>read more</b></a></div>		
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
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="reservation_detail_model" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body" id="reservation_detail_model_body">
                            <!--reservation_list_view goes here-->


                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-info" type="button">Close</button>
                        </div>
                    </div>
                </div>    
            </div>   
			<div class="clear"></div>
		</div>
	</div>
</div>
</div>
   
<script type="text/javascript">
        function Readmore(id) {
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url(); ?>/our_impact/readmore',
                data: "&id=" + id,
                success: function(msg) {
                	console.log(msg.konten.CONTENT);
                    $('#reservation_detail_model').modal('toggle').modal('show');
                    $('#reservation_detail_model_body').html(msg.konten.CONTENT);

                },
                error: function(msg) {
                    alert("Error Occured!");
                },
    			dataType:"json"
            });
        };
</script>