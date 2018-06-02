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
                <button type="submit" class="btn btn-success waves-effect" form="cakeForm">
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
                <li role="presentation"><a href="#profile" data-toggle="tab">Дополнительная информация</a></li>
                <li role="presentation"><a href="#galleries" data-toggle="tab">Галерея</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">Настройки</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="main-info">

                    @isset($cake)
                       @include ('cake.edit')
                    @else
                        @include ('cake.create')
                    @endisset

                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile">
                    <b>Profile Content</b>
                    <p>
                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                        sadipscing mel.
                    </p>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="galleries">
                    <b>Галереи</b>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
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
@endsection

@section('scripts')

    <!-- Select Plugin Js -->
    <script src="/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <script src="/plugins/ckeditor/ckeditor.js"></script>
    <script src="/js/pages/forms/editors.js"></script>

    <script>
        $('.deleteButton').on('click', function () {
            var cakeId = $(this).data('cake-id');
            $('#deleteCakeForm').attr('action', '/cake/' + cakeId);
            $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-red');
            $('#mdModal').modal('show');
        });
    </script>
@endsection