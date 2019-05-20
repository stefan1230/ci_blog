<?php echo validation_errors();?>
<?php echo form_open('users/login');?>
    <div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Username</label>
            <input type="text" class="form-control" name="username" id="exampleFormControlInput1" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" class="form-control" name="pass" id="exampleFormControlInput1" placeholder="Password">
        </div>
        <input type="submit" value="Sign In" class="btn btn-primary">
    </div>

<?php echo form_close();?>