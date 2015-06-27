<?php /* @var $this Controller */ ?>
<style>
    #footer {
        background-color:black;
        color:white;
        clear:both;
        text-align:center;
        padding:5px;
        height: auto;

    }
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <?php
    echo Yii::app()->bootstrap->registerAllCss();
    echo Yii::app()->bootstrap->registerCoreScripts();
    ?>
    <?php echo Yii::app()->bootstrap->init();?>
    <?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/main.css');
    ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-64046411-1', 'auto');
        ga('send', 'pageview');

    </script>

	<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">

                <button class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="brand" href="<?php echo Yii::app()->homeUrl;?>">
                    <?php echo CHtml::encode(Yii::app()->name);?>
                </a>

                <div class="nav-collapse collapse">
                    <?php
                    $validate=Yii::app()->user->name;
                    if (empty($validate)){
                        $access=null;
                    }
                    elseif ($validate=="CesarIbanez"){
                        $access="Admin";
                    }
                    elseif ($validate=="demo"){
                        $access="Guest";
                    }
                    else{
                        $access="User";
                    }
                    ?>

                    <?php $this->widget('zii.widgets.CMenu',array(
                        'htmlOptions'=>array('class'=>"nav navbar-nav"),
                        'items'=>array(
                            array('label'=>'Home', 'url'=>array('/site/index')),
                            array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                            array('label'=>'Contact', 'url'=>array('/site/contact')),
                            array('label' => 'Post', 'url' => array('/post'),'visible'=>Yii::app()->user->id=='CesarIbanez'),
                            array('label' =>'Category','url'=>array('/category'),'visible'=>Yii::app()->user->id=='CesarIbanez'),
                            array('label' =>'Repositories','url'=>array('/repositories'),'visible'=>Yii::app()->user->id=='CesarIbanez'),
                            array('label' =>'Social Contact','url'=>array('/socialContact'),'visible'=>Yii::app()->user->id=='CesarIbanez'),
                            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.Yii::app()->user->name.'['.$access.']'.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'SignUp', 'url'=>array('/site/SignUp'),'visible'=>Yii::app()->user->isGuest)
                        ),
                    )); ?>
                </div>
            </div>
        </div>
	</div><!-- mainmenu -->

<div class="container">
    <div class="page-header">
        </br></br>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
</div>
	<?php echo $content; ?>

</div>
<div id="footer">
    Copyright © 2015 Alexiel's Store.com
</div>
</body>
</html>
