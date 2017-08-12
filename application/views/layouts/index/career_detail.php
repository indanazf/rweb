 <div class="career__content-detail">
	 <div class="container">
	 	<div class="row">
		 	<div class="col-md-3">
		 		<div class="career__content2__item__img"><img src="<?= base_url('uploads/'.$career->image) ?>"></div>
		 	</div>
		 	<div class="col-md-9">
				 
				  	<div class="career__content-detail__title"><?=$career->title?></div>
				  	<div class="career__content-detail__desc"><?=$career->descriptions?></div>
					<div class="career__content-detail__position"><b><?=$career->positions_available?> positions availables<b> | Deadline <?=$career->deadline?></div>
				      
				      <div class="clear"></div>
				  
			</div>
		</div>
		<div>
			<!--
			<div class="career__content-detail__value__title">Background</div>
			<div class="career__content-detail__value__desc">Background of PRISMA program here. Under direct supervision of the Resource Management Assistant in IOM Tanjung Pinang, in close coordination with the National Procurement and Logistic Ocer at Jakarta Country Oce and under the overall supervision of the RCA Programme Coordinator (Northern Region), the incumbent will be responsible for organizing procurement activities.</div>-->


			<div class="career__content-detail__value__title">Job Description</div>
			<div class="career__content-detail__value__desc"><?=$career->jobdesc?></div>

			<div class="career__content-detail__value__title">Benefits</div>
			<div class="career__content-detail__value__desc">
				<?=$career->benefits?>
			</div>


			<div class="career__content-detail__value__title">Job Requirements</div>
			<div class="career__content-detail__value__desc">
			<?=$career->requirements?>

			</div>
			<!--
			<div class="career__content-detail__value__footer">Applications will be considered until DD/MM/YY or until a suitable candidate is identified and selected.
Please note that only short-listed applicants meeting the above requirements will be contacted.</div>-->
		</div>
	</div>
</div>