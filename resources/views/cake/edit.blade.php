{{ Form::model($cake, ['method' => 'put', 'action' => ['CakeController@update', $cake->id], 'class' => 'form', 'id' => 'cakeForm']) }}

    @include('cake._form')

{{ Form::close() }}