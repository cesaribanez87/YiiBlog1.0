<?php
/**
 * Created by PhpStorm.
 * User: cesaralejandro
 * Date: 21/05/15
 * Time: 04:43 PM
 */
?>
<?php date_default_timezone_set('America/Mexico_City'); ?>
<div>
    <h3><?php echo $post->post_title; ?></h3>
    <?php if(Yii::app()->user->id=='CesarIbanez'): ?>
        <div align="right">
            <a class="btn btn-primary btn-small" href="../post/update/<?php echo $post->post_ID?>">Edit</a>

        </div>
    <?php endif; ?>
</div>

<label>
    <?php echo 'Authored by: '.$post->author_name.', date: '.$post->date; ?>
</label>

<p>
    <?php echo $post->post_content; ?>
</p>

<div style="border-width: 5px; border-style: double; border-color: black;" align="right">
    <label>
        <?php echo 'Last Update: '.date('Y/m/d h:m:s',$post->modify_date); ?>,
        <?php echo 'Category: '.!empty($post->category->category)?$post->category->category:'N/A'; ?>,
        Tags: Not Implemented Yet,
    </label>
</div>

<div align="left">
     Google+(Soon),Facebook Share(Soon),Twitter Share(Soon),Comments(Not Implemented Yet.)
</div>
<hr style="border-color: gray;">
