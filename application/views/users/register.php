<h1>Register</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="password2">Confirm Password</label>
        <input type="password" class="form-control" name="password2" id="password2">
    </div>
    <button type="submit" class="btn btn-primary my-2">Register</button>
<?php echo form_close(); ?>
<p class="mt-3">Sudah punya akun? <a href="<?php echo base_url('users/login'); ?>">Login di sini</a></p>
