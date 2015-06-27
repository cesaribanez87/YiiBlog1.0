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
        width:20%;
        float:right;
        padding:5px;
    }
    #section {
        height:500px;
        width:75%;
        float:left;
        padding:10px;
    }

    }
</style>
<body>
    <div id="content" class="col-md-8">
        <div id="header">
            <h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
        </div>
        <div id="section">
            <h2 align="center">Recent Post</h2>
            <hr style="border-color: black">
            <?php foreach($model as $post): ?>
                <?php $this->renderPartial('/post/single',array('post'=>$post)); ?>
            <?php endforeach; ?>
        </div>
        <div id="nav">
            <hr>

            <h4 align="center">About Me</h4>

            <hr style="border-color: black">
            <?php if(!empty($social)): ?>
                <ul>
                    <?php foreach($social as $s): ?>
                        <li type="square"><a href="<?php echo $s->url; ?>" target="_blank"><?php echo $s->social; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                No Contact Info Available.
            <?php endif; ?>

            <h5 align="center">Tags</h5>

            <?php if(!empty($tags)): ?>
                <select>
                    <?php foreach($tags as $t): ?>
                        <option>
                            <a>
                               <?php echo $t->name; ?>
                            </a>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php else: ?>
                <?php echo 'No Tags Available.'; ?>
            <?php endif; ?>
            <hr style="border-color: black">

            <h5 align="center">Related Post</h5>

            <?php if(!empty($model)): ?>
                <?php $this->renderPartial('/post/related_posts',array('post'=>$model)); ?>
            <?php endif;?>
            <hr style="border-color: black">
            <h5 align="center">GitHub Repositories</h5>
            <?php if(!empty($repo)): ?>
                <ul>
                <?php foreach($repo as $r): ?>
                    <li type="square"><a href="<?php echo $r->url; ?>" target="_blank"><?php echo $r->title; ?></a></li>
                <?php endforeach; ?>
                </ul>
            <?php else: ?>
                No Repo Available.
            <?php endif; ?>
            <hr style="border-color: black">

            <h5 align="center">Statistics</h5>

            <div align="center">
                <label><b>Total Visits</b><label>
                <br>
                <label><font size="50"><b><?php echo $hits['hits']; ?></b></font></label>
            </div>
            <?php if($hits['info']->ip!='::1'): ?>
                <div align="left">
                    <ul>
                        <li type="circle">
                            <label><b>Your IP: </b><?php echo $hits['info']->ip; ?></label>
                        </li>
                        <li type="circle">
                            <label><b>Hostname: </b><?php echo $hits['info']->hostname; ?></label>
                        </li>
                        <li type="circle">
                            <label><b>City: </b><?php echo !empty($hits['info']->city)?$hits['info']->city:'N/A'; ?></label>
                        </li>
                        <li type="circle">
                            <label><b>Country: </b><?php echo !empty($hits['info']->country)?$hits['info']->country:'N/A'; ?></label>
                        </li>
                        <li type="circle">
                            <label><b>Organization: </b><?php echo !empty($hits['info']->org)?$hits['info']->org:'N/A'; ?></label>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <div align="center">
                    <label>Please Run on a Live server to get statistics.</label>
                </div>
            <?php endif; ?>
            <hr style="border-color: black">
        </div>
    </div>

</body>

