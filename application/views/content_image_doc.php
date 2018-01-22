<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Content_image List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ID CONTENT</th>
		<th>IMAGE</th>
		<th>THUMBNAIL</th>
		<th>NAME IMAGE</th>
		<th>INFO</th>
		
            </tr><?php
            foreach ($content_image_data as $content_image)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $content_image->ID_CONTENT ?></td>
		      <td><?php echo $content_image->IMAGE ?></td>
		      <td><?php echo $content_image->THUMBNAIL ?></td>
		      <td><?php echo $content_image->NAME_IMAGE ?></td>
		      <td><?php echo $content_image->INFO ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>