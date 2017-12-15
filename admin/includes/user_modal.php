<div id="photo-library" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?=$user->username;?></h4>
            </div>
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">
               <img src="<?=$user->image_path_and_placeholder();?>" alt="" width="500px" class="img-thumbnail">
            </div>
            <!-- Футер модального окна -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>