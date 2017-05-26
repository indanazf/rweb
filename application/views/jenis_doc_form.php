<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>

                    <div class='box box-primary'>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-bordered'>
                                <tr><td>Jenis Dokumen <?php echo form_error('jenis_doc') ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="jenis_doc" id="jenis_doc" placeholder="Jenis Dokumen" value="<?php echo $jenis_doc; ?>" required />
                                    </td>
                                <input type="hidden" name="id_jenis_doc" value="<?php echo $id_jenis_doc; ?>" /> 
                                <input type="hidden" name="is_deleted" value="<?php echo $is_deleted; ?>" /> 
                                <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('jenis_doc') ?>" class="btn btn-default">Cancel</a></td></tr>

                            </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->