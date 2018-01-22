<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>

          <h3 class='box-title'><?=strtoupper($page)?></h3>
          <div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"><table class='table table-bordered'>
             
                <tr><td>SUBJECT <?php echo form_error('SUBJECT') ?></td>
                  <td><textarea class="form-control" rows="3" name="SUBJECT" id="SUBJECT" placeholder="SUBJECT"><?php echo $SUBJECT; ?></textarea>
                  </td></tr>
                   <tr><td>CONTENT <?php echo form_error('CONTENT') ?></td>
                    <td>
                      <div class="box-body pad">
                        <form>
                          <textarea class="editor1" placeholder="Place some text here" name="CONTENT" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            <?php echo $CONTENT; ?>
                          </textarea>
                        </form>
                      </div>
                    </td></tr>
                    <input type="hidden" pattern="[0-9]+([,\.][0-9]+)?" class="form-control" name="CONTENT_NUMMBER" id="CONTENT_NUMMBER" placeholder="CONTENT NUMBER" value="<?php echo $CONTENT_NUMMBER; ?>" step="any"/>    
                      <tr>
                          <tr><td>Image <?php echo form_error('IMG') ?></td>
                            <td>
                              <p id="msg"></p>
                              <input type="file" class="form-control" name="IMG" id="IMG" placeholder="IMG" value="<?php echo $IMG; ?>" size="20" />
                            </td>
                          </td>
                          <input type="hidden" name="ID_CONTENT" value="<?php echo $ID_CONTENT; ?>" /> 
                          <input type="hidden" name="TAGS" value="<?php echo $TAGS; ?>" /> 
                          <input type="hidden" name="ICON_TYPE" value="<?php echo $ICON_TYPE; ?>" /> 
                          <input type="hidden" name="SUBTITLE" value="<?php echo $SUBTITLE; ?>" /> 
                          <?php if($page == "news"){?>
                            <input type="hidden" name="ID_CATEGORY" value="12" /> 
                            <input type="hidden" name="ID_TYPE" value="2" /> 
                            <?php }else if($page == "press_release"){?>                            
                            <input type="hidden" name="ID_CATEGORY" value="11" /> 
                            <input type="hidden" name="ID_TYPE" value="2" /> 
                            <?php }else if($page == "success_stories"){?>                            
                            <input type="hidden" name="ID_CATEGORY" value="17" /> 
                            <?php } ?>
                          <input type="hidden" name="page" value="<?php echo $page; ?>" /> 
                          <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                           <a href="<?php echo site_url('content') ?>" class="btn btn-default">Cancel</a></td></tr>

                         </table></form>
                       </div><!-- /.box-body -->
                     </div><!-- /.box -->
                   </div><!-- /.col -->
                 </div><!-- /.row -->
               </section><!-- /.content -->
               <!-- Bootstrap WYSIHTML5 -->
