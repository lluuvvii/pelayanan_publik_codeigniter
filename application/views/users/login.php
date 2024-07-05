<h1>Login</h1>
<?php echo validation_errors(); ?>
<?php echo form_open('users/login'); ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button type="submit" class="btn btn-primary my-2">Login</button>
<?php echo form_close(); ?>
<p class="mt-3">Belum punya akun? <a href="<?php echo base_url('users/register'); ?>">Daftar di sini</a></p>
