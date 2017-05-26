
<!-- Main content -->
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box'>
                <div class='box-header'>
                    <h3 class='box-title'>Doc Read</h3>
                    <table class="table table-bordered">
                        <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
                        <tr><td>Jenis Doc</td><td><?php echo $jenis_doc; ?></td></tr>
                        <tr><td>File</td><td><a href="<?php echo site_url('doc/download/' . $doc->path) ?>"><i class="fa fa-file"></i></a></td></tr>
                        <tr><td>Date</td><td><?php echo $date; ?></td></tr>
                        <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
                        <tr><td></td><td><a href="<?php echo site_url('doc') ?>" class="btn btn-default">Cancel</a></td></tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->