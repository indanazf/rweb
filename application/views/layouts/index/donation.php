  <div class="donation" style="margin-top: -12px">
  	<div class="donation__banner">
      
    		<div class="banner-overlay wow animated fadeIn">
          		<img src="<?= base_url('uploads/donation.jpg') ?>" style="min-width: 1500px">
        	</div>
          <div class="container">
          	<div class="donation__banner__title wow animated fadeIn" data-wow-delay="0.5s"><b>Better future is on you.</b></div>
          	<div class="donation__banner__subtitle wow animated fadeIn" data-wow-delay="0.8s"><i>Making differences through donations.<br>
          	Any incoming donations will be channeled through<br>
          	our community empowerment program that can be monitored<br>
          	transparently. </i></div>
          </div>

  	</div>
  </div>

<div class="donation-2">
	<div class="col-md-4 u-pad" style="overflow:auto;">
		<div class="donation-2-left__banner wow animated fadeIn" data-wow-delay="0.5s">
		    <img src="<?= base_url('uploads/donation-2.png') ?>" class="donation-2__left__images">
		</div>
	</div>
	<div class="col-md-8">
		<div class="donation-2-right__banner wow animated fadeIn" data-wow-delay="1s">
		    <div class="donation-2__banner__title"><b>Help Sahabat Cipta<br>
				make a brighter future<br>
				with your donation today.</b></div>
		    <div class="donation-2__banner__subtitle">
		    	The focus of Sahabat Cipta's movement is to improve economic and social of the community, as well as to improve the environment through the provision of skills and new opportunities to potential farmers in Indonesia.
		    	<br><br>
				With your gift today, they will have a greater chance to meet a bright future by improving their skills and becoming independent.
				<br><br>
				Since its establishment in 2008, Sahabat Cipta is a social enterprise that has successfully developed more than 25 projects spread across Indonesia and partnered with both Indonesian and international donors.

		    </div>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class="container">
  <div class="donation-form">
  	<div class="donation-2__banner__title"><h1>Donor Profile &nbsp;<small>fields with (*) are mandatory</small></h1></div>
    <br>
  	<br>
    <form class="form-horizontal" action="<?php echo $action; ?>" method="post">
    <div class="col-md-6">
        <div class="box-body">
          <div class="form-group donation-box">
            <label for="NAME" class="col-sm-4 control-label">Full Name<span style="color:red;">*</span></label>

            <div class="col-sm-8">
              <input type="text" class="form-control" name="NAME" id="NAME" placeholder="Full Name">
            </div>
          </div>
          <div class="form-group donation-box">
            <label for="ACTIVITY" class="col-sm-4 control-label">Activity</label>

            <div class="col-sm-8">
              <input type="text" class="form-control" name="ACTIVITY" id="ACTIVITY" placeholder="Activity">
            </div>
          </div>
          <div class="form-group donation-box">
            <label for="EMAIL" class="col-sm-4 control-label">Email<span style="color:red;">*</span></label>

            <div class="col-sm-8">
              <input type="text" class="form-control" name="EMAIL" id="EMAIL" placeholder="Email" >
            </div>
          </div>
          <div class="form-group donation-box">
            <label for="PHONE" class="col-sm-4 control-label">Phone<span style="color:red;">*</span></label>

            <div class="col-sm-8">
              <input type="text" class="form-control" name="PHONE" id="PHONE" placeholder="Phone" >
            </div>
          </div>
          <div class="form-group donation-box">
            <label for="ADDRESS" class="col-sm-4 control-label">Complete Address<span style="color:red;">*</span></label>

            <div class="col-sm-8">
              <textarea class="form-control" rows="3" name="ADDRESS" id="ADDRESS" placeholder="Complete Address"></textarea>
            </div>
          </div>
        </div>
  	 </div>	
  	 <div class="col-md-6">
        <div class="form-horizontal">
                <div class="box-body">
                  <div class="form-group donation-box">
                  
                    <label for="PAYMENT" class="col-sm-4 control-label">Payment Via<span style="color:red;">*</span></label>

                    <div class="col-sm-8">
                      <input type="radio" name="PAYMENT" id="PAYMENT" value="transfer">&nbsp;Bank Transfer
                      <br>
                      <input type="radio" name="PAYMENT" id="PAYMENT" value="sms">&nbsp;SMS Banking
                      <br>
                      <input type="radio" name="PAYMENT" id="PAYMENT" value="mobile">&nbsp;Internet/Mobile Banking
                      <br>
                      <input type="radio" name="PAYMENT" id="PAYMENT" value="paypal">&nbsp;PayPal
                    </div>
                  </div>
                  <div class="form-group donation-box">
                    <label for="ID_DONATION_TYPE" class="col-sm-4 control-label">Donation Type<span style="color:red;">*</span></label>

                    <div class="col-sm-8">
                      <select name="ID_DONATION_TYPE" id="ID_DONATION_TYPE" class="form-control">
                        <option>Choose one</option>
                        <?php
                        foreach ($DONATION_TYPE as $c){
                          echo "<option value='$c->ID_DONATION_TYPE' ";
                          echo">".  strtoupper($c->TYPE)."</option>";
                        }
                        ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group donation-box">
                    <label for="NUMBER_OF_DONATION" class="col-sm-4 control-label">Number of Donation<span style="color:red;">*</span></label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="NUMBER_OF_DONATION" id="NUMBER_OF_DONATION" placeholder="Number of Donation" >
                    </div>
                  </div>
                  <div class="form-group donation-box">
                    <label for="NOTES" class="col-sm-4 control-label">Notes</label>

                    <div class="col-sm-8">
                      <textarea class="form-control" rows="3" name="NOTES" id="NOTES" placeholder="Notes"></textarea>
                    </div>
                  </div>
                </div>
               <div class="box-footer">
                <button type="submit" class="donation__button pull-right"><b>CREATE FORM</b></button>
              </div>
            </div>
          </div>
    </form>
  </div>	
</div>