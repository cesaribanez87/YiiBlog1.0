<?php
$this->breadcrumbs=array(
    $model->title,
);
$this->pageTitle=$model->title;
?>

<div id="articleHeader" style="background-image: url(<?php echo $model->image_link; ?>)">
    <div>
        <h1><?php echo CHtml::encode($model->title); ?></h1>
        <span class="byline"><?php echo CHtml::encode($model->subtitle); ?></span>
    </div>
    <a href="#articleContent" id="articleStart" title="Skip to content">
        <svg version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" "
             x="0px" y="0px" viewBox="0 0 400 200" xml:space="preserve">
				<g>
                    <path d="M106.308,29.384c6.332,0,11.664,2.444,15.984,7.344c9.214,11.232,18.286,22.174,27.216,32.832l43.2,51.84
						c5.184-6.629,11.806-14.62,19.873-23.976c8.059-9.362,15.834-18.65,23.328-27.864c8.922-10.658,17.994-21.6,27.215-32.832
						c4.32-4.9,9.646-7.344,15.984-7.344c4.895,0,9.355,1.58,13.393,4.752c4.32,3.74,6.764,8.424,7.344,14.04
						c0.574,5.616-1.014,10.726-4.752,15.336l-86.4,103.68c-4.037,4.894-9.362,7.344-15.984,7.344c-6.628,0-11.954-2.45-15.984-7.344
						l-86.4-103.68c-3.747-4.61-5.333-9.72-4.752-15.336c0.574-5.616,3.024-10.3,7.344-14.04
						C96.945,30.964,101.407,29.384,106.308,29.384z"/>
                </g>
			</svg>
    </a>
</div>

<div id="articleContent">
    <?php echo $model->content; ?>

    <div id="articleShare">

        <div class="addthis_sharing_toolbox"></div>
    </div>
    <div id="articleSignUp">
        <h2>Newsletter</h2>
        <div class="newsletter">

            <p>Liked this article? Sign up to our newsletter and get the latest insights on market research and customer experience.</p>
            <div class="input">
                <input type="text" id="artSubsInput" placeholder="Email">
                <div class="subscribed" style="display: none">You've been sent a confirmation email</div>
                <div class="subsMsg">Press enter to subscribe</div>
            </div>
        </div>
        <div class="signUp">
            <p>Still don't have Survmetrics? Try it now free and start using the best feedback platform available.</p>
            <a href="#" class="signUpNow">Sign Up</a>
        </div>
    </div>

    <section>
        <h2>Comments</h2>
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'survmetrics'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    </section>


</div>

<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-54374767437f0617" async></script>