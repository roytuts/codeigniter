<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CodeIgniter Stored Procedure CRUD Example</title>
    </head>
    <body>
        <div>
            <h1>CodeIgniter Stored Procedure Create/Read/Update/Delete Example</h1>
			<div>
				<?php echo anchor('/spcrud/insert', 'Create');?>
			</div>
            <div>
                <?php
					if ($users) {
					?>
					<table class="datatable">
						<thead>
							<tr>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Address</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($users as $user) {
								?>
									<tr>
										<td>
											<?php echo $user->name; ?>
										</td>
										<td>
											<?php echo $user->email; ?>
										</td>
										<td>
											<?php echo $user->phone; ?>
										</td>
										<td>
											<?php echo $user->address; ?>
										</td>
										<td>
											<?php echo anchor('/spcrud/update/' . $user->id, 'Update'); ?>
											  
											<?php echo anchor('/spcrud/delete/' . $user->id, 'Delete', array('onclick' => "return confirm('Do you want delete this record')")); ?>
										</td>
									</tr>
								<?php
								}
							?>
						</tbody>
					</table>
					<?php
					} else {
						echo '<div style="color:red;"><p>Record Not Found!</p></div>';
					}
				?>
            </div>
        </div>
    </body>
</html>