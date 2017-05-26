<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
                                <tr><td>Company Type <?php echo form_error('id_company_type') ?></td>
                                    <td>
                                        <select name="id_company_type" class="form-control" required>
                                            <option value="" disabled selected>-- Pilih Company Type --</option>
                                            <?php foreach ($company_type as $row) { ?>
                                                <option value="<?= $row->id_company_type ?>" <?php if($id_company_type==$row->id_company_type)echo "selected"?>><?= $row->company_type ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                <tr><td>Company <?php echo form_error('company') ?></td>
                                    <td><input type="text" class="form-control" name="company" id="company" placeholder="Company" value="<?php echo $company; ?>"  required/>
                                    </td>
                                <input type="hidden" class="form-control" name="is_deleted" id="is_deleted" placeholder="Is Deleted" value="<?php echo $is_deleted; ?>" />
                                <input type="hidden" name="id_company" value="<?php echo $id_company; ?>" /> 
                                <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('company') ?>" class="btn btn-default">Cancel</a></td></tr>

                            </table></form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->