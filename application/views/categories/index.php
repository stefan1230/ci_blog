<ul class="list-group">
    <?php foreach($categories as $category):?>
        <li class="list-group-item"><a href="<?php echo site_url('categories/blogs/'.$category['cat_id']);?>"><?php echo $category['cat_name']?></a></li>
    <?php endforeach;?>
</ul>