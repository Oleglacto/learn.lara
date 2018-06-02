@extends ('administration.master')

@section ('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Продукция</h1>
        <div class="btn-group" role="group">
            <a href="/admin/products" type="button" class="btn btn-default waves-effect">Все тортики</a>
            <button type="button" class="btn btn-default waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                @if(Request::get('category'))
                    <span class="sr-only small-fixs">{{ $categories[Request::get('category') - 1]->name }}</span>
                @else
                    <span class="sr-only small-fixs">Категории</span>
                @endif
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                @foreach($categories as $category)
                    <li><a class="" href="?category={{ $category->id }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <h2>Все тортики</h2>
    <div class="table-responsive">
        <div class="card">
            <table class="table table-striped table-dark table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Вес</th>
                    <th>Краткое описание</th>
                    <th>Цена</th>
                    <th>Изменить/удалить</th>
                </tr>
                </thead>
                <tbody>
                @if (isset($cakes))
                    @foreach($cakes as $cake)
                        <tr>
                            <td style="vertical-align: middle">{{ $cake->id }}</td>
                            <td style="vertical-align: middle">{{ $cake->name }}</td>
                            <td style="vertical-align: middle">{{ $cake->weight }}</td>
                            <td style="vertical-align: middle">{{ $cake->description }}</td>
                            <td style="vertical-align: middle">{{ $cake->price }}</td>
                            <td style="vertical-align: middle" class="last-admin-column">
                                <a href="{{ route('cakeEdit', ['id' => $cake->id]) }}" class="btn btn-default waves-effect"><i class="material-icons">extension</i></a>
                                <button class="deleteButton btn btn-default waves-effect" data-cake-id="{{ $cake->id }}"><i class="material-icons">delete</i></button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
        <a href="/cake/create" type="button" class="btn btn-primary waves-effect">
            <i class="material-icons">add</i>
            <span>Добавить тортик</span>
        </a>
    </div>

    @include ('cake.delete');
@endsection

@section ('scripts')
    <script>
        $('.deleteButton').on('click', function () {
           var cakeId = $(this).data('cake-id');
           $('#deleteCakeForm').attr('action', '/cake/' + cakeId);
           $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-red');
           $('#mdModal').modal('show');
        });
    </script>
@endsection
