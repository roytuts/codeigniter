<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Admin Login</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/admin/login.css" media="screen" />
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
                        ?>
                        <?php
                        echo form_open($this->uri->uri_string());
                        if (validation_errors()) {
                            echo '<div style="color:red;">';
                            echo validation_errors();
                            echo '</div><div class="sep"></div>';
                        }
                        if (isset($errors) && strlen($errors)) {
                            echo '<div style="color:red;">';
                            echo $errors;
                            echo '</div><div class="sep"></div>';
                        }
                        ?>
                        <label for="email">Username:</label>
                        <input id="email" name="email" class="text" type="text"
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
                    <div class="footer">Please visit &raquo; <a href="<?php echo site_url(); ?>"><?php echo $this->config->item('site_name'); ?></a></div>
                </div>
            </div>
        </div>
    </body>
</html>