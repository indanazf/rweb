<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>CONTENT_CATEGORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>ID MENU <?php echo form_error('ID_MENU') ?></td>
            <td>
            <select name="ID_MENU" id="ID_MENU" class="form-control">
                <?php
                    $menu = $this->db->get('menu');
                    foreach ($menu->result() as $c){
                        echo "<option value='$c->id' ";
                        echo $c->id==$ID_MENU?'selected':'';
                        echo">".  strtoupper($c->name)."</option>";
                    }
                ?>
            </select>
        </td>
	    <tr><td>CATEGORY <?php echo form_error('CATEGORY') ?></td>
            <td><input type="text" class="form-control" name="CATEGORY" id="CATEGORY" placeholder="CATEGORY" value="<?php echo $CATEGORY; ?>" />
        </td>
	    <tr><td>INFORMATION CATEGORY <?php echo form_error('INFORMATION_CATEGORY') ?></td>
            <td><textarea class="form-control" rows="3" name="INFORMATION_CATEGORY" id="INFORMATION_CATEGORY" placeholder="INFORMATION CATEGORY"><?php echo $INFORMATION_CATEGORY; ?></textarea>
        </td></tr>
	    <tr><td>ICON CATEGORY <?php echo form_error('ICON_CATEGORY') ?></td>
            <td><input type="text" class="form-control" name="ICON_CATEGORY" id="ICON_CATEGORY" placeholder="ICON CATEGORY" value="<?php echo $ICON_CATEGORY; ?>" />
        </td>
	    <input type="hidden" name="ID_CATEGORY" value="<?php echo $ID_CATEGORY; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('content_category') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->