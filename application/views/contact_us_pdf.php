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
        <h2>Contact_us List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NAME CONTACT</th>
		<th>NO CONTACT</th>
		<th>EMAIL</th>
		<th>TEXT</th>
		
            </tr><?php
            foreach ($contact_us_data as $contact_us)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $contact_us->NAME_CONTACT ?></td>
		      <td><?php echo $contact_us->NO_CONTACT ?></td>
		      <td><?php echo $contact_us->EMAIL ?></td>
		      <td><?php echo $contact_us->TEXT ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>