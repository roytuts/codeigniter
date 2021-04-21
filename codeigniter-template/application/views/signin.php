<div id="container">
    <h1>Signin Here!</h1>
    <?php echo validation_errors(); ?>
    <div id="body">
        <?php echo form_open('signin'); ?>
        <p>
            <label for="title">Username</label>
            <input type="input" name="username" /><br />
        </p>

        <p>
            <label for="text">Password</label>
            <input type="password" name="password" /><br />
        </p>
        <p>
            <input type="submit" name="submit" value="Signin" />
        </p>
        <?php echo form_close(); ?>
    </div>
</div>