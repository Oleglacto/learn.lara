<div class="modal fade" id="deleteAlbum" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['method' => 'delete', 'class' => 'form', 'id' => 'deleteAlbumForm']) }}
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Удаление альбома</h4>
            </div>
            <div class="modal-body">
                Ты действительно хочешь удалить этот альбом?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" id="deleteAlbumButton">Удалить</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Отмена</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>