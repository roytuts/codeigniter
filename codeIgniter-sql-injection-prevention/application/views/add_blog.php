<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Codeigniter Database Escape</title>
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

            h1 {
                margin-left: 15px;
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
            <h1>CodeIgniter Database Escape</h1>            
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
                $attributes = array('name' => 'add_blog_form', 'id' => 'add_blog_form');
                echo form_open($this->uri->uri_string(), $attributes);
                ?>
                <p>Title : <input type="text" name="title" id="title" size="54"/></p>
                <p>Content : <textarea id="content" name="content" rows="10" cols="50"></textarea></p>
                <p><input name="add_blog" value="Add Blog" type="submit" /></p>
                <?php
                echo form_close();
                ?>
            </div>

        </div>
    </body>
</html>