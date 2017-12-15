<?php require_once("init.php"); ?>
<?php
    $photos = Photo::find_all();
?>
<div class="modal fade" tabindex="-1" role="dialog" id="image-library">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                <?php foreach($photos as $photo): ?>
                    <div class="col-xs-3" style="width: 100px; height: 70px;">
                        <a href="#" role="checkbox" aria-checked="false" tabindex="0" class="link">
                            <img src="<?=$photo->picture_path();?>" alt="" class="img-thumbnail" data="<?php echo $photo->id ?>">
                        </a>
                        <div class="photo-id hidden"></div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-3">
                <div id="modal_sidebar"></div>
            </div>
            <div class="modal-footer">
                <button type="button" id="set_user_image" class="btn btn-primary" data-dismiss="modal" disabled="true">Изменить и закрыть</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
