<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CONTENT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ID TYPE <?php echo form_error('ID_TYPE') ?></td>
            <td><input type="text" class="form-control" name="ID_TYPE" id="ID_TYPE" placeholder="ID TYPE" value="<?php echo $ID_TYPE; ?>" />
        </td>
	    <tr><td>ID CATEGORY <?php echo form_error('ID_CATEGORY') ?></td>
            <td><input type="text" class="form-control" name="ID_CATEGORY" id="ID_CATEGORY" placeholder="ID CATEGORY" value="<?php echo $ID_CATEGORY; ?>" />
        </td>
	    <tr><td>SUBJECT <?php echo form_error('SUBJECT') ?></td>
            <td><textarea class="form-control" rows="3" name="SUBJECT" id="SUBJECT" placeholder="SUBJECT"><?php echo $SUBJECT; ?></textarea>
        </td></tr>
	    <tr><td>CONTENT <?php echo form_error('CONTENT') ?></td>
            <td><textarea class="form-control" rows="3" name="CONTENT" id="CONTENT" placeholder="CONTENT"><?php echo $CONTENT; ?></textarea>
        </td></tr>
	    <tr><td>CONTENT NUMMBER <?php echo form_error('CONTENT_NUMMBER') ?></td>
            <td><input type="text" class="form-control" name="CONTENT_NUMMBER" id="CONTENT_NUMMBER" placeholder="CONTENT NUMMBER" value="<?php echo $CONTENT_NUMMBER; ?>" />
        </td>
	    <tr><td>TAGS <?php echo form_error('TAGS') ?></td>
            <td><input type="text" class="form-control" name="TAGS" id="TAGS" placeholder="TAGS" value="<?php echo $TAGS; ?>" />
        </td>
	    <tr><td>CREATED BY <?php echo form_error('CREATED_BY') ?></td>
            <td><input type="text" class="form-control" name="CREATED_BY" id="CREATED_BY" placeholder="CREATED BY" value="<?php echo $CREATED_BY; ?>" />
        </td>
	    <tr><td>CREATED DATE <?php echo form_error('CREATED_DATE') ?></td>
            <td><input type="text" class="form-control" name="CREATED_DATE" id="CREATED_DATE" placeholder="CREATED DATE" value="<?php echo $CREATED_DATE; ?>" />
        </td>
	    <tr><td>UPDATE BY <?php echo form_error('UPDATE_BY') ?></td>
            <td><input type="text" class="form-control" name="UPDATE_BY" id="UPDATE_BY" placeholder="UPDATE BY" value="<?php echo $UPDATE_BY; ?>" />
        </td>
	    <tr><td>LAST UPDATE <?php echo form_error('LAST_UPDATE') ?></td>
            <td><input type="text" class="form-control" name="LAST_UPDATE" id="LAST_UPDATE" placeholder="LAST UPDATE" value="<?php echo $LAST_UPDATE; ?>" />
        </td>
	    <tr><td>ICON TYPE <?php echo form_error('ICON_TYPE') ?></td>
            <td><input type="text" class="form-control" name="ICON_TYPE" id="ICON_TYPE" placeholder="ICON TYPE" value="<?php echo $ICON_TYPE; ?>" />
        </td>
	    <tr><td>IMG <?php echo form_error('IMG') ?></td>
            <td><input type="text" class="form-control" name="IMG" id="IMG" placeholder="IMG" value="<?php echo $IMG; ?>" />
        </td>
	    <input type="hidden" name="ID_CONTENT" value="<?php echo $ID_CONTENT; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('content') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->