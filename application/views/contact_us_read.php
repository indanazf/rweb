
<!-- Main content -->
<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <div class='box'>
        <div class='box-header'>
          <h3 class='box-title'>Contact_us Read</h3>
          <table class="table table-bordered">
           <tr><td>NAME CONTACT</td><td><?php echo $NAME_CONTACT; ?></td></tr>
           <tr><td>NO CONTACT</td><td><?php echo $NO_CONTACT; ?></td></tr>
           <tr><td>EMAIL</td><td><?php echo $EMAIL; ?></td></tr>
           <tr><td>TEXT</td><td><?php echo $TEXT; ?></td></tr>
           <tr><td></td>
            <td>
              <a href="<?php echo site_url('contact_us') ?>" class="btn btn-default">Back</a>
              <a class="btn btn-success" title="reply" href="mailto:<?= $EMAIL?>"="_top"><i class="fa fa-reply"></i> Reply</a>
            </td>
          </tr> 
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
        </section><!-- /.content -->