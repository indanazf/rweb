<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
                                <tr><td>Company Type <?php echo form_error('company_type') ?></td>
                                    <td><input type="text" class="form-control" name="company_type" id="company_type" placeholder="Company Type" value="<?php echo $company_type; ?>" />
                                    </td>
                                    <input type="hidden" class="form-control" name="is_deleted" id="is_deleted" placeholder="Is Deleted" value="<?php echo $is_deleted; ?>"  required />
                                    
                                <input type="hidden" name="id_company_type" value="<?php echo $id_company_type; ?>" /> 
                                <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('company_type') ?>" class="btn btn-default">Cancel</a></td></tr>

                            </table></form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->