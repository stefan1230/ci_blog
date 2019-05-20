
<h3><?=$title;?></h3>

<?php echo validation_errors();?>
<?php echo form_open('users/register');?>
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Username</label>
        <input type="text" class="form-control" name="username" id="exampleFormControlInput1" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="password" class="form-control" name="pass" id="exampleFormControlInput1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Confirm Password</label>
        <input type="password" class="form-control" name="confirm_pass" id="exampleFormControlInput1" placeholder="Confirm Password">
    </div>
    <input type="submit" value="Sign Up" class="btn btn-primary">
<?php echo form_close()?>