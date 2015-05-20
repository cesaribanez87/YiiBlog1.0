<div class="fullHeight" style="background: #222">
    <div id="articles">
        <?php while($row=$data->read()){
            $this->renderPartial('_short', array('data'=>$row));
        } ?>
    </div>
</div>