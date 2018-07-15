<div class="modal fade" id="editAlbumModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ Form::open(['method' => 'put', 'class' => 'form', 'id' => 'editAlbumForm', 'files' => true]) }}
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Изменение альбома</h4>
            </div>
            <div class="modal-body">
                <div class="form-group form-float form-group-lg">
                    <div class="form-line">
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'albumName']) }}
                        {{ Form::label('name', 'Название альбома', ['class' => 'form-label']) }}
                    </div>
                </div>
                <div class="form-group form-float form-group-lg">
                    <div class="form-line">
                        {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'albumDescription']) }}
                        {{ Form::label('description', 'Описание', ['class' => 'form-label']) }}
                    </div>
                </div>
                <div class="form-group form-float form-group-lg">
                    <div class="">
                        <img class="img-responsive thumbnail" id="albumImage" src="" alt="">
                    </div>
                </div>
                <div class="form-group form-float form-group-lg">
                    <div class="">
                        <p>Выберите обложку для альбома</p>
                        {{ Form::file('cover_image') }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-link waves-effect" form="editAlbumForm">Изменить</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Отмена</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>