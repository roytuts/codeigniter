<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Codeigniter Login Logout Example</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css" media="screen" />
    </head>
    <body>
        <div class="wrap">
            <div id="content">
                <div id="main">
                    <div class="full_w">
                        <?php
							if ($msg) {
								echo '<div class="n_ok"><p>';
								echo $msg;
								echo '</p></div>';
							}
							
							if($this->session->flashdata($this->config->item('msg_key'))) {
								echo $this->session->flashdata($this->config->item('msg_key'));
							}
                        ?>
                        <?php
							echo form_open($this->uri->uri_string());
							if (validation_errors()) {
								echo '<div class="n_error">';
								echo validation_errors();
								echo '</div><div class="sep"></div>';
							}
							if (isset($errors) && strlen($errors)) {
								echo '<div class="n_error">';
								echo $errors;
								echo '</div><div class="sep"></div>';
							}
                        ?>
                        <label for="username">Username:</label>
                        <input id="username" name="username" class="text" type="text"
                               maxlength="100"/>
                        <label for="password">Password:</label>
                        <input id="password" name="password" type="password"
                               class="text" maxlength="25"/>
                        <div class="sep"></div>
                        <input type="submit" name="login" id="login" value="Login"/>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>