<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Codeigniter Captcha Example</title>
        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }            

            #body {
                margin: 0 15px 0 15px;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }

            .error {
                color: #E13300;
            }

            .success {
                color: darkgreen;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <h1>CodeIgniter Captcha Example</h1>

            <div id="body">                
                <?php
                if (isset($success) && strlen($success)) {
                    echo '<div class="success">';
                    echo '<p>' . $success . '</p>';
                    echo '</div>';
                }
                if (validation_errors()) {
                    echo validation_errors('<div class="error">', '</div>');
                }
                ?>
                <?php
                $attributes = array('name' => 'captcha_form', 'id' => 'captcha_form');
                echo form_open($this->uri->uri_string(), $attributes);
                ?>
                <p>Email Address : <input name="email" id="email" type="text" /></p>
                <p>Password : <input name="pwd" id="pwd" type="password" /></p>
                <p>Confirm Password : <input name="cnf_pwd" id="cnf_pwd" type="password" /></p>
                <?php
                if ($captcha_form) {
                    ?>
                    <p>Captcha : <input name="not_robot" id="not_robot" type="text" /></p>
                    <p><?php echo $captcha_html; ?></p>
                    <?php
                }
                ?>
                <p><input name="register" value="Register" type="submit" /></p>
                <?php
                echo form_close();
                ?>
            </div>

        </div>
    </body>
</html>