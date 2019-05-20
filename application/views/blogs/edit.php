<h2><?= $title;?></h2>

<?php echo validation_errors();?>

<?php echo form_open('blogs/update');?>
<input type="hidden" name="blog_id" value="<?php echo $blog['blog_id'];?>">
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="add title...." value="<?php echo $blog['title'];?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">blog body</label>
    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="10" ><?php echo $blog['content'];?></textarea>
  </div>
  <div class="form-group">
    <select name="categories" id="categories" class="form-control">
        <?php foreach($categories as $category):?>
            <option value="<?php echo $category['cat_id'];?>"><?php echo $category['cat_name'];?></option>
        <?php endforeach;?>
    </select>
  </div>
  <input type="submit" value="Edit">
<?php echo form_close();?>