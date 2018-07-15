<div class="modal fade" id="createAlbumModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['method' => 'post', 'route' => ['album.store', $cake->id], 'class' => 'form', 'id' => 'createAlbumForm', 'files' => true]) }}
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Добавление альбома</h4>
            </div>
            <div class="modal-body">
                <div class="form-group form-float form-group-lg">
                    <div class="form-line">
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                        {{ Form::label('name', 'Название альбома', ['class' => 'form-label']) }}
                    </div>
                </div>
                <div class="form-group form-float form-group-lg">
                    <div class="form-line">
                        {{ Form::text('description', null, ['class' => 'form-control']) }}
                        {{ Form::label('description', 'Описание', ['class' => 'form-label']) }}
                    </div>
                </div>
                <div class="form-group form-float form-group-lg">
                    <div class="js">
                        <p>Выберите обложку для альбома</p>
                        <input type="file" name="cover_image" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-3"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Выберете файл&hellip;</span></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn bg-light-green waves-effect button-flex" form="createAlbumForm">
                    <i class="material-icons">done</i>
                    <span>Сохранить</span>
                </button>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>