<?php setlocale(LC_ALL, 'es_ES');
?>

<ol class="commentlist">

<?php
foreach($comments as $key=>$comment):
    $count=$key+1; ?>

    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent" id="comment-<?php echo $count;?>">
        <div id="div-comment-<?php echo $count;?>" class="comment-body">
            <div class="comment-author vcard"> <img alt='' src='http://1.gravatar.com/avatar/38950157024a4bf9a1009882b01da20d?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G' class='avatar avatar-60 photo' height='60' width='60' />
                <h4><?php echo $comment->authorLink; ?> dice:</h4>

            </div>
            <div class="comment-meta commentmetadata"><a href="http://brad-web.com/lautus/this-is-another-standard-post/#comment-<?php echo $count;?>"> <?php echo strftime('%d de %B de %G a las %H:%M:%S',$comment->create_time); ?></a> </div>
            <p><?php echo nl2br(CHtml::encode($comment->content)); ?></p>
        </div>

    </li>





<?php endforeach; ?>





</ol>