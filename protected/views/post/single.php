<?php
/**
 * Created by PhpStorm.
 * User: cesaralejandro
 * Date: 21/05/15
 * Time: 04:43 PM
 */
?>

<h3><?php echo $post->post_title; ?></h3>

<label>
    <?php echo 'Authored by: '.$post->author_name.', date: '.$post->date; ?>
</label>

<p>
    <?php echo $post->post_content; ?>
</p>

<div style="border-width: 5px; border-style: double; border-color: black;" align="left">
    <label>
        <?php echo 'Category: '.$post->category->category; ?>,
        Tags: Not Implemented Yet,
    </label>
</div>

<div align="right">
     Google+(Soon),Facebook Share(Soon),Twitter Share(Soon),Comments(Not Implemented Yet.)
</div>
<hr style="border-color: gray;">
