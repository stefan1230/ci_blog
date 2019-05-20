<h3><?= $title;?></h3>


<?php echo validation_errors();?>

<?php echo form_open_multipart('categories/create');?>
<div class="form-group">
    <label for="exampleFormControlInput1">Category Name</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="add name...">
  </div>
  <input type="submit" value="Create">
<?php echo form_close();?>