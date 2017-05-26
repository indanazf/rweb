<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
                                <tr><td>NIK <?php echo form_error('nik') ?></td>
                                    <td><input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $nik; ?>" required />
                                    </td>
                                <tr><td>Nama <?php echo form_error('nama') ?></td>
                                    <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" required />
                                    </td>                                    
                                <tr><td>Company <?php echo form_error('id_company') ?></td>
                                    <td>
                                        <select name="id_company" class="form-control"  required>
                                            <option value="" disabled selected>-- Pilih Company --</option>
                                            <?php foreach ($company as $row) { ?>
                                                <option value="<?= $row->id_company ?>" <?php if($id_company==$row->id_company)echo "selected"?>><?= $row->company ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                <input type="hidden" class="form-control" name="is_deleted" id="is_deleted" placeholder="Is Deleted" value="<?php echo $is_deleted; ?>" />

                                <input type="hidden" name="id_partisipan" value="<?php echo $id_partisipan; ?>" /> 
                                <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('partisipan') ?>" class="btn btn-default">Cancel</a></td></tr>

                            </table></form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->