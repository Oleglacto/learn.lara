<div class="modal fade" id="createImageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['method' => 'post', 'files' => true, 'route' => ['image.store', $cake->id, $album->id], 'class' => 'form', 'id' => 'createImagesForm']) }}
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Добавление фотографий</h4>
            </div>
            <div class="modal-body">
                <div class="form-group form-float form-group-lg">
                    <div class="">
                        <p>Загрузите изображения:</p>
                        <input type="file" name="images[]" multiple>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect">Загрузить</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Отмена</button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>