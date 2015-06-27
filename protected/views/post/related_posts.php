<?php
/**
 * Created by PhpStorm.
 * User: cesaralejandro
 * Date: 25/05/15
 * Time: 12:11 PM
 */
$i=0;
?>
<div>
    <dl>
        <?php foreach($post as $p): ?>
            <?php if($i<5): ?>
                <dt><?php echo (strlen($p->post_title)>30)?substr($p->post_title,0,30).'...':$p->post_title; ?></dt>
                <dd><?php echo (strlen($p->post_content)>180)?substr($p->post_content,0,180).'...':$p->post_content; ?></dd>
                <?php $i++; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </dl>
</div>

