@extends('administration.master')

@section('css')
    <link rel="stylesheet" href="/plugins/bootstrap-select/css/bootstrap-select.css">
@endsection

@section('content')


    @isset($cake)
        <h1 class="m-b-20">Редактирование тортика</h1>
    @else
        <h1 class="m-b-20">Добавление тортика</h1>
    @endisset

    <div class="card">
        <div class="header">
            <!-- кнопки Сохранить/удалить -->
            <div class="btn-group flex-right w214">
                <button type="submit" class="btn bg-light-green waves-effect" form="cakeForm">
                    <i class="material-icons">save</i>
                    <span>Сохранить</span>
                </button>

                @isset($cake)
                    <button class="btn bg-red waves-effect deleteButton" data-cake-id="{{ $cake->id }}">
                        <i class="material-icons">delete</i>
                        <span>Удалить</span>
                    </button>
                @else
                    <button class="btn bg-red waves-effect" disabled="disabled">
                        <i class="material-icons">delete</i>
                        <span>Удалить</span>
                    </button>
                @endisset


            </div>
            <!-- /кнопки -->
        </div>

        <div class="body">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#main-info" data-toggle="tab">Основная информация</a></li>
                <li role="presentation"><a href="#more-information" data-toggle="tab">Дополнительная информация</a></li>
                <li role="presentation"><a href="#galleries" data-toggle="tab">Галерея</a></li>
                <li role="presentation"><a href="#other-settings" data-toggle="tab">Настройки</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="main-info">

                    @isset($cake)
                       @include ('cake.edit')
                    @else
                        @include ('cake.create')
                    @endisset

                </div>
                <div role="tabpanel" class="tab-pane fade" id="more-information">
                    <b>Profile Content</b>
                    <p>
                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                        sadipscing mel.
                    </p>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="galleries">
                    @isset($cake)
                        @isset($albums)
                            <div class="list-unstyled row clearfix albums-row">
                                @foreach($albums as $album)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{ route('album.show', ['cakeId' => $cake->id, '$album' => $album->id]) }}" id="album{{$album->id}}">
                                            <figure>
                                                <span class="image-wrapper">
                                                    <img class="img-responsive thumbnail album-cover" src="{{ '/' . $album->cover_image }}" alt="">
                                                    <figcaption>
                                                        <span class="description">{{ $album->description }}</span>
                                                        <button type="button" class="btn bg-deep-orange btn-circle waves-effect waves-circle waves-float deleteAlbum btn-delete"
                                                                data-href="{{ route('album.delete', ['album' => $album->id]) }}"
                                                                data-album-id="album{{$album->id}}">
                                                            <i class="material-icons">delete</i>
                                                        </button>
                                                        <button type="button"
                                                                class="btn bg-light-green btn-circle waves-effect waves-circle waves-float editAlbum btn-edit"
                                                                data-href="{{ route('album.update', ['cake' => $cake->id, 'album' => $album->id]) }}">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                    </figcaption>
                                                </span>
                                                <span class="name">{{ $album->name }}</span>
                                            </figure>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endisset
                        <button type="button" id="addGallery" class="btn btn-primary waves-effect" data-cake-id="{{ $cake->id }}">
                            <i class="material-icons">add</i>
                            <span>Добавить галерею</span>
                        </button>
                    @else
                        <button type="button" id="addGallery" class="btn btn-primary waves-effect disabled">
                            <i class="material-icons">add</i>
                            <span>Добавить галерею</span>
                        </button>
                    @endisset
                </div>
                <div role="tabpanel" class="tab-pane fade" id="other-settings">
                    <b>Settings Content</b>
                    <p>
                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                        sadipscing mel.
                    </p>
                </div>
            </div>
        </div>





    </div>
    @include ('cake.delete')
    @isset($cake)
        @include ('album.create')
        @include ('album.delete')
        @include ('album.edit')
    @endisset
@endsection

@section('scripts')

    <!-- Select Plugin Js -->
    <script src="/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/js/pages/forms/editors.js"></script>

    <script>
        var infoForDelete = {
            album: '',
            url: ''
        };

        $('.deleteButton').on('click', function () {
            var cakeId = $(this).data('cake-id');
            $('#deleteCakeForm').attr('action', '/admin/cake/' + cakeId);
            $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-red');
            $('#mdModal').modal('show');
        });

        $('#addGallery').on('click', function () {
            $('#createAlbumModal .modal-content').removeAttr('class').addClass('modal-content light-green');
            $('#createAlbumModal').modal('show');
        });

        $('.deleteAlbum').on('click', function (event) {
            event.preventDefault();
            infoForDelete.url = $(this).data('href');
            infoForDelete.album = $(this).data('album-id');
            $('#deleteAlbumForm').attr('action', infoForDelete.url);
            $('#deleteAlbum .modal-content').removeAttr('class').addClass('modal-content modal-col-red');
            $('#deleteAlbum').modal('show');
        });

        // =================================================
        //
        //          Форма редактирования альбома
        //
        // =================================================
        $('.editAlbum').on('click', function (event) {
            event.preventDefault();
            $('#editAlbumForm').attr('action', $(this).data('href'));
            // Название
            $('#albumName').val($(this).closest('figure').find('.name').html());
            if ( ! $('#albumName').parent().hasClass('focused')) {
                $('#albumName').parent().addClass('focused');
            }
            // Описание
            if ($(this).siblings('.description').html() !== '') {
                $('#albumDescription').val($(this).siblings('.description').html());
                $('#albumDescription').parent().addClass('focused');
            } else {
                if ($('#albumDescription').parent().hasClass('focused')) {
                    $('#albumDescription').parent().removeClass('focused');
                }
                $('#albumDescription').val('');
            }
            // // Фотография
            $('#albumImage').attr('src', $(this).closest('figure').find('.album-cover').attr('src'));

            // Показываем модальное окно
            $('#editAlbumModal .modal-content').removeAttr('class').addClass('modal-content light-green');
            $('#editAlbumModal').modal('show');
        });


        $('#deleteAlbumButton').on('click', function (event) {
            event.preventDefault();
            $.ajax({
                type: 'DELETE',
                url: infoForDelete.url,
                dataType: 'JSON',
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function (message) {
                    $('#deleteAlbum').modal('hide');
                    $('#' + infoForDelete.album).parent().remove();
                    showNotification('bg-black', message.message, 'top', 'right', 'animated bounceInRight', 'animated bounceOutRight');
                },
                error: function (message) {
                    console.log(message);
                }
            });
        });

    </script>
@endsection