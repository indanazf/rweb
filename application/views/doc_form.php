<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                            <table class='table table-bordered'>
                                <tr><td>Jenis Doc <?php echo form_error('id_jenis_doc') ?></td>
                                    <td>
                                        <select class="form-control" name="id_jenis_doc" required>
                                            <option value="" disabled selected>-- Jenis Document --</option>
                                            <?php foreach ($jenis as $row) { ?>
                                                <option value="<?= $row->id_jenis_doc ?>" <?php if ($id_jenis_doc == $row->id_jenis_doc) echo "selected" ?>><?= $row->jenis_doc ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                <input type="hidden" class="form-control" name="id_partisipan" id="id_partisipan" placeholder="Id Partisipan" value="<?php echo $id_partisipan; ?>" />
                                <input type="hidden" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" />
                                <input type="hidden" class="form-control" name="is_deleted" id="is_deleted" placeholder="Is Deleted" value="<?php echo $is_deleted; ?>" />

                                <tr><td>File <?php echo form_error('path') ?></td>
                                    <td><input type="file" class="form-control" name="path" id="path" placeholder="Path" value="<?php echo $path; ?>" />
                                    </td>
                                <tr><td>Date <?php echo form_error('date') ?></td>
                                    <td><input type="date" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>"  required />
                                    </td>
                                <input type="hidden" name="id_doc" value="<?php echo $id_doc; ?>" /> 
                                <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('doc') ?>" class="btn btn-default">Cancel</a></td></tr>

                            </table></form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->