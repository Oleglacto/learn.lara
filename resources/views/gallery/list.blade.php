@extends ('administration.master')

@section('css')
    <!-- Dropzone Css -->
    <link href="/plugins/dropzone/dropzone.css" rel="stylesheet">
@endsection

@section ('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ $album->name }}
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        @isset($images)
                            @foreach($images as $image)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <a href="/{{ $image->image_original }}" data-sub-html="Demo Description">
                                        <img class="img-responsive thumbnail" src="/{{ $image->image }}">
                                    </a>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                    {{ Form::open(['method' => 'post', 'files' => true, 'route' => ['image.store', $cake->id, $album->id], 'class' => 'dropzone', 'id' => 'frmFileUpload']) }}
                        <div class="dz-message">
                            <div class="drag-icon-cph">
                                <i class="material-icons">touch_app</i>
                            </div>
                            <h3>Перетащи файлы сюда или кликни!</h3>
                            {{--<em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>--}}
                        </div>
                        <div class="fallback">
                            <input name="images" type="file" multiple />
                        </div>
                        <button type="submit">Сохранить</button>
                    {{ Form::close() }}
                </div>
                <div class="header">
                    <button href="" type="button" class="btn btn-primary waves-effect" id="addImages">
                        <i class="material-icons">add</i>
                        <span>Добавить фотографии</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('gallery.create')
@endsection

@section('scripts')

    <!-- Dropzone Plugin Js -->
    <script src="/plugins/dropzone/dropzone.js"></script>

    <script>
        $('#addImages').on('click', function () {
            $('#createImageModal .modal-content').removeAttr('class').addClass('modal-content light-green');
            $('#createImageModal').modal('show');
        });

        Dropzone.options.frmFileUpload = {
            paramName: "images",
            maxFilesize: 5
        };
    </script>


@endsection