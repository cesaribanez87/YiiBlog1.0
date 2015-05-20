<?php $this->beginContent('//layouts/web'); ?>

    <!-- Section post -->
    <section class="section-with-sidebar">
    <div class="container">
    <div class="row-fluid">
    <div  class="content span9">
        <div class="inner-content">

            <?php echo $content; ?>


        </div>
    </div>
    <div class="sidebar span3">
        <div class="inner-content">
            <?php if(!Yii::app()->user->isGuest && strpos(Yii::app()->user->userTypes, '1')!==false) $this->widget('UserMenu'); ?>
            <?php /*
            <div id="search-2" class="widget widget_meta widget_search">
                <form action="#" id="searchform" class="search-form" method="get">
                    <div>
                        <input type="text" id="s" name="s" value="Search..." onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';" autocomplete="off" />
                        <input type="submit" value="search"  class="hidden" />
                    </div>
                </form>
            </div>*/ ?>
            <div id="categories-2" class="widget widget_meta widget_categories">
                <h3>Categor&iacute;as</h3>
                <ul>
                    <?php $this->widget('TagCloud', array(
                        'maxTags'=>Yii::app()->params['tagCloudCount'],
                    )); ?>
                </ul>
            </div>
            <?php /*
            <div id="archives-2" class="widget widget_meta widget_archive">
                <h3>Archivo</h3>
                <?php $this->widget('Archive'); ?>
            </div>*/
            ?>
            <div class="widget clearfix">
                <h3>Posts recientes</h3>
                <?php $this->widget('RecentPosts', array(
                    'maxPosts'=>Yii::app()->params['recentPostCount']
                )); ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>
<?php $this->endContent(); ?>