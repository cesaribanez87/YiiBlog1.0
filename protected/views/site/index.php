<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<style>
    #content{
        height:5000;
    }
    #header {
        background-color:black;
        color:white;
        text-align:center;
        padding:5px;
    }
    #nav {
        line-height:30px;
        background-color:#eeeeee;
        height:auto;
        width:300px;
        float:right;
        padding:5px;
    }
    #section {
        height:500px;
        width:800px;
        float:left;
        padding:10px;
    }

    }
</style>
<body>
    <div id="content">
        <div id="header">
            <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
        </div>

        <div id="nav">
            <hr>
            <h4 align="center">About Me</h4>
            <hr style="border-color: black">
            <ul>
                <li type="square">Facebook</li>
                <li type="square"><a href="https://twitter.com/LicIbanez87" target="_blank">Twitter+</a></li>
                <li type="square"><a href="https://plus.google.com/113501108292122101791" target="_blank">Google+</a></li>
                <li type="square"><a href="https://www.linkedin.com/pub/cesar-alejandro-iba%C3%B1ez-escoto/67/6a5/9bb" target="_blank">LinkedIn</a></li>
            </ul>
            <h5 align="center">Tags</h5>
            Not Implemented Yet.
            <hr style="border-color: black">
            <h5 align="center">Related Post</h5>
            <?php if(!empty($model)): ?>
                <?php $this->renderPartial('/post/related_posts',array('post'=>$model)); ?>
            <?php endif;?>
            <hr style="border-color: black">
            <h5 align="center">GitHub Repositories</h5>
            <ul>
                <li type="square">Android Fundamentals</li>
                <li type="square">Yii(Blog)</li>
                <li type="square">Unity (Soon)</li>
                <li type="square">Jquery Fundamentals (Soon)</li>
            </ul>
            <hr style="border-color: black">
            <h5 align="center">Statistics</h5>
            Not Implemented Yet.
            <hr style="border-color: black">
        </div>

        <div id="section">
            <h2 align="center">Recent Post</h2>
            <hr style="border-color: black">
            <?php foreach($model as $post): ?>
                <?php $this->renderPartial('/post/single',array('post'=>$post)); ?>
            <?php endforeach; ?>
        </div>
    </div>

</body>

