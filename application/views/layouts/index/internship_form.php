	<div class="internship__content4">
		<form action="<?php echo site_url('/internship/create_action_depan/') ?>" method="post" name="intern-form">
		<div class="container">
		<div class="internship__form__title">Internship Form</div>
			<div class="col-md-6">
				<div class="">
	                <div class="box-body">

	                	
	                  
	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="name" class="col-sm-4 control-label">Name<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="NAME" id="name" placeholder="Name" >
	                    </div>
	                    </div>
	                  </div>
	                  
	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="university" class="col-sm-4 control-label">University<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="UNIVERSITY" id="university" placeholder="University" >
	                    </div>
	                    </div>
	                  </div>

	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="skill" class="col-sm-4 control-label">Skill<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="SKILL" id="skill" placeholder="Skill" >
	                    </div>
	                    </div>
	                  </div>


	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="email" class="col-sm-4 control-label">Email<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="EMAIL" id="email" placeholder="Email" >
	                    </div>
	                    </div>
	                  </div>


	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="phone" class="col-sm-4 control-label">Phone<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <input type="text" class="form-control" name="PHONE" id="phone" placeholder="Phone" >
	                    </div>
	                    </div>
	                  </div>

	                  <div class="form-group donation-box">
	                  <div class="row">
	                    <label for="NOTES" class="col-sm-4 control-label">Position<span style="color:red;">*</span></label>

	                    <div class="col-sm-8">
	                      <select name="ID_POSITION" id="ID_POSITION" class="form-control">
	                      		<option>Choose one</option>
	                      		<?php
				                    foreach ($position as $c){
				                        echo "<option value='$c->ID' ";
				                        echo">".  strtoupper($c->TITLE)."</option>";
				                    }
				                ?>
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
                      <textarea class="form-control" rows="13" name="MOTIVATION" id="NOTES" placeholder="Tell us your motivation!"></textarea>
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
		</form>
	</div>