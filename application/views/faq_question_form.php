<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>FAQ_QUESTION</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ID ANSWER <?php echo form_error('ID_ANSWER') ?></td>
            <td><input type="text" class="form-control" name="ID_ANSWER" id="ID_ANSWER" placeholder="ID ANSWER" value="<?php echo $ID_ANSWER; ?>" />
        </td>
	    <tr><td>QUESTION <?php echo form_error('QUESTION') ?></td>
            <td><input type="text" class="form-control" name="QUESTION" id="QUESTION" placeholder="QUESTION" value="<?php echo $QUESTION; ?>" />
        </td>
	    <input type="hidden" name="ID_QUESTION" value="<?php echo $ID_QUESTION; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('faq_question') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->