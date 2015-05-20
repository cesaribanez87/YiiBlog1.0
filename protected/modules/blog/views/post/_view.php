
<div class="inner-content">
    <div id="post-2355" class="post post-standard post-single  clearfix">
        <div class="post-left-container">
            <div class="post-date-container">
                <div class="date">
                    <span class="day"><?php echo strftime('%d',$data->create_time); ?><span class="th">º</span></span>
                    <span class="month"><?php echo strftime('%b',$data->create_time); ?></span>
                </div>
            </div>
            <div class="post-meta-container">
                <div>
                    <span class="label">Por</span>
                    <span><a class="" href="#"><?php echo CHtml::encode(trim($data->author->name.' '.$data->author->f_surname.' '.$data->author->l_surname)); ?></a></span>
                </div>
                <div>
                    <span>En</span>
                        <span>
                            <?php echo implode(', ', $data->tagLinks); ?>
                        </span>
                </div>
            </div>
            <div class="post-comment-info"> <a class="commnets" href="#"><i class="icon-blandes-bubble"></i><?php echo $data->commentCount; ?></a> </div>
        </div>
        <div class="post-right-container">
            <?php if($data->image_link): ?>
            <div class="image hoverlay"> <img  src="<?php echo $data->image_link; ?>" class="attachment-blog-large wp-post-image" alt="Workplace" />
                <?php /*<div class="overlay"> <a class="icon prettyPhoto" src="<?php echo Yii::app()->request->baseUrl; ?>/webFiles/images/blog/demo.jpg" ><i class="icon-blandes-search"></i></a> </div> */?>
            </div>
            <?php endif; ?>
            <div class="post-info-container">
                <h2><?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?></h2>
                <?php
                echo $data->content;
                ?>
            </div>
        </div>
    </div>
</div>
    <div class="post-extra-box clearfix">
        <div class="post-extra-left-content">
            <h4 class="textuppercase">Compartir</h4>
        </div>
        <div class="post-extra-right-content">
            <div class="alignright">

                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="Te invito a contestar la siguiente encuesta Via @Survmetrics" data-url="http://surv.es/"  data-lang="es" data-related="survmetrics">Twittear</a>
                     <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=192702004251748";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>

                    <div class="g-plus" data-action="share"></div>
                    <script type="text/javascript">
                        window.___gcfg = {lang: 'es-419'};

                        (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/plusone.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                        })();
                    </script>

                    <a href="//pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>
                    <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>


                    <script src="//platform.linkedin.com/in.js" type="text/javascript">
                        lang: es_ES
                    </script>
                    <script type="IN/Share"></script>

            </div>
        </div>
    </div>
    <div>








    </div>
    <div class="post-extra-box clearfix">
        <h4 class="textuppercase">Ram&oacute;n Escobar</h4>

        <div class="avatar"><img src="<?php echo Yii::app()->request->baseUrl; ?>/webFiles/images/admin.png" alt=""></div>
        <p>COO & Co-Founder en Survmetrics, soy ingeniero comercial, norteño, lector ocasional y cocinero amateur, trabajo con temas de marketing, innovación y estrategia.</p>

    </div>



