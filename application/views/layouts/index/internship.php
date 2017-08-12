
<div class="internship">
	<!--<div class="banner-overlay  banner-overlay-internship wow animated fadeIn">
		<!--<img src="<?= base_url('/assets/images/bg5.png') ?>">
	</div>-->
	
	<div class="container">
	  <div class="internship__content">
	  	<iframe style="margin-left: -30px;margin-top: -140px;" width="1200" height="550" src="https://www.youtube.com/embed/IwzsXv4sw6k" frameborder="0"></iframe>
	    <!--<div class="internship__content__arrow-play"></div>
	    <div class="internship__content__line"></div>
	    <div class="internship__content__title">What It’s Like To Be <br>Sahabat Cipta’s Intern!</div>
	    -->
	    
	  </div>
	  
	 </div>
	 
</div>


<div class="internship">
	<div class="banner-overlay banner-overlay-internship wow animated fadeIn">
		<img src="<?= base_url('/assets/images/volunteer2.png') ?>">
	</div>
	
	<div class="container">
	  <div class="internship__content3">
	    
	  <div class="internship__content3__title">3 Reasons Why Sahabat Cipta’s Internship<br> is A Great Experience</div>
	  <div class="row">

	  	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	        <ol class="carousel-indicators" style="bottom: -20px;">
	          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	        </ol>
	        <div class="carousel-inner" role="listbox">
	          <div class="item active">
	            <div class="col-md-4">
				  	<div class="internship__content3__new__icon">
				  		<img src="<?= base_url('/assets/images/intern-1.png') ?>">
				  	</div>
				</div>

				<div class="col-md-6">
				  	<div class="internship__content3__new__title">The feeling of great sense of satisfication</div>
				  	<div class="internship__content3__new__desc">knowing that your work is going to impact thousand of beneficiaries.</div>
				</div>
	          </div>
	          <div class="item">
	            <div class="col-md-4">
				  	<div class="internship__content3__new__icon">
				  		<img src="<?= base_url('/assets/images/intern-2.png') ?>">
				  	</div>
				</div>

				<div class="col-md-6">
				  	<div class="internship__content3__new__title">The opportunity to travel</div>
				  	<div class="internship__content3__new__desc">to our project locations in 6 provinces across Indonesia.</div>
				</div>
	          </div>
	          <div class="item">
	            <div class="col-md-4">
				  	<div class="internship__content3__new__icon">
				  		<img src="<?= base_url('/assets/images/intern-3.png') ?>">
				  	</div>
				</div>

				<div class="col-md-6">
				  	<div class="internship__content3__new__title">The first-hand exposure of working in big</div>
				  	<div class="internship__content3__new__desc">complex community empowerment programs that involve many stakeholders.</div>
				</div>
	          </div>
	        </div>
	        
	    </div>

	    </div>
	    <br>
	    <br>
	    <br>
	    <div class="row">
	    <form action="<?php echo site_url('/internship/form/') ?>" method="post" name="intern-form">
	    	<div class="col-md-8">
	    		
	    		<div class="internship__content__select">
	    		<select name="id_type" required="true">
	    		<option value="" required>Available Position</option>
	    		<?php
                    $type = $this->db->get('internship_type');
                    foreach ($type->result() as $c){
                        echo "<option value='$c->ID' ";
                        echo">".  strtoupper($c->POSITION)."</option>";
                    }
                ?>
				</select>
				</div>
	    	</div>
	    	<div class="col-md-4">
	    		
	    		<div type="submit" class="internship__content__button" onClick="document.forms['intern-form'].submit();">Join Now!</div>
	    	</div>
	    </form>
	    </div>
	  </div>
	</div>
	 
</div>

<!--
	
	<div class="internship__content4">
		<div class="container">
		<div class="internship__form__title">Internship Form</div>
			<div class="col-md-6">
				<div class="">
	                <div class="box-body">

	                	
	                  
	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="name" class="col-sm-4 control-label">Name<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="name" id="name" placeholder="Name" >
	                    </div>
	                    </div>
	                  </div>
	                  
	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="university" class="col-sm-4 control-label">University<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="university" id="university" placeholder="University" >
	                    </div>
	                    </div>
	                  </div>

	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="skill" class="col-sm-4 control-label">Skill<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="skill" id="skill" placeholder="Skill" >
	                    </div>
	                    </div>
	                  </div>


	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="email" class="col-sm-4 control-label">Email<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="email" id="email" placeholder="Email" >
	                    </div>
	                    </div>
	                  </div>


	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="phone" class="col-sm-4 control-label">Phone<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" >
	                    </div>
	                    </div>
	                  </div>

	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="NOTES" class="col-sm-4 control-label">Position<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <select name="position" id="position" class="form-control">
		                        <option>Choose one</option>
		                        
		                    </select>
	                    </div>
	                  </div>
	                  </div>
	                </div>
	                <br>
	               
	            </div>
	        </div>
	        <div class="col-md-6">
	        	<div class="form-group donation-box">
                    
                    <div class="col-sm-12">
                      <textarea class="form-control" rows="13" name="NOTES" id="NOTES" placeholder="Tell us your motivation!"></textarea>
                    </div>
                  </div>
                  
                  <div class="clear"></div>
                  <br>
                  <div class="box-footer">
		            <button type="submit" class="internship__button"><b>Submit Form</b></button>
		          </div>
	        </div>

	        <div class="clear"></div>
	        
		</div>
	</div>
-->