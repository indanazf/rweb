<script type="text/javascript" src="<?=base_url()?>template/plugins/ckeditor/ckeditor.js"></script>

<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'>CONTENT</h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"><table class='table table-bordered'>
               <tr><td>TYPE <?php echo form_error('ID_TYPE') ?></td>
                <td>
                    <select name="ID_TYPE" id="ID_TYPE" class="form-control">
                        <option value=''></option>
                        <?php
                        $cat = $this->db->get('content_type');
                        foreach ($cat->result() as $c){
                            echo "<option value='$c->ID_TYPE' ";
                            echo $c->ID_TYPE==$ID_TYPE?'selected':'';
                            echo">".  strtoupper($c->TYPE)."</option>";
                        }
                        ?>
                    </select>
                </td>
                <tr><td>CATEGORY <?php echo form_error('ID_CATEGORY') ?></td>
                    <td>
                        <select name="ID_CATEGORY" id="ID_CATEGORY" class="form-control">
                            <?php
                            $cat = $this->db->get('content_category');
                            foreach ($cat->result() as $c){
                                echo "<option value='$c->ID_CATEGORY' ";
                                echo $c->ID_CATEGORY==$ID_CATEGORY?'selected':'';
                                echo">".  strtoupper($c->CATEGORY)."</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <tr><td>SUBJECT <?php echo form_error('SUBJECT') ?></td>
                        <td><textarea class="form-control" rows="3" name="SUBJECT" id="SUBJECT" placeholder="SUBJECT"><?php echo $SUBJECT; ?></textarea>
                        </td></tr>
                        <tr><td>CONTENT <?php echo form_error('CONTENT') ?></td>
                            <td>
                                <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bootstrap WYSIHTML5
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <textarea class="editor1" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </form>
            </div>
          </div>
        </div>
                            </td></tr>
                            <tr><td>CONTENT NUMBER <?php echo form_error('CONTENT_NUMMBER') ?></td>
                                <td><input type="text" class="form-control" name="CONTENT_NUMMBER" id="CONTENT_NUMMBER" placeholder="CONTENT NUMBER" value="<?php echo $CONTENT_NUMMBER; ?>" />
                                </td>
                                <tr><td>TAGS <?php echo form_error('TAGS') ?></td>
                                    <td><input type="text" class="form-control" name="TAGS" id="TAGS" placeholder="TAGS" value="<?php echo $TAGS; ?>" />
                                    </td>
                                    <tr><td>ICON TYPE <?php echo form_error('ICON_TYPE') ?></td>
                                        <td><input type="text" class="form-control" name="ICON_TYPE" id="ICON_TYPE" placeholder="ICON TYPE" value="<?php echo $ICON_TYPE; ?>" />
                                        </td>
                                        <tr><td>IMG <?php echo form_error('IMG') ?></td>
                                            <td>
                                                <p id="msg"></p>
                                                <input type="file" class="form-control" name="IMG" id="IMG" placeholder="IMG" value="<?php echo $IMG; ?>" size="20" />
                                            </td>
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
<!-- Bootstrap WYSIHTML5 -->
<?=base_url()?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js
<script src="<?=base_url()?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>