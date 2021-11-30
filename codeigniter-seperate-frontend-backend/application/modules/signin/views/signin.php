<?php
if (isset($errors) && strlen($errors)) {
    echo '<div class="error">';
    echo '<p>' . $errors . '</p>';
    echo '</div>';
}
if (validation_errors()) {
    echo validation_errors('<div class="error"><p>', '</p></div>');
}
?>
<div class="body body-s">
    <?php
    $attributes = array('class' => 'sky-form', 'id' => 'login-form');
    echo form_open($this->uri->uri_string(), $attributes);
    ?>
    <header>Login with your credentials</header>

    <fieldset>					
        <section>
            <label class="input">
                <i class="icon-append icon-user"></i>
                <input type="email" name="email" placeholder="Email address" maxlength="100"
                       value="<?php echo ((isset($success) && strlen($success)) ? '' : set_value('email')); ?>">
                <b class="tooltip tooltip-top-right">Need to verify your account</b>
            </label>
        </section>

        <section>
            <label class="input">
                <i class="icon-append icon-lock"></i>
                <input type="password" name="password" placeholder="Password" maxlength="20">
                <b class="tooltip tooltip-top-right">Need to authenticate your account</b>
            </label>
        </section>
    </fieldset>
    <footer>
        <button type="submit" name="signin" value="signin" class="button">Login</button>
    </footer>
    <?php
    echo form_close();
    ?>
</div>