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
        <h2>Volunteer List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Position</th>
		<th>Name</th>
		<th>Activity</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Motivation</th>
		
            </tr><?php
            foreach ($volunteer_data as $volunteer)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $volunteer->id_position ?></td>
		      <td><?php echo $volunteer->name ?></td>
		      <td><?php echo $volunteer->activity ?></td>
		      <td><?php echo $volunteer->email ?></td>
		      <td><?php echo $volunteer->phone ?></td>
		      <td><?php echo $volunteer->motivation ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>