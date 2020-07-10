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
        <div id="container">
            <h1>CodeIgniter Stored Procedure Update Example</h1>
            <div id="body">
                <?php
					if (isset($error)) {
						echo '<p style="color:red;">' . $error . '</p>';
					} else {
						echo validation_errors();
					}
                ?>

                <?php 
					$attributes = array('name' => 'form', 'id' => 'form');
					echo form_open($this->uri->uri_string(), $attributes);
                ?>

                <h5>Full Name</h5>
                <input type="text" name="name" value="<?php echo $user->name; ?>" size="50" />

                <h5>Email Address</h5>
                <input type="text" name="email" value="<?php echo $user->email; ?>" size="50" />

                <h5>Phone No.</h5>
                <input type="text" name="phone" value="<?php echo $user->phone; ?>" size="30" />

                <h5>Contact Address</h5>
                <textarea name="address" rows="5" cols="50"><?php echo $user->address; ?></textarea>

                <p><input type="submit" name="submit" value="Submit"/></p>
                
                <?php echo form_close(); ?>
            </div>
        </div>
    </body>
</html>