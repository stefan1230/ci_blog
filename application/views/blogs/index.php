<h3><?= $title;?></h3>
<br>
<?php foreach($blogs as $blog):?>
<div class="card mb-3 p-3">
    <div class="row">
        <div class="col-sm-3">
            <img src="<?php echo base_url(); ?>assets/images/blogs/<?php echo $blog['blog_image']?>" class="blog-img">
        </div>
        <div class="col-sm-9">
            <h4><?php echo $blog['title'];?></h4>
            <small>Created At <?php echo $blog['created_at'];?></small>
            <small>In <?php echo $blog['cat_name'];?></small>
            <p><?php echo word_limiter($blog['content'],50);?></p>
            <p><a href="<?php echo site_url('/blogs/'.$blog['blog_slug']);?>">Read More</a></p>
        </div>
      
    </div>
</div>
<?php endforeach;?>
<div class="pagination-links">
    <?php echo $this->pagination->create_links();?>
</div>