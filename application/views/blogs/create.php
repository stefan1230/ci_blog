<h2><?= $title;?></h2>

<?php echo validation_errors();?>

<?php echo form_open_multipart('blogs/create');?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="add title....">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">blog body</label>
    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="10"></textarea>
  </div>
  <div class="form-group">
    <select name="categories" id="categories" class="form-control">
        <?php foreach($categories as $category):?>
            <option value="<?php echo $category['cat_id'];?>"><?php echo $category['cat_name'];?></option>
        <?php endforeach;?>
    </select>
  </div>
  <div class="form-group">
    <label for="blogImage">Upload Image</label>
    <input type="file" name="userfile" id="blogImage" size="20">
  </div>
  <input type="submit" value="Create">
  <br><br>
<?php echo form_close();?>