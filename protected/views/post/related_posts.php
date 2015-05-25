<?php
/**
 * Created by PhpStorm.
 * User: cesaralejandro
 * Date: 25/05/15
 * Time: 12:11 PM
 */
?>
<div>
    <dl>
        <?php foreach($post as $p): ?>
            <dt><?php echo (strlen($p->post_title)>30)?substr($p->post_title,0,30).'...':$p->post_title; ?></dt>
            <dd><?php echo (strlen($p->post_content)>180)?substr($p->post_content,0,180).'...':$p->post_content; ?></dd>
        <?php endforeach; ?>
    </dl>
</div>

