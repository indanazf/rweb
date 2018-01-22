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
        <h2>Content_category List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ID MENU</th>
		<th>CATEGORY</th>
		<th>INFORMATION CATEGORY</th>
		<th>ICON CATEGORY</th>
		
            </tr><?php
            foreach ($content_category_data as $content_category)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $content_category->ID_MENU ?></td>
		      <td><?php echo $content_category->CATEGORY ?></td>
		      <td><?php echo $content_category->INFORMATION_CATEGORY ?></td>
		      <td><?php echo $content_category->ICON_CATEGORY ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>