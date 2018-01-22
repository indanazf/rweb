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
        <h2>Donation List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NAME</th>
		<th>ACTIVITY</th>
		<th>EMAIL</th>
		<th>PHONE</th>
		<th>ADDRESS</th>
		<th>PAYMENT</th>
		<th>ID DONATION TYPE</th>
		<th>NUMBER OF DONATION</th>
		<th>NOTES</th>
		
            </tr><?php
            foreach ($donation_data as $donation)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $donation->NAME ?></td>
		      <td><?php echo $donation->ACTIVITY ?></td>
		      <td><?php echo $donation->EMAIL ?></td>
		      <td><?php echo $donation->PHONE ?></td>
		      <td><?php echo $donation->ADDRESS ?></td>
		      <td><?php echo $donation->PAYMENT ?></td>
		      <td><?php echo $donation->ID_DONATION_TYPE ?></td>
		      <td><?php echo $donation->NUMBER_OF_DONATION ?></td>
		      <td><?php echo $donation->NOTES ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>