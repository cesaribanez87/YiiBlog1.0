<article class="article" style="background-image: url(<?php echo $data['image_link']; ?>)">
    <div class="overlayA">
        <div class="content">
            <div class="title"><?php echo $data['title']; ?></div>
            <div class="date"><?php echo strftime("%B %d, %G", $data['create_time']); ?></div>

            <div class="description"><?php echo substr(strip_tags($data['content']),0,150)." ..."; ?></div>
            <a href="<?php echo $this->createUrl('/blog/post/'.$data['id']."/".$data['title']); ?>">Read More</a>
        </div>
    </div>

</article>