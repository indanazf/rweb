<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>DONATION</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>NAME <?php echo form_error('NAME') ?></td>
            <td><input type="text" class="form-control" name="NAME" id="NAME" placeholder="NAME" value="<?php echo $NAME; ?>" />
        </td>
	    <tr><td>ACTIVITY <?php echo form_error('ACTIVITY') ?></td>
            <td><input type="text" class="form-control" name="ACTIVITY" id="ACTIVITY" placeholder="ACTIVITY" value="<?php echo $ACTIVITY; ?>" />
        </td>
	    <tr><td>EMAIL <?php echo form_error('EMAIL') ?></td>
            <td><input type="email" class="form-control" name="EMAIL" id="EMAIL" placeholder="EMAIL" value="<?php echo $EMAIL; ?>" />
        </td>
	    <tr><td>PHONE <?php echo form_error('PHONE') ?></td>
            <td><input type="text" class="form-control" name="PHONE" id="PHONE" placeholder="PHONE" value="<?php echo $PHONE; ?>" />
        </td>
	    <tr><td>COMPLETE ADDRESS <?php echo form_error('ADDRESS') ?></td>
            <td><textarea class="form-control" rows="3" name="ADDRESS" id="ADDRESS" placeholder="ADDRESS"><?php echo $ADDRESS; ?></textarea>
        </td></tr>
	    <tr><td>PAYMENT VIA<?php echo form_error('PAYMENT') ?></td>
            <td>
                <input type="radio" name="PAYMENT" id="PAYMENT" value="transfer" <?php if($PAYMENT=="transfer") echo "checked"?>>Bank Transfer
                <br>
                <input type="radio" name="PAYMENT" id="PAYMENT" value="sms" <?php if($PAYMENT=="sms") echo "checked"?>>SMS Banking
                <br>
                <input type="radio" name="PAYMENT" id="PAYMENT" value="mobile" <?php if($PAYMENT=="mobile") echo "checked"?>>Internet/Mobile Banking
                <br>
                <input type="radio" name="PAYMENT" id="PAYMENT" value="paypal" <?php if($PAYMENT=="paypal") echo "checked"?>>PayPal

            </td>
	    <tr><td>DONATION TYPE <?php echo form_error('ID_DONATION_TYPE') ?></td>
            <td>
            <select name="ID_DONATION_TYPE" id="ID_DONATION_TYPE" class="form-control">
                    <?php
                    foreach ($DONATION_TYPE as $c){
                      echo "<option value='$c->ID_DONATION_TYPE' ";
                      echo $c->ID_DONATION_TYPE==$ID_DONATION_TYPE?'selected':'';
                      echo">".  strtoupper($c->TYPE)."</option>";
                    }
                    ?>
                  </select>
        </td>
	    <tr><td>NUMBER OF DONATION <?php echo form_error('NUMBER_OF_DONATION') ?></td>
            <td><input type="text" class="form-control" name="NUMBER_OF_DONATION" id="NUMBER_OF_DONATION" placeholder="NUMBER OF DONATION" value="<?php echo $NUMBER_OF_DONATION; ?>" />
        </td>
	    <tr><td>NOTES <?php echo form_error('NOTES') ?></td>
            <td><textarea class="form-control" rows="3" name="NOTES" id="NOTES" placeholder="NOTES"><?php echo $NOTES; ?></textarea>
        </td></tr>
	    <input type="hidden" name="ID_DONATION" value="<?php echo $ID_DONATION; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('donation') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->