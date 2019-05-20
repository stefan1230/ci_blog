
<img src="<?php echo base_url(); ?>assets/images/blogs/<?php echo $blog['blog_image']?>"  width="300" height="200">
<h3><?php echo $blog['title'];?></h3>
<p><?php echo $blog['content'];?></p>


<?php if($this->session->userdata('user_id') == $blog['author_id']):?>
<hr>
    <?php echo form_open('/blogs/delete/'.$blog['blog_id']);?>
    <input type="submit" value="Delete" class="btn btn-danger">
    <?php echo form_close()?>

    <a href="<?php echo base_url();?>blogs/edit/<?php echo $blog['blog_slug'];?>" class="btn btn-primary">Edit</a>
<?php endif;?>

<br>
<hr>
<h5>Comments</h5>
<?php if($comments):?>
        <?php foreach($comments as $comment):?>
        <div class="card bg-light p-2 mb-1">
            <p><?php echo $comment['body']." ";?><strong>[by <?php echo $comment['name'];?>]</strong></p>
        </div>
        <?php endforeach;?>
<?php else:?>
<p>No comments for this post</p>
<?php endif;?>
<hr>
<h5>Add Comments</h5>

<div class="mb-3">
<?php echo validation_errors();?>
<?php echo form_open('Comments/create/'.$blog['blog_id'])?>
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="add Name....">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Email</label>
        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="add email....">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Body</label>
        <textarea class="form-control" name="body" id="exampleFormControlTextarea1"></textarea>
    </div>
    <input type="hidden" value="<?php echo $blog['blog_slug'];?>" name="blog_slug">
    <input type="submit" class="btn btn-primary" value="add comment">
<?php echo form_close()?>
</div>